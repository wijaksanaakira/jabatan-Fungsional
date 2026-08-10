<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMonitoringRequest extends FormRequest
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
            'pegawai_id' => 'nullable|integer|exists:pegawai,id',
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'jabatan_fungsional_id' => 'required|integer|exists:jabatan_fungsional,id',
            'unit_kerja' => 'nullable|string|max:255',
            'nomor_hp' => 'nullable|string|max:50',
            'catatan' => 'nullable|string',
        ];
    }
}