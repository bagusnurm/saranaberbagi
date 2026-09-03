<?php

namespace App\Actions\Post;

use App\Models\ContentCategory;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class ListPostsAction
{
    /**
     * Mengambil daftar post terpublikasi beserta relasi dan kategori berdasarkan tipe ('news' / 'blog').
     *
     * @return array{posts: Collection, categories: Collection, search: ?string, selectedCategory: ?string}
     */
    public function execute(string $type, ?string $search = null, ?string $selectedCategory = null): array
    {
        $query = Post::with(['category', 'tags', 'author'])
            ->where('type', $type)
            ->where('status', 'published')
            ->orderByDesc('published_at');

        if ($selectedCategory) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $selectedCategory));
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $query->get();

        $categories = ContentCategory::whereHas('posts', fn ($q) => $q
            ->where('type', $type)
            ->where('status', 'published')
        )->orderBy('name')->get();

        return [
            'posts' => $posts,
            'categories' => $categories,
            'search' => $search,
            'selectedCategory' => $selectedCategory,
        ];
    }
}
