{{-- Shared by create and edit. Variable: $faq (null on create) --}}
@php($faq = $faq ?? null)

<div class="field">
    <label for="question" class="is-required">Question</label>
    <input id="question" name="question" type="text" value="{{ old('question', $faq?->question) }}" maxlength="255" required @class(['is-invalid' => $errors->has('question')])>
    @error('question') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
</div>

<div class="field">
    <label for="answer" class="is-required">Answer</label>
    <textarea id="answer" name="answer" rows="5" class="js-editor" @class(['is-invalid' => $errors->has('answer')])>{{ old('answer', $faq?->answer) }}</textarea>
    @error('answer') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
</div>

<div class="field">
    <label for="status" class="is-required">Status</label>
    <select id="status" name="status" required @class(['is-invalid' => $errors->has('status')])>
        <option value="1" @selected((string) old('status', $faq?->status ?? 1) === '1')>Active</option>
        <option value="0" @selected((string) old('status', $faq?->status ?? 1) === '0')>Inactive</option>
    </select>
    @error('status') <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
</div>

<div class="form-actions">
    <button type="submit" class="btn btn--small">Save</button>
    <a class="btn btn--small btn--outline" href="{{ route('admin.faqs.index') }}">Cancel</a>
</div>
