@extends('template.layout')

@section('title', 'Halaman Update Penerbit')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Penerbit</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Update Data Penerbit</li>
                </ol>
                <form action="{{ route('peminjaman.update', ['id' => $peminjaman->peminjaman_id]) }}" class="row my-4 gap-3" method="post">
                    @csrf
                    @method('PATCH')    
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="peminjaman_tglpinjam" class="form-label">Tanggal Pijam Buku</label>
                        <input type="date" name="peminjaman_tglpinjam" id="peminjaman_tglpinjam" class="form-control" placeholder="Masukkan Tanggal pinjam" value="{{ $peminjaman->peminjaman_tglpinjam }}">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="peminjaman_kembali" class="form-label">Taggal Kembali</label>
                        <input type="date" name="peminjaman_kembali" id="peminjaman_kembali" class="form-control" placeholder="Masukkan Tanggal kembali" value="{{ $peminjaman->peminjaman_kembali }}">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="peminjaman_statuskembali" class="form-label">Catatan</label>
                        <input type="text" name="peminjaman_note" id="peminjaman_note" class="form-control" placeholder="Masukkan catatan" value="{{ $peminjaman->peminjaman_note }}">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="peminjaman_denda" class="form-label">Denda Dikenankan</label>
                        <input type="number" name="peminjaman_denda" id="peminjaman_denda" class="form-control" placeholder="Masukkan denda peminjaman" value="{{ $peminjaman->peminjaman_denda }}">
                    </div>
                    {{-- <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="user_id" class="form-label">User</label>
                        <input type="number" name="user_id" id="user_id" class="form-control" placeholder="Masukkan User Nama" value="{{ $peminjaman->user_id }}">
                    </div> --}}
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <button class="btn btn-success" type="submit">Tambahkan</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection