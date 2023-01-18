<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Imports\DebiturImport;
use App\Models\Master_Asuransi;
use App\Models\Master_Sektor_Ekonomi;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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
        $sektor = Master_Sektor_Ekonomi::all();
        $partner = Partner::all();
        return view('debitur.create', compact('asuransi', 'sektor', 'partner'));
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
            'PARTNER_ID' => 'required',
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
            // 'SUB_BIDANG_USAHA' => 'required',
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
            
            if ($request->Nilai_Asuransi != NULL) {
                $asuransi = str_replace( ',', '', $request->Nilai_Asuransi);
            }else{
                $asuransi = NULL;
            }

            if ($request->Nilai_Sertifikat_Tanah != NULL) {
                $tanah = str_replace( ',', '', $request->Nilai_Sertifikat_Tanah);
            }else{
                $tanah = NULL;
            }

            if ($request->Nilai_Kendaraan_Bermotor_Mobil != NULL) {
                $mobil = str_replace( ',', '', $request->Nilai_Kendaraan_Bermotor_Mobil);
            }else{
                $mobil = NULL;
            }

            if ($request->Nilai_Kendaraan_Bermotor_Motor != NULL) {
                $motor = str_replace( ',', '', $request->Nilai_Kendaraan_Bermotor_Motor);
            }else{
                $motor = NULL;
            }

            if ($request->Nilai_Personel_Guarantee != NULL) {
                $personal = str_replace( ',', '', $request->Nilai_Personel_Guarantee);
            }else{
                $personal = NULL;
            }

            if ($request->Nilai_Invoice != NULL) {
                $invoice = str_replace( ',', '', $request->Nilai_Invoice);
            }else{
                $invoice = NULL;
            }

            if ($request->Nilai_Inventory != NULL) {
                $inventori = str_replace( ',', '', $request->Nilai_Inventory);
            }else{
                $inventori = NULL;
            }

            if ($request->Nilai_Jaminan_Lainnya != NULL) {
                $nilai_jaminan_lainnya = str_replace( ',', '', $request->Nilai_Jaminan_Lainnya);
            }else{
                $nilai_jaminan_lainnya = NULL;
            }

            if ($request->DOWN_PAYMENT_CUSTOMER != NULL) {
                $dp = str_replace( ',', '', $request->DOWN_PAYMENT_CUSTOMER);
            }else{
                $dp = NULL;
            }
            
            $debitur = new Debitur();
            $debitur->PARTNER_ID = $request->PARTNER_ID;
            $debitur->NAMA_DEBITUR = $request->NAMA_DEBITUR;
            $debitur->TANGGAL_LAHIR = $request->TANGGAL_LAHIR;
            $debitur->NO_KTP = $request->NO_KTP;
            $debitur->NO_NPWP = $request->NO_NPWP;
            $debitur->ALAMAT_CUSTOMER = $request->ALAMAT_CUSTOMER;
            $debitur->PROVINSI = $request->PROVINSI;
            $debitur->KELURAHAN = $request->KELURAHAN;
            $debitur->KABUPATEN_KOTA = $request->KABUPATEN_KOTA;
            $debitur->KECAMATAN = $request->KECAMATAN;
            $debitur->KODE_POS = $request->KODE_POS;
            $debitur->NAMA_PERUSAHAAN = $request->NAMA_PERUSAHAAN;
            $debitur->BIDANG_USAHA = $request->BIDANG_USAHA;
            // $debitur->SUB_BIDANG_USAHA = $request->SUB_BIDANG_USAHA;
            $debitur->LAMA_USAHA = $request->LAMA_USAHA;
            $debitur->JABATAN = $request->JABATAN;
            $debitur->TANGGUNGAN = $request->TANGGUNGAN;
            $debitur->INCOME_BULAN = str_replace( ',', '', $request->INCOME_BULAN);
            $debitur->SUPOUSE_INCOME_BULAN = str_replace( ',', '', $request->SUPOUSE_INCOME_BULAN);
            $debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1 = str_replace( ',', '', $request->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1);
            $debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2 = str_replace( ',', '', $request->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2);
            $debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3 = str_replace( ',', '', $request->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3);
            $debitur->Jenis_Asuransi_Id = $request->Jenis_Asuransi_Id;
            $debitur->Perusahaan_Asuransi = $request->Perusahaan_Asuransi;
            $debitur->Persen_Asuransi = str_replace( ',', '.', $request->Persen_Asuransi);
            $debitur->Nilai_Asuransi = $asuransi;
            $debitur->Jaminan_Sertifikat_Tanah = $request->Jaminan_Sertifikat_Tanah;
            $debitur->Nilai_Sertifikat_Tanah = $tanah;
            $debitur->Jaminan_Kendaraan_Bermotor_Mobil = $request->Jaminan_Kendaraan_Bermotor_Mobil;
            $debitur->Nilai_Kendaraan_Bermotor_Mobil = $mobil;
            $debitur->Jaminan_Kendaraan_Bermotor_Motor = $request->Jaminan_Kendaraan_Bermotor_Motor;
            $debitur->Nilai_Kendaraan_Bermotor_Motor = $motor;
            $debitur->Jaminan_Personel_Guarantee = $request->Jaminan_Personel_Guarantee;
            $debitur->Nilai_Personel_Guarantee = $personal;
            $debitur->Jaminan_Invoice = $request->Jaminan_Invoice;
            $debitur->Nilai_Invoice = $invoice;
            $debitur->Jaminan_Inventory = $request->Jaminan_Inventory;
            $debitur->Nilai_Inventory = $inventori;
            $debitur->Jaminan_Lainnya = $request->Jaminan_Lainnya;
            $debitur->Nilai_Jaminan_Lainnya = $nilai_jaminan_lainnya;
            $debitur->APAKAH_ADA_DP = $request->APAKAH_ADA_DP;
            $debitur->DOWN_PAYMENT_CUSTOMER = $dp;
            // dd($debitur);
            $debitur->save();

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
        $asuransi = Master_Asuransi::get();
        $sektor = Master_Sektor_Ekonomi::get();
        $partner = Master_Sektor_Ekonomi::get();
        return view('debitur.edit', compact('debitur','asuransi','sektor', 'partner'));
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
            'PARTNER_ID' => 'required',
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
            // 'SUB_BIDANG_USAHA' => 'required',
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
        if ($request->Nilai_Asuransi != NULL || $request->Nilai_Asuransi != 0) {
            $asuransi = str_replace( ',', '', $request->Nilai_Asuransi);
        }else{
            $asuransi = NULL;
        }

        if ($request->Nilai_Sertifikat_Tanah != NULL || $request->Nilai_Sertifikat_Tanah != 0) {
            $tanah = str_replace( ',', '', $request->Nilai_Sertifikat_Tanah);
        }else{
            $tanah = NULL;
        }

        if ($request->Nilai_Kendaraan_Bermotor_Mobil != NULL || $request->Nilai_Kendaraan_Bermotor_Mobil != 0) {
            $mobil = str_replace( ',', '', $request->Nilai_Kendaraan_Bermotor_Mobil);
        }else{
            $mobil = NULL;
        }

        if ($request->Nilai_Kendaraan_Bermotor_Motor != NULL || $request->Nilai_Kendaraan_Bermotor_Motor != 0) {
            $motor = str_replace( ',', '', $request->Nilai_Kendaraan_Bermotor_Motor);
        }else{
            $motor = NULL;
        }

        if ($request->Nilai_Personel_Guarantee != NULL || $request->Nilai_Personel_Guarantee != 0) {
            $personal = str_replace( ',', '', $request->Nilai_Personel_Guarantee);
        }else{
            $personal = NULL;
        }

        if ($request->Nilai_Invoice != NULL || $request->Nilai_Invoice != 0) {
            $invoice = str_replace( ',', '', $request->Nilai_Invoice);
        }else{
            $invoice = NULL;
        }

        if ($request->Nilai_Inventory != NULL || $request->Nilai_Inventory != 0) {
            $inventori = str_replace( ',', '', $request->Nilai_Inventory);
        }else{
            $inventori = NULL;
        }

        if ($request->Nilai_Jaminan_Lainnya != NULL || $request->Nilai_Jaminan_Lainnya != 0) {
            $nilai_jaminan_lainnya = str_replace( ',', '', $request->Nilai_Jaminan_Lainnya);
        }else{
            $nilai_jaminan_lainnya = NULL;
        }

        if ($request->DOWN_PAYMENT_CUSTOMER != NULL || $request->DOWN_PAYMENT_CUSTOMER != 0) {
            $dp = str_replace( ',', '', $request->DOWN_PAYMENT_CUSTOMER);
        }else{
            $dp = NULL;
        }

        $debitur->update([
            'PARTNER_ID' => $request->PARTNER_ID,
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
            // 'SUB_BIDANG_USAHA' => $request->SUB_BIDANG_USAHA,
            'LAMA_USAHA' => $request->LAMA_USAHA,
            'JABATAN' => $request->JABATAN,
            'TANGGUNGAN' => $request->TANGGUNGAN,
            'INCOME_BULAN' => str_replace( ',', '', $request->INCOME_BULAN),
            'SUPOUSE_INCOME_BULAN' => str_replace( ',', '', $request->SUPOUSE_INCOME_BULAN),
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1' => str_replace( ',', '', $request->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1),
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2' => str_replace( ',', '', $request->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2),
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3' => str_replace( ',', '', $request->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3),
            'Jenis_Asuransi_Id' => $request->Jenis_Asuransi_Id,
            'Perusahaan_Asuransi' => $request->Perusahaan_Asuransi,
            'Persen_Asuransi' => str_replace( ',', '.', $request->Persen_Asuransi), 
            'Nilai_Asuransi' => $asuransi,
            'Jaminan_Sertifikat_Tanah' => $request->Jaminan_Sertifikat_Tanah,
            'Nilai_Sertifikat_Tanah' => $tanah,
            'Jaminan_Kendaraan_Bermotor_Mobil' => $request->Jaminan_Kendaraan_Bermotor_Mobil,
            'Nilai_Kendaraan_Bermotor_Mobil' => $mobil,
            'Jaminan_Kendaraan_Bermotor_Motor' => $request->Jaminan_Kendaraan_Bermotor_Motor,
            'Nilai_Kendaraan_Bermotor_Motor' => $motor,
            'Jaminan_Personel_Guarantee' => $request->Jaminan_Personel_Guarantee,
            'Nilai_Personel_Guarantee' => $personal,
            'Jaminan_Invoice' => $request->Jaminan_Invoice,
            'Nilai_Invoice' => $invoice,
            'Jaminan_Inventory' => $request->Jaminan_Inventory,
            'Nilai_Inventory' => $inventori,
            'Jaminan_Lainnya' => $request->Jaminan_Lainnya,
            'Nilai_Jaminan_Lainnya' => $nilai_jaminan_lainnya,
            'APAKAH_ADA_DP' => $request->APAKAH_ADA_DP,
            'DOWN_PAYMENT_CUSTOMER' => $dp,
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
