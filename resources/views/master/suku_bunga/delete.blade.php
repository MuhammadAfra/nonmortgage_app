<<<<<<< HEAD
<div class="modal fade" id="exampleModalCenter{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Apakah Anda Yakin Ingin Hapus Data?</h5>
            </div>
            <form action="{{ url('master_suku_bunga', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger text-white">Delete</button>
            </form>
        </div>
    </div>
</div>
</div>
=======
{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('master_suku_bunga.destroy', $sukuBunga->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Apakah Anda Yakin Ingin Menghapus {{ $sukuBunga->Suku_Bunga }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus Data</button>
    </div>
</form>
>>>>>>> 96416405cf1375d7fac3e5dc354645089172b370
