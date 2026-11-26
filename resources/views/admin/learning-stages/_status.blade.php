{{-- Active / inactive switch of the learning stages table (saved instantly, see index.blade.php) --}}
<form method="POST" action="{{ route('admin.learning-stages.status', $stage) }}" class="js-status-form">
    @csrf
    @method('PATCH')
    <label class="switch" title="{{ $stage->status ? 'Active' : 'Inactive' }}">
        <input type="checkbox" @checked($stage->status) aria-label="Active">
        <span class="switch__slider"></span>
    </label>
</form>
