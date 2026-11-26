<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LearningStageRequest;
use App\Models\LearningStage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class LearningStageController extends Controller
{
    /** Shows the page, and returns the table rows as JSON for DataTables (ajax). */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(LearningStage::query())
                ->addIndexColumn()
                ->editColumn('tab_name', fn (LearningStage $s) => e($s->tab_name))
                ->editColumn('heading', fn (LearningStage $s) => e($s->heading))
                ->editColumn('image', fn (LearningStage $s) => '<img class="thumb" src="'.e($s->imageUrl()).'" alt="'.e($s->tab_name).'">')
                ->editColumn('status', fn (LearningStage $s) => view('admin.learning-stages._status', ['stage' => $s])->render())
                ->addColumn('action', fn (LearningStage $s) => view('admin.learning-stages._actions', ['stage' => $s])->render())
                ->rawColumns(['image', 'status', 'action'])
                ->toJson();
        }

        return view('admin.learning-stages.index');
    }

    public function create()
    {
        return view('admin.learning-stages.create');
    }

    public function store(LearningStageRequest $request): RedirectResponse
    {
        $data = $request->safe()->except('image');
        $data['image'] = $request->file('image')->store('learning-stages', 'public');

        LearningStage::create($data);

        return redirect()->route('admin.learning-stages.index')->with('status', 'Learning stage added.');
    }

    public function edit(LearningStage $stage)
    {
        return view('admin.learning-stages.edit', compact('stage'));
    }

    public function update(LearningStageRequest $request, LearningStage $stage): RedirectResponse
    {
        $data = $request->safe()->except('image');

        // Only replace the image when a new one was uploaded; remove the old file then.
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($stage->image);
            $data['image'] = $request->file('image')->store('learning-stages', 'public');
        }

        $stage->update($data);

        return redirect()->route('admin.learning-stages.index')->with('status', 'Learning stage updated.');
    }

    public function destroy(LearningStage $stage): RedirectResponse
    {
        $stage->delete(); // soft delete (the image file is kept so it can be restored)

        return redirect()->route('admin.learning-stages.index')->with('status', 'Learning stage deleted.');
    }

    /** Switch between active (1) and inactive (0). */
    public function toggleStatus(Request $request, LearningStage $stage): RedirectResponse|JsonResponse
    {
        $stage->update(['status' => ! $stage->status]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['status' => $stage->status]);
        }

        return back()->with('status', 'Status updated.');
    }
}
