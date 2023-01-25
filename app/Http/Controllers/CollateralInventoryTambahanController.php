<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collateral_Inventory_Tambahan;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Debitur;
use App\Models\Master_Product;

class CollateralInventoryTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventbh = Collateral_Inventory_Tambahan::get();
        return view('collateral_tambahan.inventory.index', compact('inventbh'));
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
        return view('collateral_tambahan.inventory.create', compact('product', 'partner', 'debitur', 'm_product'));
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
            'Nilai_Inv_Tambahan',
            'Nama_Inventory_Tambahan',
            'Besar_Inventory_Tambahan',
            'Nilai_Inventory_Tambahan',
            'Alamat_Inventory_Tambahan',
            'Atas_Nama_Inventory_Tambahan',
            'Alamat_Atas_Nama_Inventory_Tambahan',
            'Status_Tambahan',
        ]);

        Collateral_Inventory_Tambahan::create([
        'PARTNER_ID' => $request->PARTNER_ID,
        'DEBITUR_ID' => $request->DEBITUR_ID,
        'PRODUCT_ID' => $request->PRODUCT_ID,
        'Nilai_Inv_Tambahan' => str_ireplace(',', '', $request->Nilai_Inv_Tambahan),
        'Nama_Inventory_Tambahan' =>$request->Nama_Inventory_Tambahan,
        'Besar_Inventory_Tambahan' =>$request->Besar_Inventory_Tambahan,
        'Nilai_Inventory_Tambahan' =>str_ireplace(',', '', $request->Nilai_Inventory_Tambahan),
        'Alamat_Inventory_Tambahan' =>$request->Alamat_Inventory_Tambahan,
        'Atas_Nama_Inventory_Tambahan' =>$request->Atas_Nama_Inventory_Tambahan,
        'Alamat_Atas_Nama_Inventory_Tambahan' =>$request->Alamat_Atas_Nama_Inventory_Tambahan,
        'Status_Tambahan' =>$request->Status_Tambahan,
        ]);
        return redirect('collateral_inven_tambahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collateral_Inventory_Tambahan  $collateral_Inventory_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventbh = Collateral_Inventory_Tambahan::findorfail($id);
        return view('collateral_tambahan.inventory.detail', compact('inventbh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collateral_Inventory_Tambahan  $collateral_Inventory_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventbh = Collateral_Inventory_Tambahan::findorfail($id);
        $product = Product::all();
        $partner = Partner::all();
        $debitur = Debitur::all ();
        $m_product = Master_Product::all();
        return view('collateral_tambahan.inventory.edit', compact('inventbh','product', 'partner', 'debitur', 'm_product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collateral_Inventory_Tambahan  $collateral_Inventory_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'PARTNER_ID',
            'DEBITUR_ID',
            'PRODUCT_ID',
            'Nilai_Inv_Tambahan',
            'Nama_Inventory_Tambahan',
            'Besar_Inventory_Tambahan',
            'Nilai_Inventory_Tambahan',
            'Alamat_Inventory_Tambahan',
            'Atas_Nama_Inventory_Tambahan',
            'Alamat_Atas_Nama_Inventory_Tambahan',
            'Status_Tambahan',
        ]);
        $inventbh = Collateral_Inventory_Tambahan::findorfail($id);
        $inventbh->update([
        'PARTNER_ID' => $request->PARTNER_ID,
        'DEBITUR_ID' => $request->DEBITUR_ID,
        'PRODUCT_ID' => $request->PRODUCT_ID,
        'Nilai_Inv_Tambahan' => str_ireplace(',', '', $request->Nilai_Inv_Tambahan),
        'Nama_Inventory_Tambahan' =>$request->Nama_Inventory_Tambahan,
        'Besar_Inventory_Tambahan' =>$request->Besar_Inventory_Tambahan,
        'Nilai_Inventory_Tambahan' =>str_ireplace(',', '', $request->Nilai_Inventory_Tambahan),
        'Alamat_Inventory_Tambahan' =>$request->Alamat_Inventory_Tambahan,
        'Atas_Nama_Inventory_Tambahan' =>$request->Atas_Nama_Inventory_Tambahan,
        'Alamat_Atas_Nama_Inventory_Tambahan' =>$request->Alamat_Atas_Nama_Inventory_Tambahan,
        'Status_Tambahan' =>$request->Status_Tambahan,
    ]);

        return redirect('collateral_inven_tambahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collateral_Inventory_Tambahan  $collateral_Inventory_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventbh = Collateral_Inventory_Tambahan::findorfail($id);
        $inventbh->delete();
        
        return redirect('collateral_inven_tambahan');
    }
}
