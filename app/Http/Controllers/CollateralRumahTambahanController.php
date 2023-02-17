<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collateral_Rumah_Tambahan;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Debitur;
use App\Models\Debitur_Badan_Usaha;
use App\Models\Master_Product;
use Illuminate\Support\Facades\DB;

class CollateralRumahTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rumahtbh = Collateral_Rumah_Tambahan::get();
        return view('collateral_tambahan.rumah.index', compact('rumahtbh'));
    }

    public function nextCounter(Request $request){
        $partner_id = $request->partner_id;
        $debitur_id = $request->debitur_id;

        $counter = DB::table('collateral_rumah_tanah_tambahan')->select(DB::raw('count(id) + 1 as jumlah'))
        ->where('PARTNER_ID', $partner_id)
        ->where('DEBITUR_ID', $debitur_id)
        ->get();

        return response()->json(['data' => $counter]);
    }

    public function nextCounter_2(Request $request){
        $partner_id = $request->partner_id;
        $debus_id = $request->debus_id;

        $counter_2 = DB::table('collateral_rumah_tanah_tambahan')->select(DB::raw('count(id) + 1 as jumlah'))
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
        return view('collateral_tambahan.rumah.create', compact('partner', 'debitur', 'dbu'));
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
            'debitur',
            'DEBITUR_BADAN_USAHA_ID',
            'COLL_COUNTER',
            'Nilai_Rumah_Tanah_Tambahan',
            'No_Shm_No_Hgb_Tambahan',
            'Luas_Tambahan',
            'Atas_Nama_Tambahan',
            'Alamat_Tambahan',
            'Nilai_Appraisal_Tambahan',
            'Status_Tambahan',
        ]);

        Collateral_Rumah_Tambahan::create([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'jenisDeb' => $request->debitur,
            'DEBITUR_BADAN_USAHA_ID' => $request->DEBITUR_BADAN_USAHA_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Rumah_Tanah_Tambahan' => str_ireplace(',', '', $request->Nilai_Rumah_Tanah_Tambahan),
            'No_Shm_No_Hgb_Tambahan' => $request->No_Shm_No_Hgb_Tambahan,
            'Luas_Tambahan' => $request->Luas_Tambahan,
            'Atas_Nama_Tambahan' => $request->Atas_Nama_Tambahan,
            'Alamat_Tambahan' => $request->Alamat_Tambahan,
            'Nilai_Appraisal_Tambahan' => str_ireplace(',', '', $request->Nilai_Appraisal_Tambahan),
            'Status_Tambahan' => $request->Status_Tambahan,
        ]);
        return redirect('collateral_rumah_tambahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collateral_Rumah_Tambahan  $collateral_Rumah_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rumahtbh = Collateral_Rumah_Tambahan::findorfail($id);
        return view('collateral_tambahan.rumah.detail', compact('rumahtbh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collateral_Rumah_Tambahan  $collateral_Rumah_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rumahtbh = Collateral_Rumah_Tambahan::findorfail($id);
        $partner = Partner::all();
        $debitur = Debitur::all();
        $dbu = Debitur_Badan_Usaha::all();
        return view('collateral_tambahan.rumah.edit', compact('rumahtbh','partner','debitur', 'dbu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collateral_Rumah_Tambahan  $collateral_Rumah_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'PARTNER_ID',
            'DEBITUR_ID',
            'COLL_COUNTER',
            'Nilai_Rumah_Tanah_Tambahan',
            'No_Shm_No_Hgb_Tambahan',
            'Luas_Tambahan',
            'Atas_Nama_Tambahan',
            'Alamat_Tambahan',
            'Nilai_Appraisal_Tambahan',
            'Status_Tambahan',
        ]);
        $rumahtbh = Collateral_Rumah_Tambahan::findorfail($id);
        $rumahtbh->update([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Rumah_Tanah_Tambahan' => str_ireplace(',', '', $request->Nilai_Rumah_Tanah_Tambahan),
            'No_Shm_No_Hgb_Tambahan' => $request->No_Shm_No_Hgb_Tambahan,
            'Luas_Tambahan' => $request->Luas_Tambahan,
            'Atas_Nama_Tambahan' => $request->Atas_Nama_Tambahan,
            'Alamat_Tambahan' => $request->Alamat_Tambahan,
            'Nilai_Appraisal_Tambahan' => str_ireplace(',', '', $request->Nilai_Appraisal_Tambahan),
            'Status_Tambahan' => $request->Status_Tambahan,
        ]);

        return redirect('collateral_rumah_tambahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collateral_Rumah_Tambahan  $collateral_Rumah_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rumahtbh = Collateral_Rumah_Tambahan::findorfail($id);
        $rumahtbh->delete();
        
        return redirect('collateral_rumah_tambahan');
    }
}
