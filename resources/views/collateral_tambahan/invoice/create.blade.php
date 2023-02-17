@extends('layout.layout')
@section('title')
Collateral Tambahan - Invoice
@endsection

@section('subtitle')
Add
@endsection

@section('page')
<a href="{{ url('collateral_invoice_tambahan') }}">Collateral Tambahan - Invoice</a>
@endsection

@section('content')
<form action="{{ url('collateral_invoice_tambahan') }}" method="POST">
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
        <div class="col-sm-4"><label>Debitur <span class="text-danger">*</span></label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="PERORANGAN" style="width: 15px" name="debitur" required class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">PERORANGAN</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="BADAN_USAHA" style="width: 15px" name="debitur" required class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">BADAN USAHA</p>
            </div>
            <button type="button" class="btn btn-sm btn-default" onclick="jenisDeb()">Pilih</button>
        </div>
    </div>

    <div style="display: none;" id="perorangan"">
        <div class="row pb-3" >
            <div class="col-sm-4"><label>Debitur Perorangan ID <span class="text-danger">*</span></label></div>
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
    </div>

    <div style="display: none;" id="usaha"">
        <div class="row pb-3" >
            <div class="col-sm-4"><label>Debitur Badan Usaha ID <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <select name="DEBITUR_BADAN_USAHA_ID" id="DEBITUR_BADAN_USAHA_ID" class="form-control py-0 collCounterDebus" style="width: 300px; height: 30px;">
                    <option></option>
                    @foreach ($dbu as $item)
                        <option value="{{ $item->id }}">{{ $item->NAMA_PERUSAHAAN }} </option>
                    @endforeach
                </select>
                @error('DEBITUR_BADAN_USAHA_ID')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
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
        <div class="col-sm-4"><label>Nilai Invoice<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Invoice" name="Nilai_Invoice_Tambahan">
            </div>
            @error('Nilai_Invoice_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jenis Invoice<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Jenis_Invoice_Tambahan" placeholder="Jenis Invoice" class="form-control" style="width: 300px; height: 30px;">
            @error('Jenis_Invoice_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Atas Nama Invoice<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Atas_Nama_Invoice_Tambahan" placeholder="Atas Nama Invoice" class="form-control" style="width: 300px; height: 30px;">
            @error('Atas_Nama_Invoice_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Nama Invoice <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <textarea name="Alamat_Nama_Invoice_Tambahan" placeholder="Alamat Nama Invoice" style="width: 300px; height: 100px;" class="form-control" cols="30"
                rows="10"></textarea>
            @error('Alamat_Nama_Invoice_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Fiducia<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="number" name="No_Fiducia_Tambahan" placeholder="No Fiducia" class="form-control" style="width: 300px; height: 30px;">
            @error('No_Fiducia_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Fiducia<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Fiducia" name="Nilai_Fiducia_Tambahan">
            </div>
            @error('Nilai_Fiducia_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Tanggal Fiducia<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="date" name="Tgl_Fiducia_Tambahan" class="form-control" style="width: 300px; height: 30px;">
            @error('Tgl_Fiducia_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tanggal Jatuh Tempo<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="date" name="Tgl_Jatuh_Tempo_Tambahan" class="form-control" style="width: 300px; height: 30px;">
            @error('Tgl_Jatuh_Tempo_Tambahan')
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
            <a href="{{ url('collateral_invoice_tambahan') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    
    function jenisDeb() {

        var deb = document.querySelector('input[name="debitur"]:checked').value;
        console.log(deb);

        if (deb == "PERORANGAN") {
            document.getElementById("perorangan").style.display = 'block';
        }else{
            document.getElementById("perorangan").style.display = 'none';
        }

        if (deb == "BADAN_USAHA") {
            document.getElementById("usaha").style.display = 'block';
        }else{
            document.getElementById("usaha").style.display = 'none';
        }
        
    }

    // coll counter debitur perorangan
    $(".collCounterPart").on('change', function(){
    var partner_id = $('option:selected', this).val();
    console.log(partner_id);

        $(".collCounterDebit").on('change', function(){
        var debitur_id = $('option:selected', this).val();
        console.log(debitur_id);         

        $.ajax({ 
            url: "{{ url('collateral_invoice_tambahan_nextCounter') }}",
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

        $(".collCounterDebus").on('change', function(){
        var debus_id = $('option:selected', this).val();
        console.log(debus_id); 

        $.ajax({ 
            url: "{{ url('collateral_invoice_tambahan_nextCounter_2') }}",
            data: {"partner_id": partner_id, 
                    "debus_id": debus_id},
            type: 'get',
            success: function(result_2){
                var finalResult_2 = "";
                console.log(result_2);
                console.log(result_2['data'][0]['jumlah']);
                if (result_2['data'][0]['jumlah'].toString().length == 1) {
                    finalResult_2 = "00"+result_2['data'][0]['jumlah'];
                }
                if (result_2['data'][0]['jumlah'].toString().length == 2) {
                    finalResult_2 = "0"+result_2['data'][0]['jumlah'];
                }
                document.getElementById('counter').value = finalResult_2;
            }
        });
    });
});
</script>
@endsection