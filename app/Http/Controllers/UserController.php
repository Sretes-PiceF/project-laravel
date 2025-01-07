<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
{
    $request->validate([
        'user_nama' => 'required|string|max:255',
        'user_alamat' => 'required|string|max:255',
        'user_username' => 'required|string|max:50',
        'user_email' => 'required|email|max:255',
        'user_notelp' => 'required|string|max:15',
        'user_password' => 'required|string|min:8|max:255',
    ], [
        'user_nama.required' => 'Nama harus diisi.',
        'user_alamat.required' => 'Alamat harus diisi.',
        'user_username.required' => 'Username harus diisi.',
        'user_email.required' => 'Email harus diisi.',
        'user_email.email' => 'Email tidak valid.',
        'user_notelp.required' => 'Nomor telepon harus diisi.',
        'user_password.required' => 'Password harus diisi.',
        'user_password.min' => 'Password minimal 8 karakter.',
    ]);


    $id = mt_rand(1000000000000000, 9999999999999999);

    $data = [
        'user_id' => $id,
        'user_nama' => $request->input('user_nama'),
        'user_alamat' => $request->input('user_alamat'),
        'user_username' => $request->input('user_username'),
        'user_email' => $request->input('user_email'),
        'user_notelp' => $request->input('user_notelp'),
        'user_password' => bcrypt($request->input('user_password')),
        'user_level' => 'anggota',
    ];

    $user = User::create($data);

    if ($user) {
        return redirect()->route('public.login')->with('success', 'Pendaftaran akun berhasil!');
    } else {
        return back()->withInput()->withErrors(['message' => 'Pendaftaran akun gagal, coba lagi.']);
    }
}


public function login(Request $request)
{
    $credentials = [
        'user_username' => $request->input('user_username'),
        'password' => $request->input('user_password'),
    ];
    if (Auth::attempt($credentials)) {
        $user_level = Auth::user()->user_level;

        if($user_level == 'admin'){
        return redirect()->route('dashboardAdmin');
            }
            
        return redirect()->route('dashboardSiswa');
    }
    else {
        return back()->withErrors([
        'message' => 'Gagal!, Username atau password Anda salah coba periksa kembali.',
        ]);
}


//     // Validasi input login
//     $request->validate([
//         'user_username' => 'required|string',
//         'user_password' => 'required|string',
//     ]);

//     // Cari user berdasarkan username
//     $user = user::where('user_username', $request->input('user_username'))->first();

//     // Cek apakah user ditemukan dan password cocok
//     if ($user && Hash::check($request->input('user_password'), $user->user_password)) {
//         Auth::login($user); // Login menggunakan Auth
//         return redirect()->route('dashboardSiswa');
//     }

//     // Jika login gagal, kembali ke halaman login dengan pesan error
//     return back()->withErrors([
//         'message' => 'Username atau password Anda salah.',
//     ]);
// }


            //sudah bisa kira kira
    // public function login(Request $request)
    // {
    //     $credentials = [
    //         'user_username' => $request->input('user_username'),
    //         'user_password' => $request->input('user_password'),
    //     ];

    //     $user = user::where('user_username', $credentials['user_username'])->first();

    //     if ($user && Hash::check($credentials['user_password'], $user->user_password)) {
    //         Auth::login($user);
    //         return redirect()->route('admin.dashboard');
    //     } else {
    //         return back()->withErrors([
    //             'message' => 'Username atau password Anda salah.',
    //         ]);
    //     }
    // }

    // Additional login method as an alternative
    // public function alternativeLogin(Request $request)
    // {
    //     $request->validate([
    //         'user_username' => 'required',
    //         'user_password' => 'required',
    //     ], [
    //         'user_username.required' => 'Username tidak boleh kosong',
    //         'user_password.required' => 'Password tidak boleh kosong',
    //     ]);

    //     $infoLogin = [
    //         'user_username' => $request->input('user_username'),
    //         'user_password' => $request->input('user_password'),
    //     ];

    //     if (Auth::attempt($infoLogin)) {
    //         return 'sudah masuk bos';
    //     } else {
    //         return 'gagal';
    //     }
    // }
}

public function logout (){
    Auth::logout();
    return redirect()->route('public.login')->with("success", "Logout anda berhasil silahkan kembali lagi");
}
}