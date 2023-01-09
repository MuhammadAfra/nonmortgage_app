<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use App\Models\Master_Jenis_Product;
use App\Models\Master_Pola_Pembayaran;
use App\Models\Master_Product;
use App\Models\Master_Suku_Bunga;
use App\Models\Partner;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

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
        $pola = Master_Pola_Pembayaran::all();
        $partner = Partner::all();
        $prod = Master_Product::all();
        return view('product.create', compact('deb','pola','partner','prod'));
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
            'M_PRODUCT_ID' => 'required',
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM' => 'required',
            'Jangka_Waktu_Maximum' => 'required',
            'SUKU_BUNGA_FLAT' => 'required',
            'SUKU_BUNGA_EFFECTIVE' => 'required',
            'POLA_PEMBAYARAN_ID' => 'required',
        ],[
            'PARTNER_ID.required' => 'Input Partner ID!',
            'DEBITUR_ID.required' => 'Input Debitur ID!',
            'M_PRODUCT_ID.required' => 'Input Konven / Syariah!',
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM.required' => 'Input Nilai Pembiayaan!',
            'Jangka_Waktu_Maximum.required' => 'Input Jangka Waktu!',
            'SUKU_BUNGA_FLAT.required' => 'Input Suku Bunga!',
            'SUKU_BUNGA_EFFECTIVE.required' => 'Input Suku Bunga!',
            'POLA_PEMBAYARAN_ID.required' => 'Input Pola Pembayaran!',
        ]);

        Product::create([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'M_PRODUCT_ID' => $request->M_PRODUCT_ID,
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM' => str_replace( ',', '', $request->NILAI_PEMBIAYAAN_POKOK_MAXIMUM),
            'Jangka_Waktu_Maximum' => $request->Jangka_Waktu_Maximum,
            'BIAYA_ADMINISTRASI' => str_replace( ',', '', $request->BIAYA_ADMINISTRASI ),
            'BIAYA_ASSURANSI' => str_replace( ',', '', $request->BIAYA_ASSURANSI ),
            'BIAYA_PROVISI' => str_replace( ',', '', $request->BIAYA_PROVISI ),
            'BIAYA_LAIN_LAIN' => str_replace( ',', '', $request->BIAYA_LAIN_LAIN ),
            'SUKU_BUNGA_FLAT' => $request->SUKU_BUNGA_FLAT,
            'SUKU_BUNGA_FLAT' => $request->SUKU_BUNGA_FLAT,
            'SUKU_BUNGA_EFFECTIVE' => $request->SUKU_BUNGA_EFFECTIVE,
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
        // $bunga = Master_Suku_Bunga::all();
        $pola = Master_Pola_Pembayaran::all();
        $partner = Partner::all();
        $prod = Master_Product::all();
        return view('product.edit', compact('deb','pola','partner','dataproduct','prod'));
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
            'M_PRODUCT_ID' => 'required',
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM' => 'required',
            'Jangka_Waktu_Maximum' => 'required',
            'SUKU_BUNGA_FLAT' => 'required',
            'SUKU_BUNGA_EFFECTIVE' => 'required',
            'POLA_PEMBAYARAN_ID' => 'required',
        ],[
            'PARTNER_ID.required' => 'Input Partner ID!',
            'DEBITUR_ID.required' => 'Input Debitur ID!',
            'M_PRODUCT_ID.required' => 'Input Konven / Syariah!',
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM.required' => 'Input Nilai Pembiayaan!',
            'Jangka_Waktu_Maximum.required' => 'Input Jangka Waktu!',
            'SUKU_BUNGA_FLAT.required' => 'Input Suku Bunga!',
            'SUKU_BUNGA_EFFECTIVE.required' => 'Input Suku Bunga!',
            'POLA_PEMBAYARAN_ID.required' => 'Input Pola Pembayaran!',
        ]);

        $dataproduct = Product::findorfail($id);
        $dataproduct->update([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'M_PRODUCT_ID' => $request->M_PRODUCT_ID,
            'NILAI_PEMBIAYAAN_POKOK_MAXIMUM' => str_replace( ',', '', $request->NILAI_PEMBIAYAAN_POKOK_MAXIMUM ),
            'Jangka_Waktu_Maximum' => $request->Jangka_Waktu_Maximum,
            'BIAYA_ADMINISTRASI' => $request->BIAYA_ADMINISTRASI,
            'BIAYA_ASSURANSI' => str_replace( ',', '', $request->BIAYA_ASSURANSI),
            'BIAYA_PROVISI' => str_replace( ',', '', $request->BIAYA_PROVISI),
            'BIAYA_LAIN_LAIN' => str_replace( ',', '', $request->BIAYA_LAIN_LAIN),
            'SUKU_BUNGA_FLAT' => $request->SUKU_BUNGA_FLAT,
            'SUKU_BUNGA_FLAT' => $request->SUKU_BUNGA_FLAT,
            'SUKU_BUNGA_EFFECTIVE' => $request->SUKU_BUNGA_EFFECTIVE,
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
        $dataproduct = Product::findorfail($id);
        $dataproduct->delete();

        return redirect('product');
    }
    
    public function import(Request $request)
    {
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $file->move('import/product',$nama_file);

        Excel::import(new ProductImport, public_path('/import/product/'.$nama_file));

        Session::flash('sukses','Data Produk Berhasil Diimport!');
        return redirect('product');
    }
}
