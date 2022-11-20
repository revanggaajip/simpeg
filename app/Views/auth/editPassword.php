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
        <form action="<?= route_to('password.update'); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col mb-3">
                    <label for="password_lama" class="form-label">Password Lama</label>
                    <input type="password" name="password_lama" id="password_lama" class="form-control"
                        placeholder="Masukkan Password Lama" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="password_baru" class="form-label">Password Baru</label>
                    <input type="password" name="password_baru" id="password_baru" class="form-control"
                        placeholder="Masukkan Password Baru" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="konfirm_password" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="konfirm_password" id="konfirm_password" class="form-control"
                        placeholder="Masukkan Konfirmasi Password" required>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a href="<?= route_to('dashboard.index'); ?>" class="btn btn-danger">
                    <i class="bx bx-x-circle"></i> Batal
                </a>
                <button type="submit" class="btn btn-success"><i class="bx bx-check-circle"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>