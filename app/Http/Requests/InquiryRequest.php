<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/** Validates the five website forms. The rules depend on the {type} in the URL. */
class InquiryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // public forms
    }

    public function rules(): array
    {
        $mobile = ['required', 'string', 'regex:/^[0-9+\-\s]{10,15}$/'];

        return match ($this->route('type')) {
            // "Enquire now", the home page call back and the pop-up (also used for "Notify me").
            'enquire' => [
                'parent' => ['required', 'string', 'max:255'],
                'mobile' => $mobile,
                'email' => ['required', 'email', 'max:255'],
                'child' => ['required', 'string', 'max:255'],
                'class' => ['required', 'string', 'max:50'],
                'current_school' => ['nullable', 'string', 'max:255'],
                'visit_date' => ['nullable', 'date', 'after_or_equal:today'],
                // The home page form and the pop-up have a consent box; the admissions form does not.
                'consent' => ['exclude_if:source,admissions', 'accepted'],
                'message' => ['nullable', 'string', 'max:2000'],
                'source' => ['nullable', 'string', 'max:50'],
            ],
            'visit' => [
                'parent' => ['required', 'string', 'max:255'],
                'mobile' => $mobile,
                'email' => ['required', 'email', 'max:255'],
                'datetime' => ['required', 'date', 'after_or_equal:today'],
                'visitors' => ['required', 'integer', 'between:1,8'],
            ],
            'career' => [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'mobile' => $mobile,
                'area' => ['required', 'string', 'max:100'],
                'experience' => ['required', 'string', 'max:100'],
                'cv' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
            ],
            'contact' => [
                'name' => ['required', 'string', 'max:255'],
                'mobile' => $mobile,
                'email' => ['required', 'email', 'max:255'],
                'subject' => ['required', 'in:Admissions,Transport,Careers,Other'],
                'message' => ['required', 'string', 'max:2000'],
            ],
        };
    }

    /** Field names used in the messages, e.g. "The parent's name field is required." */
    public function attributes(): array
    {
        return [
            'parent' => "parent's name",
            'mobile' => 'mobile number',
            'email' => 'email address',
            'child' => "child's name",
            'class' => 'class',
            'current_school' => 'current school',
            'visit_date' => 'preferred visit date',
            'datetime' => 'preferred date and time',
            'visitors' => 'number of visitors',
            'area' => 'area of interest',
            'experience' => 'years of experience',
            'cv' => 'résumé',
            'name' => 'name',
        ];
    }

    public function messages(): array
    {
        return [
            'consent.accepted' => 'Please tick the consent box so we can contact you.',
            'visit_date.after_or_equal' => 'Please choose today or a future date.',
            'datetime.after_or_equal' => 'Please choose today or a future date.',
            'mobile.regex' => 'Please enter a valid mobile number.',
            'cv.mimes' => 'The résumé must be a PDF, DOC or DOCX file.',
            'cv.max' => 'The résumé must not be larger than 5 MB.',
        ];
    }
}
