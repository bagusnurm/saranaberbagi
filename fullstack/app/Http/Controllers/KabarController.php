<?php

namespace App\Http\Controllers;

use App\Actions\Post\ListPostsAction;
use App\Actions\Post\ShowPostAction;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KabarController extends Controller
{
    public function __construct(
        protected ListPostsAction $listPostsAction,
        protected ShowPostAction $showPostAction
    ) {}

    /**
     * Halaman /kabar — Menampilkan artikel blog, edukasi, dan inspirasi (Post type = 'blog').
     */
    public function index(Request $request): View
    {
        $data = $this->listPostsAction->execute(
            type: 'blog',
            search: $request->query('q'),
            selectedCategory: $request->query('kategori')
        );

        $blogs = $data['posts'];
        $categories = $data['categories'];
        $selectedCategory = $data['selectedCategory'];
        $search = $data['search'];

        return view('kabar.index', compact(
            'blogs',
            'categories',
            'selectedCategory',
            'search'
        ));
    }

    /**
     * Halaman /kabar/{slug} — Detail spesifik artikel blog.
     */
    public function show(string $slug): View
    {
        $data = $this->showPostAction->execute($slug, 'blog');

        return view('kabar.show', [
            'post' => $data['post'],
            'otherPosts' => $data['otherPosts'],
        ]);
    }
}
