<?php

namespace App\Http\Controllers;

use App\Models\Master_Asuransi;
use Illuminate\Http\Request;

class MasterAsuransiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisAsuransi = Master_Asuransi::all();
        return view('master.asuransi.index', compact('jenisAsuransi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.asuransi.create');
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
            'jenis_asuransi' => 'required',
        ],[
            'jenis_asuransi' => 'Input Jenis Asuransi!',
        ]);

        Master_Asuransi::create([
            'jenis_asuransi' => $request->jenis_asuransi,
        ]);

        return redirect('master_asuransi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asuransi = Master_Asuransi::findorfail($id);
        return view('master.asuransi.detail', compact('asuransi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asuransi = Master_Asuransi::findorfail($id);
        return view('master.asuransi.edit', compact('asuransi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis_asuransi' => 'required'
        ],[
            'jenis_asuransi' => 'Input Jenis Asuransi!'
        ]);

        $asuransi = Master_Asuransi::findorfail($id);
        $asuransi->update([
            'jenis_asuransi' => $request->jenis_asuransi
        ]);

        return redirect('master_asuransi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asuransi = Master_Asuransi::findorfail($id);
        $asuransi->delete();

        return redirect('master_asuransi');
    }
}
