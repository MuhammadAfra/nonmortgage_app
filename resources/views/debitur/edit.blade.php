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
<form action="{{ url('debitur', $debitur->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Partner ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PARTNER_ID" class="form-control py-0" style="width: 300px; height: 30px;" required>
                <option value="{{ $debitur->PARTNER_ID }}">{{ $debitur->partner->NAMA_PERUSAHAAN }}</option>
                @foreach ($partner as $item)
                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->NAMA_PERUSAHAAN }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Debitur <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="text" required value="{{ $debitur->NAMA_DEBITUR }}" name="NAMA_DEBITUR"
                class="form-control" style="width: 300px; height: 30px;"></div>
    </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggal Lahir <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="date" required value="{{ $debitur->TANGGAL_LAHIR }}" name="TANGGAL_LAHIR"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>No KTP</label> <span class="text-danger">*</span></div>
            <div class="col-sm-8"><input type="number" required value="{{ $debitur->NO_KTP }}" name="NO_KTP" class="form-control"
                    style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Upload KTP <span class="text-danger">*</span></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 300px; height: 38px;">
                    <input type="file" class="custom-file-input" name="UPLOAD_KTP" value="{{ $debitur->UPLOAD_KTP }}">
                    <label class="custom-file-label">{{ $debitur->UPLOAD_KTP }}</label>
                </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No NPWP</label> <span class="text-danger">*</span></div>
            <div class="col-sm-8"><input type="text" required value="{{ $debitur->NO_NPWP }}" name="NO_NPWP" class="form-control"
                    style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Upload NPWP <span class="text-danger">*</span></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 300px; height: 38px;">
                    <input type="file" class="custom-file-input" name="UPLOAD_NPWP" value="{{ $debitur->UPLOAD_NPWP }}">
                    <label class="custom-file-label">{{ $debitur->UPLOAD_NPWP }}</label>
                </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat <span class="text-danger">*</span></div>
            <div class="col-sm-8">
                <textarea name="ALAMAT_CUSTOMER" required style="width: 300px; height: 100px;" class="form-control" cols="30"
                    rows="10">{{ $debitur->ALAMAT_CUSTOMER }}</textarea></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Provinsi<span class="text-danger">*</span></div>
            <div class="col-sm-8"><input required type="text" value="{{ $debitur->PROVINSI }}" name="PROVINSI"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Kabupaten / Kota <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input required type="text" value="{{ $debitur->KABUPATEN_KOTA }}" name="KABUPATEN_KOTA"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Kecamatan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input required type="rext" value="{{ $debitur->KECAMATAN }}" name="KECAMATAN"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Kelurahan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input required type="rext" value="{{ $debitur->KELURAHAN }}" name="KELURAHAN"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Kode Pos <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input required type="number" value="{{ $debitur->KODE_POS }}" name="KODE_POS"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Perusahaan </label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->NAMA_PERUSAHAAN }}" name="NAMA_PERUSAHAAN"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Bidang Usaha & Sub Bidang Usaha</label></div>
            <div class="col-sm-8">
                <select name="BIDANG_USAHA" class="form-control py-0" style="width: 300px; height: 30px;">
                    <option value="{{ $debitur->BIDANG_USAHA }}">
                        @if ($debitur->BIDANG_USAHA != NULL)
                            {{ $debitur->sektor->Label_Utama }} -- {{ $debitur->sektor->Label }}
                        @endif
                    </option>
                    @foreach ($sektor->sortBy('Label_Utama') as $item)
                    <option value="{{ $item->id }}">{{ $item->Label_Utama }} -- {{ $item->Label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Lama Usaha<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="input-group" required style="width: 300px; height: 38px;">
                    <input type="number" class="form-control" value="{{ $debitur->LAMA_USAHA }}"
                    name="LAMA_USAHA">
                    <div class="input-group-append">
                        <span class="input-group-text">Bulan</span>
                    </div>
                </div>

            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jabatan </label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->JABATAN }}" name="JABATAN"
                    class="form-control" style="width: 300px; height: 30px;"></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggungan</label></div>
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
                        <input required type="text" class="form-control number-separator"
                            value="{{ number_format($debitur->INCOME_BULAN) }}" 
                            name="INCOME_BULAN">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input required type="text" class="form-control number-separator"
                            value="{{ $debitur->INCOME_BULAN }}"  name="INCOME_BULAN">
                    </div>
                @endif

            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Spouse Income Bulan</label></div>
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

            </div>
        </div>

        <h5 class="pb-3">Rekening Koran 3 Bulan Terakhir</h5>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan 1</label></div>
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

            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan 2</label></div>
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

            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan 3</label></div>
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

            </div>
        </div>

        <h5 class="pb-3">Asuransi</h5>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Asuransi<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div style="width: 300px; height: 38px;">
                    <select class="form-control py-0" name="Jenis_Asuransi_Id" required style="width: 300px; height: 30px;">
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
            <div class="col-sm-4"><label>Perusahaan Asuransi <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input value="{{ $debitur->Perusahaan_Asuransi }}" required type="text"
                    name="Perusahaan_Asuransi" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Persen Asuransi<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="input-group" style="width: 300px; height: 38px;">
                    <input type="text" class="form-control" value="{{ $debitur->Persen_Asuransi }}"
                        name="Persen_Asuransi" required>
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>
                    </div>
                </div>

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
                        <input type="text" class="form-control number-separator" required
                            value="{{ number_format($debitur->Nilai_Asuransi) }}" 
                            name="Nilai_Asuransi">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control number-separator" required
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
                    <input type="radio" value="ADA" {{ $debitur->Jaminan_Sertifikat_Tanah == 'ADA' ? 'checked' : '' }} onchange="checkTNH(this)"
                        style="width: 15px" name="Jaminan_Sertifikat_Tanah" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK" {{ $debitur->Jaminan_Sertifikat_Tanah == 'TIDAK' ? 'checked' : '' }} onchange="checkTNH(this)"
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
                        <input type="text" {{ $debitur->Jaminan_Sertifikat_Tanah == 'TIDAK' ? 'disabled' : '' }} id="tanah" class="form-control number-separator"
                            value="{{ number_format($debitur->Nilai_Sertifikat_Tanah) }}" name="Nilai_Sertifikat_Tanah">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" {{ $debitur->Jaminan_Sertifikat_Tanah == 'TIDAK' ? 'disabled' : '' }} id="tanah" class="form-control number-separator"
                            value="{{ $debitur->Nilai_Sertifikat_Tanah }}" 
                            name="Nilai_Sertifikat_Tanah">
                    </div>
                @endif

            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Kendaraan Mobil</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="ADA" {{ $debitur->Jaminan_Kendaraan_Bermotor_Mobil == 'ADA' ? 'checked' : '' }} onchange="checkMBL(this)"
                        style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Mobil" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK" {{ $debitur->Jaminan_Kendaraan_Bermotor_Mobil == 'TIDAK' ? 'checked' : '' }} onchange="checkMBL(this)"
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
                        <input type="text" {{ $debitur->Jaminan_Kendaraan_Bermotor_Mobil == 'TIDAK' ? 'disabled' : '' }} class="form-control number-separator"
                            value="{{ number_format($debitur->Nilai_Kendaraan_Bermotor_Mobil) }}" id="mobil" name="Nilai_Kendaraan_Bermotor_Mobil">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" {{ $debitur->Jaminan_Kendaraan_Bermotor_Mobil == 'TIDAK' ? 'disabled' : '' }} class="form-control number-separator"
                            value="{{ $debitur->Nilai_Kendaraan_Bermotor_Mobil }}"  id="mobil"
                            name="Nilai_Kendaraan_Bermotor_Mobil">
                    </div>
                @endif

            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Kendaraan Motor</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="ADA" {{ $debitur->Jaminan_Kendaraan_Bermotor_Motor == 'ADA' ? 'checked' : '' }} onchange="checkMTR(this)"
                        style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Motor" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK" {{ $debitur->Jaminan_Kendaraan_Bermotor_Motor == 'TIDAK' ? 'checked' : '' }} onchange="checkMTR(this)"
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
                        <input type="text" {{ $debitur->Jaminan_Kendaraan_Bermotor_Motor == 'TIDAK' ? 'disabled' : '' }} id="motor" class="form-control number-separator"
                            value="{{ number_format($debitur->Nilai_Kendaraan_Bermotor_Motor) }}" name="Nilai_Kendaraan_Bermotor_Motor">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" {{ $debitur->Jaminan_Kendaraan_Bermotor_Motor == 'TIDAK' ? 'disabled' : '' }} id="motor" class="form-control number-separator"
                            value="{{ $debitur->Nilai_Kendaraan_Bermotor_Motor }}" 
                            name="Nilai_Kendaraan_Bermotor_Motor">
                    </div>
                @endif

            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Personal Guarantee</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="ADA" {{ $debitur->Jaminan_Personel_Guarantee == 'ADA' ? 'checked' : '' }} onchange="checkPG(this)"
                        style="width: 15px" name="Jaminan_Personel_Guarantee" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK" {{ $debitur->Jaminan_Personel_Guarantee == 'TIDAK' ? 'checked' : '' }} onchange="checkPG(this)"
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
                        <input type="text" {{ $debitur->Jaminan_Personel_Guarantee == 'TIDAK' ? 'disabled' : '' }} class="form-control number-separator"
                            value="{{ number_format($debitur->Nilai_Personel_Guarantee) }}" id="personal" name="Nilai_Personel_Guarantee">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" {{ $debitur->Jaminan_Personel_Guarantee == 'TIDAK' ? 'disabled' : '' }} id="personal" class="form-control number-separator"
                            value="{{ $debitur->Nilai_Personel_Guarantee }}" 
                            name="Nilai_Personel_Guarantee">
                    </div>
                @endif

            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Invoice</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="ADA" {{ $debitur->Jaminan_Invoice == 'ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Invoice" class="form-control" onchange="checkIVC(this)">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK" {{ $debitur->Jaminan_Invoice == 'TIDAK' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Invoice" class="form-control number-separator" onchange="checkIVC(this)">
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
                        <input type="text" {{ $debitur->Jaminan_Invoice == 'TIDAK' ? 'disabled' : '' }} id="invoice" class="form-control number-separator"
                            value="{{ number_format($debitur->Nilai_Invoice) }}" name="Nilai_Invoice">
                    </div>
                @else
                    <div class="input-group" style="width: 300px; height: 38px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" {{ $debitur->Jaminan_Invoice == 'TIDAK' ? 'disabled' : '' }} id="invoice" class="form-control number-separator"
                            value="{{ $debitur->Nilai_Invoice }}" 
                            name="Nilai_Invoice">
                    </div>
                @endif

            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Inventory</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="ADA" {{ $debitur->Jaminan_Inventory == 'ADA' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Inventory" class="form-control" onchange="checkINVN(this)">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK" {{ $debitur->Jaminan_Inventory == 'TIDAK' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Inventory" class="form-control" onchange="checkINVN(this)">
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
                    <input type="text" {{ $debitur->Jaminan_Inventory == 'TIDAK' ? 'disabled' : '' }} id="inventory" class="form-control number-separator"
                        value="{{ number_format($debitur->Nilai_Inventory) }}" name="Nilai_Inventory">
                </div>
            @else
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" {{ $debitur->Jaminan_Inventory == 'TIDAK' ? 'disabled' : '' }} id="inventory" class="form-control number-separator"
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
                        style="width: 15px" name="Jaminan_Lainnya" class="form-control" onchange="checkJL(this)">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK" {{ $debitur->Jaminan_Lainnya == 'TIDAK' ? 'checked' : '' }}
                        style="width: 15px" name="Jaminan_Lainnya" class="form-control number-separator" onchange="checkJL(this)">
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
                        value="{{ number_format($debitur->Nilai_Jaminan_Lainnya) }}" id="nilai_jl" name="Nilai_Jaminan_Lainnya" {{ $debitur->Jaminan_Lainnya == 'TIDAK' ? 'disabled' : '' }}>
                </div>
            @else
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" class="form-control number-separator" {{ $debitur->Jaminan_Lainnya == 'TIDAK' ? 'disabled' : '' }} id="nilai_jl"
                        name="Nilai_Jaminan_Lainnya">
                </div>
            @endif
                @error('Nilai_Jaminan_Lainnya')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Pengajuan Lain Lain</label></div>
            <div class="col-sm-8">
                <div class="custom-file"  style="width: 300px; height: 30px;">
                    <input type="file" class="custom-file-input" name="PENGAJUAN_LAIN_LAIN[]" multiple>
                    <label class="custom-file-label">
                        @if ($debitur->PENGAJUAN_LAIN_LAIN != NULL)
                            @foreach (json_decode($debitur->PENGAJUAN_LAIN_LAIN) as $item)
                                {{ $item }},
                            @endforeach
                        @endif
                    </label>
                </div>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Down Payment</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="ADA" {{ $debitur->APAKAH_ADA_DP == 'ADA' ? 'checked' : '' }} style="width: 15px" name="APAKAH_ADA_DP" class="form-control" onchange="checkDP(this)">
                    <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="TIDAK" {{ $debitur->APAKAH_ADA_DP == 'TIDAK' ? 'checked' : '' }} style="width: 15px" name="APAKAH_ADA_DP" class="form-control number-separator" onchange="checkDP(this)">
                    <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
                </div>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Jumlah Down Payment</label></div>
            <div class="col-sm-8">
                @if ($debitur->DOWN_PAYMENT_CUSTOMER != null)
                    <input type="text" value="{{ number_format($debitur->DOWN_PAYMENT_CUSTOMER) }}" {{ $debitur->APAKAH_ADA_DP == 'TIDAK' ? 'disabled' : '' }}
                        name="DOWN_PAYMENT_CUSTOMER" class="form-control number-separator" id="dp"
                        style="width: 300px; height: 30px;">
                @else
                    <input type="text" value="{{ $debitur->DOWN_PAYMENT_CUSTOMER }}" {{ $debitur->APAKAH_ADA_DP == 'TIDAK' ? 'disabled' : '' }} id="dp" name="DOWN_PAYMENT_CUSTOMER"
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
    <script type="text/javascript">
        function checkDP(obj) 
        {
            var dp = document.getElementById("dp");
            dp.disabled = obj.value == "TIDAK";
        }
    
        function checkJL(obj)
        {
            var nilai_jl = document.getElementById("nilai_jl");
            nilai_jl.disabled = obj.value == "TIDAK";
        }
        
        function checkINVN(obj)
        {
            var inventory = document.getElementById("inventory");
            inventory.disabled = obj.value == "TIDAK";
        }
    
        function checkIVC(obj)
        {
            var invoice = document.getElementById("invoice");
            invoice.disabled = obj.value == "TIDAK";
        }
    
        function checkPG(obj)
        {
            var personal = document.getElementById("personal");
            personal.disabled = obj.value == "TIDAK";
        }
    
        function checkMTR(obj)
        {
            var motor = document.getElementById("motor");
            motor.disabled = obj.value == "TIDAK";
        }
    
        function checkMBL(obj)
        {
            var mobil = document.getElementById("mobil");
            mobil.disabled = obj.value == "TIDAK";
        }
    
        function checkTNH(obj)
        {
            var tanah = document.getElementById("tanah");
            tanah.disabled = obj.value == "TIDAK";
        }
    
    </script>
@endsection
