<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-headin">Menu</div>
                <a class="nav-link" href="{{ route ('dashboardAdmin') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route ('buku') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Buku
                </a>
                <a class="nav-link" href="{{ route ('admin.kategori') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Kategori Buku
                </a>
                <a class="nav-link" href="{{ route ('admin.rak') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Rak
                </a>
                <a class="nav-link" href="{{ route ('admin.penulis') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-pencil"></i></div>
                    Penulis
                </a>
                <a class="nav-link" href="{{ route ('penerbit') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-house"></i></div>
                    Penerbit
                </a>
                <a class="nav-link" href="{{ route ('admin.peminjaman') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-hand"></i></div>
                    Peminjaman
                </a>
                {{-- <a class="nav-link" href="{{ route ('OpsiAdmin') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-bell"></i></div>
                    Opsi Pengembang
                </a> --}}
                <a class="nav-link" href="{{ route ('settingAdmin') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-gear"></i></div>
                    Pengaturan
                </a>
                <a class="nav-link" href="{{ route ('action.logout') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-right-from-bracket"></i></div>
                    Logout
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->user_username }}
        </div>
    </nav>
</div>

