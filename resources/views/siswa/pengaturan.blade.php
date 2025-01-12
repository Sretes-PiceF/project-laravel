@extends('template.layout')

@section('title', 'Dashboard - Siswa Perpustakaan')

@section('header')
    @include('template.navbar_siswa')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_siswa')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 text-primary">Pengaturan Akun Admin</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route ('dashboardSiswa') }}" class="text-primary">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route ('setting') }}" class="text-primary">Pengaturan Akun</a></li>
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
                        <form action="{{ route('action.updateprofile') }}" method="POST">
                            @csrf
                            @method("PUT")
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
