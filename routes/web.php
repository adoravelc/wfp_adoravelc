<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AuthController;


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

//LOGIN&REGISTER
// Show Login Form
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
// Handle Login Request
Route::post('login', [AuthController::class, 'login']);
// Show Registration Form
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Handle Registration Request
Route::post('register', [AuthController::class, 'register']);
// Logout Route
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

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
Route::get('daftar-kategori', [KategoriController::class, 'index'])->name('daftar-kategori');
Route::get('daftar-makanan', [FoodController::class, 'index'])->name('daftar-makanan');
Route::get('daftar-order', [OrderController::class, 'index'])->name('daftar-order');
Route::get('daftar-customer', [CustomerController::class, 'index'])->name('daftar-customer');

//CREATE
Route::get('create-kategori', [KategoriController::class, 'create'])->name('categories.create');
Route::post('store-kategori', [KategoriController::class, 'store'])->name('categories.store');
Route::get('create-food', [FoodController::class, 'create'])->name('foods.create');
Route::post('store-food', [FoodController::class, 'store'])->name('foods.store');
Route::get('create-order', [OrderController::class, 'create'])->name('orders.create');
Route::post('store-order', [OrderController::class, 'store'])->name('orders.store');

//UPDATE
Route::get('edit-kategori/{id}', [KategoriController::class, 'edit'])->name('categories.edit');
Route::post('update-kategori/{id}', [KategoriController::class, 'update'])->name('categories.update');
Route::get('edit-food/{id}', [FoodController::class, 'edit'])->name('foods.edit');
Route::post('update-food/{id}', [FoodController::class, 'update'])->name('foods.update');

//SOFT DELETE
Route::get('delete-kategori/{id}', [KategoriController::class, 'destroy'])->name('categories.destroy');
Route::get('trashed-kategori', [KategoriController::class, 'trashed'])->name('categories.trashed');
Route::get('restore-kategori/{id}', [KategoriController::class, 'restore'])->name('categories.restore');
Route::get('permanentdelete-kategori/{id}', [KategoriController::class, 'forceDelete'])->name('categories.force-delete');

Route::get('delete-food/{id}', [FoodController::class, 'destroy'])->name('foods.destroy');
Route::get('trashed-food', [FoodController::class, 'trashed'])->name('foods.trashed');
Route::get('restore-food/{id}', [FoodController::class, 'restore'])->name('foods.restore');
Route::get('permanentdelete-food/{id}', [FoodController::class, 'forceDelete'])->name('foods.force-delete');

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

//AJAX
Route::get('ambil-produk-ajax/{id}', [KategoriController::class, 'ambilProdukAjax']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
