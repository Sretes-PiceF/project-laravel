<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Arr;
use Illuminate\Testing\Fluent\Concerns\Has;

class user extends Model implements AuthenticatableContract
{
    use Authenticatable;

    use HasFactory, Notifiable;

    protected $table = 'users'; // Nama tabel sesuai dengan tabel database Anda
    protected $primaryKey = 'user_id'; // Primary key dari tabel
    public $timestamps = true;
    // public $incrementing = false; // Jika primary key tidak auto increment
    // protected $keyType = 'string'; // Jika primary key menggunakan tipe string

    protected $fillable = [
        'user_id',
        'user_nama',
        'user_alamat',
        'user_username',
        'user_email',
        'user_notelp',
        'user_password',
        'user_level',
    ];
    
    public function getAuthPassword()
    {
        return $this->user_password; // Nama kolom password yang sesuai
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts()
    {
        return[
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
