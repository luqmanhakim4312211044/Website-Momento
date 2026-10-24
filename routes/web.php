<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfilPendiriController;
use App\Http\Controllers\ShowcaseVideoController;
use App\Http\Controllers\MediaSosialController;
use App\Http\Controllers\KontakPerusahaanController;
use App\Http\Controllers\PesanGuestController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class, 'show']);

Route::get('/about', [AboutController::class, 'show']);

Route::get('/services', [LayananController::class, 'show']);

Route::get('/showcase', [ShowcaseVideoController::class, 'show']);

Route::get('/contact', [ContactController::class, 'show']);
Route::post('/contact', [PesanGuestController::class, 'store'])->middleware('throttle:3,1');

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [AdminAuthController::class, 'login'])->middleware('throttle:5,1');

Route::middleware('admin.auth')->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout']);

    Route::get('/dashboard', [DashboardController::class, 'show']);

    Route::get('/dashboard/layanan', [LayananController::class, 'index']);
    Route::get('/dashboard/layanan/tambah', [LayananController::class, 'create']);
    Route::post('/dashboard/layanan/tambah', [LayananController::class, 'store']);
    Route::get('/dashboard/layanan/edit/{id}', [LayananController::class, 'edit']);
    Route::post('/dashboard/layanan/edit/{id}', [LayananController::class, 'update']);
    Route::delete('/dashboard/layanan/delete/{id}', [LayananController::class, 'destroy']);

    Route::get('/dashboard/profilpendiri', [ProfilPendiriController::class, 'index']);
    Route::get('/dashboard/profilpendiri/tambah', [ProfilPendiriController::class, 'create']);
    Route::post('/dashboard/profilpendiri/tambah', [ProfilPendiriController::class, 'store']);
    Route::get('/dashboard/profilpendiri/edit/{id}', [ProfilPendiriController::class, 'edit']);
    Route::post('/dashboard/profilpendiri/edit/{id}', [ProfilPendiriController::class, 'update']);
    Route::delete('/dashboard/profilpendiri/delete/{id}', [ProfilPendiriController::class, 'destroy']);

    Route::get('/dashboard/video', [ShowcaseVideoController::class, 'index']);
    Route::get('/dashboard/video/tambah', [ShowcaseVideoController::class, 'create']);
    Route::post('/dashboard/video/tambah', [ShowcaseVideoController::class, 'store']);
    Route::get('/dashboard/video/edit/{id}', [ShowcaseVideoController::class, 'edit']);
    Route::post('/dashboard/video/edit/{id}', [ShowcaseVideoController::class, 'update']);
    Route::delete('/dashboard/video/delete/{id}', [ShowcaseVideoController::class, 'destroy']);

    Route::get('/dashboard/mediasosial', [MediaSosialController::class, 'index']);
    Route::get('/dashboard/mediasosial/tambah', [MediaSosialController::class, 'create']);
    Route::post('/dashboard/mediasosial/tambah', [MediaSosialController::class, 'store']);
    Route::get('/dashboard/mediasosial/edit/{id}', [MediaSosialController::class, 'edit']);
    Route::post('/dashboard/mediasosial/edit/{id}', [MediaSosialController::class, 'update']);
    Route::delete('/dashboard/mediasosial/delete/{id}', [MediaSosialController::class, 'destroy']);

    Route::get('/dashboard/kontak', [KontakPerusahaanController::class, 'index']);
    Route::get('/dashboard/kontak/tambah', [KontakPerusahaanController::class, 'create']);
    Route::post('/dashboard/kontak/tambah', [KontakPerusahaanController::class, 'store']);
    Route::get('/dashboard/kontak/edit/{id}', [KontakPerusahaanController::class, 'edit']);
    Route::post('/dashboard/kontak/edit/{id}', [KontakPerusahaanController::class, 'update']);
    Route::delete('/dashboard/kontak/delete/{id}', [KontakPerusahaanController::class, 'destroy']);

    Route::get('/dashboard/pesan', [PesanGuestController::class, 'index']);
    Route::delete('/dashboard/pesan/delete/{id}', [PesanGuestController::class, 'destroy']);
});