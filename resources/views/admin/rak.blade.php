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
                                    <a href="{{ route('update_rak', ['id' => $rak->rak_id]) }}">
                                        <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                    </a>

                                    <!-- Form Hapus dengan Metode DELETE -->
                                    <form action="{{ route('rak.delete', ['id' => $rak->rak_id]) }}" method="POST" style="display:inline-block;">
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
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
