<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function setting () {
        return view('siswa.pengaturan');
    }

    public function settingAdmin () {
        return view('admin.pengaturan');
    }
}
