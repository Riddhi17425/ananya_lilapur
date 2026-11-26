<?php

namespace Tests\Feature;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestimonialTest extends TestCase
{
    use RefreshDatabase;

    private function data(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Asha Patel',
            'description' => 'A wonderful school.',
            'star' => 5,
            'reviewer_category' => 'Parent',
            'status' => 1,
        ], $overrides);
    }

    public function test_guests_cannot_access_testimonials(): void
    {
        $this->get(route('admin.testimonials.index'))->assertRedirect(route('login'));
        $this->post(route('admin.testimonials.store'), $this->data())->assertRedirect(route('login'));
    }

    public function test_admin_can_view_list_and_forms(): void
    {
        $this->actingAs(User::factory()->create());
        $testimonial = Testimonial::create($this->data());

        $this->get(route('admin.testimonials.index'))->assertOk()->assertSee('testimonials-table');

        // DataTables loads the rows with an ajax request.
        $this->getJson(route('admin.testimonials.index', [
            'draw' => 1, 'start' => 0, 'length' => 10,
            'search' => ['value' => 'Asha'],
            'columns' => [['data' => 'name', 'name' => 'name', 'searchable' => 'true', 'orderable' => 'true']],
        ]), ['X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()
            ->assertJsonPath('recordsTotal', 1)
            ->assertJsonPath('data.0.name', 'Asha Patel');
        $this->get(route('admin.testimonials.create'))->assertOk();
        $this->get(route('admin.testimonials.edit', $testimonial))->assertOk();
    }

    public function test_admin_can_create_testimonial(): void
    {
        $this->actingAs(User::factory()->create());

        $this->post(route('admin.testimonials.store'), $this->data())
            ->assertRedirect(route('admin.testimonials.index'));

        $this->assertDatabaseHas('testimonials', ['name' => 'Asha Patel', 'star' => 5, 'status' => 1]);
    }

    public function test_validation_rules(): void
    {
        $this->actingAs(User::factory()->create());

        $this->post(route('admin.testimonials.store'), $this->data(['name' => '', 'star' => 6, 'status' => 2]))
            ->assertSessionHasErrors(['name', 'star', 'status']);
    }

    public function test_admin_can_update_toggle_and_soft_delete(): void
    {
        $this->actingAs(User::factory()->create());
        $testimonial = Testimonial::create($this->data());

        $this->put(route('admin.testimonials.update', $testimonial), $this->data(['name' => 'New Name', 'star' => 4]))
            ->assertRedirect(route('admin.testimonials.index'));
        $this->assertDatabaseHas('testimonials', ['id' => $testimonial->id, 'name' => 'New Name', 'star' => 4]);

        $this->patch(route('admin.testimonials.status', $testimonial));
        $this->assertFalse($testimonial->fresh()->status);

        $this->delete(route('admin.testimonials.destroy', $testimonial));
        $this->assertSoftDeleted('testimonials', ['id' => $testimonial->id]);
    }
}
