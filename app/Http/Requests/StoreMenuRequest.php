<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'parent_id' => ['nullable', 'exists:menus,id'],
            'title' => ['required', 'string', 'max:100'],
            'url' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'parent_id.exists' => 'Parent menu yang dipilih tidak valid.',
            'title.required' => 'Judul menu wajib diisi.',
            'title.max' => 'Judul menu maksimal 100 karakter.',
            'url.max' => 'URL maksimal 255 karakter.',
            'sort_order.required' => 'Urutan menu wajib diisi.',
            'sort_order.integer' => 'Urutan menu harus berupa angka.',
            'sort_order.min' => 'Urutan menu tidak boleh negatif.',
            'is_active.required' => 'Status aktif wajib diisi.',
            'is_active.boolean' => 'Status aktif harus berupa boolean.',
        ];
    }
}
