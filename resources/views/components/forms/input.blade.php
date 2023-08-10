<div class="form-group">
    <label class=" mb-2 " for="{{ $name }}">{{ $label }}</label>
    <input type="{{ isset($type) ? $type : 'text'}}" id="{{ $name }} " class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
        placeholder="{{ isset($placeholder) ? $placeholder : '' }}" value="{{ old($name) }}">
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
