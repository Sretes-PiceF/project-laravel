<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rak extends Model
{
    use HasFactory;

    protected $table = 'rak'; // Pastikan ini sesuai dengan nama tabel di database
    protected $primaryKey = 'rak_id'; // Menetapkan kunci utama
    public $incrementing = false; // Jika ID tidak auto-increment
    public $timestamps = false; // Jika tidak ada kolom timestamps

    protected $fillable = [
        'rak_id',
        'rak_nama',
        'rak_lokasi',
        'rak_kapasitas',
        
    ];

    protected $keyType = 'string';

    protected static function createRak($data)
    {
        return self::create($data);
    }
    protected static function readRak()
    {
        $data = self::all();

        return $data;
    }
    protected static function readRakById($id)
    {
        return self::find($id);
    }


    public static function updateRak($id, $data)
{
    $rak = self::find($id);

    if ($rak) {
        $rak->update($data);
        return $rak;
    }

    return null;
}

protected static function deleteRak ($id)
{
    return self::destroy($id);
}

}
