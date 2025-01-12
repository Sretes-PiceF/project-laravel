@extends('template.layout')

@section('title', 'Halaman Create Peminjaman')

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
                    <li class="breadcrumb-item active">Halaman Create Data Penerbit</li>
                </ol>
                <form action="{{ route('action.createpeminjaman') }}" class="row my-4 gap-3" method="post">
                    @csrf
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="peminjaman_tglpinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" name="peminjaman_tglpinjam" id="peminjaman_tglpinjam" class="form-control" placeholder="Masukkan tanggal pinjam">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="peminjaman_kembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" name="peminjaman_kembali" id="peminjaman_kembali" class="form-control" placeholder="Masukkan tanggal kembali">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="peminjaman_statuskembali" class="form-label">Status Kembali</label>
                        <input type="" name="peminjaman_statuskembali" id="peminjaman_statuskembali" class="form-control" placeholder="Masukkan status kembali">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="peminjaman_note" class="form-label">Catatan</label>
                        <input type="text" name="peminjaman_note" id="peminjaman_note" class="form-control" placeholder="Masukkan catatan tambahan">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="peminjaman_denda" class="form-label">Denda Dikenakan</label>
                        <input type="number" name="peminjaman_denda" id="peminjaman_denda" class="form-control" placeholder="Masukkan berapa denda">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <button class="btn btn-success" type="submit">Tambahkan</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
