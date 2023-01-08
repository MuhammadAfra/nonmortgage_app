@extends('layout.layout')
@section('title')
Debitur Badan Usaha
@endsection

@section('subtitle')
Add
@endsection

@section('page')
<a href="{{ url('debitur_badan_usaha') }}">Debitur Badan Usaha</a>
@endsection

@section('content')
<form action="{{ url('debitur_badan_usaha') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Perusahaan</label></div>
        <div class="col-sm-8">
            <input type="text" name="NAMA_PERUSAHAAN" class="form-control" style="width: 300px; height: 30px;">
            @error('NAMA_PERUSAHAAN')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Perusahaan</label></div>
        <div class="col-sm-8">
            <textarea name="ALAMAT_PERUSAHAAN" style="width: 500px; height: 100px;" class="form-control" cols="30"
                rows="10"></textarea>
            @error('ALAMAT_PERUSAHAAN')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status Badan Hukum</label></div>
        <div class="col-sm-4 row pl-3">
            <div class="d-flex">
                <input type="radio" value="PT" style="width: 15px" name="STATUS_BADAN_HUKUM" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">PT</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="CV" style="width: 15px" name="STATUS_BADAN_HUKUM" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">CV</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="Firma" style="width: 15px" name="STATUS_BADAN_HUKUM" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Firma</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="Lainnya" style="width: 15px" name="STATUS_BADAN_HUKUM" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Lainnya</p>
            </div>
            @error('STATUS_BADAN_HUKUM')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Akta Pendirian <span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="AKTE_PENDIRIAN" required>
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('AKTE_PENDIRIAN')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Company Profile </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="COMPANY_PROFILE">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('COMPANY_PROFILE')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Detail Product <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <select class="custom-select" name="DETIL_PRODUCT_PROFILE" required>
                    <option></option>
                    @foreach ($prod as $item)
                    <option value="{{ $item->id }}">{{ $item->id_master_product }} - {{ $item->nama_product }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button class="btn bg-white p-0 py-1 font-weight-bold" type="button" data-toggle="modal"
                        data-target="#exampleModal"
                        style="height: 38px; width: 30px; border: 1px solid #ced4da">+</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Akta Perubahan Anggaran Dasar </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="AKTE_PERUBAHAN_ANGGARAN_DASAR">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('AKTE_PERUBAHAN_ANGGARAN_DASAR')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>SIUP </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="SIUP">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('SIUP')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>TDP </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="TDP">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('TDP')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>NPWP </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="NPWP">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('NPWP')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur Utama </label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur_Utama" class="form-control" style="width: 300px; height: 30px;">
            @error('Nama_Direktur_Utama')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur Utama </label></div>
        <div class="col-sm-8">
            <input type="number" name="No_Identitas_Direktur_Utama" class="form-control"
                style="width: 300px; height: 30px;">
            @error('No_Identitas_Direktur_Utama')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur 1 </label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur1" class="form-control" style="width: 300px; height: 30px;">
            @error('Nama_Direktur1')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur 1 </label></div>
        <div class="col-sm-8">
            <input type="number" name="No_Identitas_Direktur1" class="form-control" style="width: 300px; height: 30px;">
            @error('No_Identitas_Direktur1')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur 2 </label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur_2" class="form-control" style="width: 300px; height: 30px;">
            @error('Nama_Direktur_2')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur 2 </label></div>
        <div class="col-sm-8">
            <input type="number" name="No_Identitas_Direktur2" class="form-control" style="width: 300px; height: 30px;">
            @error('No_Identitas_Direktur2')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Modal Pendirian </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="MODAL_PENDIRIAN">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('MODAL_PENDIRIAN')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Modal Perubahan Terakhir </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="MODAL_PERUBAHAN_TERAKHIR">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('MODAL_PERUBAHAN_TERAKHIR')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Audited Financial Statement Last 2 Years </label>
        </div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>In House Financial Statement Current Year</label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Bank Statement Last 3 Years </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="BANK_STATEMENT_LAST_3_MONTHS">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('BANK_STATEMENT_LAST_3_MONTHS')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Financial Projection For Next 3-5 Years </label>
        </div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Draft Template Agree End User </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="DRAFT_TEMPLATE_AGREEMENT_END_USER">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('DRAFT_TEMPLATE_AGREEMENT_END_USER')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Contoh Risk Acceptance Criteria </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="CONTOH_RISK_ACCEPTANCE_CRITERIA">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('CONTOH_RISK_ACCEPTANCE_CRITERIA')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>NDA Document </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="NDA_DOCUMENT">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('NDA_DOCUMENT')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jenis Asuransi <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div style="width: 300px; height: 38px;">
                <select class="form-control py-0" name="Jenis_Asuransi_Id" required style="width: 300px; height: 30px;">
                    <option></option>
                    @foreach ($asuransi as $item)
                    <option value="{{ $item->id }}">{{ $item->Jenis_Asuransi }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Perusahaan Asuransi</label></div>
        <div class="col-sm-8"><input type="text" name="Perusahaan_Asuransi" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Persen Asuransi</label></div>
        <div class="col-sm-8"><input type="number" name="Persen_Asuransi" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Asuransi</label></div>
        <div class="col-sm-8"><input type="number" name="Nilai_Asuransi" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Sertifikat Tanah</label></div>
        <div class="col-sm-8"><input type="text" name="Jaminan_Sertifikat_Tanah" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Sertifikat Tanah</label></div>
        <div class="col-sm-8"><input type="number" name="Nilai_Sertifikat_Tanah" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Kendaraan Mobil</label></div>
        <div class="col-sm-8"><input type="text" name="Jaminan_Kendaraan_Bermotor_Mobil" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Kendaraan Mobil</label></div>
        <div class="col-sm-8"><input type="number" name="Nilai_Kendaraan_Bermotor_Mobil" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Kendaraan Motor</label></div>
        <div class="col-sm-8"><input type="text" name="Jaminan_Kendaraan_Bermotor_Motor" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Kendaraan Motor</label></div>
        <div class="col-sm-8"><input type="number" name="Nilai_Kendaraan_Bermotor_Motor" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Personal Guarantee</label></div>
        <div class="col-sm-8"><input type="text" name="Jaminan_Personel_Guarantee" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Personal Guarantee</label></div>
        <div class="col-sm-8"><input type="number" name="Nilai_Personel_Guarantee" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Invoice</label></div>
        <div class="col-sm-8"><input type="text" name="Jaminan_Invoice" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Invoice</label></div>
        <div class="col-sm-8"><input type="number" name="Nilai_Invoice" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Inventori</label></div>
        <div class="col-sm-8"><input type="text" name="Jaminan_Inventory" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Inventori</label></div>
        <div class="col-sm-8"><input type="number" name="Nilai_Inventory" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Lainnya</label></div>
        <div class="col-sm-8"><input type="text" name="Jaminan_Lainnya" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Apakah Ada DP?</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="YA" style="width: 15px" name="APAKAH_ADA_DP" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="NO" style="width: 15px" name="APAKAH_ADA_DP" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Down Payment</label></div>
        <div class="col-sm-8"><input type="number" name="DOWN_PAYMENT_CUSTOMER" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <button class="btn btn-primary" type="submit">Add</button>
            <a href="{{ url('debitur_badan_usaha') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add_product') }}" method="POST">
                    @csrf
                    <div class="row pb-3">
                        <div class="col-sm-4"><label>ID Product <span class="text-danger">*</span></label></div>
                        <div class="col-sm-8">
                            <input type="text" name="id_master_product" class="form-control"
                                style="width: 300px; height: 30px;">
                            @error('id_master_product')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-sm-4"><label>Nama Product <span class="text-danger">*</span></label></div>
                        <div class="col-sm-8">
                            <input type="text" name="nama_product" class="form-control"
                                style="width: 300px; height: 30px;">
                            @error('nama_product')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
