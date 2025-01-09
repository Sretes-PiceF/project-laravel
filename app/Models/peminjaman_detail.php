<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman_detail extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_detail'; // Pastikan ini sesuai dengan nama tabel di database
    protected $primaryKey = 'false'; // Menetapkan kunci utama
    public $incrementing = false; // Jika ID tidak auto-increment
    public $timestamps = false; // Jika tidak ada kolom timestamps

    protected $fillable = [
        'peminjaman_detail_peminjaman_id',
        'peminjaman_detail_buku_id',
    ];

    public function peminjaman()
{
    return $this->belongsTo(Peminjaman::class, 'peminjaman_detail_peminjaman_id');
}

    // protected $keyType = 'string';

    // protected static function readPeminjaman_detail()
    // {
    //     $data = self::all();

    //     return $data;
    // }
}
