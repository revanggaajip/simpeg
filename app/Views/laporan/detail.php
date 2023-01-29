<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between mb-3">
        <h4 class="my-auto">Data <?= $title; ?></h4>
        <a href="<?= route_to('laporan.print', $seleksiHeader['id']); ?>" class="btn btn-primary">
            <i class="bx bx-printer"></i> Cetak
        </a>
    </div>
    <div class="card-body">
        <p>Nama Program : <?= $seleksiHeader['nama']; ?></p>
        <p>Jumlah Kuota : <?= $seleksiHeader['kuota']; ?></p>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-primary">
                        <td class="text-white">Alternatif</td>
                        <td class="text-white">Nama</td>
                        <td class="text-white">Nilai</td>
                        <td class="text-white">Penerima</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($seleksiDetail as $key => $seleksi) : ?>
                    <tr>
                        <td>V-<?= $seleksi['id_pendaftar']; ?></td>
                        <td><?= $seleksi['nama']; ?></td>
                        <td><?= number_format($seleksi['nilai'], 3); ?></td>
                        <td><?= $seleksi['penerima'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('styles'); ?>
<link rel="stylesheet" href="<?= base_url('vendor/libs/datatables/jquery.dataTables.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script src="<?= base_url('vendor/libs/datatables/jquery.dataTables.min.js'); ?>"></script>
<script>
$(document).ready(function() {
    $('#dataTables').DataTable();
});
</script>
<?= $this->endSection(); ?>