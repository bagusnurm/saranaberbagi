<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class KabarController extends Controller
{
    public function __construct(
        protected PostController $postController
    ) {}

    /**
     * Halaman /kabar — Menampilkan artikel blog, edukasi, dan inspirasi (Post type = 'blog').
     */
    public function index(Request $request): View
    {
        return $this->postController->index($request, 'blog');
    }

    /**
     * Halaman /kabar/{slug} — Detail spesifik artikel blog.
     */
    public function show(string $slug): View
    {
        return $this->postController->show($slug, 'blog');
    }
}
