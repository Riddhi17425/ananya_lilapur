{{-- Shared by create and edit. Variable: $category (null on create) --}}
@php($category = $category ?? null)

<div class="field-row">
    <div class="field">
        <label for="category_name" class="is-required">Category name</label>
        <input id="category_name" name="category_name" type="text" value="{{ old('category_name', $category?->category_name) }}" maxlength="255" required @class(['is-invalid' => $errors->has('category_name')])>
        @error('category_name') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>

    <div class="field">
        <label for="status" class="is-required">Status</label>
        <select id="status" name="status" required @class(['is-invalid' => $errors->has('status')])>
            <option value="1" @selected((string) old('status', $category?->status ?? 1) === '1')>Active</option>
            <option value="0" @selected((string) old('status', $category?->status ?? 1) === '0')>Inactive</option>
        </select>
        @error('status') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn--small">Save</button>
    <a class="btn btn--small btn--outline" href="{{ route('admin.photo-gallery-categories.index') }}">Cancel</a>
</div>
