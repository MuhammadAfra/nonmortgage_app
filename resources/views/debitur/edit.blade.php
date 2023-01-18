@extends('layout.layout')
@section('title')
    Debitur
@endsection

@section('subtitle')
    Edit
@endsection

@section('page')
    <a href="{{ url('debitur') }}">Debitur</a>
@endsection

@section('content')
    <form action="{{ url('debitur', $debitur->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Debitur <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->NAMA_DEBITUR }}" name="NAMA_DEBITUR"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggal Lahir <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="date" value="{{ $debitur->TANGGAL_LAHIR }}" name="TANGGAL_LAHIR"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No KTP</label> <span class="text-danger">*</span></div>
            <div class="col-sm-8"><input type="number" value="{{ $debitur->NO_KTP }}" name="NO_KTP" class="form-control"
                    style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No NPWP</label> <span class="text-danger">*</span></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->NO_NPWP }}" name="NO_NPWP" class="form-control"
                    style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat <span class="text-danger">*</span></div>
            <div class="col-sm-8">
                <textarea name="ALAMAT_CUSTOMER" style="width: 300px; height: 100px;" class="form-control" cols="30"
                    rows="10">{{ $debitur->ALAMAT_CUSTOMER }}</textarea>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Provinsi<span class="text-danger">*</span></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->PROVINSI }}" name="PROVINSI"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kabupaten / Kota <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->KABUPATEN_KOTA }}" name="KABUPATEN_KOTA"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kecamatan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="rext" value="{{ $debitur->KECAMATAN }}" name="KECAMATAN"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kelurahan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="rext" value="{{ $debitur->KELURAHAN }}" name="KELURAHAN"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kode Pos <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="number" value="{{ $debitur->KODE_POS }}" name="KODE_POS"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Perusahaan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->NAMA_PERUSAHAAN }}" name="NAMA_PERUSAHAAN"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Bidang Usaha <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->BIDANG_USAHA }}" name="BIDANG_USAHA"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Sub Bidang Usaha <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->SUB_BIDANG_USAHA }}"
                    name="SUB_BIDANG_USAHA" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Lama Usaha<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="input-group" style="width: 300px; height: 38px;">
                    <input type="number" class="form-control" value="{{ $debitur->LAMA_USAHA }}"
                    name="LAMA_USAHA">
                    <div class="input-group-append">
                        <span class="input-group-text">Bulan</span>
                    </div>
                </div>
                @error('LAMA_USAHA')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jabatan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->JABATAN }}" name="JABATAN"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggungan<span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->TANGGUNGAN }}" name="TANGGUNGAN"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Income Bulan<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                @if ($debitur->INCOME_BULAN != null)
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ number_format($debitur->INCOME_BULAN) }}" 
                            name="INCOME_BULAN">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ $debitur->INCOME_BULAN }}"  name="INCOME_BULAN">
                    </div>
                @endif
                @error('INCOME_BULAN')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Spouse Income Bulan<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                @if ($debitur->SUPOUSE_INCOME_BULAN != null)
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ number_format($debitur->SUPOUSE_INCOME_BULAN) }}" 
                            name="SUPOUSE_INCOME_BULAN">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ $debitur->SUPOUSE_INCOME_BULAN }}"  name="SUPOUSE_INCOME_BULAN">
                    </div>
                @endif
                @error('SUPOUSE_INCOME_BULAN')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <h5 class="pb-3">Rekening Koran 3 Bulan Terakhir</h5>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan 1<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                @if ($debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1 != null)
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ number_format($debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1) }}" 
                            name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ $debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1 }}"  name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1">
                    </div>
                @endif
                @error('REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan 2<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                @if ($debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2 != null)
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ number_format($debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2) }}" 
                            name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ $debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2 }}"  name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2">
                    </div>
                @endif
                @error('REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan 3<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                @if ($debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3 != null)
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ number_format($debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3) }}" 
                            name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ $debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3 }}"  name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3">
                    </div>
                @endif
                @error('REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <h5 class="pb-3">Asuransi</h5>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Asuransi<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div style="width: 300px; height: 38px;">
                    <select class="form-control py-0" name="Jenis_Asuransi_Id" style="width: 300px; height: 30px;">
                        <option value="{{ $debitur->Jenis_Asuransi_Id }}">{{ $debitur->asuransi->Jenis_Asuransi }}
                        </option>
                        @foreach ($asuransi as $item)
                            <option value="{{ $item->id }}">{{ $item->Jenis_Asuransi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Perusahaan Asuransi</label></div>
            <div class="col-sm-8"><input value="{{ $debitur->Perusahaan_Asuransi }}" type="text"
                    name="Perusahaan_Asuransi" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Persen Asuransi<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="input-group" style="width: 300px; height: 38px;">
                    <input type="number" class="form-control" value="{{ $debitur->Persen_Asuransi }}"
                        name="Persen_Asuransi">
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
                @error('Persen_Asuransi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Asuransi<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                @if ($debitur->Nilai_Asuransi != null)
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ number_format($debitur->Nilai_Asuransi) }}" 
                            name="Nilai_Asuransi">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ $debitur->Nilai_Asuransi }}"  name="Nilai_Asuransi">
                    </div>
                @endif
                @error('Nilai_Asuransi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <h5 class="pb-3">Jaminan</h5>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Sertifikat Tanah</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="ADA" {{ $debitur->Jaminan_Sertifikat_Tanah == 'ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Sertifikat_Tanah" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK ADA" {{ $debitur->Jaminan_Sertifikat_Tanah == 'TIDAK ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Sertifikat_Tanah" class="form-control number-separator">
                    <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
                </div>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Sertifikat Tanah</label></div>
            <div class="col-sm-8">
                @if ($debitur->Nilai_Sertifikat_Tanah != null)
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ number_format($debitur->Nilai_Sertifikat_Tanah) }}" name="Nilai_Sertifikat_Tanah">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ $debitur->Nilai_Sertifikat_Tanah }}" 
                            name="Nilai_Sertifikat_Tanah">
                    </div>
                @endif
                @error('Nilai_Sertifikat_Tanah')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Kendaraan Mobil</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="ADA" {{ $debitur->Jaminan_Kendaraan_Bermotor_Mobil == 'ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Mobil" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK ADA" {{ $debitur->Jaminan_Kendaraan_Bermotor_Mobil == 'TIDAK ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Mobil" class="form-control number-separator">
                    <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
                </div>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Kendaraan Mobil</label></div>
            <div class="col-sm-8">
                @if ($debitur->Nilai_Kendaraan_Bermotor_Mobil != null)
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ number_format($debitur->Nilai_Kendaraan_Bermotor_Mobil) }}" name="Nilai_Kendaraan_Bermotor_Mobil">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ $debitur->Nilai_Kendaraan_Bermotor_Mobil }}" 
                            name="Nilai_Kendaraan_Bermotor_Mobil">
                    </div>
                @endif
                @error('Nilai_Kendaraan_Bermotor_Mobil')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>


        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Kendaraan Motor</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="ADA" {{ $debitur->Jaminan_Kendaraan_Bermotor_Motor == 'ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Motor" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK ADA" {{ $debitur->Jaminan_Kendaraan_Bermotor_Motor == 'TIDAK ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Motor" class="form-control number-separator">
                    <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
                </div>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Kendaraan Motor<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                @if ($debitur->Nilai_Kendaraan_Bermotor_Motor != null)
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ number_format($debitur->Nilai_Kendaraan_Bermotor_Motor) }}" name="Nilai_Kendaraan_Bermotor_Motor">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ $debitur->Nilai_Kendaraan_Bermotor_Motor }}" 
                            name="Nilai_Kendaraan_Bermotor_Motor">
                    </div>
                @endif
                @error('Nilai_Kendaraan_Bermotor_Motor')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Personal Guarantee</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="ADA" {{ $debitur->Jaminan_Personel_Guarantee == 'ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Personel_Guarantee" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK ADA" {{ $debitur->Jaminan_Personel_Guarantee == 'TIDAK ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Personel_Guarantee" class="form-control number-separator">
                    <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
                </div>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Personal Guarantee</label></div>
            <div class="col-sm-8">
                @if ($debitur->Nilai_Personel_Guarantee != null)
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ number_format($debitur->Nilai_Personel_Guarantee) }}" name="Nilai_Personel_Guarantee">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ $debitur->Nilai_Personel_Guarantee }}" 
                            name="Nilai_Personel_Guarantee">
                    </div>
                @endif
                @error('Nilai_Personel_Guarantee')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Invoice</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="ADA" {{ $debitur->Jaminan_Invoice == 'ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Invoice" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK ADA" {{ $debitur->Jaminan_Invoice == 'TIDAK ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Invoice" class="form-control number-separator">
                    <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
                </div>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Invoice</label></div>
            <div class="col-sm-8">
                @if ($debitur->Nilai_Invoice != null)
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ number_format($debitur->Nilai_Invoice) }}" name="Nilai_Invoice">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator"
                            value="{{ $debitur->Nilai_Invoice }}" 
                            name="Nilai_Invoice">
                    </div>
                @endif
                @error('Nilai_Invoice')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Inventory</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="ADA" {{ $debitur->Jaminan_Inventory == 'ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Inventory" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK ADA" {{ $debitur->Jaminan_Inventory == 'TIDAK ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Inventory" class="form-control number-separator">
                    <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
                </div>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Inventory</label></div>
            <div class="col-sm-8">
                @if ($debitur->Nilai_Inventory != null)
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" class="form-control number-separator"
                        value="{{ number_format($debitur->Nilai_Inventory) }}" name="Nilai_Inventory">
                </div>
            @else
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" class="form-control number-separator"
                        value="{{ $debitur->Nilai_Inventory }}" 
                        name="Nilai_Inventory">
                </div>
            @endif
                @error('Nilai_Inventory')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Lainnya</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="ADA" {{ $debitur->Jaminan_Lainnya == 'ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Lainnya" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK ADA" {{ $debitur->Jaminan_Lainnya == 'TIDAK ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Lainnya" class="form-control number-separator">
                    <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
                </div>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Jaminan Lainnya</label></div>
            <div class="col-sm-8">
                @if ($debitur->Nilai_Jaminan_Lainnya != null)
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" class="form-control number-separator"
                        value="{{ number_format($debitur->Nilai_Jaminan_Lainnya) }}" name="Nilai_Jaminan_Lainnya">
                </div>
            @else
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" class="form-control number-separator"
                        value="{{ $debitur->Nilai_Jaminan_Lainnya }}" 
                        name="Nilai_Jaminan_Lainnya">
                </div>
            @endif
                @error('Nilai_Jaminan_Lainnya')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Down Payment</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="YA" {{ $debitur->APAKAH_ADA_DP == 'YA' ? 'checked' : '' }}
                        style="width: 15px" name="APAKAH_ADA_DP" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">YA</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="NO" {{ $debitur->APAKAH_ADA_DP == 'NO' ? 'checked' : '' }}
                        style="width: 15px" name="APAKAH_ADA_DP" class="form-control number-separator">
                    <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
                </div>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jumlah Down Payment</label></div>
            <div class="col-sm-8">
                @if ($debitur->DOWN_PAYMENT_CUSTOMER != null)
                    <input type="text" value="{{ number_format($debitur->DOWN_PAYMENT_CUSTOMER) }}"
                        name="DOWN_PAYMENT_CUSTOMER" class="form-control number-separator"
                        style="width: 300px; height: 30px;">
                @else
                    <input type="text" value="{{ $debitur->DOWN_PAYMENT_CUSTOMER }}" name="DOWN_PAYMENT_CUSTOMER"
                        class="form-control number-separator" style="width: 300px; height: 30px;">
                @endif
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-warning text-white" type="submit">Edit</button>
                <a href="{{ url('debitur') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection
