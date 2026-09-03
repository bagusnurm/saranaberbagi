<?php

namespace App\Http\Controllers;

use App\Models\AidRequest;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'campaign_id' => ['nullable', 'exists:campaigns,id'],
            'applicant_name' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'digits:16'],
            'kk_number' => ['required', 'string', 'digits:16'],
            'birthdate' => ['required', 'date', 'before:today'],
            'gender' => ['required', 'in:male,female'],
            'occupation' => ['nullable', 'string', 'max:255'],
            'marital_status' => ['required', 'in:belum_menikah,menikah,cerai_hidup,cerai_mati'],
            'is_mualaf' => ['nullable'],
            'phone' => ['required', 'string', 'max:20'],
            'province' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'village' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:1000'],
            'fund_needed' => ['required', 'numeric', 'min:10000'],
            'bank_name' => ['required', 'string', 'max:100'],
            'bank_account_number' => ['required', 'string', 'max:50'],
            'bank_account_holder' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2500'],
            'photos' => ['nullable', 'array', 'max:5'],
            'photos.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:5120'], // Max 5MB per image
            'videos' => ['nullable', 'array', 'max:2'],
            'videos.*' => ['file', 'mimes:mp4,mov,avi', 'max:20480'], // Max 20MB per video
        ], [
            'applicant_name.required' => 'Nama pemohon wajib diisi.',
            'nik.required' => 'Nomor NIK wajib diisi.',
            'nik.digits' => 'Nomor NIK harus 16 digit angka.',
            'kk_number.required' => 'Nomor KK wajib diisi.',
            'kk_number.digits' => 'Nomor KK harus 16 digit angka.',
            'birthdate.required' => 'Tanggal lahir wajib diisi.',
            'birthdate.before' => 'Tanggal lahir tidak valid.',
            'gender.required' => 'Pilih jenis kelamin pemohon.',
            'marital_status.required' => 'Pilih status perkawinan.',
            'phone.required' => 'Nomor WhatsApp / HP wajib diisi.',
            'province.required' => 'Provinsi wajib diisi.',
            'city.required' => 'Kota / Kabupaten wajib diisi.',
            'village.required' => 'Kecamatan / Kelurahan wajib diisi.',
            'address.required' => 'Alamat lengkap wajib diisi.',
            'fund_needed.required' => 'Nominal kebutuhan biaya wajib diisi.',
            'fund_needed.min' => 'Nominal kebutuhan minimal Rp 10.000.',
            'bank_name.required' => 'Nama bank wajib diisi.',
            'bank_account_number.required' => 'Nomor rekening wajib diisi.',
            'bank_account_holder.required' => 'Nama pemilik rekening wajib diisi.',
            'description.required' => 'Ceritakan alasan dan detail kebutuhan bantuan.',
            'photos.*.image' => 'Berkas foto harus berupa gambar yang valid (JPEG, PNG, JPG, WEBP).',
            'photos.*.max' => 'Ukuran foto maksimal 5MB per berkas.',
            'videos.*.max' => 'Ukuran video maksimal 20MB per berkas.',
        ]);

        try {
            DB::beginTransaction();

            $photoPaths = [];
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('aid-requests/photos', 'public');
                    $photoPaths[] = $path;
                }
            }

            $videoPaths = [];
            if ($request->hasFile('videos')) {
                foreach ($request->file('videos') as $video) {
                    $path = $video->store('aid-requests/videos', 'public');
                    $videoPaths[] = $path;
                }
            }

            $aidRequest = AidRequest::create([
                'campaign_id' => $validated['campaign_id'] ?? null,
                'applicant_name' => $validated['applicant_name'],
                'nik' => $validated['nik'],
                'kk_number' => $validated['kk_number'],
                'birthdate' => $validated['birthdate'],
                'gender' => $validated['gender'],
                'occupation' => $validated['occupation'] ?? null,
                'marital_status' => $validated['marital_status'],
                'is_mualaf' => (bool) ($request->input('is_mualaf') == '1' || $request->input('is_mualaf') === true),
                'phone' => $validated['phone'],
                'province' => $validated['province'],
                'city' => $validated['city'],
                'village' => $validated['village'],
                'address' => $validated['address'],
                'photos' => ! empty($photoPaths) ? $photoPaths : null,
                'videos' => ! empty($videoPaths) ? $videoPaths : null,
                'fund_needed' => $validated['fund_needed'],
                'bank_name' => $validated['bank_name'],
                'bank_account_number' => $validated['bank_account_number'],
                'bank_account_holder' => $validated['bank_account_holder'],
                'description' => $validated['description'],
                'status' => 'pending',
                'admin_note' => null,
            ]);

            DB::commit();

            return redirect()
                ->route('kolaborasi.index')
                ->with('success', 'Permohonan bantuan Anda atas nama <strong>'.e($aidRequest->applicant_name).'</strong> berhasil diajukan! Tim Sarana Berbagi akan memverifikasi berkas dan menghubungi Anda melalui nomor WhatsApp <strong>'.e($aidRequest->phone).'</strong>.');
        } catch (\Exception $e) {
            DB::rollBack();
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
