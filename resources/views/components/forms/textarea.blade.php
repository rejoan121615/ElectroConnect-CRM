<div class="form-group">
    <label class=" mb-2 " for="{{ $name }}">{{ $label }}</label>
    <textarea class=" form-control " name="{{ $name }}" id="{{ $name }}" 
    cols="30" rows="10">{{ old('$name') }}</textarea>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
