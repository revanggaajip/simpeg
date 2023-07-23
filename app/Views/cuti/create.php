<!-- Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="/cuti/create" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="pengguna_id" value="<?= session('id'); ?>">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Tambah <?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="mulai" class="form-label">Mulai Cuti</label>
                        <input type="date" name="mulai" id="mulai" class="form-control"
                            placeholder="Masukkan Tanggal Awal Cuti">
                    </div>
                    <div class="col mb-3">
                        <label for="akhir" class="form-label">Akhir Cuti</label>
                        <input type="date" name="akhir" id="akhir" class="form-control" placeholder="Masukkan Nama ">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="alasan" class="form-label">Alasan Cuti</label>
                        <input type="text" name="alasan" id="alasan" class="form-control"
                            placeholder="Masukkan Alasan Cuti">
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