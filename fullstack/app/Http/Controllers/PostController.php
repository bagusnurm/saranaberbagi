<?php

namespace App\Http\Controllers;

use App\Models\ContentCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Menampilkan daftar post ('news' untuk Warta Berita, 'blog' untuk Kabar/Inspirasi).
     */
    public function index(Request $request, string $type = 'news'): View
    {
        $search = $request->query('q');
        $selectedCategory = $request->query('kategori');

        $query = Post::with(['category', 'tags', 'author'])
            ->where('type', $type)
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

        $posts = $query->get();

        $categories = ContentCategory::whereHas('posts', fn ($q) => $q
            ->where('type', $type)
            ->where('status', 'published')
        )->orderBy('name')->get();

        if ($type === 'news') {
            $allNews = $posts;
            $featuredNews = $allNews->first();
            $newsList = $allNews->skip(1)->values();

            return view('berita.index', compact(
                'allNews',
                'featuredNews',
                'newsList',
                'categories',
                'selectedCategory',
                'search'
            ));
        }

        $blogs = $posts;

        return view('kabar.index', compact(
            'blogs',
            'categories',
            'selectedCategory',
            'search'
        ));
    }

    /**
     * Menampilkan detail spesifik suatu post berdasarkan slug dan tipe.
     */
    public function show(string $slug, string $type = 'news'): View
    {
        $post = Post::with(['category', 'tags', 'author'])
            ->where('type', $type)
            ->where('status', 'published')
            ->where('slug', $slug)
            ->firstOrFail();

        $otherPosts = Post::with(['category', 'author'])
            ->where('type', $type)
            ->where('status', 'published')
            ->where('id', '!=', $post->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $viewName = $type === 'news' ? 'berita.show' : 'kabar.show';

        return view($viewName, compact('post', 'otherPosts'));
    }
}
