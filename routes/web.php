<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerhitunganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/calculation', [HomeController::class, 'index']);

Route::get('/kriteria', function () {
    return view('kriteria');
});

// Route untuk login
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    ///dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // kriteria
    Route::get('/bobot', [KriteriaController::class, 'indexBobot']);
    Route::get('/pengalaman', [KriteriaController::class, 'indexPengalaman']);
    Route::get('/keahlian', [KriteriaController::class, 'indexKeahlian']);
    Route::get('/pendidikan', [KriteriaController::class, 'indexPendidikan']);
    Route::get('/posisi-jabatan', [KriteriaController::class, 'indexPosisiJabatan']);
    Route::get('/usia', [KriteriaController::class, 'indexUsia']);

    // pegawai
    Route::get('/pegawai', [PegawaiController::class, 'index']);
    Route::post('/pegawai-store', [PegawaiController::class, 'store'])->name('createPegawai');
    Route::put('/pegawai-update/{id}', [PegawaiController::class, 'update'])->name('updatePegawai');
    Route::get('/pegawai-delete/{id}', [PegawaiController::class, 'delete'])->name('deletePegawai');

    // hasil perhitungan
    Route::get('/data-alternatif', [PerhitunganController::class, 'indexAlternatif']);
    Route::get('/data-ranking', [PerhitunganController::class, 'indexRanking']);
});

