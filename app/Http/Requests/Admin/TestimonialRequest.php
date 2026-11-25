<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // routes are already protected by the auth middleware
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'star' => ['required', 'integer', 'between:1,5'],
            'reviewer_category' => ['nullable', 'string', 'max:100'],
            'status' => ['required', 'boolean'],
        ];
    }
}
