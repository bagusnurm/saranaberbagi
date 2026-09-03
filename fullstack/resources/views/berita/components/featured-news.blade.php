<!-- Featured News Highlight -->
@if (isset($featuredNews) && $featuredNews)
    @php
        $thumb = $featuredNews->thumbnail
            ? (str_starts_with($featuredNews->thumbnail, 'http') ? $featuredNews->thumbnail : asset('storage/' . $featuredNews->thumbnail))
            : 'https://placehold.co/1200x600/0f766e/ffffff?text=' . urlencode($featuredNews->title);
    @endphp

    <section class="px-margin-desktop max-w-container-max mx-auto mb-12">
        <div class="bg-surface-container-lowest rounded-3xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] border border-outline-variant/30 grid grid-cols-1 lg:grid-cols-12 items-center group">
            <div class="lg:col-span-7 relative h-72 lg:h-96 overflow-hidden">
                <img src="{{ $thumb }}"
                    alt="{{ $featuredNews->title }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy">
                @if ($featuredNews->category)
                    <div class="absolute top-4 left-4 bg-primary text-white font-bold text-xs px-3.5 py-1 rounded-full uppercase tracking-wider shadow">
                        {{ $featuredNews->category->name }}
                    </div>
                @endif
            </div>

            <div class="lg:col-span-5 p-6 md:p-10 flex flex-col justify-center space-y-4">
                <div class="flex items-center gap-2 text-xs text-on-surface-variant font-medium">
                    <span>{{ $featuredNews->published_at ? $featuredNews->published_at->locale('id')->isoFormat('D MMMM Y') : $featuredNews->created_at->locale('id')->isoFormat('D MMMM Y') }}</span>
                    <span>•</span>
                    <span>Warta Utama</span>
                </div>

                <a href="{{ route('berita.show', $featuredNews->slug) }}" class="block group-hover:text-primary transition-colors">
                    <h2 class="font-h2 text-2xl md:text-3xl font-extrabold text-on-surface group-hover:text-primary transition-colors leading-tight">
                        {{ $featuredNews->title }}
                    </h2>
                </a>

                <p class="text-sm text-on-surface-variant line-clamp-3 leading-relaxed">
                    {{ Str::limit(strip_tags($featuredNews->content), 160) }}
                </p>

                <div class="pt-2">
                    <a href="{{ route('berita.show', $featuredNews->slug) }}"
                        class="inline-flex items-center gap-2 bg-primary hover:bg-primary/90 text-white font-semibold text-xs px-6 py-3 rounded-xl transition-all shadow-sm active:scale-95">
                        <span>Baca Berita Selengkapnya</span>
                        <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endif
