{{-- Shared by create and edit. Variable: $stage (null on create) --}}
@php($stage = $stage ?? null)

<div class="field-row">
    <div class="field">
        <label for="tab_name" class="is-required">Tab name</label>
        <input id="tab_name" name="tab_name" type="text" value="{{ old('tab_name', $stage?->tab_name) }}" maxlength="100" placeholder="e.g. Foundational" required @class(['is-invalid' => $errors->has('tab_name')])>
        @error('tab_name') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>

    <div class="field">
        <label for="kicker" class="is-required">Label above the heading</label>
        <input id="kicker" name="kicker" type="text" value="{{ old('kicker', $stage?->kicker) }}" maxlength="255" placeholder="e.g. Foundational Stage · Play School to Class 2" required @class(['is-invalid' => $errors->has('kicker')])>
        @error('kicker') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>
</div>

<div class="field">
    <label for="heading" class="is-required">Heading</label>
    <input id="heading" name="heading" type="text" value="{{ old('heading', $stage?->heading) }}" maxlength="255" required @class(['is-invalid' => $errors->has('heading')])>
    @error('heading') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
</div>

<div class="field">
    <label for="description" class="is-required">Description</label>
    <textarea id="description" name="description" rows="5" class="js-editor" @class(['is-invalid' => $errors->has('description')])>{{ old('description', $stage?->description) }}</textarea>
    @error('description') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
</div>

<div class="field-row">
    <div class="field">
        <label for="points">Tick points</label>
        <textarea id="points" name="points" rows="5" maxlength="2000" @class(['is-invalid' => $errors->has('points')])>{{ old('points', $stage?->points) }}</textarea>
        <p class="field__hint">One point per line. Leave empty for none.</p>
        @error('points') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>

    <div class="field">
        <label for="classes">Classes</label>
        <textarea id="classes" name="classes" rows="5" maxlength="1000" @class(['is-invalid' => $errors->has('classes')])>{{ old('classes', $stage?->classes) }}</textarea>
        <p class="field__hint">One class per line, shown as small chips. Leave empty for none.</p>
        @error('classes') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>
</div>

<div class="field-row">
    <div class="field">
        <label for="image" @class(['is-required' => ! $stage])>Image</label>
        <input id="image" name="image" type="file" accept=".jpg,.jpeg,.png,.webp" data-rule-imagefile="true" @required(! $stage) @class(['is-invalid' => $errors->has('image')])>
        <p class="field__hint">JPG, PNG or WEBP, up to 2 MB.</p>
        @if ($stage)
            <img class="preview" src="{{ $stage->imageUrl() }}" alt="Current image">
        @endif
        @error('image') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>

    <div class="field">
        <label for="image_alt">Image description (alt text)</label>
        <input id="image_alt" name="image_alt" type="text" value="{{ old('image_alt', $stage?->image_alt) }}" maxlength="255" @class(['is-invalid' => $errors->has('image_alt')])>
        <p class="field__hint">Describes the picture for screen readers.</p>
        @error('image_alt') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>
</div>

<div class="field-row">
    <div class="field">
        <label for="image_width" class="is-required">Image width (px)</label>
        <input id="image_width" name="image_width" type="number" min="100" max="600" value="{{ old('image_width', $stage?->image_width ?? 340) }}" required @class(['is-invalid' => $errors->has('image_width')])>
        @error('image_width') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>

    <div class="field">
        <label for="image_arch" class="is-required">Arch-shaped image</label>
        <select id="image_arch" name="image_arch" required @class(['is-invalid' => $errors->has('image_arch')])>
            <option value="0" @selected((string) old('image_arch', (int) ($stage?->image_arch ?? 0)) === '0')>No</option>
            <option value="1" @selected((string) old('image_arch', (int) ($stage?->image_arch ?? 0)) === '1')>Yes</option>
        </select>
        @error('image_arch') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>
</div>

<div class="field-row">
    <div class="field">
        <label for="badge">Badge</label>
        <input id="badge" name="badge" type="text" value="{{ old('badge', $stage?->badge) }}" maxlength="100" placeholder="e.g. Coming soon" @class(['is-invalid' => $errors->has('badge')])>
        <p class="field__hint">Small label shown above the heading. Leave empty for none.</p>
        @error('badge') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>

    <div class="field">
        <label for="notify_button" class="is-required">"Notify Me When Available" button</label>
        <select id="notify_button" name="notify_button" required @class(['is-invalid' => $errors->has('notify_button')])>
            <option value="0" @selected((string) old('notify_button', (int) ($stage?->notify_button ?? 0)) === '0')>Hide</option>
            <option value="1" @selected((string) old('notify_button', (int) ($stage?->notify_button ?? 0)) === '1')>Show</option>
        </select>
        @error('notify_button') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>
</div>

<div class="field-row">
    <div class="field">
        <label for="sort_order" class="is-required">Display order</label>
        <input id="sort_order" name="sort_order" type="number" min="0" max="9999" value="{{ old('sort_order', $stage?->sort_order ?? 0) }}" required @class(['is-invalid' => $errors->has('sort_order')])>
        <p class="field__hint">Tabs are shown from the lowest number to the highest. The first one opens by default.</p>
        @error('sort_order') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>

    <div class="field">
        <label for="status" class="is-required">Status</label>
        <select id="status" name="status" required @class(['is-invalid' => $errors->has('status')])>
            <option value="1" @selected((string) old('status', (int) ($stage?->status ?? 1)) === '1')>Active</option>
            <option value="0" @selected((string) old('status', (int) ($stage?->status ?? 1)) === '0')>Inactive</option>
        </select>
        @error('status') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn--small">Save</button>
    <a class="btn btn--small btn--outline" href="{{ route('admin.learning-stages.index') }}">Cancel</a>
</div>
