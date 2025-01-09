@extends('template.layout')

@section('title', 'Halaman Penerbit')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<div id="layoutSidenav">
    @include('template.sidebar_admin')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Peminjaman</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Data Peminjaman</li>
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
                                <th scope="col">Nama Pengguna</th>
                                <th scope="col">Buku Judul</th>
                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Tanggal Kembalian Buku</th>
                                <th scope="col">Status</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Denda</th>
                                <th scope="col">Aksi</th>
                                {{-- <th scope="col">User</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman as $peminjaman)    
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $peminjaman->user->user_username }}</td>
                                <td>{{ $peminjaman->buku[0]->buku_judul }}</td>
                                <td>{{ $peminjaman->peminjaman_tglpinjam }}</td>

                                @if ($peminjaman->peminjaman_statuskembali == 0)
                                <td>-</td>
                                <td>Masih dipinjam</td>
                                <td>-</td>
                                <td>-</td>
                                <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('update_peminjaman', ['id' => $peminjaman->peminjaman_id]) }}">
                                    <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                </a>
                            </td>
                                @else
                                <td>{{ $peminjaman->peminjaman_kembali }}</td>
                                <td>Telah Kembali</td>
                                <td>{{ $peminjaman->peminjaman_note }}</td>
                                <td>{{ $peminjaman->peminjaman_denda }}</td>
                                {{-- <td>{{ $peminjaman->user_id }}</td> --}}
                                <td>

                                    <!-- Form Hapus dengan Metode DELETE -->
                                    <form action="{{ route('peminjaman.delete', ['id' => $peminjaman->peminjaman_id]) }}" method="POST" style="display:inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
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
