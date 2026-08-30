<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Donasi - Metode Pembayaran</title>
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
                    <div class="w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center">
                        <span class="material-symbols-outlined">check</span></div>
                    <span class="ml-2 text-primary font-semibold">Data Diri</span>
                </div>
                <div class="w-16 h-1 bg-primary mx-4"></div>
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 rounded-full bg-primary text-on-primary flex items-center justify-center font-bold">
                        2</div>
                    <span class="ml-2 text-primary font-semibold">Pembayaran</span>
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
                <h1 class="font-h2 text-h2 text-on-surface mb-2 text-center">Pilih Metode Pembayaran</h1>
                <p class="text-on-surface-variant text-center mb-8">Nominal donasi: <span
                        class="font-bold text-primary">Rp {{ number_format($data['nominal'], 0, ',', '.') }}</span></p>

                <form action="{{ route('donasi.step3') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nama" value="{{ $data['nama'] }}">
                    <input type="hidden" name="email" value="{{ $data['email'] }}">
                    <input type="hidden" name="telepon" value="{{ $data['telepon'] }}">
                    <input type="hidden" name="nominal" value="{{ $data['nominal'] }}">
                    <input type="hidden" name="pesan" value="{{ $data['pesan'] ?? '' }}">

                    <div class="space-y-4" id="paymentOptions">
                        <label
                            class="flex items-center p-4 border border-outline-variant rounded-xl cursor-pointer hover:border-primary hover:bg-surface-container-low transition-all">
                            <input type="radio" name="metode" value="Mandiri" data-account="1300-0-1516-7078"
                                required class="w-5 h-5 text-primary">
                            <div class="ml-4 flex items-center gap-6">
                                <img src="{{ asset('img/donasi/mandiri.png') }}" alt="Mandiri" class="h-12">
                                <div>
                                    <p class="font-semibold text-on-surface">Bank Mandiri</p>
                                    <p class="text-sm text-on-surface-variant">1300-0-1516-7078</p>
                                    <p class="text-sm text-on-surface-variant">A.n Yayasan Sarana Berbagi</p>
                                </div>
                            </div>
                        </label>

                        <label
                            class="flex items-center p-4 border border-outline-variant rounded-xl cursor-pointer hover:border-primary hover:bg-surface-container-low transition-all">
                            <input type="radio" name="metode" value="BRI" data-account="3682-01-012168-53-2"
                                class="w-5 h-5 text-primary">
                            <div class="ml-4 flex items-center gap-6">
                                <img src="{{ asset('img/donasi/bri.png') }}" alt="BRI" class="h-12">
                                <div>
                                    <p class="font-semibold text-on-surface">Bank BRI</p>
                                    <p class="text-sm text-on-surface-variant">3682-01-012168-53-2</p>
                                    <p class="text-sm text-on-surface-variant">A.n Yayasan Sarana Berbagi</p>
                                </div>
                            </div>
                        </label>

                        <label
                            class="flex items-center p-4 border border-outline-variant rounded-xl cursor-pointer hover:border-primary hover:bg-surface-container-low transition-all">
                            <input type="radio" name="metode" value="BNI" data-account="0464-2477-68"
                                class="w-5 h-5 text-primary">
                            <div class="ml-4 flex items-center gap-6">
                                <img src="{{ asset('img/donasi/bni.jpg') }}" alt="BNI" class="h-12">
                                <div>
                                    <p class="font-semibold text-on-surface">Bank BNI</p>
                                    <p class="text-sm text-on-surface-variant">0464-2477-68</p>
                                    <p class="text-sm text-on-surface-variant">A.n Yayasan Sarana Berbagi</p>
                                </div>
                            </div>
                        </label>

                        <label
                            class="flex items-center p-4 border border-outline-variant rounded-xl cursor-pointer hover:border-primary hover:bg-surface-container-low transition-all">
                            <input type="radio" name="metode" value="BSI" data-account="626288884"
                                class="w-5 h-5 text-primary">
                            <div class="ml-4 flex items-center gap-6">
                                <img src="{{ asset('img/donasi/bsi.png') }}" alt="BSI" class="h-12">
                                <div>
                                    <p class="font-semibold text-on-surface">Bank Syariah Indonesia (BSI)</p>
                                    <p class="text-sm text-on-surface-variant">626288884</p>
                                    <p class="text-sm text-on-surface-variant">A.n Yayasan Sarana Berbagi</p>
                                </div>
                            </div>
                        </label>

                        <label
                            class="flex items-center p-4 border border-outline-variant rounded-xl cursor-pointer hover:border-primary hover:bg-surface-container-low transition-all">
                            <input type="radio" name="metode" value="Muamalat" data-account="1010105151"
                                class="w-5 h-5 text-primary">
                            <div class="ml-4 flex items-center gap-6">
                                <img src="{{ asset('img/donasi/muamalat.png') }}" alt="Muamalat" class="h-12">
                                <div>
                                    <p class="font-semibold text-on-surface">Bank Muamalat</p>
                                    <p class="text-sm text-on-surface-variant">1010105151</p>
                                    <p class="text-sm text-on-surface-variant">A.n Yayasan Sarana Berbagi</p>
                                </div>
                            </div>
                        </label>

                        <label
                            class="flex items-center p-4 border border-outline-variant rounded-xl cursor-pointer hover:border-primary hover:bg-surface-container-low transition-all">
                            <input type="radio" name="metode" value="QRIS" data-account=""
                                class="w-5 h-5 text-primary">
                            <div class="ml-4 flex items-center gap-6">
                                <img src="{{ asset('img/donasi/QR-CODE.png') }}" alt="QRIS"
                                    class="h-28 cursor-pointer qris-thumb"
                                    data-src="{{ asset('img/donasi/QR-CODE.png') }}">
                                <div>
                                    <p class="font-semibold text-on-surface">QRIS</p>
                                    <p class="text-sm text-on-surface-variant">Scan QR untuk membayar melalui aplikasi
                                        dompet digital</p>
                                    <p class="text-sm text-on-surface-variant">A.n Yayasan Sarana Berbagi</p>
                                </div>
                            </div>
                        </label>
                    </div>

                    <div id="paymentInstructions" class="mt-6 p-4 bg-surface-container-low rounded-lg hidden"></div>

                    <div class="flex gap-4 mt-8">
                        <a href="{{ url('/donasi') }}"
                            class="flex-1 bg-outline-variant text-on-surface font-label-sm text-label-sm px-8 py-4 rounded-xl text-center hover:bg-surface-variant transition-colors">
                            Kembali
                        </a>
                        <button id="payWithQrisBtn" type="button"
                            class="hidden flex-1 bg-green-600 hover:bg-green-700 text-white font-label-sm text-label-sm px-8 py-4 rounded-xl transition-colors shadow-md active:scale-95">
                            Bayar dengan QRIS
                        </button>
                        <button id="submitBtn" type="submit"
                            class="flex-1 bg-[#F59E0B] hover:bg-[#D97706] text-white font-label-sm text-label-sm px-8 py-4 rounded-xl transition-colors shadow-md active:scale-95">
                            Lanjut Konfirmasi
                        </button>
                    </div>
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

