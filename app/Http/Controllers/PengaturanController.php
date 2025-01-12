<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaturanController extends Controller
{
    public function setting () {
        $setting = Auth::user();
        return view('siswa.pengaturan', ['level' => 'anggota', 'setting' =>$setting]);
    }

    public function settingAdmin () {
        $setting = Auth::user();

        return view('admin.pengaturan', ['level' => 'admin', 'setting' => $setting]);
    }
}
