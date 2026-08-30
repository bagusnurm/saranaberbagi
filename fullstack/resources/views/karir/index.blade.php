<!DOCTYPE html>
<html lang="id" style="">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Karir - Sarana Berbagi</title>
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
                    class="text-primary font-semibold border-b-2 border-primary pb-1 px-3 py-2 font-body-md text-body-md"
                    href="{{ url('/karir') }}">Karir</a><a
                    class="text-on-surface-variant hover:text-primary transition-colors rounded-lg px-3 py-2 font-body-md text-body-md"
                    href="{{ url('/digital-collaborators') }}">Digital Collaborators</a></div>
            <div class="flex items-center gap-4"><a
                    class="bg-[#F59E0B] text-white font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm"
                    href="{{ url('/donasi') }}">Donasi</a></div>
        </div>
    </nav>
    <main class="flex-grow">
        <!-- Banner Section -->
        <section class="relative pt-20">
            <div class="relative h-[400px] w-full overflow-hidden">
                <img src="{{ asset('img/banner-karir.png') }}" alt="Karir Sarana Berbagi"
                    class="w-full h-full object-cover">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-on-background/80 via-on-background/40 to-transparent">
                </div>
                <div class="absolute bottom-0 left-0 right-0 p-8 md:p-12 max-w-container-max mx-auto">
                    <h1 class="font-h1 text-h1-mobile md:text-h1 text-white mb-4">Bergabung Bersama Kami</h1>
                    <p class="font-body-lg text-body-lg text-white/90 max-w-2xl">Jadilah bagian dari perubahan. Temukan
                        posisi yang sesuai dengan passion Anda dan bersama kita ciptakan dampak positif bagi umat.</p>
                </div>
            </div>
        </section>
        <!-- Lokasi Section -->
        <section class="py-section-padding px-margin-desktop max-w-container-max mx-auto w-full">
            <div
                class="bg-surface-container-lowest rounded-2xl p-8 md:p-10 shadow-[0_4px_20px_rgba(15,23,42,0.05)] border border-outline-variant/20 mb-12">
                <h2 class="font-h2 text-h2 text-on-surface mb-6 flex items-center gap-3"><span
                        class="material-symbols-outlined text-primary">location_on</span>Lokasi Kerja</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 bg-primary-container rounded-xl flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary">business</span></div>
                        <div>
                            <h3 class="font-h3 text-lg text-on-surface mb-1">Kantor Pusat</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant">Komplek Griya Bandung Indah
                                Blok F 19 No 10 RT 08 RW 08 Desa Buahbatu Kecamatan Bojongsoang, Kabupaten Bandung, Jawa
                                Barat 40287</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 bg-secondary-container rounded-xl flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-secondary">home_work</span></div>
                        <div>
                            <h3 class="font-h3 text-lg text-on-surface mb-1">Remote / Work From Home</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant">Beberapa posisi mendukung kerja
                                remote penuh atau hybrid sesuai kebutuhan tim.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Lowongan Section -->
            <div class="mb-12">
                <h2 class="font-h2 text-h2 text-on-surface mb-8 flex items-center gap-3"><span
                        class="material-symbols-outlined text-primary">work</span>Lowongan Terbuka</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- IT -->
                    <div
                        class="bg-surface-container-lowest rounded-2xl p-8 shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 border border-outline-variant/20">
                        <div class="w-14 h-14 bg-primary-container rounded-xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-primary text-3xl">code</span></div><span
                            class="inline-block bg-primary-container text-on-primary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-4">IT</span>
                        <h3 class="font-h3 text-h3 text-on-surface mb-3">Full Stack Developer</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-4">Membangun dan memelihara
                            platform digital Sarana Berbagi. Menguasai PHP/Laravel, JavaScript, dan database.</p>
                        <ul class="space-y-2 text-sm text-on-surface-variant mb-6">
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Pengalaman
                                    min. 2 tahun</span></li>
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Menguasai
                                    Laravel & Vue/React</span></li>
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Remote
                                    / Bandung</span></li>
                        </ul><a href="#form-lamaran"
                            class="block w-full bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Lamar
                            Sekarang</a>
                    </div>
                    <div
                        class="bg-surface-container-lowest rounded-2xl p-8 shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 border border-outline-variant/20">
                        <div class="w-14 h-14 bg-primary-container rounded-xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-primary text-3xl">security</span></div><span
                            class="inline-block bg-primary-container text-on-primary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-4">IT</span>
                        <h3 class="font-h3 text-h3 text-on-surface mb-3">IT Support</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-4">Menangani infrastruktur IT,
                            troubleshooting, dan memastikan sistem berjalan dengan baik.</p>
                        <ul class="space-y-2 text-sm text-on-surface-variant mb-6">
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Pengalaman
                                    min. 1 tahun</span></li>
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Menguasai
                                    networking & sistem operasi</span></li>
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Bandung
                                    (On-site)</span></li>
                        </ul><a href="#form-lamaran"
                            class="block w-full bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Lamar
                            Sekarang</a>
                    </div>
                    <!-- ADMIN -->
                    <div
                        class="bg-surface-container-lowest rounded-2xl p-8 shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 border border-outline-variant/20">
                        <div class="w-14 h-14 bg-secondary-container rounded-xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-secondary text-3xl">description</span></div>
                        <span
                            class="inline-block bg-secondary-container text-on-secondary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-4">ADMIN</span>
                        <h3 class="font-h3 text-h3 text-on-surface mb-3">Admin & Finance</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-4">Mengelola administrasi,
                            keuangan, dan pelaporan program Sarana Berbagi.</p>
                        <ul class="space-y-2 text-sm text-on-surface-variant mb-6">
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Pengalaman
                                    min. 1 tahun</span></li>
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Menguasai
                                    Microsoft Office</span></li>
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Bandung
                                    (On-site)</span></li>
                        </ul><a href="#form-lamaran"
                            class="block w-full bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Lamar
                            Sekarang</a>
                    </div>
                    <div
                        class="bg-surface-container-lowest rounded-2xl p-8 shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 border border-outline-variant/20">
                        <div class="w-14 h-14 bg-secondary-container rounded-xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-secondary text-3xl">support_agent</span></div>
                        <span
                            class="inline-block bg-secondary-container text-on-secondary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-4">ADMIN</span>
                        <h3 class="font-h3 text-h3 text-on-surface mb-3">Customer Service</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-4">Melayani donatur dan menjawab
                            pertanyaan terkait program serta donasi.</p>
                        <ul class="space-y-2 text-sm text-on-surface-variant mb-6">
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Komunikatif
                                    & ramah</span></li>
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Bisa
                                    bekerja dengan target</span></li>
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Bandung
                                    / Remote</span></li>
                        </ul><a href="#form-lamaran"
                            class="block w-full bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Lamar
                            Sekarang</a>
                    </div>
                    <!-- MARKETING -->
                    <div
                        class="bg-surface-container-lowest rounded-2xl p-8 shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 border border-outline-variant/20">
                        <div class="w-14 h-14 bg-tertiary-container rounded-xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-tertiary text-3xl">campaign</span></div><span
                            class="inline-block bg-tertiary-container text-on-tertiary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-4">MARKETING</span>
                        <h3 class="font-h3 text-h3 text-on-surface mb-3">Digital Marketing</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-4">Mengelola kampanye digital,
                            SEO, dan iklan online untuk meningkatkan jangkauan program.</p>
                        <ul class="space-y-2 text-sm text-on-surface-variant mb-6">
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Pengalaman
                                    min. 1 tahun</span></li>
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Menguasai
                                    Google Ads & Meta Ads</span></li>
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Remote
                                    / Bandung</span></li>
                        </ul><a href="#form-lamaran"
                            class="block w-full bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Lamar
                            Sekarang</a>
                    </div>
                    <div
                        class="bg-surface-container-lowest rounded-2xl p-8 shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 border border-outline-variant/20">
                        <div class="w-14 h-14 bg-tertiary-container rounded-xl flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-tertiary text-3xl">palette</span></div><span
                            class="inline-block bg-tertiary-container text-on-tertiary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-4">MARKETING</span>
                        <h3 class="font-h3 text-h3 text-on-surface mb-3">Content Creator</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-4">Membuat konten kreatif untuk
                            media sosial, website, dan materi kampanye Sarana Berbagi.</p>
                        <ul class="space-y-2 text-sm text-on-surface-variant mb-6">
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Kreatif
                                    dan inovatif</span></li>
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Menguasai
                                    tools desain/video</span></li>
                            <li class="flex items-center gap-2"><span
                                    class="material-symbols-outlined text-primary text-[16px]">check_circle</span><span>Remote
                                    / Bandung</span></li>
                        </ul><a href="#form-lamaran"
                            class="block w-full bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Lamar
                            Sekarang</a>
                    </div>
                </div>
            </div>
            <!-- Form Lamaran -->
            <section id="form-lamaran"
                class="py-section-padding px-margin-desktop max-w-container-max mx-auto w-full">
                <div
                    class="bg-surface-container-lowest rounded-2xl p-8 md:p-10 shadow-[0_4px_20px_rgba(15,23,42,0.05)] border border-outline-variant/20">
                    <h2 class="font-h2 text-h2 text-on-surface mb-2 text-center">Formulir Lamaran</h2>
                    <p class="text-on-surface-variant text-center mb-8">Isi data di bawah dan unggah CV Anda untuk
                        melamar posisi yang tersedia.</p>
                    <form action="#" method="POST" enctype="multipart/form-data"
                        class="max-w-2xl mx-auto space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div><label class="block font-label-sm text-label-sm text-on-surface mb-2">Nama Lengkap
                                    *</label><input type="text" name="nama" required
                                    class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                    placeholder="Masukkan nama lengkap"></div>
                            <div><label class="block font-label-sm text-label-sm text-on-surface mb-2">Email
                                    *</label><input type="email" name="email" required
                                    class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                    placeholder="contoh@email.com"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div><label class="block font-label-sm text-label-sm text-on-surface mb-2">Nomor Telepon
                                    *</label><input type="tel" name="telepon" required
                                    class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                    placeholder="08xxxxxxxxxx"></div>
                            <div><label class="block font-label-sm text-label-sm text-on-surface mb-2">Posisi yang
                                    Dilamar *</label><select name="posisi" required
                                    class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                                    <option value="">Pilih Posisi</option>
                                    <option value="fullstack">IT - Full Stack Developer</option>
                                    <option value="itsupport">IT - IT Support</option>
                                    <option value="adminfinance">ADMIN - Admin & Finance</option>
                                    <option value="cs">ADMIN - Customer Service</option>
                                    <option value="digitalmarketing">MARKETING - Digital Marketing</option>
                                    <option value="contentcreator">MARKETING - Content Creator</option>
                                </select></div>
                        </div>
                        <div><label class="block font-label-sm text-label-sm text-on-surface mb-2">CV / Resume
                                *</label><input type="file" name="cv" accept=".pdf,.doc,.docx" required
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary-container file:text-on-primary-container hover:file:bg-primary-container/80">
                        </div>
                        <div><label class="block font-label-sm text-label-sm text-on-surface mb-2">Pesan / Cover
                                Letter</label>
                            <textarea name="pesan" rows="4"
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none"
                                placeholder="Ceritakan tentang diri Anda dan mengapa Anda tertarik bergabung..."></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-[#F59E0B] hover:bg-[#D97706] text-white font-label-sm text-label-sm px-8 py-4 rounded-xl transition-colors shadow-md active:scale-95">Kirim
                            Lamaran</button>
                    </form>
                </div>
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
