<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('q');

        // Kabar Terbaru: post bertipe news
        $kabar = Post::with(['category', 'tags', 'author'])
            ->where('type', 'news')
            ->where('status', 'published')
            ->when($search, fn ($q) => $q->where(fn ($w) => $w
                ->where('title', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%")))
            ->orderByDesc('published_at')
            ->get();

        // Blog & Edukasi: post bertipe blog
        $blog = Post::with(['category', 'tags', 'author'])
            ->where('type', 'blog')
            ->where('status', 'published')
            ->when($search, fn ($q) => $q->where(fn ($w) => $w
                ->where('title', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%")))
            ->orderByDesc('published_at')
            ->get();

        $featured = $blog->first();
        $blogLainnya = $blog->skip(1)->values();

        // Tag pills unik dari semua post
        $tagPills = Tag::whereHas('posts', fn ($q) => $q->whereIn('type', ['news', 'blog'])
            ->where('status', 'published'))
            ->orderBy('name')
            ->get();

        // Data popup detail per post (sama pola dengan popup di halaman Kabar)
        $popupData = $kabar->concat($blog)
            ->mapWithKeys(fn ($post) => [$post->id => $this->buildPopup($post)])
            ->all();

        return view('berita', compact('kabar', 'featured', 'blogLainnya', 'tagPills', 'search', 'popupData'));
    }

    private function buildPopup(Post $post): array
    {
        $author = $post->author?->name ?? 'Tim Redaksi';

        $html = view('berita._popup', ['post' => $post, 'author' => $author])->render();

        return ['html' => $html];
    }
}
