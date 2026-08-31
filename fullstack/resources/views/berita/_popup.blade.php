<article class="max-w-[720px] mx-auto p-6 md:p-10">
    <div class="flex items-center space-x-2 mb-6">
        <span class="inline-flex items-center px-3 py-1 rounded-full bg-primary-container text-on-primary-container font-label-sm text-label-sm">{{ $post->category->name ?? 'Berita' }}</span>
        <span class="text-outline text-sm">•</span>
        <span class="text-on-surface-variant font-body-md text-sm">{{ $post->published_at?->translatedFormat('d M Y') }}</span>
    </div>
    <h1 class="font-h1 text-h1-mobile md:text-h1 text-on-surface mb-6">{{ $post->title }}</h1>
    <div class="flex items-center space-x-4 mb-10 pb-8 border-b border-outline-variant/30">
        <div class="w-12 h-12 rounded-full overflow-hidden bg-surface-variant flex items-center justify-center">
            <span class="material-symbols-outlined text-on-surface-variant">person</span>
        </div>
        <div>
            <p class="font-label-sm text-label-sm text-on-surface">{{ $author }}</p>
            <p class="font-body-md text-sm text-on-surface-variant">{{ $post->published_at?->translatedFormat('d M Y') }}</p>
        </div>
    </div>
    @if ($post->thumbnail)
        <figure class="mb-12 relative rounded-2xl overflow-hidden shadow-sm">
            <div class="bg-cover bg-center w-full aspect-video" style="background-image: url('{{ asset($post->thumbnail) }}');"></div>
        </figure>
    @endif
    <div class="prose prose-lg font-body-lg text-body-lg text-on-surface max-w-none">{!! $post->content !!}</div>
    <div class="mt-16 bg-primary text-on-primary rounded-2xl p-8 md:p-12 text-center shadow-lg relative overflow-hidden">
        <div class="relative z-10">
            <h3 class="font-h2 text-h2 mb-4">Mari Bersama Ringankan Beban Mereka</h3>
            <p class="font-body-lg text-lg mb-8 opacity-90 max-w-2xl mx-auto">Donasi Anda akan disalurkan langsung untuk program-program kami di seluruh Indonesia.</p>
            <a href="{{ url('/donasi') }}" class="inline-block bg-[#F59E0B] hover:bg-[#D97706] text-white font-label-sm text-label-sm px-8 py-4 rounded-lg transition-colors shadow-md active:scale-95">Donasi Sekarang</a>
        </div>
    </div>
</article>
