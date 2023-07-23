<!-- Modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form class="modal-content" action="/pengguna/edit/<?= $pengguna['id']; ?>" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="password" value="<?= $pengguna['password']; ?>">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Edit <?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control" placeholder="Masukkan Nip"
                            value="<?= $pengguna['nip']; ?>">
                    </div>
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama"
                            value="<?= $pengguna['nama']; ?>" onkeyup="uppercaseFormat()">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukkan NIK"
                            value="<?= $pengguna['nik']; ?>">
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="row">
                            <div class="col">
                                <div class="form-check mt-1">
                                    <input name="jenis_kelamin" class="form-check-input" type="radio" value="Laki-laki"
                                        id="Laki-laki"
                                        <?= $pengguna['jenis_kelamin'] == "Laki-laki" ? 'checked' : null ?>>
                                    <label class="form-check-label" for="Laki-laki">
                                        Laki-laki
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check mt-1">
                                    <input name="jenis_kelamin" class="form-check-input" type="radio" value="Perempuan"
                                        id="Perempuan"
                                        <?= $pengguna['jenis_kelamin'] == "Perempuan" ? 'checked' : null ?>>
                                    <label class="form-check-label" for="Perempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                            placeholder="Masukkan Tempat Lahir" value="<?= $pengguna['tempat_lahir']; ?>">
                    </div>
                    <div class="col mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                            placeholder="Masukkan Tanggal Lahir" value="<?= $pengguna['tanggal_lahir'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Agama</label>
                        <select id="defaultSelect" name="agama" class="form-select">
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katolik">Katolik</option>
                            <option value="hindu">hindu</option>
                            <option value="buddha">buddha</option>
                            <option value="konguchu">konguchu</option>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="npwp" class="form-label">NPWP</label>
                        <input type="text" name="npwp" id="npwp" class="form-control" placeholder="Masukkan NPWP"
                            value="<?= $pengguna['npwp']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control"
                            placeholder="Masukkan Jabatan" value="<?= $pengguna['jabatan']; ?>">
                    </div>
                    <div class="col mb-3">
                        <label for="mulai_kerja" class="form-label">Mulai Kerja</label>
                        <input type="date" name="mulai_kerja" id="mulai_kerja" class="form-control"
                            placeholder="Masukkan Mulai Kerja" value="<?= $pengguna['mulai_kerja']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="gaji" class="form-label">Gaji</label>
                        <input type="text" name="gaji" id="gaji" class="form-control" placeholder="Masukkan Gaji"
                            value="<?= $pengguna['gaji']; ?>">
                    </div>
                    <div class="col mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="defaultSelect" class="form-select">
                            <option value="admin" <?= $pengguna['role'] == 'Admin' ? 'selected' : null; ?>>Admin
                            </option>
                            <option value="pegawai" <?= $pengguna['role'] == 'Pegawai' ? 'selected' : null; ?>>Pegawai
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="alamat" class="form-label">Alamat</label>
                        <Textarea class="form-control" placeholder="Masukkan Alamat" rows="2"
                            name="alamat"><?= $pengguna['alamat']; ?></Textarea>
                    </div>
                </div>
                <div class="col mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="defaultSelect" class="form-select">
                        <option value="Aktif" <?= $pengguna['status'] == 'Aktif' ? 'selected' : null; ?>>Aktif
                        </option>
                        <option value="Tidak Aktif" <?= $pengguna['status'] == 'Tidak Aktif' ? 'selected' : null; ?>>
                            Tidak
                            Aktif
                        </option>
                    </select>
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