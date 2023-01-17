<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PartnerImport;
use App\Models\Master_Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner = Partner::orderBy('id', 'desc')->get();
        return view('partner.index', compact('partner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prod = Master_Product::all();
        return view('partner.create', compact('prod'));
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
            'AKTE_PENDIRIAN' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
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

        $partner = new Partner();
        
        if ($request->hasFile('AKTE_LAIN_LAIN')) 
        {
            foreach ($request->file('AKTE_LAIN_LAIN') as $all) {
                $akte_name = time().'_'.rand(1,9999).'_'.$all->getClientOriginalExtension();
                $all->move(public_path().'/data_partner/', $akte_name);
                $data[] = $akte_name;
                $partner->AKTE_LAIN_LAIN = json_encode($data);
                $partner->save();   
            }
        }
        
        if($request->hasFile('AKTE_PENDIRIAN'))
        {
            $name_ap = time().'_'.rand(1,9999).'_'.$request->AKTE_PENDIRIAN->getClientOriginalExtension();
            $request->file('AKTE_PENDIRIAN')->move(public_path().'/data_partner/', $name_ap);
            $partner->AKTE_PENDIRIAN = $name_ap;
            $partner->save();
        }
        
        if($request->hasFile('COMPANY_PROFILE'))
        {
            $name_cp = time().'_'.rand(1,9999).'_'.$request->COMPANY_PROFILE->getClientOriginalExtension();
            $request->file('COMPANY_PROFILE')->move(public_path().'/data_partner/', $name_cp);
            $partner->COMPANY_PROFILE = $name_cp;
            $partner->save();
        }

        if($request->hasFile('AKTE_PERUBAHAN_ANGGARAN_DASAR'))
        {
            $name_apad = time().'_'.rand(1,9999).'_'.$request->AKTE_PERUBAHAN_ANGGARAN_DASAR->getClientOriginalExtension();
            $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->move(public_path().'/data_partner/', $name_apad);
            $partner->AKTE_PERUBAHAN_ANGGARAN_DASAR = $name_apad;
            $partner->save();
        }

        if($request->hasFile('SIUP'))
        {
            $name_siup = time().'_'.rand(1,9999).'_'.$request->SIUP->getClientOriginalExtension();
            $request->file('SIUP')->move(public_path().'/data_partner/', $name_siup);
            $partner->SIUP = $name_siup;
            $partner->save();
        }

        if($request->hasFile('TDP'))
        {
            $name_tdp = time().'_'.rand(1,9999).'_'.$request->TDP->getClientOriginalExtension();
            $request->file('TDP')->move(public_path().'/data_partner/', $name_tdp);
            $partner->TDP = $name_tdp;
            $partner->save();
        }

        if($request->hasFile('NPWP'))
        {
            $name_npwp = time().'_'.rand(1,9999).'_'.$request->NPWP->getClientOriginalExtension();
            $request->file('NPWP')->move(public_path().'/data_partner/', $name_npwp);
            $partner->NPWP = $name_npwp;
            $partner->save();
        }

        if($request->hasFile('MODAL_PENDIRIAN'))
        {
            $name_mp = time().'_'.rand(1,9999).'_'.$request->MODAL_PENDIRIAN->getClientOriginalExtension();
            $request->file('MODAL_PENDIRIAN')->move(public_path().'/data_partner/', $name_mp);
            $partner->MODAL_PENDIRIAN = $name_mp;
            $partner->save();
        }

        if($request->hasFile('MODAL_PERUBAHAN_TERAKHIR'))
        {
            $name_mpt = time().'_'.rand(1,9999).'_'.$request->MODAL_PERUBAHAN_TERAKHIR->getClientOriginalExtension();
            $request->file('MODAL_PERUBAHAN_TERAKHIR')->move(public_path().'/data_partner/', $name_mpt);
            $partner->MODAL_PERUBAHAN_TERAKHIR = $name_mpt;
            $partner->save();
        }

        if($request->hasFile('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS'))
        {   
            $name_auf = time().'_'.rand(1,9999).'_'.$request->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS->getClientOriginalExtension();
            $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->move(public_path().'/data_partner/', $name_auf);
            $partner->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS = $name_auf;
            $partner->save();
        }

        if($request->hasFile('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR'))
        {
            $name_inhouse = time().'_'.rand(1,9999).'_'.$request->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR->getClientOriginalExtension();
            $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->move(public_path().'/data_partner/', $name_inhouse);
            $partner->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR = $name_inhouse;
            $partner->save();
        }

        if($request->hasFile('BANK_STATEMENT_LAST_3_MONTHS'))
        {
            $name_bank = time().'_'.rand(1,9999).'_'.$request->BANK_STATEMENT_LAST_3_MONTHS->getClientOriginalExtension();
            $request->file('BANK_STATEMENT_LAST_3_MONTHS')->move(public_path().'/data_partner/', $name_bank);
            $partner->BANK_STATEMENT_LAST_3_MONTHS = $name_bank;
            $partner->save();
        }

        if($request->hasFile('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS'))
        {
            $name_fp = time().'_'.rand(1,9999).'_'.$request->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS->getClientOriginalExtension();
            $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->move(public_path().'/data_partner/', $name_fp);
            $partner->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS = $name_fp;
            $partner->save();
        }
        
        if($request->hasFile('DRAFT_TEMPLATE_AGREEMENT_END_USER'))
        {
            $name_dtaeu = time().'_'.rand(1,9999).'_'.$request->DRAFT_TEMPLATE_AGREEMENT_END_USER->getClientOriginalExtension();
            $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->move(public_path().'/data_partner/', $name_dtaeu);
            $partner->DRAFT_TEMPLATE_AGREEMENT_END_USER = $name_dtaeu;
            $partner->save();
        }

        if($request->hasFile('CONTOH_RISK_ACCEPTANCE_CRITERIA'))
        {
            $name_risk = time().'_'.rand(1,9999).'_'.$request->CONTOH_RISK_ACCEPTANCE_CRITERIA->getClientOriginalExtension();
            $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->move(public_path().'/data_partner/', $name_risk);
            $partner->CONTOH_RISK_ACCEPTANCE_CRITERIA = $name_risk;
            $partner->save();
        }
        
        if($request->hasFile('NDA_DOCUMENT'))
        {
            $name_nd = time().'_'.rand(1,9999).'_'.$request->NDA_DOCUMENT->getClientOriginalExtension();
            $request->file('NDA_DOCUMENT')->move(public_path().'/data_partner/', $name_nd);
            $partner->NDA_DOCUMENT = $name_nd;
            $partner->save();
        }

        $partner->NAMA_PERUSAHAAN = $request->NAMA_PERUSAHAAN;
        $partner->ALAMAT_PERUSAHAAN = $request->ALAMAT_PERUSAHAAN;
        $partner->STATUS_BADAN_HUKUM = $request->STATUS_BADAN_HUKUM;
        $partner->DETIL_PRODUCT_PROFILE = $request->DETIL_PRODUCT_PROFILE;
        $partner->Nama_Direktur_Utama = $request->Nama_Direktur_Utama;
        $partner->No_Identitas_Direktur_Utama = $request->No_Identitas_Direktur_Utama;
        $partner->Nama_Direktur1 = $request->Nama_Direktur1;
        $partner->No_Identitas_Direktur1 = $request->No_Identitas_Direktur1;
        $partner->Nama_Direktur_2 = $request->Nama_Direktur_2;
        $partner->No_Identitas_Direktur2 = $request->No_Identitas_Direktur2;
        $partner->Status = $request->Status;
        $partner->save();
        // dd($partner);

        return redirect('partner');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = Partner::findorfail($id);
        return view('partner.detail', compact('partner'));
    }

    public function download($file)
    {
        return response()->download(public_path('data_partner/'.$file));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::findorfail($id);
        $m_prod = Master_Product::all();
        return view('partner.edit', compact('partner','m_prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $partner = Partner::findorfail($id);
        
        if ($request->hasFile('AKTE_LAIN_LAIN')) 
        {
            foreach ($request->file('AKTE_LAIN_LAIN') as $all) {
                $akte_name = time().'_'.rand(1,9999).'_'.$all->getClientOriginalExtension();
                $all->move(public_path().'/data_partner/', $akte_name);
                $data[] = $akte_name;
                $partner->AKTE_LAIN_LAIN = json_encode($data);
                $partner->save();   
            }
        }
        
        if($request->hasFile('AKTE_PENDIRIAN'))
        {
            $name_ap = time().'_'.rand(1,9999).'_'.$request->AKTE_PENDIRIAN->getClientOriginalExtension();
            $request->file('AKTE_PENDIRIAN')->move(public_path().'/data_partner/', $name_ap);
            $partner->AKTE_PENDIRIAN = $name_ap;
            $partner->save();
        }
        
        if($request->hasFile('COMPANY_PROFILE'))
        {
            $name_cp = time().'_'.rand(1,9999).'_'.$request->COMPANY_PROFILE->getClientOriginalExtension();
            $request->file('COMPANY_PROFILE')->move(public_path().'/data_partner/', $name_cp);
            $partner->COMPANY_PROFILE = $name_cp;
            $partner->save();
        }

        if($request->hasFile('AKTE_PERUBAHAN_ANGGARAN_DASAR'))
        {
            $name_apad = time().'_'.rand(1,9999).'_'.$request->AKTE_PERUBAHAN_ANGGARAN_DASAR->getClientOriginalExtension();
            $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->move(public_path().'/data_partner/', $name_apad);
            $partner->AKTE_PERUBAHAN_ANGGARAN_DASAR = $name_apad;
            $partner->save();
        }

        if($request->hasFile('SIUP'))
        {
            $name_siup = time().'_'.rand(1,9999).'_'.$request->SIUP->getClientOriginalExtension();
            $request->file('SIUP')->move(public_path().'/data_partner/', $name_siup);
            $partner->SIUP = $name_siup;
            $partner->save();
        }

        if($request->hasFile('TDP'))
        {
            $name_tdp = time().'_'.rand(1,9999).'_'.$request->TDP->getClientOriginalExtension();
            $request->file('TDP')->move(public_path().'/data_partner/', $name_tdp);
            $partner->TDP = $name_tdp;
            $partner->save();
        }

        if($request->hasFile('NPWP'))
        {
            $name_npwp = time().'_'.rand(1,9999).'_'.$request->NPWP->getClientOriginalExtension();
            $request->file('NPWP')->move(public_path().'/data_partner/', $name_npwp);
            $partner->NPWP = $name_npwp;
            $partner->save();
        }

        if($request->hasFile('MODAL_PENDIRIAN'))
        {
            $name_mp = time().'_'.rand(1,9999).'_'.$request->MODAL_PENDIRIAN->getClientOriginalExtension();
            $request->file('MODAL_PENDIRIAN')->move(public_path().'/data_partner/', $name_mp);
            $partner->MODAL_PENDIRIAN = $name_mp;
            $partner->save();
        }

        if($request->hasFile('MODAL_PERUBAHAN_TERAKHIR'))
        {
            $name_mpt = time().'_'.rand(1,9999).'_'.$request->MODAL_PERUBAHAN_TERAKHIR->getClientOriginalExtension();
            $request->file('MODAL_PERUBAHAN_TERAKHIR')->move(public_path().'/data_partner/', $name_mpt);
            $partner->MODAL_PERUBAHAN_TERAKHIR = $name_mpt;
            $partner->save();
        }

        if($request->hasFile('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS'))
        {   
            $name_auf = time().'_'.rand(1,9999).'_'.$request->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS->getClientOriginalExtension();
            $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->move(public_path().'/data_partner/', $name_auf);
            $partner->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS = $name_auf;
            $partner->save();
        }

        if($request->hasFile('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR'))
        {
            $name_inhouse = time().'_'.rand(1,9999).'_'.$request->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR->getClientOriginalExtension();
            $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->move(public_path().'/data_partner/', $name_inhouse);
            $partner->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR = $name_inhouse;
            $partner->save();
        }

        if($request->hasFile('BANK_STATEMENT_LAST_3_MONTHS'))
        {
            $name_bank = time().'_'.rand(1,9999).'_'.$request->BANK_STATEMENT_LAST_3_MONTHS->getClientOriginalExtension();
            $request->file('BANK_STATEMENT_LAST_3_MONTHS')->move(public_path().'/data_partner/', $name_bank);
            $partner->BANK_STATEMENT_LAST_3_MONTHS = $name_bank;
            $partner->save();
        }

        if($request->hasFile('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS'))
        {
            $name_fp = time().'_'.rand(1,9999).'_'.$request->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS->getClientOriginalExtension();
            $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->move(public_path().'/data_partner/', $name_fp);
            $partner->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS = $name_fp;
            $partner->save();
        }
        
        if($request->hasFile('DRAFT_TEMPLATE_AGREEMENT_END_USER'))
        {
            $name_dtaeu = time().'_'.rand(1,9999).'_'.$request->DRAFT_TEMPLATE_AGREEMENT_END_USER->getClientOriginalExtension();
            $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->move(public_path().'/data_partner/', $name_dtaeu);
            $partner->DRAFT_TEMPLATE_AGREEMENT_END_USER = $name_dtaeu;
            $partner->save();
        }

        if($request->hasFile('CONTOH_RISK_ACCEPTANCE_CRITERIA'))
        {
            $name_risk = time().'_'.rand(1,9999).'_'.$request->CONTOH_RISK_ACCEPTANCE_CRITERIA->getClientOriginalExtension();
            $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->move(public_path().'/data_partner/', $name_risk);
            $partner->CONTOH_RISK_ACCEPTANCE_CRITERIA = $name_risk;
            $partner->save();
        }
        
        if($request->hasFile('NDA_DOCUMENT'))
        {
            $name_nd = time().'_'.rand(1,9999).'_'.$request->NDA_DOCUMENT->getClientOriginalExtension();
            $request->file('NDA_DOCUMENT')->move(public_path().'/data_partner/', $name_nd);
            $partner->NDA_DOCUMENT = $name_nd;
            $partner->save();
        }

        $partner->NAMA_PERUSAHAAN = $request->NAMA_PERUSAHAAN;
        $partner->ALAMAT_PERUSAHAAN = $request->ALAMAT_PERUSAHAAN;
        $partner->STATUS_BADAN_HUKUM = $request->STATUS_BADAN_HUKUM;
        $partner->DETIL_PRODUCT_PROFILE = $request->DETIL_PRODUCT_PROFILE;
        $partner->Nama_Direktur_Utama = $request->Nama_Direktur_Utama;
        $partner->No_Identitas_Direktur_Utama = $request->No_Identitas_Direktur_Utama;
        $partner->Nama_Direktur1 = $request->Nama_Direktur1;
        $partner->No_Identitas_Direktur1 = $request->No_Identitas_Direktur1;
        $partner->Nama_Direktur_2 = $request->Nama_Direktur_2;
        $partner->No_Identitas_Direktur2 = $request->No_Identitas_Direktur2;
        $partner->Status = $request->Status;
        $partner->save();

        return redirect('partner');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::findorfail($id);
        
        // delete file
        File::delete('data_partner/'.$partner->AKTE_PENDIRIAN);
        File::delete('data_partner/'.$partner->COMPANY_PROFILE);
        foreach (json_decode($partner->AKTE_LAIN_LAIN) as $key) {
            File::delete('data_partner/'.$key);
        }
        File::delete('data_partner/'.$partner->SIUP);
        File::delete('data_partner/'.$partner->TDP);
        File::delete('data_partner/'.$partner->NPWP);
        File::delete('data_partner/'.$partner->MODAL_PENDIRIAN);
        File::delete('data_partner/'.$partner->MODAL_PERUBAHAN_TERAKHIR);
        File::delete('data_partner/'.$partner->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS);
        File::delete('data_partner/'.$partner->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR);
        File::delete('data_partner/'.$partner->BANK_STATEMENT_LAST_3_MONTHS);
        File::delete('data_partner/'.$partner->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS);
        File::delete('data_partner/'.$partner->DRAFT_TEMPLATE_AGREEMENT_END_USER);
        File::delete('data_partner/'.$partner->CONTOH_RISK_ACCEPTANCE_CRITERIA);
        File::delete('data_partner/'.$partner->NDA_DOCUMENT);

        // delete data
        $partner->delete();
        return redirect('partner');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $file->move('import/partner',$nama_file);

        Excel::import(new PartnerImport, public_path('/import/partner/'.$nama_file));

        Session::flash('sukses', 'Data Partner Berhasil Diimport!');
        return redirect('partner');
    }
}
