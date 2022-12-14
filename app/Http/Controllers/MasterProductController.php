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
        $product = Master_Product::orderBy('id', 'desc')->get();;
        return view('master.master_product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.master_product.create');
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
            'id_master_product' => 'required',
            'nama_product' => 'required'
        ],[
            'id_master_product' => 'Input Product!',
            'nama_product' => 'Input Product!'
        ]);

        Master_Product::create([
            'id_master_product' => $request->id_master_product,
            'nama_product' => $request->nama_product
        ]);

        return redirect('master_product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master_Product  $master_Product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Master_Product::findorfail($id);
        return view('master.master_product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master_Product  $master_Product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Master_Product::findorfail($id);
        return view('master.master_product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master_Product  $master_Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_master_product' => 'required',
            'nama_product' => 'required'
        ],[
            'id_master_product' => 'Input Product!',
            'nama_product' => 'Input Product!'
        ]);

        $product = Master_Product::findorfail($id);
        $product->update([
            'id_master_product' => $request->id_master_product,
            'nama_product' => $request->nama_product
        ]);

        return redirect('master_product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master_Product  $master_Product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Master_Product::findorfail($id);
        $product->delete();

        return redirect('master_product');
    }
}
