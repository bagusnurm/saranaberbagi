<!DOCTYPE html>
<html lang="id" style="">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Digital Collaborators - Sarana Berbagi</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;family=Plus+Jakarta+Sans:wght@600;700&amp;display=swap"
        rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-secondary-container": "#266d68",
                        "on-tertiary": "#ffffff",
                        "primary-fixed": "#9cf2e8",
                        "inverse-primary": "#80d5cb",
                        "primary": "#005c55",
                        "on-primary": "#ffffff",
                        "primary-fixed-dim": "#80d5cb",
                        "surface-container": "#eaedff",
                        "surface-container-lowest": "#ffffff",
                        "surface-variant": "#dae2fd",
                        "on-background": "#131b2e",
                        "on-primary-fixed": "#00201d",
                        "on-primary-container": "#a3faef",
                        "on-surface": "#131b2e",
                        "surface-dim": "#d2d9f4",
                        "on-primary-fixed-variant": "#00504a",
                        "inverse-surface": "#283044",
                        "surface-container-low": "#f2f3ff",
                        "surface": "#faf8ff",
                        "tertiary-fixed": "#ffddb8",
                        "tertiary-fixed-dim": "#ffb95f",
                        "secondary-fixed-dim": "#8fd3cc",
                        "tertiary-container": "#945d00",
                        "on-secondary-fixed": "#00201e",
                        "on-surface-variant": "#3e4947",
                        "surface-container-highest": "#dae2fd",
                        "on-error-container": "#93000a",
                        "on-secondary": "#ffffff",
                        "inverse-on-surface": "#eef0ff",
                        "surface-container-high": "#e2e7ff",
                        "surface-bright": "#faf8ff",
                        "primary-container": "#0f766e",
                        "background": "#faf8ff",
                        "secondary-container": "#a8ece5",
                        "on-tertiary-fixed-variant": "#653e00",
                        "on-tertiary-container": "#ffe6cc",
                        "on-error": "#ffffff",
                        "on-tertiary-fixed": "#2a1700",
                        "secondary": "#216963",
                        "surface-tint": "#006a63",
                        "secondary-fixed": "#abefe8",
                        "outline": "#6e7977",
                        "outline-variant": "#bdc9c6",
                        "error": "#ba1a1a",
                        "error-container": "#ffdad6",
                        "tertiary": "#734700",
                        "on-secondary-fixed-variant": "#00504b"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "gutter": "24px",
                        "section-padding": "80px",
                        "margin-mobile": "20px",
                        "margin-desktop": "48px",
                        "stack-md": "16px",
                        "stack-sm": "8px",
                        "container-max": "1280px",
                        "stack-lg": "32px"
                    },
                    "fontFamily": {
                        "body-lg": ["Inter"],
                        "h2": ["Plus Jakarta Sans"],
                        "h3": ["Plus Jakarta Sans"],
                        "label-sm": ["Inter"],
                        "h1-mobile": ["Plus Jakarta Sans"],
                        "body-md": ["Inter"],
                        "h1": ["Plus Jakarta Sans"]
                    },
                    "fontSize": {
                        "body-lg": ["18px", {
                            "lineHeight": "1.8",
                            "fontWeight": "400"
                        }],
                        "h2": ["32px", {
                            "lineHeight": "1.3",
                            "fontWeight": "700"
                        }],
                        "h3": ["24px", {
                            "lineHeight": "1.4",
                            "fontWeight": "600"
                        }],
                        "label-sm": ["14px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "h1-mobile": ["32px", {
                            "lineHeight": "1.2",
                            "fontWeight": "700"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "h1": ["48px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }]
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif
        }

        h1,
        h2,
        h3,
        .brand-font {
            font-family: 'Plus Jakarta Sans', sans-serif
        }
    </style>
</head>

<body class="bg-background text-on-background font-body-md min-h-screen flex flex-col">
    <nav class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-md border-b border-outline-variant/30 shadow-sm">
        <div class="max-w-container-max mx-auto px-margin-desktop flex justify-between items-center h-20">
            <div class="flex items-center gap-4"><a class="flex items-center" href="{{ url('/') }}"><img
                        alt="Sarana Berbagi Logo" class="h-28 w-auto object-contain"
                        src="{{ asset('img/PROPERTY (2).png') }}"></a></div>
            <div class="hidden md:flex items-center gap-6"><a
                    class="text-on-surface-variant hover:text-primary transition-colors rounded-lg px-3 py-2 font-body-md text-body-md"
                    href="{{ url('/') }}">Tentang Kami</a><a
                    class="text-on-surface-variant hover:text-primary transition-colors rounded-lg px-3 py-2 font-body-md text-body-md"
                    href="{{ url('/program') }}">Program</a><a
                    class="text-on-surface-variant hover:text-primary transition-colors rounded-lg px-3 py-2 font-body-md text-body-md"
                    href="{{ url('/kabar') }}">Kabar</a><a
                    class="text-on-surface-variant hover:text-primary transition-colors rounded-lg px-3 py-2 font-body-md text-body-md"
                    href="{{ url('/berita') }}">Berita</a><a
                    class="text-on-surface-variant dark:text-surface-variant hover:text-primary dark:hover:text-primary-fixed transition-colors hover:bg-surface-container-low dark:hover:bg-inverse-surface rounded-lg px-3 py-2 active:scale-95 duration-200 font-body-md text-body-md"
                    href="{{ url('/karir') }}">Karir</a><a
                    class="text-primary font-semibold border-b-2 border-primary pb-1 px-3 py-2 font-body-md text-body-md"
                    href="{{ url('/digital-collaborators') }}">Digital Collaborators</a></div>
            <div class="flex items-center gap-4"><a
                    class="bg-[#F59E0B] text-white font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm"
                    href="{{ url('/donasi') }}">Donasi</a></div>
        </div>
    </nav>
    <main class="flex-grow pt-32 pb-section-padding px-margin-desktop max-w-container-max mx-auto w-full">
        <section class="text-center max-w-3xl mx-auto mb-16">
            <h1 class="font-h1 text-h1 text-on-surface mb-4">Digital Collaborators</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant">Bergabunglah sebagai relawan digital dan bantu
                sebarkan kebaikan melalui platform digital Anda. Bersama kita bisa menjangkau lebih banyak orang baik.
            </p>
        </section>
        <section class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            <div
                class="bg-surface-container-lowest rounded-2xl p-8 shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 border border-outline-variant/20">
                <div class="w-14 h-14 bg-primary-container rounded-xl flex items-center justify-center mb-6"><span
                        class="material-symbols-outlined text-primary text-3xl">share</span></div>
                <h3 class="font-h3 text-h3 text-on-surface mb-3">Social Media Advocate</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-4">Sebarkan informasi program Sarana
                    Berbagi melalui media sosial Anda. Setiap share berarti kebaikan yang lebih luas.</p>
                <ul class="space-y-2 text-sm text-on-surface-variant">
                    <li class="flex items-center gap-2"><span
                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Flexible
                            waktu, bisa dari mana saja</span></li>
                    <li class="flex items-center gap-2"><span
                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Materi
                            konten disediakan</span></li>
                    <li class="flex items-center gap-2"><span
                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Sertifikat
                            relawan digital</span></li>
                </ul>
            </div>
            <div
                class="bg-surface-container-lowest rounded-2xl p-8 shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 border border-outline-variant/20">
                <div class="w-14 h-14 bg-secondary-container rounded-xl flex items-center justify-center mb-6"><span
                        class="material-symbols-outlined text-secondary text-3xl">create</span></div>
                <h3 class="font-h3 text-h3 text-on-surface mb-3">Content Creator</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-4">Buat konten kreatif (video, gambar,
                    artikel) tentang program Sarana Berbagi untuk menginspirasi lebih banyak orang.</p>
                <ul class="space-y-2 text-sm text-on-surface-variant">
                    <li class="flex items-center gap-2"><span
                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Kreativitas
                            tanpa batas</span></li>
                    <li class="flex items-center gap-2"><span
                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Konten
                            bisa diakui sebagai portofolio</span></li>
                    <li class="flex items-center gap-2"><span
                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Reward
                            untuk konten terbaik</span></li>
                </ul>
            </div>
            <div
                class="bg-surface-container-lowest rounded-2xl p-8 shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 border border-outline-variant/20">
                <div class="w-14 h-14 bg-tertiary-container rounded-xl flex items-center justify-center mb-6"><span
                        class="material-symbols-outlined text-tertiary text-3xl">diversity_3</span></div>
                <h3 class="font-h3 text-h3 text-on-surface mb-3">Community Builder</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-4">Bangun komunitas peduli di lingkungan
                    Anda (kampung, kantor, sekolah) untuk menggalang dana bersama.</p>
                <ul class="space-y-2 text-sm text-on-surface-variant">
                    <li class="flex items-center gap-2"><span
                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Panduan
                            lengkap disediakan</span></li>
                    <li class="flex items-center gap-2"><span
                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Networking
                            dengan relawan lain</span></li>
                    <li class="flex items-center gap-2"><span
                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Impact
                            report berkala</span></li>
                </ul>
            </div>
            <div
                class="bg-surface-container-lowest rounded-2xl p-8 shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 border border-outline-variant/20">
                <div class="w-14 h-14 bg-error-container rounded-xl flex items-center justify-center mb-6"><span
                        class="material-symbols-outlined text-error text-3xl">code</span></div>
                <h3 class="font-h3 text-h3 text-on-surface mb-3">Tech Volunteer</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-4">Bantu pengembangan platform digital
                    Sarana Berbagi dengan skill programming, design, atau data analysis Anda.</p>
                <ul class="space-y-2 text-sm text-on-surface-variant">
                    <li class="flex items-center gap-2"><span
                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Remote
                            friendly</span></li>
                    <li class="flex items-center gap-2"><span
                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Berkolaborasi
                            dengan tim tech</span></li>
                    <li class="flex items-center gap-2"><span
                            class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Pengalaman
                            bermakna</span></li>
                </ul>
            </div>
        </section>
        <section
            class="bg-surface-container-lowest rounded-2xl p-8 md:p-12 text-center border border-outline-variant/20">
            <h2 class="font-h2 text-h2 text-on-surface mb-4">Siap Berkolaborasi?</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant mb-6">Isi form di bawah dan tim kami akan
                menghubungkan Anda dengan program yang sesuai.</p>
            <form action="#" method="POST" class="max-w-md mx-auto space-y-4"><input type="text"
                    placeholder="Nama Lengkap"
                    class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"><input
                    type="email" placeholder="Email"
                    class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"><select
                    class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                    <option value="">Pilih Peran</option>
                    <option value="advocate">Social Media Advocate</option>
                    <option value="creator">Content Creator</option>
                    <option value="community">Community Builder</option>
                    <option value="tech">Tech Volunteer</option>
                </select><button type="submit"
                    class="w-full bg-[#F59E0B] text-white font-label-sm text-label-sm px-8 py-4 rounded-xl hover:bg-[#D97706] transition-colors shadow-md">Daftar
                    Sekarang</button></form>
        </section>
    </main>
    <footer class="bg-primary text-white w-full">
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
