<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\kategori;
use App\Models\peminjaman;
use App\Models\peminjaman_detail;
use App\Models\Penerbit;
use App\Models\penulis;
use App\Models\rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class PagesController extends Controller
{
    public function loginPage () {
        return view('public.login');
    }

    // public function dashboardAdmin () {
    //     return view('admin.dashboard', ['nama' => 'Agus gilang santoso']);
    //     }
    // public function dashboardAdmin () {
    //     $data = [
    //         [
    //             'nama' => 'Budi Santoso',
    //             'kelas' => '1A'
    //         ],
    //         [
    //             'nama' => 'Melisa Putri',
    //             'kelas' => '1B'        
    //         ],
    //         [
    //             'nama' => 'Angela Sari',
    //             'kelas' => '1C'
    //         ]
    //     ];
    
    //     return view('admin.dashboard')->with('data', $data);
    // }
    // public function dashboardAdmin () {
    //     return view('admin.dashboard', ['level' => 'admin']);
    // }
    // public function dashboardAdmin () {
    //     $url = action([PagesController::class, 'loginPage']);
    
    //     return redirect($url);
    // }
    // public function dashboardSiswa() {
    //     return view('siswa.dashboard', ['level' => 'siswa']);
    // }


    //Penerbit Admin
    public function createPenerbit() {
        return view('create_penerbit');
    }

    public function penerbitAdmin () {
        $penerbit = Penerbit::all();
        return view('penerbit', ["penerbit" => $penerbit]);
    }

    public function updatePenerbit($id) {
        $penerbit = Penerbit::find($id);

        return view('actions.update_penerbit', ['penerbit' => $penerbit]);
    }


    //Buku Admin
    public function createBuku() {
        // $penerbit = Penerbit::all();
        // return view('create_buku', ['penerbit' => $penerbit]);

        // $penulis = penulis::all();
        // return view('create_buku', ['penulis' => $penulis]);

        $penerbit = Penerbit::readPenerbit(); // Data penerbit
        $penulis = penulis::readPenulis();  // Data penulis
        $rak = rak::readRak();
        $kategori = kategori::readKategori();
        return view('create_buku', [
            'level' => 'admin',
            'penerbit'=> $penerbit, 
            'penulis' => $penulis,
            'rak' => $rak,
            'kategori' => $kategori,
        ]);
    }

    public function bukuAdmin () {
        //Eloquent
        // $data = book::with(['penerbit', 'penulis', 'rak', 'kategori'])->get();
        // return $data;

        $data = DB::table('buku')
        ->join('penerbit', 'buku.buku_penerbit_id', '=', 'penerbit.penerbit_id')
        ->join('penulis', 'buku.buku_penulis_id', '=', 'penulis.penulis_id')
        ->join('kategori', 'buku.buku_kategori_id', '=', 'kategori.kategori_id')
        ->join('rak', 'buku.buku_rak_id', '=', 'rak.rak_id')
        ->select('buku.*', 'penulis.penulis_nama', 'penerbit.penerbit_nama', 'kategori.kategori_nama', 'rak.rak_nama')
        ->paginate(10); // Menampilkan 10 item per halaman
        // Menambahkan paginate untuk paginasi

        return view('buku', ['level' => 'admin', 'buku' => $data]);
    }

    public function updateBuku($id) {
        $buku = book::readBukuById($id);

        $penerbit = Penerbit::readPenerbit(); // Data penerbit
        $penulis = penulis::readPenulis();  // Data penulis
        $rak = rak::readRak();
        $kategori = kategori::readKategori();
        
        return view('actions.update_buku', [
            'level' => 'admin',
            'buku' => $buku,
            'penerbit'=> $penerbit, 
            'penulis' => $penulis,
            'rak' => $rak,
            'kategori' => $kategori,
        ]);
    }


    //Rak Admin
    public function createRak() {
        return view('create_rak', [ 'level' => 'admin']);
    }

    public function rakSaja () {
        $data = rak::readRak();

        return view('admin.rak', ['level' => 'admin', 'rak' => $data]);
    }

    public function updateRak($id) {
        $rak = rak::readRakById($id);

        return view('actions.update_rak', ['level' => 'admin', 'rak' => $rak]);
    }

    
    //penulis Admin
    public function createPenulis() {
        return view('create_penulis', [ 'level' => 'admin']);
    }

    public function PenulisAdmin () {
        $data = penulis::readPenulis();

        return view('admin.penulis', ['level' => 'admin', 'penulis' => $data]);
    }

    public function updatePenulis($id) {
        $penulis = penulis::readPenulisById($id);

        return view('actions.update_penulis', ['level' => 'admin', 'penulis' => $penulis]);
    }

    
    //peminjaman Admin
    // public function createPeminjaman() {
    //     return view('create_peminjaman', [ 'level' => 'admin']);
    // }

    public function PeminjamanAdmin () {
        // $data = peminjaman::readPeminjaman();

        $peminjaman = peminjaman::with(['user', 'buku'])->get();
        
        return view('admin.peminjaman', ['level' => 'admin', 'peminjaman' => $peminjaman]);
    }

    public function updatePeminjaman($id) {
        $peminjaman = peminjaman::with(['user'])->get()->find($id);
        return view('actions.update_peminjaman', ['level' => 'admin', 'peminjaman' => $peminjaman]);
    }

     //Kategori Admin
        public function createKategori() {
        return view('create_kategori', [ 'level' => 'admin']);
    }

    public function kategoriAdmin () {
        $data = kategori::readKategori();

        return view('admin.kategori', ['level' => 'admin', 'kategori' => $data]);
    }

    public function updateKategori($id) {
        $kategori = kategori::readKategoriById($id);

        return view('actions.update_kategori', ['level' => 'admin', 'kategori' => $kategori]);
    }
    

    //user register
    public function register() {
        return view('public.register', ['level' => 'user']);
    }
    
    public function  loginKuy () {
        return view('public.login', ['level' => 'user']);
    }

    //opsi si pengembang
    public function Opsi () {
        return view('siswa.opsi');
    }

    public function OpsiAdmin () {
        return view('admin.opsi');
    }
}
