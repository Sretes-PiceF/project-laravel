<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function bukuSiswa () {
        $buku = book::with(['penulis'])->get();

        return view('siswa.daftarbuku', [
            "level" => "siswa", "buku" => $buku
    ]);    
    }
    public function bukuAdmin () {
        return view('admin.buku');
    }
    public function tambahBuku () {
        return view('admin.tambah_buku');
    }

    
}
