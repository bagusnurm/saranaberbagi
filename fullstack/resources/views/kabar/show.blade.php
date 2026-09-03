@extends('layouts.app')

@section('title', $post->title . ' - Kabar Sarana Berbagi')
@section('meta_description', Str::limit(strip_tags($post->content ?? ''), 160))
@section('og_image', $post->thumbnail ? (str_starts_with($post->thumbnail, 'http') ? $post->thumbnail : asset('storage/' . $post->thumbnail)) : asset('img/logo-sarana-berbagi.png'))

@section('content')
    @php
        $thumbnailUrl = $post->thumbnail
            ? (str_starts_with($post->thumbnail, 'http') ? $post->thumbnail : asset('storage/' . $post->thumbnail))
            : 'https://placehold.co/1200x600/0f766e/ffffff?text=' . urlencode($post->title);

        $readingTime = max(1, round(str_word_count(strip_tags($post->content)) / 200));
        $authorName = $post->author?->name ?? 'Tim Redaksi';
    @endphp

    <div class="pt-6 pb-section-padding px-margin-desktop max-w-container-max mx-auto w-full">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-on-surface-variant mb-6" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" class="hover:text-primary transition-colors">Beranda</a>
            <span class="text-outline-variant">/</span>
            <a href="{{ url('/kabar') }}" class="hover:text-primary transition-colors">Kabar</a>
            <span class="text-outline-variant">/</span>
            <span class="text-on-surface font-semibold truncate max-w-xs md:max-w-md">{{ $post->title }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            {{-- Main Column (Left, 8 Cols) --}}
            <article class="lg:col-span-8 space-y-8">
                {{-- Header Card --}}
                <div class="bg-surface-container-lowest rounded-3xl p-6 md:p-10 border border-outline-variant/30 shadow-sm space-y-4">
                    <div class="flex flex-wrap items-center gap-3">
                        @if ($post->category)
                            <span class="bg-primary/10 text-primary font-bold text-xs px-3.5 py-1 rounded-full uppercase tracking-wider">
                                {{ $post->category->name }}
                            </span>
                        @endif
                        <span class="text-xs text-on-surface-variant flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">schedule</span>
                            {{ $post->published_at ? $post->published_at->locale('id')->isoFormat('D MMMM Y') : $post->created_at->locale('id')->isoFormat('D MMMM Y') }}
                        </span>
                        <span class="text-xs text-on-surface-variant">• {{ $readingTime }} min baca</span>
                    </div>

                    <h1 class="font-h1 text-h2 md:text-h1 text-on-surface leading-tight font-extrabold">
                        {{ $post->title }}
                    </h1>

                    <div class="flex items-center gap-3 pt-2">
                        <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xs uppercase">
                            {{ mb_substr($authorName, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-sm font-bold text-on-surface">{{ $authorName }}</p>
                            <p class="text-xs text-on-surface-variant">Penulis & Kontributor</p>
                        </div>
                    </div>
                </div>

                {{-- Featured Image --}}
                <div class="bg-surface-container-lowest rounded-3xl overflow-hidden border border-outline-variant/30 shadow-sm">
                    <div class="aspect-video w-full overflow-hidden">
                        <img src="{{ $thumbnailUrl }}"
                            alt="{{ $post->title }}"
                            class="w-full h-full object-cover"
                            loading="lazy">
                    </div>
                </div>

                {{-- Full Rich Content --}}
                <div class="bg-surface-container-lowest rounded-3xl p-6 md:p-10 border border-outline-variant/30 shadow-sm">
                    <div class="prose max-w-none text-on-surface font-body-md text-base md:text-lg leading-relaxed space-y-6">
                        {!! $post->content !!}
                    </div>

                    {{-- Tags --}}
                    @if ($post->tags->isNotEmpty())
                        <div class="pt-8 mt-8 border-t border-outline-variant/20 flex flex-wrap items-center gap-2">
                            <span class="text-xs font-bold text-on-surface-variant uppercase tracking-wider mr-2">Topik Terkait:</span>
                            @foreach ($post->tags as $tag)
                                <span class="bg-surface-container hover:bg-surface-container-high text-on-surface-variant text-xs font-medium px-3 py-1 rounded-full border border-outline-variant/30">
                                    #{{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    {{-- Share Bottom CTA --}}
                    <div class="pt-6 mt-6 border-t border-outline-variant/20 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <span class="text-sm font-semibold text-on-surface">Bagikan artikel ini:</span>
                        <div class="flex items-center gap-2.5">
                            <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url()->current()) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex items-center gap-1.5 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow-sm transition-all active:scale-95">
                                <span class="material-symbols-outlined text-[16px]">chat</span>
                                <span>WhatsApp</span>
                            </a>
                            <button type="button"
                                onclick="navigator.clipboard.writeText('{{ url()->current() }}'); alert('Tautan artikel berhasil disalin!');"
                                class="flex items-center gap-1.5 bg-surface-container hover:bg-surface-container-high text-on-surface text-xs font-bold px-4 py-2.5 rounded-xl border border-outline-variant/30 transition-all active:scale-95">
                                <span class="material-symbols-outlined text-[16px]">link</span>
                                <span>Salin Link</span>
                            </button>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Sidebar Column (Right, 4 Cols Sticky) --}}
            <aside class="hidden lg:block lg:col-span-4 sticky top-28 space-y-6">
                {{-- Recommended Articles --}}
                @if ($otherPosts->isNotEmpty())
                    <div class="bg-surface-container-lowest rounded-3xl p-6 md:p-8 border border-outline-variant/30 shadow-sm space-y-6">
                        <h3 class="font-h3 text-lg font-bold text-on-surface pb-3 border-b border-outline-variant/20">
                            Artikel Lainnya
                        </h3>

                        <div class="space-y-4">
                            @foreach ($otherPosts as $other)
                                @php
                                    $otherThumb = $other->thumbnail
                                        ? (str_starts_with($other->thumbnail, 'http') ? $other->thumbnail : asset('storage/' . $other->thumbnail))
                                        : 'https://placehold.co/100x100/0f766e/ffffff?text=SB';
                                @endphp
                                <a href="{{ route('kabar.show', $other->slug) }}" class="flex items-center gap-3.5 group">
                                    <img src="{{ $otherThumb }}"
                                        alt="{{ $other->title }}"
                                        class="w-16 h-16 rounded-2xl object-cover shrink-0 border border-outline-variant/30 group-hover:scale-105 transition-transform"
                                        loading="lazy">
                                    <div class="flex-1 min-w-0">
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-primary">{{ $other->category?->name ?? 'Artikel' }}</span>
                                        <p class="text-xs font-bold text-on-surface group-hover:text-primary transition-colors line-clamp-2 leading-snug mt-0.5">
                                            {{ $other->title }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <a href="{{ url('/kabar') }}"
                            class="block w-full text-center text-xs font-bold text-primary hover:underline pt-2">
                            Lihat Semua Artikel &rarr;
                        </a>
                    </div>
                @endif

                {{-- Donation Banner CTA --}}
                <div class="bg-gradient-to-br from-primary to-primary-container text-white rounded-3xl p-6 md:p-8 shadow-md space-y-4">
                    <span class="material-symbols-outlined text-3xl text-on-primary-container">volunteer_activism</span>
                    <h3 class="font-h3 text-lg font-bold">Salurkan Kebaikan Bersama Kami</h3>
                    <p class="text-xs text-white/90 leading-relaxed">
                        Setiap donasi Anda menghadirkan senyum dan harapan baru bagi mereka yang membutuhkan.
                    </p>
                    <a href="{{ url('/donasi') }}"
                        class="inline-block w-full text-center bg-[#F59E0B] hover:bg-[#D97706] text-white font-bold text-xs py-3 rounded-xl transition-all shadow active:scale-95">
                        Donasi Sekarang
                    </a>
                </div>
            </aside>
        </div>
    </div>
@endsection
