@extends('template.layout')

@section('title', 'Halaman Create Penerbit')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Rak</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Create Data Rak</li>
                </ol>
                <form action="{{ route('action.createrak') }}" class="row my-4 gap-3" method="post">
                    @csrf
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="rak_nama" class="form-label">Nama</label>
                        <input type="text" name="rak_nama" id="rak_nama" class="form-control" placeholder="Masukkan nama rak">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="lrak_okasi" class="form-label">Lokasi rak</label>
                        <input type="text" name="rak_lokasi" id="rak_lokasi" class="form-control" placeholder="Masukkan alamat penerbit">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="rak_kapasitas" class="form-label">Kapasitas</label>
                        <input type="number" name="rak_kapasitas" id="rak_kapasitas" class="form-control" placeholder="Masukkan kapasitas penerbit">
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
