{{-- Active / inactive switch of the FAQs table (saved instantly, see index.blade.php) --}}
<form method="POST" action="{{ route('admin.faqs.status', $faq) }}" class="js-status-form">
    @csrf
    @method('PATCH')
    <label class="switch" title="{{ $faq->status ? 'Active' : 'Inactive' }}">
        <input type="checkbox" @checked($faq->status) aria-label="Active">
        <span class="switch__slider"></span>
    </label>
</form>
