<!-- Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="<?= route_to('kriteria.store'); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Tambah <?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="id" class="form-label">Id Kriteria</label>
                        <input type="text" id="id" name="id" class="form-control" placeholder="Masukkan Id Kategori"
                            value="<?= $id; ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Nama Kriteria</label>
                        <input type="text" name="nama" id="nama_kriteria" class="form-control"
                            placeholder="Masukkan Nama Kategori">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="bobot" class="form-label">Bobot Kriteria</label>
                        <input type="number" name="bobot" id="number_kriteria" class="form-control"
                            placeholder="Masukkan Bobot Kategori">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="status" class="form-label">Status Kriteria</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" disabled selected>Pilih Status Kriteria</option>
                            <option value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                    <i class="bx bx-x-circle"></i> Batal
                </button>
                <button type="submit" class="btn btn-success"><i class="bx bx-check-circle"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>