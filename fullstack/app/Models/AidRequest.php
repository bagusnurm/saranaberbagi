<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AidRequest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'birthdate' => 'date',
        'is_mualaf' => 'boolean',
        'photos' => 'array',
        'videos' => 'array',
        'fund_needed' => 'decimal:2',
        'nik' => 'encrypted',
        'kk_number' => 'encrypted',
        'bank_account_number' => 'encrypted',
    ];

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
