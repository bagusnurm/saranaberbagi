<!DOCTYPE html>
<html class="light" lang="id" style="">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Blog - Sarana Berbagi</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
                        "body-lg": [
                            "Inter"
                        ],
                        "h2": [
                            "Plus Jakarta Sans"
                        ],
                        "h3": [
                            "Plus Jakarta Sans"
                        ],
                        "label-sm": [
                            "Inter"
                        ],
                        "h1-mobile": [
                            "Plus Jakarta Sans"
                        ],
                        "body-md": [
                            "Inter"
                        ],
                        "h1": [
                            "Plus Jakarta Sans"
                        ]
                    },
                    "fontSize": {
                        "body-lg": [
                            "18px",
                            {
                                "lineHeight": "1.8",
                                "fontWeight": "400"
                            }
                        ],
                        "h2": [
                            "32px",
                            {
                                "lineHeight": "1.3",
                                "fontWeight": "700"
                            }
                        ],
                        "h3": [
                            "24px",
                            {
                                "lineHeight": "1.4",
                                "fontWeight": "600"
                            }
                        ],
                        "label-sm": [
                            "14px",
                            {
                                "lineHeight": "1",
                                "letterSpacing": "0.05em",
                                "fontWeight": "600"
                            }
                        ],
                        "h1-mobile": [
                            "32px",
                            {
                                "lineHeight": "1.2",
                                "fontWeight": "700"
                            }
                        ],
                        "body-md": [
                            "16px",
                            {
                                "lineHeight": "1.6",
                                "fontWeight": "400"
                            }
                        ],
                        "h1": [
                            "48px",
                            {
                                "lineHeight": "1.2",
                                "letterSpacing": "-0.02em",
                                "fontWeight": "700"
                            }
                        ]
                    }
                },
            },
        }
    </script>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;family=Plus+Jakarta+Sans:wght@600;700&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
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

        .prose-custom {
            --tw-prose-body: #131b2e;
            --tw-prose-headings: #131b2e;
            --tw-prose-links: #0F766E;
            --tw-prose-links-hover: #005c55;
            --tw-prose-quotes: #3e4947;
            --tw-prose-quote-borders: #0F766E;
            --tw-prose-captions: #6e7977;
        }

        .kabar-popup {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .kabar-popup.active {
            opacity: 1;
            visibility: visible;
        }

        .kabar-popup-content {
            transform: translateY(20px) scale(0.98);
            transition: transform 0.3s ease;
        }

        .kabar-popup.active .kabar-popup-content {
            transform: translateY(0) scale(1);
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
                    class="text-primary dark:text-primary-fixed font-semibold border-b-2 border-primary dark:border-primary-fixed pb-1 px-3 py-2 active:scale-95 duration-200 font-body-md text-body-md"
                    href="{{ url('/kabar') }}">Kabar</a><a
                    class="text-on-surface-variant dark:text-surface-variant hover:text-primary dark:hover:text-primary-fixed transition-colors hover:bg-surface-container-low dark:hover:bg-inverse-surface rounded-lg px-3 py-2 active:scale-95 duration-200 font-body-md text-body-md"
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
        <div class="max-w-container-max mx-auto px-margin-desktop">
            <!-- Header & Search -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h1 class="font-h1 text-h1 text-on-surface mb-6">Kabar Terbaru</h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant mb-10">Kisah inspiratif, pembaruan program,
                    dan dampak yang kita ciptakan bersama untuk kemanusiaan.</p>
                <div class="relative max-w-2xl mx-auto group">
                    <span
                        class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">search</span>
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-xl py-4 pl-12 pr-4 font-body-md text-body-md text-on-surface placeholder:text-outline-variant focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all shadow-sm"
                        placeholder="Cari artikel, berita, atau topik..." type="text">
                </div>
            </div>
            <!-- Categories -->
            <div class="flex flex-wrap justify-center gap-4 mb-16">
                <button
                    class="px-6 py-2 rounded-full bg-primary/10 text-primary font-label-sm text-label-sm border border-primary/20 hover:bg-primary/20 transition-colors">Semua</button>
                <button
                    class="px-6 py-2 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm border border-outline-variant hover:border-primary/50 transition-colors">Edukasi</button>
                <button
                    class="px-6 py-2 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm border border-outline-variant hover:border-primary/50 transition-colors">Kesehatan</button>
                <button
                    class="px-6 py-2 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm border border-outline-variant hover:border-primary/50 transition-colors">Tanggap
                    Bencana</button>
                <button
                    class="px-6 py-2 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm border border-outline-variant hover:border-primary/50 transition-colors">Kisah
                    Sukses</button>
            </div>
            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <!-- Card 1 -->
                <article
                    class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 group border border-outline-variant/20 flex flex-col cursor-pointer"
                    data-id="1">
                    <div class="relative h-60 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="A bright, modern photograph of children in a rural Indonesian classroom, smiling and holding new books. The lighting is warm and natural, emphasizing hope and education. A soft, optimistic teal hue permeates the scene, aligning with a professional NGO brand."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCtWbu662_2iNprm3alF0kRYaVnj_AcLjFaNMAdEanEt2kEPtK10neEJan1lIlnwR0Eypa7X933lr30xQDo2kPIpvy5vbHdxhWVz_WUmZ5V0ZOhrhhW6CsZDNtTT2ytO-ejtCGhSfOm_pDszAGOBLyGxmF0uUg_vsbRpn1pRFdEPbUVSh3_s2HCVasEhtvOHnfA53Oaqh9HYqw5Jm-_DVNyYrKEdax3YR76z9irRp8-OLMANMDmpf_Hjg">
                        <div
                            class="absolute top-4 left-4 bg-surface/90 backdrop-blur-sm px-3 py-1 rounded-full font-label-sm text-label-sm text-primary">
                            Edukasi</div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-2 text-outline font-label-sm text-label-sm mb-3">
                            <span class="">12 Okt 2024</span>
                            <span class="">•</span>
                            <span class="">5 min baca</span>
                        </div>
                        <h3
                            class="font-h3 text-h3 text-on-surface mb-3 group-hover:text-primary transition-colors line-clamp-2">
                            Perpustakaan Keliling Tiba di Desa Harapan</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-3 flex-grow">Membawa
                            ratusan buku baru, relawan kami menghabiskan akhir pekan berbagi cerita dan pengetahuan
                            dengan anak-anak di pelosok.</p>
                        <a class="kabar-detail-link inline-flex items-center gap-2 text-primary font-label-sm text-label-sm hover:underline mt-auto"
                            data-id="1" href="javascript:void(0)">
                            Baca Selengkapnya <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                    </div>
                </article>
                <!-- Card 2 -->
                <article
                    class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 group border border-outline-variant/20 flex flex-col cursor-pointer"
                    data-id="2">
                    <div class="relative h-60 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="A clean, documentary-style photo of a mobile health clinic in a sunny, tropical village. Medical staff in crisp white and teal uniforms are assisting elderly residents. The image is bright, professional, and optimistic, capturing a moment of care and community support."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuB8JJYQSs4hSDhny6bWDq6C8tL3CNgX5Vuo1ax6SXD7haKd-UsCujEce-pTHKwoo6VkHNvJXtOqp2kzfKzKKC0AwuCXUPyvkA4DcGVjpaS0_bnQPztiHVcvJR41noQ0TBjThu9b9ooLtoZnPcACgbqsz99OPlt4V81lqJa-G2jxfISH0EZeipYnJkwiAg7OOAKDN8eK-KzpCv4RI_RHxQS9RyOUXjrLgmWWTTK4P7rlX-g1YcQgz8s3qA">
                        <div
                            class="absolute top-4 left-4 bg-surface/90 backdrop-blur-sm px-3 py-1 rounded-full font-label-sm text-label-sm text-primary">
                            Kesehatan</div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-2 text-outline font-label-sm text-label-sm mb-3">
                            <span class="">08 Okt 2024</span>
                            <span class="">•</span>
                            <span class="">4 min baca</span>
                        </div>
                        <h3
                            class="font-h3 text-h3 text-on-surface mb-3 group-hover:text-primary transition-colors line-clamp-2">
                            Klinik Berjalan Melayani 500 Warga Lansia</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-3 flex-grow">Program
                            pemeriksaan kesehatan gratis kami bulan ini berfokus pada kesejahteraan lansia di daerah
                            terpencil dengan akses medis terbatas.</p>
                        <a class="kabar-detail-link inline-flex items-center gap-2 text-primary font-label-sm text-label-sm hover:underline mt-auto"
                            data-id="2" href="javascript:void(0)">
                            Baca Selengkapnya <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                    </div>
                </article>
                <!-- Card 3 -->
                <article
                    class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 group border border-outline-variant/20 flex flex-col cursor-pointer"
                    data-id="3">
                    <div class="relative h-60 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="A powerful, uplifting photo of volunteers handing out clean water supplies after a natural disaster. The scene is lit with natural daylight, showing resilience. The volunteers wear teal vests, harmonizing with the brand's primary color palette. Professional and hopeful aesthetic."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAuNn8SWz1-gb07ckiocA_tz4YyBPpeSOB0GqDB6zpekTROOVs2bQyPVfSG3Q83l7bR_9EaI520iHc20SCs_7r-PozeQuw2SuRHS5KKUrAxW8Lr3jfKeog6_ABuSg-CsQG51Px9e-izEL6jfRGys928Hi7Vtp5xxsjim09TgWk-rLUNNRyLbntLf1UR65QpcMtYUxXKxF4ul1kiVpNLNkaPhW5LVjTBo-Ww7TNYDU_2CBZuOQKdMJifvA">
                        <div
                            class="absolute top-4 left-4 bg-surface/90 backdrop-blur-sm px-3 py-1 rounded-full font-label-sm text-label-sm text-primary">
                            Tanggap Bencana</div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-2 text-outline font-label-sm text-label-sm mb-3">
                            <span class="">25 Sep 2024</span>
                            <span class="">•</span>
                            <span class="">6 min baca</span>
                        </div>
                        <h3
                            class="font-h3 text-h3 text-on-surface mb-3 group-hover:text-primary transition-colors line-clamp-2">
                            Distribusi Air Bersih Pasca Gempa</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-3 flex-grow">Tim
                            reaksi cepat Sarana Berbagi telah mendirikan 5 titik distribusi air bersih untuk membantu
                            keluarga yang terdampak.</p>
                        <a class="kabar-detail-link inline-flex items-center gap-2 text-primary font-label-sm text-label-sm hover:underline mt-auto"
                            data-id="3" href="javascript:void(0)">
                            Baca Selengkapnya <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                    </div>
                </article>
                <!-- Card 4 -->
                <article
                    class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 group border border-outline-variant/20 flex flex-col cursor-pointer"
                    data-id="4">
                    <div class="relative h-60 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="A beautiful, well-lit portrait of an Indonesian woman farmer smiling proudly in her green vegetable field. The lighting highlights her resilience and success. The color palette features rich natural greens and warm earthy tones, reflecting sustainable agriculture and empowerment."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDnUwyD1IG2V_5-KpX5REOEkQ1TJUmzH45nYDaS3GZX28ZbCZFjLNAkraX35GfZE9ik_H7-aAp1x2d6FnNKxC6slZh6uLt_mjTy000dQjAo012tmYPGS5FZCrlhNSqa5UGUyoS9EggmptVvxnVH4P-e8J-sUAtmYa70IL_FZ8bRyRHAvUgC9_paPavpgSdzQYiJRwwK3cmP1XqmyDZrA9x-C4d-UiUPxyxG2AGcHl5I8mbIHWk_PPPwLA">
                        <div
                            class="absolute top-4 left-4 bg-surface/90 backdrop-blur-sm px-3 py-1 rounded-full font-label-sm text-label-sm text-primary">
                            Kisah Sukses</div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-2 text-outline font-label-sm text-label-sm mb-3">
                            <span class="">15 Sep 2024</span>
                            <span class="">•</span>
                            <span class="">7 min baca</span>
                        </div>
                        <h3
                            class="font-h3 text-h3 text-on-surface mb-3 group-hover:text-primary transition-colors line-clamp-2">
                            Ibu Siti: Mengubah Lahan Kering Menjadi Kebun Produktif</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-3 flex-grow">Berkat
                            program pemberdayaan ekonomi, Ibu Siti kini menjadi pemasok sayur organik utama di desanya.
                        </p>
                        <a class="kabar-detail-link inline-flex items-center gap-2 text-primary font-label-sm text-label-sm hover:underline mt-auto"
                            data-id="4" href="javascript:void(0)">
                            Baca Selengkapnya <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                    </div>
                </article>
                <!-- Card 5 -->
                <article
                    class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 group border border-outline-variant/20 flex flex-col cursor-pointer"
                    data-id="5">
                    <div class="relative h-60 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="A modern, bright photograph showing young volunteers painting a school building. The aesthetic is clean, energetic, and hopeful. Volunteers are engaged and smiling, wearing subtle teal accents that match the NGO's primary branding. Sunlit and optimistic."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBsm8hA1U-3AAbSwvylFj_0Q3-WZ32YI3BI1aGX6pBxjPWKONrbzltHZ688eibuH9pTPqUOCv1EJ9mKuPD9eIbTVFxuAtfVSLFt_oWVWxDVGhfjPbzLflLad9v-3z7rUB7kKSkP5iHUolZ1tI4RC3mCfq3eQ_lr8g2rVTWSh_QZyrAbaRWV5G6V7zHn91AfYbvnjONdk7ajGfOq6LoQjJ410F7xwrHAaj1IFzOM23J1_l-ACXqQ3cY_Bg">
                        <div
                            class="absolute top-4 left-4 bg-surface/90 backdrop-blur-sm px-3 py-1 rounded-full font-label-sm text-label-sm text-primary">
                            Edukasi</div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-2 text-outline font-label-sm text-label-sm mb-3">
                            <span class="">02 Sep 2024</span>
                            <span class="">•</span>
                            <span class="">3 min baca</span>
                        </div>
                        <h3
                            class="font-h3 text-h3 text-on-surface mb-3 group-hover:text-primary transition-colors line-clamp-2">
                            Renovasi SD Inpres Selesai Lebih Cepat</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-3 flex-grow">
                            Antusiasme puluhan relawan lokal membuat proses perbaikan fasilitas sekolah ini rampung
                            sebelum tahun ajaran baru dimulai.</p>
                        <a class="kabar-detail-link inline-flex items-center gap-2 text-primary font-label-sm text-label-sm hover:underline mt-auto"
                            data-id="5" href="javascript:void(0)">
                            Baca Selengkapnya <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                    </div>
                </article>
                <!-- Card 6 -->
                <article
                    class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 group border border-outline-variant/20 flex flex-col cursor-pointer"
                    data-id="6">
                    <div class="relative h-60 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            data-alt="A high-quality, calm photo of solar panels being installed on a community center roof in a rural setting. Clear blue sky above. The image conveys sustainable development and progress. Colors are bright, clean, and incorporate subtle teal and white tones."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBJ2qwp5lEwfGe0FhFBQkcUck3kLYfEZiogCmY-s3pBlurTSW-XdavlPf-IFBxjvUZgQikWOejKgnwbf_-7GbTeB-UqUbwolsG_wBmbg1M7eO7lJ2h8Rvsj1LaGOpYZnddiiLBIO7-rYWvqI22gDZI8Q1Pq2vwEui8Ev8fOhFrS_X0IxXAK2MlIJJB91K4nIBpUwU75mTKb86NIM5KEEZA0ERWyoCR2yanArahqK8ACDKlQJV9fMwVUhg">
                        <div
                            class="absolute top-4 left-4 bg-surface/90 backdrop-blur-sm px-3 py-1 rounded-full font-label-sm text-label-sm text-primary">
                            Kabar</div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-2 text-outline font-label-sm text-label-sm mb-3">
                            <span class="">28 Agu 2024</span>
                            <span class="">•</span>
                            <span class="">5 min baca</span>
                        </div>
                        <h3
                            class="font-h3 text-h3 text-on-surface mb-3 group-hover:text-primary transition-colors line-clamp-2">
                            Panel Surya Untuk Balai Desa Terang</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-3 flex-grow">
                            Inisiatif energi bersih kami mulai menunjukkan hasil. Malam hari di balai desa kini bisa
                            dimanfaatkan untuk kegiatan belajar warga.</p>
                        <a class="kabar-detail-link inline-flex items-center gap-2 text-primary font-label-sm text-label-sm hover:underline mt-auto"
                            data-id="6" href="javascript:void(0)">
                            Baca Selengkapnya <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                    </div>
                </article>
            </div>
            <!-- Pagination -->
            <div class="flex justify-center items-center gap-2">
                <button
                    class="w-10 h-10 rounded-full flex items-center justify-center border border-outline-variant text-outline hover:border-primary hover:text-primary transition-colors cursor-not-allowed opacity-50"
                    disabled="">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <button
                    class="w-10 h-10 rounded-full flex items-center justify-center bg-primary text-on-primary font-label-sm text-label-sm shadow-sm">1</button>
                <button
                    class="w-10 h-10 rounded-full flex items-center justify-center border border-outline-variant text-on-surface hover:border-primary hover:text-primary transition-colors font-label-sm text-label-sm">2</button>
                <button
                    class="w-10 h-10 rounded-full flex items-center justify-center border border-outline-variant text-on-surface hover:border-primary hover:text-primary transition-colors font-label-sm text-label-sm">3</button>
                <span class="text-outline mx-1">...</span>
                <button
                    class="w-10 h-10 rounded-full flex items-center justify-center border border-outline-variant text-on-surface hover:border-primary hover:text-primary transition-colors font-label-sm text-label-sm">8</button>
                <button
                    class="w-10 h-10 rounded-full flex items-center justify-center border border-outline-variant text-on-surface hover:border-primary hover:text-primary transition-colors">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
        </div>
    </main>
    <!-- Hover Popup Modal -->
    <div class="kabar-popup fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-8" id="kabarPopup">
        <div class="absolute inset-0 bg-on-background/60 backdrop-blur-sm" onclick="closeKabarPopup()"></div>
        <div
            class="kabar-popup-content relative bg-surface rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
            <button
                class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-surface-container-low hover:bg-surface-variant flex items-center justify-center text-on-surface-variant hover:text-on-surface transition-colors"
                onclick="closeKabarPopup()">
                <span class="material-symbols-outlined">close</span>
            </button>
            <div id="kabarPopupBody">
                <!-- Content will be injected here -->
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
                    <img alt="Sarana Berbagi Logo" class="h-12 w-auto bg-white rounded-full p-1"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBkVq0f0LLfYS7dU8RJGU5KzjD5Wr3nj7lSxJVutV2aleHZ4DBlOopaEMpMAsOdwKw__VEBN39NDKDNb0AxA34KayLOYKp7bv1cTyZK0p1g07LPKPiF-tOeEckswVX6QTiDDpDJQSFwOaIqINe04sRMpBg8TQwOrHSlE0YT1uUKhX6IL2liYA66XpuKleso30IWhQxDjGK23EVglVKCDKxHstHgr48wTumBGutS0GsqK4vqUbbV8Tja9Q6qEcEWlxbXigM">
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
        const kabarData = {
            1: {
                category: 'Edukasi',
                categoryColor: 'primary-container',
                readTime: '5 min baca',
                title: 'Perpustakaan Keliling Tiba di Desa Harapan',
                author: 'Tim Redaksi',
                date: '12 Okt 2024',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCtWbu662_2iNprm3alF0kRYaVnj_AcLjFaNMAdEanEt2kEPtK10neEJan1lIlnwR0Eypa7X933lr30xQDo2kPIpvy5vbHdxhWVz_WUmZ5V0ZOhrhhW6CsZDNtTT2ytO-ejtCGhSfOm_pDszAGOBLyGxmF0uUg_vsbRpn1pRFdEPbUVSh3_s2HCVasEhtvOHnfA53Oaqh9HYqw5Jm-_DVNyYrKEdax3YR76z9irRp8-OLMANMDmpf_Hjg',
                caption: 'Relawan Sarana Berbagi membagikan buku-buku baru kepada anak-anak di Desa Harapan.',
                excerpt: 'Membawa ratusan buku baru, relawan kami menghabiskan akhir pekan berbagi cerita dan pengetahuan dengan anak-anak di pelosok.',
                content: `
            <p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Program perpustakaan keliling Sarana Berbagi kembali menyapa anak-anak di pelosok desa. Kali ini, Desa Harapan menjadi tujuan utama dalam misi menyebarkan literasi dan pengetahuan.</p>
            <h2 class="font-h2 text-h2 mt-12 mb-6">Misi Berbagi Pengetahuan</h2>
            <p class="mb-6">Lebih dari 500 buku baru berhasil didistribusikan dalam program ini. Tidak hanya meminjamkan buku, relawan kami juga mengadakan sesi mendongeng dan aktivitas kreatif untuk membangun minat baca anak-anak.</p>
            <p class="mb-8">Antusiasme terlihat dari wajah-wajah ceria mereka. Banyak yang bahkan meminta agar program ini dapat datang kembali bulan depan.</p>
            <blockquote class="border-l-4 border-primary-container pl-6 py-2 my-10 bg-surface-container-low/50 rounded-r-lg"><p class="font-h3 text-h3 text-primary-container italic mb-2">"Buku adalah jendela dunia. Melalui program ini, kami berharap dapat membuka wawasan lebih luas bagi anak-anak desa."</p></blockquote>
            <h2 class="font-h2 text-h2 mt-12 mb-6">Dampak yang Dirasakan</h2>
            <p class="mb-6">Sejak diluncurkan tiga tahun lalu, program perpustakaan keliling telah mengunjungi lebih dari 50 desa dan menjangkau lebih dari 10.000 anak di seluruh Indonesia.</p>
            <p class="">Dukungan donatur menjadi kunci keberlangsungan program ini. Setiap kontribusi yang Anda berikan membantu kami membawa lebih banyak buku dan pengetahuan ke daerah-daerah yang membutuhkan.</p>
        `
            },
            2: {
                category: 'Kesehatan',
                categoryColor: 'secondary-container',
                readTime: '4 min baca',
                title: 'Klinik Berjalan Melayani 500 Warga Lansia',
                author: 'Dr. Andi Wijaya',
                date: '08 Okt 2024',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuB8JJYQSs4hSDhny6bWDq6C8tL3CNgX5Vuo1ax6SXD7haKd-UsCujEce-pTHKwoo6VkHNvJXtOqp2kzfKzKKC0AwuCXUPyvkA4DcGVjpaS0_bnQPztiHVcvJR41noQ0TBjThu9b9ooLtoZnPcACgbqsz99OPlt4V81lqJa-G2jxfISH0EZeipYnJkwiAg7OOAKDN8eK-KzpCv4RI_RHxQS9RyOUXjrLgmWWTTK4P7rlX-g1YcQgz8s3qA',
                caption: 'Tim medis Sarana Berbagi memberikan pemeriksaan kesehatan gratis kepada warga lansia.',
                excerpt: 'Program pemeriksaan kesehatan gratis kami bulan ini berfokus pada kesejahteraan lansia di daerah terpencil dengan akses medis terbatas.',
                content: `
            <p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Program klinik berjalan Sarana Berbagi kembali menunjukkan komitmen kami dalam meningkatkan akses kesehatan bagi masyarakat di daerah terpencil, khususnya untuk kelompok lansia.</p>
            <h2 class="font-h2 text-h2 mt-12 mb-6">Pelayanan yang Komprehensif</h2>
            <p class="mb-6">Tim medis kami terdiri dari 5 dokter umum, 10 perawat, dan 2 apoteker yang siap memberikan pelayanan kesehatan lengkap mulai dari pemeriksaan umum, pengukuran tekanan darah, hingga penyediaan obat-obatan esensial.</p>
            <p class="mb-8">Lebih dari 500 warga lansia telah mendapatkan manfaat dari program bulan ini. Sebagian besar mengalami masalah kesehatan yang umum dialami lansia seperti hipertensi dan diabetes.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-10"><div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/30"><span class="material-symbols-outlined text-primary-container text-4xl mb-4">medical_services</span><h3 class="font-h3 text-xl mb-2">Pemeriksaan Gratis</h3><p class="font-body-md text-sm text-on-surface-variant">Pemeriksaan kesehatan lengkap tanpa biaya untuk seluruh peserta.</p></div><div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/30"><span class="material-symbols-outlined text-primary-container text-4xl mb-4">medication</span><h3 class="font-h3 text-xl mb-2">Obat-obatan</h3><p class="font-body-md text-sm text-on-surface-variant">Penyediaan obat esensial secara gratis bagi yang membutuhkan.</p></div></div>
            <h2 class="font-h2 text-h2 mt-12 mb-6">Keberlanjutan Program</h2>
            <p class="">Program klinik berjalan akan terus digelar setiap bulan di berbagai desa. Kami berkomitmen untuk menjangkau lebih banyak lansia yang membutuhkan akses kesehatan yang layak.</p>
        `
            },
            3: {
                category: 'Tanggap Bencana',
                categoryColor: 'error-container',
                readTime: '6 min baca',
                title: 'Distribusi Air Bersih Pasca Gempa',
                author: 'Tim Tanggap Darurat',
                date: '25 Sep 2024',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAuNn8SWz1-gb07ckiocA_tz4YyBPpeSOB0GqDB6zpekTROOVs2bQyPVfSG3Q83l7bR_9EaI520iHc20SCs_7r-PozeQuw2SuRHS5KKUrAxW8Lr3jfKeog6_ABuSg-CsQG51Px9e-izEL6jfRGys928Hi7Vtp5xxsjim09TgWk-rLUNNRyLbntLf1UR65QpcMtYUxXKxF4ul1kiVpNLNkaPhW5LVjTBo-Ww7TNYDU_2CBZuOQKdMJifvA',
                caption: 'Tim reaksi cepat mendirikan titik distribusi air bersih untuk warga terdampak gempa.',
                excerpt: 'Tim reaksi cepat Sarana Berbagi telah mendirikan 5 titik distribusi air bersih untuk membantu keluarga yang terdampak.',
                content: `
            <p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Bencana gempa bumi yang baru saja terjadi telah meninggalkan dampak signifikan bagi masyarakat. Akses air bersih menjadi salah satu kebutuhan paling mendesak yang harus segera dipenuhi.</p>
            <h2 class="font-h2 text-h2 mt-12 mb-6">Respons Cepat Tim Darurat</h2>
            <p class="mb-6">Dalam waktu kurang dari 24 jam, tim tanggap darurat Sarana Berbagi telah berada di lokasi dan mulai mendistribusikan air bersih ke titik-titik pengungsian. Lima titik distribusi didirikan untuk memastikan cakupan yang merata.</p>
            <p class="mb-8">Setiap titik distribrasi mampu melayani hingga 200 kepala keluarga per hari dengan kebutuhan air bersih yang layak konsumsi.</p>
            <blockquote class="border-l-4 border-primary-container pl-6 py-2 my-10 bg-surface-container-low/50 rounded-r-lg"><p class="font-h3 text-h3 text-primary-container italic mb-2">"Air bersih adalah hak setiap manusia. Dalam situasi darurat seperti ini, kami hadir untuk memastikan kebutuhan dasar ini terpenuhi."</p></blockquote>
            <h2 class="font-h2 text-h2 mt-12 mb-6">Fokus pada Kelompok Rentan</h2>
            <p class="mb-6">Anak-anak dan lansia menjadi prioritas utama dalam distribusi ini. Tim kami juga menyediakan edukasi tentang pengolahan air darurat untuk mencegah penyakit pasca bencana.</p>
            <p class="">Dukungan dari para donatur sangat berarti untuk memperluas jangkauan bantuan. Setiap kontribusi membantu kami menyediakan lebih banyak air bersih bagi yang membutuhkan.</p>
        `
            },
            4: {
                category: 'Kisah Sukses',
                categoryColor: 'tertiary-container',
                readTime: '7 min baca',
                title: 'Ibu Siti: Mengubah Lahan Kering Menjadi Kebun Produktif',
                author: 'Nur Aini, S.Pd',
                date: '15 Sep 2024',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDnUwyD1IG2V_5-KpX5REOEkQ1TJUmzH45nYDaS3GZX28ZbCZFjLNAkraX35GfZE9ik_H7-aAp1x2d6FnNKxC6slZh6uLt_mjTy000dQjAo012tmYPGS5FZCrlhNSqa5UGUyoS9EggmptVvxnVH4P-e8J-sUAtmYa70IL_FZ8bRyRHAvUgC9_paPavpgSdzQYiJRwwK3cmP1XqmyDZrA9x-C4d-UiUPxyxG2AGcHl5I8mbIHWk_PPPwLA',
                caption: 'Ibu Siti memetik sayur organik dari kebun produktifnya di desa.',
                excerpt: 'Berkat program pemberdayaan ekonomi, Ibu Siti kini menjadi pemasok sayur organik utama di desanya.',
                content: `
            <p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Di tengah keterbatasan lahan kering di desanya, Ibu Siti membuktikan bahwa tekad dan pengetahuan dapat mengubah tantangan menjadi peluang. Kini, ia menjadi inspirasi bagi banyak perempuan di sekitarnya.</p>
            <h2 class="font-h2 text-h2 mt-12 mb-6">Awal Mula Perjalanan</h2>
            <p class="mb-6">Tiga tahun lalu, Ibu Siti hanyalah seorang ibu rumah tangga dengan lahan kosong di belakang rumahnya. Melalui program pemberdayaan ekonomi Sarana Berbagi, ia mendapatkan pelatihan pertanian organik dan bantuan bibit tanaman.</p>
            <p class="mb-8">Dengan tekun dan penuh dedikasi, lahan kering seluas 500 meter persegi itu kini menjadi kebun produktif yang menghasilkan berbagai jenis sayuran organik.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-10"><div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/30"><span class="material-symbols-outlined text-primary-container text-4xl mb-4">eco</span><h3 class="font-h3 text-xl mb-2">Pertanian Organik</h3><p class="font-body-md text-sm text-on-surface-variant">Menggunakan metode ramah lingkungan tanpa bahan kimia berbahaya.</p></div><div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/30"><span class="material-symbols-outlined text-primary-container text-4xl mb-4">trending_up</span><h3 class="font-h3 text-xl mb-2">Pendapatan Meningkat</h3><p class="font-body-md text-sm text-on-surface-variant">Penjualan sayur organik meningkat 300% dalam setahun terakhir.</p></div></div>
            <h2 class="font-h2 text-h2 mt-12 mb-6">Menginspirasi Lingkungan</h2>
            <p class="mb-6">Kisah sukses Ibu Siti kini menginspirasi 15 ibu-ibu lain di desanya untuk mengikuti jejaknya. Mereka kini memiliki kebun organik masing-masing dan secara kolektif memasok pasar lokal.</p>
            <p class="">Program pemberdayaan ekonomi Sarana Berbagi telah membantu lebih dari 200 perempuan di berbagai desa untuk mandiri secara ekonomi.</p>
        `
            },
            5: {
                category: 'Edukasi',
                categoryColor: 'primary-container',
                readTime: '3 min baca',
                title: 'Renovasi SD Inpres Selesai Lebih Cepat',
                author: 'Tim Infrastructure',
                date: '02 Sep 2024',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBsm8hA1U-3AAbSwvylFj_0Q3-WZ32YI3BI1aGX6pBxjPWKONrbzltHZ688eibuH9pTPqUOCv1EJ9mKuPD9eIbTVFxfuAtfVSLFt_oWVWxDVGhfjPbzLflLad9v-3z7rUB7kKSkP5iHUolZ1tI4RC3mCfq3eQ_lr8g2rVTWSh_QZyrAbaRWV5G6V7zHn91AfYbvnjONdk7ajGfOq6LoQjJ410F7xwrHAaj1IFzOM23J1_l-ACXqQ3cY_Bg',
                caption: 'Relawan dan warga bersama-sama merenovasi fasilitas sekolah.',
                excerpt: 'Antusiasme puluhan relawan lokal membuat proses perbaikan fasilitas sekolah ini rampung sebelum tahun ajaran baru dimulai.',
                content: `
            <p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Apa yang seharusnya memakan waktu tiga bulan, berhasil diselesaikan dalam waktu hanya enam minggu. Semangat gotong royong antara relawan dan warga desa menjadi kunci keberhasilan renovasi SD Inpres ini.</p>
            <h2 class="font-h2 text-h2 mt-12 mb-6">Semangat Gotong Royong</h2>
            <p class="mb-6">Lebih dari 50 relawan dari berbagai latar belakang bergabung dalam proyek ini. Mulai dari tukang kayu, tukang batu, hingga mahasiswa yang rela meluangkan waktu mereka untuk membantu memperbaiki fasilitas pendidikan.</p>
            <p class="mb-8">Hasilnya, tiga ruang kelas yang sebelumnya rusak berat kini telah diperbaiki dan dilengkapi dengan meja dan kursi baru. Toilet dan area bermain juga direnovasi untuk kenyamanan siswa.</p>
            <blockquote class="border-l-4 border-primary-container pl-6 py-2 my-10 bg-surface-container-low/50 rounded-r-lg"><p class="font-h3 text-h3 text-primary-container italic mb-2">"Melihat anak-anak bisa belajar dengan nyaman, semua lelah kami terbayar lunas."</p></blockquote>
            <h2 class="font-h2 text-h2 mt-12 mb-6">Siap Sambut Tahun Ajaran Baru</h2>
            <p class="">Dengan selesainya renovasi ini, seluruh siswa SD Inpres kini memiliki lingkungan belajar yang lebih baik dan lebih aman untuk menyambut tahun ajaran baru.</p>
        `
            },
            6: {
                category: 'Kabar',
                categoryColor: 'secondary-container',
                readTime: '5 min baca',
                title: 'Panel Surya Untuk Balai Desa Terang',
                author: 'Tim Energi Bersih',
                date: '28 Agu 2024',
                image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBJ2qwp5lEwfGe0FhFBQkcUck3kLYfEZiogCmY-s3pBlurTSW-XdavlPf-IFBxjvUZgQikWOejKgnwbf_-7GbTeB-UqUbwolsG_wBmbg1M7eO7lJ2h8Rvsj1LaGOpYZnddiiLBIO7-rYWvqI22gDZI8Q1Pq2vwEui8Ev8fOhFrS_X0IxXAK2MlIJJB91K4nIBpUwU75mTKb86NIM5KEEZA0ERWyoCR2yanArahqK8ACDKlQJV9fMwVUhg',
                caption: 'Panel surya terpasang di atap balai desa untuk menyediakan energi bersih.',
                excerpt: 'Inisiatif energi bersih kami mulai menunjukkan hasil. Malam hari di balai desa kini bisa dimanfaatkan untuk kegiatan belajar warga.',
                content: `
            <p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Program energi bersih Sarana Berbagi memasuki tahap baru dengan pemasangan panel surya di balai desa. Inisiatif ini tidak hanya menerangi malam hari, tetapi juga membuka peluang baru bagi masyarakat.</p>
            <h2 class="font-h2 text-h2 mt-12 mb-6">Energi untuk Kemajuan</h2>
            <p class="mb-6">Pemasangan 20 panel surya di atap balai desa kini mampu menghasilkan listrik yang cukup untuk menerangi seluruh area balai desa hingga 10 jam setiap malamnya. Ini merupakan langkah besar bagi desa yang sebelumnya belum memiliki akses listrik yang memadai.</p>
            <p class="mb-8">Dengan adanya listrik, kini masyarakat dapat mengadakan berbagai kegiatan di malam hari seperti belajar bersama, pelatihan keterampikan, hingga pertemuan desa.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-10"><div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/30"><span class="material-symbols-outlined text-primary-container text-4xl mb-4">solar_power</span><h3 class="font-h3 text-xl mb-2">Energi Terbarukan</h3><p class="font-body-md text-sm text-on-surface-variant">20 panel surya menghasilkan energi bersih untuk seluruh balai desa.</p></div><div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/30"><span class="material-symbols-outlined text-primary-container text-4xl mb-4">lightbulb</span><h3 class="font-h3 text-xl mb-2">Malam yang Terang</h3><p class="font-body-md text-sm text-on-surface-variant">Kegiatan malam hari kini dimungkinkan dengan penerangan yang memadai.</p></div></div>
            <h2 class="font-h2 text-h2 mt-12 mb-6">Keberlanjutan Lingkungan</h2>
            <p class="">Program ini juga bagian dari komitmen Sarana Berbagi dalam mendukung penggunaan energi terbarukan. Kami berharap dapat memperluas inisiatif ini ke desa-desa lain di masa mendatang.</p>
        `
            }
        };

        let isHoveringPopup = false;

        function openKabarPopup(id) {
            const data = kabarData[id];
            if (!data) return;
            const popup = document.getElementById('kabarPopup');
            const body = document.getElementById('kabarPopupBody');
            const categoryClass = data.categoryColor === 'primary-container' ?
                'bg-primary-container text-on-primary-container' : data.categoryColor === 'secondary-container' ?
                'bg-secondary-container text-on-secondary-container' : data.categoryColor === 'error-container' ?
                'bg-error-container text-on-error-container' : 'bg-tertiary-container text-on-tertiary-container';
            body.innerHTML =
                `<article class="max-w-[720px] mx-auto p-6 md:p-10"><div class="flex items-center space-x-2 mb-6"><span class="inline-flex items-center px-3 py-1 rounded-full ${categoryClass} font-label-sm text-label-sm">${data.category}</span><span class="text-outline text-sm">•</span><span class="text-on-surface-variant font-body-md text-sm">${data.readTime}</span></div><h1 class="font-h1 text-h1-mobile md:text-h1 text-on-surface mb-6">${data.title}</h1><div class="flex items-center space-x-4 mb-10 pb-8 border-b border-outline-variant/30"><div class="w-12 h-12 rounded-full overflow-hidden bg-surface-variant flex items-center justify-center"><span class="material-symbols-outlined text-on-surface-variant">person</span></div><div><p class="font-label-sm text-label-sm text-on-surface">${data.author}</p><p class="font-body-md text-sm text-on-surface-variant">${data.date}</p></div></div><figure class="mb-12 relative rounded-2xl overflow-hidden shadow-sm"><div class="bg-cover bg-center w-full aspect-video" style="background-image: url('${data.image}');"></div><figcaption class="mt-3 text-center text-sm text-on-surface-variant font-body-md">${data.caption}</figcaption></figure><div class="prose prose-custom prose-lg font-body-lg text-body-lg text-on-surface max-w-none">${data.content}</div><div class="mt-16 bg-primary text-on-primary rounded-2xl p-8 md:p-12 text-center shadow-lg relative overflow-hidden"><div class="relative z-10"><h3 class="font-h2 text-h2 mb-4">Mari Bersama Ringankan Beban Mereka</h3><p class="font-body-lg text-lg mb-8 opacity-90 max-w-2xl mx-auto">Donasi Anda akan disalurkan langsung untuk program-program kami di seluruh Indonesia.</p><a href="{{ url('/donasi') }}" class="inline-block bg-[#F59E0B] hover:bg-[#D97706] text-white font-label-sm text-label-sm px-8 py-4 rounded-lg transition-colors shadow-md active:scale-95">Donasi Sekarang</a></div></div></article>`;
            popup.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeKabarPopup() {
            const popup = document.getElementById('kabarPopup');
            popup.classList.remove('active');
            document.body.style.overflow = '';
        }

        document.addEventListener('DOMContentLoaded', function() {
            const detailLinks = document.querySelectorAll('.kabar-detail-link');
            const popup = document.getElementById('kabarPopup');
            detailLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const id = this.dataset.id;
                    openKabarPopup(id);
                });
            });
            popup.addEventListener('mouseleave', function() {
                closeKabarPopup();
            });
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeKabarPopup();
        });
    </script>
</body>

</html>
