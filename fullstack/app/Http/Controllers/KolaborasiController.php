<?php

namespace App\Http\Controllers;

use App\Actions\CollaborationRequest\SubmitCollaborationRequestAction;
use App\Http\Requests\SubmitCollaborationRequest;
use App\Models\Campaign;
use Illuminate\Support\Facades\Log;

class KolaborasiController extends Controller
{
    /**
     * Tampilkan halaman kolaborasi & pengajuan bantuan.
     */
    public function index()
    {
        $campaigns = Campaign::where('status', 'active')
            ->orderBy('title', 'asc')
            ->get(['id', 'title', 'slug', 'target_amount', 'collected_amount']);

        return view('kolaborasi.index', compact('campaigns'));
    }

    /**
     * Simpan data pengajuan bantuan ke database (AidRequest).
     */
    public function store(SubmitCollaborationRequest $request, SubmitCollaborationRequestAction $action)
    {
        try {
            $aidRequest = $action->execute(
                data: $request->validated(),
                photos: $request->file('photos', []),
                videos: $request->file('videos', []),
                isMualaf: (bool) ($request->input('is_mualaf') == '1' || $request->input('is_mualaf') === true)
            );

            return redirect()
                ->route('kolaborasi.index')
                ->with('success', 'Permohonan bantuan Anda atas nama <strong>'.e($aidRequest->applicant_name).'</strong> berhasil diajukan! Tim Sarana Berbagi akan memverifikasi berkas dan menghubungi Anda melalui nomor WhatsApp <strong>'.e($aidRequest->phone).'</strong>.');
        } catch (\Throwable $e) {
            Log::error('Error submitting aid request: '.$e->getMessage(), [
                'exception' => $e,
                'payload' => $request->except(['photos', 'videos']),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan sistem saat memproses permohonan bantuan Anda. Silakan coba kembali beberapa saat lagi.');
        }
    }
}
