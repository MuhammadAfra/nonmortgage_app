<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Collateral_Rumah_Tambahan;

class CollateralRumahTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rumahtbh = Collateral_Rumah_Tambahan::get();
        return view('collateral_tambahan.rumah.index', compact('rumahtbh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prod = Product::get();
        return view('collateral_tambahan.rumah.create', compact('prod'));
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
            'Counter_Rumah_Tanah_Tambahan',
            'Nilai_Rumah_Tanah_Tambahan',
            'No_Shm_No_Hgb_Tambahan',
            'Luas_Tambahan',
            'Atas_Nama_Tambahan',
            'Alamat_Tambahan',
            'Nilai_Appraisal_Tambahan',
            'Status_Tambahan',
        ]);

        Collateral_Rumah_Tambahan::create($request->all());
        return redirect('collateral_rumah_tambahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collateral_Rumah_Tambahan  $collateral_Rumah_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rumahtbh = Collateral_Rumah_Tambahan::findorfail($id);
        return view('collateral_tambahan.rumah.detail', compact('rumahtbh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collateral_Rumah_Tambahan  $collateral_Rumah_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rumahtbh = Collateral_Rumah_Tambahan::findorfail($id);
        $prod = Product::get();
        return view('collateral_tambahan.rumah.edit', compact('rumahtbh','prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collateral_Rumah_Tambahan  $collateral_Rumah_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'PRODUCT_ID',
            'Counter_Rumah_Tanah_Tambahan',
            'Nilai_Rumah_Tanah_Tambahan',
            'No_Shm_No_Hgb_Tambahan',
            'Luas_Tambahan',
            'Atas_Nama_Tambahan',
            'Alamat_Tambahan',
            'Nilai_Appraisal_Tambahan',
            'Status_Tambahan',
        ]);
        $rumahtbh = Collateral_Rumah_Tambahan::findorfail($id);
        $rumahtbh->update($request->all());

        return redirect('collateral_rumah_tambahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collateral_Rumah_Tambahan  $collateral_Rumah_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rumahtbh = Collateral_Rumah_Tambahan::findorfail($id);
        $rumahtbh->delete();
        
        return redirect('collateral_rumah_tambahan');
    }
}
