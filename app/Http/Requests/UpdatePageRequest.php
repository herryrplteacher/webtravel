<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'content' => ['nullable', 'string'],
            'is_published' => ['nullable', 'boolean'],
            'image_main' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'image_second' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'image_third' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'stat_value' => ['nullable', 'array', 'max:4'],
            'stat_value.*' => ['nullable', 'string', 'max:20'],
            'stat_label' => ['nullable', 'array', 'max:4'],
            'stat_label.*' => ['nullable', 'string', 'max:100'],
            'visi_misi' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Judul halaman wajib diisi.',
            'title.max' => 'Judul halaman maksimal 150 karakter.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_published' => $this->has('is_published') ? true : false,
        ]);
    }
}
