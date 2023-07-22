<!-- Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form class="modal-content" action="<?= route_to('.store'); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Tambah <?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan Nip ">
                    </div>
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama "
                            onkeyup="uppercaseFormat()">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="row">
                            <div class="col">
                                <div class="form-check mt-1">
                                    <input name="jenis_kelamin" class="form-check-input" type="radio" value="Laki-laki"
                                        id="Laki-laki">
                                    <label class="form-check-label" for="Laki-laki">
                                        Laki-laki
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check mt-1">
                                    <input name="jenis_kelamin" class="form-check-input" type="radio" value="Perempuan"
                                        id="Perempuan">
                                    <label class="form-check-label" for="Perempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Agama</label>
                        <select id="defaultSelect" class="form-select">
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katolik">Katolik</option>
                            <option value="hindu">hindu</option>
                            <option value="buddha">buddha</option>
                            <option value="konguchu">konguchu</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                            placeholder="Masukkan Tempat Lahir">
                    </div>
                    <div class="col mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                            placeholder="Masukkan Tanggal Lahir">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control"
                            placeholder="Masukkan Jabatan">
                    </div>
                    <div class="col mb-3">
                        <label for="mulai_kerja" class="form-label">Mulai Kerja</label>
                        <input type="date" name="mulai_kerja" id="mulai_kerja" class="form-control"
                            placeholder="Masukkan Mulai Kerja">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="gaji" class="form-label">Gaji</label>
                        <input type="text" name="gaji" id="gaji" class="form-control" placeholder="Masukkan Gaji">
                    </div>
                    <div class="col mb-3">
                        <label for="mulai_kerja" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Masukkan Password">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="konfirmasi_password" class="form-label">Konfirmasi Password </label>
                        <input type="password" name="konfirmasi_password" id="konfirmasi_password_" class="form-control"
                            placeholder="Masukkan Konfirmasi Password ">
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
    let value = $('#nama_').val().toUpperCase();
    $('#nama_').val(value);
}
</script>
<?= $this->endSection(); ?>