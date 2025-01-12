@extends('template.layout')

@section('title', 'Halaman Create Buku')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Buku</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Create Data Buku</li>
                </ol>
                <form action="{{ route('action.createbuku') }}" class="row my-4 gap-3" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="buku_judul" class="form-label">Judul</label>
                        <input type="text" name="buku_judul" id="buku_judul" class="form-control" placeholder="Masukkan judul baru">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="buku_penerbit_id" class="form-label">Penerbit</label>
                        <select name="buku_penerbit_id" id="buku_penerbit_id" class="form-select">
                            <option selected disabled>Pilih Penerbit</option>
                            @foreach ($penerbit as $penerbit)
                                <option value="{{ $penerbit->penerbit_id}}"> {{ $penerbit->penerbit_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="buku_kategori_id" class="form-label">Kategori</label>
                            <select name="buku_kategori_id" id="buku_kategori_id" class="form-select">
                                <option selected disabled>Pilih Kategori</option>
                                    @foreach ($kategori as $kategori)
                                        <option value="{{ $kategori->kategori_id }}"> {{$kategori->kategori_nama }}</option>
                                    @endforeach
                            </select>
                    </div>    
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="buku_penulis_id" class="form-label">Penulis</label>
                        <select name="buku_penulis_id" id="buku_penulis_id" class="form-select">
                            <option selected disabled>Pilih Penulis </option>
                                @foreach ($penulis as $penulis)
                                    <option value="{{ $penulis->penulis_id }}"> {{ $penulis->penulis_nama }}</option>
                                @endforeach
                        </select>
                    </div>                    
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="buku_isbn" class="form-label">NO ISBN</label>
                        <input type="text" name="buku_isbn" id="buku_isbn" class="form-control" placeholder="Masukkan isbn">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="buku_rak_id" class="form-label">rak</label>
                        <select name="buku_rak_id" id="buku_rak_id" class="form-select">
                            <option selected disabled>Pilih Rak</option>
                                @foreach ($rak as $rak)
                                    <option value="{{ $rak->rak_id }}"> {{ $rak->rak_lokasi }} {{ $rak->rak_nama }}</option>
                                @endforeach
                        </select>
                    </div>                 
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="buku_thnterbit" class="form-label">Tahun Terbit</label>
                        <input type="date" name="buku_thnterbit" id="buku_thnterbit" class="form-control" placeholder="Masukkan Tahun Terbit">
                    </div>

                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="buku_urlgambar" class="form-label">Massukkan Gambar</label>
                        <input type="file" name="buku_urlgambar" id="buku_urlgambar" class="form-control">
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
