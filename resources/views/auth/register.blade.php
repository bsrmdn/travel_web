@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center" style="height: 80vh">
        <div class="col-md-5" style="max-width: 450px">
            <div class="form-signin">
                <h1 class="h2 mb-3 fw-bold text-center">{{ __('Register') }}</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-floating">
                        <input type="name" name="name"
                            class="form-control rounded-top @error('name') is-invalid @enderror" id="name"
                            placeholder="name@example.com" value="{{ old('name') }}" required autofocus>
                        <label for="name">Name</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                        <label for="email">Email address</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required placeholder="Password">
                        <label for="password">Password</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input id="password-confirm" type="password" class="form-control rounded-bottom"
                            name="password_confirmation" required placeholder="Confirm Password">
                        <label for="password-confirm">Confirm Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-secondary fw-bold mt-4" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">Already Registered? <a href="/login" class="link-secondary">Login
                        Here</a></small>
            </div>
        </div>
    </div>
@endsection
