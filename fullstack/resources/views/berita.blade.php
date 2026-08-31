<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Berita - Sarana Berbagi</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;family=Plus+Jakarta+Sans:wght@600;700&amp;display=swap"
        rel="stylesheet">
    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "inverse-primary": "#80d5cb",
                        "primary-fixed-dim": "#80d5cb",
                        "on-secondary-container": "#266d68",
                        "on-secondary-fixed-variant": "#00504b",
                        "on-surface": "#131b2e",
                        "error-container": "#ffdad6",
                        "on-primary-fixed": "#00201d",
                        "on-surface-variant": "#3e4947",
                        "error": "#ba1a1a",
                        "tertiary-container": "#945d00",
                        "on-tertiary": "#ffffff",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-highest": "#dae2fd",
                        "on-background": "#131b2e",
                        "tertiary": "#734700",
                        "outline-variant": "#bdc9c6",
                        "surface-container-low": "#f2f3ff",
                        "surface": "#faf8ff",
                        "inverse-on-surface": "#eef0ff",
                        "primary": "#005c55",
                        "on-tertiary-container": "#ffe6cc",
                        "inverse-surface": "#283044",
                        "secondary-fixed": "#abefe8",
                        "surface-dim": "#d2d9f4",
                        "surface-tint": "#006a63",
                        "secondary-fixed-dim": "#8fd3cc",
                        "background": "#faf8ff",
                        "on-secondary": "#ffffff",
                        "tertiary-fixed": "#ffddb8",
                        "on-tertiary-fixed-variant": "#653e00",
                        "secondary-container": "#a8ece5",
                        "surface-bright": "#faf8ff",
                        "on-primary-fixed-variant": "#00504a",
                        "surface-variant": "#dae2fd",
                        "surface-container": "#eaedff",
                        "on-primary": "#ffffff",
                        "secondary": "#216963",
                        "on-primary-container": "#a3faef",
                        "on-tertiary-fixed": "#2a1700",
                        "surface-container-high": "#e2e7ff",
                        "outline": "#6e7977",
                        "on-secondary-fixed": "#00201e",
                        "tertiary-fixed-dim": "#ffb95f",
                        "on-error-container": "#93000a",
                        "primary-container": "#0f766e",
                        "primary-fixed": "#9cf2e8",
                        "on-error": "#ffffff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "stack-lg": "32px",
                        "container-max": "1280px",
                        "margin-mobile": "20px",
                        "stack-sm": "8px",
                        "section-padding": "80px",
                        "gutter": "24px",
                        "stack-md": "16px",
                        "margin-desktop": "48px"
                    },
                    "fontFamily": {
                        "body-md": ["Inter"],
                        "h1": ["Plus Jakarta Sans"],
                        "h2": ["Plus Jakarta Sans"],
                        "body-lg": ["Inter"],
                        "h1-mobile": ["Plus Jakarta Sans"],
                        "label-sm": ["Inter"],
                        "h3": ["Plus Jakarta Sans"]
                    },
                    "fontSize": {
                        "body-md": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "h1": ["48px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "h2": ["32px", {
                            "lineHeight": "1.3",
                            "fontWeight": "700"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.8",
                            "fontWeight": "400"
                        }],
                        "h1-mobile": ["32px", {
                            "lineHeight": "1.2",
                            "fontWeight": "700"
                        }],
                        "label-sm": ["14px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "h3": ["24px", {
                            "lineHeight": "1.4",
                            "fontWeight": "600"
                        }]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>

