{{-- Active / inactive switch of the categories table (saved instantly, see index.blade.php) --}}
<form method="POST" action="{{ route('admin.photo-gallery-categories.status', $category) }}" class="js-status-form">
    @csrf
    @method('PATCH')
    <label class="switch" title="{{ $category->status ? 'Active' : 'Inactive' }}">
        <input type="checkbox" @checked($category->status) aria-label="Active">
        <span class="switch__slider"></span>
    </label>
</form>
