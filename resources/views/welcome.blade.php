@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-center align-items-center vh-100" style="margin-top: -50px;">
                <div class="text-center">
                    @if(auth()->check() && auth()->user()->isAdmin())
                        <h2 class="display-3">Selamat Datang, Admin!</h2>
                        <p class="lead">Silakan lanjutkan untuk masuk sebagai admin.</p>
                        <a href="{{ route('admin.login') }}" class="btn btn-primary">Admin Login</a>
                    @else
                        <h2 class="display-3">Selamat Datang!</h2>
                        <p class="lead">Selamat datang di situs kami.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary" style="width: 100px; height: 50px; font-size: 20px;">Next</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
