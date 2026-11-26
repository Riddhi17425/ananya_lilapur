<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    /** Shows the page, and returns the table rows as JSON for DataTables (ajax). */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(Testimonial::query())
                ->addIndexColumn()
                ->editColumn('reviewer_category', fn (Testimonial $t) => e($t->reviewer_category ?? '—'))
                ->editColumn('star', fn (Testimonial $t) => str_repeat('★', $t->star).str_repeat('☆', 5 - $t->star))
                ->editColumn('description', fn (Testimonial $t) => e(Str::limit(trim(html_entity_decode(strip_tags($t->description))), 70)))
                ->editColumn('status', fn (Testimonial $t) => view('admin.testimonials._status', ['testimonial' => $t])->render())
                ->addColumn('action', fn (Testimonial $t) => view('admin.testimonials._actions', ['testimonial' => $t])->render())
                ->rawColumns(['status', 'action'])
                ->toJson();
        }

        return view('admin.testimonials.index');
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(TestimonialRequest $request): RedirectResponse
    {
        Testimonial::create($request->validated());

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial added.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update($request->validated());

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete(); // soft delete

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial deleted.');
    }

    /** Switch between active (1) and inactive (0). */
    public function toggleStatus(Request $request, Testimonial $testimonial): RedirectResponse|JsonResponse
    {
        $testimonial->update(['status' => ! $testimonial->status]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['status' => $testimonial->status]);
        }

        return back()->with('status', 'Status updated.');
    }
}
