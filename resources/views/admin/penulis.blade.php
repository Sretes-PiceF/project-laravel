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
                <!-- Judul Halaman -->
                <h1 class="mt-4">Penulis</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Data Penulis</li>
                </ol>

                <!-- Tombol Tambah Penulis -->
                <a href="{{ route('create_penulis') }}">
                    <button class="btn btn-primary my-3">Tambah Penulis</button>
                </a>

                <!-- Pesan Sukses -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Pesan Hapus -->
                @if (session('deleted'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ session('deleted') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Tabel Data Penulis -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penulis as $penulis)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $penulis->penulis_nama }}</td>
                                <td>{{ $penulis->penulis_tmptlahir }}</td>
                                <td>{{ $penulis->penulis_tgllahir }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('update_penulis', ['id' => $penulis->penulis_id]) }}" class="btn btn-warning">
                                        <i class="fas fa-pencil"></i>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $penulis->penulis_id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="hapusModal{{ $penulis->penulis_id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5">Peringatan!!!</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus data ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <!-- Form Hapus dengan Metode DELETE -->
                                                    <form action="{{ route('penulis.delete', ['id' => $penulis->penulis_id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
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