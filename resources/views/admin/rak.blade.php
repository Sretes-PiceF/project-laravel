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
                <h1 class="mt-4">Rak</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Data Rak</li>
                </ol>
                <a href="{{ route('create_rak') }}">
                    <button class="btn btn-primary my-3">Tambah Rak</button>
                </a>

                <!-- Pesan sukses setelah menambahkan atau memperbarui data -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                {{-- pesan delete untuk menghapus data yang ingin dihapus --}}
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
                                <th scope="col">Nama</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Kapasitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rak as $rak)    
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rak->rak_nama }}</td>
                                <td>{{ $rak->rak_lokasi }}</td>
                                <td>{{ $rak->rak_kapasitas }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('update_rak', ['id' => $rak->rak_id]) }}" class="btn btn-warning">
                                        <i class="fas fa-pencil"></i>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $rak->rak_id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="hapusModal{{ $rak->rak_id }}" tabindex="-1">
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
                                                    <form action="{{ route('rak.delete', ['id' => $rak->rak_id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
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
