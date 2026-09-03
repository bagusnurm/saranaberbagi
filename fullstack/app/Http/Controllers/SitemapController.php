<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\JobVacancy;
use App\Models\Post;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $staticUrls = [
            ['url' => url('/'), 'priority' => '1.0', 'changefreq' => 'daily', 'lastmod' => now()->toAtomString()],
            ['url' => url('/program'), 'priority' => '0.9', 'changefreq' => 'daily', 'lastmod' => now()->toAtomString()],
            ['url' => url('/donasi'), 'priority' => '0.9', 'changefreq' => 'weekly', 'lastmod' => now()->toAtomString()],
            ['url' => url('/kabar'), 'priority' => '0.8', 'changefreq' => 'daily', 'lastmod' => now()->toAtomString()],
            ['url' => url('/berita'), 'priority' => '0.8', 'changefreq' => 'daily', 'lastmod' => now()->toAtomString()],
            ['url' => url('/karir'), 'priority' => '0.7', 'changefreq' => 'weekly', 'lastmod' => now()->toAtomString()],
            ['url' => url('/kolaborasi'), 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => now()->toAtomString()],
        ];

        // Dynamic Campaigns
        $campaigns = Campaign::where('status', 'active')
            ->orWhereNull('status')
            ->select('slug', 'updated_at')
            ->get()
            ->map(function ($c) {
                return [
                    'url' => url('/program/'.$c->slug),
                    'priority' => '0.8',
                    'changefreq' => 'daily',
                    'lastmod' => ($c->updated_at ?? now())->toAtomString(),
                ];
            });

        // Dynamic Posts (Kabar & Berita)
        $posts = Post::where('status', 'published')
            ->orWhereNull('status')
            ->select('slug', 'type', 'updated_at')
            ->get()
            ->map(function ($p) {
                $base = ($p->type === 'news') ? '/berita/' : '/kabar/';

                return [
                    'url' => url($base.$p->slug),
                    'priority' => '0.7',
                    'changefreq' => 'weekly',
                    'lastmod' => ($p->updated_at ?? now())->toAtomString(),
                ];
            });

        // Dynamic Karir
        $vacancies = JobVacancy::where('status', 'open')
            ->orWhere('status', 'active')
            ->orWhereNull('status')
            ->select('slug', 'updated_at')
            ->get()
            ->map(function ($j) {
                return [
                    'url' => url('/karir/'.$j->slug),
                    'priority' => '0.6',
                    'changefreq' => 'weekly',
                    'lastmod' => ($j->updated_at ?? now())->toAtomString(),
                ];
            });

        $allUrls = collect($staticUrls)
            ->concat($campaigns)
            ->concat($posts)
            ->concat($vacancies);

        $xml = view('sitemap', ['urls' => $allUrls])->render();

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
        ]);
    }
}
