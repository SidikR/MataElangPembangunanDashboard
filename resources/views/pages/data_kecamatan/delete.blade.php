<div class="modal fade" id="modalDelete{{ $index }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Hapus Data</h1>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <span class=""><i class="bi icon-modal-delete bi-question-circle-fill"></i></span>
                    <p class="mb-1">Apakah anda yakin ingin menghapus data kecamatan</p>
                    <h5 class="mt-2 text-center">{{ $item->name }}</h3>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('data-kecamatan.destroy', ['data_kecamatan' => $item->id_kecamatan]) }}"
                    method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
