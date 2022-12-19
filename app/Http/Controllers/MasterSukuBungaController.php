<?php

namespace App\Http\Controllers;

use App\Models\Master_Suku_Bunga;
use Illuminate\Http\Request;

class MasterSukuBungaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sukuBunga = Master_Suku_Bunga::all();
        return view('master.suku_bunga.index', compact('sukuBunga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.suku_bunga.create');
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
            'Suku_Bunga' => 'required',
            'Nilai_Suku_Bunga' => 'required',
        ],[
            'Suku_Bunga' => 'Input Suku Bunga',
            'Nilai_Suku_Bunga' => 'Input Nilai Suku Bunga',
        ]);

        Master_Suku_Bunga::create([
            'Suku_Bunga' => $request->Suku_Bunga,
            'Nilai_Suku_Bunga' => $request->Nilai_Suku_Bunga,
        ]);

        return redirect('master_suku_bunga');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master_Suku_Bunga  $master_Suku_Bunga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sukuBunga = Master_Suku_Bunga::findorfail($id);
        return view('master.suku_bunga.detail', compact('sukuBunga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master_Suku_Bunga  $master_Suku_Bunga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sukuBunga = Master_Suku_Bunga::findorfail($id);
        return view('master.suku_bunga.edit', compact('sukuBunga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master_Suku_Bunga  $master_Suku_Bunga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Suku_Bunga' => 'required',
            'Nilai_Suku_Bunga' => 'required',
        ],[
            'Suku_Bunga' => 'Input Suku Bunga',
            'Nilai_Suku_Bunga' => 'Input Nilai Suku Bunga',
        ]);

        $sukuBunga = Master_Suku_Bunga::findorfail($id);
        $sukuBunga->update([
            'Suku_Bunga' => $request->Suku_Bunga,
            'Nilai_Suku_Bunga' => $request->Nilai_Suku_Bunga,
        ]);
        
        return redirect('master_suku_bunga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master_Suku_Bunga  $master_Suku_Bunga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sukuBunga = Master_Suku_Bunga::findorfail($id);
        $sukuBunga->delete();

        return redirect('master_suku_bunga');
    }
}
