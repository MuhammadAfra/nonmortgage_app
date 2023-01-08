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