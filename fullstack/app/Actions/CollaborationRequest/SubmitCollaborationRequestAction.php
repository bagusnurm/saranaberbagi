<?php

namespace App\Actions\CollaborationRequest;

use App\Models\AidRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class SubmitCollaborationRequestAction
{
    /**
     * Menyimpan berkas permohonan bantuan/kolaborasi beserta file bukti ke storage dalam transaksi database.
     *
     * @param  array<string, mixed>  $data
     * @param  array<UploadedFile>  $photos
     * @param  array<UploadedFile>  $videos
     */
    public function execute(array $data, array $photos = [], array $videos = [], bool $isMualaf = false): AidRequest
    {
        return DB::transaction(function () use ($data, $photos, $videos, $isMualaf) {
            $photoPaths = [];
            foreach ($photos as $photo) {
                $photoPaths[] = $photo->store('aid-requests/photos', 'public');
            }

            $videoPaths = [];
            foreach ($videos as $video) {
                $videoPaths[] = $video->store('aid-requests/videos', 'public');
            }

            return AidRequest::create([
                'campaign_id' => $data['campaign_id'] ?? null,
                'applicant_name' => $data['applicant_name'],
                'nik' => $data['nik'],
                'kk_number' => $data['kk_number'],
                'birthdate' => $data['birthdate'],
                'gender' => $data['gender'],
                'occupation' => $data['occupation'] ?? null,
                'marital_status' => $data['marital_status'],
                'is_mualaf' => $isMualaf,
                'phone' => $data['phone'],
                'province' => $data['province'],
                'city' => $data['city'],
                'village' => $data['village'],
                'address' => $data['address'],
                'photos' => ! empty($photoPaths) ? $photoPaths : null,
                'videos' => ! empty($videoPaths) ? $videoPaths : null,
                'fund_needed' => $data['fund_needed'],
                'bank_name' => $data['bank_name'],
                'bank_account_number' => $data['bank_account_number'],
                'bank_account_holder' => $data['bank_account_holder'],
                'description' => $data['description'],
                'status' => 'pending',
                'admin_note' => null,
            ]);
        });
    }
}
