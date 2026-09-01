@extends('layouts.app')

@section('title', 'Terima Kasih - Konfirmasi Donasi #' . $donation->invoice_number)

@push('styles')
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.5);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
    .animate-scaleIn { animation: scaleIn 0.6s ease-out forwards; }
    .animate-pulse-slow { animation: pulse 2s ease-in-out infinite; }
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
</style>
@endpush

@section('content')
    <div class="pt-6 pb-section-padding relative overflow-hidden">
        <div class="max-w-2xl mx-auto px-margin-mobile md:px-margin-desktop text-center relative z-10">
            <div class="bg-surface-container-lowest rounded-3xl p-8 md:p-12 shadow-xl border border-outline-variant/20">
                <!-- Success Icon -->
                <div class="animate-scaleIn mx-auto w-20 h-20 bg-primary-container rounded-full flex items-center justify-center mb-6 animate-pulse-slow">
                    <span class="material-symbols-outlined text-primary text-5xl">volunteer_activism</span>
                </div>

                <!-- Thank You Message -->
                <h1 class="font-h2 text-h2 text-on-surface mb-2 animate-fadeInUp">
                    Terima Kasih, <span class="text-primary">{{ $donation->is_anonymous ? 'Hamba Allah' : $donation->donor_name }}!</span>
                </h1>
                <p class="text-on-surface-variant text-sm mb-8 animate-fadeInUp delay-100 max-w-lg mx-auto">
                    Inisiasi donasi Anda telah tercatat dengan nomor invoice 
                    <strong class="font-mono text-primary bg-primary/10 px-2 py-0.5 rounded">{{ $donation->invoice_number }}</strong>.
                    Silakan lakukan transfer sesuai rincian di bawah ini.
                </p>

                <!-- Payment Instruction Box -->
                <div class="bg-primary/5 rounded-3xl p-6 md:p-8 mb-8 text-left border-2 border-primary/20 animate-fadeInUp delay-200">
                    <div class="flex items-center justify-between pb-4 border-b border-primary/15">
                        <span class="text-xs uppercase tracking-wider font-bold text-primary">Metode Pembayaran</span>
                        <span class="font-bold text-on-surface text-sm">{{ $paymentMethod->name }}</span>
                    </div>

                    @if ($paymentMethod->account_number)
                        <div class="py-4 border-b border-primary/15">
                            <p class="text-xs text-on-surface-variant mb-1">Nomor Rekening / Pembayaran:</p>
                            <div class="flex items-center justify-between gap-3 bg-surface-container-lowest p-3.5 rounded-2xl border border-primary/20">
                                <span class="font-mono font-extrabold text-lg sm:text-xl text-primary" id="accNumber">
                                    {{ $paymentMethod->account_number }}
                                </span>
                                <button type="button"
                                    onclick="navigator.clipboard.writeText('{{ $paymentMethod->account_number }}'); alert('Nomor rekening berhasil disalin!');"
                                    class="bg-primary hover:bg-primary/90 text-white text-xs font-semibold px-3 py-1.5 rounded-xl transition-all active:scale-95 flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm">content_copy</span>
                                    <span>Salin</span>
                                </button>
                            </div>
                            @if ($paymentMethod->account_name)
                                <p class="text-xs text-on-surface-variant mt-1.5">Atas Nama: <strong>{{ $paymentMethod->account_name }}</strong></p>
                            @endif
                        </div>
                    @endif

                    <div class="pt-4 flex items-baseline justify-between">
                        <div>
                            <p class="text-xs text-on-surface-variant">Jumlah yang harus ditransfer:</p>
                            <p class="font-h2 text-2xl md:text-3xl font-extrabold text-primary mt-0.5">
                                Rp {{ number_format($donation->amount, 0, ',', '.') }}
                            </p>
                        </div>
                        <span class="bg-amber-100 text-amber-800 text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            Menunggu Transfer
                        </span>
                    </div>
                </div>

                <!-- Donation Details Summary -->
                <div class="bg-surface-container-low rounded-2xl p-6 mb-8 text-left border border-outline-variant/30 text-sm space-y-3">
                    <div class="flex justify-between">
                        <span class="text-on-surface-variant">Program</span>
                        <span class="font-semibold text-on-surface text-right">{{ $campaign ? $campaign->title : 'Donasi Umum' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-on-surface-variant">Nama Donatur</span>
                        <span class="font-semibold text-on-surface">{{ $donation->is_anonymous ? 'Hamba Allah (' . $donation->donor_name . ')' : $donation->donor_name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-on-surface-variant">Email</span>
                        <span class="font-semibold text-on-surface">{{ $donation->donor_email }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-on-surface-variant">Status di Sistem</span>
                        <span class="font-bold text-amber-600 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">schedule</span> Pending Verifikasi
                        </span>
                    </div>
                </div>

                <!-- WhatsApp Confirmation Button -->
                @php
                    $waPhone = '6281234567890'; // Contact admin phone
                    $waAmount = number_format($donation->amount, 0, ',', '.');
                    $waCampaign = $campaign?->title ?? 'Donasi Umum';
                    $waText = urlencode("Assalamualaikum Admin Sarana Berbagi, saya sudah melakukan donasi dengan rincian:\n\nInvoice: {$donation->invoice_number}\nNama: {$donation->donor_name}\nNominal: Rp {$waAmount}\nProgram: {$waCampaign}\n\nMohon untuk diverifikasi. Terima kasih!");
                @endphp

                <div class="space-y-3">
                    <a href="https://wa.me/{{ $waPhone }}?text={{ $waText }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-label-sm text-sm py-4 rounded-xl transition-all shadow-md active:scale-95 font-bold flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-lg">chat</span>
                        <span>Konfirmasi Bukti Transfer via WhatsApp</span>
                    </a>

                    <div class="flex gap-3">
                        <a href="{{ url('/') }}"
                            class="flex-1 bg-surface-container text-on-surface font-label-sm text-xs py-3.5 rounded-xl hover:bg-surface-container-high transition-colors font-semibold">
                            Kembali ke Beranda
                        </a>
                        <a href="{{ url('/program') }}"
                            class="flex-1 bg-primary/10 text-primary font-label-sm text-xs py-3.5 rounded-xl hover:bg-primary/20 transition-colors font-bold">
                            Lihat Program Lain
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
