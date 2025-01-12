<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;
use App\Models\book;
use App\Models\peminjaman;
use App\Models\peminjaman_detail;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // public function create()
    // {
    //     return view('books.create');
    // }

    // public function store(StoreBookRequest $request)
    // {
    //     $validated = $request->validated();

    //     // Cetak data inputan
    //     dump($validated);

    //     // Atau bisa juga dengan:
    //     // echo '<pre>' . print_r($validated, true) . '</pre>';
    // }
    public function create(Request $request)
    {
        try{
            // Buat ID acak
        $id = mt_rand(1000000000000000, 9999999999999999);
    
        // Siapkan data untuk dimasukkan ke dalam database
        $data = [
            'buku_id' => $id,
            'buku_penulis_id' => $request['buku_penulis_id'],
            'buku_penerbit_id' => $request['buku_penerbit_id'],
            'buku_kategori_id' => $request['buku_kategori_id'],
            'buku_judul' => $request['buku_judul'],
            'buku_isbn' => $request['buku_isbn'],
            'buku_thnterbit' => $request['buku_thnterbit'], // Spasi sudah dihapus
            'buku_rak_id' => $request['buku_rak_id'],
        ];
    
        // Simpan data ke database
        book::create($data);
        
        //Kasih gambar yang diinginkan
        if($request->hasFile('buku_urlgambar')){
            book::uploadGambarBuku($id, $request->file('buku_urlgambar'));
        }
    
        // Redirect setelah berhasil menyimpan
        return redirect()->route('buku')->with('success', 'Data buku berhasil ditambahkan!');
        } 
        catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('buku')->with('error', "Gagal membuat buku " . $e->getMessage());
        }
        
    }    

    public function create_buku() {
        // Logika untuk menampilkan form pembuatan penerbit
        return view('create_buku'); // Misalkan ada file view untuk form ini
    }
    
    public function update (Request $request, $id)
    {
        $data = [
            'buku_penulis_id' => $request->input('buku_penulis_id'),
            'buku_penerbit_id' => $request->input('buku_penerbit_id'),
            'buku_kategori_id' => $request->input('buku_kategori_id'),
            'buku_judul' => $request->input('buku_judul'),
            'buku_isbn' => $request->input('buku_isbn'),
            'buku_thnterbit' => $request->input('buku_thnterbit'),
            'buku_rak_id' => $request->input('buku_rak_id'),
        ];
        
        book::updateBuku($id, $data);

        $buku = book::find($id);
        //Kasih gambar yang diinginkan
        if($request->hasFile('buku_urlgambar')){
            if($buku->buku_urlgambar){
                Storage::disk("public")->delete($buku->buku_urlgambar);
            }
            book::uploadGambarBuku($id, $request->file('buku_urlgambar'));
        }
    
        return redirect()->route('buku')->with('success', 'Data Buku berhasil diupdate!');
    }

    public function delete ($id)
    {   
        book::deleteBuku($id);
        return redirect()->route('buku')->with('success', 'Data peminjaman berhasil dihapus!');

}
}

// $peminjaman_detail = peminjaman_detail::where('peminjaman_detail_buku_id', $id)->get();

// foreach ($peminjaman_detail as $peminjaman_detaili) {
//     $peminjaman = peminjaman:: find($peminjaman_detaili)->first();
//     $peminjaman->delete();
