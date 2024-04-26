@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-center  ">
    <div class="mt-3 text-center">
        <img  width="50%" src="/img/logo/logo-hasta.png" alt="">
        <h1>RSKB HASTA HUSADA</h1>
        <h3>Aplikasi LKPCM dan Peminjaman Rekam Medis</h3>
        <h4>Masuk untuk memulai aplikasi @auth
            <a class="btn btn-primary" href="/dashboards">Dashboard</a>
        @else
            <a class="btn btn-primary" href="/login">Login</a>
        @endauth
    </h4>
    </div>
</div>
@endsection