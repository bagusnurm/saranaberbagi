<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sarana Berbagi - Melayani dengan Hati, Berbagi untuk Negeri')</title>

    <!-- SEO & Metadata -->
    <meta name="description" content="@yield('meta_description', 'Sarana Berbagi - Melayani dengan Hati, Berbagi untuk Negeri. Lembaga pengelola donasi dan program kebaikan yang amanah.')">
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:site_name" content="Sarana Berbagi">
    <meta property="og:title" content="@yield('og_title', View::yieldContent('title', 'Sarana Berbagi - Melayani dengan Hati, Berbagi untuk Negeri'))">
    <meta property="og:description" content="@yield('og_description', View::yieldContent('meta_description', 'Sarana Berbagi - Melayani dengan Hati, Berbagi untuk Negeri. Lembaga pengelola donasi dan program kebaikan yang amanah.'))">
    <meta property="og:image" content="@yield('og_image', asset('img/logo-sarana-berbagi.png'))">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', View::yieldContent('og_title', View::yieldContent('title', 'Sarana Berbagi')))">
    <meta name="twitter:description" content="@yield('twitter_description', View::yieldContent('og_description', View::yieldContent('meta_description', 'Sarana Berbagi - Melayani dengan Hati, Berbagi untuk Negeri.')))">
    <meta name="twitter:image" content="@yield('twitter_image', View::yieldContent('og_image', asset('img/logo-sarana-berbagi.png')))">
    @stack('meta')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    <!-- Vite Assets (Tailwind CSS v4 + JS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        body {
            font-family: 'Inter', sans-serif;
        }
        h1, h2, h3, .brand-font {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-background text-on-background antialiased font-body-md text-body-md flex flex-col min-h-screen">
    {{-- Top Navigation Bar --}}
    @include('layouts.navbar')

    {{-- Main Content Slot --}}
    <main class="flex-grow pt-[100px] md:pt-[110px]">
        @yield('content')
    </main>

    {{-- Global Footer --}}
    @include('layouts.footer')

    {{-- Stacked Scripts --}}
    @stack('scripts')
</body>

</html>
