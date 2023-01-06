<?php

namespace App\Http\Controllers;

use App\Models\Master_Pola_Pembayaran;
use Illuminate\Http\Request;

class MasterPolaPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polaPembayaran = Master_Pola_Pembayaran::all();
        return view('master.pola_pembayaran.index', compact('polaPembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.pola_pembayaran.create');
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
            'Pola_Pembayaran' => 'required',
            'Nilai_Pola_Pembayaran' => 'required',
        ],[
            'Pola_Pembayaran' => 'Input Pola Pembayaran!',
            'Nilai_Pola_Pembayaran' => 'Input Nilai Pola Pembayaran!',
        ]);

        Master_Pola_Pembayaran::create([
            'Pola_Pembayaran' => $request->Pola_Pembayaran,
            'Nilai_Pola_Pembayaran' => $request->Nilai_Pola_Pembayaran,
        ]);

        return redirect('master_pola_pembayaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master_Pola_Pembayaran  $master_Pola_Pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $polaPembayaran = Master_Pola_Pembayaran::findorfail($id);
        return view('master.pola_pembayaran.detail', compact('polaPembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master_Pola_Pembayaran  $master_Pola_Pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $polaPembayaran = Master_Pola_Pembayaran::findorfail($id);
        return view('master.pola_pembayaran.edit', compact('polaPembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master_Pola_Pembayaran  $master_Pola_Pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Pola_Pembayaran' => 'required',
            'Nilai_Pola_Pembayaran' => 'required',
        ],[
            'Pola_Pembayaran' => 'Input Pola Pembayaran!',
            'Nilai_Pola_Pembayaran' => 'Input Nilai Pola Pembayaran!',
        ]);

        $polaPembayaran = Master_Pola_Pembayaran::findorfail($id);
        $polaPembayaran->update([
            'Pola_Pembayaran' => $request->Pola_Pembayaran,
            'Nilai_Pola_Pembayaran' => $request->Nilai_Pola_Pembayaran,
        ]);
        
        return redirect('master_pola_pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master_Pola_Pembayaran  $master_Pola_Pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $polaPembayaran = Master_Pola_Pembayaran::findorfail($id);
        $polaPembayaran->delete();
        return redirect('master_pola_pembayaran');
    }
}
