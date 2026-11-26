<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['status', 'category_id', 'name', 'list_image', 'inner_image'])]
class PhotoGallery extends Model
{
    use SoftDeletes;

    protected function casts(): array
    {
        return ['status' => 'boolean'];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PhotoGalleryCategory::class, 'category_id')->withTrashed();
    }

    /** Only active galleries (use this on the website). */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 1);
    }

    public function listImageUrl(): string
    {
        return asset('storage/'.$this->list_image);
    }

    public function innerImageUrl(): string
    {
        return asset('storage/'.$this->inner_image);
    }
}
