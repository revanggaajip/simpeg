<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header mb-3">
        <h4 class="my-auto"><?= $title; ?></h4>
    </div>
    <div class="card-body">
        <form action="<?= route_to('perhitungan.store'); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col mb-3">
                    <label for="nama" class="form-label">Nama Program / Bantuan</label>
                    <input type="text" name="nama" id="nama"
                        class="form-control <?= $validation->hasError('nama') ? 'is-invalid': null ?>"
                        placeholder="Masukkan Program / Bantuan" value="<?= old('nama'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="kuota" class="form-label">Jumlah Kuota / Penerima</label>
                    <input type="number" name="kuota" id="kuota"
                        class="form-control <?= $validation->hasError('kuota') ? 'is-invalid': null ?>"
                        placeholder="Masukkan Jumlah Kuota / Penerima" value="<?= old('kuota'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('kuota'); ?>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="<?= route_to('dashboard.index'); ?>" class="btn btn-danger">
                    <i class="bx bx-x-circle"></i> Batal
                </a>
                <button type="submit" class="btn btn-success"><i class="bx bx-check-circle"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>