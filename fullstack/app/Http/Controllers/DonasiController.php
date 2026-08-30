<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\KonfirmasiDonasi;
use Illuminate\Support\Facades\Log;

class DonasiController extends Controller
{
    public function step1()
    {
        return view('donasi.step1');
    }

    public function step2(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
            'nominal' => 'required|numeric|min:10000',
            'pesan' => 'nullable|string',
        ]);

        return view('donasi.step2', compact('data'));
    }

    public function step3(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
            'nominal' => 'required|numeric|min:10000',
            'pesan' => 'nullable|string',
            'metode' => 'required|string',
        ]);

        return view('donasi.step3', compact('data'));
    }

    public function konfirmasi(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
            'nominal' => 'required|numeric|min:10000',
            'pesan' => 'nullable|string',
            'metode' => 'required|string',
        ]);

        try {
            Mail::to($data['email'])->send(new KonfirmasiDonasi($data));
        } catch (\Exception $e) {
            Log::error('Email gagal dikirim: ' . $e->getMessage());
        }

        return view('donasi.konfirmasi', compact('data'));
    }
}
