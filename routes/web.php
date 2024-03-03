<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProdukKasirController;
use App\Http\Controllers\PelangganKasirController;
use App\Http\Controllers\PenjualanKasirController;
use App\Http\Controllers\DetailPenjualanKasirController;


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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
//logout
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');
    

Route::prefix('admin')->middleware('auth','access:Admin')->group(function() {

    //Admin
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin');
    
    //REGISTER
    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
    
    // Produk
    Route::resource('produk', ProdukController::class)->except('destroy','search','show');
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('produk/tambah', [ProdukController::class, 'create'])->name('tambahproduk');
    Route::post('produk/tambah/action', [ProdukController::class, 'store'])->name('actionproduk');
    Route::get('produk/edit/{id}', [ProdukController::class, 'edit'])->name('editproduk');
    Route::post('produk/edit/{id}', [ProdukController::class, 'update'])->name('updateproduk');
    Route::get('produk/hapus/{id}', [ProdukController::class, 'destroy'])->name('hapusproduk');
    Route::get('produk/cari', [ProdukController::class, 'search'])->name('cariproduk'); 
    Route::get('produk/print', [ProdukController::class, 'show'])->name('printproduk');

    
    // User
    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('edituser');
    Route::post('user/edit/{id}', [UserController::class, 'update'])->name('updateuser');
    Route::get('user/hapus/{id}', [UserController::class, 'destroy'])->name('hapususer');
    Route::get('user/cari', [UserController::class, 'search'])->name('cariuser');
    Route::get('user/print', [UserController::class, 'show'])->name('printuser');


    
    //Pelanggan
    Route::resource('pelanggan', PelangganController::class)->except('destroy','search','show');
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
    Route::get('pelanggan/tambah', [PelangganController::class, 'create'])->name('tambahpelanggan');
    Route::post('pelanggan/tambah/action', [PelangganController::class, 'store'])->name('actionpelanggan');
    Route::get('pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('editpelanggan');
    Route::post('pelanggan/edit/{id}', [PelangganController::class, 'update'])->name('updatepelanggan');
    Route::get('pelanggan/hapus/{id}', [PelangganController::class, 'destroy'])->name('hapuspelanggan');
    Route::get('pelanggan/cari', [PelangganController::class, 'search'])->name('caripelanggan');
    Route::get('pelanggan/print', [PelangganController::class, 'show'])->name('printpelanggan');

    //Penjualan
    Route::resource('penjualan', PenjualanController::class)->except('destroy','search','show');
    Route::get('penjualan/hapus/{id}', [PenjualanController::class, 'destroy'])->name('hapuspenjualan');
    Route::get('penjualan/cari', [PenjualanController::class, 'search'])->name('caripenjualan');
    Route::get('penjualan/print', [PenjualanController::class, 'show'])->name('printpenjualan');
    
    
    //DetailPenjualan
    // Route::get('detailpenjualan', [DetailPenjualanController::class, 'index'])->name('detailpenjualan');
    Route::post('penjualan/detail/tambah', [DetailPenjualanController::class, 'store'])->name('detailpenjualan');
    Route::post('/penjualan/update', [DetailPenjualanController::class, 'update'])->name('updatepenjualan');
    Route::get('penjualan/cari', [DetailPenjualanController::class, 'search'])->name('caripenjualan');
    Route::get('penjualan/detail/hapus', [DetailPenjualanController::class, 'destroy'])->name('hapusdetailpenjualan');
    Route::post('penjualan/pelanggan', [DetailPenjualanController::class, 'create'])->name('memberpenjualan');

    //profile
    // Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    // Route::post('profile/action', [ProfileController::class, 'actionprofile'])->name('actionprofile');
    
})  ;

Route::prefix('kasir')->middleware('auth','access:Kasir')->group(function() {
    //kasir
    Route::get('dashboard', [KasirController::class, 'index'])->name('kasir');

    // Produk
    Route::resource('produk', ProdukKasirController::class)->except('destroy','search','show');
    Route::get('/produk', [ProdukKasirController::class, 'index'])->name('produkkasir');
    Route::get('produk/tambah', [ProdukKasirController::class, 'create'])->name('tambahprodukkasir');
    Route::post('produk/tambah/action', [ProdukKasirController::class, 'store'])->name('actionprodukkasir');
    Route::get('produk/edit/{id}', [ProdukKasirController::class, 'edit'])->name('editprodukkasir');
    Route::post('produk/edit/{id}', [ProdukKasirController::class, 'update'])->name('updateprodukkasir');
    Route::get('produk/hapus/{id}', [ProdukKasirController::class, 'destroy'])->name('hapusprodukkasir');
    Route::get('produk/cari', [ProdukKasirController::class, 'search'])->name('cariprodukkasir');
    Route::get('produk/print', [ProdukKasirController::class, 'show'])->name('printprodukkasir');


    //Pelanggan
    Route::resource('pelanggan', PelangganKasirController::class)->except('destroy','search','show');
    Route::get('/pelanggan', [PelangganKasirController::class, 'index'])->name('pelanggankasir');
    Route::get('pelanggan/tambah', [PelangganKasirController::class, 'create'])->name('tambahpelanggankasir');
    Route::post('pelanggan/tambah/action', [PelangganKasirController::class, 'store'])->name('actionpelanggankasir');
    Route::get('pelanggan/edit/{id}', [PelangganKasirController::class, 'edit'])->name('editpelanggankasir');
    Route::post('pelanggan/edit/{id}', [PelangganKasirController::class, 'update'])->name('updatepelanggankasir');
    Route::get('pelanggan/hapus/{id}', [PelangganKasirController::class, 'destroy'])->name('hapuspelanggankasir');
    Route::get('pelanggan/cari', [PelangganKasirController::class, 'search'])->name('caripelanggankasir');
    Route::get('pelanggan/print', [PelangganKasirController::class, 'show'])->name('printpelanggankasir');

    //Penjualan
    Route::resource('penjualan', PenjualanKasirController::class)->except('destroy','search','show');
    Route::get('penjualan/hapus/{id}', [PenjualanKasirController::class, 'destroy'])->name('hapuspenjualankasir');
    Route::get('penjualan/cari', [PenjualanKasirController::class, 'search'])->name('caripenjualankasir');
    Route::get('penjualan/print', [PenjualanKasirController::class, 'show'])->name('printpenjualankasir');

    
    //DetailPenjualan
    // Route::get('detailpenjualan', [DetailPenjualanKasirController::class, 'index'])->name('detailpenjualan');
    Route::post('penjualan/detail/tambah', [DetailPenjualanKasirController::class, 'store'])->name('detailpenjualankasir');
    Route::get('penjualan/detail/hapus', [DetailPenjualanKasirController::class, 'destroy'])->name('hapusdetailpenjualankasir');
    Route::post('penjualan/update', [DetailPenjualanKasirController::class, 'update'])->name('updatepenjualankasir');
    Route::post('penjualan/pelanggan', [DetailPenjualankasirController::class, 'create'])->name('memberpenjualankasir');


});
