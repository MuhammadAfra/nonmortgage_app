<?php

namespace App\Http\Controllers;

use App\Models\Master_Product;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner = Partner::get();
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
            'NAMA_PERUSAHAAN' => 'required',
            'ALAMAT_PERUSAHAAN' => 'required',
            'STATUS_BADAN_HUKUM' => 'required',
            'AKTE_PENDIRIAN' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'COMPANY_PROFILE' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'DETIL_PRODUCT_PROFILE' => 'required',
            'AKTE_PERUBAHAN_ANGGARAN_DASAR' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'SIUP' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'TDP' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'NPWP' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'Nama_Direktur_Utama' => 'required',
            'No_Identitas_Direktur_Utama' => 'required',
            'Nama_Direktur1' => 'required',
            'No_Identitas_Direktur1' => 'required',
            'Nama_Direktur_2' => 'required',
            'No_Identitas_Direktur2' => 'required',
            'MODAL_PENDIRIAN' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'MODAL_PERUBAHAN_TERAKHIR' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'BANK_STATEMENT_LAST_3_MONTHS' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'CONTOH_RISK_ACCEPTANCE_CRITERIA' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'NDA_DOCUMENT' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'DRAFT_TEMPLATE_AGREEMENT_END_USER' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'Status' => 'required',
        ]);

        // $partner = new Partner();

        // upload file akte pendirian
        $akte = $request->AKTE_PENDIRIAN;
        $nama_akte = $akte->getClientOriginalName();
        $request->AKTE_PENDIRIAN->move('data_file', $nama_akte);
        // $partner->AKTE_PENDIRIAN = $nama_akte; // save to db

        // upload file company profile
        $company = $request->COMPANY_PROFILE;
        $nama_company = $company->getClientOriginalName();
        $request->COMPANY_PROFILE->move('data_file', $nama_company);
        // $partner->COMPANY_PROFILE = $nama_company; // save to db

        // upload file akte perubahan anggaran dasar
        $akte_perubahan = $request->AKTE_PERUBAHAN_ANGGARAN_DASAR;
        $nama_akte_perubahan = $akte_perubahan->getClientOriginalName();
        $request->AKTE_PERUBAHAN_ANGGARAN_DASAR->move('data_file', $nama_akte_perubahan);
        // $partner->AKTE_PERUBAHAN_ANGGARAN_DASAR = $nama_akte_perubahan; // save to db

        // upload file SIUP
        $siup = $request->SIUP;
        $nama_siup = $siup->getClientOriginalName();
        $request->SIUP->move('data_file', $nama_siup);
        // $partner->SIUP = $nama_siup; // save to db

        // upload file TDP
        $tdp = $request->TDP;
        $nama_tdp = $tdp->getClientOriginalName();
        $request->TDP->move('data_file', $nama_tdp);
        // $partner->TDP = $nama_tdp; // save to db
        
        // upload file NPWP
        $npwp = $request->NPWP;
        $nama_npwp = $npwp->getClientOriginalName();
        $request->NPWP->move('data_file', $nama_npwp);
        // $partner->NPWP = $nama_npwp; // save to db

        // upload file modal pendirian
        $modal_pendirian = $request->MODAL_PENDIRIAN;
        $nama_modal_pendirian = $modal_pendirian->getClientOriginalName();
        $request->MODAL_PENDIRIAN->move('data_file', $nama_modal_pendirian);
        // $partner->MODAL_PENDIRIAN = $nama_modal_pendirian; // save to db

        // upload file modal perubahan
        $modal_perubahan = $request->MODAL_PERUBAHAN_TERAKHIR;
        $nama_modal_perubahan = $modal_perubahan->getClientOriginalName();
        $request->MODAL_PERUBAHAN_TERAKHIR->move('data_file', $nama_modal_perubahan);
        // $partner->MODAL_PERUBAHAN_TERAKHIR = $nama_modal_perubahan; // save to db

        // upload file audited financial
        $audited = $request->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS;
        $nama_audited = $audited->getClientOriginalName();
        $request->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS->move('data_file', $nama_audited);
        // $partner->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS = $nama_audited; // save to db
 
        // upload file in house financial
        $in_house = $request->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR;
        $nama_in_house = $in_house->getClientOriginalName();
        $request->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR->move('data_file', $nama_in_house);
        // $partner->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR = $nama_in_house; // save to db
 
        // upload file bank statement
        $bank_statement = $request->BANK_STATEMENT_LAST_3_MONTHS;
        $nama_bank_statement = $bank_statement->getClientOriginalName();
        $request->BANK_STATEMENT_LAST_3_MONTHS->move('data_file', $nama_bank_statement);
        // $partner->BANK_STATEMENT_LAST_3_MONTHS = $nama_bank_statement; // save to db
 
        // upload file financial projection
        $financial = $request->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS;
        $nama_financial = $financial->getClientOriginalName();
        $request->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS->move('data_file', $nama_financial);
        // $partner->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS = $nama_financial; // save to db
 
        // upload file draft template
        $draft = $request->DRAFT_TEMPLATE_AGREEMENT_END_USER;
        $nama_draft = $draft->getClientOriginalName();
        $request->DRAFT_TEMPLATE_AGREEMENT_END_USER->move('data_file', $nama_draft);
        // $partner->DRAFT_TEMPLATE_AGREEMENT_END_USER = $nama_draft; // save to db
 
        // upload file risk acceptance
        $risk_acc = $request->CONTOH_RISK_ACCEPTANCE_CRITERIA;
        $nama_risk_acc = $risk_acc->getClientOriginalName();
        $request->CONTOH_RISK_ACCEPTANCE_CRITERIA->move('data_file', $nama_risk_acc);
        // $partner->CONTOH_RISK_ACCEPTANCE_CRITERIA = $nama_risk_acc; // save to db
 
        // upload file nda doc
        $nda_doc = $request->NDA_DOCUMENT;
        $nama_nda_doc = $nda_doc->getClientOriginalName();
        $request->NDA_DOCUMENT->move('data_file', $nama_nda_doc);
        // $partner->NDA_DOCUMENT = $nama_nda_doc; // save to db

        Partner::create([
            'NAMA_PERUSAHAAN' => $request->NAMA_PERUSAHAAN,
            'ALAMAT_PERUSAHAAN' => $request->ALAMAT_PERUSAHAAN,
            'STATUS_BADAN_HUKUM' => $request->STATUS_BADAN_HUKUM,
            'AKTE_PENDIRIAN' => $nama_akte,
            'COMPANY_PROFILE' => $nama_company,
            'DETIL_PRODUCT_PROFILE' => $request->DETIL_PRODUCT_PROFILE,
            'AKTE_PERUBAHAN_ANGGARAN_DASAR' => $nama_akte_perubahan,
            'SIUP' => $nama_siup,
            'TDP' => $nama_tdp,
            'NPWP' => $nama_npwp,
            'Nama_Direktur_Utama' => $request->Nama_Direktur_Utama,
            'No_Identitas_Direktur_Utama' => $request->No_Identitas_Direktur_Utama,
            'Nama_Direktur1' => $request->Nama_Direktur1,
            'No_Identitas_Direktur1' => $request->No_Identitas_Direktur1,
            'Nama_Direktur_2' => $request->Nama_Direktur_2,
            'No_Identitas_Direktur2' => $request->No_Identitas_Direktur2,
            'MODAL_PENDIRIAN' => $nama_modal_pendirian,
            'MODAL_PERUBAHAN_TERAKHIR' => $nama_modal_perubahan,
            'AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS' => $nama_audited,
            'IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR' => $nama_in_house,
            'BANK_STATEMENT_LAST_3_MONTHS' => $nama_bank_statement,
            'FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS' => $nama_financial,
            'DRAFT_TEMPLATE_AGREEMENT_END_USER' => $nama_draft,
            'CONTOH_RISK_ACCEPTANCE_CRITERIA' => $nama_risk_acc,
            'NDA_DOCUMENT' => $nama_nda_doc,
            'Status' => $request->Status
        ]);

        return redirect('partner');

    }

    public function add_product(Request $request)
    {
        $this->validate($request, [
            'id_master_product' => 'required',
            'nama_product' => 'required'
        ],[
            'id_master_product' => 'Input Product!',
            'nama_product' => 'Input Product!'
        ]);

        Master_Product::create([
            'id_master_product' => $request->id_master_product,
            'nama_product' => $request->nama_product
        ]);

        return redirect('partner/create');
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
        return response()->download(public_path('data_file/'.$file));
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
        $this->validate($request, [
            'NAMA_PERUSAHAAN' => 'required',
            'ALAMAT_PERUSAHAAN' => 'required',
            'STATUS_BADAN_HUKUM' => 'required',
            // 'AKTE_PENDIRIAN' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            // 'COMPANY_PROFILE' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'DETIL_PRODUCT_PROFILE' => 'required',
            // 'AKTE_PERUBAHAN_ANGGARAN_DASAR' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            // 'SIUP' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            // 'TDP' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            // 'NPWP' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'Nama_Direktur_Utama' => 'required',
            'No_Identitas_Direktur_Utama' => 'required',
            'Nama_Direktur1' => 'required',
            'No_Identitas_Direktur1' => 'required',
            'Nama_Direktur_2' => 'required',
            'No_Identitas_Direktur2' => 'required',
            // 'MODAL_PENDIRIAN' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            // 'MODAL_PERUBAHAN_TERAKHIR' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            // 'AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            // 'IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            // 'BANK_STATEMENT_LAST_3_MONTHS' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            // 'FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            // 'CONTOH_RISK_ACCEPTANCE_CRITERIA' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            // 'NDA_DOCUMENT' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            // 'DRAFT_TEMPLATE_AGREEMENT_END_USER' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx',
            'Status' => 'required',
        ]);

        $partner = Partner::findorfail($id);
        $partner->update($request->all());
        
        if($request->hasFile('AKTE_PENDIRIAN'))
        {
            $request->file('AKTE_PENDIRIAN')->move('data_file/', $request->file('AKTE_PENDIRIAN')->getClientOriginalName());
            $partner->AKTE_PENDIRIAN = $request->file('AKTE_PENDIRIAN')->getClientOriginalName();
            $partner->save();
        }
        
        if($request->hasFile('COMPANY_PROFILE'))
        {
            $request->file('COMPANY_PROFILE')->move('data_file/', $request->file('COMPANY_PROFILE')->getClientOriginalName());
            $partner->COMPANY_PROFILE = $request->file('COMPANY_PROFILE')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('AKTE_PERUBAHAN_ANGGARAN_DASAR'))
        {
            $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->move('data_file/', $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->getClientOriginalName());
            $partner->AKTE_PERUBAHAN_ANGGARAN_DASAR = $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('SIUP'))
        {
            $request->file('SIUP')->move('data_file/', $request->file('SIUP')->getClientOriginalName());
            $partner->SIUP = $request->file('SIUP')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('TDP'))
        {
            $request->file('TDP')->move('data_file/', $request->file('TDP')->getClientOriginalName());
            $partner->TDP = $request->file('TDP')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('NPWP'))
        {
            $request->file('NPWP')->move('data_file/', $request->file('NPWP')->getClientOriginalName());
            $partner->NPWP = $request->file('NPWP')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('MODAL_PENDIRIAN'))
        {
            $request->file('MODAL_PENDIRIAN')->move('data_file/', $request->file('MODAL_PENDIRIAN')->getClientOriginalName());
            $partner->MODAL_PENDIRIAN = $request->file('MODAL_PENDIRIAN')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('MODAL_PERUBAHAN_TERAKHIR'))
        {
            $request->file('MODAL_PERUBAHAN_TERAKHIR')->move('data_file/', $request->file('MODAL_PERUBAHAN_TERAKHIR')->getClientOriginalName());
            $partner->MODAL_PERUBAHAN_TERAKHIR = $request->file('MODAL_PERUBAHAN_TERAKHIR')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS'))
        {
            $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->move('data_file/', $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->getClientOriginalName());
            $partner->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS = $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR'))
        {
           $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->move('data_file/', $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->getClientOriginalName());
            $partner->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR = $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('BANK_STATEMENT_LAST_3_MONTHS'))
        {
            $request->file('BANK_STATEMENT_LAST_3_MONTHS')->move('data_file/', $request->file('BANK_STATEMENT_LAST_3_MONTHS')->getClientOriginalName());
            $partner->BANK_STATEMENT_LAST_3_MONTHS = $request->file('BANK_STATEMENT_LAST_3_MONTHS')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS'))
        {
            $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->move('data_file/', $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->getClientOriginalName());
            $partner->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS = $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->getClientOriginalName();
            $partner->save();
        }
        
        if($request->hasFile('DRAFT_TEMPLATE_AGREEMENT_END_USER'))
        {
            $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->move('data_file/', $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->getClientOriginalName());
            $partner->DRAFT_TEMPLATE_AGREEMENT_END_USER = $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('CONTOH_RISK_ACCEPTANCE_CRITERIA'))
        {
            $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->move('data_file/', $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->getClientOriginalName());
            $partner->CONTOH_RISK_ACCEPTANCE_CRITERIA = $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->getClientOriginalName();
            $partner->save();
        }
        
        if($request->hasFile('NDA_DOCUMENT'))
        {
            $request->file('NDA_DOCUMENT')->move('data_file/', $request->file('NDA_DOCUMENT')->getClientOriginalName());
            $partner->NDA_DOCUMENT = $request->file('NDA_DOCUMENT')->getClientOriginalName();
            $partner->save();
        }

        // dd($partner);
        
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
        File::delete('data_file/'.$partner->AKTE_PENDIRIAN);
        File::delete('data_file/'.$partner->COMPANY_PROFILE);
        File::delete('data_file/'.$partner->SIUP);
        File::delete('data_file/'.$partner->TDP);
        File::delete('data_file/'.$partner->NPWP);
        File::delete('data_file/'.$partner->MODAL_PENDIRIAN);
        File::delete('data_file/'.$partner->MODAL_PERUBAHAN_TERAKHIR);
        File::delete('data_file/'.$partner->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS);
        File::delete('data_file/'.$partner->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR);
        File::delete('data_file/'.$partner->BANK_STATEMENT_LAST_3_MONTHS);
        File::delete('data_file/'.$partner->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS);
        File::delete('data_file/'.$partner->DRAFT_TEMPLATE_AGREEMENT_END_USER);
        File::delete('data_file/'.$partner->CONTOH_RISK_ACCEPTANCE_CRITERIA);
        File::delete('data_file/'.$partner->NDA_DOCUMENT);

        // delete data
        $partner->delete();
        return redirect('partner');
    }
}
