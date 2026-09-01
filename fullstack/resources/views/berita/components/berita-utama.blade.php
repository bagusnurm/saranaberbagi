<!-- Featured Blog Card -->
@if (isset($featured) && $featured)
    <div class="mb-stack-lg bg-surface rounded-xl border border-outline-variant overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col md:flex-row cursor-pointer group"
        data-post="{{ $featured->id }}">
        <div class="md:w-1/2 h-64 md:h-auto bg-surface-variant bg-cover bg-center min-h-[280px]"
            @if ($featured->thumbnail) style="background-image: url('{{ asset($featured->thumbnail) }}');" @endif>
        </div>
        <div class="md:w-1/2 p-stack-lg flex flex-col justify-center">
            <div class="flex items-center justify-between mb-stack-sm">
                <span class="bg-primary/10 text-primary px-3 py-1 rounded-full font-label-sm text-label-sm font-semibold">
                    {{ $featured->category->name ?? 'Edukasi' }}
                </span>
                <span class="font-label-sm text-label-sm text-on-surface-variant">
                    {{ $featured->published_at?->translatedFormat('d M Y') }}
                </span>
            </div>
            <h3 class="font-h2 text-h2 mb-stack-sm group-hover:text-primary transition-colors">
                {{ $featured->title }}
            </h3>
            <p class="font-body-lg text-body-lg text-on-surface-variant mb-stack-md line-clamp-3">
                {{ \Illuminate\Support\Str::limit(strip_tags($featured->content), 180) }}
            </p>
            <button type="button" data-post="{{ $featured->id }}"
                class="kabar-detail-link font-label-sm text-label-sm text-primary hover:text-primary-container flex items-center gap-1 text-left font-semibold">
                Baca Selengkapnya <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
            </button>
        </div>
    </div>
@endif
