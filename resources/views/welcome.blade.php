@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @guest
            <p class="text-end"><a href="{{ route('dashboard') }}"
                    class="link-offset-2 link-underline link-underline-opacity-0">Login</a></p>
        @endguest
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-center align-items-center vh-100" style="margin-top: -50px;">
                    <div class="text-center">
                        <h2 class="display-3">Selamat Datang!</h2>
                        <p class="lead">Silakan lanjutkan ke halaman berikutnya atau masuk jika Anda sudah memiliki akun.
                        </p>
                        <a href="{{ route('home') }}" class="btn btn-primary mr-2"
                            style="width: 150px; height: 50px; font-size: 20px;">Next</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
