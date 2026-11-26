<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PhotoGalleryCategoryRequest;
use App\Models\PhotoGalleryCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PhotoGalleryCategoryController extends Controller
{
    /** Shows the page, and returns the table rows as JSON for DataTables (ajax). */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(PhotoGalleryCategory::query())
                ->addIndexColumn()
                ->editColumn('category_name', fn (PhotoGalleryCategory $c) => e($c->category_name))
                ->editColumn('status', fn (PhotoGalleryCategory $c) => view('admin.photo-gallery-categories._status', ['category' => $c])->render())
                ->addColumn('action', fn (PhotoGalleryCategory $c) => view('admin.photo-gallery-categories._actions', ['category' => $c])->render())
                ->rawColumns(['status', 'action'])
                ->toJson();
        }

        return view('admin.photo-gallery-categories.index');
    }

    public function create()
    {
        return view('admin.photo-gallery-categories.create');
    }

    public function store(PhotoGalleryCategoryRequest $request): RedirectResponse
    {
        PhotoGalleryCategory::create($request->validated());

        return redirect()->route('admin.photo-gallery-categories.index')->with('status', 'Category added.');
    }

    public function edit(PhotoGalleryCategory $category)
    {
        return view('admin.photo-gallery-categories.edit', compact('category'));
    }

    public function update(PhotoGalleryCategoryRequest $request, PhotoGalleryCategory $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()->route('admin.photo-gallery-categories.index')->with('status', 'Category updated.');
    }

    public function destroy(PhotoGalleryCategory $category): RedirectResponse
    {
        // Do not leave photo galleries without a category.
        if ($category->galleries()->exists()) {
            return back()->with('error', 'This category has photo galleries, so it cannot be deleted. Delete or move them first.');
        }

        $category->delete(); // soft delete

        return redirect()->route('admin.photo-gallery-categories.index')->with('status', 'Category deleted.');
    }

    /** Switch between active (1) and inactive (0). */
    public function toggleStatus(Request $request, PhotoGalleryCategory $category): RedirectResponse|JsonResponse
    {
        $category->update(['status' => ! $category->status]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['status' => $category->status]);
        }

        return back()->with('status', 'Status updated.');
    }
}
