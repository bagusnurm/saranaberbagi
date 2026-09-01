@extends('layouts.app')

@section('title', 'Kabar & Inspirasi - Sarana Berbagi')

@section('content')
    <div class="pt-6 pb-section-padding">
        <div class="max-w-container-max mx-auto px-margin-desktop">
            {{-- Header & Pencarian Kabar --}}
            @include('kabar.components.hero-section', ['search' => $search ?? ''])

            {{-- Filter Kategori --}}
            @include('kabar.components.filter-kategori', [
                'categories' => $categories,
                'selectedCategory' => $selectedCategory ?? null,
            ])

            {{-- Grid Kartu Kabar --}}
            @include('kabar.components.daftar-kabar', [
                'blogs' => $blogs,
            ])
        </div>
    </div>
@endsection
