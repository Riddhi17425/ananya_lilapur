<?php

namespace App\Http\Requests\Admin;

use App\Models\PhotoGalleryCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PhotoGalleryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // routes are already protected by the auth middleware
    }

    public function rules(): array
    {
        // Images are required when adding, optional when editing (keep the old one).
        $image = [$this->isMethod('post') ? 'required' : 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'];

        return [
            'category_id' => [
                'required',
                'integer',
                // Active categories only (the category already saved on this gallery is also allowed).
                Rule::exists('photo_gallery_category', 'id')->where(
                    fn ($query) => $query->whereNull('deleted_at')->where(
                        fn ($q) => $q->where('status', 1)->orWhere('id', $this->route('gallery')?->category_id)
                    )
                ),
            ],
            'name' => ['required', 'string', 'max:255'],
            'list_image' => $image,
            'inner_image' => $image,
            'status' => ['required', 'boolean'],
        ];
    }

    /** Field names shown in error messages. */
    public function attributes(): array
    {
        return [
            'category_id' => 'category',
            'name' => 'name',
            'list_image' => 'list image',
            'inner_image' => 'inner image',
            'status' => 'status',
        ];
    }

    public function messages(): array
    {
        return [
            'list_image.max' => 'The list image must not be larger than 2 MB.',
            'inner_image.max' => 'The inner image must not be larger than 2 MB.',
            'list_image.mimes' => 'The list image must be a JPG, PNG or WEBP file.',
            'inner_image.mimes' => 'The inner image must be a JPG, PNG or WEBP file.',
        ];
    }
}
