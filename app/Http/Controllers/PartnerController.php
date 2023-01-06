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
            'AKTE_PENDIRIAN' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,xlsx,pdf,doc,docx,ppt,pptx',
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

        $partner = Partner::create($request->all());
        
        if($request->hasFile('AKTE_PENDIRIAN'))
        {
            $request->file('AKTE_PENDIRIAN')->move('data_partner/', $request->file('AKTE_PENDIRIAN')->getClientOriginalName());
            $partner->AKTE_PENDIRIAN = $request->file('AKTE_PENDIRIAN')->getClientOriginalName();
            $partner->save();
        }
        
        if($request->hasFile('COMPANY_PROFILE'))
        {
            $request->file('COMPANY_PROFILE')->move('data_partner/', $request->file('COMPANY_PROFILE')->getClientOriginalName());
            $partner->COMPANY_PROFILE = $request->file('COMPANY_PROFILE')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('AKTE_PERUBAHAN_ANGGARAN_DASAR'))
        {
            $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->move('data_partner/', $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->getClientOriginalName());
            $partner->AKTE_PERUBAHAN_ANGGARAN_DASAR = $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('SIUP'))
        {
            $request->file('SIUP')->move('data_partner/', $request->file('SIUP')->getClientOriginalName());
            $partner->SIUP = $request->file('SIUP')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('TDP'))
        {
            $request->file('TDP')->move('data_partner/', $request->file('TDP')->getClientOriginalName());
            $partner->TDP = $request->file('TDP')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('NPWP'))
        {
            $request->file('NPWP')->move('data_partner/', $request->file('NPWP')->getClientOriginalName());
            $partner->NPWP = $request->file('NPWP')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('MODAL_PENDIRIAN'))
        {
            $request->file('MODAL_PENDIRIAN')->move('data_partner/', $request->file('MODAL_PENDIRIAN')->getClientOriginalName());
            $partner->MODAL_PENDIRIAN = $request->file('MODAL_PENDIRIAN')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('MODAL_PERUBAHAN_TERAKHIR'))
        {
            $request->file('MODAL_PERUBAHAN_TERAKHIR')->move('data_partner/', $request->file('MODAL_PERUBAHAN_TERAKHIR')->getClientOriginalName());
            $partner->MODAL_PERUBAHAN_TERAKHIR = $request->file('MODAL_PERUBAHAN_TERAKHIR')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS'))
        {   
            $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->move('data_partner/', $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->getClientOriginalName());
            $partner->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS = $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR'))
        {
           $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->move('data_partner/', $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->getClientOriginalName());
            $partner->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR = $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('BANK_STATEMENT_LAST_3_MONTHS'))
        {
            $request->file('BANK_STATEMENT_LAST_3_MONTHS')->move('data_partner/', $request->file('BANK_STATEMENT_LAST_3_MONTHS')->getClientOriginalName());
            $partner->BANK_STATEMENT_LAST_3_MONTHS = $request->file('BANK_STATEMENT_LAST_3_MONTHS')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS'))
        {
            $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->move('data_partner/', $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->getClientOriginalName());
            $partner->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS = $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->getClientOriginalName();
            $partner->save();
        }
        
        if($request->hasFile('DRAFT_TEMPLATE_AGREEMENT_END_USER'))
        {
            $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->move('data_partner/', $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->getClientOriginalName());
            $partner->DRAFT_TEMPLATE_AGREEMENT_END_USER = $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('CONTOH_RISK_ACCEPTANCE_CRITERIA'))
        {
            $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->move('data_partner/', $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->getClientOriginalName());
            $partner->CONTOH_RISK_ACCEPTANCE_CRITERIA = $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->getClientOriginalName();
            $partner->save();
        }
        
        if($request->hasFile('NDA_DOCUMENT'))
        {
            $request->file('NDA_DOCUMENT')->move('data_partner/', $request->file('NDA_DOCUMENT')->getClientOriginalName());
            $partner->NDA_DOCUMENT = $request->file('NDA_DOCUMENT')->getClientOriginalName();
            $partner->save();
        }

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
        $partner->update($request->all());
        
        if($request->hasFile('AKTE_PENDIRIAN'))
        {
            $request->file('AKTE_PENDIRIAN')->move('data_partner/', $request->file('AKTE_PENDIRIAN')->getClientOriginalName());
            $partner->AKTE_PENDIRIAN = $request->file('AKTE_PENDIRIAN')->getClientOriginalName();
            $partner->save();
        }
        
        if($request->hasFile('COMPANY_PROFILE'))
        {
            $request->file('COMPANY_PROFILE')->move('data_partner/', $request->file('COMPANY_PROFILE')->getClientOriginalName());
            $partner->COMPANY_PROFILE = $request->file('COMPANY_PROFILE')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('AKTE_PERUBAHAN_ANGGARAN_DASAR'))
        {
            $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->move('data_partner/', $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->getClientOriginalName());
            $partner->AKTE_PERUBAHAN_ANGGARAN_DASAR = $request->file('AKTE_PERUBAHAN_ANGGARAN_DASAR')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('SIUP'))
        {
            $request->file('SIUP')->move('data_partner/', $request->file('SIUP')->getClientOriginalName());
            $partner->SIUP = $request->file('SIUP')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('TDP'))
        {
            $request->file('TDP')->move('data_partner/', $request->file('TDP')->getClientOriginalName());
            $partner->TDP = $request->file('TDP')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('NPWP'))
        {
            $request->file('NPWP')->move('data_partner/', $request->file('NPWP')->getClientOriginalName());
            $partner->NPWP = $request->file('NPWP')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('MODAL_PENDIRIAN'))
        {
            $request->file('MODAL_PENDIRIAN')->move('data_partner/', $request->file('MODAL_PENDIRIAN')->getClientOriginalName());
            $partner->MODAL_PENDIRIAN = $request->file('MODAL_PENDIRIAN')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('MODAL_PERUBAHAN_TERAKHIR'))
        {
            $request->file('MODAL_PERUBAHAN_TERAKHIR')->move('data_partner/', $request->file('MODAL_PERUBAHAN_TERAKHIR')->getClientOriginalName());
            $partner->MODAL_PERUBAHAN_TERAKHIR = $request->file('MODAL_PERUBAHAN_TERAKHIR')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS'))
        {   
            $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->move('data_partner/', $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->getClientOriginalName());
            $partner->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS = $request->file('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR'))
        {
           $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->move('data_partner/', $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->getClientOriginalName());
            $partner->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR = $request->file('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('BANK_STATEMENT_LAST_3_MONTHS'))
        {
            $request->file('BANK_STATEMENT_LAST_3_MONTHS')->move('data_partner/', $request->file('BANK_STATEMENT_LAST_3_MONTHS')->getClientOriginalName());
            $partner->BANK_STATEMENT_LAST_3_MONTHS = $request->file('BANK_STATEMENT_LAST_3_MONTHS')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS'))
        {
            $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->move('data_partner/', $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->getClientOriginalName());
            $partner->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS = $request->file('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')->getClientOriginalName();
            $partner->save();
        }
        
        if($request->hasFile('DRAFT_TEMPLATE_AGREEMENT_END_USER'))
        {
            $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->move('data_partner/', $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->getClientOriginalName());
            $partner->DRAFT_TEMPLATE_AGREEMENT_END_USER = $request->file('DRAFT_TEMPLATE_AGREEMENT_END_USER')->getClientOriginalName();
            $partner->save();
        }

        if($request->hasFile('CONTOH_RISK_ACCEPTANCE_CRITERIA'))
        {
            $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->move('data_partner/', $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->getClientOriginalName());
            $partner->CONTOH_RISK_ACCEPTANCE_CRITERIA = $request->file('CONTOH_RISK_ACCEPTANCE_CRITERIA')->getClientOriginalName();
            $partner->save();
        }
        
        if($request->hasFile('NDA_DOCUMENT'))
        {
            $request->file('NDA_DOCUMENT')->move('data_partner/', $request->file('NDA_DOCUMENT')->getClientOriginalName());
            $partner->NDA_DOCUMENT = $request->file('NDA_DOCUMENT')->getClientOriginalName();
            $partner->save();
        }

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

        Session::flash('sukses','Data Debitur Berhasil Diimport!');
        return redirect('partner');
    }
}
