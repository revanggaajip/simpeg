<!-- Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="/keluarga/create" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="pengguna_id" value="<?= session('id'); ?>">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Tambah <?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col mb-3">
                    <label for="nama" class="form-label">Nama Anggota Keluarga</label>
                    <input type="text" name="nama" id="nama" class="form-control"
                        placeholder="Masukkan Nama Keluarga"> 
                </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="awal" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                            placeholder="Masukkan Tanggal Lahir Keluarga">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="hubungan" class="form-label">Hubungan</label>
                        <select name="hubungan" id="hubungan" class="form-control">
                            <option value="Orang Tua">Orang Tua</option>
                            <option value="Suami">Suami</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak">Anak</option>
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
    </div>
    </form>
</div>