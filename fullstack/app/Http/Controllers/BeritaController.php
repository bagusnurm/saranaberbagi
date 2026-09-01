<?php

namespace App\Http\Controllers;

use App\Models\ContentCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BeritaController extends Controller
{
    /**
     * Halaman /berita — Menampilkan warta berita & kabar terbaru (Post type = 'news').
     */
    public function index(Request $request): View
    {
        $search = $request->query('q');
        $selectedCategory = $request->query('kategori');

        $query = Post::with(['category', 'tags', 'author'])
            ->where('type', 'news')
            ->where('status', 'published')
            ->orderByDesc('published_at');

        if ($selectedCategory) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $selectedCategory));
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $allNews = $query->get();
        $featuredNews = $allNews->first();
        $newsList = $allNews->skip(1)->values();

        // Kategori yang memiliki post bertipe news
        $categories = ContentCategory::whereHas('posts', fn ($q) => $q
            ->where('type', 'news')
            ->where('status', 'published')
        )->orderBy('name')->get();

        return view('berita.index', compact('allNews', 'featuredNews', 'newsList', 'categories', 'selectedCategory', 'search'));
    }

    /**
     * Halaman /berita/{slug} — Detail spesifik berita penyaluran / warta kegiatan.
     */
    public function show(string $slug): View
    {
        $post = Post::with(['category', 'tags', 'author'])
            ->where('type', 'news')
            ->where('status', 'published')
            ->where('slug', $slug)
            ->firstOrFail();

        $otherPosts = Post::with(['category', 'author'])
            ->where('type', 'news')
            ->where('status', 'published')
            ->where('id', '!=', $post->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('berita.show', compact('post', 'otherPosts'));
    }
}
