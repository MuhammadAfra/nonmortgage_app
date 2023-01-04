<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Collateral_Invoice;

class CollateralInvoiceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $invoice = Collateral_Invoice::get();
        return view('collateral_utama.invoice.index', compact('invoice'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prod = Product::get();
        return view('collateral_utama.invoice.create', compact('prod'));
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
            'Counter_Invoice',
            'PRODUCT_ID',
            'Nilai_Invoice',
            'Jenis_Invoice',
            'Atas_Nama_Invoice',
            'Alamat_Nama_Invoice',
            'No_Fiducia',
            'Nilai_Fiducia',
            'Tgl_Fiducia',
            'Tgl_Jatuh_Tempo',
            'Status',           
        ]);

        Collateral_Invoice::create($request->all());
        return redirect('collateral_invoice');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collateral_Invoice  $collateral_invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Collateral_Invoice::findorfail($id);
        return view('collateral_utama.invoice.detail', compact('invoice'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collateral_Invoice  $collateral_invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Collateral_Invoice::findorfail($id);
        $prod = Product::get();
        return view('collateral_utama.invoice.edit', compact('invoice','prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collateral_Invoice  $collateral_invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Counter_Invoice',
            'PRODUCT_ID',
            'Nilai_Invoice',
            'Jenis_Invoice',
            'Atas_Nama_Invoice',
            'Alamat_Nama_Invoice',
            'No_Fiducia',
            'Nilai_Fiducia',
            'Tgl_Fiducia',
            'Tgl_Jatuh_Tempo',
            'Status',       
        ]);

        $invoice = Collateral_Invoice::findorfail($id);
        $invoice->update($request->all());

        return redirect('collateral_invoice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collateral_Invoice  $collateral_Mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Collateral_Invoice::findorfail($id);
        $invoice->delete();
        
        return redirect('collateral_invoice');
    }
}