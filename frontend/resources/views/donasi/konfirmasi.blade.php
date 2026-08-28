<!DOCTYPE html>
<html class="light" lang="id">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Terima Kasih - Sarana Berbagi</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;family=Plus+Jakarta+Sans:wght@600;700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          "colors": {
            "on-surface": "#131b2e", "secondary": "#216963", "surface-variant": "#dae2fd",
            "tertiary": "#734700", "surface-dim": "#d2d9f4", "surface-container-low": "#f2f3ff",
            "outline": "#6e7977", "secondary-fixed": "#abefe8", "surface-container": "#eaedff",
            "primary-container": "#0f766e", "on-primary-fixed": "#00201d", "surface": "#faf8ff",
            "error-container": "#ffdad6", "tertiary-container": "#945d00", "secondary-fixed-dim": "#8fd3cc",
            "inverse-primary": "#80d5cb", "on-error": "#ffffff", "on-secondary-fixed": "#00201e",
            "error": "#ba1a1a", "tertiary-fixed-dim": "#ffb95f", "surface-container-lowest": "#ffffff",
            "outline-variant": "#bdc9c6", "primary-fixed-dim": "#80d5cb", "surface-tint": "#006a63",
            "background": "#faf8ff", "on-background": "#131b2e", "on-surface-variant": "#3e4947",
            "on-secondary": "#ffffff", "surface-container-highest": "#dae2fd", "surface-container-high": "#e2e7ff",
            "on-primary": "#ffffff", "primary": "#005c55", "surface-bright": "#faf8ff",
            "secondary-container": "#a8ece5", "on-tertiary": "#ffffff", "on-primary-container": "#a3faef",
            "on-error-container": "#93000a", "inverse-on-surface": "#eef0ff", "inverse-surface": "#283044",
            "tertiary-fixed": "#ffddb8", "primary-fixed": "#9cf2e8"
          },
          "borderRadius": { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
          "spacing": {
            "margin-desktop": "48px", "stack-sm": "8px", "container-max": "1280px",
            "stack-md": "16px", "stack-lg": "32px", "section-padding": "80px",
            "margin-mobile": "20px", "gutter": "24px"
          },
          "fontFamily": {
            "h2": ["Plus Jakarta Sans"], "body-md": ["Inter"], "label-sm": ["Inter"],
            "h3": ["Plus Jakarta Sans"], "h1": ["Plus Jakarta Sans"], "body-lg": ["Inter"],
            "h1-mobile": ["Plus Jakarta Sans"]
          },
          "fontSize": {
            "h2": ["32px", {"lineHeight": "1.3", "fontWeight": "700"}],
            "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
            "label-sm": ["14px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600"}],
            "h3": ["24px", {"lineHeight": "1.4", "fontWeight": "600"}],
            "h1": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
            "body-lg": ["18px", {"lineHeight": "1.8", "fontWeight": "400"}],
            "h1-mobile": ["32px", {"lineHeight": "1.2", "fontWeight": "700"}]
          }
        }
      }
    }
</script>
<style>
    body { font-family: 'Inter', sans-serif; }
    h1, h2, h3, .brand-font { font-family: 'Plus Jakarta Sans', sans-serif; }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes scaleIn {
        from { opacity: 0; transform: scale(0.5); }
        to { opacity: 1; transform: scale(1); }
    }
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    @keyframes confetti {
        0% { transform: translateY(0) rotate(0deg); opacity: 1; }
        100% { transform: translateY(-100px) rotate(720deg); opacity: 0; }
    }
    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
    .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
    .animate-scaleIn { animation: scaleIn 0.6s ease-out forwards; }
    .animate-pulse-slow { animation: pulse 2s ease-in-out infinite; }
    .animate-float { animation: float 3s ease-in-out infinite; }
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    .delay-500 { animation-delay: 0.5s; }

    .confetti-piece {
        position: absolute;
        width: 10px;
        height: 10px;
        animation: confetti 3s ease-out forwards;
    }

    .shimmer-bg {
        background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.4) 50%, transparent 100%);
        background-size: 200% 100%;
        animation: shimmer 2s infinite;
    }

    .share-btn {
        transition: all 0.3s ease;
    }
    .share-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
