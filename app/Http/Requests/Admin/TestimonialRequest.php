<?php

namespace App\Http\Requests\Admin;

use App\Support\Html;
use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // routes are already protected by the auth middleware
    }

    /** Description is rich text: keep only safe formatting tags; an empty editor becomes an empty value. */
    protected function prepareForValidation(): void
    {
        $this->merge(['description' => Html::clean($this->input('description'))]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:5000'],
            'star' => ['required', 'integer', 'between:1,5'],
            'reviewer_category' => ['nullable', 'string', 'max:100'],
            'status' => ['required', 'boolean'],
        ];
    }

    /** Field names shown in error messages. */
    public function attributes(): array
    {
        return [
            'name' => 'name',
            'description' => 'description',
            'star' => 'stars',
            'reviewer_category' => 'reviewer category',
            'status' => 'status',
        ];
    }
}
