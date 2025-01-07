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
                <form action="{{ route('rak.update', ['id' => $rak->rak_id]) }}" class="row my-4 gap-3" method="post">
                    @csrf
                    @method('PATCH')    
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="rak_nama" class="form-label">Nama Rak</label>
                        <input type="text" name="rak_nama" id="rak_nama" class="form-control" placeholder="Masukkan nama rak" value="{{ $rak->rak_nama }}">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="rak_lokasi" class="form-label">Lokasi Rak</label>
                        <input type="text" name="rak_lokasi" id="rak_lokasi" class="form-control" placeholder="Masukkan alamat penerbit" value="{{ $rak->rak_lokasi }}">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="rak_kapasitas" class="form-label">Kapasitas</label>
                        <input type="number" name="rak_kapasitas" id="rak_kapasitas" class="form-control" placeholder="Masukkan Kapasitas rak" value="{{ $rak->rak_kapasitas }}">
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