<!-- QRIS Modal -->
<div id="qrisModal" class="hidden fixed inset-0 z-50 items-center justify-center bg-black/60 px-4">
    <div class="max-w-3xl w-full">
        <div class="bg-white rounded-xl overflow-hidden shadow-lg">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="font-semibold">QRIS</h3>
                <div class="flex items-center gap-2">
                    <a id="qrisDownload" href="{{ asset('img/donasi/QR-CODE.png') }}" download
                        class="bg-primary text-white px-3 py-1 rounded">Download</a>
                    <button id="qrisModalClose" class="text-slate-600 hover:text-slate-900">Tutup</button>
                </div>
            </div>
            <div class="p-4 bg-white">
                <div class="flex justify-center mb-4">
                    <img id="qrisModalImg" src="{{ asset('img/donasi/QR-CODE.png') }}" alt="QRIS"
                        class="max-h-[60vh] w-auto object-contain">
                </div>
                <div class="text-center">
                    <p class="font-semibold mb-2">Instruksi singkat</p>
                    <p class="text-sm text-on-surface-variant mb-4">1) Buka aplikasi dompet digital di ponsel. 2) Pilih
                        fitur "Scan QR". 3) Arahkan kamera ke kode QR. 4) Masukkan nominal yang sama dengan yang tertera
                        di halaman ini dan konfirmasi pembayaran.</p>
                    <p class="text-sm text-on-surface-variant mb-4">Jika sudah membayar, klik tombol "Saya Sudah Bayar"
                        untuk melanjutkan ke halaman konfirmasi.</p>
                    <div class="flex items-center justify-center gap-4">
                        <button id="confirmPaidBtn" class="bg-[#F59E0B] text-white px-4 py-2 rounded">Saya Sudah
                            Bayar</button>
                        <a id="qrisDownload2" href="{{ asset('img/donasi/QR-CODE.png') }}" download
                            class="bg-primary text-white px-4 py-2 rounded">Unduh QR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        const modal = document.getElementById('qrisModal');
        const modalImg = document.getElementById('qrisModalImg');
        const download = document.getElementById('qrisDownload');
        const closeBtn = document.getElementById('qrisModalClose');
        document.querySelectorAll('.qris-thumb').forEach(function(img) {
            img.addEventListener('click', function(e) {
                const src = img.getAttribute('data-src') || img.src;
                modalImg.src = src;
                download.href = src;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });
        const payWithQrisBtn = document.getElementById('payWithQrisBtn');
        const submitBtn = document.getElementById('submitBtn');
        const form = document.querySelector('form');
        const paymentInstructions = document.getElementById('paymentInstructions');

        // Show/hide instructions and buttons based on selected metode
        function updateUIForMethod() {
            const selected = document.querySelector('input[name="metode"]:checked');
            if (!selected) {
                paymentInstructions.classList.add('hidden');
                payWithQrisBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
                return;
            }
            const metode = selected.value;
            // QRIS: show pay button, hide submit
            if (metode === 'QRIS') {
                payWithQrisBtn.classList.remove('hidden');
                submitBtn.classList.add('hidden');
                paymentInstructions.classList.remove('hidden');
                paymentInstructions.innerHTML =
                    '<p class="font-semibold text-center mb-2">Bayar lewat QRIS</p><p class="text-sm text-on-surface-variant mb-2">Klik tombol "Bayar dengan QRIS" untuk melihat kode QR. Setelah melakukan pembayaran di aplikasi dompet digital, kembali dan klik "Saya Sudah Bayar".</p>';
            } else {
                // Bank transfer: show step-by-step instructions
                payWithQrisBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
                const account = selected.getAttribute('data-account') || '';
                const bankName = selected.parentElement.querySelector('p.font-semibold').innerText;
                paymentInstructions.classList.remove('hidden');
                paymentInstructions.innerHTML = `
                    <p class="font-semibold text-center mb-2">Instruksi transfer - ${bankName}</p>
                    <ol class="list-decimal list-inside text-sm text-on-surface-variant space-y-2">
                        <li>Buka aplikasi mobile banking atau m-banking/ATM.</li>
                        <li>Pilih menu "Transfer" lalu pilih "Ke Rekening Bank Lain" (atau menu serupa).</li>
                        <li>Masukkan nama bank: <strong>${bankName}</strong>.</li>
                        <li>Masukkan nomor rekening: <strong id=\"accNumber\">${account}</strong>. Tekan tombol salin untuk menyalin nomor.</li>
                        <li>Masukkan jumlah: <strong>Rp ${Number({{ $data['nominal'] }}) .toLocaleString('id-ID')}</strong> (sama seperti nominal donasi di halaman ini).</li>
                        <li>Periksa kembali data, lalu konfirmasi transaksi.</li>
                        <li>Setelah transfer berhasil, klik "Lanjut Konfirmasi" untuk mengirim bukti dan data.</li>
                    </ol>
                    <div class=\"mt-4 text-center\"> <button id=\"copyAccBtn\" class=\"bg-primary text-white px-4 py-2 rounded\">Salin Nomor Rekening</button> </div>
                `;
                // attach copy handler after injecting
                setTimeout(() => {
                    const copyBtn = document.getElementById('copyAccBtn');
                    if (copyBtn) {
                        copyBtn.addEventListener('click', function() {
                            const acc = document.getElementById('accNumber').innerText.trim();
                            navigator.clipboard.writeText(acc).then(() => {
                                alert('Nomor rekening disalin: ' + acc);
                            }).catch(() => {
                                alert('Gagal menyalin, silakan salin manual.');
                            });
                        });
                    }
                }, 100);
            }
        }

        // initial bind
        document.querySelectorAll('input[name="metode"]').forEach(function(r) {
            r.addEventListener('change', updateUIForMethod);
        });
        updateUIForMethod();

        // Pay with QRIS button opens modal (reuse existing modal logic)
        payWithQrisBtn.addEventListener('click', function() {
            // trigger the same modal as clicking the image
            const img = document.querySelector('.qris-thumb');
            if (img) {
                img.click();
            }
        });

        // Confirm paid button -> submit the form (add hidden flag)
        const confirmPaidBtn = document.getElementById('confirmPaidBtn');
        if (confirmPaidBtn) {
            confirmPaidBtn.addEventListener('click', function() {
                // mark as sudah bayar
                let inp = document.querySelector('input[name="qris_paid"]');
                if (!inp) {
                    inp = document.createElement('input');
                    inp.type = 'hidden';
                    inp.name = 'qris_paid';
                    inp.value = '1';
                    form.appendChild(inp);
                }
                form.submit();
            });
        }

        function hideModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
        closeBtn.addEventListener('click', hideModal);
        modal.addEventListener('click', function(e) {
            if (e.target === modal) hideModal();
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') hideModal();
        });
    })();
</script>
