<?php

namespace Tests\Feature;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FaqTest extends TestCase
{
    use RefreshDatabase;

    private function data(array $overrides = []): array
    {
        return array_merge([
            'question' => 'When do admissions open?',
            'answer' => '<p>Admissions open in <b>April</b>.</p>',
            'status' => 1,
        ], $overrides);
    }

    public function test_guests_cannot_access_faqs(): void
    {
        $this->get(route('admin.faqs.index'))->assertRedirect(route('login'));
        $this->post(route('admin.faqs.store'), $this->data())->assertRedirect(route('login'));
    }

    public function test_admin_can_view_list_and_forms(): void
    {
        $this->actingAs(User::factory()->create());
        $faq = Faq::create($this->data());

        $this->get(route('admin.faqs.index'))->assertOk()->assertSee('faqs-table');
        $this->getJson(route('admin.faqs.index', [
            'draw' => 1, 'start' => 0, 'length' => 10,
            'columns' => [['data' => 'question', 'name' => 'question', 'searchable' => 'true', 'orderable' => 'true']],
        ]), ['X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()
            ->assertJsonPath('recordsTotal', 1)
            ->assertJsonPath('data.0.question', 'When do admissions open?');
        $this->get(route('admin.faqs.create'))->assertOk();
        $this->get(route('admin.faqs.edit', $faq))->assertOk();
    }

    public function test_admin_can_create_faq_and_answer_is_sanitized(): void
    {
        $this->actingAs(User::factory()->create());

        $this->post(route('admin.faqs.store'), $this->data(['answer' => '<p onclick="x()">Hi</p><script>alert(1)</script>']))
            ->assertRedirect(route('admin.faqs.index'));

        $faq = Faq::first();
        $this->assertStringNotContainsString('script', $faq->answer);
        $this->assertStringNotContainsString('onclick', $faq->answer);
        $this->assertStringContainsString('Hi', $faq->answer);
    }

    public function test_validation_rules(): void
    {
        $this->actingAs(User::factory()->create());

        $this->post(route('admin.faqs.store'), $this->data(['question' => '', 'answer' => '<p><br></p>', 'status' => 2]))
            ->assertSessionHasErrors(['question', 'answer', 'status']);
    }

    public function test_admin_can_update_toggle_and_soft_delete(): void
    {
        $this->actingAs(User::factory()->create());
        $faq = Faq::create($this->data());

        $this->put(route('admin.faqs.update', $faq), $this->data(['question' => 'New question?']))
            ->assertRedirect(route('admin.faqs.index'));
        $this->assertDatabaseHas('faqs', ['id' => $faq->id, 'question' => 'New question?']);

        $this->patchJson(route('admin.faqs.status', $faq))->assertOk()->assertJson(['status' => false]);

        $this->delete(route('admin.faqs.destroy', $faq));
        $this->assertSoftDeleted('faqs', ['id' => $faq->id]);
    }
}
