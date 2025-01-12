@extends('template.layout')

@section('title', 'Halaman Create Kategori')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">kategori</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Create Data kategori</li>
                </ol>
                <form action="{{ route('action.createkategori') }}" class="row my-4 gap-3" method="post">
                    @csrf
                    <div class="form-group row my-4 gap-3">
                        <div class="col-12 col-md-8 col-lg-8">
                            <label for="kategori_nama" class="form-label">Nama</label>
                            <input type="text" name="kategori_nama" id="kategori_nama" class="form-control" placeholder="Masukkan nama kategori">
                        </div>
                    <pre></pre>
                    <div class="form-group col-12 col-md-4 col-lg-4">
                        <button class="btn btn-success" type="submit">Tambahkan</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
