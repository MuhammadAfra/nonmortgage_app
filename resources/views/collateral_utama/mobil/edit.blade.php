@extends('layout.layout')
@section('title')
Collateral Utama - Kendaraan Mobil
@endsection

@section('subtitle')
Edit
@endsection

@section('page')
<a href="{{ url('collateral_mobil') }}">Collateral Utama - Kendaraan Mobil</a>
@endsection

@section('content')
<form action="{{ url('collateral_mobil', $mobil->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row pb-3">
        <div class="col-sm-4"><label>Partner ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PARTNER_ID" id="PARTNER_ID" readonly class="form-control py-0 collCounterPart" style="width: 300px; height: 30px;">
                <option value="{{ $mobil->PARTNER_ID }}">{{ $mobil->partner->NAMA_PERUSAHAAN }}</option>
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
                <input type="radio" readonly value="PERORANGAN" style="width: 15px" name="debitur" {{ $mobil->jenisDeb == 'PERORANGAN' ? 'checked' : '' }} required class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">PERORANGAN</p>
            </div>
            <div class=" d-flex">
                <input type="radio" readonly value="BADAN_USAHA" style="width: 15px" name="debitur" {{ $mobil->jenisDeb == 'BADAN_USAHA' ? 'checked' : '' }} required class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">BADAN USAHA</p>
            </div>
            <button type="button" class="btn btn-sm btn-default" disabled onclick="jenisDeb()">Pilih</button>
        </div>
    </div>
    @if ($mobil->DEBITUR_ID != NULL)
        @if ($mobil->jenisDeb == 'PERORANGAN')
            <div style="display: block;" id="perorangan"">
                <div class="row pb-3" >
                    <div class="col-sm-4"><label>Debitur Perorangan ID <span class="text-danger">*</span></label></div>
                    <div class="col-sm-8">
                        <select name="DEBITUR_ID" readonly id="DEBITUR_ID" class="form-control py-0 collCounterDebit" style="width: 300px; height: 30px;">
                            <option value="{{ $mobil->DEBITUR_ID }}">{{ $mobil->debitur->NAMA_DEBITUR }}</option>
                        </select>
                        @error('DEBITUR_ID')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        @endif
    @endif

    @if ($mobil->DEBITUR_BADAN_USAHA_ID != NULL)
        @if ($mobil->jenisDeb == 'BADAN_USAHA')
            <div style="display: block;" id="usaha"">
                <div class="row pb-3" >
                    <div class="col-sm-4"><label>Debitur Badan Usaha ID <span class="text-danger">*</span></label></div>
                    <div class="col-sm-8">
                        <select readonly name="DEBITUR_BADAN_USAHA_ID" id="DEBITUR_BADAN_USAHA_ID" class="form-control py-0 collCounterDebus" style="width: 300px; height: 30px;">
                            <option value="{{ $mobil->DEBITUR_BADAN_USAHA_ID }}">{{ $mobil->debitur_badan_usaha->NAMA_PERUSAHAAN }}</option>
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
            <input type="text" name="COLL_COUNTER" value="{{ str_pad($mobil->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}" class="form-control" readonly id="counter" style="width: 300px; height: 30px;" >
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
            <input type="text" class="form-control number-separator" value="{{ number_format($mobil->Nilai_Mobil_Vehicle) }}" name="Nilai_Mobil_Vehicle">
            </div>
            @error('Nilai_Mobil_Vehicle')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Merk<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Merk" value="{{ $mobil->Merk }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Merk')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Type<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Type" value="{{ $mobil->Type }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Type')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Model<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Model" value="{{ $mobil->Model }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Model')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Peruntukan<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Peruntukan" value="{{ $mobil->Peruntukan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Peruntukan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Di BPKB<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Di_Bpkb" value="{{ $mobil->Nama_Di_Bpkb }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Nama_Di_Bpkb')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Di BPKB<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Alamat_Di_Bpkb" value="{{ $mobil->Alamat_Di_Bpkb }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Alamat_Di_Bpkb')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Frame<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Frame" value="{{ $mobil->No_Frame }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('No_Frame')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Engine<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Engine" value="{{ $mobil->No_Engine }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('No_Engine')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Polisi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Polisi" value="{{ $mobil->No_Polisi }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('No_Pol')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Colour<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Colour" value="{{ $mobil->Colour }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Colour')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tahun<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="number" name="Tahun" value="{{ $mobil->Tahun }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Tahun')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Silinder<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Silinder" value="{{ $mobil->Silinder }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Silinder')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="Status" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $mobil->Status }}">{{ $mobil->Status }}</option>
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
            <a href="{{ url('collateral_mobil') }}" class="btn btn-default">Cancel</a>
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
         url: "{{ url('collateral_mobil_tambahan_nextCounter') }}",
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
