@extends('template.layout')

@section('title', 'Login - Web Perpustakaan')

@section('main')
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
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @elseif(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->has('message'))
    <div class="alert alert-danger">
        {{ $errors->first('message') }}
    </div>
@endif

    <div class="card shadow-lg">
        <div class="card-header text-center">
            <img src="{{ asset('img/book.png') }}" alt="Logo" class="img-logo">
            <h3>Login - Web Perpustakaan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('action.login') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="user_username" class="form-label">Username *</label>
                    <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Masukkan username Anda">
                </div>
                <div class="form-group my-3">
                    <label for="user_password" class="form-label">Password *</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Masukkan password Anda">
                </div>
                <div class="form-group my-3 text-center">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('public.register') }}" class="text-primary">Tidak punya akun? Silahkan mendaftar</a>
        </div>
    </div>
</section>
@endsection
