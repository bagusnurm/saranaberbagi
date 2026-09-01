<!-- Hero Search Section -->
<section class="px-margin-desktop max-w-container-max mx-auto mb-8 pt-6">
    <div class="text-center max-w-3xl mx-auto mb-10">
        <h1 class="font-h1 text-h1 text-on-surface mb-4">Warta & Berita Terbaru</h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-8">
            Pembaruan kegiatan penyaluran bantuan, laporan aksi kemanusiaan, dan siaran pers resmi Sarana Berbagi.
        </p>
        <form method="GET" action="{{ url('/berita') }}" class="relative max-w-2xl mx-auto group">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">search</span>
            <input name="q" value="{{ $search ?? '' }}"
                class="w-full bg-surface-container-lowest border border-outline-variant rounded-2xl py-4 pl-12 pr-28 font-body-md text-body-md text-on-surface placeholder:text-outline-variant focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all shadow-sm"
                placeholder="Cari berita atau siaran pers..." type="text">
            <button type="submit"
                class="absolute right-2 top-1/2 -translate-y-1/2 bg-primary hover:bg-primary/90 text-white font-semibold text-xs px-5 py-2.5 rounded-xl transition-all active:scale-95">
                Cari
            </button>
        </form>
    </div>
</section>
