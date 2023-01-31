<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\Collateral_Motor;
use App\Models\Debitur;
use App\Models\Master_Product;
use Illuminate\Support\Facades\DB;


class CollateralMotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motor = Collateral_Motor::orderBy('id', 'desc')->get();
        return view('collateral_utama.motor.index', compact('motor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function nextCounter(Request $request){
        $partner_id = $request->partner_id;
        $debitur_id = $request->debitur_id;

        $counter = DB::table('collateral_motor')->select(DB::raw('count(id) + 1 as jumlah'))
        ->where('PARTNER_ID', $partner_id)
        ->where('DEBITUR_ID', $debitur_id)
        ->get();

        return response()->json(['data' => $counter]);
    }

    public function create()
    {

        $partner = Partner::all();
        $debitur = Debitur::all();
        return view('collateral_utama.motor.create', compact('partner', 'debitur'));
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
            'Nilai_Motor_Vehicle',
            'Merk',
            'Type',
            'Model',
            'Jenis_Motor_Sport_Listrik',
            'Nama_Di_Bpkb',
            'No_Frame',
            'No_Engine',
            'No_Polisi',
            'Colour',
            'Tahun',
            'Silinder',
            'Status',
        ]);

        Collateral_Motor::create([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Motor_Vehicle' => str_replace(',', '', $request->Nilai_Motor_Vehicle),
            'Merk' => $request->Merk,
            'Type' => $request->Type,
            'Model' => $request->Model,
            'Jenis_Motor_Sport_Listrik' => $request->Jenis_Motor_Sport_Listrik,
            'Nama_Di_Bpkb' => $request->Nama_Di_Bpkb,
            'No_Frame' => $request->No_Frame,
            'No_Engine' => $request->No_Engine,
            'No_Polisi' => $request->No_Polisi,
            'Colour' => $request->Colour,
            'Tahun' => $request->Tahun,
            'Silinder' => $request->Silinder,
            'Status' => $request->Status,
        ]);
        return redirect('collateral_motor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collateral_Motor  $collateral_Motor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motor = Collateral_Motor::findorfail($id);
        return view('collateral_utama.motor.detail', compact('motor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collateral_Motor  $collateral_Motor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motor = Collateral_Motor::findorfail($id);
        $partner = Partner::all();
        $debitur = Debitur::all ();
        return view('collateral_utama.motor.edit', compact('motor', 'partner', 'debitur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collateral_Motor  $collateral_Motor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'PARTNER_ID',
            'DEBITUR_ID',
            'COLL_COUNTER',
            'Nilai_Motor_Vehicle',
            'Merk',
            'Type',
            'Model',
            'Jenis_Motor_Sport_Listrik',
            'Nama_Di_Bpkb',
            'No_Frame',
            'No_Engine',
            'No_Polisi',
            'Colour',
            'Tahun',
            'Silinder',
            'Status',
        ]);

        $motor = Collateral_Motor::findorfail($id);
        $motor->update([
            'PARTNER_ID' => $request->PARTNER_ID,
            'DEBITUR_ID' => $request->DEBITUR_ID,
            'COLL_COUNTER' => $request->COLL_COUNTER,
            'Nilai_Motor_Vehicle' => str_replace(',', '', $request->Nilai_Motor_Vehicle),
            'Merk' => $request->Merk,
            'Type' => $request->Type,
            'Model' => $request->Model,
            'Jenis_Motor_Sport_Listrik' => $request->Jenis_Motor_Sport_Listrik,
            'Nama_Di_Bpkb' => $request->Nama_Di_Bpkb,
            'No_Frame' => $request->No_Frame,
            'No_Engine' => $request->No_Engine,
            'No_Polisi' => $request->No_Polisi,
            'Colour' => $request->Colour,
            'Tahun' => $request->Tahun,
            'Silinder' => $request->Silinder,
            'Status' => $request->Status,
        ]);

        return redirect('collateral_motor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collateral_Motor  $collateral_Motor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motor = Collateral_Motor::findorfail($id);
        $motor->delete();

        return redirect('collateral_motor');
    }
}
