<?php

namespace Tests\Feature;

use App\Models\LearningStage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class LearningStageTest extends TestCase
{
    use RefreshDatabase;

    private function data(array $overrides = []): array
    {
        return array_merge([
            'tab_name' => 'Foundational',
            'kicker' => 'Foundational Stage',
            'heading' => 'First steps',
            'description' => '<p>Play and learn.</p>',
            'points' => "One\nTwo",
            'classes' => "Nursery\nJr. KG",
            'image' => UploadedFile::fake()->image('stage.jpg', 300, 300),
            'image_alt' => 'Children',
            'image_width' => 340,
            'image_arch' => 0,
            'badge' => '',
            'notify_button' => 0,
            'sort_order' => 1,
            'status' => 1,
        ], $overrides);
    }

    private function stage(array $overrides = []): LearningStage
    {
        return LearningStage::create(array_merge([
            'tab_name' => 'Primary', 'kicker' => 'Primary School', 'heading' => 'Connections',
            'description' => 'Curious minds.', 'image' => 'learning-stages/x.webp', 'sort_order' => 2,
        ], $overrides));
    }

    public function test_guests_cannot_access_learning_stages(): void
    {
        $this->get(route('admin.learning-stages.index'))->assertRedirect(route('login'));
    }

    public function test_admin_can_view_list_and_forms(): void
    {
        $this->actingAs(User::factory()->create());
        $stage = $this->stage();

        $this->get(route('admin.learning-stages.index'))->assertOk()->assertSee('stages-table');
        $this->getJson(route('admin.learning-stages.index', [
            'draw' => 1, 'start' => 0, 'length' => 10,
            'columns' => [['data' => 'tab_name', 'name' => 'tab_name', 'searchable' => 'true', 'orderable' => 'true']],
        ]), ['X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()->assertJsonPath('data.0.tab_name', 'Primary');
        $this->get(route('admin.learning-stages.create'))->assertOk();
        $this->get(route('admin.learning-stages.edit', $stage))->assertOk();
    }

    public function test_admin_can_create_with_image_and_validation_works(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create());

        $this->post(route('admin.learning-stages.store'), $this->data())
            ->assertRedirect(route('admin.learning-stages.index'));
        $stage = LearningStage::first();
        Storage::disk('public')->assertExists($stage->image);

        $this->post(route('admin.learning-stages.store'), $this->data(['tab_name' => '', 'image' => null, 'image_width' => 5]))
            ->assertSessionHasErrors(['tab_name', 'image', 'image_width']);
    }

    public function test_admin_can_update_toggle_and_soft_delete(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create());
        $stage = $this->stage();

        $this->put(route('admin.learning-stages.update', $stage), $this->data(['heading' => 'New heading', 'image' => null]))
            ->assertRedirect(route('admin.learning-stages.index'));
        $this->assertDatabaseHas('learning_stages', ['id' => $stage->id, 'heading' => 'New heading', 'image' => 'learning-stages/x.webp']);

        $this->patchJson(route('admin.learning-stages.status', $stage))->assertOk()->assertJson(['status' => false]);

        $this->delete(route('admin.learning-stages.destroy', $stage));
        $this->assertSoftDeleted('learning_stages', ['id' => $stage->id]);
    }

    public function test_academics_page_shows_active_stages_in_order(): void
    {
        $this->stage(['tab_name' => 'Second', 'heading' => 'Second heading', 'sort_order' => 2]);
        $this->stage(['tab_name' => 'First', 'heading' => 'First heading', 'sort_order' => 1]);
        $this->stage(['tab_name' => 'Hidden', 'heading' => 'Hidden heading', 'status' => 0]);

        $html = $this->get(route('academics'))->assertOk()->getContent();

        $this->assertStringContainsString('First heading', $html);
        $this->assertStringNotContainsString('Hidden heading', $html);
        $this->assertLessThan(strpos($html, 'Second heading'), strpos($html, 'First heading'));
    }
}
