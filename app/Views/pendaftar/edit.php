<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
Edit <?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header mb-3">
        <h4 class="my-auto">Edit <?= $title; ?></h4>
    </div>
    <div class="card-body">
        <form action="<?= route_to('pendaftar.update', $pendaftar['id']); ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col mb-3">
                    <label for="nik" class="form-label">NIK Pendaftar</label>
                    <input type="text" name="nik" id="nik_pendaftar"
                        class="form-control <?= $validation->hasError('nik') ? 'is-invalid': null ?>"
                        placeholder="Masukkan NIK Pendaftar" value="<?= old('nik') ?? $pendaftar['nik']?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nik'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="nama" class="form-label">Nama Pendaftar</label>
                    <input type="text" name="nama" id="nama_pendaftar"
                        class="form-control <?= $validation->hasError('nama') ? 'is-invalid': null ?>"
                        placeholder="Masukkan Nama Pendaftar" onkeyup="uppercaseFormat()"
                        value="<?= old('nama') ?? $pendaftar['nama']?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="alamat" class="form-label">Alamat Pendaftar</label>
                    <textarea name="alamat" id="alamat_pendaftar" rows="5"
                        class="form-control <?= $validation->hasError('alamat') ? 'is-invalid': null ?>"
                        placeholder="Masukkan Alamat Pendaftar">
                        <?= old('alamat') ?? $pendaftar['alamat']; ?>
                    </textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="status_pendaftar" class="form-label">Status Pendaftar</label>
                    <select name="status" id="status_pendaftar"
                        class="form-control <?= $validation->hasError('status') ? 'is-invalid': null ?>">
                        <option value="" disabled>Pilih Status Pendaftar</option>
                        <option value="aktif"
                            <?= (old('status') ?? $pendaftar['status']) == 'aktif' ? 'selected' : null; ?>>Aktif
                        </option>
                        <option value="tidak aktif"
                            <?= (old('status') ?? $pendaftar['status']) == 'tidak aktif' ? 'selected' : null; ?>>Tidak
                            Aktif</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('status'); ?>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a href="<?= route_to('pendaftar.index'); ?>" class="btn btn-danger">
                    <i class="bx bx-x-circle"></i> Batal
                </a>
                <button type="submit" class="btn btn-success"><i class="bx bx-check-circle"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
const uppercaseFormat = () => {
    let value = $('#nama_pendaftar').val().toUpperCase();
    $('#nama_pendaftar').val(value);
}
</script>
<?= $this->endSection(); ?>