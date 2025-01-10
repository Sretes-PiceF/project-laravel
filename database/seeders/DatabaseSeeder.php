<?php

namespace Database\Seeders;

use App\Models\rak;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
            'user_id' => '1',
        'user_nama' => 'Admin',
        'user_alamat' => 'Malang',
        'user_username' => 'admin0',
        'user_email' => 'admin112@gmail.com',
        'user_notelp' => '123',
        'user_password' => Hash::make('admin'),
        'user_level' => 'admin',
        ]);
        rak::factory(10)->create();
    }
}
