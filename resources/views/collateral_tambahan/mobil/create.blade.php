@extends('layout.layout')
@section('title')
Collateral Tambahan - Kendaraan Mobil
@endsection

@section('subtitle')
Add
@endsection

@section('page')
<a href="{{ url('collateral_mobil_tambahan') }}">Collateral Tambahan - Kendaraan Mobil</a>
@endsection

@section('content')
<form action="{{ url('collateral_mobil_tambahan') }}" method="POST">
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
        <div class="col-sm-4"><label>Nilai Kendaraan Mobil<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Kendaraan Mobil" name="Nilai_Mobil_Vehicle_Tambahan">
            </div>
            @error('Nilai_Mobil_Vehicle_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Merk<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Merk_Tambahan" class="form-control" placeholder="Merk" style="width: 300px; height: 30px;">
            @error('Merk')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Type<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Type_Tambahan" class="form-control" placeholder="Type" style="width: 300px; height: 30px;">
            @error('Type')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Model<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Model_Tambahan" class="form-control"  placeholder="Model" style="width: 300px; height: 30px;">
            @error('Model')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Peruntukan<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Peruntukan_Tambahan" class="form-control" placeholder="Peruntukan" style="width: 300px; height: 30px;">
            @error('Peruntukan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Di BPKB<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Di_Bpkb_Tambahan" class="form-control" placeholder="Nama Di BPKB" style="width: 300px; height: 30px;">
            @error('Nama_Di_Bpkb')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Di BPKB<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <textarea name="Alamat_Di_Bpkb_Tambahan" style="width: 300px; height: 100px;" placeholder="Alamat Di BPKB" class="form-control" cols="30"
                rows="10"></textarea>
            @error('Alamat_Di_Bpkb')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Frame<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Frame_Tambahan" class="form-control" placeholder="No Frame"
                style="width: 300px; height: 30px;">
            @error('No_Frame')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Engine<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Engine_Tambahan" class="form-control" placeholder="No Engine"
                style="width: 300px; height: 30px;">
            @error('No_Engine')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Polisi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Polisi_Tambahan" class="form-control" placeholder="No Polisi"
                style="width: 300px; height: 30px;">
            @error('No_Polisi')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Colour<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Colour_Tambahan" class="form-control" placeholder="Colour"
                style="width: 300px; height: 30px;">
            @error('Colour')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tahun<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="number" name="Tahun_Tambahan" class="form-control" placeholder="Tahun"
                style="width: 300px; height: 30px;">
            @error('Tahun')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Silinder<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Silinder_Tambahan" class="form-control" placeholder="Silinder"
                style="width: 300px; height: 30px;">
            @error('Silinder')
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
            <a href="{{ url('collateral_mobil_tambahan') }}" class="btn btn-default">Cancel</a>
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
         url: "{{ url('collateral_mobil_tambahan_nextCounter') }}",
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
