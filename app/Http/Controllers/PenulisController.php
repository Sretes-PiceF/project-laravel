<?php

namespace App\Http\Controllers;

use App\Models\penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function create(Request $request)
{

    // Buat ID acak
    $id = mt_rand(1000000000000000, 9999999999999999);

    // Siapkan data untuk dimasukkan ke dalam database
    $data = [
        'penulis_id' => $id,
        'penulis_nama' => $request['penulis_nama'],
        'penulis_tmptlahir' => $request['penulis_tmptlahir'],
        'penulis_tgllahir' => $request['penulis_tgllahir'],
    ];

    // Simpan data ke database
    penulis::create($data);

    // Redirect setelah berhasil menyimpan
    return redirect()->route('admin.penulis')->with('success', 'Data penulis berhasil ditambahkan!');
}
public function create_penulis() {
    // Logika untuk menampilkan form pembuatan penerbit
    return view('create_penulis'); // Misalkan ada file view untuk form ini
}

public function update (Request $request, $id)
{
    $data = [
        'penulis_nama' => $request->input('penulis_nama'),
        'penulis_tmptlahir' => $request->input('penulis_tmptlahir'),
        'penulis_tgllahir' => $request->input('penulis_tgllahir'),
    ];

    penulis::updatePenulis($id, $data); 

    return redirect()->route('admin.penulis')->with('success', 'Data penulis berhasil diupdate!');
}

public function delete ($id)
{
    penulis::deletePenulis($id);

    return redirect()->route('admin.penulis')->with('deleted', 'Data penulis berhasil dihapus!');
}

}
