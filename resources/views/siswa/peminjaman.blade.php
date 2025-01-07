@extends('template.layout')

@section('title', 'Halaman Peminjaman Siswa')

@section('header')
    @include('template.navbar_siswa')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_siswa')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Peminjaman</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Peminjaman Siswa</li>
                </ol>
                <!-- Pesan sukses setelah menambahkan atau memperbarui data -->
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session('deleted'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('deleted') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Tanggal Kembalian Buku</th>
                                <th scope="col">Status</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Denda</th>
                                {{-- <th scope="col">User</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman as $peminjaman)    
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $peminjaman->buku[0]->buku_judul }}</td>
                                <td>{{ $peminjaman->peminjaman_tglpinjam }}</td>
                                @if ($peminjaman->peminjaman_statuskembali == 0)
                                <td>-</td>
                                <td>Masih Dipinjam</td>
                                <td>-</td>
                                <td>-</td>
                                @else
                                <td>{{ $peminjaman->peminjaman_kembali }}</td>
                                <td>Telah Dikembalikan</td>
                                <td>{{ $peminjaman->peminjaman_note }}</td>
                                <td>{{ $peminjaman->peminjaman_denda }}</td>
                                {{-- <td>{{ $peminjaman->user_id }}</td> --}}
                                
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
