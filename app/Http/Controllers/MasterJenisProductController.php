<?php

namespace App\Http\Controllers;

use App\Models\Master_Jenis_Product;
use App\Models\Product;
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
        $jenisProduct = Master_Jenis_Product::orderBy('id', 'desc')->get();;
        return view('master.jenis_product.index', compact('jenisProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.jenis_product.create');
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
            'Product' => 'required'
        ],[
            'Product' => 'Input Jenis Product'
        ]);

        Master_Jenis_Product::create([
            'Product' => $request->Product
        ]);

        return redirect('master_jenis_product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master_Jenis_Product  $master_Jenis_Product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenisProduct = Master_Jenis_Product::findorfail($id);
        return view('master.jenis_product.detail', compact('jenisProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master_Jenis_Product  $master_Jenis_Product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisProduct = Master_Jenis_Product::findorfail($id);
        return view('master.jenis_product.edit', compact('jenisProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master_Jenis_Product  $master_Jenis_Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Product' => 'required'
        ],[
            'Product' => 'Input Jenis Product'
        ]);

        $jenisProduct = Master_Jenis_Product::findorfail($id);
        $jenisProduct->update([
            'Product' => $request->Product
        ]);

        return redirect('master_jenis_product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master_Jenis_Product  $master_Jenis_Product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisProduct = Master_Jenis_Product::findorfail($id);
        $jenisProduct->delete();

        return redirect('master_jenis_product');
    }
}
