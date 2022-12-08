<?php

use App\Http\Controllers\DebiturController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterSukuBungaController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
Route::get('/', [LoginController::class, 'index'])->middleware('isUser');
Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('isUser');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// end login route
Route::group(['middleware' => ['isLogout']], function(){
    Route::group(['middleware' => ['isLogin']], function(){
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        // master suku bunga
        Route::resource('master_suku_bunga', MasterSukuBungaController::class);
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
    });
});