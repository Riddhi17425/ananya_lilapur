{{-- One field of the page form. Variables: $key, $field (definition), $content (App\Support\Content) --}}
@php
    $type = $field['type'];
    $name = ($type === 'image' ? 'image' : 'content').'['.$key.']';
    $errorKey = ($type === 'image' ? 'image.' : 'content.').$key;
    $id = 'f-'.$key;
@endphp

<div class="field">
    <label for="{{ $id }}">{{ $field['label'] }}</label>

    @if ($type === 'image')
        <input id="{{ $id }}" name="{{ $name }}" type="file" accept=".jpg,.jpeg,.png,.webp" data-rule-imagefile="true" @class(['is-invalid' => $errors->has($errorKey)])>
        <p class="field__hint">{{ $field['hint'] ?? 'JPG, PNG or WEBP, up to 2 MB. Choose a file only when you want to replace the image.' }}</p>
        <img class="preview" src="{{ $content->image($key) }}" alt="Current image">
        @if ($content->isUploaded($key))
            <label class="check pc-reset-image"><input type="checkbox" name="reset_image[{{ $key }}]" value="1"> Use the original image again</label>
        @endif
    @elseif ($type === 'text')
        <input id="{{ $id }}" name="{{ $name }}" type="text" value="{{ old('content.'.$key, $content->raw($key)) }}" maxlength="1000" @class(['is-invalid' => $errors->has($errorKey)])>
    @elseif ($type === 'html')
        <textarea id="{{ $id }}" name="{{ $name }}" rows="5" class="js-editor" @class(['is-invalid' => $errors->has($errorKey)])>{{ old('content.'.$key, $content->raw($key)) }}</textarea>
    @else
        {{-- textarea and title --}}
        <textarea id="{{ $id }}" name="{{ $name }}" rows="{{ $type === 'title' ? 2 : 4 }}" @class(['is-invalid' => $errors->has($errorKey)])>{{ old('content.'.$key, $content->raw($key)) }}</textarea>
        @if ($type === 'title')
            <p class="field__hint">{{ $field['hint'] ?? 'Put *stars* around the words that should be highlighted. A new line starts a new line in the heading.' }}</p>
        @endif
    @endif

    @if ($type !== 'image' && $type !== 'title' && ! empty($field['hint']))
        <p class="field__hint">{{ $field['hint'] }}</p>
    @endif

    @error($errorKey) <p class="field__error field__error--server" role="alert">{{ $message }}</p> @enderror
</div>
