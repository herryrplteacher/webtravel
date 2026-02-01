<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRouteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => $this->has('is_active') ? true : false,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'service_id' => ['required', 'exists:services,id'],
            'title' => ['required', 'string', 'max:200'],
            'from_location_id' => ['required', 'exists:locations,id'],
            'to_location_id' => ['required', 'exists:locations,id', 'different:from_location_id'],
            'price_from' => ['nullable', 'integer', 'min:0'],
            'duration' => ['nullable', 'string', 'max:50'],
            'short_desc' => ['nullable', 'string'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
            'is_active' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'service_id.required' => 'Service harus dipilih',
            'service_id.exists' => 'Service tidak valid',
            'title.required' => 'Judul rute harus diisi',
            'title.max' => 'Judul maksimal 200 karakter',
            'from_location_id.required' => 'Lokasi asal harus dipilih',
            'from_location_id.exists' => 'Lokasi asal tidak valid',
            'to_location_id.required' => 'Lokasi tujuan harus dipilih',
            'to_location_id.exists' => 'Lokasi tujuan tidak valid',
            'to_location_id.different' => 'Lokasi tujuan harus berbeda dengan lokasi asal',
            'price_from.integer' => 'Harga harus berupa angka',
            'price_from.min' => 'Harga minimal 0',
            'cover_image.image' => 'File harus berupa gambar',
            'cover_image.mimes' => 'Format gambar harus: JPEG, JPG, PNG, atau WEBP',
            'cover_image.max' => 'Ukuran gambar maksimal 2MB',
        ];
    }
}
