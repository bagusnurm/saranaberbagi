<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Donasi - Sarana Berbagi</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;family=Plus+Jakarta+Sans:wght@600;700&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-surface": "#131b2e",
                        "secondary": "#216963",
                        "surface-variant": "#dae2fd",
                        "tertiary": "#734700",
                        "surface-dim": "#d2d9f4",
                        "surface-container-low": "#f2f3ff",
                        "outline": "#6e7977",
                        "secondary-fixed": "#abefe8",
                        "surface-container": "#eaedff",
                        "primary-container": "#0f766e",
                        "on-primary-fixed": "#00201d",
                        "surface": "#faf8ff",
                        "error-container": "#ffdad6",
                        "tertiary-container": "#945d00",
                        "secondary-fixed-dim": "#8fd3cc",
                        "inverse-primary": "#80d5cb",
                        "on-error": "#ffffff",
                        "on-secondary-fixed": "#00201e",
                        "error": "#ba1a1a",
                        "tertiary-fixed-dim": "#ffb95f",
                        "surface-container-lowest": "#ffffff",
                        "outline-variant": "#bdc9c6",
                        "primary-fixed-dim": "#80d5cb",
                        "surface-tint": "#006a63",
                        "background": "#faf8ff",
                        "on-background": "#131b2e",
                        "on-surface-variant": "#3e4947",
                        "on-secondary": "#ffffff",
                        "surface-container-highest": "#dae2fd",
                        "surface-container-high": "#e2e7ff",
                        "on-primary": "#ffffff",
                        "primary": "#005c55",
                        "surface-bright": "#faf8ff",
                        "secondary-container": "#a8ece5",
                        "on-tertiary": "#ffffff",
                        "on-primary-container": "#a3faef",
                        "on-error-container": "#93000a",
                        "inverse-on-surface": "#eef0ff",
                        "inverse-surface": "#283044",
                        "tertiary-fixed": "#ffddb8",
                        "primary-fixed": "#9cf2e8"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "margin-desktop": "48px",
                        "stack-sm": "8px",
                        "container-max": "1280px",
                        "stack-md": "16px",
                        "stack-lg": "32px",
                        "section-padding": "80px",
                        "margin-mobile": "20px",
                        "gutter": "24px"
                    },
                    "fontFamily": {
                        "h2": ["Plus Jakarta Sans"],
                        "body-md": ["Inter"],
                        "label-sm": ["Inter"],
                        "h3": ["Plus Jakarta Sans"],
                        "h1": ["Plus Jakarta Sans"],
                        "body-lg": ["Inter"],
                        "h1-mobile": ["Plus Jakarta Sans"]
                    },
                    "fontSize": {
                        "h2": ["32px", {
                            "lineHeight": "1.3",
                            "fontWeight": "700"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "label-sm": ["14px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "h3": ["24px", {
                            "lineHeight": "1.4",
                            "fontWeight": "600"
                        }],
                        "h1": ["48px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.8",
                            "fontWeight": "400"
                        }],
                        "h1-mobile": ["32px", {
                            "lineHeight": "1.2",
                            "fontWeight": "700"
                        }]
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        .brand-font {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-background text-on-background antialiased min-h-screen flex flex-col">
    <nav class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-md border-b border-outline-variant/30 shadow-sm">
        <div class="max-w-container-max mx-auto px-margin-desktop flex justify-between items-center h-20">
            <div class="flex items-center gap-4">
                <a class="flex items-center" href="{{ url('/') }}"><img alt="Sarana Berbagi Logo"
                        class="h-28 w-auto object-contain" src="{{ asset('img/PROPERTY (2).png') }}"></a>
            </div>
            <div class="hidden md:flex items-center gap-8">
                <a class="text-on-surface-variant hover:text-primary transition-colors rounded-lg px-3 py-2 font-body-md text-body-md"
                    href="{{ url('/') }}">Tentang Kami</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors rounded-lg px-3 py-2 font-body-md text-body-md"
                    href="{{ url('/program') }}">Program</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors rounded-lg px-3 py-2 font-body-md text-body-md"
                    href="{{ url('/kabar') }}">Kabar</a>
            </div>
            <div class="flex items-center gap-4">
                <a class="bg-[#F59E0B] text-white font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm"
                    href="{{ url('/donasi') }}">Donasi</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow pt-32 pb-section-padding">
        <div class="max-w-2xl mx-auto px-margin-mobile md:px-margin-desktop">
            <!-- Progress Steps -->
            <div class="flex items-center justify-center mb-12">
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold">
                        1</div>
                    <span class="ml-2 text-primary font-semibold">Data Diri</span>
                </div>
                <div class="w-16 h-1 bg-outline-variant mx-4"></div>
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 rounded-full bg-outline-variant text-on-surface-variant flex items-center justify-center font-bold">
                        2</div>
                    <span class="ml-2 text-on-surface-variant">Pembayaran</span>
                </div>
                <div class="w-16 h-1 bg-outline-variant mx-4"></div>
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 rounded-full bg-outline-variant text-on-surface-variant flex items-center justify-center font-bold">
                        3</div>
                    <span class="ml-2 text-on-surface-variant">Konfirmasi</span>
                </div>
            </div>

            <div class="bg-surface-container-lowest rounded-2xl p-8 md:p-10 shadow-lg border border-outline-variant/20">
                <h1 class="font-h2 text-h2 text-on-surface mb-2 text-center">Data Donatur</h1>
                <p class="text-on-surface-variant text-center mb-8">Silakan isi data diri Anda untuk melanjutkan donasi
                </p>

                <form action="{{ route('donasi.step2') }}" method="POST">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-2">Nama Lengkap *</label>
                            <input type="text" name="nama" required
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-2">Email *</label>
                            <input type="email" name="email" required
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="contoh@email.com">
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-2">Nomor Telepon
                                *</label>
                            <input type="tel" name="telepon" required
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="08xxxxxxxxxx">
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-2">Nominal Donasi (Rp)
                                *</label>
                            <input type="number" name="nominal" required min="10000"
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="Minimal Rp 10.000">
                            <p class="text-sm text-on-surface-variant mt-1">Minimal donasi Rp 10.000</p>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-2">Pesan/Catatan</label>
                            <textarea name="pesan" rows="3"
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none"
                                placeholder="Tulis pesan atau doa (opsional)"></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full mt-8 bg-[#F59E0B] hover:bg-[#D97706] text-white font-label-sm text-label-sm px-8 py-4 rounded-xl transition-colors shadow-md active:scale-95">
                        Lanjut ke Pembayaran
                    </button>
                </form>
            </div>
        </div>
    </main>

    <footer class="bg-primary text-white w-full mt-auto">
        <div class="h-6 w-full opacity-20"
            style="background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, #ffffff 10px, #ffffff 20px);">
        </div>
        <div class="px-margin-desktop py-12 max-w-container-max mx-auto text-center">
            <p class="font-bold text-sm tracking-wider uppercase">SK KEMENKUMHAM ; AHU-0000643.AH.01.05. Tahun 2016</p>
            <p class="font-bold text-sm tracking-wider uppercase mt-2">SK DINAS SOSIAL ; 400.3.6.6 / 5212 / Daysos</p>
            <p class="mt-4 text-white/80 text-sm">&copy; 2026 Yayasan Sarana Berbagi</p>
        </div>
    </footer>
</body>

</html>
