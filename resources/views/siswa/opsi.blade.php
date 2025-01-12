{{-- @extends('template.layout')

@section('title', 'Dashboard - Siswa Perpustakaan')

@section('header')
    @include('template.navbar_siswa')
@endsection

@section('main')

<style>
#layoutSidenav_content {
    width: 100%;
    height: 100vh;
    background-image: url('{{ asset('img/pemandangan.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.card {
    width: 350px;
    margin: auto;
    margin-top: 5rem;
    padding: 20px;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
    color: #333;
}

.card img {
    width: 100px; /* Perbesar ukuran gambar */
    height: 100px; /* Sesuaikan dengan lebar */
    border-radius: 50%; /* Agar tetap melingkar */
    object-fit: cover; /* Agar gambar memenuhi kotak tanpa distorsi */
    margin-bottom: 15px;
}
.card h2 {
    font-size: 1.5rem;
    margin: 10px 0;
}

.card p {
    font-size: 1rem;
    margin: 10px 0;
    color: #666;
}

.card .social-icons {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 15px;
}

.card .social-icons a {
    font-size: 20px;
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
}

.card .social-icons a:hover {
    color: #007bff;
}

.card .btn-follow {
    margin-top: 15px;
    padding: 10px 20px;
    border-radius: 25px;
    background: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background 0.3s ease;
}

.card .btn-follow:hover {
    background: #0056b3;
}
</style>

<div id="layoutSidenav">
    @include('template.sidebar_siswa')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="card">
                    <center><img src="{{ asset('img/apa.png') }}" alt="Profile Picture"></center>
                    <h2>Mohammad Fajar Ihsan</h2>
                    <p>Kelas: XI RPL 3</p>
                    <p>Alamat: Jl. Wonorejo Indah, Kedungkandang</p>
                    <p>Status: Pelajar</p>
                    <p>Saya di sini sebagai pengembang web design dan web desktop. Halaman saat ini adalah milik saya.</p>
                    <div class="social-icons">
                        <a href="https://instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="https://twitter.com" target="_blank"><i class="bi bi-twitter"></i></a>
                    </div>
                    <button class="btn-follow">Ikuti</button>
                </div>
            </div>
        </main>
        <footer class="py-4">
            <div class="container-fluid px-4">
                <div class="text-muted">Copyright &copy; Web Perpustakaan 2023</div>
            </div>
        </footer>
    </div>
</div>
@endsection --}}
