<!-- Kabar Terbaru Section -->
@if (isset($kabar) && $kabar->isNotEmpty())
    <section class="px-margin-desktop max-w-container-max mx-auto mb-16">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="font-h2 text-h2 text-on-surface">Kabar Terbaru</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant mt-4">
                Kisah inspiratif, pembaruan program, dan dampak yang kita ciptakan bersama untuk kemanusiaan.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($kabar as $item)
                <article
                    class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_10px_30px_rgba(15,23,42,0.08)] transition-all duration-300 group border border-outline-variant/20 flex flex-col cursor-pointer"
                    data-post="{{ $item->id }}">
                    <div class="relative h-60 overflow-hidden">
                        @if ($item->thumbnail)
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                alt="{{ $item->title }}" src="{{ asset($item->thumbnail) }}">
                        @else
                            <div class="w-full h-full bg-surface-variant flex items-center justify-center group-hover:scale-105 transition-transform duration-500">
                                <span class="material-symbols-outlined text-6xl text-outline">article</span>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4 bg-surface/90 backdrop-blur-sm px-3 py-1 rounded-full font-label-sm text-label-sm text-primary font-semibold">
                            {{ $item->category->name ?? 'Kabar' }}
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-2 text-outline font-label-sm text-label-sm mb-3">
                            <span>{{ $item->published_at?->translatedFormat('d M Y') }}</span>
                            <span>•</span>
                            <span>{{ $item->tags->first()?->name ?? 'Berita' }}</span>
                        </div>
                        <h3 class="font-h3 text-h3 text-on-surface mb-3 group-hover:text-primary transition-colors line-clamp-2">
                            {{ $item->title }}
                        </h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-3 flex-grow">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 140) }}
                        </p>
                        <button type="button" data-post="{{ $item->id }}"
                            class="kabar-detail-link inline-flex items-center gap-2 text-primary font-label-sm text-label-sm hover:underline mt-auto text-left font-semibold">
                            Baca Selengkapnya <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </button>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endif
