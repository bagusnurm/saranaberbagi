<?php

namespace App\Actions\Donation;

use App\Mail\KonfirmasiDonasi;
use App\Models\Donation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CreateDonationAction
{
    /**
     * Membuat data donasi baru dengan nomor invoice unik serta mengirimkan email notifikasi konfirmasi.
     *
     * @param  array<string, mixed>  $data
     */
    public function execute(array $data): Donation
    {
        // Generate invoice number unik berbasis tanggal dan kode acak
        do {
            $invoiceNumber = 'INV-'.date('Ymd').'-'.strtoupper(Str::random(4));
        } while (Donation::where('invoice_number', $invoiceNumber)->exists());

        $donation = Donation::create([
            'invoice_number' => $invoiceNumber,
            'user_id' => filament()->auth()->user()?->id ?? auth()->id(),
            'campaign_id' => ! empty($data['campaign_id']) ? $data['campaign_id'] : null,
            'payment_method_id' => $data['payment_method_id'],
            'donor_name' => trim((string) $data['nama']),
            'donor_email' => trim((string) $data['email']),
            'donor_phone' => trim((string) $data['telepon']),
            'is_anonymous' => (bool) ($data['is_anonymous'] ?? false),
            'amount' => $data['nominal'],
            'message' => ! empty($data['pesan']) ? trim((string) $data['pesan']) : null,
            'status' => 'pending',
        ]);

        $campaign = $donation->campaign;
        $paymentMethod = $donation->paymentMethod;

        // Pengiriman email notifikasi dibungkus try-catch agar kegagalan SMTP tidak memutus alur donatur
        try {
            Mail::to($donation->donor_email)->send(new KonfirmasiDonasi([
                'nama' => $donation->donor_name,
                'email' => $donation->donor_email,
                'telepon' => $donation->donor_phone,
                'nominal' => $donation->amount,
                'pesan' => $donation->message,
                'metode' => $paymentMethod?->name ?? 'Transfer Bank',
                'invoice' => $donation->invoice_number,
                'campaign' => $campaign?->title ?? 'Donasi Umum',
            ]));
        } catch (\Throwable $e) {
            Log::error('Email konfirmasi donasi gagal dikirim: '.$e->getMessage());
        }

        return $donation;
    }
}
