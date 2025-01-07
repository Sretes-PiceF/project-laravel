<?php

use function Pest\Laravel\get;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\RequestController;

use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\updatePenerbit;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\SiswaMiddleware;

// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\SoulController;
// use App\Http\Controllers\RequestController;
// use App\Http\Controllers\RoutesController;
// use App\Http\Controllers\BookController;
// use App\Http\Controllers\PagesController;
// use App\Http\Controllers\PenerbitController;
// use Illuminate\Support\Facades\Route;

//     Route::get('/Dashboard', [RoutesController::class, 'Dashboard']);

// Route::match(['get', 'post'], '/anggota', function () {
// 	return 'Hallo, aku membuat route anggota dengan beberapa method';
// });

// Route::redirect('/buku', '/Dashboard');
// Route::get('/', [RequestController::class, 'store']);
// Route::get('/name', function() {
//     $nama = session('name');
//     return 'Halaman nama dengan nama ' . $nama;
//     });

// Route::get('/array', function () {
//     return [1, 'Perpustakaan', true];
// });
// Route::get('/siap', function () {
// 	return response('sip', 200)
// 		->header('Content-Type', 'text/plain');
// });
// Route::get('/hello', function () {
//     return response($content = 'Hallo Laravel')
//         ->withHeaders([
//             'Content-Type' => 'text/html',
//             'X-Header-One' => 'Header Value 1',
//             'X-Header-Two' => 'Header Value 2',
//         ]);
// });

// Route::get('/tes', function () {
//     return redirect()->action([RoutesController::class, 'Dashboard']);
// });

// Route::get('/login', [LoginController::class, 'login']);
// Route::post('/login', [LoginController::class, 'postLogin']);

// Route::get('/perpustakaan/{buku}', [RoutesController::class, 'perpustakaan']);
// Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
// Route::post('/books', [BookController::class, 'store'])->name('books.store');

// Route::get('/bootstrap', function(){ 
//     return view('bootstrap');
// });
// Route::get('/catalog', [PagesController::class, 'loginPage'])->name('login');




//LOGIN ADN REGISTER
Route::post('/user/register', [UserController::class, 'register'])->name('action.register');
Route::get('/register', [PagesController::class, 'register'])->name('public.register');

Route::post('/user/login', [UserController::class, 'login'])->name('action.login');
Route::get('/loginnn', [PagesController::class, 'loginKuy'])->name('public.login');

//MIDDLEWARE KHUSUS SISWA ROUTE
Route::middleware(SiswaMiddleware::class)->group(function(){

    Route::get('/logout', [UserController::class, 'logout'])->name('action.logout');
//KHUSUS JALUR SISWA
Route::get('/siswaaa', [DashboardController::class, 'dashboardSiswa'])->name('dashboardSiswa');

Route::get('/bukuSiswa', [BukuController::class, 'bukuSiswa'])->name('bukuSiswa');
Route::get('/peminjamanSiswa', [PeminjamanController::class, 'peminjamanSiswa'])->name('peminjamanSiswa');
Route::get('/pinjam/{id}', [PeminjamanController::class, 'create'])->name('action.pinjam-buku');
Route::get('/pengaturan', [PengaturanController::class, 'setting'])->name('setting');
Route::get('/settingAdmin', [PengaturanController::class, 'settingAdmin'])->name('settingAdmin');
Route::get('/opsi_pengembang_siswa', [PagesController::class, 'Opsi'])->name('Opsi');

//MIDDLEWARE KHUSUS ADMIN ROUTE
Route::middleware(RoleMiddleware::class)->group(function(){

//KHUSUS JALUR ADMIN
Route::get('/admin', [DashboardController::class, 'dashboardAdmin'])->name('dashboardAdmin');
//Penerbit ADMIN
Route::get('/penerbit', [PagesController::class, 'penerbitAdmin'])->name('penerbit');

Route::post('/createpenerbit', [PenerbitController::class, 'create'])->name('action.createpenerbit');

Route::get('/createpenerbit', [PagesController::class, 'createPenerbit'])->name('create_penerbit');

Route::get('/update_penerbit/{penerbit_id}', [PagesController::class, 'updatePenerbit'])->name('update_penerbit');

Route::patch('/penerbit/{penerbit_id}', [PenerbitController::class, 'update'])->name('penerbit.update');

Route::delete('/penerbit/{penerbit_id}', [PenerbitController::class, 'delete'])->name('penerbit.delete');

//Opsi pengembang
Route::get('/Opsi_pengembang', [PagesController::class, 'OpsiAdmin'])->name('OpsiAdmin');

//buku ADMIN
Route::get('/buku', [PagesController::class, 'bukuAdmin'])->name('buku');

Route::post('/createbuku', [BookController::class, 'create'])->name('action.createbuku');
Route::get('/createbuku', [PagesController::class, 'createBuku'])->name('create_buku');

Route::get('/update_buku/{id}', [PagesController::class, 'updateBuku'])->name('update_buku');

Route::patch('/buku/{id}', [BookController::class, 'update'])->name('buku.update');

Route::delete('/buku/{id}', [BookController::class, 'delete'])->name('buku.delete');

//rak ADMIN
Route::get('/rak', [PagesController::class, 'rakSaja'])->name('admin.rak');

Route::post('/craterak', [RakController::class, 'create'])->name('action.createrak');
Route::get('/createrak', [PagesController::class, 'createRak'])->name('create_rak');

Route::get('/update_rak/{id}', [PagesController::class, 'updateRak'])->name('update_rak');


Route::patch('/rak/{id}', [RakController::class, 'update'])->name('rak.update');

Route::delete('/rak/{id}', [RakController::class, 'delete'])->name('rak.delete');


//penulis ADMIN
Route::get('/penulis', [PagesController::class, 'PenulisAdmin'])->name('admin.penulis');

Route::post('/cratepenulis', [PenulisController::class, 'create'])->name('action.createpenulis');
Route::get('/createpenulis', [PagesController::class, 'createPenulis'])->name('create_penulis');

Route::get('/update_penulis/{id}', [PagesController::class, 'updatePenulis'])->name('update_penulis');


Route::patch('/penulis/{id}', [PenulisController::class, 'update'])->name('penulis.update');

Route::delete('/penulis/{id}', [PenulisController::class, 'delete'])->name('penulis.delete');

//peminjaman ADMIN
Route::get('/peminjaman', [PagesController::class, 'PeminjamanAdmin'])->name('admin.peminjaman');

// Route::post('/cratepeminjaman', [PeminjamanController::class, 'create'])->name('action.createpeminjaman');
// Route::get('/createpeminjaman', [PagesController::class, 'createPeminjaman'])->name('create_peminjaman');

Route::get('/update_peminjaman/{id}', [PagesController::class, 'updatePeminjaman'])->name('update_peminjaman');

Route::patch('/peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');

Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'delete'])->name('peminjaman.delete');

//kategori ADMIN
Route::get('/kategori', [PagesController::class, 'kategoriAdmin'])->name('admin.kategori');

Route::post('/crateKategori', [KategoriController::class, 'create'])->name('action.createkategori');
Route::get('/createKategori', [PagesController::class, 'createKategori'])->name('create_kategori');

Route::get('/update_kategori/{id}', [PagesController::class, 'updateKategori'])->name('update_kategori');

Route::patch('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');
});
});