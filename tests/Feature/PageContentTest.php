<?php

namespace Tests\Feature;

use App\Models\PageContent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PageContentTest extends TestCase
{
    use RefreshDatabase;

    // The Contact page is used for the tests: hero_title (title), hero_text (textarea), hero_image (image).

    public function test_guests_cannot_open_pages_content(): void
    {
        $this->get(route('admin.page-content.index'))->assertRedirect(route('login'));
        $this->put(route('admin.page-content.update', 'contact'), [])->assertRedirect(route('login'));
    }

    public function test_admin_sees_all_pages_and_the_edit_form(): void
    {
        $this->actingAs(User::factory()->create());

        $this->get(route('admin.page-content.index'))->assertOk()
            ->assertSee('Home Page')->assertSee('About Us')->assertSee('Academics')->assertSee('Beyond Academics')
            ->assertSee('Campus and Facilities')->assertSee('Admissions')->assertSee('Career')->assertSee('Contact Us')->assertSee('News and Gallery');

        foreach (array_keys(\App\Support\Content::PAGES) as $page) {
            $this->get(route('admin.page-content.edit', $page))->assertOk();
        }
        $this->get(route('admin.page-content.edit', 'unknown'))->assertNotFound();
    }

    public function test_every_page_renders_with_its_original_content(): void
    {
        foreach (\App\Support\Content::PAGES as $info) {
            $this->get(route($info['route']))->assertOk();
        }
    }

    public function test_saved_text_is_shown_on_the_website_and_original_text_is_not_stored(): void
    {
        $this->actingAs(User::factory()->create());
        $original = config('page_content.contact.Hero.hero_text.default');

        $this->put(route('admin.page-content.update', 'contact'), ['content' => ['hero_title' => 'Say *hello* to us', 'hero_text' => $original]])
            ->assertRedirect(route('admin.page-content.edit', 'contact'));

        $this->assertDatabaseHas('page_contents', ['page' => 'contact', 'field_key' => 'hero_title']);
        $this->assertDatabaseMissing('page_contents', ['page' => 'contact', 'field_key' => 'hero_text']);
        $this->get(route('contact'))->assertOk()->assertSee('Say <span class="accent">hello</span> to us', false);
    }

    public function test_page_title_is_escaped_only_once(): void
    {
        $this->actingAs(User::factory()->create());

        $this->put(route('admin.page-content.update', 'contact'), ['content' => ['seo_title' => 'Tom & Jerry']]);

        $this->get(route('contact'))->assertSee('<title>Tom &amp; Jerry', false)->assertDontSee('&amp;amp;', false);
    }

    public function test_text_is_escaped_and_too_long_text_is_rejected(): void
    {
        $this->actingAs(User::factory()->create());

        $this->put(route('admin.page-content.update', 'contact'), ['content' => ['hero_text' => '<script>alert(1)</script>']]);
        $this->get(route('contact'))->assertDontSee('<script>alert(1)</script>', false)->assertSee('&lt;script&gt;', false);

        $this->put(route('admin.page-content.update', 'contact'), ['content' => ['seo_title' => str_repeat('a', 1001)]])
            ->assertSessionHasErrors('content.seo_title');
    }

    public function test_image_can_be_replaced_and_restored(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create());

        $this->put(route('admin.page-content.update', 'contact'), ['image' => ['hero_image' => UploadedFile::fake()->image('new.jpg', 300, 300)]]);
        $path = PageContent::where(['page' => 'contact', 'field_key' => 'hero_image'])->value('value');
        Storage::disk('public')->assertExists($path);
        $this->get(route('contact'))->assertSee('storage/'.$path, false);

        $this->put(route('admin.page-content.update', 'contact'), ['reset_image' => ['hero_image' => 1]]);
        Storage::disk('public')->assertMissing($path);
        $this->assertDatabaseMissing('page_contents', ['field_key' => 'hero_image']);

        $this->put(route('admin.page-content.update', 'contact'), ['image' => ['hero_image' => UploadedFile::fake()->create('x.pdf', 10)]])
            ->assertSessionHasErrors('image.hero_image');
    }

    public function test_page_can_be_restored_to_the_original_content(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create());
        $this->put(route('admin.page-content.update', 'contact'), [
            'content' => ['hero_title' => 'Changed'],
            'image' => ['hero_image' => UploadedFile::fake()->image('new.jpg')],
        ]);
        $this->assertDatabaseCount('page_contents', 2);

        $this->delete(route('admin.page-content.destroy', 'contact'))->assertRedirect(route('admin.page-content.edit', 'contact'));

        $this->assertDatabaseCount('page_contents', 0);
        $this->get(route('contact'))->assertDontSee('Changed');
    }
}
