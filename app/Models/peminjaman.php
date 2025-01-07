<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman'; // Pastikan ini sesuai dengan nama tabel di database
    protected $primaryKey = 'peminjaman_id'; // Menetapkan kunci utama
    public $incrementing = false; // Jika ID tidak auto-increment
    public $timestamps = false; // Jika tidak ada kolom timestamps

    protected $fillable = [
        'peminjaman_id',
        'peminjaman_user_id',
        'peminjaman_tglpinjam',
        'peminjaman_kembali',
        'peminjaman_statuskembali',
        'peminjaman_note',
        'peminjaman_denda',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'peminjaman_user_id', 'user_id');
    }

    public function buku()
    {
        return $this->hasManyThrough(book::class, peminjaman_detail::class, 'peminjaman_detail_peminjaman_id', 'buku_id', 'peminjaman_id', 'peminjaman_detail_buku_id');
    }
//     protected $keyType = 'string';

    protected static function createPeminjaman($data)
    {
        return self::create($data);
    }
    protected static function readPeminjaman()
    {
        $data = self::all();

        return $data;
    }
    protected static function readPeminjamanById($id)
    {
        return self::find($id);
    }


    public static function updatePeminjaman($id, $data)
{
    $peminjaman = self::find($id);

    if ($peminjaman) {
        $peminjaman->update($data);
        return $peminjaman;
    }

    return null;
}

protected static function deletePeminjaman ($id)
{
    return self::destroy($id);
}

}
