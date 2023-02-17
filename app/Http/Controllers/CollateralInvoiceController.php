<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collateral_Invoice;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Debitur;
use App\Models\Debitur_Badan_Usaha;
use App\Models\Master_Product;
use Illuminate\Support\Facades\DB;

class CollateralInvoiceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $invoice = Collateral_Invoice::orderBy('id', 'desc')->get();
        return view('collateral_utama.invoice.index', compact('invoice'));
    }

    public function nextCounter(Request $request){
        $partner_id = $request->partner_id;
        $debitur_id = $request->debitur_id;

        $counter = DB::table('collateral_invoice')->select(DB::raw('count(id) + 1 as jumlah'))
        ->where('PARTNER_ID', $partner_id)
        ->where('DEBITUR_ID', $debitur_id)
        ->get();

        return response()->json(['data' => $counter]);
    }

    public function nextCounter_2(Request $request){
        $partner_id = $request->partner_id;
        $debus_id = $request->debus_id;

        $counter_2 = DB::table('collateral_invoice')->select(DB::raw('count(id) + 1 as jumlah'))
        ->where('PARTNER_ID', $partner_id)
        ->where('DEBITUR_BADAN_USAHA_ID', $debus_id)
        ->get();

        return response()->json(['data' => $counter_2]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partner = Partner::all();
        $debitur = Debitur::all();
        $dbu = Debitur_Badan_Usaha::all();
        return view('collateral_utama.invoice.create', compact('partner', 'debitur', 'dbu'));
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
            'debitur',
            'DEBITUR_BADAN_USAHA_ID',
            'COLL_COUNTER',
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

        Collateral_Invoice::create([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'jenisDeb' => $request->debitur,
            'DEBITUR_BADAN_USAHA_ID' => $request->DEBITUR_BADAN_USAHA_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Invoice' => str_replace(',', '', $request->Nilai_Invoice),
            'Jenis_Invoice' => $request->Jenis_Invoice,
            'Atas_Nama_Invoice' => $request->Atas_Nama_Invoice,
            'Alamat_Nama_Invoice' => $request->Alamat_Nama_Invoice,
            'No_Fiducia' => $request->No_Fiducia,
            'Nilai_Fiducia' => str_replace(',', '', $request->Nilai_Fiducia),
            'Tgl_Fiducia' => $request->Tgl_Fiducia,
            'Tgl_Jatuh_Tempo' => $request->Tgl_Jatuh_Tempo,
            'Status' => $request->Status,
        ]);
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
        $partner = Partner::all();
        $debitur = Debitur::all();
        $dbu = Debitur_Badan_Usaha::all();
        return view('collateral_utama.invoice.edit', compact('invoice','partner', 'debitur', 'dbu'));
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
            'PARTNER_ID',
            'DEBITUR_ID',
            'debitur',
            'DEBITUR_BADAN_USAHA_ID',
            'COLL_COUNTER',
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
        $invoice->update([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'jenisDeb' => $request->debitur,
            'DEBITUR_BADAN_USAHA_ID' => $request->DEBITUR_BADAN_USAHA_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Invoice' => str_replace(',', '', $request->Nilai_Invoice),
            'Jenis_Invoice' => $request->Jenis_Invoice,
            'Atas_Nama_Invoice' => $request->Atas_Nama_Invoice,
            'Alamat_Nama_Invoice' => $request->Alamat_Nama_Invoice,
            'No_Fiducia' => $request->No_Fiducia,
            'Nilai_Fiducia' => str_replace(',', '', $request->Nilai_Fiducia),
            'Tgl_Fiducia' => $request->Tgl_Fiducia,
            'Tgl_Jatuh_Tempo' => $request->Tgl_Jatuh_Tempo,
            'Status' => $request->Status,
        ]);

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