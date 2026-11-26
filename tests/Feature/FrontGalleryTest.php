<?php

namespace Tests\Feature;

use App\Models\PhotoGallery;
use App\Models\PhotoGalleryCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FrontGalleryTest extends TestCase
{
    use RefreshDatabase;

    private function photo(PhotoGalleryCategory $category, string $name, int $status = 1): PhotoGallery
    {
        return PhotoGallery::create([
            'category_id' => $category->id,
            'name' => $name,
            'list_image' => "photo-galleries/list/{$name}.jpg",
            'inner_image' => "photo-galleries/inner/{$name}.jpg",
            'status' => $status,
        ]);
    }

    public function test_home_life_at_ananya_shows_the_newest_12_active_photos(): void
    {
        $sports = PhotoGalleryCategory::create(['category_name' => 'Sports']);
        $hidden = PhotoGalleryCategory::create(['category_name' => 'Hidden', 'status' => 0]);

        $this->photo($sports, 'Oldest Photo');
        foreach (range(1, 12) as $i) {
            $this->photo($sports, "Photo {$i}x");
        }
        $this->photo($sports, 'Inactive Photo', 0);
        $this->photo($hidden, 'Inactive Category Photo');

        $this->get('/')->assertOk()
            ->assertSee('Photo 12x')
            ->assertSee('Photo 1x')
            ->assertDontSee('Oldest Photo')
            ->assertDontSee('Inactive Photo')
            ->assertDontSee('Inactive Category Photo');
    }

    public function test_home_hides_the_strip_when_there_are_no_photos(): void
    {
        $this->get('/')->assertOk()->assertDontSee('marquee-track', false);
    }

    public function test_image_urls_follow_the_current_site_address(): void
    {
        $sports = PhotoGalleryCategory::create(['category_name' => 'Sports']);
        $gallery = $this->photo($sports, 'Cricket');

        $this->assertSame(asset('storage/photo-galleries/list/Cricket.jpg'), $gallery->listImageUrl());
        $this->assertSame(asset('storage/photo-galleries/inner/Cricket.jpg'), $gallery->innerImageUrl());
    }

    public function test_gallery_page_shows_active_categories_and_photos(): void
    {
        $sports = PhotoGalleryCategory::create(['category_name' => 'Sports']);
        PhotoGalleryCategory::create(['category_name' => 'Achievements']); // no photos yet, filter still shows
        PhotoGalleryCategory::create(['category_name' => 'Hidden Category', 'status' => 0]);
        $this->photo($sports, 'Cricket');
        $this->photo($sports, 'Inactive Photo', 0);

        $this->get('/news-gallery')->assertOk()
            ->assertSee('data-cat="sports"', false)
            ->assertSee('data-cat="achievements"', false)
            ->assertSee('Cricket')
            ->assertSee('photo-galleries/inner/Cricket.jpg', false) // lightbox image
            ->assertDontSee('Inactive Photo')
            ->assertDontSee('Hidden Category');
    }
}
