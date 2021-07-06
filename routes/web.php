<?php

use App\Http\Controllers\AktivitasAnakController;
use App\Http\Controllers\AktivitasBalitaController;
use App\Http\Controllers\AktivitasBatitaController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataTestingController;
use App\Http\Controllers\DataTrainingController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\JadwalKonsultasiController;
use App\Http\Controllers\KonsultanController;
use App\Http\Controllers\PendampingController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RiwayatKonsultasiController;
use App\Http\Controllers\RiwayatPrediksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');
Route::get('/', [DashboardController::class, 'index']);
Route::get('export-riwayat-prediksi', [DashboardController::class, 'exportPDF'])->name('export-riwayat-prediksi');

Route::resource('user', UserController::class);
Route::delete('user-delete/{id}', [UserController::class, 'hapus'])->name('user-delete');

Route::resource('anak', AnakController::class);
Route::delete('anak-delete/{id}', [AnakController::class, 'hapus'])->name('anak-delete');
Route::get('export-data-anak', [AnakController::class, 'exportPDF'])->name('export-data-anak');
Route::get('export-anak-id/{id}', [AnakController::class, 'exportPDFId'])->name('export-anak-id');
Route::get('export-excel', [AnakController::class, 'exportExcel'])->name('export-excel');

Route::resource('diagnosa', DiagnosaController::class);
Route::delete('diagnosa-delete/{id}', [DiagnosaController::class, 'hapus'])->name('diagnosa-delete');

Route::resource('pendamping', PendampingController::class);
Route::delete('pendamping-delete/{id}', [PendampingController::class, 'hapus'])->name('pendamping-delete');

Route::resource('konsultan', KonsultanController::class);
Route::delete('konsultan-delete/{id}', [KonsultanController::class, 'hapus'])->name('konsultan-delete');

Route::resource('jadwal-konsultasi', JadwalKonsultasiController::class);
Route::get('export-konsultasi', [JadwalKonsultasiController::class, 'exportPDF'])->name('export-konsultasi');
Route::get('export-konsultasi-id/{id}', [JadwalKonsultasiController::class, 'exportPDFId'])->name('export-konsultasi-id');
Route::delete('konsultasi-delete/{id}', [JadwalKonsultasiController::class, 'hapus'])->name('konsultasi-delete');

Route::resource('riwayat-konsultasi', RiwayatKonsultasiController::class);
Route::get('export-riwayat-konsultasi', [RiwayatKonsultasiController::class, 'exportPDF'])->name('export-riwayat-konsultasi');
Route::get('export-riwayat-konsultasi-id/{id}', [RiwayatKonsultasiController::class, 'exportPDFId'])->name('export-riwayat-konsultasi-id');
Route::delete('riwayat-konsultasi-delete/{id}', [RiwayatKonsultasiController::class, 'hapus'])->name('riwayat-konsultasi-delete');

Route::resource('riwayat-prediksi', RiwayatPrediksiController::class);

Route::resource('data-sampel', DataTrainingController::class);
Route::post('', [DataTrainingController::class, 'store'])->name('data-sampel.store');
Route::delete('data-sampel-delete/{id}', [DataTrainingController::class, 'hapus'])->name('data-sampel-delete');
Route::post('/data-sampel', [DataTrainingController::class, 'import'])->name('import.file');

Route::resource('prediksi-stunting', DataTestingController::class);
Route::get('get/details/{id}', [DataTestingController::class, 'getDetails'])->name('getDetails');
Route::get('hasil', [DataTestingController::class, 'hitung'])->name('hasil');

Route::resource('aktivitas-batita', AktivitasBatitaController::class);
Route::delete('aktivitas-batita-delete/{id}', [AktivitasBatitaController::class, 'hapus'])->name('aktivitas-batita-delete');

Route::resource('aktivitas-balita', AktivitasBalitaController::class);
Route::delete('aktivitas-balita-delete/{id}', [AktivitasBalitaController::class, 'hapus'])->name('aktivitas-balita-delete');

Route::resource('aktivitas-anak', AktivitasAnakController::class);
Route::get('hapusaktivitasanak/{id}', [AktivitasAnakController::class, 'hapus'])->name('hapusaktivitasanak');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::patch('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
});
