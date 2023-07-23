<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between mb-3">
        <h4 class="my-auto">Data <?= $title; ?></h4>
        <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="bx bx-plus-circle"></i> Tambah
            </button>
            <?= $this->include('cuti/create'); ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTables" width="100%" cellspacing="0">
                <thead class="text-center mt-2">
                    <tr>
                        <th>No</th>
                        <th>Mulai Cuti</th>
                        <th>Akhir Cuti</th>
                        <th>Alasan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listCuti as $key => $cuti) :?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= date('d-m-Y',strtotime($cuti['mulai'])); ?></td>
                        <td><?= date('d-m-Y',strtotime($cuti['akhir'])); ?></td>
                        <td><?= $cuti['alasan']; ?></td>
                        <td>
                            <?php if ($cuti['status'] == 'proses') { ?>
                            <span class="badge bg-warning">Proses</span>
                            <?php } else if($cuti['status'] == 'disetujui'){ ?>
                            <span class="badge bg-success">Disetujui</span>
                            <?php } else { ?>
                            <span class="badge bg-danger">Ditolak</span>
                            <?php }?>
                        </td>
                        <td>
                            <?php if ($cuti['status'] == 'proses') { ?>

                            <?php }?>
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
<link rel="stylesheet" href="<?= base_url('library/libs/datatables/jquery.dataTables.min.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script src="<?= base_url('library/libs/datatables/jquery.dataTables.min.js'); ?>"></script>
<script>
$(document).ready(function() {
    $('#dataTables').DataTable();
});
</script>
<?= $this->endSection(); ?>