<?php

namespace App\Http\Controllers;

use App\Actions\Post\ListPostsAction;
use App\Actions\Post\ShowPostAction;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BeritaController extends Controller
{
    public function __construct(
        protected ListPostsAction $listPostsAction,
        protected ShowPostAction $showPostAction
    ) {}

    /**
     * Halaman /berita — Menampilkan warta berita & kabar terbaru (Post type = 'news').
     */
    public function index(Request $request): View
    {
        $data = $this->listPostsAction->execute(
            type: 'news',
            search: $request->query('q'),
            selectedCategory: $request->query('kategori')
        );

        $allNews = $data['posts'];
        $featuredNews = $allNews->first();
        $newsList = $allNews->skip(1)->values();
        $categories = $data['categories'];
        $selectedCategory = $data['selectedCategory'];
        $search = $data['search'];

        return view('berita.index', compact(
            'allNews',
            'featuredNews',
            'newsList',
            'categories',
            'selectedCategory',
            'search'
        ));
    }

    /**
     * Halaman /berita/{slug} — Detail spesifik berita penyaluran / warta kegiatan.
     */
    public function show(string $slug): View
    {
        $data = $this->showPostAction->execute($slug, 'news');

        return view('berita.show', [
            'post' => $data['post'],
            'otherPosts' => $data['otherPosts'],
        ]);
    }
}
