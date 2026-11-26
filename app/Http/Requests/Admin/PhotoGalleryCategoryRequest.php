<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PhotoGalleryCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // routes are already protected by the auth middleware
    }

    public function rules(): array
    {
        return [
            'category_name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
        ];
    }

    /** Field names shown in error messages. */
    public function attributes(): array
    {
        return [
            'category_name' => 'category name',
            'status' => 'status',
        ];
    }
}
