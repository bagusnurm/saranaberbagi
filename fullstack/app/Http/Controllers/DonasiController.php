<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\KonfirmasiDonasi;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DonasiController extends Controller
{
    /**
     * Langkah 1: Input data diri & pilih campaign + nominal.
     */
    public function step1(Request $request)
    {
        $campaigns = Campaign::where('status', 'active')
            ->orderByDesc('is_featured')
            ->orderBy('title')
            ->get(['id', 'slug', 'title']);

        $selectedCampaign = null;
        if ($request->filled('campaign')) {
            $selectedCampaign = $campaigns->where('slug', $request->query('campaign'))->first()
                ?? $campaigns->where('id', $request->query('campaign'))->first();
        }

        $presetNominal = $request->query('nominal');

        return view('donasi.step1', compact('campaigns', 'selectedCampaign', 'presetNominal'));
    }

    /**
     * Langkah 2: Pilih metode pembayaran dinamis dari database.
     */
    public function step2(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'nominal' => 'required|numeric|min:10000',
            'pesan' => 'nullable|string|max:1000',
            'campaign_id' => 'nullable|exists:campaigns,id',
            'is_anonymous' => 'nullable|boolean',
        ]);

        $data['is_anonymous'] = $request->boolean('is_anonymous');

        $campaign = !empty($data['campaign_id']) ? Campaign::find($data['campaign_id']) : null;
        $paymentMethods = PaymentMethod::where('is_active', true)->get();

        return view('donasi.step2', compact('data', 'campaign', 'paymentMethods'));
    }

    /**
     * Langkah 3: Ringkasan konfirmasi sebelum submit.
     */
    public function step3(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'nominal' => 'required|numeric|min:10000',
            'pesan' => 'nullable|string|max:1000',
            'campaign_id' => 'nullable|exists:campaigns,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'is_anonymous' => 'nullable|boolean',
        ]);

        $data['is_anonymous'] = $request->boolean('is_anonymous');

        $campaign = !empty($data['campaign_id']) ? Campaign::find($data['campaign_id']) : null;
        $paymentMethod = PaymentMethod::findOrFail($data['payment_method_id']);

        return view('donasi.step3', compact('data', 'campaign', 'paymentMethod'));
    }

    /**
     * Langkah 4: Simpan donasi ke database tabel `donations` dan tampilkan halaman instruksi bayar.
     */
    public function konfirmasi(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'nominal' => 'required|numeric|min:10000',
            'pesan' => 'nullable|string|max:1000',
            'campaign_id' => 'nullable|exists:campaigns,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'is_anonymous' => 'nullable|boolean',
        ]);

        $isAnonymous = $request->boolean('is_anonymous');

        // Buat nomor invoice unik
        do {
            $invoiceNumber = 'INV-' . date('Ymd') . '-' . strtoupper(Str::random(4));
        } while (Donation::where('invoice_number', $invoiceNumber)->exists());

        // Simpan donasi ke database
        $donation = Donation::create([
            'invoice_number' => $invoiceNumber,
            'user_id' => auth()->id(),
            'campaign_id' => !empty($data['campaign_id']) ? $data['campaign_id'] : null,
            'payment_method_id' => $data['payment_method_id'],
            'donor_name' => trim($data['nama']),
            'donor_email' => trim($data['email']),
            'donor_phone' => trim($data['telepon']),
            'is_anonymous' => $isAnonymous,
            'amount' => $data['nominal'],
            'message' => !empty($data['pesan']) ? trim($data['pesan']) : null,
            'status' => 'pending',
        ]);

        $campaign = $donation->campaign;
        $paymentMethod = $donation->paymentMethod;

        // Kirim email notifikasi jika dikonfigurasi
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
        } catch (\Exception $e) {
            Log::error('Email konfirmasi donasi gagal dikirim: ' . $e->getMessage());
        }

        return view('donasi.konfirmasi', compact('donation', 'campaign', 'paymentMethod'));
    }
}
