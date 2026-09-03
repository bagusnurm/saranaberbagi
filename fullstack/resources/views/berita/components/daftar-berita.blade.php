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
                <x-post-card :item="$item" route="berita.show" />
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
