<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Collateral_Motor_Tambahan;

class CollateralMotorTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motor = Collateral_Motor_Tambahan::get();
        return view('collateral_tambahan.motor.index', compact('motor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prod = Product::get();
        return view('collateral_tambahan.motor.create', compact('prod'));
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
            // 'id',
            'PRODUCT_ID',
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

        Collateral_Motor_Tambahan::create($request->all());
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
        $prod = Product::get();
        return view('collateral_tambahan.motor.edit', compact('motor','prod'));
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
            'PRODUCT_ID',
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
        $motor->update($request->all());

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
