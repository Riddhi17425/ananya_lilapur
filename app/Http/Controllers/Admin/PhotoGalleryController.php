<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PhotoGalleryRequest;
use App\Models\PhotoGallery;
use App\Models\PhotoGalleryCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PhotoGalleryController extends Controller
{
    /** Shows the page, and returns the table rows as JSON for DataTables (ajax). */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(PhotoGallery::with('category'))
                ->addIndexColumn()
                ->editColumn('name', fn (PhotoGallery $g) => e($g->name))
                ->addColumn('category', fn (PhotoGallery $g) => e($g->category?->category_name ?? '—'))
                ->filterColumn('category', fn ($query, $keyword) => $query->whereHas(
                    'category', fn ($q) => $q->where('category_name', 'like', "%{$keyword}%")
                ))
                ->editColumn('list_image', fn (PhotoGallery $g) => '<img class="thumb" src="'.e($g->thumbnailUrl()).'" alt="'.e($g->name).'">')
                ->editColumn('status', fn (PhotoGallery $g) => view('admin.photo-galleries._status', ['gallery' => $g])->render())
                ->addColumn('action', fn (PhotoGallery $g) => view('admin.photo-galleries._actions', ['gallery' => $g])->render())
                ->rawColumns(['list_image', 'status', 'action'])
                ->toJson();
        }

        return view('admin.photo-galleries.index');
    }

    public function create()
    {
        return view('admin.photo-galleries.create', ['categories' => $this->categories()]);
    }

    public function store(PhotoGalleryRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['list_image', 'inner_image']);
        // Each image is optional (at least one is required by the request).
        foreach (['list_image' => 'photo-galleries/list', 'inner_image' => 'photo-galleries/inner'] as $field => $folder) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store($folder, 'public');
            }
        }

        PhotoGallery::create($data);

        return redirect()->route('admin.photo-galleries.index')->with('status', 'Photo gallery added.');
    }

    public function edit(PhotoGallery $gallery)
    {
        return view('admin.photo-galleries.edit', [
            'gallery' => $gallery,
            'categories' => $this->categories($gallery->category_id),
        ]);
    }

    public function update(PhotoGalleryRequest $request, PhotoGallery $gallery): RedirectResponse
    {
        $data = $request->safe()->except(['list_image', 'inner_image']);

        // Only replace an image when a new one was uploaded; remove the old file then.
        foreach (['list_image' => 'photo-galleries/list', 'inner_image' => 'photo-galleries/inner'] as $field => $folder) {
            if ($request->hasFile($field)) {
                if ($gallery->{$field}) {
                    Storage::disk('public')->delete($gallery->{$field});
                }
                $data[$field] = $request->file($field)->store($folder, 'public');
            }
        }

        $gallery->update($data);

        return redirect()->route('admin.photo-galleries.index')->with('status', 'Photo gallery updated.');
    }

    public function destroy(PhotoGallery $gallery): RedirectResponse
    {
        $gallery->delete(); // soft delete (the image files are kept so it can be restored)

        return redirect()->route('admin.photo-galleries.index')->with('status', 'Photo gallery deleted.');
    }

    /** Switch between active (1) and inactive (0). */
    public function toggleStatus(Request $request, PhotoGallery $gallery): RedirectResponse|JsonResponse
    {
        $gallery->update(['status' => ! $gallery->status]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['status' => $gallery->status]);
        }

        return back()->with('status', 'Status updated.');
    }

    /** Categories for the dropdown: active ones, plus the one already saved on the gallery. */
    private function categories(?int $currentId = null)
    {
        return PhotoGalleryCategory::query()
            ->where(fn ($q) => $q->where('status', 1)->orWhere('id', $currentId))
            ->orderBy('category_name')
            ->get();
    }
}
