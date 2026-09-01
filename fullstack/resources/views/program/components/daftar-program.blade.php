{{-- Grid Daftar Program (Dinamis dari database) --}}
@forelse ($campaigns as $campaign)
    @php
        $progress = $campaign->target_amount > 0
            ? min(round(($campaign->collected_amount / $campaign->target_amount) * 100), 100)
            : 0;

        // Warna badge berdasarkan kategori (cycle melalui palette)
        $badgeColors = [
            'bg-primary-container text-on-primary-container',
            'bg-secondary-container text-on-secondary-container',
            'bg-tertiary-container text-on-tertiary-container',
            'bg-error-container text-on-error-container',
        ];
        $badgeColor = $badgeColors[$loop->index % count($badgeColors)];

        $thumbnailUrl = $campaign->thumbnail
            ? asset('storage/' . $campaign->thumbnail)
            : 'https://placehold.co/600x400/0f766e/ffffff?text=' . urlencode(Str::limit($campaign->title, 20));
    @endphp

    <div data-program="{{ $campaign->slug }}"
        class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 flex flex-col group border border-outline-variant/20">

        {{-- Thumbnail Clickable to Detail Page --}}
        <a href="{{ route('program.show', $campaign->slug) }}" class="block relative h-48 w-full overflow-hidden">
            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                alt="{{ $campaign->title }}"
                src="{{ $thumbnailUrl }}"
                loading="lazy">

            {{-- Badge Kategori --}}
            @if ($campaign->category)
                <span class="absolute top-4 left-4 {{ $badgeColor }} text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md bg-opacity-90">
                    {{ $campaign->category->name }}
                </span>
            @endif

            {{-- Badge Featured --}}
            @if ($campaign->is_featured)
                <span class="absolute top-4 right-4 bg-[#F59E0B] text-white text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider">
                    <span class="material-symbols-outlined text-[12px] align-text-bottom">star</span> Unggulan
                </span>
            @endif
        </a>

        {{-- Content --}}
        <div class="p-6 flex flex-col flex-grow">
            <a href="{{ route('program.show', $campaign->slug) }}" class="block group-hover:text-primary transition-colors">
                <h3 class="font-h3 text-h3 text-on-surface group-hover:text-primary mb-2 line-clamp-2 transition-colors">
                    {{ $campaign->title }}
                </h3>
            </a>
            <p class="font-body-md text-body-md text-on-surface-variant mb-4 line-clamp-2">
                {{ Str::limit(strip_tags($campaign->description), 100) }}
            </p>

            {{-- Progress Donasi --}}
            <div class="mb-4">
                <div class="flex justify-between items-baseline mb-1.5">
                    <span class="text-xs font-semibold text-primary">
                        Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}
                    </span>
                    <span class="text-xs text-on-surface-variant">
                        dari Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}
                    </span>
                </div>
                <div class="w-full h-2 bg-surface-container-high rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-primary to-primary-container rounded-full transition-all duration-700"
                        style="width: {{ $progress }}%"></div>
                </div>
                <div class="flex justify-between items-center text-[11px] text-on-surface-variant mt-1.5">
                    <span>{{ $campaign->donations_count ?? 0 }} Donasi</span>
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
                        data-count-for>{{ $campaign->comments_count }}</span>
                </button>
                <a href="{{ url('/donasi?campaign=' . $campaign->slug) }}"
                    class="block flex-1 bg-[#F59E0B] text-white font-label-sm text-xs px-3 py-2.5 rounded-lg hover:bg-[#D97706] transition-colors shadow-sm active:scale-95 text-center font-bold">
                    Donasi
                </a>
            </div>
        </div>
    </div>
@empty
    {{-- Empty State --}}
    <div class="col-span-full flex flex-col items-center justify-center py-20 text-center">
        <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">volunteer_activism</span>
        <h3 class="font-h3 text-h3 text-on-surface mb-2">Belum Ada Program Aktif</h3>
        <p class="font-body-md text-body-md text-on-surface-variant max-w-md">
            Saat ini belum ada program yang tersedia. Silakan cek kembali nanti atau hubungi kami untuk informasi lebih lanjut.
        </p>
    </div>
@endforelse
