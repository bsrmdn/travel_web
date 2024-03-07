@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-gambar">
        @guest
            <p class="text-end"><a href="{{ route('dashboard') }}"
                    class="link-offset-2 link-underline link-underline-opacity-0 text-login">Login</a></p>
        @endguest
        <div class="row justify-content-center text-welcome">
            <div class="col-md-8">
                <div class="d-flex justify-content-center align-items-center vh-100" style="margin-top: -50px;">
                    <div class="text-center">
                        <p class="welcome">Selamat Datang!</p>
                        <p class="">Silakan lanjutkan ke halaman berikutnya atau masuk jika Anda sudah memiliki akun.
                        </p>
                        <a href="{{ route('home') }}" class="btn btn-primary mr-2"
                            style="">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
