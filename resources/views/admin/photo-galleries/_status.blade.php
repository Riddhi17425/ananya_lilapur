{{-- Active / inactive switch of the photo galleries table (saved instantly, see index.blade.php) --}}
<form method="POST" action="{{ route('admin.photo-galleries.status', $gallery) }}" class="js-status-form">
    @csrf
    @method('PATCH')
    <label class="switch" title="{{ $gallery->status ? 'Active' : 'Inactive' }}">
        <input type="checkbox" @checked($gallery->status) aria-label="Active">
        <span class="switch__slider"></span>
    </label>
</form>
