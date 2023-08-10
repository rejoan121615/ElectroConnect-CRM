@php
    $decodedOptions = json_decode($options, true);
@endphp

<div class="form-group">
    <label class="mb-2" for="{{ $name }}">{{ $label }}</label>
    <select class="form-select @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}">
        <option value="">Choose your options</option>
        @foreach ($decodedOptions as $value => $vLabel)
            <option value="{{ $value }}" {{ $value == old('$name') ? 'selected' : '' }}>
                {{ $vLabel }}
            </option>
        @endforeach
    </select>
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

