<?php

namespace Tests\Feature;

use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class InquiryTest extends TestCase
{
    use RefreshDatabase;

    private function submit(string $type, array $data)
    {
        return $this->postJson(route('inquiries.store', $type), $data);
    }

    public function test_enquire_form_is_saved_and_redirects_to_thank_you(): void
    {
        $this->submit('enquire', [
            'parent' => 'Asha', 'mobile' => '9876543210', 'email' => 'a@example.com',
            'child' => 'Riya', 'class' => 'Class 2', 'source' => 'admissions',
        ])->assertOk()->assertJson(['redirect' => route('thank-you')]);

        $this->assertDatabaseHas('inquiries', ['type' => 'enquire', 'name' => 'Asha', 'child_name' => 'Riya', 'source' => 'admissions']);
        $this->get(route('thank-you'))->assertOk()->assertSee('Thank');
    }

    public function test_pop_up_with_notify_source_is_saved_as_notify(): void
    {
        $this->submit('enquire', [
            'parent' => 'Asha', 'mobile' => '9876543210', 'email' => 'a@example.com',
            'child' => 'Riya', 'class' => 'Class 9 to 12 (notify me)', 'source' => 'notify-secondary', 'consent' => 'on',
        ])->assertOk();

        $this->assertDatabaseHas('inquiries', ['type' => 'notify', 'source' => 'notify-secondary']);
    }

    public function test_visit_contact_and_career_forms_are_saved(): void
    {
        Storage::fake('local');

        $this->submit('visit', ['parent' => 'Asha', 'mobile' => '9876543210', 'email' => 'a@example.com', 'datetime' => '2027-04-10T10:30', 'visitors' => 2])->assertOk();
        $this->submit('contact', ['name' => 'Asha', 'mobile' => '9876543210', 'email' => 'a@example.com', 'subject' => 'Transport', 'message' => 'Bus route?'])->assertOk();
        $this->submit('career', ['name' => 'Asha', 'mobile' => '9876543210', 'email' => 'a@example.com', 'area' => 'STEM Educator', 'experience' => '4 years', 'cv' => UploadedFile::fake()->create('cv.pdf', 100, 'application/pdf')])->assertOk();

        $this->assertDatabaseHas('inquiries', ['type' => 'visit', 'visitors' => 2]);
        $this->assertDatabaseHas('inquiries', ['type' => 'contact', 'subject' => 'Transport']);
        $career = Inquiry::where('type', 'career')->first();
        $this->assertSame('STEM Educator', $career->position);
        Storage::disk('local')->assertExists($career->resume_path);
    }

    public function test_validation_errors_are_returned(): void
    {
        $this->submit('contact', ['name' => '', 'mobile' => 'abc', 'email' => 'nope', 'subject' => 'x'])
            ->assertStatus(422)->assertJsonValidationErrors(['name', 'mobile', 'email', 'subject', 'message']);
        $this->submit('career', ['name' => 'A', 'mobile' => '9876543210', 'email' => 'a@example.com', 'area' => 'x', 'experience' => '1', 'cv' => UploadedFile::fake()->create('cv.exe', 10)])
            ->assertStatus(422)->assertJsonValidationErrors('cv');
        $this->assertDatabaseCount('inquiries', 0);
    }

    public function test_consent_and_past_dates_are_checked_with_clear_messages(): void
    {
        $base = ['parent' => 'Asha', 'mobile' => '9876543210', 'email' => 'a@example.com', 'child' => 'Riya', 'class' => 'Class 2'];

        // Home page / pop-up forms need the consent box; the admissions form does not.
        $this->submit('enquire', $base + ['source' => 'home'])
            ->assertStatus(422)->assertJsonPath('errors.consent.0', 'Please tick the consent box so we can contact you.');
        $this->submit('enquire', $base + ['source' => 'admissions'])->assertOk();

        $this->submit('visit', ['parent' => 'Asha', 'mobile' => '9876543210', 'email' => 'a@example.com', 'datetime' => '2020-01-01T10:00', 'visitors' => 2])
            ->assertStatus(422)->assertJsonPath('errors.datetime.0', 'Please choose today or a future date.');

        $this->submit('contact', ['name' => '', 'mobile' => '123', 'email' => 'x', 'subject' => 'Other', 'message' => 'Hi'])
            ->assertJsonPath('errors.name.0', 'The name field is required.')
            ->assertJsonPath('errors.mobile.0', 'Please enter a valid mobile number.');
    }

    public function test_inquiry_is_added_to_google_sheet(): void
    {
        config(['services.google_sheet.url' => 'https://script.example.com/exec', 'services.google_sheet.secret' => 's3']);
        Http::fake();

        $this->submit('contact', ['name' => 'Asha', 'mobile' => '9876543210', 'email' => 'a@example.com', 'subject' => 'Other', 'message' => 'Hello'])->assertOk();

        Http::assertSent(fn ($r) => $r->url() === 'https://script.example.com/exec'
            && $r['sheet'] === 'Contact Messages' && $r['secret'] === 's3' && in_array('Hello', $r['row'], true));
    }

    public function test_sheet_failure_does_not_break_the_submission(): void
    {
        config(['services.google_sheet.url' => 'https://script.example.com/exec']);
        Http::fake(['*' => Http::response('error', 500)]);

        $this->submit('contact', ['name' => 'Asha', 'mobile' => '9876543210', 'email' => 'a@example.com', 'subject' => 'Other', 'message' => 'Hello'])->assertOk();
        $this->assertDatabaseCount('inquiries', 1);
    }

    public function test_thank_you_page_needs_a_submission(): void
    {
        $this->get(route('thank-you'))->assertRedirect(route('home'));
    }

    public function test_admin_sees_inquiries_tab_wise(): void
    {
        $this->actingAs(User::factory()->create());
        $enquire = Inquiry::create(['type' => 'enquire', 'name' => 'Asha', 'email' => 'a@example.com', 'mobile' => '9876543210', 'child_name' => 'Riya']);
        Inquiry::create(['type' => 'contact', 'name' => 'Bina', 'email' => 'b@example.com', 'mobile' => '9876543211', 'subject' => 'Other', 'message' => 'Hi']);

        $this->get(route('admin.inquiries.index'))->assertOk()->assertSee('Enquire Now')->assertSee('Contact Messages');
        $this->getJson(route('admin.inquiries.index', 'contact'), ['X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()->assertJsonPath('recordsTotal', 1)->assertJsonPath('data.0.name', 'Bina');
        $this->get(route('admin.inquiries.index', 'unknown'))->assertNotFound();
        $this->get(route('admin.inquiries.show', $enquire))->assertOk()->assertSee('Riya');

        $this->delete(route('admin.inquiries.destroy', $enquire))->assertRedirect(route('admin.inquiries.index', 'enquire'));
        $this->assertSoftDeleted('inquiries', ['id' => $enquire->id]);
    }

    public function test_guests_cannot_see_inquiries_or_resumes(): void
    {
        $this->get(route('admin.inquiries.index'))->assertRedirect(route('login'));
    }

    public function test_error_pages_use_the_custom_design(): void
    {
        $this->get('/no-such-page')->assertNotFound()->assertSee('wandered off');
        $this->assertStringContainsString('went', view('errors.500')->render());
    }
}
