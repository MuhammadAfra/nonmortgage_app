<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collateral_Corporate;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Debitur;
use App\Models\Master_Product;
use Illuminate\Support\Facades\DB;

class CollateralCorporateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corporate = Collateral_Corporate::get();
        return view('collateral_utama.corporate.index', compact('corporate'));
    }

    public function nextCounter(Request $request){
        $partner_id = $request->partner_id;
        $debitur_id = $request->debitur_id;

        $counter = DB::table('collateral_corporate_guarantee')->select(DB::raw('count(id) + 1 as jumlah'))
        ->where('PARTNER_ID', $partner_id)
        ->where('DEBITUR_ID', $debitur_id)
        ->get();

        return response()->json(['data' => $counter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partner = Partner::all();
        $debitur = Debitur::all ();
        return view('collateral_utama.corporate.create', compact('partner', 'debitur'));
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
            'PARTNER_ID',
            'DEBITUR_ID',
            'COLL_COUNTER',
            'Nilai_Corporate_Guarantee',
            'Nama_Pt_Penerima_Corporate_Guarantee',
            'Nama_Pt_Pemberi_Corporate_Guarantee',
            'No_Telp_Pt_Pemberi_Corporate_Guarantee',
            'Status',                    
        ]);

        Collateral_Corporate::create([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Corporate_Guarantee' => str_replace(',', '', $request->Nilai_Corporate_Guarantee),
            'Nama_Pt_Penerima_Corporate_Guarantee' => $request->Nama_Pt_Penerima_Corporate_Guarantee,
            'Nama_Pt_Pemberi_Corporate_Guarantee' => $request->Nama_Pt_Pemberi_Corporate_Guarantee,
            'No_Telp_Pt_Pemberi_Corporate_Guarantee' => $request->No_Telp_Pt_Pemberi_Corporate_Guarantee,
            'Status' => $request->Status, 
        ]);
        return redirect('collateral_corporate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $corporate = Collateral_Corporate::findorfail($id);
        return view('collateral_utama.corporate.detail', compact('corporate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $corporate = Collateral_Corporate::findorfail($id);
        $partner = Partner::all();
        $debitur = Debitur::all ();
        return view('collateral_utama.corporate.edit', compact('corporate','partner', 'debitur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'PARTNER_ID',
            'DEBITUR_ID',
            'COLL_COUNTER',
            'Nilai_Corporate_Guarantee',
            'Nama_Pt_Penerima_Corporate_Guarantee',
            'Nama_Pt_Pemberi_Corporate_Guarantee',
            'No_Telp_Pt_Pemberi_Corporate_Guarantee',
            'Status',  
        ]);

        $corporate = Collateral_Corporate::findorfail($id);
        $corporate->update([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Corporate_Guarantee' => str_replace(',', '', $request->Nilai_Corporate_Guarantee),
            'Nama_Pt_Penerima_Corporate_Guarantee' => $request->Nama_Pt_Penerima_Corporate_Guarantee,
            'Nama_Pt_Pemberi_Corporate_Guarantee' => $request->Nama_Pt_Pemberi_Corporate_Guarantee,
            'No_Telp_Pt_Pemberi_Corporate_Guarantee' => $request->No_Telp_Pt_Pemberi_Corporate_Guarantee,
            'Status' => $request->Status, 
        ]);
        return redirect('collateral_corporate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $corporate = Collateral_Corporate::findorfail($id);
        $corporate->delete();
        return redirect('collateral_corporate');
    }
}