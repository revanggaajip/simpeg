<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header mb-3">
        <h4 class="my-auto">Tambah <?= $title; ?></h4>
    </div>
    <div class="card-body">
        <form action="<?= route_to('pendaftar.store'); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col mb-3">
                    <label for="nik" class="form-label">NIK Pendaftar</label>
                    <input type="text" name="nik" id="nik_pendaftar"
                        class="form-control <?= $validation->hasError('nik') ? 'is-invalid': null ?>"
                        placeholder="Masukkan NIK Pendaftar" value="<?= old('nik'); ?>">
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
                        placeholder="Masukkan Nama Pendaftar" onkeyup="uppercaseFormat()" value="<?= old('nama'); ?>">
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
                        <?= old('alamat'); ?>
                    </textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
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