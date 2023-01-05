<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Collateral_Inventory_Tambahan;

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
        $prod = Product::get();
        return view('collateral_tambahan.inventory.create', compact('prod'));
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
            'PRODUCT_ID',
            'Counter_Inventory_Tambahan',
            'Nilai_Inv_Tambahan',
            'Nama_Inventory_Tambahan',
            'Besar_Inventory_Tambahan',
            'Nilai_Inventory_Tambahan',
            'Alamat_Inventory_Tambahan',
            'Atas_Nama_Inventory_Tambahan',
            'Alamat_Atas_Nama_Inventory_Tambahan',
            'Status_Tambahan',
        ]);

        Collateral_Inventory_Tambahan::create($request->all());
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
        $prod = Product::get();
        return view('collateral_tambahan.inventory.edit', compact('inventbh','prod'));
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
            'PRODUCT_ID',
            'Counter_Inventory_Tambahan',
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
        $inventbh->update($request->all());

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
