@extends('layout.layout')
@section('title')
Collateral Tambahan - Kendaraan Motor
@endsection

@section('subtitle')
Edit
@endsection

@section('page')
<a href="{{ url('collateral_motor_tambahan') }}">Collateral Tambahan - Kendaraan Motor</a>
@endsection

@section('content')
<form action="{{ url('collateral_motor_tambahan', $motor->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row pb-3" >
        <div class="col-sm-4"><label>Partner ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PARTNER_ID" id="PARTNER_ID" readonly class="form-control py-0 collCounterPart" style="width: 300px; height: 30px;">
                <option value="{{ $motor->PARTNER_ID }}">{{ $motor->partner->NAMA_PERUSAHAAN }}</option>
                {{-- @foreach ($partner as $item)
                <option value="{{ $item->id }}">{{ $item->NAMA_PERUSAHAAN }} </option>
                @endforeach --}}
            </select>
            @error('PARTNER_ID')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    <div class="row pb-3">
        <div class="col-sm-4"><label>Debitur ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="DEBITUR_ID" id="DEBITUR_ID" readonly class="form-control py-0 collCounterDebit" style="width: 300px; height: 30px;">
                <option value="{{ $motor->DEBITUR_ID }}">{{ $motor->debitur->NAMA_DEBITUR }}</option>
                {{-- @foreach ($debitur as $item)
                <option value="{{ $item->id }}">{{ $item->NAMA_DEBITUR }} </option>
                @endforeach --}}
            </select>
            @error('DEBITUR_ID')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Coll ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="COLL_COUNTER" class="form-control" value="{{ str_pad($motor->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}" readonly id="counter" style="width: 300px; height: 30px;" >
            @error('COLL_COUNTER')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Kendaraan Motor<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" value="{{ number_format($motor->Nilai_Motor_Vehicle_Tambahan) }}" placeholder="Nilai Kendaraan Motor" name="Nilai_Motor_Vehicle_Tambahan">
            </div>
            @error('Nilai_Motor_Vehicle_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Merk<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Merk_Tambahan" value="{{ $motor->Merk_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Merk')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Type<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Type_Tambahan" value="{{ $motor->Type_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Type')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Model<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Model_Tambahan" value="{{ $motor->Model_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Model')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jenis Motor<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Jenis_Motor_Sport_Listrik_Tambahan" value="{{ $motor->Jenis_Motor_Sport_Listrik_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Jenis_Motor_Sport_Listrik')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Di BPKB<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Di_Bpkb_Tambahan" value="{{ $motor->Nama_Di_Bpkb_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Nama_Di_Bpkb')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Frame<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Frame_Tambahan" value="{{ $motor->No_Frame_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('No_Frame')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Engine<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Engine_Tambahan" value="{{ $motor->No_Engine_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('No_Engine')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Polisi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Polisi_Tambahan" value="{{ $motor->No_Polisi_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('No_Pol')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Colour<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Colour_Tambahan" value="{{ $motor->Colour_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Colour')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tahun<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="number" name="Tahun_Tambahan" value="{{ $motor->Tahun_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Tahun')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Silinder<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Silinder_Tambahan" value="{{ $motor->Silinder_Tambahan }}" class="form-control"
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
                <option value="{{ $motor->Status_Tambahan }}">{{ $motor->Status_Tambahan }}</option>
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
            <a href="{{ url('collateral_motor_tambahan') }}" class="btn btn-default">Cancel</a>
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
         url: "{{ url('collateral_motor_tambahan_nextCounter') }}",
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
