<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'target_amount' => 'decimal:2',
            'collected_amount' => 'decimal:2',
            'start_date' => 'date',
            'end_date' => 'date',
            'is_featured' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryCampaign::class, 'campaign_category_id');
    }

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }
}
