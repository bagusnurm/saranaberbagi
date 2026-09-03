<?php

namespace App\Support;

class PhoneNumber
{
    /**
     * Format nomor telepon ke standar tautan WhatsApp (kode negara 62).
     * Menghapus karakter non-numerik dan mengonversi awalan '0' menjadi '62'.
     */
    public static function toWhatsappFormat(string $phone): string
    {
        $cleaned = (string) preg_replace('/[^0-9]/', '', $phone);

        if (str_starts_with($cleaned, '0')) {
            return '62'.substr($cleaned, 1);
        }

        return $cleaned;
    }
}
