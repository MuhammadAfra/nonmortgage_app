<?php

namespace App\Http\Controllers;

use App\Imports\DebiturBadanUsahaImport;
use Illuminate\Http\Request;
use App\Models\Master_Product;
use App\Models\Master_Asuransi;
use App\Models\Debitur_Badan_Usaha;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class DebiturBadanUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deb = Debitur_Badan_Usaha::all();
        return view('debitur_badan_usaha.index', compact('deb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prod = Master_Product::all();
        $asuransi = Master_Asuransi::all();
        return view('debitur_badan_usaha.create', compact('prod', 'asuransi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'AKTE_PENDIRIAN' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'COMPANY_PROFILE' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'AKTE_PERUBAHAN_ANGGARAN_DASAR' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'SIUP' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'TDP' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'NPWP' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'MODAL_PENDIRIAN' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'MODAL_PERUBAHAN_TERAKHIR' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'BANK_STATEMENT_LAST_3_MONTHS' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'DRAFT_TEMPLATE_AGREEMENT_END_USER' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'CONTOH_RISK_ACCEPTANCE_CRITERIA' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'NDA_DOCUMENT' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
        ]);

        
        // $deb = Debitur_Badan_Usaha::create($request->all());
        if ($request->Nilai_Asuransi != NULL) {
            $asuransi = str_replace( ',', '', $request->Nilai_Asuransi);
        }else{
            $asuransi = NULL;
        }

        if ($request->Nilai_Sertifikat_Tanah != NULL) {
            $tanah = str_replace( ',', '', $request->Nilai_Sertifikat_Tanah);
        }else{
            $tanah = NULL;
        }

        if ($request->Nilai_Kendaraan_Bermotor_Mobil != NULL) {
            $mobil = str_replace( ',', '', $request->Nilai_Kendaraan_Bermotor_Mobil);
        }else{
            $mobil = NULL;
        }

        if ($request->Nilai_Kendaraan_Bermotor_Motor != NULL) {
            $motor = str_replace( ',', '', $request->Nilai_Kendaraan_Bermotor_Motor);
        }else{
            $motor = NULL;
        }

        if ($request->Nilai_Personel_Guarantee != NULL) {
            $personal = str_replace( ',', '', $request->Nilai_Personel_Guarantee);
        }else{
            $personal = NULL;
        }

        if ($request->Nilai_Invoice != NULL) {
            $invoice = str_replace( ',', '', $request->Nilai_Invoice);
        }else{
            $invoice = NULL;
        }

        if ($request->Nilai_Inventory != NULL) {
            $inventori = str_replace( ',', '', $request->Nilai_Inventory);
        }else{
            $inventori = NULL;
        }

        if ($request->DOWN_PAYMENT_CUSTOMER != NULL) {
            $dp = str_replace( ',', '', $request->DOWN_PAYMENT_CUSTOMER);
        }else{
            $dp = NULL;
        }

        $deb = new Debitur_Badan_Usaha();
        $deb->NAMA_PERUSAHAAN = $request->NAMA_PERUSAHAAN;
        $deb->ALAMAT_PERUSAHAAN = $request->ALAMAT_PERUSAHAAN;
        $deb->STATUS_BADAN_HUKUM = $request->STATUS_BADAN_HUKUM;
        $deb->COMPANY_PROFILE = $request->COMPANY_PROFILE;
        $deb->AKTE_LAIN_LAIN = $request->AKTE_LAIN_LAIN;
        $deb->DETIL_PRODUCT_PROFILE = $request->DETIL_PRODUCT_PROFILE;
        $deb->AKTE_PERUBAHAN_ANGGARAN_DASAR = $request->AKTE_PERUBAHAN_ANGGARAN_DASAR;
        $deb->SIUP = $request->SIUP;
        $deb->TDP = $request->TDP;
        $deb->NPWP = $request->NPWP;
        $deb->Nama_Direktur_Utama = $request->Nama_Direktur_Utama;
        $deb->No_Identitas_Direktur_Utama = $request->No_Identitas_Direktur_Utama;
        $deb->Nama_Direktur1 = $request->Nama_Direktur1;
        $deb->No_Identitas_Direktur1 = $request->No_Identitas_Direktur1;
        $deb->Nama_Direktur_2 = $request->Nama_Direktur_2;
        $deb->No_Identitas_Direktur2 = $request->No_Identitas_Direktur2;
        $deb->MODAL_PENDIRIAN = $request->MODAL_PENDIRIAN;
        $deb->MODAL_PERUBAHAN_TERAKHIR = $request->MODAL_PERUBAHAN_TERAKHIR;
        $deb->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS = $request->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS;
        $deb->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR = $request->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR;
        $deb->BANK_STATEMENT_LAST_3_MONTHS = $request->BANK_STATEMENT_LAST_3_MONTHS;
        $deb->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS = $request->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS;
        $deb->DRAFT_TEMPLATE_AGREEMENT_END_USER = $request->DRAFT_TEMPLATE_AGREEMENT_END_USER;
        $deb->CONTOH_RISK_ACCEPTANCE_CRITERIA = $request->CONTOH_RISK_ACCEPTANCE_CRITERIA;
        $deb->NDA_DOCUMENT = $request->NDA_DOCUMENT;
        $deb->Jenis_Asuransi_Id = $request->Jenis_Asuransi_Id;
        $deb->Perusahaan_Asuransi = $request->Perusahaan_Asuransi;
        $deb->Persen_Asuransi = $request->Persen_Asuransi;
        $deb->Nilai_Asuransi = $asuransi;
        $deb->Jaminan_Sertifikat_Tanah = $request->Jaminan_Sertifikat_Tanah;
        $deb->Nilai_Sertifikat_Tanah = $tanah;
        $deb->Jaminan_Kendaraan_Bermotor_Mobil = $request->Jaminan_Kendaraan_Bermotor_Mobil;
        $deb->Nilai_Kendaraan_Bermotor_Mobil = $mobil;
        $deb->Jaminan_Kendaraan_Bermotor_Motor = $request->Jaminan_Kendaraan_Bermotor_Motor;
        $deb->Nilai_Kendaraan_Bermotor_Motor = $motor;
        $deb->Jaminan_Personel_Guarantee = $request->Jaminan_Personel_Guarantee;
        $deb->Nilai_Personel_Guarantee = $personal;
        $deb->Jaminan_Invoice = $request->Jaminan_Invoice;
        $deb->Nilai_Invoice = $invoice;
        $deb->Jaminan_Inventory = $request->Jaminan_Inventory;
        $deb->Nilai_Inventory = $inventori;
        $deb->Jaminan_Lainnya = $request->Jaminan_Lainnya;
        $deb->APAKAH_ADA_DP = $request->APAKAH_ADA_DP;
        $deb->DOWN_PAYMENT_CUSTOMER = $dp;
        $deb->Status = $request->Status;
        $deb->save();

        if($request->hasFile('AKTE_PENDIRIAN'))
        {
            $request->file('AKTE_PENDIRIAN')->move('data_debitur/', $request->file('AKTE_PENDIRIAN')->getClientOriginalName());
            $deb->AKTE_PENDIRIAN = $request->file('AKTE_PENDIRIAN')->getClientOriginalName();
            $deb->save();
        }
        
        if($request->hasFile('COMPANY_PROFILE'))
        {
            $request->file('COMPANY_PROFILE')->move('data_debitur/', $request->file('COMPANY_PROFILE')->getClientOriginalName());
            $deb->COMPANY_PROFILE = $request->file('COMPANY_PROFILE')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('AKTE_LAIN_LAIN'))
        {
            $request->file('AKTE_LAIN_LAIN')->move('data_debitur/', $request->file('AKTE_LAIN_LAIN')->getClientOriginalName());
            $deb->AKTE_LAIN_LAIN = $request->file('AKTE_LAIN_LAIN')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('AKTE_PERUBAHAN_ANGGARAN_DASAR'))
        {
            $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->move('data_debitur/', $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->getClientOriginalName());
            $deb->AKTE_PERUBAHAN_ANGGARAN_DASAR = $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('SIUP'))
        {
            $request->file('SIUP')->move('data_debitur/', $request->file('SIUP')->getClientOriginalName());
            $deb->SIUP = $request->file('SIUP')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('TDP'))
        {
            $request->file('TDP')->move('data_debitur/', $request->file('TDP')->getClientOriginalName());
            $deb->TDP = $request->file('TDP')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('NPWP'))
        {
            $request->file('NPWP')->move('data_debitur/', $request->file('NPWP')->getClientOriginalName());
            $deb->NPWP = $request->file('NPWP')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('MODAL_PENDIRIAN'))
        {
            $request->file('MODAL_PENDIRIAN')->move('data_debitur/', $request->file('MODAL_PENDIRIAN')->getClientOriginalName());
            $deb->MODAL_PENDIRIAN = $request->file('MODAL_PENDIRIAN')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('MODAL_PERUBAHAN_TERAKHIR'))
        {
            $request->file('MODAL_PERUBAHAN_TERAKHIR')->move('data_debitur/', $request->file('MODAL_PERUBAHAN_TERAKHIR')->getClientOriginalName());
            $deb->MODAL_PERUBAHAN_TERAKHIR = $request->file('MODAL_PERUBAHAN_TERAKHIR')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS'))
        {   
            $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->move('data_debitur/', $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->getClientOriginalName());
            $deb->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS = $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR'))
        {
           $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->move('data_debitur/', $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->getClientOriginalName());
            $deb->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR = $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('BANK_STATEMENT_LAST_3_MONTHS'))
        {
            $request->file('BANK_STATEMENT_LAST_3_MONTHS')->move('data_debitur/', $request->file('BANK_STATEMENT_LAST_3_MONTHS')->getClientOriginalName());
            $deb->BANK_STATEMENT_LAST_3_MONTHS = $request->file('BANK_STATEMENT_LAST_3_MONTHS')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS'))
        {
            $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->move('data_debitur/', $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->getClientOriginalName());
            $deb->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS = $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->getClientOriginalName();
            $deb->save();
        }
        
        if($request->hasFile('DRAFT_TEMPLATE_AGREEMENT_END_USER'))
        {
            $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->move('data_debitur/', $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->getClientOriginalName());
            $deb->DRAFT_TEMPLATE_AGREEMENT_END_USER = $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('CONTOH_RISK_ACCEPTANCE_CRITERIA'))
        {
            $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->move('data_debitur/', $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->getClientOriginalName());
            $deb->CONTOH_RISK_ACCEPTANCE_CRITERIA = $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->getClientOriginalName();
            $deb->save();
        }
        
        if($request->hasFile('NDA_DOCUMENT'))
        {
            $request->file('NDA_DOCUMENT')->move('data_debitur/', $request->file('NDA_DOCUMENT')->getClientOriginalName());
            $deb->NDA_DOCUMENT = $request->file('NDA_DOCUMENT')->getClientOriginalName();
            $deb->save();
        }

        return redirect('debitur_badan_usaha');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debitur_Badan_Usaha  $debitur_Badan_Usaha
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deb = Debitur_Badan_Usaha::findorfail($id);
        return view('debitur_badan_usaha.detail', compact('deb'));
    }

    public function download($file)
    {
        return response()->download(public_path('data_debitur/'.$file));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debitur_Badan_Usaha  $debitur_Badan_Usaha
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deb = Debitur_Badan_Usaha::findorfail($id);
        $asuransi = Master_Asuransi::all();
        $m_prod = Master_Product::all();
        return view('debitur_badan_usaha.edit', compact('deb','asuransi','m_prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Debitur_Badan_Usaha  $debitur_Badan_Usaha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $deb = Debitur_Badan_Usaha::findorfail($id);
        if ($request->Nilai_Asuransi != NULL) {
            $asuransi = str_replace( ',', '', $request->Nilai_Asuransi);
        }else{
            $asuransi = NULL;
        }

        if ($request->Nilai_Sertifikat_Tanah != NULL) {
            $tanah = str_replace( ',', '', $request->Nilai_Sertifikat_Tanah);
        }else{
            $tanah = NULL;
        }

        if ($request->Nilai_Kendaraan_Bermotor_Mobil != NULL) {
            $mobil = str_replace( ',', '', $request->Nilai_Kendaraan_Bermotor_Mobil);
        }else{
            $mobil = NULL;
        }

        if ($request->Nilai_Kendaraan_Bermotor_Motor != NULL) {
            $motor = str_replace( ',', '', $request->Nilai_Kendaraan_Bermotor_Motor);
        }else{
            $motor = NULL;
        }

        if ($request->Nilai_Personel_Guarantee != NULL) {
            $personal = str_replace( ',', '', $request->Nilai_Personel_Guarantee);
        }else{
            $personal = NULL;
        }

        if ($request->Nilai_Invoice != NULL) {
            $invoice = str_replace( ',', '', $request->Nilai_Invoice);
        }else{
            $invoice = NULL;
        }

        if ($request->Nilai_Inventory != NULL) {
            $inventori = str_replace( ',', '', $request->Nilai_Inventory);
        }else{
            $inventori = NULL;
        }

        if ($request->DOWN_PAYMENT_CUSTOMER != NULL) {
            $dp = str_replace( ',', '', $request->DOWN_PAYMENT_CUSTOMER);
        }else{
            $dp = NULL;
        }

        $deb->NAMA_PERUSAHAAN = $request->NAMA_PERUSAHAAN;
        $deb->ALAMAT_PERUSAHAAN = $request->ALAMAT_PERUSAHAAN;
        $deb->STATUS_BADAN_HUKUM = $request->STATUS_BADAN_HUKUM;
        $deb->COMPANY_PROFILE = $request->COMPANY_PROFILE;
        $deb->AKTE_LAIN_LAIN = $request->AKTE_LAIN_LAIN;
        $deb->DETIL_PRODUCT_PROFILE = $request->DETIL_PRODUCT_PROFILE;
        $deb->AKTE_PERUBAHAN_ANGGARAN_DASAR = $request->AKTE_PERUBAHAN_ANGGARAN_DASAR;
        $deb->SIUP = $request->SIUP;
        $deb->TDP = $request->TDP;
        $deb->NPWP = $request->NPWP;
        $deb->Nama_Direktur_Utama = $request->Nama_Direktur_Utama;
        $deb->No_Identitas_Direktur_Utama = $request->No_Identitas_Direktur_Utama;
        $deb->Nama_Direktur1 = $request->Nama_Direktur1;
        $deb->No_Identitas_Direktur1 = $request->No_Identitas_Direktur1;
        $deb->Nama_Direktur_2 = $request->Nama_Direktur_2;
        $deb->No_Identitas_Direktur2 = $request->No_Identitas_Direktur2;
        $deb->MODAL_PENDIRIAN = $request->MODAL_PENDIRIAN;
        $deb->MODAL_PERUBAHAN_TERAKHIR = $request->MODAL_PERUBAHAN_TERAKHIR;
        $deb->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS = $request->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS;
        $deb->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR = $request->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR;
        $deb->BANK_STATEMENT_LAST_3_MONTHS = $request->BANK_STATEMENT_LAST_3_MONTHS;
        $deb->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS = $request->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS;
        $deb->DRAFT_TEMPLATE_AGREEMENT_END_USER = $request->DRAFT_TEMPLATE_AGREEMENT_END_USER;
        $deb->CONTOH_RISK_ACCEPTANCE_CRITERIA = $request->CONTOH_RISK_ACCEPTANCE_CRITERIA;
        $deb->NDA_DOCUMENT = $request->NDA_DOCUMENT;
        $deb->Jenis_Asuransi_Id = $request->Jenis_Asuransi_Id;
        $deb->Perusahaan_Asuransi = $request->Perusahaan_Asuransi;
        $deb->Persen_Asuransi = $request->Persen_Asuransi;
        $deb->Nilai_Asuransi = $asuransi;
        $deb->Jaminan_Sertifikat_Tanah = $request->Jaminan_Sertifikat_Tanah;
        $deb->Nilai_Sertifikat_Tanah = $tanah;
        $deb->Jaminan_Kendaraan_Bermotor_Mobil = $request->Jaminan_Kendaraan_Bermotor_Mobil;
        $deb->Nilai_Kendaraan_Bermotor_Mobil = $mobil;
        $deb->Jaminan_Kendaraan_Bermotor_Motor = $request->Jaminan_Kendaraan_Bermotor_Motor;
        $deb->Nilai_Kendaraan_Bermotor_Motor = $motor;
        $deb->Jaminan_Personel_Guarantee = $request->Jaminan_Personel_Guarantee;
        $deb->Nilai_Personel_Guarantee = $personal;
        $deb->Jaminan_Invoice = $request->Jaminan_Invoice;
        $deb->Nilai_Invoice = $invoice;
        $deb->Jaminan_Inventory = $request->Jaminan_Inventory;
        $deb->Nilai_Inventory = $inventori;
        $deb->Jaminan_Lainnya = $request->Jaminan_Lainnya;
        $deb->APAKAH_ADA_DP = $request->APAKAH_ADA_DP;
        $deb->DOWN_PAYMENT_CUSTOMER = $dp;
        $deb->Status = $request->Status;
        $deb->save();
        
        if($request->hasFile('AKTE_PENDIRIAN'))
        {
            $request->file('AKTE_PENDIRIAN')->move('data_debitur/', $request->file('AKTE_PENDIRIAN')->getClientOriginalName());
            $deb->AKTE_PENDIRIAN = $request->file('AKTE_PENDIRIAN')->getClientOriginalName();
            $deb->save();
        }
        
        if($request->hasFile('COMPANY_PROFILE'))
        {
            $request->file('COMPANY_PROFILE')->move('data_debitur/', $request->file('COMPANY_PROFILE')->getClientOriginalName());
            $deb->COMPANY_PROFILE = $request->file('COMPANY_PROFILE')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('AKTE_LAIN_LAIN'))
        {
            $request->file('AKTE_LAIN_LAIN')->move('data_debitur/', $request->file('AKTE_LAIN_LAIN')->getClientOriginalName());
            $deb->AKTE_LAIN_LAIN = $request->file('AKTE_LAIN_LAIN')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('AKTE_PERUBAHAN_ANGGARAN_DASAR'))
        {
            $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->move('data_debitur/', $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->getClientOriginalName());
            $deb->AKTE_PERUBAHAN_ANGGARAN_DASAR = $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('SIUP'))
        {
            $request->file('SIUP')->move('data_debitur/', $request->file('SIUP')->getClientOriginalName());
            $deb->SIUP = $request->file('SIUP')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('TDP'))
        {
            $request->file('TDP')->move('data_debitur/', $request->file('TDP')->getClientOriginalName());
            $deb->TDP = $request->file('TDP')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('NPWP'))
        {
            $request->file('NPWP')->move('data_debitur/', $request->file('NPWP')->getClientOriginalName());
            $deb->NPWP = $request->file('NPWP')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('MODAL_PENDIRIAN'))
        {
            $request->file('MODAL_PENDIRIAN')->move('data_debitur/', $request->file('MODAL_PENDIRIAN')->getClientOriginalName());
            $deb->MODAL_PENDIRIAN = $request->file('MODAL_PENDIRIAN')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('MODAL_PERUBAHAN_TERAKHIR'))
        {
            $request->file('MODAL_PERUBAHAN_TERAKHIR')->move('data_debitur/', $request->file('MODAL_PERUBAHAN_TERAKHIR')->getClientOriginalName());
            $deb->MODAL_PERUBAHAN_TERAKHIR = $request->file('MODAL_PERUBAHAN_TERAKHIR')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS'))
        {   
            $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->move('data_debitur/', $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->getClientOriginalName());
            $deb->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS = $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR'))
        {
           $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->move('data_debitur/', $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->getClientOriginalName());
            $deb->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR = $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('BANK_STATEMENT_LAST_3_MONTHS'))
        {
            $request->file('BANK_STATEMENT_LAST_3_MONTHS')->move('data_debitur/', $request->file('BANK_STATEMENT_LAST_3_MONTHS')->getClientOriginalName());
            $deb->BANK_STATEMENT_LAST_3_MONTHS = $request->file('BANK_STATEMENT_LAST_3_MONTHS')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS'))
        {
            $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->move('data_debitur/', $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->getClientOriginalName());
            $deb->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS = $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->getClientOriginalName();
            $deb->save();
        }
        
        if($request->hasFile('DRAFT_TEMPLATE_AGREEMENT_END_USER'))
        {
            $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->move('data_debitur/', $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->getClientOriginalName());
            $deb->DRAFT_TEMPLATE_AGREEMENT_END_USER = $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->getClientOriginalName();
            $deb->save();
        }

        if($request->hasFile('CONTOH_RISK_ACCEPTANCE_CRITERIA'))
        {
            $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->move('data_debitur/', $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->getClientOriginalName());
            $deb->CONTOH_RISK_ACCEPTANCE_CRITERIA = $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->getClientOriginalName();
            $deb->save();
        }
        
        if($request->hasFile('NDA_DOCUMENT'))
        {
            $request->file('NDA_DOCUMENT')->move('data_debitur/', $request->file('NDA_DOCUMENT')->getClientOriginalName());
            $deb->NDA_DOCUMENT = $request->file('NDA_DOCUMENT')->getClientOriginalName();
            $deb->save();
        }

        return redirect('debitur_badan_usaha');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debitur_Badan_Usaha  $debitur_Badan_Usaha
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deb = Debitur_Badan_Usaha::findorfail($id);
        
        // delete file
        File::delete('data_debitur/'.$deb->AKTE_PENDIRIAN);
        File::delete('data_debitur/'.$deb->COMPANY_PROFILE);
        File::delete('data_debitur/'.$deb->SIUP);
        File::delete('data_debitur/'.$deb->TDP);
        File::delete('data_debitur/'.$deb->NPWP);
        File::delete('data_debitur/'.$deb->MODAL_PENDIRIAN);
        File::delete('data_debitur/'.$deb->MODAL_PERUBAHAN_TERAKHIR);
        File::delete('data_debitur/'.$deb->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS);
        File::delete('data_debitur/'.$deb->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR);
        File::delete('data_debitur/'.$deb->BANK_STATEMENT_LAST_3_MONTHS);
        File::delete('data_debitur/'.$deb->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS);
        File::delete('data_debitur/'.$deb->DRAFT_TEMPLATE_AGREEMENT_END_USER);
        File::delete('data_debitur/'.$deb->CONTOH_RISK_ACCEPTANCE_CRITERIA);
        File::delete('data_debitur/'.$deb->NDA_DOCUMENT);

        // delete data
        $deb->delete();
        return redirect('debitur_badan_usaha');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $file->move('import/product',$nama_file);

        Excel::import(new DebiturBadanUsahaImport, public_path('/import/product/'.$nama_file));

        Session::flash('sukses','Data Debitur Badan Usaha Berhasil Diimport!');
        return redirect('debitur_badan_usaha');
    }
}
