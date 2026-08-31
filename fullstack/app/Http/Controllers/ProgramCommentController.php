<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\CampaignComment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramCommentController extends Controller
{
    /**
     * Slug program di halaman /program yang dipetakan ke campaign di database.
     */
    private const PROGRAM_SLUG_MAP = [
        'berbagi-al-quran' => 'sedekah-quran-sarana-ibadah-pelosok',
    ];

    /**
     * Daftar komentar terpublikasi untuk satu program.
     * GET /program/comments?program={slug}
     */
    public function index(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'program' => 'required|string|max:191',
        ]);

        $campaignId = $this->resolveCampaignId($validated['program']);

        if ($campaignId === null) {
            return response()->json([
                'program' => $validated['program'],
                'total' => 0,
                'comments' => [],
            ]);
        }

        $comments = CampaignComment::forCampaign($campaignId)
            ->limit(100)
            ->get(['id', 'name', 'comment', 'created_at']);

        return response()->json([
            'program' => $validated['program'],
            'total' => $comments->count(),
            'comments' => $comments->map(fn ($c) => [
                'id' => $c->id,
                'name' => $c->name ?? 'Pengunjung',
                'initial' => mb_strtoupper(mb_substr($c->name ?? 'P', 0, 1)),
                'content' => $c->comment,
                'time_ago' => $c->created_at->locale('id')->diffForHumans(),
            ]),
        ]);
    }

    /**
     * Simpan komentar baru.
     * POST /program/comments  { program, name, email?, content }
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'program' => 'required|string|max:191',
            'name' => 'required|string|max:100',
            'email' => 'nullable|email|max:191',
            'content' => 'required|string|min:3|max:1000',
        ], [
            'content.min' => 'Komentar minimal 3 karakter.',
            'content.max' => 'Komentar maksimal 1000 karakter.',
            'name.max' => 'Nama maksimal 100 karakter.',
            'email.email' => 'Format email tidak valid.',
        ]);

        $campaignId = $this->resolveCampaignId($validated['program']);

        // Program belum punya campaign terkait: simpan dengan campaign_id pertama
        // (fallback) agar komentar tetap terekam; mapping bisa dilengkapi nanti.
        if ($campaignId === null) {
            $campaignId = Campaign::min('id');
        }

        if ($campaignId === null) {
            return response()->json([
                'message' => 'Belum ada program yang tersedia.',
            ], 422);
        }

        $comment = CampaignComment::create([
            'campaign_id' => $campaignId,
            'user_id' => null,
            'name' => trim($validated['name']),
            'email' => $validated['email'] ?? null,
            'comment' => trim($validated['content']),
            'is_approved' => true,
        ]);

        return response()->json([
            'message' => 'Komentar berhasil dikirim. Terima kasih atas dukungannya!',
            'comment' => [
                'id' => $comment->id,
                'name' => $comment->name,
                'initial' => mb_strtoupper(mb_substr($comment->name, 0, 1)),
                'content' => $comment->comment,
                'time_ago' => 'baru saja',
            ],
        ], 201);
    }

    /**
     * Jumlah komentar per program (untuk badge di kartu).
     * GET /program/comments/counts
     */
    public function counts(): JsonResponse
    {
        // Kembalikan per slug kartu program (bukan per campaign),
        // supaya badge langsung cocok dengan data-program di halaman.
        $slugToCampaign = collect(self::PROGRAM_SLUG_MAP);
        $fallback = Campaign::min('id');

        $rows = DB::table('campaign_comments')
            ->selectRaw('campaign_id, count(*) as total')
            ->where('is_approved', true)
            ->groupBy('campaign_id')
            ->pluck('total', 'campaign_id');

        $counts = [];
        foreach ($slugToCampaign as $cardSlug => $campaignSlug) {
            $campaignId = Campaign::where('slug', $campaignSlug)->value('id');
            $counts[$cardSlug] = $campaignId ? (int) ($rows[$campaignId] ?? 0) : 0;
        }
        // Program kartu lain (belum dipetakan) tampil 0
        $cardSlugs = [
            'berbagi-sembako', 'sarana-berbagi-fidyah', 'sarana-berbagi-karpet', 'yasabi-berani',
            'sedekah-daging', 'sarana-kafarat', 'kado-guru-ngaji', 'berdaya', 'juragan',
            'sarana-membangun-masjid', 'sarana-peduli-bencana', 'subuh-berkah', 'sarana-sedekah',
            'sarana-sehat', 'sarana-borong-jajanan', 'senin-kamis-berbagi', 'sarana-wakaf-air-sumur',
            'sarana-air-bersih',
        ];
        foreach ($cardSlugs as $slug) {
            $counts[$slug] = $counts[$slug] ?? 0;
        }

        return response()->json(['counts' => $counts]);
    }

    /**
     * Resolve slug kartu program -> campaign id (null jika tidak ditemukan).
     */
    private function resolveCampaignId(string $cardSlug): ?int
    {
        $campaignSlug = self::PROGRAM_SLUG_MAP[$cardSlug] ?? null;

        if ($campaignSlug === null) {
            return null;
        }

        return Campaign::where('slug', $campaignSlug)->value('id');
    }
}
