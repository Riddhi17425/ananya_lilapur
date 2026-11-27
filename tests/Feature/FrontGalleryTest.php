<?php

namespace Tests\Feature;

use App\Models\PhotoGallery;
use App\Models\PhotoGalleryCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FrontGalleryTest extends TestCase
{
    use RefreshDatabase;

    /** A photo with a list image (home slider) and/or an inner image (News & Gallery page). */
    private function photo(PhotoGalleryCategory $category, string $name, int $status = 1, bool $list = true, bool $inner = true): PhotoGallery
    {
        return PhotoGallery::create([
            'category_id' => $category->id,
            'name' => $name,
            'list_image' => $list ? "photo-galleries/list/{$name}.jpg" : null,
            'inner_image' => $inner ? "photo-galleries/inner/{$name}.jpg" : null,
            'status' => $status,
        ]);
    }

    public function test_home_slider_shows_the_newest_12_active_photos_with_a_list_image(): void
    {
        $life = PhotoGalleryCategory::create(['category_name' => PhotoGalleryCategory::LIFE_AT_ANANYA]);
        $hidden = PhotoGalleryCategory::create(['category_name' => 'Hidden', 'status' => 0]);

        $this->photo($life, 'Oldest Photo', 1, true, false);
        foreach (range(1, 12) as $i) {
            $this->photo($life, "Photo {$i}x", 1, true, false);
        }
        $this->photo($life, 'Inactive Photo', 0, true, false);
        $this->photo($hidden, 'Inactive Category Photo', 1, true, false);
        $this->photo($life, 'Gallery Page Only Photo', 1, false, true);

        $this->get('/')->assertOk()
            ->assertSee('photo-galleries/list/Photo 12x.jpg', false) // the list image is used
            ->assertSee('Photo 1x')
            ->assertDontSee('Oldest Photo')
            ->assertDontSee('Inactive Photo')
            ->assertDontSee('Inactive Category Photo')
            ->assertDontSee('Gallery Page Only Photo');
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
        $this->assertNull($this->photo($sports, 'Home Only', 1, true, false)->innerImageUrl());
    }

    public function test_gallery_page_shows_inner_images_not_the_home_slider_photos(): void
    {
        $life = PhotoGalleryCategory::create(['category_name' => PhotoGalleryCategory::LIFE_AT_ANANYA]);
        $events = PhotoGalleryCategory::create(['category_name' => 'Events']);
        $this->photo($life, 'Slider Only Photo', 1, true, false);
        $this->photo($events, 'Home List Only', 1, true, false);
        $this->photo($events, 'Campus Photo', 1, false, true);

        $this->get('/news-gallery')->assertOk()
            ->assertSee('Campus Photo')
            ->assertSee('src="'.asset('storage/photo-galleries/inner/Campus Photo.jpg').'"', false) // card uses the inner image
            ->assertDontSee('Slider Only Photo')
            ->assertDontSee('Home List Only')
            ->assertDontSee('data-cat="life-at-ananya"', false);
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
