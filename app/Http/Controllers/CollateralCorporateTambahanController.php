<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collateral_Corporate_Tambahan;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Debitur;
use App\Models\Master_Product;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $partner = Partner::all();
        $debitur = Debitur::all ();
        $m_product = Master_Product::all();
        return view('collateral_tambahan.corporate.create', compact('product', 'partner', 'debitur', 'm_product'));
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
            'PRODUCT_ID',
            'Nilai_Corporate_Guarantee_Tambahan',
            'Nama_Pt_Penerima_Corporate_Guarantee_Tambahan',
            'Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan',
            'No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan',
            'Status_Tambahan',                    
        ]);

        Collateral_Corporate_Tambahan::create([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'PRODUCT_ID' => $request->PRODUCT_ID,
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
        $product = Product::all();
        $partner = Partner::all();
        $debitur = Debitur::all ();
        $m_product = Master_Product::all();
        return view('collateral_tambahan.corporate.edit', compact('corporatetbh','prouduct','partner', 'debitur', 'm_product'));
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
            'PRODUCT_ID',
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
            'PRODUCT_ID' => $request->PRODUCT_ID,
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
