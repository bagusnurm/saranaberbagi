<!DOCTYPE html>
<html lang="id" style="">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Program Kebaikan Kami - Sarana Berbagi</title>
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

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden
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
                    class="text-primary font-semibold border-b-2 border-primary pb-1 px-3 py-2 font-body-md text-body-md"
                    href="{{ url('/program') }}">Program</a><a
                    class="text-on-surface-variant hover:text-primary transition-colors rounded-lg px-3 py-2 font-body-md text-body-md"
                    href="{{ url('/kabar') }}">Kabar</a><a
                    class="text-on-surface-variant hover:text-primary transition-colors rounded-lg px-3 py-2 font-body-md text-body-md"
                    href="{{ url('/berita') }}">Berita</a><a
                    class="text-on-surface-variant dark:text-surface-variant hover:text-primary dark:hover:text-primary-fixed transition-colors hover:bg-surface-container-low dark:hover:bg-inverse-surface rounded-lg px-3 py-2 active:scale-95 duration-200 font-body-md text-body-md"
                    href="{{ url('/karir') }}">Karir</a><a
                    class="text-on-surface-variant hover:text-primary transition-colors rounded-lg px-3 py-2 font-body-md text-body-md"
                    href="{{ url('/digital-collaborators') }}">Digital Collaborators</a></div>
            <div class="flex items-center gap-4"><a
                    class="bg-[#F59E0B] text-white font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm"
                    href="{{ url('/donasi') }}">Donasi</a></div>
        </div>
    </nav>
    <main class="flex-grow pt-32 pb-section-padding px-margin-desktop max-w-container-max mx-auto w-full">
        <section class="mb-12">
            <div class="max-w-2xl">
                <h1 class="font-h1 text-h1 text-on-surface mb-4">Program Kebaikan Kami</h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant">Jelajahi berbagai program yang kami
                    jalankan. Temukan inisiatif yang sejalan dengan nilai Anda dan mari bersama menciptakan dampak
                    positif.</p>
            </div>
        </section>
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- 1 Berbagi Al-Qur'an -->
            <div data-program="berbagi-al-quran"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuALuOhhE3tuu98B6i71IvQOlav-eK0yv4v_Tl2BYapNAmi6wcJ2ri-OXgKmgf46d61mRb8tFobCqSZp7XEF-u6CRI4L01bCbO6y2b5D_ybIfU92FiyuvfBYegiH47ojabu1nnkMKts85mO2Tqj4fYJh4supSYOZ-h5VG5gquOGYNWKEtObjRLyN2XkxMvyFc4GmHZ1DRlLmWgQsh73JTWjVIuwdyUDm6wUNwhl-W810qSbrUMf1lDMMgw"><span
                        class="absolute top-4 left-4 bg-primary-container text-on-primary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Qur'an</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Berbagi Al-Qur'an</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Hadiahkan Mushaf,
                        Tebarkan Pahala Tanpa Putus.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 2 Berbagi Sembako -->
            <div data-program="berbagi-sembako"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQ0vf9MNcxwM4v-vbpa-Lu7GJzAwRnSdPRWRnTJ6CoM1qoC1nogppb-ddvg02GZXtEAR90CBj9xJEklX7wKLaPyt3AlCnFSLtc3depA3rVWUCu40bJftLqi7VxHAm-G4EV19wmAjHVUHhgacFbOCB9XQ4UBl8kEUEkGKBZojw1J2scgwCvtBjlPPW4xqfFxrwj3zb2qT_EdwqVbYslaZ0rOTt3hOCbUzpEHN-oWGbVf1Q2NsT3TlI9dg"><span
                        class="absolute top-4 left-4 bg-secondary-container text-on-secondary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Sembako</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Berbagi Sembako</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Sembako dari Anda,
                        Nafkah untuk Mereka.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 3 Fidyah -->
            <div data-program="sarana-berbagi-fidyah"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuD9FLgw-08lOvQJD1yIBz4O_y8NXsLNjqu6Dk6NxB5p9wCxOKv4FyNS9Hz_XJGDuhtuNvl0gbCqU88PFt8uhh_-bZVjd2NKpli2WIjx9BZz_O_bDbn7_sztBqQMi7buROFzz6AUGn9UPezt3RXNiL8nojH0D08i8g_Z-VVAf-n6Udw3iLx1cXyz1f25AG8qSzIpHWsjy_tUX74gtNT_oPqtuA-eLhiLBz2EpJwdsrv02fjWCcJte5uEBA"><span
                        class="absolute top-4 left-4 bg-tertiary-container text-on-tertiary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Fidyah</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Sarana Berbagi Fidyah</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Mudah Menunaikan,
                        Tepat Menyalurkan.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 4 Karpet -->
            <div data-program="sarana-berbagi-karpet"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBqkEVHUoHDtcsKqPS726BzN5EIZ6BYYYfkkeQBlF7djwPHYdsklMLh_yT2VSE2mRLr7McFUGluHpfHoAN_TBL5J3_gvmqArGpY50LmxcpbvHWJwRysgsA4VBx9JpsLlv1PBmmNybtStkIDlO2QEJ2Mh7rrAiPPSUSLvVPTHgDLeKNiMSeR8UV3L1RYdM3SwBfJCOYO_sW9oQqznCS2jF9CtLlIYev_0TJsbdgcjSQTmB8Vre8KplzaAQ"><span
                        class="absolute top-4 left-4 bg-primary-container text-on-primary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Karpet</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Sarana Berbagi Karpet</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Bentangkan Karpet,
                        Sebarkan Pahala.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 5 YASABI BERANI -->
            <div data-program="yasabi-berani"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHqUBatS6T8mBCQmW1fNGymME7zIWVVi5Ux-G22iNaqENpSxWl_AH-ncgY_Dgar7BYzCDY0jz_dPxA-ooyvC9F9ONSGDJ0Q3gAmkWc3wSTCDmwawCJedf0T27iVxBgRYe_M5N1XxtyB1Jv8Q_9LACe4woJF2RDuN3qyzLqgUkM_SyScDJpCSD8whnzG1L7J_GIAcIE3RjIsjHMj_Ch_tyyS3kvcEQ-OHQicY1_PYpQzGKjLuc6EODE6g"><span
                        class="absolute top-4 left-4 bg-error-container text-on-error-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Qurban</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">YASABI BERANI</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Yasabi Berbagi
                        Anugerah Idul Adha.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 6 Sedekah Daging -->
            <div data-program="sedekah-daging"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBzPLI696a9SPT7-ffG9gQHZuwhKF1z4ykAQwj3GBiIICCL5ott4YNcl0Hlmwy5pIlDnWb-ehhPCvEhfQE0mWe-C9hrm5JOhyTK3s6eIKXA9jaP4ML3ezJzG0zhZxFfhcD4wWHGvqK0hpktYgWGe_UaPpVPCVQv70nQdPUw5_mYV-swJzPxtycPkNK8gq5bGe-GcihNADZaeBZH22Mg1WxCS0GUSKcHXxfsgRCte_DvJ6QA8N_vdaoFBg"><span
                        class="absolute top-4 left-4 bg-secondary-container text-on-secondary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Sedekah</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Sedekah Daging</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Satu Bungkus Daging,
                        Sejuta Kebahagiaan.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 7 Kafarat -->
            <div data-program="sarana-kafarat"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuALuOhhE3tuu98B6i71IvQOlav-eK0yv4v_Tl2BYapNAmi6wcJ2ri-OXgKmgf46d61mRb8tFobCqSZp7XEF-u6CRI4L01bCbO6y2b5D_ybIfU92FiyuvfBYegiH47ojabu1nnkMKts85mO2Tqj4fYJh4supSYOZ-h5VG5gquOGYNWKEtObjRLyN2XkxMvyFc4GmHZ1DRlLmWgQsh73JTWjVIuwdyUDm6wUNwhl-W810qSbrUMf1lDMMgw"><span
                        class="absolute top-4 left-4 bg-tertiary-container text-on-tertiary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Kafarat</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Sarana Kafarat</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Menyalurkan kafarat
                        dari berbagai jenis pelanggaran (batal puasa wajib tanpa uzur, melanggar sumpah, atau membunuh
                        tanpa sengaja).</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 8 Kado Guru Ngaji -->
            <div data-program="kado-guru-ngaji"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQ0vf9MNcxwM4v-vbpa-Lu7GJzAwRnSdPRWRnTJ6CoM1qoC1nogppb-ddvg02GZXtEAR90CBj9xJEklX7wKLaPyt3AlCnFSLtc3depA3rVWUCu40bJftLqi7VxHAm-G4EV19wmAjHVUHhgacFbOCB9XQ4UBl8kEUEkGKBZojw1J2scgwCvtBjlPPW4xqfFxrwj3zb2qT_EdwqVbYslaZ0rOTt3hOCbUzpEHN-oWGbVf1Q2NsT3TlI9dg"><span
                        class="absolute top-4 left-4 bg-primary-container text-on-primary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Pendidikan</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Kado Guru Ngaji</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Hadiah Kecil untuk
                        Pahlawan yang Tak Terdengar.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 9 BERDAYA -->
            <div data-program="berdaya"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuD9FLgw-08lOvQJD1yIBz4O_y8NXsLNjqu6Dk6NxB5p9wCxOKv4FyNS9Hz_XJGDuhtuNvl0gbCqU88PFt8uhh_-bZVjd2NKpli2WIjx9BZz_O_bDbn7_sztBqQMi7buROFzz6AUGn9UPezt3RXNiL8nojH0D08i8g_Z-VVAf-n6Udw3iLx1cXyz1f25AG8qSzIpHWsjy_tUX74gtNT_oPqtuA-eLhiLBz2EpJwdsrv02fjWCcJte5uEBA"><span
                        class="absolute top-4 left-4 bg-error-container text-on-error-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Dhuafa</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">BERDAYA</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Beras Dhuafa dan
                        Yatim - Karena Mereka Berhak Hidup Lebih Berdaya.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 10 JURAGAN -->
            <div data-program="juragan"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBqkEVHUoHDtcsKqPS726BzN5EIZ6BYYYfkkeQBlF7djwPHYdsklMLh_yT2VSE2mRLr7McFUGluHpfHoAN_TBL5J3_gvmqArGpY50LmxcpbvHWJwRysgsA4VBx9JpsLlv1PBmmNybtStkIDlO2QEJ2Mh7rrAiPPSUSLvVPTHgDLeKNiMSeR8UV3L1RYdM3SwBfJCOYO_sW9oQqznCS2jF9CtLlIYev_0TJsbdgcjSQTmB8Vre8KplzaAQ"><span
                        class="absolute top-4 left-4 bg-secondary-container text-on-secondary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Jumat</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">JURAGAN</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Jum'at Ragam
                        Kebaikan - Setiap Jumat, Tebar Banyak Manfaat.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 11 Masjid -->
            <div data-program="sarana-membangun-masjid"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHqUBatS6T8mBCQmW1fNGymME7zIWVVi5Ux-G22iNaqENpSxWl_AH-ncgY_Dgar7BYzCDY0jz_dPxA-ooyvC9F9ONSGDJ0Q3gAmkWc3wSTCDmwawCJedf0T27iVxBgRYe_M5N1XxtyB1Jv8Q_9LACe4woJF2RDuN3qyzLqgUkM_SyScDJpCSD8whnzG1L7J_GIAcIE3RjIsjHMj_Ch_tyyS3kvcEQ-OHQicY1_PYpQzGKjLuc6EODE6g"><span
                        class="absolute top-4 left-4 bg-primary-container text-on-primary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Masjid</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Sarana Membangun Masjid</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Bersama Bangun Rumah
                        Allah, Tebar Pahala Tak Berujung.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 12 Peduli Bencana -->
            <div data-program="sarana-peduli-bencana"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBzPLI696a9SPT7-ffG9gQHZuwhKF1z4ykAQwj3GBiIICCL5ott4YNcl0Hlmwy5pIlDnWb-ehhPCvEhfQE0mWe-C9hrm5JOhyTK3s6eIKXA9jaP4ML3ezJzG0zhZxFfhcD4wWHGvqK0hpktYgWGe_UaPpVPCVQv70nQdPUw5_mYV-swJzPxtycPkNK8gq5bGe-GcihNADZaeBZH22Mg1WxCS0GUSKcHXxfsgRCte_DvJ6QA8N_vdaoFBg"><span
                        class="absolute top-4 left-4 bg-error-container text-on-error-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Bencana</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Sarana Peduli Bencana</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Tanggap Cepat,
                        Peduli Nyata.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 13 Subuh Berkah -->
            <div data-program="subuh-berkah"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuALuOhhE3tuu98B6i71IvQOlav-eK0yv4v_Tl2BYapNAmi6wcJ2ri-OXgKmgf46d61mRb8tFobCqSZp7XEF-u6CRI4L01bCbO6y2b5D_ybIfU92FiyuvfBYegiH47ojabu1nnkMKts85mO2Tqj4fYJh4supSYOZ-h5VG5gquOGYNWKEtObjRLyN2XkxMvyFc4GmHZ1DRlLmWgQsh73JTWjVIuwdyUDm6wUNwhl-W810qSbrUMf1lDMMgw"><span
                        class="absolute top-4 left-4 bg-tertiary-container text-on-tertiary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Sedekah</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Subuh Berkah</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Rutinkan Sedekah,
                        Jemput Berkah di Waktu Mustajab.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 14 Sarana Sedekah -->
            <div data-program="sarana-sedekah"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQ0vf9MNcxwM4v-vbpa-Lu7GJzAwRnSdPRWRnTJ6CoM1qoC1nogppb-ddvg02GZXtEAR90CBj9xJEklX7wKLaPyt3AlCnFSLtc3depA3rVWUCu40bJftLqi7VxHAm-G4EV19wmAjHVUHhgacFbOCB9XQ4UBl8kEUEkGKBZojw1J2scgwCvtBjlPPW4xqfFxrwj3zb2qT_EdwqVbYslaZ0rOTt3hOCbUzpEHN-oWGbVf1Q2NsT3TlI9dg"><span
                        class="absolute top-4 left-4 bg-primary-container text-on-primary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Sedekah</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Sarana Sedekah</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Jadi Jalan Kebaikan
                        untuk Banyak Orang.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 15 Sarana Sehat -->
            <div data-program="sarana-sehat"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuD9FLgw-08lOvQJD1yIBz4O_y8NXsLNjqu6Dk6NxB5p9wCxOKv4FyNS9Hz_XJGDuhtuNvl0gbCqU88PFt8uhh_-bZVjd2NKpli2WIjx9BZz_O_bDbn7_sztBqQMi7buROFzz6AUGn9UPezt3RXNiL8nojH0D08i8g_Z-VVAf-n6Udw3iLx1cXyz1f25AG8qSzIpHWsjy_tUX74gtNT_oPqtuA-eLhiLBz2EpJwdsrv02fjWCcJte5uEBA"><span
                        class="absolute top-4 left-4 bg-secondary-container text-on-secondary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Kesehatan</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Sarana Sehat</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Ringankan Derita,
                        Tebarkan Cinta Sehat.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 16 Borong Jajanan -->
            <div data-program="sarana-borong-jajanan"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBqkEVHUoHDtcsKqPS726BzN5EIZ6BYYYfkkeQBlF7djwPHYdsklMLh_yT2VSE2mRLr7McFUGluHpfHoAN_TBL5J3_gvmqArGpY50LmxcpbvHWJwRysgsA4VBx9JpsLlv1PBmmNybtStkIDlO2QEJ2Mh7rrAiPPSUSLvVPTHgDLeKNiMSeR8UV3L1RYdM3SwBfJCOYO_sW9oQqznCS2jF9CtLlIYev_0TJsbdgcjSQTmB8Vre8KplzaAQ"><span
                        class="absolute top-4 left-4 bg-tertiary-container text-on-tertiary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Jajanan</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Sarana Borong Jajanan</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Bantu Pedagang,
                        Bahagiakan yang Berbuka.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 17 Senin Kamis -->
            <div data-program="senin-kamis-berbagi"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHqUBatS6T8mBCQmW1fNGymME7zIWVVi5Ux-G22iNaqENpSxWl_AH-ncgY_Dgar7BYzCDY0jz_dPxA-ooyvC9F9ONSGDJ0Q3gAmkWc3wSTCDmwawCJedf0T27iVxBgRYe_M5N1XxtyB1Jv8Q_9LACe4woJF2RDuN3qyzLqgUkM_SyScDJpCSD8whnzG1L7J_GIAcIE3RjIsjHMj_Ch_tyyS3kvcEQ-OHQicY1_PYpQzGKjLuc6EODE6g"><span
                        class="absolute top-4 left-4 bg-primary-container text-on-primary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Puasa</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Senin Kamis Berbagi</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Berbagi Buka, Tebar
                        Pahala Puasa Sunnah.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 18 Wakaf Air Sumur -->
            <div data-program="sarana-wakaf-air-sumur"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBzPLI696a9SPT7-ffG9gQHZuwhKF1z4ykAQwj3GBiIICCL5ott4YNcl0Hlmwy5pIlDnWb-ehhPCvEhfQE0mWe-C9hrm5JOhyTK3s6eIKXA9jaP4ML3ezJzG0zhZxFfhcD4wWHGvqK0hpktYgWGe_UaPpVPCVQv70nQdPUw5_mYV-swJzPxtycPkNK8gq5bGe-GcihNADZaeBZH22Mg1WxCS0GUSKcHXxfsgRCte_DvJ6QA8N_vdaoFBg"><span
                        class="absolute top-4 left-4 bg-secondary-container text-on-secondary-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Wakaf</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Sarana Wakaf Air Sumur</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Alirkan Kebaikan,
                        Hidupkan Harapan.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
            </div>
            <!-- 19 Air Bersih -->
            <div data-program="sarana-air-bersih"
                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">
                <div class="relative h-48 w-full overflow-hidden"><img
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuALuOhhE3tuu98B6i71IvQOlav-eK0yv4v_Tl2BYapNAmi6wcJ2ri-OXgKmgf46d61mRb8tFobCqSZp7XEF-u6CRI4L01bCbO6y2b5D_ybIfU92FiyuvfBYegiH47ojabu1nnkMKts85mO2Tqj4fYJh4supSYOZ-h5VG5gquOGYNWKEtObjRLyN2XkxMvyFc4GmHZ1DRlLmWgQsh73JTWjVIuwdyUDm6wUNwhl-W810qSbrUMf1lDMMgw"><span
                        class="absolute top-4 left-4 bg-error-container text-on-error-container text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">Air</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-h3 text-h3 text-on-surface mb-2 line-clamp-2">Sarana Air Bersih</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-2">Setetes Air, Sejuta
                        Kehidupan.</p>
                    <div class="mt-auto"><button type="button"
                                class="comment-btn flex-1 flex items-center justify-center gap-2 border-2 border-outline-variant text-on-surface-variant font-label-sm text-label-sm px-6 py-3 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">chat_bubble</span>
                                <span>Komentar</span>
                                <span
                                    class="comment-count ml-1 bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs font-bold min-w-[24px]"
                                    data-count-for>0</span>
                            </button>
                            <a href="{{ url('/donasi') }}"
                            class="block w-full flex-1 bg-[#F59E0B] text-on-primary font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center">Donasi</a>
                    </div>
                </div>
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

    <!-- Modal Komentar Program -->
    <div id="commentModal"
        class="fixed inset-0 z-[100] items-center justify-center p-4 md:p-8 hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-0 bg-on-background/60 backdrop-blur-sm" data-close-comment></div>
        <div id="commentModalPanel"
            class="relative bg-surface rounded-2xl shadow-2xl w-full max-w-2xl max-h-[85vh] flex flex-col scale-95 transition-transform duration-300">
            <!-- Header -->
            <div class="flex items-start justify-between gap-4 p-6 border-b border-outline-variant/30">
                <div>
                    <h3 class="font-h3 text-h3 text-on-surface leading-snug" id="commentProgramTitle">Komentar Program
                    </h3>
                    <p class="font-body-md text-sm text-on-surface-variant mt-1" id="commentProgramSubtitle">Bagikan
                        dukungan Anda untuk program ini</p>
                </div>
                <button type="button"
                    class="shrink-0 w-10 h-10 rounded-full bg-surface-container-low hover:bg-surface-variant flex items-center justify-center text-on-surface-variant hover:text-on-surface transition-colors"
                    data-close-comment>
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <!-- Form -->
            <form id="commentForm" class="p-6 border-b border-outline-variant/30 flex flex-col gap-4"
                data-program="">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="commentName" class="block font-label-sm text-label-sm text-on-surface mb-2">Nama
                            <span class="text-error">*</span></label>
                        <input id="commentName" name="name" type="text" required maxlength="100"
                            placeholder="Nama Anda"
                            class="w-full rounded-lg border border-outline-variant bg-surface-container-lowest px-4 py-3 font-body-md text-body-md text-on-surface placeholder:text-outline-variant focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                    </div>
                    <div>
                        <label for="commentEmail"
                            class="block font-label-sm text-label-sm text-on-surface mb-2">Email <span
                                class="text-outline text-xs">(opsional)</span></label>
                        <input id="commentEmail" name="email" type="email" maxlength="191" placeholder="email@contoh.com"
                            class="w-full rounded-lg border border-outline-variant bg-surface-container-lowest px-4 py-3 font-body-md text-body-md text-on-surface placeholder:text-outline-variant focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                    </div>
                </div>
                <div>
                    <label for="commentContent" class="block font-label-sm text-label-sm text-on-surface mb-2">Komentar
                        <span class="text-error">*</span></label>
                    <textarea id="commentContent" name="content" rows="3" required minlength="3" maxlength="1000"
                        placeholder="Tulis komentar, doa, atau dukungan Anda..."
                        class="w-full rounded-lg border border-outline-variant bg-surface-container-lowest px-4 py-3 font-body-md text-body-md text-on-surface placeholder:text-outline-variant focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none"></textarea>
                    <div class="flex justify-between mt-2">
                        <p id="commentError" class="text-error font-body-md text-sm hidden"></p>
                        <p class="font-body-md text-xs text-outline ml-auto"><span id="commentCharCount">0</span>/1000
                        </p>
                    </div>
                </div>
                <button type="submit" id="commentSubmitBtn"
                    class="self-start bg-primary text-on-primary font-label-sm text-label-sm px-8 py-3 rounded-lg hover:opacity-90 transition-opacity shadow-sm active:scale-95 flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">send</span>
                    <span>Kirim Komentar</span>
                </button>
            </form>
            <!-- Daftar Komentar -->
            <div id="commentList" class="flex-1 overflow-y-auto p-6 flex flex-col gap-4 bg-surface-container-low/50">
                <!-- Diisi lewat JS -->
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div id="commentToast"
        class="fixed bottom-6 right-6 z-[110] bg-on-surface text-surface font-label-sm text-label-sm px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 opacity-0 translate-y-4 pointer-events-none transition-all duration-300">
        <span class="material-symbols-outlined text-primary-fixed">check_circle</span>
        <span id="commentToastText">Komentar terkirim!</span>
    </div>

    <script>
        (function() {
            'use strict';

            const CSRF = '{{ csrf_token() }}';
            const modal = document.getElementById('commentModal');
            const panel = document.getElementById('commentModalPanel');
            const list = document.getElementById('commentList');
            const form = document.getElementById('commentForm');
            const errBox = document.getElementById('commentError');
            const charCount = document.getElementById('commentCharCount');
            const submitBtn = document.getElementById('commentSubmitBtn');
            const toast = document.getElementById('commentToast');
            const toastText = document.getElementById('commentToastText');

            let currentProgram = '';
            let currentProgramTitle = '';

            // Wadah jumlah komentar per program (dari endpoint counts)
            const counts = {};

            function slugToTitle(slug) {
                return slug.replace(/-/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
            }

            function escapeHtml(str) {
                const div = document.createElement('div');
                div.textContent = str;
                return div.innerHTML;
            }

            // ---------- Badge jumlah komentar ----------
            function applyCounts() {
                document.querySelectorAll('[data-program]').forEach(function(card) {
                    const slug = card.dataset.program;
                    const badge = card.querySelector('[data-count-for]');
                    if (badge && counts[slug] !== undefined) {
                        badge.textContent = counts[slug];
                    }
                });
            }

            fetch('{{ url('/program/comments/counts') }}')
                .then(r => r.json())
                .then(data => {
                    Object.assign(counts, data.counts || {});
                    applyCounts();
                })
                .catch(() => {});

            // ---------- Modal ----------
            function openModal(card) {
                currentProgram = card.dataset.program;
                currentProgramTitle = slugToTitle(currentProgram);
                document.getElementById('commentProgramTitle').textContent = currentProgramTitle;
                form.dataset.program = currentProgram;
                errBox.classList.add('hidden');
                renderSkeleton();
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                requestAnimationFrame(() => {
                    modal.classList.remove('opacity-0');
                    panel.classList.remove('scale-95');
                });
                document.body.style.overflow = 'hidden';
                loadComments();
            }

            function closeModal() {
                modal.classList.add('opacity-0');
                panel.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.body.style.overflow = '';
                }, 250);
            }

            document.querySelectorAll('.comment-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const card = btn.closest('[data-program]');
                    if (card) openModal(card);
                });
            });

            document.querySelectorAll('[data-close-comment]').forEach(function(el) {
                el.addEventListener('click', closeModal);
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) closeModal();
            });

            // ---------- Load & render komentar ----------
            function renderSkeleton() {
                list.innerHTML = Array(3).fill(
                    '<div class="animate-pulse flex gap-3"><div class="w-10 h-10 rounded-full bg-surface-variant shrink-0"></div><div class="flex-1 space-y-2 py-1"><div class="h-3 bg-surface-variant rounded w-1/4"></div><div class="h-3 bg-surface-variant rounded w-3/4"></div></div></div>'
                ).join('');
            }

            function renderComments(data) {
                if (!data.comments.length) {
                    list.innerHTML =
                        `<div class="text-center py-10"><span class="material-symbols-outlined text-5xl text-outline">forum</span><p class="font-body-md text-body-md text-on-surface-variant mt-4">Belum ada komentar. Jadilah yang pertama memberi dukungan!</p></div>`;
                    return;
                }
                list.innerHTML = data.comments.map(c => `
                    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/40 p-4 flex gap-3">
                        <div class="w-10 h-10 rounded-full bg-primary-container text-on-primary-container font-bold flex items-center justify-center shrink-0">${escapeHtml(c.initial)}</div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-baseline justify-between gap-2">
                                <p class="font-label-sm text-label-sm text-on-surface truncate">${escapeHtml(c.name)}</p>
                                <span class="font-body-md text-xs text-outline shrink-0">${escapeHtml(c.time_ago)}</span>
                            </div>
                            <p class="font-body-md text-body-md text-on-surface-variant mt-1 break-words">${escapeHtml(c.content)}</p>
                        </div>
                    </div>`).join('');
            }

            function loadComments() {
                renderSkeleton();
                fetch(`{{ url('/program/comments') }}?program=${encodeURIComponent(currentProgram)}`)
                    .then(r => r.json())
                    .then(renderComments)
                    .catch(() => {
                        list.innerHTML =
                            '<p class="text-center font-body-md text-body-md text-error py-8">Gagal memuat komentar. Coba lagi.</p>';
                    });
            }

            // ---------- Submit ----------
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                errBox.classList.add('hidden');
                const content = document.getElementById('commentContent').value.trim();
                const name = document.getElementById('commentName').value.trim();

                if (name.length < 2) {
                    showError('Nama minimal 2 karakter.');
                    return;
                }
                if (content.length < 3) {
                    showError('Komentar minimal 3 karakter.');
                    return;
                }

                submitBtn.disabled = true;
                submitBtn.style.opacity = '0.6';

                const body = new URLSearchParams({
                    program: form.dataset.program,
                    name: name,
                    email: document.getElementById('commentEmail').value.trim(),
                    content: content,
                });

                fetch('{{ url('/program/comments') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-CSRF-TOKEN': CSRF,
                            'Accept': 'application/json',
                        },
                        body: body,
                    })
                    .then(async r => {
                        const data = await r.json();
                        if (!r.ok) throw data;
                        return data;
                    })
                    .then(data => {
                        form.reset();
                        charCount.textContent = '0';
                        showToast(data.message || 'Komentar terkirim!');
                        loadComments();
                        // Update badge
                        if (counts[form.dataset.program] !== undefined) {
                            counts[form.dataset.program]++;
                        } else {
                            counts[form.dataset.program] = 1;
                        }
                        applyCounts();
                    })
                    .catch(err => {
                        const msg = (err && err.errors) ?
                            Object.values(err.errors).flat().join(' ') :
                            (err && err.message) || 'Gagal mengirim komentar. Coba lagi.';
                        showError(msg);
                    })
                    .finally(() => {
                        submitBtn.disabled = false;
                        submitBtn.style.opacity = '';
                    });
            });

            function showError(msg) {
                errBox.textContent = msg;
                errBox.classList.remove('hidden');
            }

            // ---------- Char count ----------
            document.getElementById('commentContent').addEventListener('input', function() {
                charCount.textContent = this.value.length;
            });

            // ---------- Toast ----------
            let toastTimer;
            function showToast(msg) {
                toastText.textContent = msg;
                toast.classList.remove('opacity-0', 'translate-y-4');
                clearTimeout(toastTimer);
                toastTimer = setTimeout(() => toast.classList.add('opacity-0', 'translate-y-4'), 3500);
            }
        })();
    </script>
</body>

</html>
