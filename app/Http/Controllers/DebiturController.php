<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;

class DebiturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $debitur = Debitur::all();
        return view('debitur.index', compact('debitur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('debitur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'NAMA_DEBITUR' => 'required',
            'TANGGAL_LAHIR' => 'required',
            'NO_KTP' => 'required',
            'NO_NPWP' => 'required',
            'ALAMAT_CUSTOMER' => 'required',
            'PROVINSI' => 'required',
            'KABUPATEN_KOTA' => 'required',
            'KELURAHAN' => 'required',
            'KODE_POS' => 'required',
            'NAMA_PERUSAHAAN' => 'required',
            'BIDANG_USAHA' => 'required',
            'SUB_BIDANG_USAHA' => 'required',
            'LAMA_USAHA' => 'required',
            'JABATAN' => 'required',
            'TANGGUNGAN' => 'required',
            'INCOME_BULAN' => 'required',
            'SUPOUSE_INCOME_BULAN' => 'required',
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1' => 'required',
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2' => 'required',
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3' => 'required',
            'APAKAH_ADA_DP' => 'required',
            ]);

        Debitur::create([
            'NAMA_DEBITUR' => $request->NAMA_DEBITUR,
            'TANGGAL_LAHIR' => $request->TANGGAL_LAHIR,
            'NO_KTP' => $request->NO_KTP,
            'NO_NPWP' => $request->NO_NPWP,
            'ALAMAT_CUSTOMER' => $request->ALAMAT_CUSTOMER,
            'PROVINSI' => $request->PROVINSI,
            'KELURAHAN' => $request->KELURAHAN,
            'KABUPATEN_KOTA' => $request->KABUPATEN_KOTA,
            'KODE_POS' => $request->KODE_POS,
            'NAMA_PERUSAHAAN' => $request->NAMA_PERUSAHAAN,
            'BIDANG_USAHA' => $request->BIDANG_USAHA,
            'SUB_BIDANG_USAHA' => $request->SUB_BIDANG_USAHA,
            'LAMA_USAHA' => $request->LAMA_USAHA,
            'JABATAN' => $request->JABATAN,
            'TANGGUNGAN' => $request->TANGGUNGAN,
            'INCOME_BULAN' => $request->INCOME_BULAN,
            'SUPOUSE_INCOME_BULAN' => $request->SUPOUSE_INCOME_BULAN,
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1' => $request->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1,
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2' => $request->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2,
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3' => $request->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3,
            'APAKAH_ADA_DP' => $request->APAKAH_ADA_DP,
            'DOWN_PAYMENT_CUSTOMER' => $request->DOWN_PAYMENT_CUSTOMER,
            ]);

        return redirect('debitur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debitur  $debitur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $debitur = Debitur::findorfail($id);
        return view('debitur.detail', compact('debitur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debitur  $debitur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $debitur = Debitur::findorfail($id);
        return view('debitur.edit', compact('debitur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Debitur  $debitur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $debitur = Debitur::findorfail($id);
        $debitur->update([
            'NAMA_DEBITUR' => $request->NAMA_DEBITUR,
            'TANGGAL_LAHIR' => $request->TANGGAL_LAHIR,
            'NO_KTP' => $request->NO_KTP,
            'NO_NPWP' => $request->NO_NPWP,
            'ALAMAT_CUSTOMER' => $request->ALAMAT_CUSTOMER,
            'PROVINSI' => $request->PROVINSI,
            'KELURAHAN' => $request->KELURAHAN,
            'KABUPATEN_KOTA' => $request->KABUPATEN_KOTA,
            'KODE_POS' => $request->KODE_POS,
            'NAMA_PERUSAHAAN' => $request->NAMA_PERUSAHAAN,
            'BIDANG_USAHA' => $request->BIDANG_USAHA,
            'SUB_BIDANG_USAHA' => $request->SUB_BIDANG_USAHA,
            'LAMA_USAHA' => $request->LAMA_USAHA,
            'JABATAN' => $request->JABATAN,
            'TANGGUNGAN' => $request->TANGGUNGAN,
            'INCOME_BULAN' => $request->INCOME_BULAN,
            'SUPOUSE_INCOME_BULAN' => $request->SUPOUSE_INCOME_BULAN,
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1' => $request->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1,
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2' => $request->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2,
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3' => $request->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3,
            'APAKAH_ADA_DP' => $request->APAKAH_ADA_DP,
            'DOWN_PAYMENT_CUSTOMER' => $request->DOWN_PAYMENT_CUSTOMER,
        ]);

        return redirect('debitur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debitur  $debitur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $debitur = Debitur::findorfail($id);
        $debitur->delete();

        return redirect('debitur');
    }

    public function upload()
    {
        return view('debitur.upload');
    }
}
