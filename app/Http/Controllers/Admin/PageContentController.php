<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageContentRequest;
use App\Models\PageContent;
use App\Support\Content;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

/** "Pages Content": edit the static text and images of the website pages. */
class PageContentController extends Controller
{
    /** The list of pages. */
    public function index()
    {
        return view('admin.page-content.index', [
            'pages' => Content::PAGES,
            'edited' => PageContent::selectRaw('page, count(*) as total, max(updated_at) as last_update')->groupBy('page')->get()->keyBy('page'),
        ]);
    }

    public function edit(string $page)
    {
        abort_unless(config()->has('page_content.'.$page), 404);

        return view('admin.page-content.edit', [
            'page' => $page,
            'info' => Content::PAGES[$page],
            'sections' => Content::sections($page),
            'content' => Content::forPage($page),
        ]);
    }

    public function update(PageContentRequest $request, string $page): RedirectResponse
    {
        $saved = PageContent::where('page', $page)->pluck('value', 'field_key');

        foreach ($request->fields() as $key => $field) {
            if ($field['type'] === 'image') {
                $this->saveImage($request, $page, $key, $saved[$key] ?? null);

                continue;
            }

            // The form always sends every field; skip any that is missing.
            if (! $request->has("content.$key")) {
                continue;
            }

            $value = $this->clean($request->input("content.$key"));

            // Nothing to store when it is the same as the original text.
            if ($value === $this->clean($field['default'] ?? '')) {
                PageContent::where(['page' => $page, 'field_key' => $key])->delete();
            } else {
                PageContent::updateOrCreate(['page' => $page, 'field_key' => $key], ['value' => $value]);
            }
        }

        return redirect()->route('admin.page-content.edit', $page)->with('status', Content::PAGES[$page]['label'].' content saved.');
    }

    /** Back to the original text and images of the page. */
    public function destroy(string $page): RedirectResponse
    {
        abort_unless(isset(Content::PAGES[$page]), 404);

        foreach (PageContent::where('page', $page)->pluck('value', 'field_key') as $key => $value) {
            $this->deleteImage($page, $key, $value);
        }
        PageContent::where('page', $page)->delete();

        return redirect()->route('admin.page-content.edit', $page)->with('status', Content::PAGES[$page]['label'].' is back to its original content.');
    }

    /** Upload a new image, or go back to the original one ("Use original image" box). */
    private function saveImage(PageContentRequest $request, string $page, string $key, ?string $current): void
    {
        if ($request->boolean("reset_image.$key")) {
            $this->deleteImage($page, $key, $current);
            PageContent::where(['page' => $page, 'field_key' => $key])->delete();
        } elseif ($request->hasFile("image.$key")) {
            $this->deleteImage($page, $key, $current);
            PageContent::updateOrCreate(
                ['page' => $page, 'field_key' => $key],
                ['value' => $request->file("image.$key")->store("page-content/$page", 'public')],
            );
        }
    }

    /** Remove an uploaded image file (the original images in public/ are never deleted). */
    private function deleteImage(string $page, string $key, ?string $value): void
    {
        $isImage = collect(Content::sections($page))->contains(fn ($fields) => ($fields[$key]['type'] ?? null) === 'image');

        if ($isImage && $value) {
            Storage::disk('public')->delete($value);
        }
    }

    private function clean(?string $value): string
    {
        return trim(str_replace("\r\n", "\n", (string) $value));
    }
}
