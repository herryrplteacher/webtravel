<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSettingRequest extends FormRequest
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
        $settingId = $this->route('setting')?->id;

        return [
            'key_name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('settings', 'key_name')->ignore($settingId),
            ],
            'value' => ['nullable', 'string'],
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
            'key_name.required' => 'Key name wajib diisi.',
            'key_name.max' => 'Key name maksimal 100 karakter.',
            'key_name.unique' => 'Key name sudah digunakan.',
        ];
    }
}
