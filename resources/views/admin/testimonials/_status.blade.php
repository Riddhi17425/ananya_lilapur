{{-- Active / inactive switch of the testimonials table (saved instantly, see index.blade.php) --}}
<form method="POST" action="{{ route('admin.testimonials.status', $testimonial) }}" class="js-status-form">
    @csrf
    @method('PATCH')
    <label class="switch" title="{{ $testimonial->status ? 'Active' : 'Inactive' }}">
        <input type="checkbox" @checked($testimonial->status) aria-label="Active">
        <span class="switch__slider"></span>
    </label>
</form>
