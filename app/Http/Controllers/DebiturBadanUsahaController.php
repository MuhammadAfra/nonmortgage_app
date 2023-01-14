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
            'files' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
            'files.*' => 'mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
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

        if ($request->hasFile('AKTE_LAIN_LAIN')) 
        {
            foreach ($request->file('AKTE_LAIN_LAIN') as $all) {
                $akte_name = time().'_'.rand(1,9999).'_'.$all->getClientOriginalExtension();
                $all->move(public_path().'/data_debitur/', $akte_name);
                $data[] = $akte_name;
            }
        }
        $deb->AKTE_LAIN_LAIN = json_encode($data);
        $deb->save();
        
        if($request->hasFile('AKTE_PENDIRIAN'))
        {
            $name_ap = time().'_'.rand(1,9999).'_'.$request->AKTE_PENDIRIAN->getClientOriginalExtension();
            $request->file('AKTE_PENDIRIAN')->move(public_path().'/data_debitur/', $name_ap);
            $deb->AKTE_PENDIRIAN = $name_ap;
            $deb->save();
        }
        
        if($request->hasFile('COMPANY_PROFILE'))
        {
            $name_cp = time().'_'.rand(1,9999).'_'.$request->COMPANY_PROFILE->getClientOriginalExtension();
            $request->file('COMPANY_PROFILE')->move(public_path().'/data_debitur/', $name_cp);
            $deb->COMPANY_PROFILE = $name_cp;
            $deb->save();
        }

        if($request->hasFile('AKTE_PERUBAHAN_ANGGARAN_DASAR'))
        {
            $name_apad = time().'_'.rand(1,9999).'_'.$request->AKTE_PERUBAHAN_ANGGARAN_DASAR->getClientOriginalExtension();
            $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->move(public_path().'/data_debitur/', $name_apad);
            $deb->AKTE_PERUBAHAN_ANGGARAN_DASAR = $name_apad;
            $deb->save();
        }

        if($request->hasFile('SIUP'))
        {
            $name_siup = time().'_'.rand(1,9999).'_'.$request->SIUP->getClientOriginalExtension();
            $request->file('SIUP')->move(public_path().'/data_debitur/', $name_siup);
            $deb->SIUP = $name_siup;
            $deb->save();
        }

        if($request->hasFile('TDP'))
        {
            $name_tdp = time().'_'.rand(1,9999).'_'.$request->TDP->getClientOriginalExtension();
            $request->file('TDP')->move(public_path().'/data_debitur/', $name_tdp);
            $deb->TDP = $name_tdp;
            $deb->save();
        }

        if($request->hasFile('NPWP'))
        {
            $name_npwp = time().'_'.rand(1,9999).'_'.$request->NPWP->getClientOriginalExtension();
            $request->file('NPWP')->move(public_path().'/data_debitur/', $name_npwp);
            $deb->NPWP = $name_npwp;
            $deb->save();
        }

        if($request->hasFile('MODAL_PENDIRIAN'))
        {
            $name_mp = time().'_'.rand(1,9999).'_'.$request->MODAL_PENDIRIAN->getClientOriginalExtension();
            $request->file('MODAL_PENDIRIAN')->move(public_path().'/data_debitur/', $name_mp);
            $deb->MODAL_PENDIRIAN = $name_mp;
            $deb->save();
        }

        if($request->hasFile('MODAL_PERUBAHAN_TERAKHIR'))
        {
            $name_mpt = time().'_'.rand(1,9999).'_'.$request->MODAL_PERUBAHAN_TERAKHIR->getClientOriginalExtension();
            $request->file('MODAL_PERUBAHAN_TERAKHIR')->move(public_path().'/data_debitur/', $name_mpt);
            $deb->MODAL_PERUBAHAN_TERAKHIR = $name_mpt;
            $deb->save();
        }

        if($request->hasFile('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS'))
        {   
            $name_auf = time().'_'.rand(1,9999).'_'.$request->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS->getClientOriginalExtension();
            $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->move(public_path().'/data_debitur/', $name_auf);
            $deb->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS = $name_auf;
            $deb->save();
        }

        if($request->hasFile('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR'))
        {
            $name_inhouse = time().'_'.rand(1,9999).'_'.$request->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR->getClientOriginalExtension();
            $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->move(public_path().'/data_debitur/', $name_inhouse);
            $deb->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR = $name_inhouse;
            $deb->save();
        }

        if($request->hasFile('BANK_STATEMENT_LAST_3_MONTHS'))
        {
            $name_bank = time().'_'.rand(1,9999).'_'.$request->BANK_STATEMENT_LAST_3_MONTHS->getClientOriginalExtension();
            $request->file('BANK_STATEMENT_LAST_3_MONTHS')->move(public_path().'/data_debitur/', $name_bank);
            $deb->BANK_STATEMENT_LAST_3_MONTHS = $name_bank;
            $deb->save();
        }

        if($request->hasFile('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS'))
        {
            $name_fp = time().'_'.rand(1,9999).'_'.$request->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS->getClientOriginalExtension();
            $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->move(public_path().'/data_debitur/', $name_fp);
            $deb->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS = $name_fp;
            $deb->save();
        }
        
        if($request->hasFile('DRAFT_TEMPLATE_AGREEMENT_END_USER'))
        {
            $name_dtaeu = time().'_'.rand(1,9999).'_'.$request->DRAFT_TEMPLATE_AGREEMENT_END_USER->getClientOriginalExtension();
            $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->move(public_path().'/data_debitur/', $name_dtaeu);
            $deb->DRAFT_TEMPLATE_AGREEMENT_END_USER = $name_dtaeu;
            $deb->save();
        }

        if($request->hasFile('CONTOH_RISK_ACCEPTANCE_CRITERIA'))
        {
            $name_risk = time().'_'.rand(1,9999).'_'.$request->CONTOH_RISK_ACCEPTANCE_CRITERIA->getClientOriginalExtension();
            $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->move(public_path().'/data_debitur/', $name_risk);
            $deb->CONTOH_RISK_ACCEPTANCE_CRITERIA = $name_risk;
            $deb->save();
        }
        
        if($request->hasFile('NDA_DOCUMENT'))
        {
            $name_nd = time().'_'.rand(1,9999).'_'.$request->NDA_DOCUMENT->getClientOriginalExtension();
            $request->file('NDA_DOCUMENT')->move(public_path().'/data_debitur/', $name_nd);
            $deb->NDA_DOCUMENT = $name_nd;
            $deb->save();
        }

        $deb->NAMA_PERUSAHAAN = $request->NAMA_PERUSAHAAN;
        $deb->ALAMAT_PERUSAHAAN = $request->ALAMAT_PERUSAHAAN;
        $deb->STATUS_BADAN_HUKUM = $request->STATUS_BADAN_HUKUM;
        $deb->DETIL_PRODUCT_PROFILE = $request->DETIL_PRODUCT_PROFILE;
        $deb->Nama_Direktur_Utama = $request->Nama_Direktur_Utama;
        $deb->No_Identitas_Direktur_Utama = $request->No_Identitas_Direktur_Utama;
        $deb->Nama_Direktur1 = $request->Nama_Direktur1;
        $deb->No_Identitas_Direktur1 = $request->No_Identitas_Direktur1;
        $deb->Nama_Direktur_2 = $request->Nama_Direktur_2;
        $deb->No_Identitas_Direktur2 = $request->No_Identitas_Direktur2;
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
        // dd($deb);
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
        $deb->AKTE_PENDIRIAN = $request->AKTE_PENDIRIAN;
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
            $request->file('AKTE_PENDIRIAN')->move(public_path().'/data_debitur/', $request->file('AKTE_PENDIRIAN')->getClientOriginalExtension());
            $deb->AKTE_PENDIRIAN = $request->file('AKTE_PENDIRIAN')->getClientOriginalExtension();
            $deb->save();
        }
        
        if($request->hasFile('COMPANY_PROFILE'))
        {
            $request->file('COMPANY_PROFILE')->move(public_path().'/data_debitur/', $request->file('COMPANY_PROFILE')->getClientOriginalExtension());
            $deb->COMPANY_PROFILE = $request->file('COMPANY_PROFILE')->getClientOriginalExtension();
            $deb->save();
        }

        if($request->hasFile('AKTE_PERUBAHAN_ANGGARAN_DASAR'))
        {
            $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->move(public_path().'/data_debitur/', $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->getClientOriginalExtension());
            $deb->AKTE_PERUBAHAN_ANGGARAN_DASAR = $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->getClientOriginalExtension();
            $deb->save();
        }

        if($request->hasFile('SIUP'))
        {
            $request->file('SIUP')->move(public_path().'/data_debitur/', $request->file('SIUP')->getClientOriginalExtension());
            $deb->SIUP = $request->file('SIUP')->getClientOriginalExtension();
            $deb->save();
        }

        if($request->hasFile('TDP'))
        {
            $request->file('TDP')->move(public_path().'/data_debitur/', $request->file('TDP')->getClientOriginalExtension());
            $deb->TDP = $request->file('TDP')->getClientOriginalExtension();
            $deb->save();
        }

        if($request->hasFile('NPWP'))
        {
            $request->file('NPWP')->move(public_path().'/data_debitur/', $request->file('NPWP')->getClientOriginalExtension());
            $deb->NPWP = $request->file('NPWP')->getClientOriginalExtension();
            $deb->save();
        }

        if($request->hasFile('MODAL_PENDIRIAN'))
        {
            $request->file('MODAL_PENDIRIAN')->move(public_path().'/data_debitur/', $request->file('MODAL_PENDIRIAN')->getClientOriginalExtension());
            $deb->MODAL_PENDIRIAN = $request->file('MODAL_PENDIRIAN')->getClientOriginalExtension();
            $deb->save();
        }

        if($request->hasFile('MODAL_PERUBAHAN_TERAKHIR'))
        {
            $request->file('MODAL_PERUBAHAN_TERAKHIR')->move(public_path().'/data_debitur/', $request->file('MODAL_PERUBAHAN_TERAKHIR')->getClientOriginalExtension());
            $deb->MODAL_PERUBAHAN_TERAKHIR = $request->file('MODAL_PERUBAHAN_TERAKHIR')->getClientOriginalExtension();
            $deb->save();
        }

        if($request->hasFile('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS'))
        {   
            $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->move(public_path().'/data_debitur/', $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->getClientOriginalExtension());
            $deb->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS = $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->getClientOriginalExtension();
            $deb->save();
        }

        if($request->hasFile('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR'))
        {
           $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->move(public_path().'/data_debitur/', $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->getClientOriginalExtension());
            $deb->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR = $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->getClientOriginalExtension();
            $deb->save();
        }

        if($request->hasFile('BANK_STATEMENT_LAST_3_MONTHS'))
        {
            $request->file('BANK_STATEMENT_LAST_3_MONTHS')->move(public_path().'/data_debitur/', $request->file('BANK_STATEMENT_LAST_3_MONTHS')->getClientOriginalExtension());
            $deb->BANK_STATEMENT_LAST_3_MONTHS = $request->file('BANK_STATEMENT_LAST_3_MONTHS')->getClientOriginalExtension();
            $deb->save();
        }

        if($request->hasFile('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS'))
        {
            $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->move(public_path().'/data_debitur/', $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->getClientOriginalExtension());
            $deb->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS = $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->getClientOriginalExtension();
            $deb->save();
        }
        
        if($request->hasFile('DRAFT_TEMPLATE_AGREEMENT_END_USER'))
        {
            $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->move(public_path().'/data_debitur/', $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->getClientOriginalExtension());
            $deb->DRAFT_TEMPLATE_AGREEMENT_END_USER = $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->getClientOriginalExtension();
            $deb->save();
        }

        if($request->hasFile('CONTOH_RISK_ACCEPTANCE_CRITERIA'))
        {
            $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->move(public_path().'/data_debitur/', $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->getClientOriginalExtension());
            $deb->CONTOH_RISK_ACCEPTANCE_CRITERIA = $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->getClientOriginalExtension();
            $deb->save();
        }
        
        if($request->hasFile('NDA_DOCUMENT'))
        {
            $request->file('NDA_DOCUMENT')->move(public_path().'/data_debitur/', $request->file('NDA_DOCUMENT')->getClientOriginalExtension());
            $deb->NDA_DOCUMENT = $request->file('NDA_DOCUMENT')->getClientOriginalExtension();
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
        $nama_file = $file->getClientOriginalExtension();
        $file->move('import/product',$nama_file);

        Excel::import(new DebiturBadanUsahaImport, public_path('/import/product/'.$nama_file));

        Session::flash('sukses','Data Debitur Badan Usaha Berhasil Diimport!');
        return redirect('debitur_badan_usaha');
    }
}
