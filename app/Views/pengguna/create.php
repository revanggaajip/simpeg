<!-- Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="<?= route_to('pengguna.store'); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Tambah <?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Nama Pengguna</label>
                        <input type="text" name="nama" id="nama_pengguna" class="form-control"
                            placeholder="Masukkan Nama Pengguna" onkeyup="uppercaseFormat()">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="email" class="form-label">Email Pengguna</label>
                        <input type="email" name="email" id="email_pengguna" class="form-control"
                            placeholder="Masukkan Email Pengguna">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="password" class="form-label">Password Pengguna</label>
                        <input type="password" name="password" id="password_pengguna" class="form-control"
                            placeholder="Masukkan Password Pengguna">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="konfirmasi_password" class="form-label">Konfirmasi Password Pengguna</label>
                        <input type="password" name="konfirmasi_password" id="konfirmasi_password_pengguna"
                            class="form-control" placeholder="Masukkan Konfirmasi Password Pengguna">
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

<?= $this->section('scripts'); ?>
<script>
const uppercaseFormat = () => {
    let value = $('#nama_pengguna').val().toUpperCase();
    $('#nama_pengguna').val(value);
}
</script>
<?= $this->endSection(); ?>