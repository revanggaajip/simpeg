<!-- Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="/pendidikan/create" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="pengguna_id" value="<?= session('id'); ?>">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Tambah <?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col mb-3">
                    <label for="nama" class="form-label">Nama Sekolah</label>
                    <input type="text" name="nama" id="nama" class="form-control"
                        placeholder="Masukkan Nama Sekolah"> 
                </div>
            </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="tingkatan" class="form-label">Tingkat Pendidikan</label>
                        <select name="tingkatan" id="tingkatan" class="form-control">
                            <option value="TK">TK</option>
                            <option value="SD">SD / Sederajat</option>
                            <option value="SMP">SMP / Sederajat</option>
                            <option value="SMA">SMA / Sederajat</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="masuk" class="form-label">Tahun Masuk</label>
                        <select name="masuk" id="masuk" class="form-control">
                            <?php for ($i= date('Y'); $i >= 1900; $i--) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php }?>
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