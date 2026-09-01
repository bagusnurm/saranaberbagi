<!-- Categories Filter -->
@if (isset($categories) && $categories->isNotEmpty())
    <div class="flex flex-wrap justify-center items-center gap-2.5 mb-12 px-margin-desktop max-w-container-max mx-auto">
        <a href="{{ url('/berita') }}"
            class="px-5 py-2 rounded-full font-label-sm text-xs font-bold transition-all {{ empty($selectedCategory) ? 'bg-primary text-white shadow-sm' : 'bg-surface-container hover:bg-surface-container-high text-on-surface-variant' }}">
            Semua Berita
        </a>
        @foreach ($categories as $cat)
            <a href="{{ url('/berita?kategori=' . $cat->slug) }}"
                class="px-5 py-2 rounded-full font-label-sm text-xs font-bold transition-all {{ ($selectedCategory === $cat->slug) ? 'bg-primary text-white shadow-sm' : 'bg-surface-container hover:bg-surface-container-high text-on-surface-variant' }}">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>
@endif
