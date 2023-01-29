<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header mb-3 d-flex justify-content-between">
        <h4 class="my-auto">Data <?= $title; ?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTables" width="100%" cellspacing="0">
                <thead class="text-center mt-2">
                    <tr>
                        <th width="5%">No</th>
                        <th>ID</th>
                        <th width="25">NIK</th>
                        <th>Nama</th>
                        <th width="15%">Keterangan</th>
                        <th width="18%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listPendaftar as $key => $pendaftar) :?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td>A-<?= $pendaftar['id']; ?></td>
                        <td><?= $pendaftar['nik']; ?></td>
                        <td><?= $pendaftar['nama']; ?></td>
                        <td>
                            <?php if($pendaftar['penilaian'] < $jumlahKriteria) : ?>
                            <span class="badge rounded-pill bg-label-secondary">Tidak Lengkap</span>
                            <?php else : ?>
                            <span class="badge rounded-pill bg-label-primary">Lengkap</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <!-- Button Detail -->
                            <a href="<?= route_to('penilaian.detail', $pendaftar['id']); ?>"
                                class="btn btn-primary btn-sm">
                                <i class="bx bx-detail"></i> Detail
                            </a>
                        </td>
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