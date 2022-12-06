<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataproduct = Product::get();
        return view('product.index', compact('dataproduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id' => 'required',
            'PARTNER_ID' => 'required',
            'DEBITUR_ID' => 'required',
            'KONVEN_SYARIAH' => 'required',
            'NAMA_DEBITUR' => 'required',
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM' => 'required',
            'Jangka_Waktu_Maximum' => 'required',
            'BIAYA_ADMINISTRASI' => 'required',
            'BIAYA_ASSURANSI' => 'required',
            'BIAYA_PROVISI' => 'required',
            'BIAYA_LAIN_LAIN' => 'required',
            ]);

        Product::create([
            'id' => $request->id,
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'KONVEN_SYARIAH' => $request->KONVEN_SYARIAH,
            'NAMA_DEBITUR' => $request->NAMA_DEBITUR,
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM' => $request->NILAI_PEMBIAYAAN_POKOK_MAXIMUM,
            'Jangka_Waktu_Maximum' => $request->Jangka_Waktu_Maximum,
            'BIAYA_ADMINISTRASI' => $request->BIAYA_ADMINISTRASI,
            'BIAYA_ASSURANSI' => $request->BIAYA_ASSURANSI,
            'BIAYA_PROVISI' => $request->BIAYA_PROVISI,
            'BIAYA_LAIN_LAIN' => $request->BIAYA_LAIN_LAIN,
            ]);

        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataproduct = Product::findorfail($id);
        return view('product.detail', compact('dataproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataproduct = Product::findorfail($id);
        return view('product.edit', compact('dataproduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataproduct = Product::findorfail($id);
        $dataproduct->update([
            'id' => $request->id,
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'KONVEN_SYARIAH' => $request->KONVEN_SYARIAH,
            'NAMA_DEBITUR' => $request->NAMA_DEBITUR,
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM' => $request->NILAI_PEMBIAYAAN_POKOK_MAXIMUM,
            'Jangka_Waktu_Maximum' => $request->Jangka_Waktu_Maximum,
            'BIAYA_ADMINISTRASI' => $request->BIAYA_ADMINISTRASI,
            'BIAYA_ASSURANSI' => $request->BIAYA_ASSURANSI,
            'BIAYA_PROVISI' => $request->BIAYA_PROVISI,
            'BIAYA_LAIN_LAIN' => $request->BIAYA_LAIN_LAIN,
        ]);
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataproduct =  Product::findorfail($id);
        $dataproduct->delete();

        return redirect('product');
    }

    public function upload()
    {
        return view('product.upload');
    }
}
