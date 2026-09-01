<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sarana Berbagi - Melayani dengan Hati, Berbagi untuk Negeri')</title>

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

    <!-- Tailwind CSS with plugins -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
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
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "3xl": "1.5rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "stack-lg": "32px",
                        "container-max": "1280px",
                        "margin-mobile": "20px",
                        "stack-sm": "8px",
                        "section-padding": "80px",
                        "gutter": "24px",
                        "stack-md": "16px",
                        "margin-desktop": "48px"
                    },
                    fontFamily: {
                        "body-md": ["Inter", "sans-serif"],
                        "body-lg": ["Inter", "sans-serif"],
                        "label-sm": ["Inter", "sans-serif"],
                        "h1": ["Plus Jakarta Sans", "sans-serif"],
                        "h2": ["Plus Jakarta Sans", "sans-serif"],
                        "h3": ["Plus Jakarta Sans", "sans-serif"],
                        "h1-mobile": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    fontSize: {
                        "body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "body-lg": ["18px", { "lineHeight": "1.8", "fontWeight": "400" }],
                        "label-sm": ["14px", { "lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600" }],
                        "h1": ["48px", { "lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "h2": ["32px", { "lineHeight": "1.3", "fontWeight": "700" }],
                        "h3": ["24px", { "lineHeight": "1.4", "fontWeight": "600" }],
                        "h1-mobile": ["32px", { "lineHeight": "1.2", "fontWeight": "700" }]
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
