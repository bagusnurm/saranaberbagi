<!-- Daftar Berita Grid -->
@if (isset($newsList) && $newsList->isNotEmpty())
    <section class="px-margin-desktop max-w-container-max mx-auto mb-16">
        <div class="flex items-center justify-between mb-8 pb-3 border-b border-outline-variant/30">
            <div>
                <h2 class="font-h2 text-2xl md:text-3xl font-bold text-on-surface">Kabar & Warta Lainnya</h2>
                <p class="text-xs md:text-sm text-on-surface-variant mt-1">
                    Dokumentasi aksi kebaikan dan penyaluran amanah donatur di berbagai wilayah.
                </p>
            </div>
            <span class="text-xs font-semibold text-primary bg-primary/10 px-3 py-1.5 rounded-full">
                {{ $newsList->count() }} Berita
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($newsList as $item)
                @php
                    $thumb = $item->thumbnail
                        ? (str_starts_with($item->thumbnail, 'http') ? $item->thumbnail : asset('storage/' . $item->thumbnail))
                        : 'https://placehold.co/600x400/0f766e/ffffff?text=' . urlencode(mb_substr($item->title, 0, 20));
                @endphp
                <article
                    class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 group border border-outline-variant/30 flex flex-col">
                    <a href="{{ route('berita.show', $item->slug) }}" class="relative h-52 overflow-hidden block">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            alt="{{ $item->title }}" src="{{ $thumb }}" loading="lazy">
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

                        <a href="{{ route('berita.show', $item->slug) }}" class="block group-hover:text-primary transition-colors">
                            <h3 class="font-h3 text-base md:text-lg font-bold text-on-surface group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                                {{ $item->title }}
                            </h3>
                        </a>

                        <p class="font-body-md text-xs md:text-sm text-on-surface-variant line-clamp-3 leading-relaxed flex-grow">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 130) }}
                        </p>

                        <div class="pt-3 border-t border-outline-variant/20 mt-auto">
                            <a href="{{ route('berita.show', $item->slug) }}"
                                class="inline-flex items-center gap-1.5 text-primary hover:text-primary-container font-label-sm text-xs font-bold transition-colors">
                                <span>Baca Selengkapnya</span>
                                <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@elseif (isset($allNews) && $allNews->isEmpty())
    <section class="px-margin-desktop max-w-container-max mx-auto py-16">
        <div class="text-center bg-surface-container-low/60 border border-outline-variant/30 rounded-2xl p-10 max-w-xl mx-auto">
            <span class="material-symbols-outlined text-6xl text-outline-variant mb-3">newspaper</span>
            <h3 class="font-h3 text-lg font-bold text-on-surface mb-2">Tidak Ada Berita Ditemukan</h3>
            <p class="text-xs md:text-sm text-on-surface-variant leading-relaxed mb-6">
                @if (request('q') || request('kategori'))
                    Tidak ditemukan berita dengan kata kunci atau kategori yang Anda cari. Silakan coba pencarian lain.
                @else
                    Saat ini belum ada berita atau warta yang dipublikasikan.
                @endif
            </p>
            @if (request('q') || request('kategori'))
                <a href="{{ url('/berita') }}"
                    class="inline-flex items-center gap-2 bg-primary text-white text-xs font-semibold px-5 py-2.5 rounded-xl hover:bg-primary-container transition shadow-sm">
                    <span class="material-symbols-outlined text-sm">restart_alt</span>
                    <span>Tampilkan Semua Berita</span>
                </a>
            @endif
        </div>
    </section>
@endif
