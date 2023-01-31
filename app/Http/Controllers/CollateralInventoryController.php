<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collateral_Inventory;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Debitur;
use App\Models\Master_Product;
use Illuminate\Support\Facades\DB;

class CollateralInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inven = Collateral_Inventory::get();
        return view('collateral_utama.inventory.index', compact('inven'));
    }

    public function nextCounter(Request $request){
        $partner_id = $request->partner_id;
        $debitur_id = $request->debitur_id;

        $counter = DB::table('collateral_inventory')->select(DB::raw('count(id) + 1 as jumlah'))
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
        return view('collateral_utama.inventory.create',  compact('partner', 'debitur'));
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
            'Nilai_Inv',
            'Nama_Inventory',
            'Besar_Inventory',
            'Nilai_Inventory',
            'Alamat_Inventory',
            'Atas_Nama_Inventory',
            'Alamat_Atas_Nama_Inventory',
            'Status',
        ]);
        
        Collateral_Inventory::create([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Inv' => str_replace(',', '', $request->Nilai_Inv),
            'Nama_Inventory' => $request->Nama_Inventory,
            'Besar_Inventory' => $request->Besar_Inventory,
            'Nilai_Inventory' => str_replace(',', '', $request->Nilai_Inventory),
            'Alamat_Inventory' => $request->Alamat_Inventory,
            'Atas_Nama_Inventory' => $request->Atas_Nama_Inventory,
            'Alamat_Atas_Nama_Inventory' => $request->Alamat_Atas_Nama_Inventory,
            'Status' => $request->Status,
        ]);
        return redirect('collateral_inven');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collateral_Inventory  $collateral_Inventory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inven = Collateral_Inventory::findorfail($id);
        return view('collateral_utama.inventory.detail', compact('inven'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collateral_Inventory  $collateral_Inventory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inven = Collateral_Inventory::findorfail($id);
        $partner = Partner::all();
        $debitur = Debitur::all ();
        return view('collateral_utama.invoice.edit', compact('inven', 'partner', 'debitur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collateral_Inventory  $collateral_Inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'PARTNER_ID',
            'DEBITUR_ID',
            'COLL_COUNTER',
            'Nilai_Inv',
            'Nama_Inventory',
            'Besar_Inventory',
            'Nilai_Inventory',
            'Alamat_Inventory',
            'Atas_Nama_Inventory',
            'Alamat_Atas_Nama_Inventory',
            'Status',
        ]);
        $inven = Collateral_Inventory::findorfail($id);
        $inven->update([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Inv' => str_replace(',', '', $request->Nilai_Inv),
            'Nama_Inventory' => $request->Nama_Inventory,
            'Besar_Inventory' => $request->Besar_Inventory,
            'Nilai_Inventory' => str_replace(',', '', $request->Nilai_Inventory),
            'Alamat_Inventory' => $request->Alamat_Inventory,
            'Atas_Nama_Inventory' => $request->Atas_Nama_Inventory,
            'Alamat_Atas_Nama_Inventory' => $request->Alamat_Atas_Nama_Inventory,
            'Status' => $request->Status,
        ]);

        return redirect('collateral_inven');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collateral_Inventory  $collateral_Inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inven = Collateral_Inventory::findorfail($id);
        $inven->delete();
        
        return redirect('collateral_inven');
    }
}
