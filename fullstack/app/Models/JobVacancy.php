<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobVacancy extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'deadline' => 'date',
        ];
    }

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class, 'job_vacancy_id');
    }
}
