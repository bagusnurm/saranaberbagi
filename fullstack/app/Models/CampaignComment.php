<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CampaignComment extends Model
{
    protected $table = 'campaign_comments';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'is_approved' => 'boolean',
        ];
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Komentar terbaru dulu untuk satu campaign.
     */
    public function scopeForCampaign($query, int $campaignId)
    {
        return $query->where('campaign_id', $campaignId)
            ->where('is_approved', true)
            ->orderByDesc('created_at');
    }
}