</style>
</head>
<body class="bg-background text-on-background antialiased min-h-screen flex flex-col">
<nav class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-md border-b border-outline-variant/30 shadow-sm">
    <div class="max-w-container-max mx-auto px-margin-desktop flex justify-between items-center h-20">
        <div class="flex items-center gap-4">
            <a class="flex items-center" href="{{ url('/') }}"><img alt="Sarana Berbagi Logo" class="h-28 w-auto object-contain" src="{{ asset('img/PROPERTY (2).png') }}"></a>
        </div>
        <div class="hidden md:flex items-center gap-8">
            <a class="text-on-surface-variant hover:text-primary transition-colors rounded-lg px-3 py-2 font-body-md text-body-md" href="{{ url('/') }}">Tentang Kami</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors rounded-lg px-3 py-2 font-body-md text-body-md" href="{{ url('/program') }}">Program</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors rounded-lg px-3 py-2 font-body-md text-body-md" href="{{ url('/kabar') }}">Kabar</a>
        </div>
        <div class="flex items-center gap-4">
            <a class="bg-[#F59E0B] text-white font-label-sm text-label-sm px-6 py-3 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm" href="{{ url('/donasi') }}">Donasi</a>
        </div>
    </div>
</nav>

<main class="flex-grow pt-32 pb-section-padding relative overflow-hidden">
    <!-- Confetti Animation -->
    <div class="absolute inset-0 pointer-events-none" id="confetti-container"></div>

    <div class="max-w-2xl mx-auto px-margin-mobile md:px-margin-desktop text-center relative z-10">
        <div class="bg-surface-container-lowest rounded-2xl p-8 md:p-12 shadow-lg border border-outline-variant/20">
            <!-- Success Icon with Animation -->
            <div class="animate-scaleIn mx-auto w-24 h-24 bg-primary-container rounded-full flex items-center justify-center mb-6 animate-pulse-slow">
                <span class="material-symbols-outlined text-primary text-6xl">volunteer_activism</span>
            </div>

            <!-- Thank You Message -->
            <h1 class="font-h1 text-h1-mobile md:text-h1 text-on-surface mb-4 animate-fadeInUp">
                Terima Kasih, <span class="text-primary">Orang Baik!</span>
            </h1>
            <p class="text-on-surface-variant mb-6 animate-fadeInUp delay-100">
                Email konfirmasi telah dikirim ke <span class="text-primary font-semibold">{{ $data['email'] }}</span>. Tim kami akan segera menghubungi Anda untuk konfirmasi pembayaran.
            </p>

            <!-- Donation Details Card -->
            <div class="bg-surface-container-low rounded-xl p-6 mb-8 text-left animate-fadeInUp delay-200">
                <h3 class="font-h3 text-h3 text-on-surface mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">receipt_long</span>
                    Detail Donasi
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-on-surface-variant">Nama</span>
                        <span class="font-semibold text-on-surface">{{ $data['nama'] }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-on-surface-variant">Email</span>
                        <span class="font-semibold text-on-surface">{{ $data['email'] }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-on-surface-variant">Metode Pembayaran</span>
                        <span class="font-semibold text-on-surface">{{ $data['metode'] }}</span>
                    </div>
                    <div class="flex justify-between pt-3 border-t border-outline-variant/30">
                        <span class="text-on-surface-variant">Nominal</span>
                        <span class="font-h3 text-h3 text-primary">Rp {{ number_format($data['nominal'], 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- Share Section - Ajak Teman -->
            <div class="bg-gradient-to-r from-primary-container/30 to-secondary-container/30 rounded-xl p-6 mb-8 animate-fadeInUp delay-300">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <span class="material-symbols-outlined text-primary text-3xl animate-float">favorite</span>
                    <h3 class="font-h3 text-h3 text-on-surface">Ajak Temanmu Berdonasi</h3>
                    <span class="material-symbols-outlined text-primary text-3xl animate-float" style="animation-delay: 0.5s;">favorite</span>
                </div>
                <p class="text-on-surface-variant mb-6">
                    Setiap kebaikan yang Anda sebarkan akan menjadi <span class="text-primary font-semibold">pahala jariyah</span> yang mengalir tanpa henti. Ajak teman dan keluarga untuk ikut berkontribusi!
                </p>

                <!-- Share Buttons -->
                <div class="flex flex-wrap justify-center gap-3">
                    <a href="https://wa.me/?text=Halo! Aku baru saja berdonasi di Sarana Berbagi. Yuk ikut berdonasi untuk pahala jariyah! {{ url('/donasi') }}" target="_blank" class="share-btn inline-flex items-center gap-2 bg-[#25D366] text-white px-5 py-3 rounded-xl font-semibold text-sm">
                        <span class="material-symbols-outlined">chat</span>
                        WhatsApp
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/donasi') }}&quote=Yuk berdonasi di Sarana Berbagi untuk pahala jariyah!" target="_blank" class="share-btn inline-flex items-center gap-2 bg-[#1877F2] text-white px-5 py-3 rounded-xl font-semibold text-sm">
                        <span class="material-symbols-outlined">share</span>
                        Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?text=Yuk berdonasi di Sarana Berbagi untuk pahala jariyah! {{ url('/donasi') }}" target="_blank" class="share-btn inline-flex items-center gap-2 bg-[#1DA1F2] text-white px-5 py-3 rounded-xl font-semibold text-sm">
                        <span class="material-symbols-outlined">alternate_email</span>
                        Twitter
                    </a>
                    <button onclick="copyLink()" class="share-btn inline-flex items-center gap-2 bg-surface-container-high text-on-surface px-5 py-3 rounded-xl font-semibold text-sm border border-outline-variant">
                        <span class="material-symbols-outlined">link</span>
                        <span id="copy-text">Salin Link</span>
                    </button>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 animate-fadeInUp delay-400">
                <a href="{{ url('/') }}" class="flex-1 bg-[#F59E0B] hover:bg-[#D97706] text-white font-label-sm text-label-sm px-8 py-4 rounded-xl transition-colors shadow-md active:scale-95 text-center">
                    Kembali ke Beranda
                </a>
                <a href="{{ url('/donasi') }}" class="flex-1 bg-primary hover:bg-on-primary-fixed-variant text-on-primary font-label-sm text-label-sm px-8 py-4 rounded-xl transition-colors shadow-md active:scale-95 text-center">
                    Donasi Lagi
                </a>
            </div>
        </div>
    </div>
</main>

<footer class="bg-primary text-white w-full mt-auto">
    <div class="h-6 w-full opacity-20" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, #ffffff 10px, #ffffff 20px);"></div>
    <div class="px-margin-desktop py-12 max-w-container-max mx-auto text-center">
        <p class="font-bold text-sm tracking-wider uppercase">SK KEMENKUMHAM ; AHU-0000643.AH.01.05. Tahun 2016</p>
        <p class="font-bold text-sm tracking-wider uppercase mt-2">SK DINAS SOSIAL ; 400.3.6.6 / 5212 / Daysos</p>
        <p class="mt-4 text-white/80 text-sm">&copy; 2026 Yayasan Sarana Berbagi</p>
    </div>
</footer>

<script>
// Confetti Animation
function createConfetti() {
    const container = document.getElementById('confetti-container');
    const colors = ['#005c55', '#F59E0B', '#216963', '#ffb95f', '#a8ece5', '#ffdad6'];

    for (let i = 0; i < 50; i++) {
        const confetti = document.createElement('div');
        confetti.className = 'confetti-piece';
        confetti.style.left = Math.random() * 100 + '%';
        confetti.style.top = Math.random() * 100 + '%';
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
        confetti.style.animationDelay = Math.random() * 2 + 's';
        confetti.style.animationDuration = (Math.random() * 2 + 2) + 's';
        container.appendChild(confetti);
    }
}

function copyLink() {
    const url = '{{ url("/donasi") }}';
    navigator.clipboard.writeText(url).then(() => {
        const btn = document.getElementById('copy-text');
        btn.textContent = 'Tersalin!';
        setTimeout(() => { btn.textContent = 'Salin Link'; }, 2000);
    });
}

document.addEventListener('DOMContentLoaded', createConfetti);
</script>
</body>
</html>
