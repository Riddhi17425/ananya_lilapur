<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['status', 'question', 'answer'])]
class Faq extends Model
{
    use SoftDeletes;

    protected function casts(): array
    {
        return ['status' => 'boolean'];
    }

    /** Only active FAQs (use this on the website). */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 1);
    }
}
