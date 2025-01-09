<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use App\Models\peminjaman_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{

    public function peminjamanSiswa () {
        $user_id = Auth::user()->user_id;
        $peminjaman = peminjaman::with(['buku'])->where('peminjaman_user_id', $user_id)->get();
        return view("siswa.peminjaman", ["level" => "siswa", 'peminjaman' => $peminjaman]);
    }
    // public function create(Request $request)
    // {
        
    //     // Buat ID acak
    //     $id = mt_rand(1000000000000000, 9999999999999999);
    
    //     // Siapkan data untuk dimasukkan ke dalam database
    //     $data = [
    //         'peminjaman_id' => $id,
    //         'peminjaman_tglpinjam' => $request[ 'peminjaman_tglpinjam'],
    //         'peminjaman_kembali' => $request['peminjaman_kembali'],
    //         'peminjaman_statuskembali' => $request['peminjaman_statuskembali'],
    //         'peminjaman_note' => $request['peminjaman_note'],
    //         'peminjaman_denda' => $request['peminjaman_denda'],
    //         // 'user_id' => $request['user_id'],
    //     ];
    
    //     // Simpan data ke database
    //     peminjaman::create($data);
    
    //     // Redirect setelah berhasil menyimpan
    //     return redirect()->route('admin.peminjaman')->with('success', 'Data peminjaman berhasil ditambahkan!');
    // }
    public function create_peminjaman() {
        // Logika untuk menampilkan form pembuatan penerbit
        return view('create_peminjaman'); // Misalkan ada file view untuk form ini
    }
    
    public function update (Request $request, $id)
    {
        $data_peminjaman = [
            //Di peminjajaman kembali kita bisa ubah atau ada dua opsi itu mengarah ke Tanggal Kembali Buku kalau kita memakai $request-dan seterusnya maka bisa kita ubah ke tanggal kembali buku. Jika kita ubah menjadi now() maka akan menetapkan tanggal kembali sesuai tanggal-bulan dan tahun saat ini.
            'peminjaman_kembali' => $request->input('peminjaman_kembali'), //now() 
            'peminjaman_statuskembali' => 1,
            'peminjaman_note' => $request->input('peminjaman_note'),
            'peminjaman_denda' => $request->input('peminjaman_denda'),
            // 'user_id' => $request->input('user_id'),
        ];
    
        // peminjaman::updatePeminjaman($id, $data);
        peminjaman::where("peminjaman_id", $id)->update($data_peminjaman);
    
        return redirect()->route('admin.peminjaman')->with('success', 'Peminjaman telah sukses terselesaikan!');
    }
    
    public function delete ($id)
    {
        peminjaman_detail::where('peminjaman_detail_peminjaman_id', $id)->delete();
        peminjaman::find($id)->delete();

        return redirect()->route('admin.peminjaman')->with('success', 'Data peminjaman berhasil dihapus!');
    }


    //Fungsi validasi peminjaman antar dashboard siswa ke admin
    public function create(Request $request, $id)
    {
        $user_id = Auth::user()->user_id;
        $peminjaman_id = mt_rand(1000000000000000, 9999999999999999);

        $data_peminjaman = [
                    'peminjaman_id' => $peminjaman_id,
                    'peminjaman_user_id' => $user_id,
                    'peminjaman_tglpinjam' => now(),
                    'peminjaman_kembali' => now(),
                    'peminjaman_statuskembali' => 0,
                    'peminjaman_note' => "",
                    'peminjaman_denda' => 0,

                    
                ];

                $data_peminjaman_detail = [
                    'peminjaman_detail_peminjaman_id'=> $peminjaman_id,
                    'peminjaman_detail_buku_id' => $id, 
                ];
            
                // Simpan data ke database 
                // peminjaman::create($data_peminjaman);
                // peminjaman_detail::create($data_peminjaman_detail);

                //querry builder 
                DB::table('peminjaman')->insert($data_peminjaman);
                DB::table('peminjaman_detail')->insert($data_peminjaman_detail);
                // Redirect setelah berhasil menyimpan
                return redirect()->route('peminjamanSiswa')->with('success', 'Anda berhasil meminjam buku!');
    }
}
