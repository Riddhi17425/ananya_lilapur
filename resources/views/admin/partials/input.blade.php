{{--
    Form field with label and error message.
    Variables: $name, $label, $type (default text), $value, $autocomplete, $placeholder, $autofocus, $attrs (extra validation attributes)
--}}
@php($type = $type ?? 'text')

<div class="field">
    <label for="{{ $name }}">{{ $label }}</label>

    <div class="field__wrap">
        <input
            id="{{ $name }}"
            name="{{ $name }}"
            type="{{ $type }}"
            @if ($type !== 'password') value="{{ old($name, $value ?? '') }}" @endif
            @if (! empty($autocomplete)) autocomplete="{{ $autocomplete }}" @endif
            @if (! empty($placeholder)) placeholder="{{ $placeholder }}" @endif
            @if (! empty($autofocus)) autofocus @endif
            @class(['is-invalid' => $errors->has($name)])
            required
            {!! $attrs ?? "" !!}
        >

        {{-- Show / hide password button --}}
        @if ($type === 'password')
            <button type="button" class="field__toggle" data-toggle-password aria-label="Show password">
                <svg class="icon-eye" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/></svg>
                <svg class="icon-eye-off" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 3l18 18M10.6 6.1A9.8 9.8 0 0 1 12 5c6.5 0 10 7 10 7a17 17 0 0 1-3.2 4.2M6.6 6.7A17 17 0 0 0 2 12s3.5 7 10 7c1.7 0 3.2-.4 4.5-1M9.9 9.9a3 3 0 0 0 4.2 4.2"/></svg>
            </button>
        @endif
    </div>

    @error($name)
        <p class="field__error field__error--server" role="alert">{{ $message }}</p>
    @enderror
</div>
