<?php

use App\Http\Controllers\DebiturController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterJenisPembiayaanController;
use App\Http\Controllers\MasterJenisProductController;
use App\Http\Controllers\MasterPolaPembayaranController;
use App\Http\Controllers\MasterProductController;
use App\Http\Controllers\MasterSektorEkonomiController;
use App\Http\Controllers\MasterSkemaPembiayaanController;
use App\Http\Controllers\MasterSukuBungaController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

// login route 
Route::get('/', [LoginController::class, 'index'])->name('loginform');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// end login route

Route::group(['middleware' => ['PreventBack']], function(){
    Route::group(['middleware' => ['auth', 'cekLevel:Admin,User']], function(){
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        // master suku bunga
        Route::resource('master_suku_bunga', MasterSukuBungaController::class);
        Route::resource('master_product', MasterProductController::class);
        Route::resource('master_pola_pembayaran', MasterPolaPembayaranController::class);
        Route::resource('master_sektor_ekonomi', MasterSektorEkonomiController::class);
        Route::resource('master_jenis_product', MasterJenisProductController::class);
        Route::resource('master_jenis_pembiayaan', MasterJenisPembiayaanController::class);
        Route::resource('master_skema_pembiayaan', MasterSkemaPembiayaanController::class);
        // product
        Route::resource('product', ProductController::class);
        Route::get('/upload_product', [ProductController::class, 'upload'])->name('upload_product');
        Route::post('/upload_save', [ProductController::class, 'upload_save'])->name('upload_save');
        // debitur
        Route::resource('debitur', DebiturController::class);
        Route::get('/upload_debitur', [DebiturController::class, 'upload'])->name('upload_debitur');
        Route::post('/upload_save', [DebiturController::class, 'upload_save'])->name('upload_save');
        // partner
        Route::resource('partner', PartnerController::class);
        Route::get('/upload_partner', [PartnerController::class, 'upload'])->name('upload_partner');
        Route::post('/upload_save', [PartnerController::class, 'upload_save'])->name('upload_save');
        Route::group(['middleware' => ['auth', 'cekLevel:Admin']], function(){
            Route::resource('users', UserController::class);
        });
    });
});
