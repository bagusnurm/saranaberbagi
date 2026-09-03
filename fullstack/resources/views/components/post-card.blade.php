@props([
    'item',
    'route',
    'badgeColor' => null,
])

@php
    $isCampaign = $item instanceof \App\Models\Campaign || $route === 'program.show';
    $isKabar = $route === 'kabar.show';

    $thumbnailUrl = $item->thumbnail
        ? (str_starts_with($item->thumbnail, 'http') ? $item->thumbnail : asset('storage/' . $item->thumbnail))
        : 'https://placehold.co/600x400/0f766e/ffffff?text=' . urlencode(\Illuminate\Support\Str::limit($item->title, 20));
@endphp

@if ($isCampaign)
    @php
        $progress = $item->target_amount > 0
            ? min(round(($item->collected_amount / $item->target_amount) * 100), 100)
            : 0;
        $categoryBadgeClass = $badgeColor ?? 'bg-primary-container text-on-primary-container';
    @endphp
    <div data-program="{{ $item->slug }}"
        class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">

        {{-- Thumbnail Clickable to Detail Page --}}
        <a href="{{ route($route, $item->slug) }}" class="block relative h-48 w-full overflow-hidden">
            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                alt="{{ $item->title }}"
                src="{{ $thumbnailUrl }}"
                loading="lazy">

            {{-- Badge Kategori --}}
            @if ($item->category)
                <span class="absolute top-4 left-4 {{ $categoryBadgeClass }} text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">
                    {{ $item->category->name }}
                </span>
            @endif

            {{-- Badge Featured --}}
            @if ($item->is_featured)
                <span class="absolute top-4 right-4 bg-[#F59E0B] text-white text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider">
                    <span class="material-symbols-outlined text-[12px] align-text-bottom">star</span> Unggulan
                </span>
            @endif
        </a>

        {{-- Content --}}
        <div class="p-6 flex flex-col flex-grow">
            <a href="{{ route($route, $item->slug) }}" class="block group-hover:text-primary transition-colors">
                <h3 class="font-h3 text-h3 text-on-surface group-hover:text-primary mb-2 line-clamp-2 transition-colors">
                    {{ $item->title }}
                </h3>
            </a>
            <p class="font-body-md text-body-md text-on-surface-variant mb-4 line-clamp-2">
                {{ \Illuminate\Support\Str::limit(strip_tags($item->description), 100) }}
            </p>

            {{-- Progress Donasi --}}
            <div class="mb-4">
                <div class="flex justify-between items-baseline mb-1.5">
                    <span class="text-xs font-semibold text-primary">
                        Rp {{ number_format($item->collected_amount, 0, ',', '.') }}
                    </span>
                    <span class="text-xs text-on-surface-variant">
                        dari Rp {{ number_format($item->target_amount, 0, ',', '.') }}
                    </span>
                </div>
                <div class="w-full h-2 bg-surface-container-high rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-primary to-primary-container rounded-full transition-all duration-700"
                        style="width: {{ $progress }}%"></div>
                </div>
                <div class="flex justify-between items-center text-[11px] text-on-surface-variant mt-1.5">
                    <span>{{ $item->donations_count ?? 0 }} Donasi</span>
                    <span>{{ $progress }}% tercapai</span>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="mt-auto flex items-center gap-2.5">
                <button type="button"
                    class="comment-btn flex-1 flex items-center justify-center gap-1.5 border-2 border-outline-variant text-on-surface-variant font-label-sm text-xs px-3 py-2.5 rounded-lg hover:border-primary hover:text-primary transition-colors active:scale-95">
                    <span class="material-symbols-outlined text-[16px]">chat_bubble</span>
                    <span>Doa</span>
                    <span class="comment-count ml-0.5 bg-primary/10 text-primary px-1.5 py-0.2 rounded-full text-[11px] font-bold min-w-[20px]"
                        data-count-for>{{ $item->comments_count }}</span>
                </button>
                <a href="{{ url('/donasi?campaign=' . $item->slug) }}"
                    class="block flex-1 bg-[#F59E0B] text-white font-label-sm text-xs px-3 py-2.5 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center font-bold">
                    Donasi
                </a>
            </div>
        </div>
    </div>
