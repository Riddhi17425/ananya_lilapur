{{-- Shared by create and edit. Variable: $testimonial (null on create) --}}
@php($testimonial = $testimonial ?? null)

<div class="field-row">
<div class="field">
    <label for="name" class="is-required">Name</label>
    <input id="name" name="name" type="text" value="{{ old('name', $testimonial?->name) }}" maxlength="255" required @class(['is-invalid' => $errors->has('name')])>
    @error('name') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
</div>

<div class="field">
    <label for="reviewer_category">Reviewer category</label>
    <input id="reviewer_category" name="reviewer_category" type="text" list="category-list" value="{{ old('reviewer_category', $testimonial?->reviewer_category) }}" maxlength="100" placeholder="e.g. Parent" @class(['is-invalid' => $errors->has('reviewer_category')])>
    <datalist id="category-list">
        @foreach (\App\Models\Testimonial::CATEGORIES as $category)
            <option value="{{ $category }}">
        @endforeach
    </datalist>
    @error('reviewer_category') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
</div>
</div>

<div class="field">
    <label for="description" class="is-required">Description</label>
    <textarea id="description" name="description" rows="5" class="js-editor" @class(['is-invalid' => $errors->has('description')])>{{ old('description', $testimonial?->description) }}</textarea>
    @error('description') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
</div>

<div class="field-row">
    <div class="field">
        <label for="star" class="is-required">Stars</label>
        <select id="star" name="star" required @class(['is-invalid' => $errors->has('star')])>
            @foreach (range(5, 1) as $star)
                <option value="{{ $star }}" @selected((int) old('star', $testimonial?->star ?? 5) === $star)>{{ $star }} {{ $star === 1 ? 'star' : 'stars' }}</option>
            @endforeach
        </select>
        @error('star') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>

    <div class="field">
        <label for="status" class="is-required">Status</label>
        <select id="status" name="status" required @class(['is-invalid' => $errors->has('status')])>
            <option value="1" @selected((string) old('status', $testimonial?->status ?? 1) === '1')>Active</option>
            <option value="0" @selected((string) old('status', $testimonial?->status ?? 1) === '0')>Inactive</option>
        </select>
        @error('status') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn--small">Save</button>
    <a class="btn btn--small btn--outline" href="{{ route('admin.testimonials.index') }}">Cancel</a>
</div>
