<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function create(Request $request)
    {
        // Buat ID acak
        $id = mt_rand(1000000000000000, 9999999999999999);
    
        // Siapkan data untuk dimasukkan ke dalam database
        $data = [
            'kategori_id' => $id,
            'kategori_nama' => $request['kategori_nama'],
            
        ];
    
        // Simpan data ke database
        kategori::create($data);
    
        // Redirect setelah berhasil menyimpan
        return redirect()->route('admin.kategori')->with('success', 'Data kategori berhasil ditambahkan!');
    }
    public function create_kategori() {
        // Logika untuk menampilkan form pembuatan kategori
        return view('create_kategori'); // Misalkan ada file view untuk form ini
    }
    
    public function update (Request $request, $id)
    {
        $data = [
            'kategori_id' => $id,
            'kategori_nama' => $request->input('kategori_nama'),
        ];
    
        kategori::updateKategori($id, $data);
    
        return redirect()->route('admin.kategori')->with('success', 'Data kategori berhasil diupdate!');
    }
    public function delete ($id)
    {
        kategori::deleteKategori($id);
    
        return redirect()->route('admin.kategori')->with('deleted', 'Data kategori berhasil dihapus!');
    }
}
