<?php

namespace App\Http\Requests\Admin;

use App\Support\Html;
use Illuminate\Foundation\Http\FormRequest;

class LearningStageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // routes are already protected by the auth middleware
    }

    /** The description is rich text: keep only safe formatting tags. */
    protected function prepareForValidation(): void
    {
        $this->merge(['description' => Html::clean($this->input('description'))]);
    }

    public function rules(): array
    {
        return [
            'tab_name' => ['required', 'string', 'max:100'],
            'kicker' => ['required', 'string', 'max:255'],
            'heading' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:5000'],
            'points' => ['nullable', 'string', 'max:2000'],
            'classes' => ['nullable', 'string', 'max:1000'],
            'image' => [$this->isMethod('post') ? 'required' : 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'image_alt' => ['nullable', 'string', 'max:255'],
            'image_width' => ['required', 'integer', 'between:100,600'],
            'image_arch' => ['required', 'boolean'],
            'badge' => ['nullable', 'string', 'max:100'],
            'notify_button' => ['required', 'boolean'],
            'sort_order' => ['required', 'integer', 'between:0,9999'],
            'status' => ['required', 'boolean'],
        ];
    }

    /** Field names shown in error messages. */
    public function attributes(): array
    {
        return [
            'tab_name' => 'tab name',
            'kicker' => 'label above the heading',
            'image_alt' => 'image description',
            'image_width' => 'image width',
            'image_arch' => 'arch-shaped image',
            'notify_button' => 'notify button',
            'sort_order' => 'display order',
        ];
    }

    public function messages(): array
    {
        return [
            'image.max' => 'The image must not be larger than 2 MB.',
            'image.mimes' => 'The image must be a JPG, PNG or WEBP file.',
        ];
    }
}
