<?php

namespace App\Http\Requests\Admin;

use App\Support\Content;
use App\Support\Html;
use Illuminate\Foundation\Http\FormRequest;

/** Validates the "Pages Content" form of one page. The fields come from config/page_content/<page>.php. */
class PageContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // routes are already protected by the auth middleware
    }

    /** Fields of the page: ['key' => definition] */
    public function fields(): array
    {
        $fields = [];

        foreach (Content::sections($this->route('page')) as $section) {
            $fields += $section;
        }

        return $fields;
    }

    /** Rich text fields: keep only safe formatting tags (an empty editor becomes an empty value). */
    protected function prepareForValidation(): void
    {
        $content = (array) $this->input('content', []);

        foreach ($this->fields() as $key => $field) {
            if ($field['type'] === 'html' && isset($content[$key])) {
                $content[$key] = Html::clean($content[$key]);
            }
        }

        $this->merge(['content' => $content]);
    }

    public function rules(): array
    {
        $rules = [];

        foreach ($this->fields() as $key => $field) {
            $rules += match ($field['type']) {
                'image' => ["image.$key" => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048']],
                'html' => ["content.$key" => ['nullable', 'string', 'max:20000']],
                'textarea' => ["content.$key" => ['nullable', 'string', 'max:5000']],
                'title' => ["content.$key" => ['nullable', 'string', 'max:500']],
                default => ["content.$key" => ['nullable', 'string', 'max:1000']],
            };
        }

        return $rules;
    }

    /** Field labels used in the messages, e.g. "The Heading must not be greater than 500 characters." */
    public function attributes(): array
    {
        $names = [];

        foreach ($this->fields() as $key => $field) {
            $names[($field['type'] === 'image' ? 'image.' : 'content.').$key] = $field['label'];
        }

        return $names;
    }

    public function messages(): array
    {
        return [
            'image.*.max' => 'The :attribute must not be larger than 2 MB.',
            'image.*.mimes' => 'The :attribute must be a JPG, PNG or WEBP file.',
            'image.*.image' => 'The :attribute must be an image.',
        ];
    }
}
