<?php

namespace App\Http\Controllers;

use App\Models\Collateral_Utama;
use App\Models\Collaterals;
use App\Models\Product;
use Illuminate\Http\Request;

class CollateralUtamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rumah()
    {
        $rumah = Collateral_Utama::select('product_id', 'Nilai_House_Land', 'No_Shm_No_Hgb', 'Luas', 'Atas_Nama', 'Alamat', 'Nilai_Appraisal', 'Status')
        ->where('Nilai_House_Land', '>=', '1')->get();
        return view('collateral_utama.rumah.index', compact('rumah'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collateral_Utama  $collateral_Utama
     * @return \Illuminate\Http\Response
     */
    public function show(Collateral_Utama $collateral_Utama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collateral_Utama  $collateral_Utama
     * @return \Illuminate\Http\Response
     */
    public function edit(Collateral_Utama $collateral_Utama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collateral_Utama  $collateral_Utama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collateral_Utama $collateral_Utama)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collateral_Utama  $collateral_Utama
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collateral_Utama $collateral_Utama)
    {
        //
    }
}
