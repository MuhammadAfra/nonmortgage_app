<?php

namespace App\Http\Controllers;

use App\Models\Master_Jenis_Pembiayaan;
use App\Models\Master_Jenis_Product;
use Illuminate\Http\Request;

class MasterJenisPembiayaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisPembiayaan = Master_Jenis_Pembiayaan::with('jenis_product')->get();
        return view('master.jenis_pembiayaan.index', compact('jenisPembiayaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisProduct = Master_Jenis_Product::all();
        return view('master.jenis_pembiayaan.create', compact('jenisProduct'));
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
            'jenis_pembiayaan' => 'required',
            'id_product' => 'required'
        ],[
            'jenis_pembiayaan' => 'Input Jenis Pembiayaan!',
            'id_product' => 'Input Id Product!'
        ]);

        Master_Jenis_Pembiayaan::create([
            'jenis_pembiayaan' => $request->jenis_pembiayaan,
            'id_product' => $request->id_product
        ]);

        return redirect('master_jenis_pembiayaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master_Jenis_Pembiayaan  $master_Jenis_Pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenisPembiayaan = Master_Jenis_Pembiayaan::findorfail($id);
        return view('master.jenis_pembiayaan.detail', compact('jenisPembiayaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master_Jenis_Pembiayaan  $master_Jenis_Pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisProduct = Master_Jenis_Product::all();
        $jenisPembiayaan = Master_Jenis_Pembiayaan::findorfail($id);
        return view('master.jenis_pembiayaan.edit', compact('jenisPembiayaan', 'jenisProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master_Jenis_Pembiayaan  $master_Jenis_Pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis_pembiayaan' => 'required',
            'id_product' => 'required'
        ],[
            'jenis_pembiayaan' => 'Input Jenis Pembiayaan!',
            'id_product' => 'Input Id Product!'
        ]);

        $jenisPembiayaan = Master_Jenis_Pembiayaan::findorfail($id);
        $jenisPembiayaan->update([
            'jenis_pembiayaan' => $request->jenis_pembiayaan,
            'id_product' => $request->id_product,
        ]);

        return redirect('master_jenis_pembiayaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master_Jenis_Pembiayaan  $master_Jenis_Pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisPembiayaan = Master_Jenis_Pembiayaan::findorfail($id);
        $jenisPembiayaan->delete();

        return redirect('master_jenis_pembiayaan');
    }
}
