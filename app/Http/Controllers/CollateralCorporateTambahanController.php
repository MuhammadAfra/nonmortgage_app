<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Collateral_Corporate_Tambahan;

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
        $prod = Product::get();
        return view('collateral_utama.corporate.create', compact('prod'));
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
            'Counter_Corporate_Guarantee_Tambahan',
            'PRODUCT_ID',
            'Nilai_Corporate_Guarantee_Tambahan',
            'Nama_Pt_Penerima_Corporate_Guarantee_Tambahan',
            'Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan',
            'No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan',
            'Status_Tambahan',                    
        ]);

        Collateral_Corporate_Tambahan::create($request->all());
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
        $prod = Product::get();
        return view('collateral_tambahan.corporate.edit', compact('corporatetbh','prod'));
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
            'Counter_Corporate_Guarantee_Tambahan',
            'PRODUCT_ID',
            'Nilai_Corporate_Guarantee_Tambahan',
            'Nama_Pt_Penerima_Corporate_Guarantee_Tambahan',
            'Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan',
            'No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan',
            'Status_Tambahan',  
        ]);

        $corporatetbh = Collateral_Corporate_Tambahan::findorfail($id);
        $corporatetbh->update($request->all());
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
