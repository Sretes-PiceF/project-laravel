@extends('template.layout')

@section('title', 'Halaman Update Buku')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Update Buku</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Update Data Buku</li>
                </ol>
                <form action="{{ route('buku.update', ['id' => $buku->buku_id]) }}" class="row my-4 gap-3" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="buku_judul" class="form-label">Judul</label>
                        <input value="{{ $buku->buku_judul }}" type="text" name="buku_judul" id="buku_judul" class="form-control" placeholder="Masukkan judul baru">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="buku_penerbit_id" class="form-label">Penerbit</label>
                        <select name="buku_penerbit_id" id="buku_penerbit_id" class="form-select">
                            <option selected disabled>Pilih Penerbit</option>
                            @foreach ($penerbit as $penerbit)
                                <option {{ $buku->buku_penerbit_id == $penerbit->penerbit_id ? 'selected' : '' }} value="{{ $penerbit->penerbit_id}}"> {{ $penerbit->penerbit_nama }} </option>
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="buku_kategori_id" class="form-label">Kategori</label>
                            <select name="buku_kategori_id" id="buku_kategori_id" class="form-select">
                                <option selected disabled>Pilih Kategori</option>
                                    @foreach ($kategori as $kategori)
                                        <option {{ $buku->buku_kategori_id == $kategori->kategori_id ? 'selected' : '' }} value="{{ $kategori->kategori_id }}"> {{$kategori->kategori_nama }} </option>
                                    @endforeach
                            </select>
                    </div>    
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="buku_penulis_id" class="form-label">Penulis</label>
                        <select name="buku_penulis_id" id="buku_penulis_id" class="form-select">
                            <option selected disabled>Pilih Penulis </option>
                                @foreach ($penulis as $penulis)
                                    <option {{ $buku->buku_penulis_id == $penulis->penulis_id ? 'selected' : '' }} value="{{ $penulis->penulis_id }}"> {{ $penulis->penulis_nama }} </option>
                                @endforeach
                        </select>
                    </div>                    
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="buku_isbn" class="form-label">NO ISBN</label>
                        <input value="{{ $buku->buku_isbn }}" type="text" name="buku_isbn" id="buku_isbn" class="form-control" placeholder="Masukkan isbn">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="buku_rak_id" class="form-label">rak</label>
                        <select name="buku_rak_id" id="buku_rak_id" class="form-select">
                            <option selected disabled>Pilih Rak</option>
                                @foreach ($rak as $rak)
                                    <option {{ $buku->buku_rak_id == $rak->rak_id ? 'selected' : '' }} value="{{ $rak->rak_id }}"> {{ $rak->rak_lokasi }} {{ $rak->rak_nama }} </option>
                                @endforeach
                        </select>
                    </div>                 
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="buku_thnterbit" class="form-label">Tahun Terbit</label>
                        <input value="{{ $buku->buku_thnterbit }}" type="date" name="buku_thnterbit" id="buku_thnterbit" class="form-control" placeholder="Masukkan Tahun Terbit">
                    </div>
                    <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="buku_urlgambar" class="form-label">Massukkan Gambar</label>
                        <input valu="{{ $buku->buku_urlgambar }}" type="file" name="buku_urlgambar" id="buku_urlgambar" class="form-control">
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
