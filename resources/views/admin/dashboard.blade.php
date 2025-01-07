@extends('template.layout')

@section('title', 'Dashboard - Admin Perpustakaan')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')

    <style>
        /* Style untuk gambar */
        .image-container {
            width: 50%; /* Setengah lebar layar */
            margin: 20px auto; /* Pusatkan gambar dan beri jarak ke atas */
            position: relative; /* Untuk kontrol posisi */
            display: flex;
            flex-direction: column; /* Agar teks ada di bawah gambar */
            justify-content: center;
            align-items: center;
            height: calc(50vh - 100px); /* Setengah tinggi layar */
            overflow: hidden;
        }

        .image-container img {
            width: 100%; /* Gambar memenuhi lebar kontainer */
            height: auto; /* Tinggi gambar menyesuaikan */
            max-height: 100%; /* Jangan melebihi tinggi kontainer */
            object-fit: cover; /* Potong gambar jika perlu tanpa distorsi */
        }

        /* Style untuk tulisan di bawah gambar */
        .welcome-text {
            margin-top: 15px; /* Jarak antara gambar dan teks */
            padding: 10px 20px; /* Jarak dalam kotak teks */
            color: white; /* Teks warna putih */
            background-color: purple; /* Latar belakang ungu */
            text-align: center; /* Pusatkan teks */
            border-radius: 8px; /* Sudut background melengkung */
            font-size: 18px; /* Ukuran font */
            font-weight: bold; /* Tebalkan teks */
            width: fit-content; /* Lebar sesuai dengan konten teks */
        }
    </style>

    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Dashboard Admin Perpustakaan</li>
                    </ol>

                    <!-- Kontainer untuk gambar -->
                    <div class="image-container">
                        <img src="{{ asset('/img/perpus21.jpg') }}" alt="Gambar Perpustakaan">
                        <!-- Tambahkan teks selamat datang -->
                    </div>
                    <div class="image-container">
                        <div class="welcome-text">
                            Selamat Datang Di Perpustakaan Online Fajar
                        </div>
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
