<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use App\Models\Master_Jenis_Product;
use App\Models\Master_Pola_Pembayaran;
use App\Models\Master_Suku_Bunga;
use App\Models\Partner;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;

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
        $deb = Debitur::all();
        $bunga = Master_Suku_Bunga::all();
        $pola = Master_Pola_Pembayaran::all();
        $partner = Partner::all();
        $jp = Master_Jenis_Product::all();
        $konven = Product::select('*')->where('konven_syariah_id', '=', '1')->get();
        $syariah = Product::select('*')->where('konven_syariah_id', '=', '2')->get();
        return view('product.create', compact('deb','bunga','pola','partner','jp','konven','syariah'));
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
            'PARTNER_ID' => 'required',
            'DEBITUR_ID' => 'required',
            'KONVEN_SYARIAH_ID' => 'required',
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM' => 'required',
            'Jangka_Waktu_Maximum' => 'required',
            'SUKU_BUNGA_ID' => 'required',
            'POLA_PEMBAYARAN_ID' => 'required',
        ],[
            'PARTNER_ID.required' => 'Input Partner ID!',
            'DEBITUR_ID.required' => 'Input Debitur ID!',
            'KONVEN_SYARIAH_ID.required' => 'Input Konven / Syariah!',
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM.required' => 'Input Nilai Pembiayaan!',
            'Jangka_Waktu_Maximum.required' => 'Input Jangka Waktu!',
            'SUKU_BUNGA_ID.required' => 'Input Suku Bunga!',
            'POLA_PEMBAYARAN_ID.required' => 'Input Pola Pembayaran!',
        ]);

        Product::create([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'KONVEN_SYARIAH_ID' => $request->KONVEN_SYARIAH_ID,
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM' => $request->NILAI_PEMBIAYAAN_POKOK_MAXIMUM,
            'Jangka_Waktu_Maximum' => $request->Jangka_Waktu_Maximum,
            'BIAYA_ADMINISTRASI' => $request->BIAYA_ADMINISTRASI,
            'BIAYA_ASSURANSI' => $request->BIAYA_ASSURANSI,
            'BIAYA_PROVISI' => $request->BIAYA_PROVISI,
            'BIAYA_LAIN_LAIN' => $request->BIAYA_LAIN_LAIN,
            'SUKU_BUNGA_ID' => $request->SUKU_BUNGA_ID,
            'POLA_PEMBAYARAN_ID' => $request->POLA_PEMBAYARAN_ID,
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
        $deb = Debitur::all();
        $bunga = Master_Suku_Bunga::all();
        $pola = Master_Pola_Pembayaran::all();
        $partner = Partner::all();
        $jp = Master_Jenis_Product::all();
        return view('product.edit', compact('deb','bunga','pola','partner','dataproduct','jp'));
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
        $this->validate($request,[
            'PARTNER_ID' => 'required',
            'DEBITUR_ID' => 'required',
            'KONVEN_SYARIAH_ID' => 'required',
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM' => 'required',
            'Jangka_Waktu_Maximum' => 'required',
            'SUKU_BUNGA_ID' => 'required',
            'POLA_PEMBAYARAN_ID' => 'required',
        ],[
            'PARTNER_ID.required' => 'Input Partner ID!',
            'DEBITUR_ID.required' => 'Input Debitur ID!',
            'KONVEN_SYARIAH_ID.required' => 'Input Konven / Syariah!',
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM.required' => 'Input Nilai Pembiayaan!',
            'Jangka_Waktu_Maximum.required' => 'Input Jangka Waktu!',
            'SUKU_BUNGA_ID.required' => 'Input Suku Bunga!',
            'POLA_PEMBAYARAN_ID.required' => 'Input Pola Pembayaran!',
        ]);

        $dataproduct = Product::findorfail($id);
        $dataproduct->update([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'KONVEN_SYARIAH_ID' => $request->KONVEN_SYARIAH_ID,
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM' => $request->NILAI_PEMBIAYAAN_POKOK_MAXIMUM,
            'Jangka_Waktu_Maximum' => $request->Jangka_Waktu_Maximum,
            'BIAYA_ADMINISTRASI' => $request->BIAYA_ADMINISTRASI,
            'BIAYA_ASSURANSI' => $request->BIAYA_ASSURANSI,
            'BIAYA_PROVISI' => $request->BIAYA_PROVISI,
            'BIAYA_LAIN_LAIN' => $request->BIAYA_LAIN_LAIN,
            'SUKU_BUNGA_ID' => $request->SUKU_BUNGA_ID,
            'POLA_PEMBAYARAN_ID' => $request->POLA_PEMBAYARAN_ID,
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
