@extends('layout.layout')
@section('title')
Collateral Utama - Rumah/Tanah
@endsection

@section('subtitle')
Edit
@endsection

@section('page')
<a href="{{ url('collateral_rumah') }}">Collateral Utama - Rumah/Tanah</a>
@endsection

@section('content')
<form action="{{ url('collateral_rumah', $rumah->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row pb-3" >
        <div class="col-sm-4"><label>Partner ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PARTNER_ID" id="PARTNER_ID" readonly class="form-control py-0 collCounterPart" style="width: 300px; height: 30px;">
                <option value="{{ $rumah->PARTNER_ID }}">{{ $rumah->partner->NAMA_PERUSAHAAN }}</option>
            </select>
            @error('PARTNER_ID')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Debitur <span class="text-danger">*</span></label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" readonly value="PERORANGAN" style="width: 15px" name="debitur" {{ $rumah->jenisDeb == 'PERORANGAN' ? 'checked' : '' }} required class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">PERORANGAN</p>
            </div>
            <div class=" d-flex">
                <input type="radio" readonly value="BADAN_USAHA" style="width: 15px" name="debitur" {{ $rumah->jenisDeb == 'BADAN_USAHA' ? 'checked' : '' }} required class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">BADAN USAHA</p>
            </div>
            <button type="button" class="btn btn-sm btn-default" disabled onclick="jenisDeb()">Pilih</button>
        </div>
    </div>

    @if ($rumah->DEBITUR_ID != NULL)
        @if ($rumah->jenisDeb == 'PERORANGAN')
            <div style="display: block;" id="perorangan"">
                <div class="row pb-3" >
                    <div class="col-sm-4"><label>Debitur Perorangan ID <span class="text-danger">*</span></label></div>
                    <div class="col-sm-8">
                        <select name="DEBITUR_ID" readonly id="DEBITUR_ID" class="form-control py-0 collCounterDebit" style="width: 300px; height: 30px;">
                            <option value="{{ $rumah->DEBITUR_ID }}">{{ $rumah->debitur->NAMA_DEBITUR }}</option>
                        </select>
                        @error('DEBITUR_ID')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        @endif
    @endif

    @if ($rumah->DEBITUR_BADAN_USAHA_ID != NULL)
        @if ($rumah->jenisDeb == 'BADAN_USAHA')
            <div style="display: block;" id="usaha"">
                <div class="row pb-3" >
                    <div class="col-sm-4"><label>Debitur Badan Usaha ID <span class="text-danger">*</span></label></div>
                    <div class="col-sm-8">
                        <select readonly name="DEBITUR_BADAN_USAHA_ID" id="DEBITUR_BADAN_USAHA_ID" class="form-control py-0 collCounterDebus" style="width: 300px; height: 30px;">
                            <option value="{{ $rumah->DEBITUR_BADAN_USAHA_ID }}">{{ $rumah->debitur_badan_usaha->NAMA_PERUSAHAAN }}</option>
                        </select>
                        @error('DEBITUR_BADAN_USAHA_ID')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        @endif
    @endif

    <div class="row pb-3">
        <div class="col-sm-4"><label>Coll ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="COLL_COUNTER" value="{{ str_pad($rumah->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}" class="form-control" readonly id="counter" style="width: 300px; height: 30px;" >
            @error('COLL_COUNTER')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>


    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Rumah Tanah<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" value="{{ number_format($rumah->Nilai_Rumah_Tanah) }}"  name="Nilai_Rumah_Tanah">
            </div>
            @error('Nilai_Rumah_Tanah')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>No SHM / No HGB<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Shm_No_Hgb" value="{{ $rumah->No_Shm_No_Hgb }}" class="form-control" style="width: 300px; height: 30px;">
            @error('No_Shm_No_Hgb')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Luas<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 30px;">
            <input type="number" class="form-control" value="{{ $rumah->Luas }}" placeholder="Luas" name="Luas">
                <div class="input-group-append">
                    <span class="input-group-text">M<sup>2</sup></span>
                </div>
            </div>
            @error('Luas')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Atas Nama<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Atas_Nama" value="{{ $rumah->Atas_Nama }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Atas_Nama')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <textarea name="Alamat" class="form-control" rows="10" value="{{ $rumah->Alamat }}" style="width: 300px;">{{ $rumah->Alamat }}</textarea>
            @error('Alamat')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Appraisal<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" value="{{ number_format($rumah->Nilai_Appraisal) }}" placeholder="Nilai Appraisal" name="Nilai_Appraisal">
            </div>
            @error('Nilai_Appraisal')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>


  <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="Status" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $rumah->Status }}">{{ $rumah->Status }}</option>
                <option value="Pending">Pending</option>
                <option value="To Be Obtained">To Be Obtained</option>
                <option value="Diterima">Diterima</option>
            </select>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <button class="btn btn-warning text-white" type="submit">Edit</button>
            <a href="{{ url('collateral_rumah') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    $(".collCounterPart").on('change', function(){
    var partner_id = $('option:selected', this).val();
    console.log(partner_id);
    $(".collCounterDebit").on('change', function(){
    var debitur_id = $('option:selected', this).val();
    console.log(debitur_id);        

	$.ajax({ 
         url: "{{ url('collateral_rumah_nextCounter') }}",
         data: {"partner_id": partner_id, 
                "debitur_id": debitur_id},
         type: 'get',
         success: function(result){
            var finalResult = "";
            console.log(result);
            console.log(result['data'][0]['jumlah']);
            if (result['data'][0]['jumlah'].toString().length == 1) {
                finalResult = "00"+result['data'][0]['jumlah'];
            }
            if (result['data'][0]['jumlah'].toString().length == 2) {
                finalResult = "0"+result['data'][0]['jumlah'];
            }
            document.getElementById('counter').value = finalResult;
         }
        });
  });
});
</script>
@endsection
