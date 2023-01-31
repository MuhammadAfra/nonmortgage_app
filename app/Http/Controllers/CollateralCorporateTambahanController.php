<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collateral_Corporate_Tambahan;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Debitur;
use App\Models\Master_Product;
use Illuminate\Support\Facades\DB;

class CollateralCorporateTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corporatetbh = Collateral_Corporate_Tambahan::get();
        return view('collateral_tambahan.corporate.index', compact('corporatetbh'));
    }

    public function nextCounter(Request $request){
        $partner_id = $request->partner_id;
        $debitur_id = $request->debitur_id;

        $counter = DB::table('collateral_corporate_tambahan')->select(DB::raw('count(id) + 1 as jumlah'))
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
        return view('collateral_tambahan.corporate.create', compact('partner', 'debitur'));
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
            'Nilai_Corporate_Guarantee_Tambahan',
            'Nama_Pt_Penerima_Corporate_Guarantee_Tambahan',
            'Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan',
            'No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan',
            'Status_Tambahan',                    
        ]);

        Collateral_Corporate_Tambahan::create([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Corporate_Guarantee_Tambahan' => str_ireplace(',', '', $request->Nilai_Corporate_Guarantee_Tambahan), 
            'Nama_Pt_Penerima_Corporate_Guarantee_Tambahan' => $request->Nama_Pt_Penerima_Corporate_Guarantee_Tambahan,
            'Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan' => $request->Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan,
            'No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan' => $request->No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan,
            'Status_Tambahan' => $request->Status_Tambahan,        
        ]);
        return redirect('collateral_corporate_tambahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collateral_Corporate_Tambahan  $collateral_Corporate_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $corporatetbh = Collateral_Corporate_Tambahan::findorfail($id);
        return view('collateral_tambahan.corporate.detail', compact('corporatetbh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collateral_Corporate_Tambahan  $collateral_Corporate_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $corporatetbh = Collateral_Corporate_Tambahan::findorfail($id);
        $partner = Partner::all();
        $debitur = Debitur::all ();
        return view('collateral_tambahan.corporate.edit', compact('corporatetbh','partner','debitur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collateral_Corporate_Tambahan  $collateral_Corporate_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'PARTNER_ID',
            'DEBITUR_ID',
            'COLL_COUNTER',
            'Nilai_Corporate_Guarantee_Tambahan',
            'Nama_Pt_Penerima_Corporate_Guarantee_Tambahan',
            'Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan',
            'No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan',
            'Status_Tambahan',  
        ]);

        $corporatetbh = Collateral_Corporate_Tambahan::findorfail($id);
        $corporatetbh->update([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Corporate_Guarantee_Tambahan' => str_ireplace(',', '', $request->Nilai_Corporate_Guarantee_Tambahan), 
            'Nama_Pt_Penerima_Corporate_Guarantee_Tambahan' => $request->Nama_Pt_Penerima_Corporate_Guarantee_Tambahan,
            'Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan' => $request->Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan,
            'No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan' => $request->No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan,
            'Status_Tambahan' => $request->Status_Tambahan,
        ]);
        return redirect('collateral_corporate_tambahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collateral_Corporate_Tambahan  $collateral_Corporate_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $corporatetbh = Collateral_Corporate_Tambahan::findorfail($id);
        $corporatetbh->delete();
        return redirect('collateral_corporate_tambahan');
    }
}
