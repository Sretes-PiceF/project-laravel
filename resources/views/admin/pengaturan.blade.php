{{-- @extends('template.layout')

@section('title', 'Dashboard - Admin Perpustakaan')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Pengaturan Akun Admin</h1>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item active">Nama</li>
                    </ol>
                    <div class="container-fluid p-0">
                        <form>
                            <div class="form-group row m-0">
                                <label for="inputText" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-105 p-0">
                                    <input type="text" class="form-control" id="inputText" placeholder="">
                                </div>
                            </div>
                            <br>
                        </form>
                        <div class="container-fluid px-1">
                            <ol class="breadcrumb mb-1">
                                <li class="breadcrumb-item active">Username</li>
                            </ol>
                            <div class="container-fluid p-0">
                                <form>
                                    <div class="form-group row m-0">
                                        <label for="inputText" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-105 p-0">
                                            <input type="text" class="form-control" id="inputText" placeholder="">
                                        </div>
                                    </div>
                                    <br>
                                </form>
                        <div class="container-fluid px-1">
                            <ol class="breadcrumb mb-1">
                                <li class="breadcrumb-item active">Alamat</li>
                            </ol>
                            <form>
                                <div class="mb-1 mt-3">
                                    <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                                </div>
                        </div>
                        </form>
                        <div class="container-fluid px-1">
                            <ol class="breadcrumb mb-1">
                                <li class="breadcrumb-item active">Email</li>
                            </ol>
                            <div class="container-fluid p-0">
                                <form>
                                    <div class="form-group row m-0">
                                        <label for="inputText" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-105 p-0">
                                            <input type="text" class="form-control" id="inputText"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <br>
                                </form>
                                <div class="container-fluid px-1">
                                    <ol class="breadcrumb mb-1">
                                        <li class="breadcrumb-item active">No telepon</li>
                                    </ol>
                                    <div class="container-fluid p-0">
                                        <form>
                                            <div class="form-group row m-0">
                                                <label for="inputText" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-105 p-0">
                                                    <input type="text" class="form-control" id="inputText" placeholder="">
                                                </div>
                                            </div>
                                            <br>
                                        </form>
                                        <div class="container-fluid px-1">
                                            <ol class="breadcrumb mb-1">
                                                <li class="breadcrumb-item active">Password</li>
                                            </ol>
                                            <div class="container-fluid p-0">
                                                <form>
                                                    <div class="form-group row m-0">
                                                        <label for="inputText" class="col-sm-2 col-form-label"></label>
                                                        <div class="col-sm-105 p-0">
                                                            <input type="text" class="form-control" id="inputText" placeholder="">
                                                        </div>
                                                    </div>
                                                    <br>
                                                </form>
                                                <p>Kosongkan jika tidak ingin merubah password</p>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-start">
                                        <a href="#" class="mr-2">
                                            <button class="btn btn-warning mb-1">Update Data</button>
                                        </a>
                                    </div>
            </main>
            <footer class="custom-footer bg-light py-3">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Web Perpustakaan 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
--}}
@extends('template.layout')

@section('title', 'Dashboard - Admin Perpustakaan')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 text-primary">Pengaturan Akun Admin</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route ('dashboardAdmin') }}" class="text-primary">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route ('settingAdmin') }}" class="text-primary">Pengaturan Akun</a></li>
                </ol>
                
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="m-0">Form Pengaturan Akun</h5>
                    </div>
                    <!-- Pesan Sukses -->
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Pesan Hapus -->
            @if (session('deleted'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('deleted') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                    <div class="card-body">
                        <form action="{{ route('action.update-Profile') }}" method="POST">
                            @csrf
                            @method("PATCH")
                            <div class="mb-3">
                                <label for="user_nama" class="form-label">Nama</label>
                                <input value="{{ $setting->user_nama }}"name="user_nama"type="text" class="form-control" id="user_nama" placeholder="Masukkan nama lengkap">
                            </div>

                            <div class="mb-3">
                                <label for="user_username" class="form-label">Username</label>
                                <input value="{{ $setting->user_username }}"name="user_username" type="text" class="form-control" id="user_username" placeholder="Masukkan username">
                            </div>

                            <div class="mb-3">
                                <label for="user_alamat" class="form-label">Alamat</label>
                                <textarea name="user_alamat" class="form-control" id="user_alamat" rows="3" placeholder="Masukkan alamat lengkap">{{ $setting->user_alamat }}</textarea>
                            </div>
                            

                            <div class="mb-3">
                                <label for="user_email" class="form-label">Email</label>
                                <input value="{{ $setting->user_email }}"name="user_email" type="email" class="form-control" id="user_email" placeholder="Masukkan email aktif">
                            </div>

                            <div class="mb-3">
                                <label for="user_notelp" class="form-label">No Telepon</label>
                                <input value="{{ $setting->user_notelp }}"name="user_notelp" type="text" class="form-control" id="user_notelp" placeholder="Masukkan nomor telepon">
                            </div>
                            <div class="mb-3">
                                <label for="user_password" class="form-label">Password</label>
                                <input name="user_password" type="password" class="form-control" id="user_password" placeholder="Masukkan password baru">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer class="bg-light py-3 mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Web Perpustakaan 2023</div>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection
