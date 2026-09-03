<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\CampaignComment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProgramCommentController extends Controller
{
    /**
     * Daftar komentar terpublikasi untuk satu campaign.
     * GET /program/comments?program={campaign_slug}
     */
    public function index(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'program' => 'required|string|max:191',
        ]);

        $campaign = Campaign::where('slug', $validated['program'])->first();

        if (! $campaign) {
            return response()->json([
                'program' => $validated['program'],
                'total' => 0,
                'comments' => [],
            ]);
        }

        $comments = CampaignComment::where('campaign_id', $campaign->id)
            ->where('is_approved', true)
            ->latest()
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

        $campaign = Campaign::where('slug', $validated['program'])->first();

        if (! $campaign) {
            return response()->json([
                'message' => 'Program tidak ditemukan.',
            ], 422);
        }

        $comment = CampaignComment::create([
            'campaign_id' => $campaign->id,
            'user_id' => auth()->id(),
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
     * Jumlah komentar per campaign (untuk badge di kartu).
     * GET /program/comments/counts
     */
    public function counts(): JsonResponse
    {
        $campaigns = Campaign::where('status', 'active')
            ->withCount(['comments' => fn ($q) => $q->where('is_approved', true)])
            ->get(['id', 'slug']);

        $counts = [];
        foreach ($campaigns as $campaign) {
            $counts[$campaign->slug] = $campaign->comments_count;
        }

        return response()->json(['counts' => $counts]);
    }
}
