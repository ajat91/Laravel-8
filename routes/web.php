<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;

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
//     return view('layouts.master');
// });

Route::get('/', [HomeController::class,'index'] );
// Route::get('/home/about/{id}', [HomeController::class,'about'] );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//route user


//hak akses untuk admin
Route::group(['middleware'=>'admin'],function(){
    Route::get('/mobil', [MobilController::class,'index'] )->name('mobil');
    // Route::view('/siswa','v_siswa');
    // Route::view('/guru','v_guru');
    // Route::view('/user','v_user');
    Route::get('/mobil/detail/{id_mobil}', [MobilController::class,'detail'] );
    Route::get('/mobil/add', [MobilController::class,'add'] );
    Route::post('/mobil/insert', [MobilController::class,'insert'] );
    Route::get('/mobil/edit/{id_mobil}', [MobilController::class,'edit'] );
    Route::post('/mobil/update/{id_mobil}', [MobilController::class,'update'] );
    Route::get('/mobil/delete/{id_mobil}', [MobilController::class,'delete'] );
    Route::get('/pembeli', [PembeliController::class,'index'] );
    Route::get('/penjualan/print', [PembeliController::class,'print'] );
    Route::get('/penjualan/cetakpdf', [PembeliController::class,'cetakpdf'] );

});

//hak akses untuk user
Route::group(['middleware'=>'user'],function(){
    Route::get('/menuUser', [UserController::class,'index'] )->name('user');
});
//hak akses untuk pelanggan
Route::group(['middleware'=>'pelanggan'],function(){
    Route::get('/pelanggan', [PelangganController::class,'index'] )->name('pelanggan');
});