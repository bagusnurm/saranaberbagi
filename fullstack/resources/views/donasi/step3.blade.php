@extends('layouts.app')

@section('title', 'Donasi - Langkah 3: Konfirmasi Donasi')

@section('content')
    <div class="pt-6 pb-section-padding">
        <div class="max-w-2xl mx-auto px-margin-mobile md:px-margin-desktop">
            {{-- Progress Steps Component --}}
            @include('donasi.components.progress-steps', ['step' => 3])

            <div class="bg-surface-container-lowest rounded-3xl p-8 md:p-10 shadow-lg border border-outline-variant/20">
                <h1 class="font-h2 text-h2 text-on-surface mb-2 text-center">Konfirmasi Donasi</h1>
                <p class="text-on-surface-variant text-center mb-8 text-sm">
                    Pastikan rincian data donasi Anda sudah benar sebelum melanjutkan
                </p>

                <div class="bg-surface-container-low rounded-2xl p-6 md:p-8 mb-8 border border-outline-variant/30 space-y-4">
                    {{-- Program --}}
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center py-2 border-b border-outline-variant/20 gap-1">
                        <span class="text-xs text-on-surface-variant uppercase tracking-wider font-semibold">Program Donasi</span>
                        <span class="font-bold text-on-surface text-sm sm:text-right">{{ $campaign ? $campaign->title : 'Donasi Umum' }}</span>
                    </div>

                    {{-- Nama Donatur --}}
                    <div class="flex justify-between items-center py-2 border-b border-outline-variant/20">
                        <span class="text-xs text-on-surface-variant uppercase tracking-wider font-semibold">Nama Donatur</span>
                        <div class="text-right">
                            <span class="font-semibold text-on-surface text-sm">{{ $data['nama'] }}</span>
                            @if (!empty($data['is_anonymous']))
                                <span class="block text-[11px] text-primary font-bold">(Tampil sebagai Hamba Allah)</span>
                            @endif
                        </div>
                    </div>

                    {{-- Email & Telepon --}}
                    <div class="flex justify-between items-center py-2 border-b border-outline-variant/20">
                        <span class="text-xs text-on-surface-variant uppercase tracking-wider font-semibold">Email</span>
                        <span class="font-semibold text-on-surface text-sm">{{ $data['email'] }}</span>
                    </div>

                    <div class="flex justify-between items-center py-2 border-b border-outline-variant/20">
                        <span class="text-xs text-on-surface-variant uppercase tracking-wider font-semibold">No. Telepon / WA</span>
                        <span class="font-semibold text-on-surface text-sm">{{ $data['telepon'] }}</span>
                    </div>

                    {{-- Metode Pembayaran --}}
                    <div class="flex justify-between items-center py-2 border-b border-outline-variant/20">
                        <span class="text-xs text-on-surface-variant uppercase tracking-wider font-semibold">Metode Pembayaran</span>
                        <span class="font-semibold text-on-surface text-sm">{{ $paymentMethod->name }}</span>
                    </div>

                    {{-- Pesan / Doa --}}
                    @if (!empty($data['pesan']))
                        <div class="py-2 border-b border-outline-variant/20">
                            <span class="text-xs text-on-surface-variant uppercase tracking-wider font-semibold block mb-1">Doa / Pesan</span>
                            <p class="text-sm text-on-surface italic bg-surface-container-lowest p-3 rounded-xl border border-outline-variant/30">
                                "{{ $data['pesan'] }}"
                            </p>
                        </div>
                    @endif

                    {{-- Nominal Total --}}
                    <div class="pt-4 flex justify-between items-center">
                        <span class="text-sm text-on-surface font-bold">Total Donasi</span>
                        <span class="font-h2 text-2xl font-extrabold text-primary">
                            Rp {{ number_format($data['nominal'], 0, ',', '.') }}
                        </span>
                    </div>
                </div>

                <form action="{{ route('donasi.konfirmasi') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nama" value="{{ $data['nama'] }}">
                    <input type="hidden" name="email" value="{{ $data['email'] }}">
                    <input type="hidden" name="telepon" value="{{ $data['telepon'] }}">
                    <input type="hidden" name="nominal" value="{{ $data['nominal'] }}">
                    <input type="hidden" name="pesan" value="{{ $data['pesan'] ?? '' }}">
                    <input type="hidden" name="campaign_id" value="{{ $data['campaign_id'] ?? '' }}">
                    <input type="hidden" name="payment_method_id" value="{{ $paymentMethod->id }}">
                    <input type="hidden" name="is_anonymous" value="{{ !empty($data['is_anonymous']) ? '1' : '0' }}">

                    <div class="flex gap-4">
                        <a href="javascript:history.back()"
                            class="flex-1 bg-surface-container text-on-surface font-label-sm text-sm px-6 py-4 rounded-xl text-center hover:bg-surface-container-high transition-colors font-semibold">
                            Kembali
                        </a>
                        <button type="submit"
                            class="flex-1 bg-accent hover:bg-accent-hover text-on-accent font-label-sm text-sm px-6 py-4 rounded-xl transition-all shadow-md active:scale-95 font-bold flex items-center justify-center gap-2">
                            <span>Selesaikan Donasi</span>
                            <span class="material-symbols-outlined text-base">check_circle</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
