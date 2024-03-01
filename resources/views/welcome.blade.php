@extends('layouts.app')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Nama Situs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="{{ route('login') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-center align-items-center vh-100" style="margin-top: -50px;">
                <div class="text-center">
                    <h2 class="display-3">Selamat Datang!</h2>
                    <p class="lead">Silakan lanjutkan ke halaman berikutnya atau masuk jika Anda sudah memiliki akun.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary mr-2" style="width: 150px; height: 50px; font-size: 20px;">Next</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
