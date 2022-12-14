<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DebiturController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MasterProductController;
use App\Http\Controllers\MasterAsuransiController;
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
use App\Http\Controllers\CollateralMobilTambahanController;
use App\Http\Controllers\CollateralMotorTambahanController;
use App\Http\Controllers\CollateralRumahTambahanController;
use App\Http\Controllers\CollateralInvoiceTambahanController;
use App\Http\Controllers\CollateralCorporateTambahanController;
use App\Http\Controllers\CollateralInventoryTambahanController;
use App\Http\Controllers\DebiturBadanUsahaController;
use App\Models\Master_Asuransi;

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

Route::get('/dw_deb_akte_pendirian/{AKTE_PENDIRIAN}', [DebiturBadanUsahaController::class, 'download'])->name('dw_akte_pendirian');
Route::get('/dw_deb_tdp/{TDP}', [DebiturBadanUsahaController::class, 'download'])->name('dw_tdp');
Route::get('/dw_deb_finance_projection/{FINANCIAL_PROJECTION}', [DebiturBadanUsahaController::class, 'download'])->name('dw_finance_projection');
Route::get('/dw_deb_bank/{BANK_STATEMENT_LAST_3_MONTHS}', [DebiturBadanUsahaController::class, 'download'])->name('dw_bank');
Route::get('/dw_deb_company/{COMPANY_PROFILE}', [DebiturBadanUsahaController::class, 'download'])->name('dw_company');
Route::get('/dw_deb_nda/{NDA}', [DebiturBadanUsahaController::class, 'download'])->name('dw_nda');
Route::get('/dw_deb_risk_acc/{RISK_ACCEPTANCE_CRITERIA}', [DebiturBadanUsahaController::class, 'download'])->name('dw_risk_acc');
Route::get('/dw_deb_draft/{DRAFT_TEMPLATE}', [DebiturBadanUsahaController::class, 'download'])->name('dw_draft');
Route::get('/dw_deb_in_house/{IN_HOUSE_FINANCIAL}', [DebiturBadanUsahaController::class, 'download'])->name('dw_in_house');
Route::get('/dw_deb_audited/{AUDITED_FINANCIAL}', [DebiturBadanUsahaController::class, 'download'])->name('dw_audited');
Route::get('/dw_deb_mdl_akhir/{MODAL_PERUBAHAN_TERAKHIR}', [DebiturBadanUsahaController::class, 'download'])->name('dw_mdl_akhir');
Route::get('/dw_deb_npwp/{NPWP}', [DebiturBadanUsahaController::class, 'download'])->name('dw_npwp');
Route::get('/dw_deb_siup/{SIUP}', [DebiturBadanUsahaController::class, 'download'])->name('dw_siup');
Route::get('/dw_deb_akte_ad/{AKTE_PERUBAHAN_ANGGARAN_DASAR}', [DebiturBadanUsahaController::class, 'download'])->name('dw_akte_ad');
Route::get('/dw_deb_mdl_diri/{MODAL_PENDIRIAN}', [DebiturBadanUsahaController::class, 'download'])->name('dw_mdl_diri');

