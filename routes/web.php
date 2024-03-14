<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BukuController::class, 'welcome']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/buku/detail{id}', [BukuController::class, 'detail'])->name('detail');


Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::get('/kategori/tambah', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::delete('/kategori/hapus/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::patch('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/tambah', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::delete('/buku/hapus/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
    Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/tambah', [PeminjamanController::class, 'tambahPeminjaman'])->name('peminjaman.tambah');
    Route::post('/peminjaman/store', [PeminjamanController::class, 'storePeminjaman'])->name('peminjaman.store');
    Route::post('/peminjaman/selesai/{id}', [PeminjamanController::class, 'kembalikanBuku'])->name('peminjaman.kembalikan');
    Route::get('/report', [PeminjamanController::class, 'print'])->name('print');
});

//user
Route::get('/user/peminjaman', [PeminjamanController::class, 'userPeminjaman'])->name('peminjaman.user')
->middleware(['auth', 'role:user']);
Auth::routes();