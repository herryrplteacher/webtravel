<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRouteScheduleRequest extends FormRequest
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
            'route_id' => ['required', 'exists:routes,id'],
            'schedule_type' => ['required', 'in:daily,weekday,weekend,dow,date'],
            'day_of_week' => ['required_if:schedule_type,dow', 'nullable', 'integer', 'min:0', 'max:6'],
            'specific_date' => ['required_if:schedule_type,date', 'nullable', 'date', 'after_or_equal:today'],
            'depart_time' => ['required', 'date_format:H:i'],
            'note' => ['nullable', 'string', 'max:100'],
            'is_active' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'route_id.required' => 'Route harus dipilih',
            'route_id.exists' => 'Route tidak valid',
            'schedule_type.required' => 'Tipe jadwal harus dipilih',
            'schedule_type.in' => 'Tipe jadwal tidak valid',
            'day_of_week.required_if' => 'Hari harus dipilih untuk jadwal hari tertentu',
            'day_of_week.min' => 'Nilai hari tidak valid',
            'day_of_week.max' => 'Nilai hari tidak valid',
            'specific_date.required_if' => 'Tanggal harus diisi untuk jadwal tanggal spesifik',
            'specific_date.date' => 'Format tanggal tidak valid',
            'specific_date.after_or_equal' => 'Tanggal tidak boleh di masa lalu',
            'depart_time.required' => 'Waktu keberangkatan harus diisi',
            'depart_time.date_format' => 'Format waktu harus HH:MM',
            'note.max' => 'Catatan maksimal 100 karakter',
        ];
    }
}
