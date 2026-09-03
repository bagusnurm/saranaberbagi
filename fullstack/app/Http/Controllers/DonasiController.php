<?php

namespace App\Http\Controllers;

use App\Actions\Donation\CreateDonationAction;
use App\Http\Requests\DonasiKonfirmasiRequest;
use App\Http\Requests\DonasiStep2Request;
use App\Models\Campaign;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

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
    public function step2(DonasiStep2Request $request)
    {
        $data = $request->validated();
        $data['is_anonymous'] = $request->boolean('is_anonymous');

        $campaign = ! empty($data['campaign_id']) ? Campaign::find($data['campaign_id']) : null;
        $paymentMethods = PaymentMethod::where('is_active', true)->get();

        return view('donasi.step2', compact('data', 'campaign', 'paymentMethods'));
    }

    /**
     * Langkah 3: Ringkasan konfirmasi sebelum submit.
     */
    public function step3(DonasiKonfirmasiRequest $request)
    {
        $data = $request->validated();
        $data['is_anonymous'] = $request->boolean('is_anonymous');

        $campaign = ! empty($data['campaign_id']) ? Campaign::find($data['campaign_id']) : null;
        $paymentMethod = PaymentMethod::findOrFail($data['payment_method_id']);

        return view('donasi.step3', compact('data', 'campaign', 'paymentMethod'));
    }

    /**
     * Langkah 4: Simpan donasi ke database tabel `donations` dan tampilkan halaman instruksi bayar.
     */
    public function konfirmasi(DonasiKonfirmasiRequest $request, CreateDonationAction $createDonationAction)
    {
        $data = $request->validated();
        $data['is_anonymous'] = $request->boolean('is_anonymous');

        $donation = $createDonationAction->execute($data);

        $campaign = $donation->campaign;
        $paymentMethod = $donation->paymentMethod;

        return view('donasi.konfirmasi', compact('donation', 'campaign', 'paymentMethod'));
    }
}
