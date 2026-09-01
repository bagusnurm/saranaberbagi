@extends('layouts.app')

@section('title', 'Warta & Berita Kegiatan - Sarana Berbagi')

@section('content')
    <div class="pt-6 pb-section-padding">
        {{-- 1. Hero Header & Form Pencarian --}}
        @include('berita.components.hero-search')

        {{-- 2. Filter Kategori Berita --}}
        @include('berita.components.category-filters')

        {{-- 3. Berita Utama / Highlight Unggulan --}}
        @include('berita.components.featured-news')

        {{-- 4. Daftar Berita Lengkap --}}
        @include('berita.components.daftar-berita')
    </div>
@endsection
