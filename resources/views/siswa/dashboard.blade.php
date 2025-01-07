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
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Dashboard Siswa Perpustakaan</li>
                    </ol>
                    {{-- @foreach ($data as $siswa)
                    <h3>Nama: {{ $siswa['nama'] }}</h3>
                    <h3>Kelas: {{ $siswa['kelas'] }}</h3>
            @endforeach --}}

            {{-- @php
                $level;
                switch ($level) {
                    case 'admin':
                $level = 'admin';
                break;
                    case 'siswa':
                $level = 'siswa';
                break;
            }
            @endphp
            <h2 @style([
                'color: aqua' => $level == 'admin',
                'color: red' => $level == 'siswa',
            ])>Selamat datang, {{ $level }}</h2> --}}
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

{{-- <h2 @class([
    'text-primary' => $level == 'admin',
    'text-success' => $level == 'siswa',
])>Selamat datang, {{ $level }}</h2> --}}