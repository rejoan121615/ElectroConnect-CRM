<div class="form-group">
    <label class=" mb-2 " for="{{ $name }}">{{ $label }}</label>
    <input type="{{ isset($type) ? $type : 'text' }}" id="{{ $name }} "
        class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
        placeholder="{{ isset($placeholder) ? $placeholder : '' }}" value="{{ (old($name) !== null) ? old($name) : (isset($value) ? $value : '') }}">
    @error($name)
        <div class="invalid-feedback">
            @if (isset($error))
                {{ $error }}
            @else
                {{ $message }}
            @endif
        </div>
    @enderror
</div>
