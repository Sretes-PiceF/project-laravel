@extends('template.layout')

@section('title', 'Halaman Buku')

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
                    <li class="breadcrumb-item active">Halaman Data Buku</li>
                </ol>
                <a href="{{ route('create_buku') }}">
                    <button class="btn btn-primary my-3">Tambah Buku</button>
                </a>

                <!-- Pesan sukses setelah menambahkan atau memperbarui data -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                            
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">No RAK</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = ($buku->currentPage() - 1) * $buku->perPage() + 1; // Perhitungan nomor urut sesuai halaman
                            @endphp
                            @foreach ($buku as $bukus)    
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $bukus->buku_judul }}</td>
                                <td>{{ $bukus->penerbit_nama }}</td>
                                <td>{{ $bukus->kategori_nama }}</td>
                                <td>{{ $bukus->penulis_nama }}</td>
                                <td>{{ $bukus->buku_isbn }}</td>
                                <td>{{ $bukus->rak_nama }}</td>
                                <td>{{ $bukus->buku_thnterbit }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('update_buku', ['id' => $bukus->buku_id]) }}">
                                        <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                    </a>

                                    <!-- Form Hapus dengan Metode DELETE -->
                                    <form action="{{ route('buku.delete', ['id' => $bukus->buku_id]) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Tambahkan navigasi paginasi -->
                    <div class="d-flex justify-content-center">
                        {{ $buku->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
