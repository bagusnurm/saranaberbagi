<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SubmitCollaborationRequest extends FormRequest
{
    /**
     * Tentukan apakah user diotorisasi membuat request ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi untuk permohonan bantuan/kolaborasi publik.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
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
            'photos.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'videos' => ['nullable', 'array', 'max:2'],
            'videos.*' => ['file', 'mimes:mp4,mov,avi', 'max:20480'],
        ];
    }

    /**
     * Pesan kustom untuk error validasi.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
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
        ];
    }
}
