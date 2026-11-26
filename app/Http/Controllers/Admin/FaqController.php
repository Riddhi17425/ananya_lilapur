<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    /** Shows the page, and returns the table rows as JSON for DataTables (ajax). */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(Faq::query())
                ->addIndexColumn()
                ->editColumn('question', fn (Faq $f) => e($f->question))
                ->editColumn('answer', fn (Faq $f) => e(Str::limit(trim(html_entity_decode(strip_tags($f->answer))), 80)))
                ->editColumn('status', fn (Faq $f) => view('admin.faqs._status', ['faq' => $f])->render())
                ->addColumn('action', fn (Faq $f) => view('admin.faqs._actions', ['faq' => $f])->render())
                ->rawColumns(['status', 'action'])
                ->toJson();
        }

        return view('admin.faqs.index');
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(FaqRequest $request): RedirectResponse
    {
        Faq::create($request->validated());

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ added.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(FaqRequest $request, Faq $faq): RedirectResponse
    {
        $faq->update($request->validated());

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ updated.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete(); // soft delete

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ deleted.');
    }

    /** Switch between active (1) and inactive (0). */
    public function toggleStatus(Request $request, Faq $faq): RedirectResponse|JsonResponse
    {
        $faq->update(['status' => ! $faq->status]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['status' => $faq->status]);
        }

        return back()->with('status', 'Status updated.');
    }
}
