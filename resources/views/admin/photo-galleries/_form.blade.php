{{-- Shared by create and edit. Variables: $categories, $gallery (null on create) --}}
@php($gallery = $gallery ?? null)

<div class="field-row">
    <div class="field">
        <label for="category_id" class="is-required">Category</label>
        <select id="category_id" name="category_id" required @class(['is-invalid' => $errors->has('category_id')])>
            <option value="">Select a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected((string) old('category_id', $gallery?->category_id) === (string) $category->id)>{{ $category->category_name }}{{ $category->status ? '' : ' (inactive)' }}</option>
            @endforeach
        </select>
        @error('category_id') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>

    <div class="field">
        <label for="name" class="is-required">Name</label>
        <input id="name" name="name" type="text" value="{{ old('name', $gallery?->name) }}" maxlength="255" required @class(['is-invalid' => $errors->has('name')])>
        @error('name') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>
</div>

<p class="field__hint" style="margin:-4px 0 14px">Upload at least one image. A photo with a list image appears on the home page slider; a photo with an inner image appears on the News &amp; Gallery page. Upload both to show it on both pages.</p>

<div class="field-row">
    <div class="field">
        <label for="list_image">List image</label>
        <input id="list_image" name="list_image" type="file" accept=".jpg,.jpeg,.png,.webp" data-rule-imagefile="true" @if (! $gallery) data-rule-requiredwithout="#inner_image" @endif @class(['is-invalid' => $errors->has('list_image')])>
        <p class="field__hint">Shown on the home page slider (Life at Ananya). JPG, PNG or WEBP, up to 2 MB.</p>
        @if ($gallery?->list_image)
            <img class="preview" src="{{ $gallery->listImageUrl() }}" alt="Current list image">
        @endif
        @error('list_image') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>

    <div class="field">
        <label for="inner_image">Inner image</label>
        <input id="inner_image" name="inner_image" type="file" accept=".jpg,.jpeg,.png,.webp" data-rule-imagefile="true" @if (! $gallery) data-rule-requiredwithout="#list_image" @endif @class(['is-invalid' => $errors->has('inner_image')])>
        <p class="field__hint">Shown on the News &amp; Gallery page (Life on Campus). JPG, PNG or WEBP, up to 2 MB.</p>
        @if ($gallery?->inner_image)
            <img class="preview" src="{{ $gallery->innerImageUrl() }}" alt="Current inner image">
        @endif
        @error('inner_image') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>
</div>

<div class="field-row">
    <div class="field">
        <label for="status" class="is-required">Status</label>
        <select id="status" name="status" required @class(['is-invalid' => $errors->has('status')])>
            <option value="1" @selected((string) old('status', $gallery?->status ?? 1) === '1')>Active</option>
            <option value="0" @selected((string) old('status', $gallery?->status ?? 1) === '0')>Inactive</option>
        </select>
        @error('status') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn--small">Save</button>
    <a class="btn btn--small btn--outline" href="{{ route('admin.photo-galleries.index') }}">Cancel</a>
</div>
