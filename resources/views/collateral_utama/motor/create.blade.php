@extends('layout.layout')
@section('title')
Collateral Utama - Kendaraan Motor
@endsection

@section('subtitle')
Add
@endsection

@section('page')
<a href="{{ url('collateral_motor') }}">Collateral Utama - Kendaraan Motor</a>
@endsection

@section('content')
<form action="{{ url('collateral_motor') }}" method="POST">
    @csrf
    <?php 
	use App\Http\Controllers\CollateralMotorController;
    ?>
    {{-- {{ $counter }} --}}
    <div class="row pb-3">
        <div class="col-sm-4"><label>Partner ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PARTNER_ID" id="PARTNER_ID" class="form-control py-0 collCounter"
                style="width: 300px; height: 30px;">
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
            <select name="DEBITUR_ID" id="DEBITUR_ID" class="form-control py-0 collCounter"
                style="width: 300px; height: 30px;">
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
            <input type="text" name="COLL_COUNTER" class="form-control" id="counter" disabled
                style="width: 300px; height: 30px;" value="">
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
                <input type="text" class="form-control number-separator" placeholder="Nilai Kendaraan Motor"
                    name="Nilai_Motor_Vehicle">
            </div>
            @error('Nilai_Motor_Vehicle')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Merk<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Merk" class="form-control" placeholder="Merk" style="width: 300px; height: 30px;">
            @error('Merk')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Type<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Type" class="form-control" placeholder="Type" style="width: 300px; height: 30px;">
            @error('Type')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Model<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Model" class="form-control" placeholder="Model"
                style="width: 300px; height: 30px;">
            @error('Model')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jenis Motor<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Jenis_Motor_Sport_Listrik" placeholder="Jenis Motor" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Jenis_Motor_Sport_Listrik')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Di BPKB<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Di_Bpkb" class="form-control" placeholder="Nama Di BPKB"
                style="width: 300px; height: 30px;">
            @error('Nama_Di_Bpkb')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Frame<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Frame" class="form-control" placeholder="No Frame"
                style="width: 300px; height: 30px;">
            @error('No_Frame')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Engine<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Engine" class="form-control" placeholder="No Engine"
                style="width: 300px; height: 30px;">
            @error('No_Engine')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Polisi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Polisi" class="form-control" placeholder="No Polisi"
                style="width: 300px; height: 30px;">
            @error('No_Pol')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Colour<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Colour" class="form-control" placeholder="Colour"
                style="width: 300px; height: 30px;">
            @error('Colour')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tahun<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="number" name="Tahun" class="form-control" placeholder="Tahun"
                style="width: 300px; height: 30px;">
            @error('Tahun')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Silinder<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Silinder" class="form-control" placeholder="Silinder"
                style="width: 300px; height: 30px;">
            @error('Silinder')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="Status" class="form-control py-0" style="width: 300px; height: 30px;" id="bottom">
                <option></option>
                <option value="Pending">Pending</option>
                <option value="To Be Obtained">To Be Obtained</option>
                <option value="Diterima">Diterima</option>
            </select>
            @error('Status')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <button class="btn btn-primary" type="submit">Add</button>
            <a href="{{ url('collateral_motor') }}" class="btn btn-default">Cancel</a>
            <button class="btn btn-success" name="add" id="add" type="button">Add New Collateral</button>
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

    $(".collCounter").on('change', function () {
        var partner_id = $('option:selected', this).val();
        var debitur_id = $('option:selected', this).val();
        $.ajax({
            url: "{{ url('colls_motor_utama-test') }}",
            data: {
                "partner_id": partner_id,
                "debitur_id": debitur_id
            },
            type: 'get',
            success: function (result) {
                console.log(result);
                // document.getElementById('counter').value = result['data'];
                document.getElementById('counter').value = result['data'][0]['jumlah'];
            }
        });
    });

</script>

@endsection
