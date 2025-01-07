<?php

namespace App\Http\Controllers;

use App\Models\rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function create(Request $request)
{

    // Buat ID acak
    $id = mt_rand(1000000000000000, 9999999999999999);

    // Siapkan data untuk dimasukkan ke dalam database
    $data = [
        'rak_id' => $id,
        'rak_nama' => $request['rak_nama'],
        'rak_lokasi' => $request['rak_lokasi'],
        'rak_kapasitas' => $request['rak_kapasitas'],
    ];

    // Simpan data ke database
    rak::create($data);

    // Redirect setelah berhasil menyimpan
    return redirect()->route('admin.rak')->with('success', 'Data rak berhasil ditambahkan!');
}
public function create_rak() {
    // Logika untuk menampilkan form pembuatan penerbit
    return view('create_rak'); // Misalkan ada file view untuk form ini
}

public function update (Request $request, $id)
{
    $data = [
        'rak_nama' => $request->input('rak_nama'),
        'rak_lokasi' => $request->input('rak_lokasi'),
        'rak_kapasitas' => $request->input('rak_kapasitas'),
    ];

    rak::updateRak($id, $data);

    return redirect()->route('admin.rak')->with('success', 'Data rak berhasil diupdate!');
}

public function delete ($id)
{
    rak::deleteRak($id);

    return redirect()->route('admin.rak')->with('deleted', 'Data rak berhasil dihapus!');
}


}
