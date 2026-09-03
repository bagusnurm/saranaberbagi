<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobVacancy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KarirController extends Controller
{
    /**
     * Halaman /karir — Daftar lowongan pekerjaan dan form lamaran.
     */
    public function index(Request $request): View
    {
        $selectedType = $request->query('type');
        $search = $request->query('q');

        $query = JobVacancy::where('status', 'open')
            ->orderByDesc('created_at');

        if ($selectedType && in_array($selectedType, ['fulltime', 'parttime', 'volunteer'])) {
            $query->where('employment_type', $selectedType);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $vacancies = $query->get();
        $allOpenVacancies = JobVacancy::where('status', 'open')->orderBy('title')->get();

        return view('karir.index', compact('vacancies', 'allOpenVacancies', 'selectedType', 'search'));
    }

    /**
     * Halaman /karir/{slug} — Detail spesifik lowongan pekerjaan.
     */
    public function show(string $slug): View
    {
        $vacancy = JobVacancy::where('slug', $slug)
            ->where('status', 'open')
            ->firstOrFail();

        // Rekomendasi lowongan lainnya (mengacak ID di memori untuk menghindari ORDER BY RANDOM() pada database)
        $otherIds = JobVacancy::where('id', '!=', $vacancy->id)
            ->where('status', 'open')
            ->pluck('id');

        $otherVacancies = $otherIds->isNotEmpty()
            ? JobVacancy::whereIn('id', $otherIds->random(min(3, $otherIds->count())))->get()
            : collect();

        return view('karir.show', compact('vacancy', 'otherVacancies'));
    }

    /**
     * POST /karir/apply — Pengajuan formulir lamaran & upload berkas CV.
     */
    public function apply(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'job_vacancy_id' => 'required|exists:job_vacancies,id',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120', // Maks 5MB
            'pesan' => 'nullable|string|max:2000',
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'telepon.required' => 'Nomor telepon / WhatsApp wajib diisi.',
            'job_vacancy_id.required' => 'Silakan pilih posisi lowongan yang ingin dilamar.',
            'job_vacancy_id.exists' => 'Posisi lowongan yang dipilih tidak valid.',
            'cv.required' => 'Berkas CV / Resume wajib diunggah.',
            'cv.mimes' => 'Format CV harus berformat PDF, DOC, atau DOCX.',
            'cv.max' => 'Ukuran berkas CV maksimal 5MB.',
        ]);

        // Simpan file CV ke storage/app/public/cv_applications
        $cvPath = $request->file('cv')->store('cv_applications', 'public');

        // Simpan data lamaran ke database tabel job_applications
        JobApplication::create([
            'job_vacancy_id' => $validated['job_vacancy_id'],
            'applicant_name' => trim($validated['nama']),
            'email' => trim($validated['email']),
            'phone' => trim($validated['telepon']),
            'cv_file' => $cvPath,
            'cover_letter' => ! empty($validated['pesan']) ? trim($validated['pesan']) : null,
            'status' => 'pending',
        ]);

        return redirect()->back()
            ->with('success', 'Lamaran Anda berhasil dikirim! Tim HR Sarana Berbagi akan meninjau berkas Anda dan menghubungi melalui WhatsApp / Email.');
    }
}