<body
    class="bg-background text-on-background antialiased selection:bg-primary-container selection:text-on-primary-container flex flex-col min-h-screen">
    <!-- TopNavBar -->
    <nav
        class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-md dark:bg-on-background/90 border-b border-outline-variant/30 shadow-sm dark:shadow-none transition-all duration-300">
        <div class="max-w-container-max mx-auto px-margin-desktop flex justify-between items-center h-20">
            <div class="flex items-center gap-4"><a class="flex items-center" href="{{ url('/') }}"><img
                        alt="Sarana Berbagi Logo" class="h-28 w-auto object-contain"
                        src="{{ asset('img/PROPERTY (2).png') }}"></a></div>
            <div class="hidden md:flex items-center gap-6"><a
                    class="text-on-surface-variant dark:text-surface-variant hover:text-primary dark:hover:text-primary-fixed transition-colors hover:bg-surface-container-low dark:hover:bg-inverse-surface rounded-lg px-3 py-2 active:scale-95 duration-200 font-body-md text-body-md"
                    href="{{ url('/') }}">Tentang Kami</a><a
                    class="text-on-surface-variant dark:text-surface-variant hover:text-primary dark:hover:text-primary-fixed transition-colors hover:bg-surface-container-low dark:hover:bg-inverse-surface rounded-lg px-3 py-2 active:scale-95 duration-200 font-body-md text-body-md"
                    href="{{ url('/program') }}">Program</a><a
                    class="text-on-surface-variant dark:text-surface-variant hover:text-primary dark:hover:text-primary-fixed transition-colors hover:bg-surface-container-low dark:hover:bg-inverse-surface rounded-lg px-3 py-2 active:scale-95 duration-200 font-body-md text-body-md"
                    href="{{ url('/kabar') }}">Kabar</a><a
                    class="text-primary dark:text-primary-fixed font-semibold border-b-2 border-primary dark:border-primary-fixed pb-1 px-3 py-2 active:scale-95 duration-200 font-body-md text-body-md"
                    href="{{ url('/berita') }}">Berita</a><a
                    class="text-on-surface-variant dark:text-surface-variant hover:text-primary dark:hover:text-primary-fixed transition-colors hover:bg-surface-container-low dark:hover:bg-inverse-surface rounded-lg px-3 py-2 active:scale-95 duration-200 font-body-md text-body-md"
                    href="{{ url('/karir') }}">Karir</a><a
                    class="text-on-surface-variant dark:text-surface-variant hover:text-primary dark:hover:text-primary-fixed transition-colors hover:bg-surface-container-low dark:hover:bg-inverse-surface rounded-lg px-3 py-2 active:scale-95 duration-200 font-body-md text-body-md"
                    href="{{ url('/digital-collaborators') }}">Digital Collaborators</a></div>
            <div class="flex items-center gap-4"><a
                    class="bg-[#F59E0B] text-white font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95"
                    href="{{ url('/donasi') }}">Donasi</a></div>
        </div>
    </nav>
    <main class="flex-grow pt-32 pb-section-padding">
        <!-- Hero Section (dari code.html: Wawasan & Inspirasi) -->
        <section class="px-margin-desktop max-w-container-max mx-auto mb-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h1 class="font-h1 text-h1-mobile md:text-h1 text-primary mb-6">Wawasan &amp; Inspirasi</h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-10">Pelajari cara memaksimalkan dampak
                    sosial Anda melalui panduan mendalam, tips filantropi, dan cerita inspiratif dari garis depan
                    perubahan.</p>
                <form method="GET" action="{{ url('/berita') }}" class="relative max-w-2xl mx-auto group">
                    <span
                        class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">search</span>
                    <input name="q" value="{{ $search }}"
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl py-4 pl-12 pr-4 font-body-md text-body-md text-on-surface placeholder:text-outline-variant focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all shadow-sm"
                        placeholder="Cari artikel, berita, atau topik..." type="text">
                </form>
            </div>
        </section>

        @if ($search)
            <!-- Hasil Pencarian -->
            <section class="px-margin-desktop max-w-container-max mx-auto mb-16">
                <h2 class="font-h2 text-h2 text-on-surface mb-8">
                    Hasil pencarian "{{ $search }}"
                    <span class="font-body-md text-body-md text-on-surface-variant">({{ $kabar->count() + $blogLainnya->count() + ($featured ? 1 : 0) }} hasil)</span>
                </h2>
                @if ($kabar->isEmpty() && $blogLainnya->isEmpty() && !$featured)
                    <div class="text-center py-16 bg-surface-container-low rounded-2xl">
                        <span class="material-symbols-outlined text-6xl text-outline">search_off</span>
                        <p class="font-body-lg text-body-lg text-on-surface-variant mt-4">
                            Tidak ada artikel yang cocok dengan pencarian Anda.</p>
                        <a href="{{ url('/berita') }}"
                            class="inline-block mt-6 text-primary font-label-sm text-label-sm hover:underline">Tampilkan
                            semua artikel</a>
                    </div>
                @endif
            </section>
        @endif

        <!-- Kabar Terbaru Section (grid dari halaman Kabar) -->
        @if ($kabar->isNotEmpty())
            <section class="px-margin-desktop max-w-container-max mx-auto mb-16">
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <h2 class="font-h2 text-h2 text-on-surface">Kabar Terbaru</h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mt-4">Kisah inspiratif, pembaruan
                        program, dan dampak yang kita ciptakan bersama untuk kemanusiaan.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($kabar as $item)
                        <article
                            class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 group border border-outline-variant/20 flex flex-col cursor-pointer"
                            data-post="{{ $item->id }}">
                            <div class="relative h-60 overflow-hidden">
                                @if ($item->thumbnail)
                                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        alt="{{ $item->title }}" src="{{ asset($item->thumbnail) }}">
                                @else
                                    <div
                                        class="w-full h-full bg-surface-variant flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                        <span class="material-symbols-outlined text-6xl text-outline">article</span>
                                    </div>
                                @endif
                                <div
                                    class="absolute top-4 left-4 bg-surface/90 backdrop-blur-sm px-3 py-1 rounded-full font-label-sm text-label-sm text-primary">
                                    {{ $item->category->name ?? 'Kabar' }}</div>
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex items-center gap-2 text-outline font-label-sm text-label-sm mb-3">
                                    <span>{{ $item->published_at?->translatedFormat('d M Y') }}</span>
                                    <span>•</span>
                                    <span>{{ $item->tags->first()?->name ?? 'Berita' }}</span>
                                </div>
                                <h3
                                    class="font-h3 text-h3 text-on-surface mb-3 group-hover:text-primary transition-colors line-clamp-2">
                                    {{ $item->title }}</h3>
                                <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-3 flex-grow">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 140) }}</p>
                                <button type="button" data-post="{{ $item->id }}"
                                    class="kabar-detail-link inline-flex items-center gap-2 text-primary font-label-sm text-label-sm hover:underline mt-auto text-left">
                                    Baca Selengkapnya <span
                                        class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                </button>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- Blog & Edukasi Section (dari code.html) -->
        @if ($featured || $blogLainnya->isNotEmpty() || $tagPills->isNotEmpty())
            <section class="py-section-padding px-margin-desktop bg-surface">
                <div class="max-w-container-max mx-auto">
                    <h2 class="font-h2 text-h2 text-primary mb-stack-lg">Blog &amp; Edukasi</h2>
                    <!-- Tag pills -->
                    <div
                        class="flex flex-col md:flex-row justify-between items-center gap-4 mb-stack-lg berita-toolbar">
                        <div class="flex flex-wrap gap-2" id="tagPills">
                            <button type="button" data-tag=""
                                class="tag-pill bg-primary text-on-primary px-4 py-2 rounded-full font-label-sm text-label-sm">Semua</button>
                            @foreach ($tagPills as $tag)
                                <button type="button" data-tag="{{ $tag->slug }}"
                                    class="tag-pill bg-surface-container-high text-on-surface-variant px-4 py-2 rounded-full font-label-sm text-label-sm hover:bg-primary/10 transition-colors">{{ $tag->name }}</button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Featured Blog Card -->
                    @if ($featured)
                        <div
                            class="mb-stack-lg bg-surface rounded-xl border border-outline-variant overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col md:flex-row cursor-pointer group"
                            data-post="{{ $featured->id }}">
                            <div class="md:w-1/2 h-64 md:h-auto bg-surface-variant bg-cover bg-center min-h-[280px]"
                                @if ($featured->thumbnail) style="background-image: url('{{ asset($featured->thumbnail) }}');"
                                @endif></div>
                            <div class="md:w-1/2 p-stack-lg flex flex-col justify-center">
                                <div class="flex items-center justify-between mb-stack-sm">
                                    <span
                                        class="bg-primary/10 text-primary px-3 py-1 rounded-full font-label-sm text-label-sm">{{ $featured->category->name ?? 'Edukasi' }}</span>
                                    <span
                                        class="font-label-sm text-label-sm text-on-surface-variant">{{ $featured->published_at?->translatedFormat('d M Y') }}</span>
                                </div>
                                <h3
                                    class="font-h2 text-h2 mb-stack-sm group-hover:text-primary transition-colors">{{ $featured->title }}</h3>
                                <p
                                    class="font-body-lg text-body-lg text-on-surface-variant mb-stack-md line-clamp-3">{{ \Illuminate\Support\Str::limit(strip_tags($featured->content), 180) }}</p>
                                <button type="button" data-post="{{ $featured->id }}"
                                    class="kabar-detail-link font-label-sm text-label-sm text-primary hover:text-primary-container flex items-center gap-1 text-left">
                                    Baca Selengkapnya <span
                                        class="material-symbols-outlined text-[16px]">arrow_forward</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    <!-- Blog Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter" id="blogGrid">
                        @foreach ($blogLainnya as $item)
                            <div class="blog-card bg-surface rounded-xl border border-outline-variant overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col"
                                data-tags="{{ $item->tags->pluck('slug')->implode(',') }}"
                                data-post="{{ $item->id }}">
                                <div class="h-48 w-full bg-surface-variant bg-cover bg-center"
                                    @if ($item->thumbnail) style="background-image: url('{{ asset($item->thumbnail) }}');"
                                    @endif></div>
                                <div class="p-stack-md flex flex-col flex-grow">
                                    <div class="flex items-center justify-between mb-stack-sm">
                                        <span
                                            class="bg-primary/10 text-primary px-3 py-1 rounded-full font-label-sm text-label-sm">{{ $item->category->name ?? 'Tips' }}</span>
                                        <span
                                            class="font-label-sm text-label-sm text-on-surface-variant">{{ $item->published_at?->translatedFormat('d M Y') }}</span>
                                    </div>
                                    <h3 class="font-h3 text-h3 mb-stack-sm line-clamp-2">{{ $item->title }}</h3>
                                    <p
                                        class="font-body-md text-body-md text-on-surface-variant mb-stack-md line-clamp-3 flex-grow">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 130) }}</p>
                                    <button type="button" data-post="{{ $item->id }}"
                                        class="kabar-detail-link font-label-sm text-label-sm text-primary hover:text-primary-container flex items-center gap-1 mt-auto text-left">
                                        Baca Selengkapnya <span
                                            class="material-symbols-outlined text-[16px]">arrow_forward</span>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($blogLainnya->isEmpty() && !$featured)
                        <div class="text-center py-16 bg-surface-container-low rounded-xl border border-outline-variant">
                            <span class="material-symbols-outlined text-6xl text-outline">edit_note</span>
                            <p class="font-body-lg text-body-lg text-on-surface-variant mt-4">
                                Belum ada artikel blog. Artikel akan tampil di sini setelah dipublikasikan dari panel
                                admin.</p>
                        </div>
                    @endif

                    <!-- Muat Lebih Banyak -->
                    <div class="mt-stack-lg flex justify-center">
                        <button type="button" id="loadMoreBtn"
                            class="hidden border-2 border-primary text-primary px-6 py-3 rounded-lg font-label-sm text-label-sm hover:bg-primary/5 transition-colors">Muat
                            Lebih Banyak</button>
                    </div>
                </div>
            </section>
        @endif
    </main>

    <!-- Detail Popup Modal (sama seperti halaman Kabar) -->
    <div class="kabar-popup fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-8" id="kabarPopup"
        style="opacity:0; visibility:hidden; transition: opacity 0.3s ease, visibility 0.3s ease;">
        <div class="absolute inset-0 bg-on-background/60 backdrop-blur-sm" onclick="closeBeritaPopup()"></div>
        <div class="relative bg-surface rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto"
            style="transform: translateY(20px) scale(0.98); transition: transform 0.3s ease;">
            <button
                class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-surface-container-low hover:bg-surface-variant flex items-center justify-center text-on-surface-variant hover:text-on-surface transition-colors"
                onclick="closeBeritaPopup()">
                <span class="material-symbols-outlined">close</span>
            </button>
            <div id="kabarPopupBody">
                <!-- Konten di-inject lewat JS -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white w-full">
        <!-- Striped pattern accent -->
        <div class="h-6 w-full opacity-20"
            style="background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, #ffffff 10px, #ffffff 20px);">
        </div>
        <div class="px-margin-desktop py-12 max-w-container-max mx-auto">
            <!-- Top Info Row -->
            <div
                class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-12 border-b border-white/20 pb-8">
                <div class="flex flex-col gap-2">
                    <p class="font-bold text-sm tracking-wider uppercase">SK KEMENKUMHAM ; AHU-0000643.AH.01.05. Tahun
                        2016</p>
                    <p class="font-bold text-sm tracking-wider uppercase">SK DINAS SOSIAL ; 400.3.6.6 / 5212 / Daysos
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <img alt="Sarana Berbagi Logo" class="h-28 w-auto object-contain"
                        src="{{ asset('img/PROPERTY (2).png') }}" />
                    <span class="font-h2 text-xl font-bold tracking-tight uppercase">SARANA<br>BERBAGI</span>
                </div>
            </div>
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-8">
                <!-- Tentang Kami Col -->
                <div class="flex flex-col gap-4 text-center md:text-left items-center md:items-start">
                    <h3 class="font-h2 text-2xl font-bold mb-2">Tentang Kami</h3>
                    <p class="font-body-md text-sm leading-relaxed text-white/90">
                        saranaberbagi.or.id Merupakan platform website donasi online yang dikelola langsung dibawah
                        naungan Yayasan Sarana Berbagi merupakan lembaga professional yang bergerak di Bidang
                        sosial,Pendidikan,Kemanusiaan dan Keagamaan. Berdiri semenjak tahun 2016. Yayasan Sarana Berbagi
                        telah berkontribusi dalam program-program sosial dan pendidikan untuk menjembatani sekaligus
                        berkontribusi pada kemaslahatan umat.
                    </p>
                </div>
                <!-- Disclaimer Col -->
                <div class="flex flex-col gap-8 text-center items-center">
                    <div class="flex flex-col gap-3 items-center">
                        <p class="font-body-md text-sm leading-relaxed text-white/90 max-w-xs">
                            Sarana Berbagi adalah lembaga professional berlokasi di Kota Bandung yang bergerak di bidang
                            sosial dan pendidikan.
                        </p>
                    </div>
                    <div class="flex flex-col gap-4 items-center">
                        <h3 class="font-h2 text-2xl font-bold">Disclaimer</h3>
                        <p class="font-body-md text-sm leading-relaxed text-white/90 max-w-xs">
                            Dana yang didonasikan melalui Yayasan Sarana Berbagi bukan bersumber dan bukan untuk tujuan
                            pencucian uang (Money Laundry), termasuk terorisme maupun kejahatan lainnya
                        </p>
                    </div>
                </div>
                <!-- Alamat Col -->
                <div class="flex flex-col gap-6">
                    <h3 class="font-h2 text-2xl font-bold">Alamat</h3>
                    <div class="flex flex-col gap-4">
                        <!-- Contact Info -->
                        <div class="flex items-center gap-3 text-sm">
                            <span class="material-symbols-outlined">chat</span>
                            <span class="">0818-0953-1647</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <span class="material-symbols-outlined">mail</span>
                            <span class="">yayasansaranaberbagi@gmail.com</span>
                        </div>
                        <div class="flex items-start gap-3 text-sm">
                            <span class="material-symbols-outlined shrink-0 mt-1">location_on</span>
                            <p class="leading-relaxed">
                                Komplek Griya Bandung Indah Blok F 19 No 10 RT 08 RW 08 Desa Buahbatu Kecamatan
                                Bojongsoang<br>
                                Kabupaten Bandung, Jawa Barat<br>
                                40287, Indonesia
                            </p>
                        </div>
                    </div>
                    <!-- Map Placeholder -->
                    <div class="w-full h-32 bg-gray-200 rounded overflow-hidden mt-2">
                        <img alt="Map Location"
                            class="w-full h-full object-cover grayscale opacity-80 mix-blend-multiply"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwbSQ6aKCbEBC-2X0avJDgu_xHWPfpejdw63Vq29Ju1OnI9kQ7sdNeVM0QhAWMPZxAI7Q9c85Bibj3m43pJGdiHRLeh8zOwx0eCI9OEWvAngbnFxy13LUrWGztCteJaNjS-kMLtQcoVeQqMBHecOSdYd9uHJoh18xyFL6l-kj9-SRRjOVH5p4O_k62Oq8Jy2Dyt5tCFQx4xN5F-UlRTRV2ZO-BS-wafarPP5HzQ6lgfI3iQg0UmZoVrw">
                    </div>
                </div>
            </div>
    </footer>

    <script>
        // Data post untuk popup detail (sama pola dengan halaman Kabar)
        const beritaData = @json($popupData);

        function openBeritaPopup(id) {
            const data = beritaData[id];
            if (!data) return;
            const popup = document.getElementById('kabarPopup');
            const body = document.getElementById('kabarPopupBody');
            body.innerHTML = data.html;
            const wrapper = popup.querySelector('div.relative');
            popup.style.opacity = '1';
            popup.style.visibility = 'visible';
            wrapper.style.transform = 'translateY(0) scale(1)';
            document.body.style.overflow = 'hidden';
        }

        function closeBeritaPopup() {
            const popup = document.getElementById('kabarPopup');
            const wrapper = popup.querySelector('div.relative');
            popup.style.opacity = '0';
            popup.style.visibility = 'hidden';
            wrapper.style.transform = 'translateY(20px) scale(0.98)';
            document.body.style.overflow = '';
        }

        document.addEventListener('click', function(e) {
            const link = e.target.closest('.kabar-detail-link');
            if (link) {
                e.preventDefault();
                e.stopPropagation();
                openBeritaPopup(link.dataset.post);
            }
        });

        // Filter tag pills pada blog grid
        document.querySelectorAll('.tag-pill').forEach(function(pill) {
            pill.addEventListener('click', function() {
                document.querySelectorAll('.tag-pill').forEach(function(p) {
                    p.classList.remove('bg-primary', 'text-on-primary');
                    p.classList.add('bg-surface-container-high', 'text-on-surface-variant');
                });
                pill.classList.add('bg-primary', 'text-on-primary');
                pill.classList.remove('bg-surface-container-high', 'text-on-surface-variant');
                const tag = pill.dataset.tag;
                document.querySelectorAll('.blog-card').forEach(function(card) {
                    const tags = card.dataset.tags.split(',');
                    card.style.display = (!tag || tags.includes(tag)) ? '' : 'none';
                });
            });
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeBeritaPopup();
        });
    </script>
</body>

</html>
