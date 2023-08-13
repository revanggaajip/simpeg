<!-- Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="/berkas/create/<?= session('id')?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="pengguna_id" value="<?= session('id'); ?>">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Tambah <?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Keterangan Berkas">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="berkas" class="form-label">Upload Berkas</label>
                        <input type="file" name="berkas" id="berkas" class="form-control"> 
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                    <i class="bx bx-x-circle"></i> Batal
                </button>
                <button type="submit" class="btn btn-success"><i class="bx bx-check-circle"></i> Simpan</button>
            </div>
    </div>
    </form>
</div>