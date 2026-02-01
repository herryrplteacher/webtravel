<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWaLeadRequest extends FormRequest
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
            'route_id' => ['nullable', 'exists:routes,id'],
            'customer_name' => ['nullable', 'string', 'max:120'],
            'phone' => ['nullable', 'string', 'max:30'],
            'source' => ['required', 'in:home,detail,promo,other'],
            'clicked_at' => ['nullable', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'route_id.exists' => 'Route tidak valid',
            'customer_name.max' => 'Nama customer maksimal 120 karakter',
            'phone.max' => 'Nomor telepon maksimal 30 karakter',
            'source.required' => 'Sumber lead harus dipilih',
            'source.in' => 'Sumber lead tidak valid',
            'clicked_at.date' => 'Format tanggal waktu klik tidak valid',
        ];
    }
}
