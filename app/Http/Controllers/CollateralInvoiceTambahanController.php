<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collateral_Invoice_Tambahan;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Debitur;
use App\Models\Master_Product;

class CollateralInvoiceTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoicetbh = Collateral_Invoice_Tambahan::get();
        return view('collateral_tambahan.invoice.index', compact('invoicetbh'));
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
        return view('collateral_tambahan.invoice.create',  compact('product', 'partner', 'debitur', 'm_product'));
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
            'Nilai_Invoice_Tambahan',
            'Jenis_Invoice_Tambahan',
            'Atas_Nama_Invoice_Tambahan',
            'Alamat_Nama_Invoice_Tambahan',
            'No_Fiducia_Tambahan',
            'Nilai_Fiducia_Tambahan',
            'Tgl_Fiducia_Tambahan',
            'Tgl_Jatuh_Tempo_Tambahan',
            'Status_Tambahan',           
        ]);

        Collateral_Invoice_Tambahan::create([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'PRODUCT_ID' => $request->PRODUCT_ID,
            'Nilai_Invoice_Tambahan' => str_replace(',', '', $request->Nilai_Invoice_Tambahan),
            'Jenis_Invoice_Tambahan' => $request->Jenis_Invoice_Tambahan,
            'Atas_Nama_Invoice_Tambahan' => $request->Atas_Nama_Invoice_Tambahan,
            'Alamat_Nama_Invoice_Tambahan' => $request->Alamat_Nama_Invoice_Tambahan,
            'No_Fiducia_Tambahan' => $request->No_Fiducia_Tambahan,
            'Nilai_Fiducia_Tambahan' => str_replace(',', '', $request->Nilai_Fiducia_Tambahan),
            'Tgl_Fiducia_Tambahan' => $request->Tgl_Fiducia_Tambahan,
            'Tgl_Jatuh_Tempo_Tambahan' => $request->Tgl_Jatuh_Tempo_Tambahan,
            'Status_Tambahan' => $request->Status_Tambahan,
        ]);
        return redirect('collateral_invoice_tambahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collateral_Invoice_Tambahan  $collateral_Invoice_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoicetbh = Collateral_Invoice_Tambahan::findorfail($id);
        return view('collateral_tambahan.invoice.detail', compact('invoicetbh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collateral_Invoice_Tambahan  $collateral_Invoice_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoicetbh = Collateral_Invoice_Tambahan::findorfail($id);
        $product = Product::all();
        $partner = Partner::all();
        $debitur = Debitur::all ();
        $m_product = Master_Product::all();
        return view('collateral_tambahan.invoice.edit', compact('invoicetbh','product','partner', 'debitur', 'm_product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collateral_Invoice_Tambahan  $collateral_Invoice_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'PARTNER_ID',
            'DEBITUR_ID',
            'PRODUCT_ID',
            'Nilai_Invoice_Tambahan',
            'Jenis_Invoice_Tambahan',
            'Atas_Nama_Invoice_Tambahan',
            'Alamat_Nama_Invoice_Tambahan',
            'No_Fiducia_Tambahan',
            'Nilai_Fiducia_Tambahan',
            'Tgl_Fiducia_Tambahan',
            'Tgl_Jatuh_Tempo_Tambahan',
            'Status_Tambahan',       
        ]);

        $invoicetbh = Collateral_Invoice_Tambahan::findorfail($id);
        $invoicetbh->update([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'PRODUCT_ID' => $request->PRODUCT_ID,
            'Nilai_Invoice_Tambahan' => str_replace(',', '', $request->Nilai_Invoice_Tambahan),
            'Jenis_Invoice_Tambahan' => $request->Jenis_Invoice_Tambahan,
            'Atas_Nama_Invoice_Tambahan' => $request->Atas_Nama_Invoice_Tambahan,
            'Alamat_Nama_Invoice_Tambahan' => $request->Alamat_Nama_Invoice_Tambahan,
            'No_Fiducia_Tambahan' => $request->No_Fiducia_Tambahan,
            'Nilai_Fiducia_Tambahan' => str_replace(',', '', $request->Nilai_Fiducia_Tambahan),
            'Tgl_Fiducia_Tambahan' => $request->Tgl_Fiducia_Tambahan,
            'Tgl_Jatuh_Tempo_Tambahan' => $request->Tgl_Jatuh_Tempo_Tambahan,
            'Status_Tambahan' => $request->Status_Tambahan,
        ]);

        return redirect('collateral_invoice_tambahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collateral_Invoice_Tambahan  $collateral_Invoice_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoicetbh = Collateral_Invoice_Tambahan::findorfail($id);
        $invoicetbh->delete();
        
        return redirect('collateral_invoice_tambahan');
    }
}
