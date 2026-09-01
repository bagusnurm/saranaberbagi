@extends('layouts.app')

@section('title', $campaign->title . ' - Sarana Berbagi')

@section('content')
    @php
        $progress = $campaign->target_amount > 0
            ? min(round(($campaign->collected_amount / $campaign->target_amount) * 100), 100)
            : 0;

        $thumbnailUrl = $campaign->thumbnail
            ? asset('storage/' . $campaign->thumbnail)
            : 'https://placehold.co/1200x600/0f766e/ffffff?text=' . urlencode($campaign->title);

        $daysRemaining = null;
        if ($campaign->end_date) {
            $diff = now()->diffInDays($campaign->end_date, false);
            $daysRemaining = $diff > 0 ? (int) $diff : 0;
        }
    @endphp

    <div class="pt-6 pb-section-padding px-margin-desktop max-w-container-max mx-auto w-full">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-on-surface-variant mb-6" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" class="hover:text-primary transition-colors">Beranda</a>
            <span class="text-outline-variant">/</span>
            <a href="{{ url('/program') }}" class="hover:text-primary transition-colors">Program</a>
            <span class="text-outline-variant">/</span>
            <span class="text-on-surface font-semibold truncate max-w-xs md:max-w-md">{{ $campaign->title }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            {{-- Main Column (Left, 8 Cols) --}}
            <div class="lg:col-span-8 space-y-8">
                {{-- Hero Banner / Thumbnail --}}
                <div class="relative bg-surface-container-lowest rounded-3xl overflow-hidden shadow-sm border border-outline-variant/30">
                    <div class="relative aspect-video w-full overflow-hidden">
                        <img src="{{ $thumbnailUrl }}"
                            alt="{{ $campaign->title }}"
                            class="w-full h-full object-cover">
                    </div>

                    {{-- Badges on Banner --}}
                    <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                        @if ($campaign->category)
                            <span class="bg-primary-container/90 text-on-primary-container text-xs font-bold px-3.5 py-1.5 rounded-full uppercase tracking-wider backdrop-blur-md shadow-sm">
                                {{ $campaign->category->name }}
                            </span>
                        @endif
                        @if ($campaign->is_featured)
                            <span class="bg-[#F59E0B]/90 text-white text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider backdrop-blur-md shadow-sm flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">star</span> Unggulan
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Campaign Header & Metrics Mobile Card (visible on mobile / tablet) --}}
                <div class="lg:hidden bg-surface-container-lowest rounded-2xl p-6 border border-outline-variant/30 shadow-sm space-y-4">
                    <h1 class="font-h2 text-h2 text-on-surface leading-tight">{{ $campaign->title }}</h1>

                    <div>
                        <div class="flex justify-between items-baseline mb-2">
                            <div>
                                <p class="text-xs text-on-surface-variant">Terkumpul</p>
                                <p class="text-xl font-bold text-primary">
                                    Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-on-surface-variant">Target</p>
                                <p class="text-sm font-semibold text-on-surface">
                                    Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        <div class="w-full h-2.5 bg-surface-container-high rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-primary to-primary-container rounded-full transition-all duration-700"
                                style="width: {{ $progress }}%"></div>
                        </div>

                        <div class="flex justify-between items-center text-xs text-on-surface-variant mt-2 font-medium">
                            <span>{{ $progress }}% tercapai</span>
                            <span>{{ $campaign->donations_count }} Donasi</span>
                            @if ($daysRemaining !== null)
                                <span>{{ $daysRemaining }} hari lagi</span>
                            @endif
                        </div>
                    </div>

                    <a href="{{ url('/donasi?campaign=' . $campaign->slug) }}"
                        class="block w-full bg-[#F59E0B] hover:bg-[#D97706] text-white font-label-sm text-label-sm py-3.5 rounded-xl text-center font-bold shadow-md transition-all active:scale-95">
                        Donasi Sekarang
                    </a>
                </div>

                {{-- Campaign Story / Description --}}
                <div class="bg-surface-container-lowest rounded-3xl p-6 md:p-10 border border-outline-variant/30 shadow-sm">
                    <h2 class="font-h3 text-h3 text-on-surface mb-6 flex items-center gap-2.5 pb-4 border-b border-outline-variant/20">
                        <span class="material-symbols-outlined text-primary text-2xl">description</span>
                        Tentang Program Ini
                    </h2>

                    <div class="prose max-w-none text-on-surface-variant font-body-md text-base leading-relaxed space-y-4">
                        {!! $campaign->description !!}
                    </div>
                </div>

                {{-- Donors List Section (Donasi Terverifikasi) --}}
                <div class="bg-surface-container-lowest rounded-3xl p-6 md:p-10 border border-outline-variant/30 shadow-sm">
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-outline-variant/20">
                        <h2 class="font-h3 text-h3 text-on-surface flex items-center gap-2.5">
                            <span class="material-symbols-outlined text-primary text-2xl">favorite</span>
                            Donatur Kebaikan
                        </h2>
                        <span class="bg-primary/10 text-primary font-bold px-3 py-1 rounded-full text-xs">
                            {{ $campaign->donations_count }} Donasi
                        </span>
                    </div>

                    @if ($campaign->donations->isNotEmpty())
                        <div class="space-y-4">
                            @foreach ($campaign->donations as $donation)
                                @php
                                    $donorDisplay = $donation->is_anonymous ? 'Hamba Allah' : $donation->donor_name;
                                    $initial = mb_strtoupper(mb_substr($donorDisplay, 0, 1));
                                @endphp
                                <div class="flex items-start gap-4 p-4 rounded-2xl bg-surface-container-low border border-outline-variant/20 transition-all hover:bg-surface-container">
                                    <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold text-sm shrink-0">
                                        {{ $initial }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-baseline justify-between gap-2">
                                            <p class="font-semibold text-on-surface text-sm">{{ $donorDisplay }}</p>
                                            <span class="text-xs text-on-surface-variant">{{ $donation->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-xs font-bold text-primary mt-0.5">
                                            Berdonasi Rp {{ number_format($donation->amount, 0, ',', '.') }}
                                        </p>
                                        @if (!empty($donation->message))
                                            <p class="text-sm text-on-surface-variant mt-2 italic bg-surface-container-lowest p-3 rounded-xl border border-outline-variant/30">
                                                "{{ $donation->message }}"
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-10 text-on-surface-variant">
                            <span class="material-symbols-outlined text-4xl text-outline-variant mb-2">volunteer_activism</span>
                            <p class="text-sm font-medium">Jadilah yang pertama berdonasi untuk program ini.</p>
                            <a href="{{ url('/donasi?campaign=' . $campaign->slug) }}"
                                class="inline-block mt-4 bg-primary text-white text-xs font-semibold px-5 py-2.5 rounded-lg hover:bg-primary/90 transition-colors">
                                Donasi Pertama Kali
                            </a>
                        </div>
                    @endif
                </div>

                {{-- Comments / Prayers Section --}}
                <div class="bg-surface-container-lowest rounded-3xl p-6 md:p-10 border border-outline-variant/30 shadow-sm" data-program="{{ $campaign->slug }}">
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-outline-variant/20">
                        <h2 class="font-h3 text-h3 text-on-surface flex items-center gap-2.5">
                            <span class="material-symbols-outlined text-primary text-2xl">forum</span>
                            Doa & Dukungan
                        </h2>
                        <button type="button"
                            class="comment-btn flex items-center gap-1.5 bg-primary/10 hover:bg-primary text-primary hover:text-white font-semibold text-xs px-4 py-2 rounded-xl transition-all active:scale-95">
                            <span class="material-symbols-outlined text-sm">add_comment</span>
                            <span>Tulis Doa</span>
                        </button>
                    </div>

                    @if ($campaign->comments->isNotEmpty())
                        <div class="space-y-4">
                            @foreach ($campaign->comments as $comment)
                                <div class="bg-surface-container-low rounded-2xl p-4 border border-outline-variant/20 flex gap-3.5">
                                    <div class="w-9 h-9 rounded-full bg-secondary-container text-on-secondary-container font-bold flex items-center justify-center text-xs shrink-0">
                                        {{ mb_strtoupper(mb_substr($comment->name, 0, 1)) }}
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-baseline justify-between gap-2">
                                            <p class="font-semibold text-on-surface text-sm truncate">{{ $comment->name }}</p>
                                            <span class="text-xs text-on-surface-variant shrink-0">{{ $comment->created_at->locale('id')->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-sm text-on-surface-variant mt-1 leading-relaxed">{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-10 text-on-surface-variant">
                            <span class="material-symbols-outlined text-4xl text-outline-variant mb-2">chat_bubble_outline</span>
                            <p class="text-sm font-medium">Belum ada doa atau dukungan tertulis. Berikan dukungan terbaik Anda!</p>
                            <button type="button"
                                class="comment-btn inline-block mt-4 border border-primary text-primary hover:bg-primary hover:text-white text-xs font-semibold px-5 py-2.5 rounded-lg transition-colors">
                                Tulis Doa Sekarang
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Sidebar Column (Right, 4 Cols Sticky Desktop) --}}
            <div class="hidden lg:block lg:col-span-4 sticky top-28 space-y-6">
                <div class="bg-surface-container-lowest rounded-3xl p-6 md:p-8 border border-outline-variant/30 shadow-lg space-y-6">
                    <h1 class="font-h3 text-h3 text-on-surface leading-snug">{{ $campaign->title }}</h1>

                    <div>
                        <div class="flex justify-between items-baseline mb-2">
                            <div>
                                <p class="text-xs text-on-surface-variant uppercase font-semibold tracking-wider">Terkumpul</p>
                                <p class="text-2xl font-extrabold text-primary mt-0.5">
                                    Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-on-surface-variant uppercase font-semibold tracking-wider">Target</p>
                                <p class="text-sm font-bold text-on-surface mt-0.5">
                                    Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>

                        <div class="w-full h-3 bg-surface-container-high rounded-full overflow-hidden mt-3">
                            <div class="h-full bg-gradient-to-r from-primary to-primary-container rounded-full transition-all duration-700"
                                style="width: {{ $progress }}%"></div>
                        </div>

                        <div class="flex justify-between items-center text-xs text-on-surface-variant mt-3 font-medium">
                            <span class="bg-primary/10 text-primary px-2 py-0.5 rounded font-bold">{{ $progress }}%</span>
                            <span>{{ $campaign->donations_count }} Donatur</span>
                            @if ($daysRemaining !== null)
                                <span>{{ $daysRemaining }} hari lagi</span>
                            @endif
                        </div>
                    </div>

                    {{-- Pre-selected Nominal Shortcuts --}}
                    <div class="space-y-3 pt-4 border-t border-outline-variant/30">
                        <p class="text-xs font-semibold text-on-surface uppercase tracking-wider">Pilih Nominal Donasi:</p>
                        <div class="grid grid-cols-2 gap-2.5">
                            <a href="{{ url('/donasi?campaign=' . $campaign->slug . '&nominal=25000') }}"
                                class="p-3 text-center border border-outline-variant/50 hover:border-primary hover:bg-primary/5 rounded-xl text-sm font-bold text-on-surface hover:text-primary transition-all">
                                Rp 25.000
                            </a>
                            <a href="{{ url('/donasi?campaign=' . $campaign->slug . '&nominal=50000') }}"
                                class="p-3 text-center border border-outline-variant/50 hover:border-primary hover:bg-primary/5 rounded-xl text-sm font-bold text-on-surface hover:text-primary transition-all">
                                Rp 50.000
                            </a>
                            <a href="{{ url('/donasi?campaign=' . $campaign->slug . '&nominal=100000') }}"
                                class="p-3 text-center border border-outline-variant/50 hover:border-primary hover:bg-primary/5 rounded-xl text-sm font-bold text-on-surface hover:text-primary transition-all">
                                Rp 100.000
                            </a>
                            <a href="{{ url('/donasi?campaign=' . $campaign->slug . '&nominal=250000') }}"
                                class="p-3 text-center border border-outline-variant/50 hover:border-primary hover:bg-primary/5 rounded-xl text-sm font-bold text-on-surface hover:text-primary transition-all">
                                Rp 250.000
                            </a>
                        </div>
                    </div>

                    {{-- Main Donate CTA --}}
                    <a href="{{ url('/donasi?campaign=' . $campaign->slug) }}"
                        class="block w-full bg-[#F59E0B] hover:bg-[#D97706] text-white font-label-sm text-base py-4 rounded-xl text-center font-bold shadow-lg transition-all active:scale-95 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-xl">volunteer_activism</span>
                        <span>Donasi Sekarang</span>
                    </a>

                    {{-- Share program CTA --}}
                    <div class="pt-4 border-t border-outline-variant/30 text-center">
                        <p class="text-xs text-on-surface-variant mb-3">Bagikan program ini ke teman & keluarga:</p>
                        <div class="flex items-center justify-center gap-3">
                            <a href="https://wa.me/?text={{ urlencode('Mari bersama berdonasi untuk ' . $campaign->title . ' di Sarana Berbagi: ' . url()->current()) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="w-10 h-10 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center shadow transition-all hover:scale-105"
                                title="Share via WhatsApp">
                                <span class="material-symbols-outlined text-[18px]">chat</span>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="w-10 h-10 rounded-full bg-blue-600 hover:bg-blue-700 text-white flex items-center justify-center shadow transition-all hover:scale-105"
                                title="Share via Facebook">
                                <span class="material-symbols-outlined text-[18px]">share</span>
                            </a>
                            <button type="button"
                                onclick="navigator.clipboard.writeText('{{ url()->current() }}'); alert('Tautan program berhasil disalin ke clipboard!');"
                                class="w-10 h-10 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface flex items-center justify-center shadow border border-outline-variant/30 transition-all hover:scale-105"
                                title="Salin Tautan">
                                <span class="material-symbols-outlined text-[18px]">link</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Other Campaigns Recommendation --}}
                @if ($otherCampaigns->isNotEmpty())
                    <div class="bg-surface-container-lowest rounded-3xl p-6 border border-outline-variant/30 shadow-sm space-y-4">
                        <h3 class="font-h3 text-sm text-on-surface uppercase tracking-wider font-bold">Program Lainnya</h3>
                        <div class="space-y-3">
                            @foreach ($otherCampaigns as $other)
                                <a href="{{ route('program.show', $other->slug) }}" class="flex items-center gap-3 group">
                                    <img src="{{ $other->thumbnail ? asset('storage/' . $other->thumbnail) : 'https://placehold.co/100x100/0f766e/ffffff?text=SB' }}"
                                        alt="{{ $other->title }}"
                                        class="w-14 h-14 rounded-xl object-cover shrink-0 border border-outline-variant/30 group-hover:scale-105 transition-transform">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs font-semibold text-on-surface group-hover:text-primary transition-colors line-clamp-2">{{ $other->title }}</p>
                                        <p class="text-[11px] text-primary font-bold mt-1">
                                            Rp {{ number_format($other->collected_amount, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Modal Doa & Komentar Program --}}
    @include('program.components.modal-komentar')
@endsection
