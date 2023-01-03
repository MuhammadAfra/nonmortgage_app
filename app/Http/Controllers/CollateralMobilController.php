<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Collateral_Mobil;

class CollateralMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Collateral_Mobil::get();
        return view('collateral_utama.mobil.index', compact('mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prod = Product::get();
        return view('collateral_utama.mobil.create', compact('prod'));
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
            'Nilai_Mobil_Vehicle',
            'Merk',
            'Type',
            'Model',
            'Peruntukan',
            'Nama_Di_Bpkb',
            'Alamat_Di_Bpkb',
            'No_Frame',
            'No_Engine',
            'No_Polisi',
            'Colour',
            'Tahun',
            'Silinder',
            'Status',
        ]);

        Collateral_Mobil::create($request->all());
        return redirect('collateral_mobil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collateral_Mobil  $collateral_Mobil
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = Collateral_Mobil::findorfail($id);
        return view('collateral_utama.mobil.detail', compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collateral_Mobil  $collateral_Mobil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = Collateral_Mobil::findorfail($id);
        $prod = Product::get();
        return view('collateral_utama.mobil.edit', compact('mobil','prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collateral_Mobil  $collateral_Mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'PRODUCT_ID',
            'Nilai_Mobil_Vehicle',
            'Merk',
            'Type',
            'Model',
            'Peruntukan',
            'Nama_Di_Bpkb',
            'Alamat_Di_Bpkb',
            'No_Frame',
            'No_Engine',
            'No_Polisi',
            'Colour',
            'Tahun',
            'Silinder',
            'Status',
        ]);

        $mobil = Collateral_Mobil::findorfail($id);
        $mobil->update($request->all());

        return redirect('collateral_mobil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collateral_Mobil  $collateral_Mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Collateral_Mobil::findorfail($id);
        $mobil->delete();
        
        return redirect('collateral_mobil');
    }
}
