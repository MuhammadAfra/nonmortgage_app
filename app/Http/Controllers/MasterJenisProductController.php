<?php

namespace App\Http\Controllers;

use App\Models\Master_Jenis_Product;
use Illuminate\Http\Request;

class MasterJenisProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisProduct = Master_Jenis_Product::all();
        return view('master.jenis_product.index', compact('jenisProduct'));
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
     * @param  \App\Models\Master_Jenis_Product  $master_Jenis_Product
     * @return \Illuminate\Http\Response
     */
    public function show(Master_Jenis_Product $master_Jenis_Product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master_Jenis_Product  $master_Jenis_Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Master_Jenis_Product $master_Jenis_Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master_Jenis_Product  $master_Jenis_Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master_Jenis_Product $master_Jenis_Product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master_Jenis_Product  $master_Jenis_Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master_Jenis_Product $master_Jenis_Product)
    {
        //
    }
}
