<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DebiturController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MasterProductController;
use App\Http\Controllers\CollateralMobilController;
use App\Http\Controllers\CollateralMotorController;
use App\Http\Controllers\CollateralRumahController;
use App\Http\Controllers\CollateralUtamaController;
use App\Http\Controllers\MasterSukuBungaController;
use App\Http\Controllers\CollateralInvoiceController;
use App\Http\Controllers\MasterJenisProductController;
use App\Http\Controllers\CollateralCorporateController;
use App\Http\Controllers\CollateralInventoryController;
use App\Http\Controllers\MasterSektorEkonomiController;
use App\Http\Controllers\MasterPolaPembayaranController;
use App\Http\Controllers\MasterJenisPembiayaanController;
use App\Http\Controllers\MasterSkemaPembiayaanController;
use App\Http\Controllers\CollateralRumahTambahanController;
use App\Http\Controllers\CollateralInvoiceTambahanController;
use App\Http\Controllers\CollateralCorporateTambahanController;
use App\Http\Controllers\CollateralInventoryTambahanController;

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

Route::get('/dw_akte_pendirian/{AKTE_PENDIRIAN}', [PartnerController::class, 'download'])->name('dw_akte_pendirian');
Route::get('/dw_tdp/{TDP}', [PartnerController::class, 'download'])->name('dw_tdp');
Route::get('/dw_finance_projection/{FINANCIAL_PROJECTION}', [PartnerController::class, 'download'])->name('dw_finance_projection');
Route::get('/dw_bank/{BANK_STATEMENT_LAST_3_MONTHS}', [PartnerController::class, 'download'])->name('dw_bank');
Route::get('/dw_company/{COMPANY_PROFILE}', [PartnerController::class, 'download'])->name('dw_company');
Route::get('/dw_nda/{NDA}', [PartnerController::class, 'download'])->name('dw_nda');
Route::get('/dw_risk_acc/{RISK_ACCEPTANCE_CRITERIA}', [PartnerController::class, 'download'])->name('dw_risk_acc');
Route::get('/dw_draft/{DRAFT_TEMPLATE}', [PartnerController::class, 'download'])->name('dw_draft');
Route::get('/dw_in_house/{IN_HOUSE_FINANCIAL}', [PartnerController::class, 'download'])->name('dw_in_house');
Route::get('/dw_audited/{AUDITED_FINANCIAL}', [PartnerController::class, 'download'])->name('dw_audited');
Route::get('/dw_mdl_akhir/{MODAL_PERUBAHAN_TERAKHIR}', [PartnerController::class, 'download'])->name('dw_mdl_akhir');
Route::get('/dw_npwp/{NPWP}', [PartnerController::class, 'download'])->name('dw_npwp');
Route::get('/dw_siup/{SIUP}', [PartnerController::class, 'download'])->name('dw_siup');
Route::get('/dw_akte_ad/{AKTE_PERUBAHAN_ANGGARAN_DASAR}', [PartnerController::class, 'download'])->name('dw_akte_ad');
Route::get('/dw_mdl_diri/{MODAL_PENDIRIAN}', [PartnerController::class, 'download'])->name('dw_mdl_diri');

Route::group(['middleware' => ['PreventBack']], function(){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::group(['middleware' => ['auth', 'cekLevel:Admin']], function(){
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
        Route::post('/product_import', [ProductController::class, 'import'])->name('product_import');
        // debitur
        Route::resource('debitur', DebiturController::class);
        Route::post('/debitur_import', [DebiturController::class, 'import'])->name('debitur_import');

        // partner
        Route::resource('partner', PartnerController::class);
        Route::post('/add_product', [PartnerController::class, 'add_product'])->name('add_product');

        // collateral utama - motor
        Route::resource('collateral_motor', CollateralMotorController::class);

        // collateral inven
        Route::resource('collateral_inven', CollateralInventoryController::class);
        Route::resource('collateral_inven_tambahan', CollateralInventoryTambahanController::class);

        // collateral rumah
        Route::resource('collateral_rumah', CollateralRumahController::class);
        Route::resource('collateral_rumah_tambahan', CollateralRumahTambahanController::class);
        
        // collateral utama - mobil
        Route::resource('collateral_mobil', CollateralMobilController::class);

        // collateral utama - invoice
        Route::resource('collateral_invoice', CollateralInvoiceController::class);
        Route::resource('collateral_invoice_tambahan', CollateralInvoiceTambahanController::class);

        // collateral corporate
        Route::resource('collateral_corporate', CollateralCorporateController::class);
        Route::resource('collateral_corporate_tambahan', CollateralCorporateTambahanController::class);

        // user management
        Route::resource('users', UserController::class);
    });
    
    Route::group(['middleware' => ['auth', 'cekLevel:User']], function(){
        // master suku bunga
        Route::get('/suku_bunga', [MasterSukuBungaController::class, 'index'])->name('suku_bunga');
        Route::get('/masterProduct', [MasterProductController::class, 'index'])->name('masterProduct');
        Route::get('/pola_pembayaran', [MasterPolaPembayaranController::class, 'index'])->name('pola_pembayaran');
        Route::get('/sektor_ekonomi', [MasterSektorEkonomiController::class, 'index'])->name('sektor_ekonomi');
        Route::get('/jenis_product', [MasterJenisProductController::class, 'index'])->name('jenis_product');
        Route::get('/jenis_pembiayaan', [MasterJenisPembiayaanController::class, 'index'])->name('jenis_pembiayaan');
        Route::get('/skema_pembiayaan', [MasterSkemaPembiayaanController::class, 'index'])->name('skema_pembiayaan');
        // product
        Route::get('/index_product', [ProductController::class, 'index'])->name('index_product');
        // debitur
        Route::get('/index_debitur', [DebiturController::class, 'index'])->name('index_debitur');
        // partner
        Route::get('/index_partner', [PartnerController::class, 'index'])->name('index_partner');
    });
});