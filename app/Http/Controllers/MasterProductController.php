<?php

namespace App\Http\Controllers;

use App\Models\Master_Product;
use Illuminate\Http\Request;

class MasterProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Master_Product::all();
        return view('master.master_product.index', compact('product'));
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
     * @param  \App\Models\Master_Product  $master_Product
     * @return \Illuminate\Http\Response
     */
    public function show(Master_Product $master_Product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master_Product  $master_Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Master_Product $master_Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master_Product  $master_Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master_Product $master_Product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master_Product  $master_Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master_Product $master_Product)
    {
        //
    }
}
