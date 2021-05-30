<?php

use App\Http\Controllers\AnakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\PerkembanganController;
use App\Http\Controllers\PertumbuhanController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dashboard', DashboardController::class);
Route::resource('anak', AnakController::class);
Route::get('hapusanak/{id}', [AnakController::class, 'hapus'])->name('hapusanak');
Route::resource('diagnosa', DiagnosaController::class);
Route::get('hapusdiagnosa/{id}', [DiagnosaController::class, 'hapus'])->name('hapusdiagnosa');
Route::get('/hasilpemeriksaan', [PertumbuhanController::class, 'index']);
Route::get('/daftarkonsultasi', [PerkembanganController::class, 'konsultasi']);
