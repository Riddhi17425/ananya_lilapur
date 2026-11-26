<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Yajra\DataTables\Facades\DataTables;

class InquiryController extends Controller
{
    /** One tab per form type. Shows the page, and returns the rows as JSON for DataTables (ajax). */
    public function index(Request $request, string $type = 'enquire')
    {
        abort_unless(isset(Inquiry::TYPES[$type]), 404);

        if ($request->ajax()) {
            $fields = Inquiry::COLUMNS[$type];
            $table = DataTables::eloquent(Inquiry::where('type', $type))
                ->addIndexColumn()
                ->editColumn('created_at', fn (Inquiry $i) => $i->created_at->format('d M Y, h:i A'))
                ->addColumn('action', fn (Inquiry $i) => view('admin.inquiries._actions', ['inquiry' => $i])->render())
                ->rawColumns(['action']);

            foreach ($fields as $field) {
                $table->editColumn($field, fn (Inquiry $i) => e(str($i->display($field))->limit(50)));
            }

            return $table->toJson();
        }

        return view('admin.inquiries.index', [
            'type' => $type,
            'counts' => Inquiry::selectRaw('type, count(*) as total')->groupBy('type')->pluck('total', 'type'),
        ]);
    }

    public function show(Inquiry $inquiry)
    {
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function resume(Inquiry $inquiry): StreamedResponse
    {
        abort_unless($inquiry->resume_path && Storage::exists($inquiry->resume_path), 404);

        return Storage::download($inquiry->resume_path, str($inquiry->name)->slug().'-resume.'.pathinfo($inquiry->resume_path, PATHINFO_EXTENSION));
    }

    public function destroy(Inquiry $inquiry): RedirectResponse
    {
        $inquiry->delete(); // soft delete (the résumé file is kept so it can be restored)

        return redirect()->route('admin.inquiries.index', $inquiry->type)->with('status', 'Inquiry deleted.');
    }
}
