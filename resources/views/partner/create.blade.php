@extends('layout.layout')
@section('title')
Partner
@endsection

@section('subtitle')
Add
@endsection

@section('page')
<a href="{{ url('partner') }}">Partner</a>
@endsection

@section('content')
<form action="{{ url('partner') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Perusahaan </label></div>
        <div class="col-sm-8">
            <input type="text" name="NAMA_PERUSAHAAN" class="form-control" style="width: 500px; height: 40px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Perusahaan </label></div>
        <div class="col-sm-8">
            <textarea name="ALAMAT_PERUSAHAAN" style="width: 500px; height: 100px;" class="form-control" cols="30"
                rows="10"></textarea>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status Badan Hukum </label></div>
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
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Akta Pendirian <span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
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
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="COMPANY_PROFILE">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Akta Lain-Lain </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="AKTE_LAIN_LAIN[]" multiple>
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Detail Nama Product </label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 500px; height: 38px;">
                <select class="form-control py-0" id="detail" name="DETIL_PRODUCT_PROFILE" onchange="namaProduct()">
                    <option></option>
                    @foreach ($prod as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_product }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row pb-3 pl-2" id="borrower" style="display: none;">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Borrower </label></div>
            <div class="col-sm-8" style="padding-left: 4.5px">
                <input type="text" name="NAMA_BORROWER" class="form-control" placeholder="Nama Borrower" style="width: 500px; height: 38px;">
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggal Jatuh Tempo </label></div>
            <div class="col-sm-8" style="padding-left: 4.5px">
                <input type="date" name="TGL_JATUH_TEMPO" class="form-control" placeholder="Tanggal Jatuh Tempo" style="width: 500px; height: 38px;">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"><label>Nilai Invoice Financing </label></div>
            <div class="col-sm-8" style="padding-left: 4.5px">
                <input type="text" name="NILAI_INVOICE_FINANCING" class="form-control number-separator" placeholder="Nilai Invoice Financing" style="width: 500px; height: 38px;">
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Akta Perubahan Anggaran Dasar </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="AKTE_PERUBAHAN_ANGGARAN_DASAR">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>SIUP / NIB </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 38px;">
                <input type="file" class="custom-file-input" name="SIUP">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tanggal Masa Berlaku SIUP </label></div>
        <div class="col-sm-8">
            <input type="date" name="TGL_BERLAKU_SIUP" class="form-control" style="width: 500px; height: 38px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>TDP </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 38px;">
                <input type="file" class="custom-file-input" name="TDP">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tanggal Masa Berlaku TDP </label></div>
        <div class="col-sm-8">
            <input type="date" name="TGL_BERLAKU_TDP" class="form-control" style="width: 500px; height: 38px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>NPWP </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="NPWP">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur Utama </label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur_Utama" class="form-control" style="width: 500px; height: 30px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur Utama </label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Identitas_Direktur_Utama" class="form-control"
                style="width: 500px; height: 40px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur 1 </label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur1" class="form-control" style="width: 500px; height: 40px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur 1 </label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Identitas_Direktur1" class="form-control" style="width: 500px; height: 40px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur 2 </label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur_2" class="form-control" style="width: 500px; height: 40px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur 2 </label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Identitas_Direktur2" class="form-control" style="width: 500px; height: 40px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Modal Pendirian </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="MODAL_PENDIRIAN">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Modal Perubahan Terakhir </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="MODAL_PERUBAHAN_TERAKHIR">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Audited Financial Statement Last 2 Years </label>
        </div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Last Year </label></div>
        <div class="col-sm-8">
            <input type="date" name="LAST_YEAR" class="form-control" style="width: 500px; height: 38px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>In House Financial Statement Current Year</label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Bank Statement Last 3 Years </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 38px;">
                <input type="file" class="custom-file-input" name="BANK_STATEMENT_LAST_3_MONTHS[]" multiple>
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Financial Projection For Next 3-5 Years </label>
        </div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Draft Template Agreement End User </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="DRAFT_TEMPLATE_AGREEMENT_END_USER">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Contoh Risk Acceptance Criteria </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="CONTOH_RISK_ACCEPTANCE_CRITERIA">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>NDA Document </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="NDA_DOCUMENT">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Pengganti Asuransi <span class="text-danger">*</span></label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" required name="PENGGANTI_ASURANSI" class="form-control" onchange="checkASR(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" required name="PENGGANTI_ASURANSI" class="form-control" onchange="checkASR(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>File Pengganti Asuransi </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input id="pengganti" type="file" class="custom-file-input" disabled name="FILE_PENGGANTI_ASURANSI">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status</label></div>
        <div class="col-sm-8">
            <select name="Status" class="form-control py-0" style="width: 500px; height: 40px;">
                <option></option>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <option value="Reject">Reject</option>
                <option value="Draft">Draft</option>
            </select>
        </div>
    </div>
    
    <div class="row pb-3">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <button class="btn btn-primary" type="submit">Add</button>
            <a href="{{ url('partner') }}" class="btn btn-default">Cancel</a>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
                Save As Draft
            </button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-5">
                <center>
                        <h5>Data Akan Disimpan Sebagai <span style="font-style: italic">Draft</span></h5>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                </center>
            </div>
        </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    function checkASR(obj) 
    {
        var pengganti = document.getElementById("pengganti");
        pengganti.disabled = obj.value == "ADA";
    }

    function namaProduct() {
        var namaProduct = document.getElementById("detail");
        var detail = namaProduct.options[namaProduct.selectedIndex].text;
        // nama.find(":selected").text();
        console.log(detail);
        if (detail == "Invoice Financing") {
            // document.getElementById("borrower").style.visibility = 'visible';
            document.getElementById("borrower").style.display = 'block';
        }else{
            // document.getElementById("borrower").style.visibility = 'hidden';
            document.getElementById("borrower").style.display = 'none';
        }
    }
</script>
@endsection
