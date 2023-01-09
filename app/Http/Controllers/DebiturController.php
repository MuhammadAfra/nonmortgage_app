<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use Illuminate\Http\Request;
use App\Imports\DebiturImport;
use App\Models\Master_Asuransi;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class DebiturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $debitur = Debitur::orderBy('id', 'desc')->get();
        return view('debitur.index', compact('debitur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asuransi = Master_Asuransi::all();
        return view('debitur.create', compact('asuransi'));
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
            'KECAMATAN' => 'required',
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
            'Jenis_Asuransi_Id' => 'required',
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
            'KECAMATAN' => $request->KECAMATAN,
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
            'Jenis_Asuransi_Id' => $request->Jenis_Asuransi_Id,
            'Perusahaan_Asuransi' => $request->Perusahaan_Asuransi,
            'Persen_Asuransi' => $request->Persen_Asuransi,
            'Nilai_Asuransi' => $request->Nilai_Asuransi,
            'Jaminan_Sertifikat_Tanah' => $request->Jaminan_Sertifikat_Tanah,
            'Nilai_Sertifikat_Tanah' => $request->Nilai_Sertifikat_Tanah,
            'Jaminan_Kendaraan_Bermotor_Mobil' => $request->Jaminan_Kendaraan_Bermotor_Mobil,
            'Nilai_Kendaraan_Bermotor_Mobil' => $request->Nilai_Kendaraan_Bermotor_Mobil,
            'Jaminan_Kendaraan_Bermotor_Motor' => $request->Jaminan_Kendaraan_Bermotor_Motor,
            'Nilai_Kendaraan_Bermotor_Motor' => $request->Nilai_Kendaraan_Bermotor_Motor,
            'Jaminan_Personel_Guarantee' => $request->Jaminan_Personel_Guarantee,
            'Nilai_Personel_Guarantee' => $request->Nilai_Personel_Guarantee,
            'Jaminan_Invoice' => $request->Jaminan_Invoice,
            'Nilai_Invoice' => $request->Nilai_Invoice,
            'Jaminan_Inventory' => $request->Jaminan_Inventory,
            'Nilai_Inventory' => $request->Nilai_Inventory,
            'Jaminan_Lainnya' => $request->Jaminan_Lainnya,
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
        $asuransi = Master_Asuransi::all();
        return view('debitur.edit', compact('debitur','asuransi'));
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
        $this->validate($request,[
            'NAMA_DEBITUR' => 'required',
            'TANGGAL_LAHIR' => 'required',
            'NO_KTP' => 'required',
            'NO_NPWP' => 'required',
            'ALAMAT_CUSTOMER' => 'required',
            'PROVINSI' => 'required',
            'KABUPATEN_KOTA' => 'required',
            'KECAMATAN' => 'required',
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
            'Jenis_Asuransi_Id' => 'required',
            ]);
            
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
            'KECAMATAN' => $request->KECAMATAN,
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
            'Jenis_Asuransi_Id' => $request->Jenis_Asuransi_Id,
            'Perusahaan_Asuransi' => $request->Perusahaan_Asuransi,
            'Persen_Asuransi' => $request->Persen_Asuransi,
            'Nilai_Asuransi' => $request->Nilai_Asuransi,
            'Jaminan_Sertifikat_Tanah' => $request->Jaminan_Sertifikat_Tanah,
            'Nilai_Sertifikat_Tanah' => $request->Nilai_Sertifikat_Tanah,
            'Jaminan_Kendaraan_Bermotor_Mobil' => $request->Jaminan_Kendaraan_Bermotor_Mobil,
            'Nilai_Kendaraan_Bermotor_Mobil' => $request->Nilai_Kendaraan_Bermotor_Mobil,
            'Jaminan_Kendaraan_Bermotor_Motor' => $request->Jaminan_Kendaraan_Bermotor_Motor,
            'Nilai_Kendaraan_Bermotor_Motor' => $request->Nilai_Kendaraan_Bermotor_Motor,
            'Jaminan_Personel_Guarantee' => $request->Jaminan_Personel_Guarantee,
            'Nilai_Personel_Guarantee' => $request->Nilai_Personel_Guarantee,
            'Jaminan_Invoice' => $request->Jaminan_Invoice,
            'Nilai_Invoice' => $request->Nilai_Invoice,
            'Jaminan_Inventory' => $request->Jaminan_Inventory,
            'Nilai_Inventory' => $request->Nilai_Inventory,
            'Jaminan_Lainnya' => $request->Jaminan_Lainnya,
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

    public function import(Request $request)
    {
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $file->move('import/debitur',$nama_file);

        Excel::import(new DebiturImport, public_path('/import/debitur/'.$nama_file));
        // dd($data);

        Session::flash('sukses','Data Debitur Berhasil Diimport!');
        return redirect('debitur');
    }
}
