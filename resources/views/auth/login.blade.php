@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center" style="height: 80vh">
        <div class="col-md-5 text-center" style="max-width: 450px">
            <div class="form-signin">
                <h1 class="h2 mb-3 fw-bold text-center">{{ __('Login') }}</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-floating">
                        <input type="email" name="email"
                            class="form-control rounded-top @error('email') is-invalid @enderror" id="email"
                            placeholder="name@example.com" value="{{ old('email') }}" required autocomplete="email"
                            autofocus>
                        <label for="email">Email address</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control rounded-bottom" id="password"
                            placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-secondary mt-4 fw-bold" type="submit">Login</button>
                </form>
                <small class="d-block mt-3">Not Registered? <a href="/register" class="link-secondary">Register
                        Now!</a></small>
            </div>
        </div>
    </div>
@endsection
