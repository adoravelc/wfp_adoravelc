<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;


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

//ADMINISTRATION
Route::get('/', function () {
    // return 'Hello All!!!'; //ini literally cuman tunjukkin Hello All in the entire page
    //return view('welcome'); //tampilkan sebuah view yang namanya welcome di resource > view > welcome (welcome.blade.php, disaranain selalu pake blade biar ok aja)
    // return 'Halaman Home, hehe not yet :)';
    return view('home');
});


Route::get('/laporan', function () {
    return view('laporan.laporan'); //ditambah titik soalnya itu di dalam folder laporan
});

Route::get('daftar-kategori', [KategoriController::class, 'index']);
Route::get('daftar-makanan', [FoodController::class, 'index']);
Route::get('daftar-order', [OrderController::class, 'index']);
Route::get('daftar-customer', [CustomerController::class, 'index']);

//LAPORAN
Route::get('laporan1', [LaporanController::class, 'laporan1']);
Route::get('laporan2', [LaporanController::class, 'laporan2']);
Route::get('laporan3', [LaporanController::class, 'laporan3']);
Route::get('laporan4', [LaporanController::class, 'laporan4']);
Route::get('laporan5', [LaporanController::class, 'laporan5']);
Route::get('laporan6', [LaporanController::class, 'laporan6']);
Route::get('laporan7', [LaporanController::class, 'laporan7']);
Route::get('laporan8', [LaporanController::class, 'laporan8']);
Route::get('laporan9', [LaporanController::class, 'laporan9']);
Route::get('laporan10', [LaporanController::class, 'laporan10']);