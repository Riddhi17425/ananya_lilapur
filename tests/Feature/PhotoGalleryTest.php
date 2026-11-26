<?php

namespace Tests\Feature;

use App\Models\PhotoGallery;
use App\Models\PhotoGalleryCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PhotoGalleryTest extends TestCase
{
    use RefreshDatabase;

    private function category(array $overrides = []): PhotoGalleryCategory
    {
        return PhotoGalleryCategory::create(array_merge(['category_name' => 'Sports Day', 'status' => 1], $overrides));
    }

    private function galleryData(PhotoGalleryCategory $category, array $overrides = []): array
    {
        return array_merge([
            'category_id' => $category->id,
            'name' => 'Annual Sports Day',
            'status' => 1,
            'list_image' => UploadedFile::fake()->image('list.jpg', 400, 300),
            'inner_image' => UploadedFile::fake()->image('inner.png', 800, 600),
        ], $overrides);
    }

    public function test_guests_are_redirected_to_login(): void
    {
        $this->get(route('admin.photo-gallery-categories.index'))->assertRedirect(route('login'));
        $this->get(route('admin.photo-galleries.index'))->assertRedirect(route('login'));
    }

    public function test_category_crud_and_toggle(): void
    {
        $this->actingAs(User::factory()->create());

        $this->get(route('admin.photo-gallery-categories.index'))->assertOk()->assertSee('categories-table');
        $this->get(route('admin.photo-gallery-categories.create'))->assertOk();

        $this->post(route('admin.photo-gallery-categories.store'), ['category_name' => 'Events', 'status' => 1])
            ->assertRedirect(route('admin.photo-gallery-categories.index'));
        $category = PhotoGalleryCategory::firstWhere('category_name', 'Events');
        $this->assertNotNull($category);

        $this->get(route('admin.photo-gallery-categories.edit', $category))->assertOk();
        $this->put(route('admin.photo-gallery-categories.update', $category), ['category_name' => 'Festivals', 'status' => 1]);
        $this->assertDatabaseHas('photo_gallery_category', ['id' => $category->id, 'category_name' => 'Festivals']);

        $this->patch(route('admin.photo-gallery-categories.status', $category))->assertRedirect();
        $this->assertFalse($category->fresh()->status);

        $this->delete(route('admin.photo-gallery-categories.destroy', $category));
        $this->assertSoftDeleted('photo_gallery_category', ['id' => $category->id]);
    }

    public function test_category_validation_and_datatable_rows(): void
    {
        $this->actingAs(User::factory()->create());
        $this->category();

        $this->post(route('admin.photo-gallery-categories.store'), ['category_name' => '', 'status' => 3])
            ->assertSessionHasErrors(['category_name', 'status']);

        $this->getJson(route('admin.photo-gallery-categories.index', ['draw' => 1, 'start' => 0, 'length' => 10]), ['X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()
            ->assertJsonPath('recordsTotal', 1)
            ->assertJsonPath('data.0.category_name', 'Sports Day');
    }

    public function test_category_with_galleries_cannot_be_deleted(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create());
        $category = $this->category();
        $this->post(route('admin.photo-galleries.store'), $this->galleryData($category));

        $this->delete(route('admin.photo-gallery-categories.destroy', $category))->assertSessionHas('error');
        $this->assertNotSoftDeleted('photo_gallery_category', ['id' => $category->id]);
    }

    public function test_admin_can_create_gallery_with_images(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create());
        $category = $this->category();

        $this->get(route('admin.photo-galleries.create'))->assertOk()->assertSee('Sports Day');

        $this->post(route('admin.photo-galleries.store'), $this->galleryData($category))
            ->assertRedirect(route('admin.photo-galleries.index'));

        $gallery = PhotoGallery::firstWhere('name', 'Annual Sports Day');
        $this->assertNotNull($gallery);
        Storage::disk('public')->assertExists([$gallery->list_image, $gallery->inner_image]);

        $this->getJson(route('admin.photo-galleries.index', ['draw' => 1, 'start' => 0, 'length' => 10]), ['X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()
            ->assertJsonPath('recordsTotal', 1)
            ->assertJsonPath('data.0.category', 'Sports Day');
    }

    public function test_gallery_validation(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create());
        $category = $this->category();
        $inactive = $this->category(['category_name' => 'Hidden', 'status' => 0]);

        // Images are required when adding.
        $this->post(route('admin.photo-galleries.store'), ['name' => '', 'category_id' => '', 'status' => 1])
            ->assertSessionHasErrors(['category_id', 'name', 'list_image', 'inner_image']);

        // Wrong file type, too large, and an inactive category.
        $this->post(route('admin.photo-galleries.store'), $this->galleryData($inactive, [
            'list_image' => UploadedFile::fake()->create('doc.pdf', 10, 'application/pdf'),
            'inner_image' => UploadedFile::fake()->image('big.jpg')->size(3000),
        ]))->assertSessionHasErrors(['category_id', 'list_image', 'inner_image']);

        $this->assertDatabaseCount('photo_galleries', 0);
    }

    public function test_admin_can_update_toggle_and_delete_gallery(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create());
        $category = $this->category();
        $this->post(route('admin.photo-galleries.store'), $this->galleryData($category));
        $gallery = PhotoGallery::first();
        $oldList = $gallery->list_image;
        $oldInner = $gallery->inner_image;

        $this->get(route('admin.photo-galleries.edit', $gallery))->assertOk();

        // Update without images keeps the old files.
        $this->put(route('admin.photo-galleries.update', $gallery), ['category_id' => $category->id, 'name' => 'Renamed', 'status' => 1])
            ->assertRedirect(route('admin.photo-galleries.index'));
        $gallery->refresh();
        $this->assertSame('Renamed', $gallery->name);
        $this->assertSame([$oldList, $oldInner], [$gallery->list_image, $gallery->inner_image]);

        // A new list image replaces the old file.
        $this->put(route('admin.photo-galleries.update', $gallery), [
            'category_id' => $category->id, 'name' => 'Renamed', 'status' => 1,
            'list_image' => UploadedFile::fake()->image('new.webp'),
        ]);
        $gallery->refresh();
        $this->assertNotSame($oldList, $gallery->list_image);
        Storage::disk('public')->assertMissing($oldList);
        Storage::disk('public')->assertExists([$gallery->list_image, $oldInner]);

        $this->patch(route('admin.photo-galleries.status', $gallery));
        $this->assertFalse($gallery->fresh()->status);

        $this->delete(route('admin.photo-galleries.destroy', $gallery));
        $this->assertSoftDeleted('photo_galleries', ['id' => $gallery->id]);
    }
}
