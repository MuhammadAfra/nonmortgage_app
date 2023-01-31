<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collateral_Motor_Tambahan;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Debitur;
use App\Models\Master_Product;
use Illuminate\Support\Facades\DB;

class CollateralMotorTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motor = Collateral_Motor_Tambahan::orderBy('id', 'desc')->get();
        return view('collateral_tambahan.motor.index', compact('motor'));
    }

    public function nextCounter(Request $request){
        $partner_id = $request->partner_id;
        $debitur_id = $request->debitur_id;

        $counter = DB::table('collateral_motor_tambahan')->select(DB::raw('count(id) + 1 as jumlah'))
        ->where('PARTNER_ID', $partner_id)
        ->where('DEBITUR_ID', $debitur_id)
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
        return view('collateral_tambahan.motor.create', compact('partner', 'debitur'));
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
            'Nilai_Motor_Vehicle_Tambahan',
            'Merk_Tambahan',
            'Type_Tambahan',
            'Model_Tambahan',
            'Jenis_Motor_Sport_Listrik_Tambahan',
            'Nama_Di_Bpkb_Tambahan',
            'Counter_Motor_Tambahan',
            'No_Frame_Tambahan',
            'No_Engine_Tambahan',
            'No_Polisi_Tambahan',
            'Colour_Tambahan',
            'Tahun_Tambahan',
            'Silinder_Tambahan',
            'Status_Tambahan',
        ]);

        Collateral_Motor_Tambahan::create([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Motor_Vehicle_Tambahan' => str_ireplace(',', '', $request->Nilai_Motor_Vehicle_Tambahan),
            'Merk_Tambahan' => $request->Merk_Tambahan,
            'Type_Tambahan' => $request->Type_Tambahan,
            'Model_Tambahan' => $request->Model_Tambahan,
            'Jenis_Motor_Sport_Listrik_Tambahan' => $request->Jenis_Motor_Sport_Listrik_Tambahan,
            'Nama_Di_Bpkb_Tambahan' => $request->Nama_Di_Bpkb_Tambahan,
            'Counter_Motor_Tambahan' => $request->Counter_Motor_Tambahan,
            'No_Frame_Tambahan' => $request->No_Frame_Tambahan,
            'No_Engine_Tambahan' => $request->No_Engine_Tambahan,
            'No_Polisi_Tambahan' => $request->No_Polisi_Tambahan,
            'Colour_Tambahan' => $request->Colour_Tambahan,
            'Tahun_Tambahan' => $request->Tahun_Tambahan,
            'Silinder_Tambahan' => $request->Silinder_Tambahan,
            'Status_Tambahan' => $request->Status_Tambahan,
        ]);
        return redirect('collateral_motor_tambahan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collateral_Motor_Tambahan  $collateral_Motor_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motor = Collateral_Motor_Tambahan::findorfail($id);
        return view('collateral_tambahan.motor.detail', compact('motor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collateral_Motor_Tambahan  $collateral_Motor_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motor = Collateral_Motor_Tambahan::findorfail($id);
        $partner = Partner::all();
        $debitur = Debitur::all ();
        return view('collateral_tambahan.motor.edit', compact('motor','partner','debitur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collateral_Motor_Tambahan  $collateral_Motor_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'id',
            'PARTNER_ID',
            'DEBITUR_ID',
            'COLL_COUNTER',
            'Nilai_Motor_Vehicle_Tambahan',
            'Merk_Tambahan',
            'Type_Tambahan',
            'Model_Tambahan',
            'Jenis_Motor_Sport_Listrik_Tambahan',
            'Nama_Di_Bpkb_Tambahan',
            'Counter_Motor_Tambahan',
            'No_Frame_Tambahan',
            'No_Engine_Tambahan',
            'No_Polisi_Tambahan',
            'Colour_Tambahan',
            'Tahun_Tambahan',
            'Silinder_Tambahan',
            'Status_Tambahan',
        ]);

        $motor = Collateral_Motor_Tambahan::findorfail($id);
        $motor->update([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Motor_Vehicle_Tambahan' => str_ireplace(',', '', $request->Nilai_Motor_Vehicle_Tambahan),
            'Merk_Tambahan' => $request->Merk_Tambahan,
            'Type_Tambahan' => $request->Type_Tambahan,
            'Model_Tambahan' => $request->Model_Tambahan,
            'Jenis_Motor_Sport_Listrik_Tambahan' => $request->Jenis_Motor_Sport_Listrik_Tambahan,
            'Nama_Di_Bpkb_Tambahan' => $request->Nama_Di_Bpkb_Tambahan,
            'Counter_Motor_Tambahan' => $request->Counter_Motor_Tambahan,
            'No_Frame_Tambahan' => $request->No_Frame_Tambahan,
            'No_Engine_Tambahan' => $request->No_Engine_Tambahan,
            'No_Polisi_Tambahan' => $request->No_Polisi_Tambahan,
            'Colour_Tambahan' => $request->Colour_Tambahan,
            'Tahun_Tambahan' => $request->Tahun_Tambahan,
            'Silinder_Tambahan' => $request->Silinder_Tambahan,
            'Status_Tambahan' => $request->Status_Tambahan,
        ]);

        return redirect('collateral_motor_tambahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collateral_Motor_Tambahan  $collateral_Motor_Tambahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motor = Collateral_Motor_Tambahan::findorfail($id);
        $motor->delete();

        return redirect('collateral_motor_tambahan');
    }
}
