<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Collateral_Rumah;

class CollateralRumahController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rumah = Collateral_Rumah::get();
        return view('collateral_utama.rumah.index', compact('rumah'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prod = Product::get();
        return view('collateral_utama.rumah.create', compact('prod'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'PRODUCT_ID',
            'Counter_Rumah_tanah',
            'Nilai_Rumah_Tanah',
            'No_Shm_No_Hgb',
            'Luas',
            'Atas_Nama',
            'Alamat',
            'Nilai_Appraisal',
            'Status',
        ]);

        Collateral_Rumah::create([
            'PRODUCT_ID' => $request->PRODUCT_ID,
            'Counter_Rumah_tanah' => $request->Counter_Rumah_tanah,
            'Nilai_Rumah_Tanah' => str_ireplace(',', '', $request->Nilai_Rumah_Tanah),
            'No_Shm_No_Hgb' => $request->No_Shm_No_Hgb,
            'Luas' => $request->Luas,
            'Atas_Nama' => $request->Atas_Nama,
            'Alamat' => $request->Alamat,
            'Nilai_Appraisal' => str_ireplace(',', '', $request->Nilai_Appraisal),
            'Status' => $request->Status,
        ]);
        return redirect('collateral_rumah');
    }

    
    public function show($id)
    {
        $rumah = Collateral_Rumah::findorfail($id);
        return view('collateral_utama.rumah.detail', compact('rumah'));
    }
    public function edit($id)
    {
        $rumah = Collateral_Rumah::findorfail($id);
        $prod = Product::get();
        return view('collateral_utama.rumah.edit', compact('rumah','prod'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'PRODUCT_ID',
            'Counter_Rumah_tanah',
            'Nilai_Rumah_Tanah',
            'No_Shm_No_Hgb',
            'Luas',
            'Atas_Nama',
            'Alamat',
            'Nilai_Appraisal',
            'Status',
        ]);

        $rumah = Collateral_Rumah::findorfail($id);
        $rumah->update([
            'PRODUCT_ID' => $request->PRODUCT_ID,
            'Counter_Rumah_tanah' => $request->Counter_Rumah_tanah,
            'Nilai_Rumah_Tanah' => str_ireplace(',', '', $request->Nilai_Rumah_Tanah),
            'No_Shm_No_Hgb' => $request->No_Shm_No_Hgb,
            'Luas' => $request->Luas,
            'Atas_Nama' => $request->Atas_Nama,
            'Alamat' => $request->Alamat,
            'Nilai_Appraisal' => str_ireplace(',', '', $request->Nilai_Appraisal),
            'Status' => $request->Status,
        ]);

        return redirect('collateral_rumah');
    }

    public function destroy($id)
    {
        $rumah = Collateral_Rumah::findorfail($id);
        $rumah->delete();
        
        return redirect('collateral_rumah');
    }

}
