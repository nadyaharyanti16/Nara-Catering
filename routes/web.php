
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukPublikController;

// HALAMAN PUBLIK — TANPA LOGIN
Route::get('/', [ProdukPublikController::class, 'index'])->name('home');
Route::get('/menu', [ProdukPublikController::class, 'index'])->name('menu.index');
Route::get('/menu/{id}', [ProdukPublikController::class, 'show'])->name('menu.show');

// HALAMAN LOGIN DAN LOGOUT
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// HALAMAN ADMIN — WAJIB LOGIN
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('produk', ProdukController::class);
    Route::resource('kategori', KategoriController::class);
});
