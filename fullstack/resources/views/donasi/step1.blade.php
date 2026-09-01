@extends('layouts.app')

@section('title', 'Donasi - Langkah 1: Data Diri & Program')

@section('content')
    <div class="pt-6 pb-section-padding">
        <div class="max-w-2xl mx-auto px-margin-mobile md:px-margin-desktop">
            {{-- Progress Steps Component --}}
            @include('donasi.components.progress-steps', ['step' => 1])

            <div class="bg-surface-container-lowest rounded-3xl p-8 md:p-10 shadow-lg border border-outline-variant/20">
                <h1 class="font-h2 text-h2 text-on-surface mb-2 text-center">Data Donasi</h1>
                <p class="text-on-surface-variant text-center mb-8 text-sm">
                    Silakan pilih program dan isi data diri Anda untuk melanjutkan kebaikan
                </p>

                <form action="{{ route('donasi.step2') }}" method="POST">
                    @csrf
                    <div class="space-y-6">
                        {{-- Pilih Program Donasi --}}
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">
                                Program Kebaikan
                            </label>
                            <select name="campaign_id"
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                                <option value="">Donasi Umum / Bebas Alokasi</option>
                                @foreach ($campaigns as $camp)
                                    <option value="{{ $camp->id }}" {{ (old('campaign_id', $selectedCampaign?->id) == $camp->id) ? 'selected' : '' }}>
                                        {{ $camp->title }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($selectedCampaign)
                                <p class="text-xs text-primary font-medium mt-1.5 flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm">check_circle</span>
                                    Program terpilih: <strong>{{ $selectedCampaign->title }}</strong>
                                </p>
                            @endif
                        </div>

                        {{-- Nominal Donasi --}}
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">
                                Nominal Donasi (Rp) *
                            </label>

                            {{-- Nominal Quick Buttons --}}
                            <div class="grid grid-cols-3 sm:grid-cols-4 gap-2 mb-3">
                                @foreach ([25000, 50000, 100000, 250000, 500000, 1000000] as $amount)
                                    <button type="button"
                                        onclick="document.getElementById('nominalInput').value = {{ $amount }}"
                                        class="py-2 px-3 border border-outline-variant/60 rounded-xl text-xs font-semibold text-on-surface hover:border-primary hover:bg-primary/5 hover:text-primary transition-all active:scale-95 text-center">
                                        Rp {{ number_format($amount, 0, ',', '.') }}
                                    </button>
                                @endforeach
                            </div>

                            <input type="number" id="nominalInput" name="nominal" required min="10000"
                                value="{{ old('nominal', $presetNominal ?? '') }}"
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all font-bold text-lg"
                                placeholder="Masukkan nominal (Min. Rp 10.000)">
                            <p class="text-xs text-on-surface-variant mt-1">Minimal donasi Rp 10.000</p>
                        </div>

                        {{-- Nama Lengkap --}}
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">Nama Lengkap *</label>
                            <input type="text" name="nama" required
                                value="{{ old('nama', auth()->user()?->name ?? '') }}"
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="Masukkan nama lengkap Anda">
                        </div>

                        {{-- Anonim / Hamba Allah Toggle --}}
                        <div class="flex items-center gap-2.5 p-3 rounded-xl bg-surface-container-low border border-outline-variant/30">
                            <input type="checkbox" name="is_anonymous" id="is_anonymous" value="1"
                                class="w-4 h-4 text-primary rounded border-outline-variant focus:ring-primary">
                            <label for="is_anonymous" class="text-xs font-medium text-on-surface cursor-pointer select-none">
                                Sembunyikan nama saya (Tampil sebagai <strong>Hamba Allah</strong> di daftar donatur publik)
                            </label>
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">Alamat Email *</label>
                            <input type="email" name="email" required
                                value="{{ old('email', auth()->user()?->email ?? '') }}"
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="contoh@email.com">
                            <p class="text-xs text-on-surface-variant mt-1">Bukti transfer & konfirmasi akan dikirim ke email ini</p>
                        </div>

                        {{-- Nomor Telepon --}}
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">Nomor WhatsApp / HP *</label>
                            <input type="tel" name="telepon" required
                                value="{{ old('telepon') }}"
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="08xxxxxxxxxx">
                        </div>

                        {{-- Pesan / Doa --}}
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">Doa & Pesan Kebaikan (Opsional)</label>
                            <textarea name="pesan" rows="3"
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none"
                                placeholder="Tuliskan doa atau pesan kebaikan untuk penerima manfaat...">{{ old('pesan') }}</textarea>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full mt-8 bg-[#F59E0B] hover:bg-[#D97706] text-white font-label-sm text-base px-8 py-4 rounded-xl transition-all shadow-md active:scale-95 font-bold flex items-center justify-center gap-2">
                        <span>Lanjut ke Pembayaran</span>
                        <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
