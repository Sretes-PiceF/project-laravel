<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

use App\Models\Penerbit;

class PenerbitController extends Controller
{
    public function create(Request $request)
{
    // Validasi data
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'notelp' => 'required|string|max:15',
        'email' => 'required|email|max:255',
    ]);

    // Buat ID acak
    $id = mt_rand(1000000000000000, 9999999999999999);

    // Siapkan data untuk dimasukkan ke dalam database
    $data = [
        'penerbit_id' => $id,
        'penerbit_nama' => $validatedData['nama'],
        'penerbit_alamat' => $validatedData['alamat'],
        'penerbit_notelp' => $validatedData['notelp'],
        'penerbit_email' => $validatedData['email'],
    ];

    // Simpan data ke database
    Penerbit::create($data);

    // Redirect setelah berhasil menyimpan
    return redirect()->route('penerbit')->with('success', 'Data penerbit berhasil ditambahkan!');
}
public function create_penerbit() {
    // Logika untuk menampilkan form pembuatan penerbit
    return view('create_penerbit'); // Misalkan ada file view untuk form ini
}

public function update (Request $request, $id)
{
    $data = [
        'penerbit_id' => $id,
        'penerbit_nama' => $request->input('nama'),
        'penerbit_alamat' => $request->input('alamat'),
        'penerbit_notelp' => $request->input('notelp'),
        'penerbit_email' => $request->input('email'),
    ];

    Penerbit::updatePenerbit($id, $data);

    return redirect()->route('penerbit')->with('success', 'Data penerbit berhasil diupdate!');
}
public function delete ($id)
{
    $buku = book::where('buku_penerbit_id', $id)->get();

    if($buku){
        foreach ($buku as $bukus){
            book::deleteBuku($bukus->buku_id);
        }
    }

    Penerbit::deletePenerbit($id);

    return redirect()->route('penerbit')->with('deleted', 'Data penerbit berhasil dihapus!');
}



    public function penerbitAdmin () {
        return view('admin.penerbit');
    }
    public function tambahPenerbit () {
        return view('admin.tambah_penerbit');
    }
    public function editPenerbit () {
        return view('admin.editpenerbit');
    }

    
}