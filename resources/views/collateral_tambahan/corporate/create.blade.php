@extends('layout.layout')
@section('title')
Collateral Tambahan - Corporate
@endsection

@section('subtitle')
Add
@endsection

@section('page')
<a href="{{ url('collateral_corporate_tambahan') }}">Collateral Tambahan - Corporate</a>
@endsection

@section('content')
<form action="{{ url('collateral_corporate_tambahan') }}" method="POST">
    @csrf
    <div class="row pb-3" >
        <div class="col-sm-4"><label>Partner ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PARTNER_ID" id="PARTNER_ID" class="form-control py-0 collCounterPart" style="width: 300px; height: 30px;">
                <option></option>
                @foreach ($partner as $item)
                <option value="{{ $item->id }}">{{ $item->NAMA_PERUSAHAAN }} </option>
                @endforeach
            </select>
            @error('PARTNER_ID')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Debitur ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="DEBITUR_ID" id="DEBITUR_ID" class="form-control py-0 collCounterDebit" style="width: 300px; height: 30px;">
                <option></option>
                @foreach ($debitur as $item)
                <option value="{{ $item->id }}">{{ $item->NAMA_DEBITUR }} </option>
                @endforeach
            </select>
            @error('DEBITUR_ID')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Coll ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="COLL_COUNTER" class="form-control" readonly id="counter" style="width: 300px; height: 30px;" >
            @error('COLL_COUNTER')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Corporate Guarantee<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Corporate Guarantee" name="Nilai_Corporate_Guarantee_Tambahan">
            </div>
            @error('Nilai_Corporate_Guarantee_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama PT Penerima Corporate Guarantee<span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Pt_Penerima_Corporate_Guarantee_Tambahan" placeholder="Nama PT Penerima Corporate Guarantee" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Nama_Pt_Penerima_Corporate_Guarantee_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama PT Pemberi Corporate Guarantee<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan" placeholder="Nama PT Pemberi Corporate Guarantee" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Telp PT Pemberi Corporate Guarantee<span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <input type='number' name="No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan" placeholder="No Telp PT Pemberi Corporate Guarantee" style="width: 300px; height: 30px;"
                class="form-control" cols="30" rows="10" />
            @error('No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="Status_Tambahan" class="form-control py-0" style="width: 300px; height: 30px;">
                <option></option>
                <option value="Pending">Pending</option>
                <option value="To Be Obtained">To Be Obtained</option>
                <option value="Diterima">Diterima</option>
            </select>
            @error('Status_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <button class="btn btn-primary" type="submit">Add</button>
            <a href="{{ url('collateral_corporate_tambahan') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
<script type="text/javascript">
    // function change() {
    //     var partner_id = document.getElementById('PARTNER_ID').value;
    //     var debitur_id = document.getElementById('DEBITUR_ID').value;
    //     if(partner_id != '' ) {
    //         var NextCounter = CollateralMotorController::test();
    //         alert("hallow"+NextCounter);
    //     } else {
    //         alert("hallow kosong"+partner_id);
    //     }
    // }

    $(".collCounterPart").on('change', function(){
    var partner_id = $('option:selected', this).val();
    console.log(partner_id);
    $(".collCounterDebit").on('change', function(){
    var debitur_id = $('option:selected', this).val();
    console.log(debitur_id);        

	$.ajax({ 
         url: "{{ url('collateral_corporate_tambahan_nextCounter') }}",
         data: {"partner_id": partner_id, 
                "debitur_id": debitur_id},
         type: 'get',
         success: function(result){
            console.log(result);
            document.getElementById('counter').value = result['data'][0]['jumlah'];
         }
        });
  });
});
@endsection