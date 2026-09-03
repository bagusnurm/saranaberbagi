<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

class DonasiKonfirmasiRequest extends DonasiStep2Request
{
    /**
     * Aturan validasi untuk langkah 3 dan konfirmasi donasi (mencakup metode pembayaran).
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'payment_method_id' => 'required|exists:payment_methods,id',
        ]);
    }
}