@elseif ($isKabar)
    @php
        $readingTime = max(1, round(str_word_count(strip_tags($item->content)) / 200));
    @endphp
    <article
        class="bg-surface-container-lowest rounded-3xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_12px_32px_rgba(15,23,42,0.08)] transition-all duration-300 group border border-outline-variant/20 flex flex-col">
        
        {{-- Thumbnail Clickable to Detail Page --}}
        <a href="{{ route($route, $item->slug) }}" class="block relative h-56 overflow-hidden">
            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                alt="{{ $item->title }}"
                src="{{ $thumbnailUrl }}"
                loading="lazy">

            @if ($item->category)
                <div class="absolute top-4 left-4 bg-surface/90 backdrop-blur-sm px-3.5 py-1 rounded-full font-label-sm text-xs text-primary font-bold shadow-sm">
                    {{ $item->category->name }}
                </div>
            @endif
        </a>

        <div class="p-6 md:p-8 flex flex-col flex-grow">
            <div class="flex items-center gap-2 text-on-surface-variant font-label-sm text-xs mb-3">
                <span>{{ $item->published_at ? $item->published_at->locale('id')->isoFormat('D MMM Y') : $item->created_at->locale('id')->isoFormat('D MMM Y') }}</span>
                <span>•</span>
                <span>{{ $readingTime }} min baca</span>
            </div>

            <a href="{{ route($route, $item->slug) }}" class="block group-hover:text-primary transition-colors mb-3">
                <h3 class="font-h3 text-xl font-bold text-on-surface group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                    {{ $item->title }}
                </h3>
            </a>

            <p class="font-body-md text-sm text-on-surface-variant mb-6 line-clamp-3 flex-grow leading-relaxed">
                {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 120) }}
            </p>

            <a href="{{ route($route, $item->slug) }}"
                class="inline-flex items-center gap-1.5 text-primary hover:text-primary-container font-label-sm text-xs font-bold mt-auto transition-colors">
                <span>Baca Selengkapnya</span>
                <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
    </article>
@else
    {{-- Berita (Default Post Card) --}}
    <article
        class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 group border border-outline-variant/30 flex flex-col">
        <a href="{{ route($route, $item->slug) }}" class="relative h-52 overflow-hidden block">
            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                alt="{{ $item->title }}" src="{{ $thumbnailUrl }}" loading="lazy">
            @if ($item->category)
                <div class="absolute top-3 left-3 bg-primary/90 text-white backdrop-blur-sm px-3 py-1 rounded-full font-label-sm text-[11px] font-bold shadow-sm">
                    {{ $item->category->name }}
                </div>
            @endif
        </a>

        <div class="p-6 flex flex-col flex-grow space-y-3">
            <div class="flex items-center gap-2 text-on-surface-variant font-label-sm text-xs">
                <span class="material-symbols-outlined text-[15px] text-primary">calendar_today</span>
                <span>{{ $item->published_at ? $item->published_at->locale('id')->isoFormat('D MMMM Y') : $item->created_at->locale('id')->isoFormat('D MMMM Y') }}</span>
            </div>

            <a href="{{ route($route, $item->slug) }}" class="block group-hover:text-primary transition-colors">
                <h3 class="font-h3 text-base md:text-lg font-bold text-on-surface group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                    {{ $item->title }}
                </h3>
            </a>

            <p class="font-body-md text-xs md:text-sm text-on-surface-variant line-clamp-3 leading-relaxed flex-grow">
                {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 130) }}
            </p>

            <div class="pt-3 border-t border-outline-variant/20 mt-auto">
                <a href="{{ route($route, $item->slug) }}"
                    class="inline-flex items-center gap-1.5 text-primary hover:text-primary-container font-label-sm text-xs font-bold transition-colors">
                    <span>Baca Selengkapnya</span>
                    <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
        </div>
    </article>
@endif