Route::group(['middleware' => ['PreventBack']], function(){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::group(['middleware' => ['auth', 'cekLevel:Admin']], function(){
        
        // master parameterize
        Route::resource('master_suku_bunga', MasterSukuBungaController::class);
        Route::resource('master_product', MasterProductController::class);
        Route::resource('master_pola_pembayaran', MasterPolaPembayaranController::class);
        Route::resource('master_sektor_ekonomi', MasterSektorEkonomiController::class);
        Route::resource('master_jenis_product', MasterJenisProductController::class);
        Route::resource('master_jenis_pembiayaan', MasterJenisPembiayaanController::class);
        Route::resource('master_skema_pembiayaan', MasterSkemaPembiayaanController::class);

        Route::resource('master_asuransi', MasterAsuransiController::class);
        // product
        Route::resource('product', ProductController::class);
        Route::post('/product_import', [ProductController::class, 'import'])->name('product_import');

        // debitur
        Route::resource('debitur', DebiturController::class);
        Route::post('/debitur_import', [DebiturController::class, 'import'])->name('debitur_import');

        // debitur badan usaha
        Route::resource('debitur_badan_usaha', DebiturBadanUsahaController::class);
        Route::post('/debitur_badan_usaha_import', [DebiturBadanUsahaController::class, 'import'])->name('debitur_badan_usaha_import');

        // partner
        Route::resource('partner', PartnerController::class);
        Route::post('/partner_import', [PartnerController::class, 'import'])->name('partner_import');

        // collateral motor
        Route::resource('collateral_motor', CollateralMotorController::class);
        Route::resource('collateral_motor_tambahan', CollateralMotorTambahanController::class);

        // collateral inventory
        Route::resource('collateral_inven', CollateralInventoryController::class);
        Route::resource('collateral_inven_tambahan', CollateralInventoryTambahanController::class);

        // collateral rumah
        Route::resource('collateral_rumah', CollateralRumahController::class);
        Route::resource('collateral_rumah_tambahan', CollateralRumahTambahanController::class);
        
        // collateral  mobil
        Route::resource('collateral_mobil', CollateralMobilController::class);
        Route::resource('collateral_mobil_tambahan', CollateralMobilTambahanController::class);

        // collateral invoice
        Route::resource('collateral_invoice', CollateralInvoiceController::class);
        Route::resource('collateral_invoice_tambahan', CollateralInvoiceTambahanController::class);

        // collateral corporate
        Route::resource('collateral_corporate', CollateralCorporateController::class);
        Route::resource('collateral_corporate_tambahan', CollateralCorporateTambahanController::class);

        // user management
        Route::resource('users', UserController::class);
    });
    
    Route::group(['middleware' => ['auth', 'cekLevel:User']], function(){
        // master parameterize
        Route::get('/suku_bunga', [MasterSukuBungaController::class, 'index'])->name('suku_bunga');
        Route::get('/masterProduct', [MasterProductController::class, 'index'])->name('masterProduct');
        Route::get('/pola_pembayaran', [MasterPolaPembayaranController::class, 'index'])->name('pola_pembayaran');
        Route::get('/sektor_ekonomi', [MasterSektorEkonomiController::class, 'index'])->name('sektor_ekonomi');
        Route::get('/jenis_product', [MasterJenisProductController::class, 'index'])->name('jenis_product');
        Route::get('/jenis_pembiayaan', [MasterJenisPembiayaanController::class, 'index'])->name('jenis_pembiayaan');
        Route::get('/skema_pembiayaan', [MasterSkemaPembiayaanController::class, 'index'])->name('skema_pembiayaan');
        Route::get('/asuransi', [MasterAsuransiController::class, 'index'])->name('asuransi');
        // product
        Route::get('/index_product', [ProductController::class, 'index'])->name('index_product');
        // debitur
        Route::get('/index_debitur', [DebiturController::class, 'index'])->name('index_debitur');
        // debitur_badan_usaha
        Route::get('/index_debitur_badan_usaha', [DebiturController::class, 'index'])->name('index_debitur_badan_usaha');
        // partner
        Route::get('/index_partner', [PartnerController::class, 'index'])->name('index_partner');
        // collaterals utama
        Route::get('/colls_motor_utama', [CollateralMotorController::class, 'index'])->name('colls_motor_utama');
        Route::get('/colls_mobil_utama', [CollateralMobilController::class, 'index'])->name('colls_mobil_utama');
        Route::get('/colls_rumah_utama', [CollateralRumahController::class, 'index'])->name('colls_rumah_utama');
        Route::get('/colls_inven_utama', [CollateralInventoryController::class, 'index'])->name('colls_inven_utama');
        Route::get('/colls_invoice_utama', [CollateralInvoiceController::class, 'index'])->name('colls_invoice_utama');
        Route::get('/colls_corporate_utama', [CollateralCorporateController::class, 'index'])->name('colls_corporate_utama');
        // collaterals tambahan
        Route::get('/colls_motor_tambahan', [CollateralMotorTambahanController::class, 'index'])->name('colls_motor_tambahan');
        Route::get('/colls_mobil_tambahan', [CollateralMobilTambahanController::class, 'index'])->name('colls_mobil_tambahan');
        Route::get('/colls_rumah_tambahan', [CollateralRumahTambahanController::class, 'index'])->name('colls_rumah_tambahan');
        Route::get('/colls_inven_tambahan', [CollateralInventoryTambahanController::class, 'index'])->name('colls_inven_tambahan');
        Route::get('/colls_invoice_tambahan', [CollateralInvoiceTambahanController::class, 'index'])->name('colls_invoice_tambahan');
        Route::get('/colls_corporate_tambahan', [CollateralCorporateTambahanController::class, 'index'])->name('colls_corporate_tambahan');
    });
});