<!-- Grid Kabar (Blog & Edukasi) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
    @forelse ($blogs as $blog)
        @php
            $thumbnailUrl = $blog->thumbnail
                ? (str_starts_with($blog->thumbnail, 'http') ? $blog->thumbnail : asset('storage/' . $blog->thumbnail))
                : 'https://placehold.co/600x400/0f766e/ffffff?text=' . urlencode(Str::limit($blog->title, 20));

            $readingTime = max(1, round(str_word_count(strip_tags($blog->content)) / 200));
        @endphp

        <article
            class="bg-surface-container-lowest rounded-3xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_12px_32px_rgba(15,23,42,0.08)] transition-all duration-300 group border border-outline-variant/20 flex flex-col">
            
            {{-- Thumbnail Clickable to Detail Page --}}
            <a href="{{ route('kabar.show', $blog->slug) }}" class="block relative h-56 overflow-hidden">
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    alt="{{ $blog->title }}"
                    src="{{ $thumbnailUrl }}"
                    loading="lazy">

                @if ($blog->category)
                    <div class="absolute top-4 left-4 bg-surface/90 backdrop-blur-sm px-3.5 py-1 rounded-full font-label-sm text-xs text-primary font-bold shadow-sm">
                        {{ $blog->category->name }}
                    </div>
                @endif
            </a>

            <div class="p-6 md:p-8 flex flex-col flex-grow">
                <div class="flex items-center gap-2 text-on-surface-variant font-label-sm text-xs mb-3">
                    <span>{{ $blog->published_at ? $blog->published_at->locale('id')->isoFormat('D MMM Y') : $blog->created_at->locale('id')->isoFormat('D MMM Y') }}</span>
                    <span>•</span>
                    <span>{{ $readingTime }} min baca</span>
                </div>

                <a href="{{ route('kabar.show', $blog->slug) }}" class="block group-hover:text-primary transition-colors mb-3">
                    <h3 class="font-h3 text-xl font-bold text-on-surface group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                        {{ $blog->title }}
                    </h3>
                </a>

                <p class="font-body-md text-sm text-on-surface-variant mb-6 line-clamp-3 flex-grow leading-relaxed">
                    {{ Str::limit(strip_tags($blog->content), 120) }}
                </p>

                <a href="{{ route('kabar.show', $blog->slug) }}"
                    class="inline-flex items-center gap-1.5 text-primary hover:text-primary-container font-label-sm text-xs font-bold mt-auto transition-colors">
                    <span>Baca Selengkapnya</span>
                    <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
        </article>
    @empty
        <div class="col-span-full py-16 text-center bg-surface-container-lowest rounded-3xl border border-outline-variant/20">
            <span class="material-symbols-outlined text-5xl text-outline-variant mb-3">menu_book</span>
            <h3 class="font-h3 text-xl text-on-surface mb-2 font-bold">Belum Ada Artikel</h3>
            <p class="text-sm text-on-surface-variant max-w-md mx-auto">
                Saat ini belum ada artikel yang sesuai dengan pencarian atau kategori yang dipilih.
            </p>
        </div>
    @endforelse
</div>
