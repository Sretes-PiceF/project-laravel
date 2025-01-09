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
                    <h1 class="mt-4">Buku</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Daftar Buku</li>
                    </ol>
                    <div class="row gap-4">
                        @foreach ($buku as $bukus)
                        <div class="card col-12 col-md-4 col-lg-3">
                            <div class="card-body">
                                @if ($bukus->buku_urlgambar == '')
                                <center><img src="img/one piece.jpg" class="book-img"></center>
                                @else
                                <center><img src= "{{ asset ('/storage/buku_pictures/' . basename($bukus->buku_urlgambar)) }}" class="book-img" style="width: 170px; height: 270px;"></center>
                                @endif
                                <hr>
                                <p class="text-center fw-bolder fs-4 my-0">{{ $bukus->buku_judul }}</p>
                                <p class="text-center mb-3"> {{ $bukus->penulis->penulis_nama }} </p>

                                <div class="d-flex justify-content-center">
                                    <form action="{{ route('action.pinjam-buku', ['id' => $bukus->buku_id]) }}" method="GET">
                                    <button class="btn btn-primary mx-1" type="submit">Pinjam</button>
                                </form>
                                    <button class="btn btn-warning mx-1" type="submit">Detail</button>
                                </div>
                            </div>
                        </div>    
                        @endforeach                
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Web Perpustakaan 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
