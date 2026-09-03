<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DonasiStep2Request extends FormRequest
{
    /**
     * Tentukan apakah user diotorisasi membuat request ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi untuk data donatur dan nominal pada form donasi langkah 2.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'nominal' => 'required|numeric|min:10000',
            'pesan' => 'nullable|string|max:1000',
            'campaign_id' => 'nullable|exists:campaigns,id',
            'is_anonymous' => 'nullable|boolean',
        ];
    }
}
