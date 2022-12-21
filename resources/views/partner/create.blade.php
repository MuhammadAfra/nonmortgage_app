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
            <div class="col-sm-4"><label>Nama Perusahaan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="NAMA_PERUSAHAAN" class="form-control" style="width: 300px; height: 30px;">
                @error('NAMA_PERUSAHAAN')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat Perusahaan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <textarea name="ALAMAT_PERUSAHAAN" style="width: 500px; height: 100px;" class="form-control" cols="30" rows="10"></textarea>
                @error('ALAMAT_PERUSAHAAN')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status Badan Hukum <span class="text-danger">*</span></label></div>
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
                    <input type="radio" value="PN" style="width: 15px" name="STATUS_BADAN_HUKUM" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">PN</p>
                </div>
                @error('STATUS_BADAN_HUKUM')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Akte Pendirian <span class="text-danger">*</span></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px; cursor: pointer;">
                    <input type="file" class="custom-file-input" name="AKTE_PENDIRIAN" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('AKTE_PENDIRIAN')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Company Profile <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="COMPANY_PROFILE" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('COMPANY_PROFILE')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="row pb-3">
            <div class="col-sm-4"><label>Detail Product File <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                {{-- <select name="DETIL_PRODUCT_PROFILE" class="form-control py-0" style="width: 250px; height: 30px;">
                    <option></option>
                    @foreach ($prod as $item)
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->product }}</option>
                    @endforeach
                </select>
                <button class="btn bg-white text-center p-0 py-1" type="button" data-toggle="modal" data-target="#exampleModal" style="height: 30px; width: 30px; border: 1px solid #ced4da"><p>+</p></button>
                @error('DETIL_PRODUCT_PROFILE')
                    <p class="text-danger">{{ $message }}</p>
                @enderror --}}
                <div class="input-group" style="width: 300px; height: 38px;">
                    <select class="custom-select"  name="DETIL_PRODUCT_PROFILE">
                        <option></option>
                        @foreach ($prod as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->product }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                      <button class="btn bg-white p-0 py-1 font-weight-bold" type="button" data-toggle="modal" data-target="#exampleModal" style="height: 38px; width: 30px; border: 1px solid #ced4da">+</button>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Akte Perubahan Anggaran Dasar <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="AKTE_PERUBAHAN_ANGGARAN_DASAR" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('AKTE_PERUBAHAN_ANGGARAN_DASAR')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>SIUP <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="SIUP" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('SIUP')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>TDP <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="TDP" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('TDP')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>        
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>NPWP <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="NPWP" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('NPWP')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>        
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Direktur Utama <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="Nama_Direktur_Utama" class="form-control" style="width: 300px; height: 30px;">
                @error('Nama_Direktur_Utama')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nomor HP Direktur Utama <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="number" name="No_HP_Dirut" class="form-control" style="width: 300px; height: 30px;">
                @error('No_HP_Dirut')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Direktur 1 <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="Nama_Direktur1" class="form-control" style="width: 300px; height: 30px;">
                @error('Nama_Direktur1')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nomor HP Direktur 1 <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="number" name="No_HP_Direktur1" class="form-control" style="width: 300px; height: 30px;">
                @error('No_HP_Direktur1')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Direktur 2 <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="Nama_Direktur_2" class="form-control" style="width: 300px; height: 30px;">
                @error('Nama_Direktur_2')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nomor HP Direktur 2 <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="number" name="No_HP_Direktur2" class="form-control" style="width: 300px; height: 30px;">
                @error('No_HP_Direktur2')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Modal Pendirian <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="MODAL_PENDIRIAN" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('MODAL_PENDIRIAN')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>        
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Modal Perubahan Terakhir <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="MODAL_PERUBAHAN_TERAKHIR" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('MODAL_PERUBAHAN_TERAKHIR')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>        
        </div>
        {{-- <div class="row pb-3">
            <div class="col-sm-4"><label>Audited Financial Statement Current Year</label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>        
        </div> --}}
        <div class="row pb-3">
            <div class="col-sm-4"><label>Audited Financial Statement Last 2 Years <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>        
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>In House Financial Statement Current Year <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>        
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Bank Statement Last 3 Years <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="BANK_STATEMENT_LAST_3_MONTHS" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('BANK_STATEMENT_LAST_3_MONTHS')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>        
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Financial Projection For Next 3-5 Years <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>        
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Draft Template Agree End User <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="DRAFT_TEMPLATE_AGREEMENT_END_USER" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('DRAFT_TEMPLATE_AGREEMENT_END_USER')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>        
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Contoh Risk Acceptance Criteria <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="CONTOH_RISK_ACCEPTANCE_CRITERIA" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('CONTOH_RISK_ACCEPTANCE_CRITERIA')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>        
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>NDA Document <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="NDA_DOCUMENT" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('NDA_DOCUMENT')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>        
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="status" class="form-control" style="width: 300px; height: 30px;">
                @error('status')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ url('partner') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection