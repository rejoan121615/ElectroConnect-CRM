@extends('layouts.form', ['title' => 'Register', 'des' => 'Input your data to register to our website.'])

@section('form')
    <form action="{{ route('store') }}" method="POST">
        @csrf
        @method('post')
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror "
                placeholder="Email" name="email" value="{{ old('email') }}" />
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
            @error('email')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                </div>
                {{ $message }}
            @enderror

        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-lg  @error('username') is-invalid @enderror"
                placeholder="Username" name="username" value="{{ old('username') }}" />
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
            @error('username')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                </div>
                {{ $message }}
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-lg  @error('password') is-invalid @enderror"
                placeholder="Password" name="password" value="{{ old('password') }}" />
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
            @error('password')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                </div>
                {{ $message }}
            @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-lg  @error('password') is-invalid @enderror"
                placeholder="Confirm Password" name="password_confirmation" value="{{ old('password_confirmation') }}" />
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
            @error('password')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                </div>
                {{ $message }}
            @enderror
            {{-- <input type="password"
                                class="form-control form-control-lg  @error('password_confirmation') is-invalid @enderror"
                                placeholder="Confirm Password" name="password_confirmation"
                                value="{{ old('password_confirmation') }}" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror --}}
        </div>
        <button class="btn btn-primary btn-block btn shadow-lg">
            Sign Up
        </button>
    </form>
    <div class="text-center mt-5 ">
        <p class="text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="font-bold">Log in</a>.
        </p>
    </div>
@endsection
