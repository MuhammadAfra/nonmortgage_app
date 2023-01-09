<?php

namespace App\Http\Controllers;

use App\Models\Master_Jenis_Pembiayaan;
use App\Models\Master_Skema_Pembiayaan;
use Illuminate\Http\Request;

class MasterSkemaPembiayaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skemaPembiayaan = Master_Skema_Pembiayaan::orderBy('id', 'desc')->get();
        return view('master.skema_pembiayaan.index', compact('skemaPembiayaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jp = Master_Jenis_Pembiayaan::all();
        return view('master.skema_pembiayaan.create', compact('jp'));
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
            'skema_pembiayaan' => 'required',
            'id_jenis_pembiayaan' => 'required'
        ],[
            'skema_pembiayaan' => 'Input Skema Pembiayaan!',
            'id_jenis_pembiayaan' => 'required'
        ]);

        Master_Skema_Pembiayaan::create([
            'skema_pembiayaan' => $request->skema_pembiayaan,
            'id_jenis_pembiayaan' => $request->id_jenis_pembiayaan,
        ]);

        return redirect('master_skema_pembiayaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master_Skema_Pembiayaan  $master_Skema_Pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skemaPembiayaan = Master_Skema_Pembiayaan::findorfail($id);
        return view('master.skema_pembiayaan.detail', compact('skemaPembiayaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master_Skema_Pembiayaan  $master_Skema_Pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jp = Master_Jenis_Pembiayaan::all();
        $skemaPembiayaan = Master_Skema_Pembiayaan::findorfail($id);
        return view('master.skema_pembiayaan.edit', compact('skemaPembiayaan','jp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master_Skema_Pembiayaan  $master_Skema_Pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'skema_pembiayaan' => 'required',
            'id_jenis_pembiayaan' => 'required'
        ],[
            'skema_pembiayaan' => 'Input Skema Pembiayaan!',
            'id_jenis_pembiayaan' => 'required'
        ]);

        $sp = Master_Skema_Pembiayaan::findorfail($id);
        $sp->update([
            'skema_pembiayaan' => $request->skema_pembiayaan,
            'id_jenis_pembiayaan' => $request->id_jenis_pembiayaan
        ]);

        return redirect('master_skema_pembiayaan');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master_Skema_Pembiayaan  $master_Skema_Pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sp = Master_Skema_Pembiayaan::findorfail($id);
        $sp->delete();
        return redirect('master_skema_pembiayaan');
    }
}
