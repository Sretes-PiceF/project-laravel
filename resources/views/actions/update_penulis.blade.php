@extends('template.layout')

@section('title', 'Halaman Update Penulis')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Penulis</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Update Data Penulis</li>
                </ol>
                <form action="{{ route('penulis.update', ['id' => $penulis->penulis_id]) }}" class="row my-4 gap-3" method="post">
                    @csrf
                    @method('PATCH')    
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="penulis_nama" class="form-label">Nama Penerbit</label>
                        <input type="text" name="penulis_nama" id="penulis_nama" class="form-control" placeholder="Masukkan nama penulis" value="{{ $penulis->penulis_nama }}">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="penulis_tmptlahir" class="form-label">Tempat Lahir Penulis</label>
                        <input type="text" name="penulis_tmptlahir" id="penulis_tmptlahir" class="form-control" placeholder="Masukkan tempat lahir penulis" value="{{ $penulis->penulis_tmptlahir }}">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="penulis_tgllahir" class="form-label">Tanggal Lahir Penulis</label>
                        <input type="date" name="penulis_tgllahir" id="penulis_tgllahir" class="form-control" placeholder="Masukkan tanggal lahir penulis" value="{{ $penulis->penulis_tgllahir }}">
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