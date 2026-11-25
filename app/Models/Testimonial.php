<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['status', 'name', 'description', 'star', 'reviewer_category'])]
class Testimonial extends Model
{
    use SoftDeletes;

    /** Suggested values for the reviewer category field. */
    public const CATEGORIES = ['Parent', 'Student', 'Alumni', 'Teacher'];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'star' => 'integer',
        ];
    }

    /** Only active testimonials (use this on the website). */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 1);
    }
}
