<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRouteFacilitieRequest extends FormRequest
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
            'route_id' => ['required', 'exists:routes,id'],
            'label' => ['required', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'route_id.required' => 'Route harus dipilih',
            'route_id.exists' => 'Route tidak valid',
            'label.required' => 'Label fasilitas harus diisi',
            'label.max' => 'Label maksimal 100 karakter',
        ];
    }
}
