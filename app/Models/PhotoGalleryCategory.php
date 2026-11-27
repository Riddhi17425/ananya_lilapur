<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['status', 'category_name'])]
class PhotoGalleryCategory extends Model
{
    use SoftDeletes;

    /** Photos of this category are the home page "Life at Ananya" slider (and are not listed on News & Gallery). */
    public const LIFE_AT_ANANYA = 'Life at Ananya';

    protected $table = 'photo_gallery_category';

    protected function casts(): array
    {
        return ['status' => 'boolean'];
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(PhotoGallery::class, 'category_id');
    }

    /** Only active categories (use this on the website and in the gallery form). */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 1);
    }
}
