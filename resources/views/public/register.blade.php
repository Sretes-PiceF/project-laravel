@extends('template.layout')

@section('title', 'Register - Web Perpustakaan')

@section('main')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .img-logo {
    width: 82px;
    margin: 24px auto;
    display: block;
}

@media only screen and (max-width: 576px) {
    .login-container {
        padding: 50px 30px;
    }
}

@media only screen and (min-width: 576px) {
    .login-container {
        padding: 50px 120px;
    }
}

@media only screen and (min-width: 768px) {
    .login-container {
        padding: 50px 200px;
    }
}

@media only screen and (min-width: 992px) {
    .login-container {
        padding: 50px 300px;
    }
}

@media only screen and (min-width: 1200px) {
    .login-container {
        padding: 50px 460px;
    }
}

    </style>

    
<section class="login-container">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <img src="{{ asset('img/book.png') }}" alt="Logo Perpustakaan" class="img-logo">
            <h3>Register - Web Perpustakaan</h3>
        </div>
        @if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
        <div class="card-body">
            <form action="{{ route('action.register') }}" method="POST">
                @csrf
                @method('POST')
                {{-- 'user_nama',
        'user_alamat',
        'user_username',
        'user_email',
        'user_notelp',
        'user_password' --}}
                <div class="form-group">
                    <label for="user_nama" class="form-label">Nama</label>
                    <input type="text" name="user_nama" id="user_nama" class="form-control" placeholder="Masukkan nama lengkap Anda" value="{{ old('nama') }}">
                </div>
                <div class="form-group my-3">
                    <label for="user_alamat" class="form-label">Alamat</label>
                    <input type="text" name="user_alamat" id="user_alamat" class="form-control" placeholder="Masukkan alamat Anda" value="{{ old('alamat') }}">
                </div>
                <div class="form-group my-3">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Masukkan username Anda" value="{{ old('username') }}">
                </div>
                <div class="form-group my-3">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Masukkan email Anda" value="{{ old('email') }}">
                </div>
                <div class="form-group my-3">
                    <label for="user_notelp" class="form-label">No Telpn</label>
                    <input type="number" name="user_notelp" id="user_notelp" class="form-control" placeholder="Masukkan nomor telepon Anda" value="{{ old ('notelpn') }}">
                </div>
                <div class="form-group my-3">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Masukkan password Anda" value="{{ old ('password') }}">
                </div>
                <div class="form-group my-3 text-center">
                    <button class="btn btn-primary" type="submit">Daftar</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('public.login') }}" class="text-primary">Sudah punya akun? Silahkan login</a>
        </div>
    </div>
</section>
@endsection
