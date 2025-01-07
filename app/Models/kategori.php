<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori'; // Pastikan ini sesuai dengan nama tabel di database
    protected $primaryKey = 'kategori_id'; // Menetapkan kunci utama
    public $incrementing = false; // Jika ID tidak auto-increment
    public $timestamps = false; // Jika tidak ada kolom timestamps

    protected $fillable = [
        'kategori_id',
        'kategori_nama',
    ];

    protected $keyType = 'string';

    protected static function createKategori($data)
    {
        return self::create($data);
    }

    protected static function readKategori()
    {
        $data = self::all();

        return $data;
    }
    protected static function readKategoriById($id)
    {
        return self::find($id);
    }


    public static function updateKategori($id, $data)
{
    $kategori = self::find($id);

    if ($kategori) {
        $kategori->update($data);
        return $kategori;
    }

    return null;
}

protected static function deleteKategori ($id)
{
    return self::destroy($id);
}
    
}
