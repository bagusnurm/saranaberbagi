<!-- Tag Filter Pills -->
<div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-stack-lg berita-toolbar">
    <div class="flex flex-wrap gap-2" id="tagPills">
        <button type="button" data-tag=""
            class="tag-pill bg-primary text-white px-4 py-2 rounded-full font-label-sm text-label-sm font-semibold">
            Semua
        </button>
        @if (isset($tagPills))
            @foreach ($tagPills as $tag)
                <button type="button" data-tag="{{ $tag->slug }}"
                    class="tag-pill bg-surface-container-high text-on-surface-variant px-4 py-2 rounded-full font-label-sm text-label-sm hover:bg-primary/10 transition-colors">
                    {{ $tag->name }}
                </button>
            @endforeach
        @endif
    </div>
</div>
