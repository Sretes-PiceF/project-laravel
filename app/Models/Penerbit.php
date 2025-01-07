<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory; // Pastikan trait HasFactory digunakan
    
    
    protected $table = 'penerbit'; // Pastikan ini sesuai dengan nama tabel di database
    protected $primaryKey = 'penerbit_id'; // Menetapkan kunci utama
    public $incrementing = false; // Jika ID tidak auto-increment
    public $timestamps = false; // Jika tidak ada kolom timestamps

    protected $fillable = [
        'penerbit_id',
        'penerbit_nama',
        'penerbit_alamat',
        'penerbit_notelp',
        'penerbit_email',
    ];

    protected $keyType = 'string';

    protected static function createPenerbit($data)
    {
        return self::create($data);
    }
    protected static function readPenerbit()
    {
        $data = self::all();

        return $data;
    }
    protected static function readPenerbitById($id)
    {
        return self::find($id);
    }


    public static function updatePenerbit($id, $data)
{
    $penerbit = self::find($id);

    if ($penerbit) {
        $penerbit->update($data);
        return $penerbit;
    }

    return null;
}

protected static function deletePenerbit ($id)
{
    return self::destroy($id);
}

}
