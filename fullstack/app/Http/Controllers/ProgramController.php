<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\View\View;

class ProgramController extends Controller
{
    /**
     * Halaman /program — Daftar program donasi yang aktif.
     * Data diambil dari tabel campaigns, dikelola via dashboard panel Filament.
     */
    public function index(): View
    {
        $campaigns = Campaign::with('category')
            ->withCount([
                'comments' => fn ($q) => $q->where('is_approved', true),
                'donations' => fn ($q) => $q->where('status', 'verified'),
            ])
            ->where('status', 'active')
            ->orderByDesc('is_featured')
            ->orderByDesc('created_at')
            ->get();

        return view('program.index', compact('campaigns'));
    }

    /**
     * Halaman /program/{slug} — Detail spesifik suatu program donasi.
     */
    public function show(string $slug): View
    {
        $campaign = Campaign::with([
            'category',
            'comments' => fn ($q) => $q->where('is_approved', true)->latest(),
            'donations' => fn ($q) => $q->where('status', 'verified')->latest()->limit(10),
        ])
            ->withCount([
                'comments' => fn ($q) => $q->where('is_approved', true),
                'donations' => fn ($q) => $q->where('status', 'verified'),
            ])
            ->where('slug', $slug)
            ->firstOrFail();

        // Rekomendasi program lainnya
        $otherCampaigns = Campaign::with('category')
            ->where('id', '!=', $campaign->id)
            ->where('status', 'active')
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('program.show', compact('campaign', 'otherCampaigns'));
    }
}
