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
                <h1 class="mt-4">Kategori</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Update Data Kategori</li>
                </ol>
                <form action="{{ route('kategori.update', ['id' => $kategori->kategori_id]) }}" class="row my-4 gap-3" method="post">
                    @csrf
                    @method('PATCH')    
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="kategori_nama" class="form-label">Nama kategori</label>
                        <input type="text" name="kategori_nama" id="kategori_nama" class="form-control" placeholder="Masukkan nama kategori" value="{{ $kategori->kategori_nama }}">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4 d-flex align-items-end">
                        <button class="btn btn-success" type="submit">Tambahkan</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection