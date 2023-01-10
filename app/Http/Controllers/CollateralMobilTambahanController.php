<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Collateral_Mobil_Tambahan;
use App\Models\Collateral_Motor_Tambahan;

class CollateralMobilTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Collateral_Mobil_Tambahan::orderBy('id', 'desc')->get();
        return view('collateral_tambahan.mobil.index', compact('mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prod = Product::get();
        return view('collateral_tambahan.mobil.create', compact('prod'));
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
            'Nilai_Mobil_Vehicle_Tambahan',
            'Merk_Tambahan',
            'Type_Tambahan',
            'Model_Tambahan',
            'Peruntukan_Tambahan',
            'Nama_Di_Bpkb_Tambahan',
            'Alamat_Di_Bpkb_Tambahan',
            'No_Fram_Tambahane',
            'No_Engine_Tambahan',
            'No_Polisi_Tambahan',
            'Colour_Tambahan',
            'Tahun_Tambahan',
            'Silinder_Tambahan',
            'Status_Tambahan',
        ]);

        Collateral_Mobil_Tambahan::create([
            'PRODUCT_ID' => $request->PRODUCT_ID,
            'Nilai_Mobil_Vehicle_Tambahan' => str_replace(',', '' ,$request->Nilai_Mobil_Vehicle_Tambahan),
            'Counter_Mobil_Tambahan' => $request->Counter_Mobil_Tambahan,
            'Merk_Tambahan' => $request->Merk_Tambahan,
            'Type_Tambahan' => $request->Type_Tambahan,
            'Model_Tambahan' => $request->Model_Tambahan,
            'Peruntukan_Tambahan' => $request->Peruntukan_Tambahan,
            'Nama_Di_Bpkb_Tambahan' => $request->Nama_Di_Bpkb_Tambahan,
            'Alamat_Di_Bpkb_Tambahan' => $request->Alamat_Di_Bpkb_Tambahan,
            'No_Frame_Tambahan' => $request->No_Frame_Tambahan,
            'No_Engine_Tambahan' => $request->No_Engine_Tambahan,
            'No_Polisi_Tambahan' => $request->No_Polisi_Tambahan,
            'Colour_Tambahan' => $request->Colour_Tambahan,
            'Tahun_Tambahan' => $request->Tahun_Tambahan,
            'Silinder_Tambahan' => $request->Silinder_Tambahan,
            'Status_Tambahan' => $request->Status_Tambahan,
        ]);
        return redirect('collateral_mobil_tambahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collateral_Mobil_Tambahan  $collateral_Mobil_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = Collateral_Mobil_Tambahan::findorfail($id);
        return view('collateral_tambahan.mobil.detail', compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collateral_Mobil_Tambahan  $collateral_Mobil_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = Collateral_Mobil_Tambahan::findorfail($id);
        $prod = Product::get();
        return view('collateral_tambahan.mobil.edit', compact('mobil','prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collateral_Mobil_Tambahan  $collateral_Mobil_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'PRODUCT_ID',
            'Nilai_Mobil_Vehicle_Tambahan',
            'Merk_Tambahan',
            'Type_Tambahan',
            'Model_Tambahan',
            'Peruntukan_Tambahan',
            'Nama_Di_Bpkb_Tambahan',
            'Alamat_Di_Bpkb_Tambahan',
            'No_Fram_Tambahane',
            'No_Engine_Tambahan',
            'No_Polisi_Tambahan',
            'Colour_Tambahan',
            'Tahun_Tambahan',
            'Silinder_Tambahan',
            'Status_Tambahan',
        ]);

        $mobil = Collateral_Mobil_Tambahan::findorfail($id);
        $mobil->update([
            'PRODUCT_ID' => $request->PRODUCT_ID,
            'Nilai_Mobil_Vehicle_Tambahan' => str_replace(',', '' ,$request->Nilai_Mobil_Vehicle_Tambahan),
            'Counter_Mobil_Tambahan' => $request->Counter_Mobil_Tambahan,
            'Merk_Tambahan' => $request->Merk_Tambahan,
            'Type_Tambahan' => $request->Type_Tambahan,
            'Model_Tambahan' => $request->Model_Tambahan,
            'Peruntukan_Tambahan' => $request->Peruntukan_Tambahan,
            'Nama_Di_Bpkb_Tambahan' => $request->Nama_Di_Bpkb_Tambahan,
            'Alamat_Di_Bpkb_Tambahan' => $request->Alamat_Di_Bpkb_Tambahan,
            'No_Frame_Tambahan' => $request->No_Frame_Tambahan,
            'No_Engine_Tambahan' => $request->No_Engine_Tambahan,
            'No_Polisi_Tambahan' => $request->No_Polisi_Tambahan,
            'Colour_Tambahan' => $request->Colour_Tambahan,
            'Tahun_Tambahan' => $request->Tahun_Tambahan,
            'Silinder_Tambahan' => $request->Silinder_Tambahan,
            'Status_Tambahan' => $request->Status_Tambahan,
        ]);

        return redirect('collateral_mobil_tambahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collateral_Mobil_Tambahan  $collateral_Mobil_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Collateral_Mobil_Tambahan::findorfail($id);
        $mobil->delete();
        
        return redirect('collateral_mobil_tambahan');
    }
}
