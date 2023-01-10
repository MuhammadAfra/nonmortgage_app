<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Collateral_Corporate;

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
            'Counter_Corporate_Guarantee',
            'PRODUCT_ID',
            'Nilai_Corporate_Guarantee',
            'Nama_Pt_Penerima_Corporate_Guarantee',
            'Nama_Pt_Pemberi_Corporate_Guarantee',
            'No_Telp_Pt_Pemberi_Corporate_Guarantee',
            'Status',                    
        ]);

        Collateral_Corporate::create([
            'Counter_Corporate_Guarantee' => $request->Counter_Corporate_Guarantee,
            'PRODUCT_ID' => $request->PRODUCT_ID,
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
        $prod = Product::get();
        return view('collateral_utama.corporate.edit', compact('corporate','prod'));
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
            'Counter_Corporate_Guarantee',
            'PRODUCT_ID',
            'Nilai_Corporate_Guarantee',
            'Nama_Pt_Penerima_Corporate_Guarantee',
            'Nama_Pt_Pemberi_Corporate_Guarantee',
            'No_Telp_Pt_Pemberi_Corporate_Guarantee',
            'Status',  
        ]);

        $corporate = Collateral_Corporate::findorfail($id);
        $corporate->update([
            'Counter_Corporate_Guarantee' => $request->Counter_Corporate_Guarantee,
            'PRODUCT_ID' => $request->PRODUCT_ID,
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