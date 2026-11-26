<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use App\Models\Inquiry;
use App\Services\GoogleSheet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

/** Receives the website forms, stores them and sends the visitor to the thank you page. */
class InquiryController extends Controller
{
    public function store(InquiryRequest $request, string $type): JsonResponse|RedirectResponse
    {
        $data = $request->validated();

        // The pop-up is also used by the "Notify Me When Available" button.
        if ($type === 'enquire' && str_starts_with((string) ($data['source'] ?? ''), 'notify')) {
            $type = 'notify';
        }

        $inquiry = Inquiry::create([
            'type' => $type,
            'name' => $data['parent'] ?? $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'child_name' => $data['child'] ?? null,
            'class_applying' => $data['class'] ?? null,
            'current_school' => $data['current_school'] ?? null,
            'visit_at' => $data['datetime'] ?? $data['visit_date'] ?? null,
            'visitors' => $data['visitors'] ?? null,
            'position' => $data['area'] ?? null,
            'experience' => $data['experience'] ?? null,
            'resume_path' => $request->hasFile('cv') ? $request->file('cv')->store('resumes') : null,
            'subject' => $data['subject'] ?? null,
            'message' => $data['message'] ?? null,
            'source' => $data['source'] ?? null,
        ]);

        // Also add it to the Google Sheet (does nothing when the sheet is not set up).
        GoogleSheet::append($inquiry);

        $redirect = route('thank-you');
        session()->flash('inquiry_type', $type);

        return $request->expectsJson()
            ? response()->json(['redirect' => $redirect])
            : redirect($redirect);
    }

    public function thankYou()
    {
        // Only shown right after a submission.
        if (! session()->has('inquiry_type')) {
            return redirect()->route('home');
        }

        return view('front.pages.thank-you', ['type' => session('inquiry_type')]);
    }
}
