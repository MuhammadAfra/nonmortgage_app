<?php

namespace App\Http\Controllers;

use App\Models\Master_Product;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner = Partner::all();
        return view('partner.index', compact('partner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $prod = Master_Product::all();
        // return view('partner.create', compact('prod'));
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
            'AKTE_PENDIRIAN' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'COMPANY_PROFILE' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'DETIL_PRODUCT_PROFILE' => 'required',
            'AKTE_PERUBAHAN_ANGGARAN_DASAR' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'SIUP' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'TDP' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'NPWP' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'Nama_Direktur_Utama' => 'required',
            'No_HP_Dirut' => 'required',
            'Nama_Direktur1' => 'required',
            'No_HP_Direktur1' => 'required',
            'Nama_Direktur_2' => 'required',
            'No_HP_Direktur2' => 'required',
            'MODAL_PENDIRIAN' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'MODAL_PERUBAHAN_TERAKHIR' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'BANK_STATEMENT_LAST_3_MONTHS' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'CONTOH_RISK_ACCEPTANCE_CRITERIA' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'NDA_DOCUMENT' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'DRAFT_TEMPLATE_AGREEMENT_END_USER' => 'required|file|image|mimes:doc,docx,PDF,pdf,jpg,jpeg,png',
            'status' => 'required',
        ],[
            'NAMA_PERUSAHAAN' => 'Input Nama Perusahaan!',
            'ALAMAT_PERUSAHAAN' => 'Input Alamat Perusahaan!',
            'STATUS_BADAN_HUKUM' => 'Input Status Badan Hukum!',
            'AKTE_PENDIRIAN' => 'Input Akte Pendirian!',
            'COMPANY_PROFILE' => 'Input Company Profile!',
            'DETIL_PRODUCT_PROFILE' => 'Input Product Profile!',
            'AKTE_PERUBAHAN_ANGGARAN_DASAR' => 'Input Akter Perubahan Anggaran!',
            'SIUP' => 'Input SIUP!',
            'TDP' => 'Input TDP!',
            'NPWP' => 'Input NPWP!',
            'Nama_Direktur_Utama' => 'Input Nama Direktur!',
            'No_HP_Dirut' => 'Input No HP!',
            'Nama_Direktur1' => 'Input Nama Direktur 1!',
            'No_HP_Direktur1' => 'Input No HP!',
            'Nama_Direktur_2' => 'Input Nama Direktur 2!',
            'No_HP_Direktur2' => 'Input No HP!',
            'MODAL_PENDIRIAN' => 'Input Modal Pendirian!',
            'MODAL_PERUBAHAN_TERAKHIR' => 'Input Modal Perubahan!',
            'AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS' => 'Input Audited Financial Statement!',
            'IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR' => 'Input Inhouse Statement!',
            'BANK_STATEMENT_LAST_3_MONTHS' => 'Input Bank Statement!',
            'FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS' => 'Input Financial Projection!',
            'CONTOH_RISK_ACCEPTANCE_CRITERIA' => 'Input Risk Acceptance!',
            'NDA_DOCUMENT' => 'Input NDA DOCUMENT!',
            'DRAFT_TEMPLATE_AGREEMENT_END_USER' => 'Input Draft Template Agreement!',
            'status' => 'Input Status!',
        ]);

        // upload file akte pendirian
        $akte_pendirian = $request->AKTE_PENDIRIAN;
        $nama_akte_pendirian = $akte_pendirian->getClientOriginalName();
        $akte_pendirian->move(public_path().'/data_file'.$nama_akte_pendirian);

        // upload file akte pendirian
        $company_profile = $request->COMPANY_PROFILE;
        $nama_company_profile = $company_profile->getClientOriginalName();
        $company_profile->move(public_path().'/data_file'.$nama_company_profile);

        // upload file akte pendirian
        $akte_perubahan = $request->AKTE_PERUBAHAN_ANGGARAN_DASAR;
        $nama_akte_perubahan = $akte_perubahan->getClientOriginalName();
        $akte_perubahan->move(public_path().'/data_file'.$nama_akte_perubahan);

        // upload file akte pendirian
        $siup = $request->SIUP;
        $nama_siup = $siup->getClientOriginalName();
        $siup->move(public_path().'/data_file'.$nama_akte_perubahan);

        // upload file akte pendirian
        $tdp = $request->TDP;
        $nama_tdp = $tdp->getClientOriginalName();
        $tdp->move(public_path().'/data_file'.$nama_akte_perubahan);
        
        // upload file akte pendirian
        $npwp = $request->NPWP;
        $nama_npwp = $npwp->getClientOriginalName();
        $npwp->move(public_path().'/data_file'.$nama_akte_perubahan);

        // upload file akte pendirian
        $modal_pendirian = $request->MODAL_PENDIRIAN;
        $nama_modal_pendirian = $modal_pendirian->getClientOriginalName();
        $modal_pendirian->move(public_path().'/data_file'.$nama_akte_perubahan);

        // upload file akte pendirian
        $modal_perubahan = $request->MODAL_PERUBAHAN_TERAKHIR;
        $nama_modal_perubahan = $modal_perubahan->getClientOriginalName();
        $modal_perubahan->move(public_path().'/data_file'.$nama_akte_perubahan);

        // upload file akte pendirian
        $audited_financial = $request->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS;
        $nama_audited_financial = $audited_financial->getClientOriginalName();
        $audited_financial->move(public_path().'/data_file'.$nama_akte_perubahan);

        // upload file akte pendirian
        $in_house = $request->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR;
        $nama_in_house = $in_house->getClientOriginalName();
        $in_house->move(public_path().'/data_file'.$nama_akte_perubahan);

        // upload file akte pendirian
        $bank_statement = $request->BANK_STATEMENT_LAST_3_MONTHS;
        $nama_bank_statement = $bank_statement->getClientOriginalName();
        $bank_statement->move(public_path().'/data_file'.$nama_akte_perubahan);

        // upload file akte pendirian
        $financial_projection = $request->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS;
        $nama_financial_projection = $financial_projection->getClientOriginalName();
        $financial_projection->move(public_path().'/data_file'.$nama_akte_perubahan);

        // upload file akte pendirian
        $risk_acc = $request->CONTOH_RISK_ACCEPTANCE_CRITERIA;
        $nama_risk_acc = $risk_acc->getClientOriginalName();
        $risk_acc->move(public_path().'/data_file'.$nama_akte_perubahan);

        // upload file akte pendirian
        $nda_doc = $request->NDA_DOCUMENT;
        $nama_nda_doc = $nda_doc->getClientOriginalName();
        $nda_doc->move(public_path().'/data_file'.$nama_akte_perubahan);

        // upload file akte pendirian
        $draft_template = $request->DRAFT_TEMPLATE_AGREEMENT_END_USER;
        $nama_draft_template = $draft_template->getClientOriginalName();
        $draft_template->move(public_path().'/data_file'.$nama_akte_perubahan);

        Partner::create([
            'NAMA_PERUSAHAAN' => $request->NAMA_PERUSAHAAN,
            'ALAMAT_PERUSAHAAN' => $request->ALAMAT_PERUSAHAAN,
            'STATUS_BADAN_HUKUM' => $request->STATUS_BADAN_HUKUM,
            'AKTE_PENDIRIAN' => $nama_akte_pendirian,
            'COMPANY_PROFILE' => $nama_company_profile,
            'DETIL_PRODUCT_PROFILE' => $request->DETIL_PRODUCT_PROFILE,
            'AKTE_PERUBAHAN_ANGGARAN_DASAR' => $nama_akte_perubahan,
            'SIUP' => $nama_siup,
            'TDP' => $nama_tdp,
            'NPWP' => $nama_npwp,
            'Nama_Direktur_Utama' => $request->Nama_Direktur_Utama,
            'No_HP_Dirut' => $request->No_HP_Dirut,
            'Nama_Direktur1' => $request->Nama_Direktur1,
            'No_HP_Direktur1' => $request->No_HP_Direktur1,
            'Nama_Direktur_2' => $request->Nama_Direktur_2,
            'No_HP_Direktur2' => $request->No_HP_Direktur2,
            'MODAL_PENDIRIAN' => $nama_modal_pendirian,
            'MODAL_PERUBAHAN_TERAKHIR' => $nama_modal_perubahan,
            'AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS' => $nama_audited_financial,
            'IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR' => $nama_in_house,
            'BANK_STATEMENT_LAST_3_MONTHS' => $nama_bank_statement,
            'FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS' => $nama_financial_projection,
            'CONTOH_RISK_ACCEPTANCE_CRITERIA' => $nama_risk_acc,
            'NDA_DOCUMENT' => $nama_nda_doc,
            'DRAFT_TEMPLATE_AGREEMENT_END_USER' => $nama_draft_template,
            'status' => $request->status,
        ]);

        return redirect('partner');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
