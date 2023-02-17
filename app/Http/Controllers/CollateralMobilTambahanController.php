<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collateral_Mobil_Tambahan;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Debitur;
use App\Models\Debitur_Badan_Usaha;
use App\Models\Master_Product;
use Illuminate\Support\Facades\DB;

class CollateralMobilTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Collateral_Mobil_Tambahan::orderBy('id', 'desc')->get();
        return view('collateral_tambahan.mobil.index', compact('mobil'));
    }

    public function nextCounter(Request $request){
        $partner_id = $request->partner_id;
        $debitur_id = $request->debitur_id;

        $counter = DB::table('collateral_mobil_tambahan')->select(DB::raw('count(id) + 1 as jumlah'))
        ->where('PARTNER_ID', $partner_id)
        ->where('DEBITUR_ID', $debitur_id)
        ->get();

        return response()->json(['data' => $counter]);
    }

    public function nextCounter_2(Request $request){
        $partner_id = $request->partner_id;
        $debus_id = $request->debus_id;

        $counter = DB::table('collateral_mobil_tambahan')->select(DB::raw('count(id) + 1 as jumlah'))
        ->where('PARTNER_ID', $partner_id)
        ->where('DEBITUR_ID', $debus_id)
        ->get();

        return response()->json(['data' => $counter]);
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
        return view('collateral_tambahan.mobil.create', compact('partner', 'debitur', 'dbu'));
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
            'COLL_COUNTER',
            'DEBITUR_BADAN_USAHA_ID',
            'debitur',
            'Nilai_Mobil_Vehicle_Tambahan',
            'Merk_Tambahan',
            'Type_Tambahan',
            'Model_Tambahan',
            'Peruntukan_Tambahan',
            'Nama_Di_Bpkb_Tambahan',
            'Alamat_Di_Bpkb_Tambahan',
            'No_Fram_Tambahane',
            'No_Engine_Tambahan',
            'No_Polisi_Tambahan',
            'Colour_Tambahan',
            'Tahun_Tambahan',
            'Silinder_Tambahan',
            'Status_Tambahan',
        ]);

        Collateral_Mobil_Tambahan::create([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'jenisDeb' => $request->debitur,
            'DEBITUR_BADAN_USAHA_ID' => $request->DEBITUR_BADAN_USAHA_ID,
            'Nilai_Mobil_Vehicle_Tambahan' => str_replace(',', '' ,$request->Nilai_Mobil_Vehicle_Tambahan),
            'Merk_Tambahan' => $request->Merk_Tambahan,
            'Type_Tambahan' => $request->Type_Tambahan,
            'Model_Tambahan' => $request->Model_Tambahan,
            'Peruntukan_Tambahan' => $request->Peruntukan_Tambahan,
            'Nama_Di_Bpkb_Tambahan' => $request->Nama_Di_Bpkb_Tambahan,
            'Alamat_Di_Bpkb_Tambahan' => $request->Alamat_Di_Bpkb_Tambahan,
            'No_Frame_Tambahan' => $request->No_Frame_Tambahan,
            'No_Engine_Tambahan' => $request->No_Engine_Tambahan,
            'No_Polisi_Tambahan' => $request->No_Polisi_Tambahan,
            'Colour_Tambahan' => $request->Colour_Tambahan,
            'Tahun_Tambahan' => $request->Tahun_Tambahan,
            'Silinder_Tambahan' => $request->Silinder_Tambahan,
            'Status_Tambahan' => $request->Status_Tambahan,
        ]);
        return redirect('collateral_mobil_tambahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collateral_Mobil_Tambahan  $collateral_Mobil_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = Collateral_Mobil_Tambahan::findorfail($id);
        return view('collateral_tambahan.mobil.detail', compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collateral_Mobil_Tambahan  $collateral_Mobil_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = Collateral_Mobil_Tambahan::findorfail($id);
        $partner = Partner::all();
        $debitur = Debitur::all();
        return view('collateral_tambahan.mobil.edit', compact('mobil','partner', 'debitur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collateral_Mobil_Tambahan  $collateral_Mobil_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'PARTNER_ID',
            'DEBITUR_ID',
            'COLL_COUNTER',
            'DEBITUR_BADAN_USAHA_ID',
            'debitur',
            'Nilai_Mobil_Vehicle_Tambahan',
            'Merk_Tambahan',
            'Type_Tambahan',
            'Model_Tambahan',
            'Peruntukan_Tambahan',
            'Nama_Di_Bpkb_Tambahan',
            'Alamat_Di_Bpkb_Tambahan',
            'No_Fram_Tambahane',
            'No_Engine_Tambahan',
            'No_Polisi_Tambahan',
            'Colour_Tambahan',
            'Tahun_Tambahan',
            'Silinder_Tambahan',
            'Status_Tambahan',
        ]);

        $mobil = Collateral_Mobil_Tambahan::findorfail($id);
        $mobil->update([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'jenisDeb' => $request->debitur,
            'DEBITUR_BADAN_USAHA_ID' => $request->DEBITUR_BADAN_USAHA_ID,
            'Nilai_Mobil_Vehicle_Tambahan' => str_replace(',', '' ,$request->Nilai_Mobil_Vehicle_Tambahan),
            'Merk_Tambahan' => $request->Merk_Tambahan,
            'Type_Tambahan' => $request->Type_Tambahan,
            'Model_Tambahan' => $request->Model_Tambahan,
            'Peruntukan_Tambahan' => $request->Peruntukan_Tambahan,
            'Nama_Di_Bpkb_Tambahan' => $request->Nama_Di_Bpkb_Tambahan,
            'Alamat_Di_Bpkb_Tambahan' => $request->Alamat_Di_Bpkb_Tambahan,
            'No_Frame_Tambahan' => $request->No_Frame_Tambahan,
            'No_Engine_Tambahan' => $request->No_Engine_Tambahan,
            'No_Polisi_Tambahan' => $request->No_Polisi_Tambahan,
            'Colour_Tambahan' => $request->Colour_Tambahan,
            'Tahun_Tambahan' => $request->Tahun_Tambahan,
            'Silinder_Tambahan' => $request->Silinder_Tambahan,
            'Status_Tambahan' => $request->Status_Tambahan,
        ]);

        return redirect('collateral_mobil_tambahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collateral_Mobil_Tambahan  $collateral_Mobil_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Collateral_Mobil_Tambahan::findorfail($id);
        $mobil->delete();
        
        return redirect('collateral_mobil_tambahan');
    }
}
