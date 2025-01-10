<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class book extends Model
{
    use HasFactory;

    protected $table = 'buku'; // Pastikan ini sesuai dengan nama tabel di database
    protected $primaryKey = 'buku_id'; // Menetapkan kunci utama
    public $incrementing = false; // Jika ID tidak auto-increment
    public $timestamps = false; // Jika tidak ada kolom timestamps

    protected $fillable = [
        'buku_id',
        'buku_penulis_id',
        'buku_penerbit_id',
        'buku_kategori_id',
        'buku_judul',
        'buku_isbn',
        'buku_thnterbit',
        'buku_rak_id',
    ];

    protected $keyType = 'string';



    public function penulis() {
    return $this->belongsTo(penulis::class, 'buku_penulis_id', 'penulis_id');
}
    public function penerbit() {
    return $this->belongsTo(penerbit::class, 'buku_penerbit_id', 'penerbit_id');
}
    public function rak() {
    return $this->belongsTo(rak::class, 'buku_rak_id', 'rak_id');
}
    public function kategori() {
    return $this->belongsTo(kategori::class, 'buku_kategori_id', 'kategori_id');
}


    protected static function createBuku($data)
    {
        return self::create($data);
    }
    
    protected static function readBuku()
    {
        $data = self::all();

        return $data;
    }
    protected static function readBukuById($id)
    {
        return self::find($id);
    }


    public static function updateBuku($id, $data)
{
    $buku = self::find($id);

    if ($buku) {
        $buku->update($data);
        return $buku;
    }

    return null;
}


protected static function deleteBuku ($id)
{
    $buku = book::find($id);
        $peminjaman_detail = peminjaman_detail::where('peminjaman_detail_buku_id', $id)->get();
        
        if($peminjaman_detail){
            foreach ($peminjaman_detail as $peminjaman_detaili) {
                $peminjaman = peminjaman:: find($peminjaman_detaili)->first();
                $peminjaman->delete();
                }
        }


        if($buku->buku_urlgambar){
            Storage::disk('public')->delete($buku->buku_urlgambar);
        }

    return self::destroy($id);
}

protected static function uploadGambarBuku($id, $file){
    $buku = self::find ($id);
    $path = $file -> store('buku_pictures', 'public');
    $buku->buku_urlgambar = $path;
    $buku->save();
}
}
