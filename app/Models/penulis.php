<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penulis extends Model
{
    use HasFactory;

    protected $table = 'penulis'; // Pastikan ini sesuai dengan nama tabel di database
    protected $primaryKey = 'penulis_id'; // Menetapkan kunci utama
    public $incrementing = false; // Jika ID tidak auto-increment
    public $timestamps = false; // Jika tidak ada kolom timestamps

    protected $fillable = [
        'penulis_id',
        'penulis_nama',
        'penulis_tmptlahir',
        'penulis_tgllahir',
    ];

    protected $keyType = 'string';

    protected static function createPenulis($data)
    {
        return self::create($data);
    }

    protected static function readPenulis()
    {
        $data = self::all();

        return $data;
    }
    protected static function readPenulisById($id)
    {
        return self::find($id);
    }


    public static function updatePenulis($id, $data)
{
    $penulis = self::find($id);

    if ($penulis) {
        $penulis->update($data);
        return $penulis;
    }

    return null;
}

protected static function deletePenulis ($id)
{
    return self::destroy($id);
}
}
