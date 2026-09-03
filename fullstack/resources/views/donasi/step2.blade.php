@extends('layouts.app')

@section('title', 'Donasi - Langkah 2: Pilih Metode Pembayaran')

@section('content')
    <div class="pt-6 pb-section-padding">
        <div class="max-w-2xl mx-auto px-margin-mobile md:px-margin-desktop">
            {{-- Progress Steps Component --}}
            @include('donasi.components.progress-steps', ['step' => 2])

            <div class="bg-surface-container-lowest rounded-3xl p-8 md:p-10 shadow-lg border border-outline-variant/20">
                <h1 class="font-h2 text-h2 text-on-surface mb-2 text-center">Pilih Metode Pembayaran</h1>

                {{-- Summary Header Card --}}
                <div class="bg-surface-container-low rounded-2xl p-4 mb-8 border border-outline-variant/30 flex flex-col sm:flex-row items-center justify-between gap-2">
                    <div>
                        <p class="text-xs text-on-surface-variant">Program:</p>
                        <p class="font-semibold text-on-surface text-sm">{{ $campaign ? $campaign->title : 'Donasi Umum' }}</p>
                    </div>
                    <div class="text-right sm:text-right w-full sm:w-auto">
                        <p class="text-xs text-on-surface-variant">Total Donasi:</p>
                        <p class="font-bold text-primary text-lg">Rp {{ number_format($data['nominal'], 0, ',', '.') }}</p>
                    </div>
                </div>

                <form action="{{ route('donasi.step3') }}" method="POST">
                    @csrf
                    <input type="hidden" name="nama" value="{{ $data['nama'] }}">
                    <input type="hidden" name="email" value="{{ $data['email'] }}">
                    <input type="hidden" name="telepon" value="{{ $data['telepon'] }}">
                    <input type="hidden" name="nominal" value="{{ $data['nominal'] }}">
                    <input type="hidden" name="pesan" value="{{ $data['pesan'] ?? '' }}">
                    <input type="hidden" name="campaign_id" value="{{ $data['campaign_id'] ?? '' }}">
                    <input type="hidden" name="is_anonymous" value="{{ $data['is_anonymous'] ? '1' : '0' }}">

                    <div class="space-y-4" id="paymentOptions">
                        @forelse ($paymentMethods as $pm)
                            <label class="flex items-center p-4 border border-outline-variant rounded-2xl cursor-pointer hover:border-primary hover:bg-surface-container-low transition-all group">
                                <input type="radio" name="payment_method_id" value="{{ $pm->id }}" {{ $loop->first ? 'checked' : '' }}
                                    required class="w-5 h-5 text-primary focus:ring-primary">
                                <div class="ml-4 flex items-center justify-between w-full">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-xl bg-surface-container flex items-center justify-center font-bold text-xs text-primary border border-outline-variant/30 shrink-0">
                                            @if ($pm->type === 'qris')
                                                <span class="material-symbols-outlined text-2xl text-primary">qr_code_2</span>
                                            @else
                                                <span class="material-symbols-outlined text-2xl text-primary">account_balance</span>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-bold text-on-surface text-sm group-hover:text-primary transition-colors">{{ $pm->name }}</p>
                                            @if ($pm->account_number)
                                                <p class="text-xs font-mono text-on-surface-variant font-medium">{{ $pm->account_number }}</p>
                                            @endif
                                            @if ($pm->account_name)
                                                <p class="text-[11px] text-on-surface-variant">A.n {{ $pm->account_name }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <span class="text-xs uppercase font-bold text-outline-variant group-hover:text-primary tracking-wider transition-colors hidden sm:block">
                                        {{ $pm->type === 'qris' ? 'QRIS' : 'Transfer' }}
                                    </span>
                                </div>
                            </label>
                        @empty
                            <div class="p-6 text-center text-on-surface-variant bg-surface-container-low rounded-2xl">
                                <span class="material-symbols-outlined text-4xl text-outline-variant mb-2">credit_card_off</span>
                                <p class="text-sm">Belum ada metode pembayaran yang aktif. Silakan hubungi admin.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="flex gap-4 mt-8">
                        <a href="javascript:history.back()"
                            class="flex-1 bg-surface-container text-on-surface font-label-sm text-sm px-6 py-4 rounded-xl text-center hover:bg-surface-container-high transition-colors font-semibold">
                            Kembali
                        </a>
                        <button type="submit"
                            class="flex-1 bg-accent hover:bg-accent-hover text-on-accent font-label-sm text-sm px-6 py-4 rounded-xl transition-all shadow-md active:scale-95 font-bold flex items-center justify-center gap-2">
                            <span>Lanjut Konfirmasi</span>
                            <span class="material-symbols-outlined text-base">arrow_forward</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
