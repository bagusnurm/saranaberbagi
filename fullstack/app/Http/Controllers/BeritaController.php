<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class BeritaController extends Controller
{
    public function __construct(
        protected PostController $postController
    ) {}

    /**
     * Halaman /berita — Menampilkan warta berita & kabar terbaru (Post type = 'news').
     */
    public function index(Request $request): View
    {
        return $this->postController->index($request, 'news');
    }

    /**
     * Halaman /berita/{slug} — Detail spesifik berita penyaluran / warta kegiatan.
     */
    public function show(string $slug): View
    {
        return $this->postController->show($slug, 'news');
    }
}
