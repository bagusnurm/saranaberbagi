<!-- Blog Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter" id="blogGrid">
    @if (isset($blogLainnya))
        @foreach ($blogLainnya as $item)
            <div class="blog-card bg-surface rounded-xl border border-outline-variant overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col"
                data-tags="{{ $item->tags->pluck('slug')->implode(',') }}"
                data-post="{{ $item->id }}">
                <div class="h-48 w-full bg-surface-variant bg-cover bg-center"
                    @if ($item->thumbnail) style="background-image: url('{{ asset($item->thumbnail) }}');" @endif>
                </div>
                <div class="p-stack-md flex flex-col flex-grow">
                    <div class="flex items-center justify-between mb-stack-sm">
                        <span class="bg-primary/10 text-primary px-3 py-1 rounded-full font-label-sm text-label-sm font-semibold">
                            {{ $item->category->name ?? 'Tips' }}
                        </span>
                        <span class="font-label-sm text-label-sm text-on-surface-variant">
                            {{ $item->published_at?->translatedFormat('d M Y') }}
                        </span>
                    </div>
                    <h3 class="font-h3 text-h3 mb-stack-sm line-clamp-2">{{ $item->title }}</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-stack-md line-clamp-3 flex-grow">
                        {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 130) }}
                    </p>
                    <button type="button" data-post="{{ $item->id }}"
                        class="kabar-detail-link font-label-sm text-label-sm text-primary hover:text-primary-container flex items-center gap-1 mt-auto text-left font-semibold">
                        Baca Selengkapnya <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                    </button>
                </div>
            </div>
        @endforeach
    @endif
</div>

@if ((!isset($blogLainnya) || $blogLainnya->isEmpty()) && empty($featured))
    <div class="text-center py-16 bg-surface-container-low rounded-xl border border-outline-variant">
        <span class="material-symbols-outlined text-6xl text-outline">edit_note</span>
        <p class="font-body-lg text-body-lg text-on-surface-variant mt-4">
            Belum ada artikel blog. Artikel akan tampil di sini setelah dipublikasikan dari panel admin.
        </p>
    </div>
@endif

<!-- Muat Lebih Banyak Button -->
<div class="mt-stack-lg flex justify-center">
    <button type="button" id="loadMoreBtn"
        class="hidden border-2 border-primary text-primary px-6 py-3 rounded-lg font-label-sm text-label-sm hover:bg-primary/5 transition-colors font-semibold">
        Muat Lebih Banyak
    </button>
</div>
