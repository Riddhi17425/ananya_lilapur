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

    /** Photos that have a list image (home page "Life at Ananya" slider). */
    public function scopeForHome(Builder $query): Builder
    {
        return $query->whereNotNull('list_image');
    }

    /** Photos that have an inner image (News & Gallery page, "Life on Campus"). */
    public function scopeForGalleryPage(Builder $query): Builder
    {
        return $query->whereNotNull('inner_image');
    }

    public function listImageUrl(): ?string
    {
        return $this->list_image ? asset('storage/'.$this->list_image) : null;
    }

    public function innerImageUrl(): ?string
    {
        return $this->inner_image ? asset('storage/'.$this->inner_image) : null;
    }

    /** Any image of the photo, for the admin list thumbnail. */
    public function thumbnailUrl(): ?string
    {
        return $this->listImageUrl() ?? $this->innerImageUrl();
    }
}
