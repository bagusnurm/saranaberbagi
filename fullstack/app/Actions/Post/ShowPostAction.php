<?php

namespace App\Actions\Post;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class ShowPostAction
{
    /**
     * Mengambil detail post terpublikasi beserta rekomendasi post lainnya berdasarkan slug dan tipe.
     *
     * @return array{post: Post, otherPosts: Collection}
     */
    public function execute(string $slug, string $type = 'news'): array
    {
        $post = Post::with(['category', 'tags', 'author'])
            ->where('type', $type)
            ->where('status', 'published')
            ->where('slug', $slug)
            ->firstOrFail();

        // Rekomendasi post lainnya (mengacak ID di memori untuk menghindari ORDER BY RANDOM() pada database)
        $otherIds = Post::where('type', $type)
            ->where('status', 'published')
            ->where('id', '!=', $post->id)
            ->pluck('id');

        $otherPosts = $otherIds->isNotEmpty()
            ? Post::with(['category', 'author'])->whereIn('id', $otherIds->random(min(3, $otherIds->count())))->get()
            : new Collection;

        return [
            'post' => $post,
            'otherPosts' => $otherPosts,
        ];
    }
}
