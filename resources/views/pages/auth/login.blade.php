@extends('layouts.form', ['title' => 'Log in', 'des' => 'Log in with your Email and password'])


@section('form')
    <form action="{{ route('auth') }}" method="POST">
        @csrf
        @method('post')
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-lg  @error('email') is-invalid @enderror"
                placeholder="Username" name="email" value="{{ old('email') }}" />
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
            @error('email')
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
        <div class="form-check form-check d-flex align-items-end">
            <input class="form-check-input me-2" type="checkbox" name="remember" {{old('remember') ? 'checked' : ''}}  id="remember" />
            <label class="form-check-label text-gray-600" for="remember">
                Keep me logged in
            </label>
        </div>
        <button class="btn btn-primary btn-block btn shadow mt-4">
            Log in
        </button>
    </form>
    <div class="text-center mt-5 ">
        <p class="text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-bold">Sign up</a>.
        </p>
        <p>
            <a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.
        </p>
    </div>
@endsection



