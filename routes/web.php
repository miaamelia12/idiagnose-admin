<?php

use App\Http\Controllers\AktivitasAnakController;
use App\Http\Controllers\AktivitasBalitaController;
use App\Http\Controllers\AktivitasBatitaController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DaftarKonsultasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataTestingController;
use App\Http\Controllers\DataTrainingController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\KonsultanController;
use App\Http\Controllers\PendampingController;
use App\Http\Controllers\ProfilController;
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

Route::resource('user', UserController::class);
Route::delete('/user-delete/{id}', [UserController::class, 'hapus'])->name('user-delete');

Route::resource('anak', AnakController::class);
Route::delete('/anak-delete/{id}', [AnakController::class, 'hapus'])->name('anak-delete');

Route::resource('diagnosa', DiagnosaController::class);
Route::get('hapusdiagnosa/{id}', [DiagnosaController::class, 'hapus'])->name('hapusdiagnosa');

Route::resource('pendamping', PendampingController::class);
Route::get('hapuspendamping/{id}', [PendampingController::class, 'hapus'])->name('hapuspendamping');

Route::resource('konsultan', KonsultanController::class);
Route::get('hapuskonsultan/{id}', [KonsultanController::class, 'hapus'])->name('hapuskonsultan');

Route::resource('konsultasi', DaftarKonsultasiController::class);
Route::get('hapuskonsultasi/{id}', [DaftarKonsultasiController::class, 'hapus'])->name('hapuskonsultasi');

Route::resource('riwayat-prediksi', RiwayatPrediksiController::class);

Route::resource('data-sampel', DataTrainingController::class);
Route::post('', [DataTrainingController::class, 'store'])->name('data-sampel.store');
Route::get('hapusdata/{id}', [DataTrainingController::class, 'hapus'])->name('hapusdata');
Route::post('/data-sampel', [DataTrainingController::class, 'import'])->name('import.file');

Route::resource('prediksi-stunting', DataTestingController::class);
Route::get('get/details/{id}', [DataTestingController::class, 'getDetails'])->name('getDetails');
Route::get('hasil', [DataTestingController::class, 'hitung'])->name('hasil');

Route::resource('aktivitas-batita', AktivitasBatitaController::class);
Route::get('hapusbatita/{id}', [AktivitasBatitaController::class, 'hapus'])->name('hapusbatita');

Route::resource('aktivitas-balita', AktivitasBalitaController::class);
Route::get('hapusbalita/{id}', [AktivitasBalitaController::class, 'hapus'])->name('hapusbalita');

Route::resource('aktivitas-anak', AktivitasAnakController::class);
Route::get('hapusaktivitasanak/{id}', [AktivitasAnakController::class, 'hapus'])->name('hapusaktivitasanak');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::patch('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
});
