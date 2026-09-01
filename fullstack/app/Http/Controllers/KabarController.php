<?php

namespace App\Http\Controllers;

use App\Models\ContentCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KabarController extends Controller
{
    /**
     * Halaman /kabar — Menampilkan artikel blog, edukasi, dan inspirasi (Post type = 'blog').
     */
    public function index(Request $request): View
    {
        $search = $request->query('q');
        $selectedCategory = $request->query('kategori');

        $query = Post::with(['category', 'tags', 'author'])
            ->where('type', 'blog')
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

        $blogs = $query->get();

        // Kategori yang memiliki post bertipe blog
        $categories = ContentCategory::whereHas('posts', fn ($q) => $q
            ->where('type', 'blog')
            ->where('status', 'published')
        )->orderBy('name')->get();

        return view('kabar.index', compact('blogs', 'categories', 'selectedCategory', 'search'));
    }

    /**
     * Halaman /kabar/{slug} — Detail spesifik artikel blog.
     */
    public function show(string $slug): View
    {
        $post = Post::with(['category', 'tags', 'author'])
            ->where('type', 'blog')
            ->where('status', 'published')
            ->where('slug', $slug)
            ->firstOrFail();

        $otherPosts = Post::with(['category', 'author'])
            ->where('type', 'blog')
            ->where('status', 'published')
            ->where('id', '!=', $post->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('kabar.show', compact('post', 'otherPosts'));
    }
}
