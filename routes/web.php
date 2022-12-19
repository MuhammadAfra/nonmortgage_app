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

// login Route 
Route::get('/', [LoginController::class, 'index'])->name('loginform');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// End Login Route

Route::group(['middleware' => ['PreventBack']], function(){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::group(['middleware' => ['auth', 'cekLevel:Admin']], function(){
        // Master Parameter
        Route::resource('master_suku_bunga', MasterSukuBungaController::class);
        Route::resource('master_product', MasterProductController::class);
        Route::resource('master_pola_pembayaran', MasterPolaPembayaranController::class);
        Route::resource('master_sektor_ekonomi', MasterSektorEkonomiController::class);
        Route::resource('master_jenis_product', MasterJenisProductController::class);
        Route::resource('master_jenis_pembiayaan', MasterJenisPembiayaanController::class);
        Route::resource('master_skema_pembiayaan', MasterSkemaPembiayaanController::class);
        // End Master Parameter

        // Product
        Route::resource('product', ProductController::class);
        Route::get('/upload_product', [ProductController::class, 'upload'])->name('upload_product');
        Route::post('/upload_save', [ProductController::class, 'upload_save'])->name('upload_save');
        // End Product 

        // Debitur
        Route::resource('debitur', DebiturController::class);
        Route::get('/upload_debitur', [DebiturController::class, 'upload'])->name('upload_debitur');
        Route::post('/upload_save', [DebiturController::class, 'upload_save'])->name('upload_save');
        // End Debitur

        // Partner
        Route::resource('partner', PartnerController::class);
        Route::get('/upload_partner', [PartnerController::class, 'upload'])->name('upload_partner');
        Route::post('/upload_save', [PartnerController::class, 'upload_save'])->name('upload_save');
        // End Partner

        // User Management
        Route::resource('users', UserController::class);
        // End User Management
    });
    
    
    Route::group(['middleware' => ['auth', 'cekLevel:User']], function(){
        // Master Parameter
        Route::get('/suku_bunga', [MasterSukuBungaController::class, 'index'])->name('suku_bunga');
        Route::get('/masterProduct', [MasterProductController::class, 'index'])->name('masterProduct');
        Route::get('/pola_pembayaran', [MasterPolaPembayaranController::class, 'index'])->name('pola_pembayaran');
        Route::get('/sektor_ekonomi', [MasterSektorEkonomiController::class, 'index'])->name('sektor_ekonomi');
        Route::get('/jenis_product', [MasterJenisProductController::class, 'index'])->name('jenis_product');
        Route::get('/jenis_pembiayaan', [MasterJenisPembiayaanController::class, 'index'])->name('jenis_pembiayaan');
        Route::get('/skema_pembiayaan', [MasterSkemaPembiayaanController::class, 'index'])->name('skema_pembiayaan');
        // End Master Parameter

        // Product
        Route::get('/index_product', [ProductController::class, 'index'])->name('index_product');
        // End Product

        // Debitur
        Route::get('/index_debitur', [DebiturController::class, 'index'])->name('index_debitur');
        // Debitur

        // Partner
        Route::get('/index_partner', [PartnerController::class, 'index'])->name('index_partner');
        //End Partner
    });
});

