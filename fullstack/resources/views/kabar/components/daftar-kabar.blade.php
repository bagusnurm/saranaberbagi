<!-- Grid Kabar (Blog & Edukasi) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
    @forelse ($blogs as $blog)
        <x-post-card :item="$blog" route="kabar.show" />
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
