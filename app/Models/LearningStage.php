<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/** One tab of the "Where the joy of learning begins" section on the Academics page. */
#[Fillable(['status', 'sort_order', 'tab_name', 'kicker', 'heading', 'description', 'points', 'classes', 'image', 'image_alt', 'image_width', 'image_arch', 'badge', 'notify_button'])]
class LearningStage extends Model
{
    use SoftDeletes;

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'image_arch' => 'boolean',
            'notify_button' => 'boolean',
            'sort_order' => 'integer',
            'image_width' => 'integer',
        ];
    }

    /** Only active stages (use this on the website). */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 1);
    }

    /** Tab order: lowest display order first. */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function imageUrl(): string
    {
        return asset('storage/'.$this->image);
    }

    /** Used in the tab / panel ids and the #hash link, e.g. "Foundational" => "foundational". */
    public function slug(): string
    {
        return Str::slug($this->tab_name);
    }

    /** @return list<string> */
    public function pointList(): array
    {
        return self::lines($this->points);
    }

    /** @return list<string> */
    public function classList(): array
    {
        return self::lines($this->classes);
    }

    private static function lines(?string $text): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\R/', (string) $text))));
    }
}
