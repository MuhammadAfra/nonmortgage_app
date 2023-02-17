<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Partner;
use App\Models\Debitur;
use App\Models\Master_Product;
use Illuminate\Http\Request;
use App\Models\Collateral_Mobil;
use App\Models\Debitur_Badan_Usaha;
use Illuminate\Support\Facades\DB;

class CollateralMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Collateral_Mobil::orderBy('id', 'desc')->get();
        return view('collateral_utama.mobil.index', compact('mobil'));
    }

    public function nextCounter(Request $request){
        $partner_id = $request->partner_id;
        $debitur_id = $request->debitur_id;

        $counter = DB::table('collateral_mobil')->select(DB::raw('count(id) + 1 as jumlah'))
        ->where('PARTNER_ID', $partner_id)
        ->where('DEBITUR_ID', $debitur_id)
        ->get();

        return response()->json(['data' => $counter]);
    }

    public function nextCounter_2(Request $request){
        $partner_id = $request->partner_id;
        $debus_id = $request->debus_id;

        $counter_2 = DB::table('collateral_mobil')->select(DB::raw('count(id) + 1 as jumlah'))
        ->where('PARTNER_ID', $partner_id)
        ->where('DEBITUR_BADAN_USAHA_ID', $debus_id)
        ->get();

        return response()->json(['data' => $counter_2]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partner = Partner::all();
        $debitur = Debitur::all();
        $dbu = Debitur_Badan_Usaha::all();
        return view('collateral_utama.mobil.create', compact('partner', 'debitur', 'dbu'));
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
            'PARTNER_ID',
            'DEBITUR_ID',
            'DEBITUR_BADAN_USAHA_ID',
            'debitur',
            'COLL_COUNTER',
            'Nilai_Mobil_Vehicle',
            'Merk',
            'Type',
            'Model',
            'Peruntukan',
            'Nama_Di_Bpkb',
            'Alamat_Di_Bpkb',
            'No_Frame',
            'No_Engine',
            'No_Polisi',
            'Colour',
            'Tahun',
            'Silinder',
            'Status',
        ]);

        Collateral_Mobil::create([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'jenisDeb' => $request->debitur,
            'DEBITUR_BADAN_USAHA_ID' => $request->DEBITUR_BADAN_USAHA_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Mobil_Vehicle' => str_replace(',', '' ,$request->Nilai_Mobil_Vehicle),
            'Merk' => $request->Merk,
            'Type' => $request->Type,
            'Model' => $request->Model,
            'Peruntukan' => $request->Peruntukan,
            'Nama_Di_Bpkb' => $request->Nama_Di_Bpkb,
            'Alamat_Di_Bpkb' => $request->Alamat_Di_Bpkb,
            'No_Frame' => $request->No_Frame,
            'No_Engine' => $request->No_Engine,
            'No_Polisi' => $request->No_Polisi,
            'Colour' => $request->Colour,
            'Tahun' => $request->Tahun,
            'Silinder' => $request->Silinder,
            'Status' => $request->Status,
        ]);
        return redirect('collateral_mobil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collateral_Mobil  $collateral_Mobil
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = Collateral_Mobil::findorfail($id);
        return view('collateral_utama.mobil.detail', compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collateral_Mobil  $collateral_Mobil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = Collateral_Mobil::findorfail($id);
        $partner = Partner::all();
        $debitur = Debitur::all ();
        $dbu = Debitur_Badan_Usaha::all();
        return view('collateral_utama.mobil.edit', compact('mobil', 'partner', 'debitur', 'dbu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collateral_Mobil  $collateral_Mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'PARTNER_ID',
            'DEBITUR_ID',
            'debitur',
            'DEBITUR_BADAN_USAHA_ID',
            'COLL_COUNTER',
            'Nilai_Mobil_Vehicle',
            'Merk',
            'Type',
            'Model',
            'Peruntukan',
            'Nama_Di_Bpkb',
            'Alamat_Di_Bpkb',
            'No_Frame',
            'No_Engine',
            'No_Polisi',
            'Colour',
            'Tahun',
            'Silinder',
            'Status',
        ]);

        $mobil = Collateral_Mobil::findorfail($id);
        $mobil->update([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'jenisDeb' => $request->debitur,
            'DEBITUR_BADAN_USAHA_ID' => $request->DEBITUR_BADAN_USAHA_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Mobil_Vehicle' => str_replace(',', '' ,$request->Nilai_Mobil_Vehicle),
            'Merk' => $request->Merk,
            'Type' => $request->Type,
            'Model' => $request->Model,
            'Peruntukan' => $request->Peruntukan,
            'Nama_Di_Bpkb' => $request->Nama_Di_Bpkb,
            'Alamat_Di_Bpkb' => $request->Alamat_Di_Bpkb,
            'No_Frame' => $request->No_Frame,
            'No_Engine' => $request->No_Engine,
            'No_Polisi' => $request->No_Polisi,
            'Colour' => $request->Colour,
            'Tahun' => $request->Tahun,
            'Silinder' => $request->Silinder,
            'Status' => $request->Status,
        ]);

        return redirect('collateral_mobil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collateral_Mobil  $collateral_Mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Collateral_Mobil::findorfail($id);
        $mobil->delete();
        
        return redirect('collateral_mobil');
    }
}
