<?php

namespace App\Http\Requests\Admin;

use App\Support\Html;
use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // routes are already protected by the auth middleware
    }

    /** The answer is rich text: keep only safe formatting tags. */
    protected function prepareForValidation(): void
    {
        $this->merge(['answer' => Html::clean($this->input('answer'))]);
    }

    public function rules(): array
    {
        return [
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string', 'max:5000'],
            'status' => ['required', 'boolean'],
        ];
    }

    /** Field names shown in error messages. */
    public function attributes(): array
    {
        return [
            'question' => 'question',
            'answer' => 'answer',
            'status' => 'status',
        ];
    }
}
