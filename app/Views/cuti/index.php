<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header mb-3">
        <h4 class="my-auto">Data <?= $title; ?></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTables" width="100%" cellspacing="0">
                <thead class="text-center mt-2">
                    <tr>
                        <th>No</th>
                        <th>Mulai Cuti</th>
                        <th>Akhir Cuti</th>
                        <th>Nama Pegawai</th>
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
                        <td><?= $cuti['nama'] ?></td>
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
                            <!-- Setujui Cuti -->
                            <button class="btn btn-success btn-sm mr-4" data-bs-toggle="modal" data-bs-target="#setujuiModal_<?= $cuti['id']?>"><i class="bx bx-check-circle"></i> Setujui</button>
                            <!-- Modal -->
                            <div class="modal fade" id="setujuiModal_<?=$cuti['id']?>" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content" action="/cuti/setujui/<?= $cuti['id']?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="pengguna_id" value="<?= session('id'); ?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Setujui <?= $title; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda Yakin Ingin Menyetujui Pengajuan Cuti?</p>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                                <i class="bx bx-arrow-back"></i> Batal
                                            </button>
                                            <button type="submit" class="btn btn-success"><i class="bx bx-check"></i> Ya</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Tolak Cuti -->
                            <button class="btn btn-danger btn-sm mr-4" data-bs-toggle="modal" data-bs-target="#tolakModal_<?= $cuti['id']?>"><i class="bx bx-x-circle"></i> Tolak</button>
                            <!-- Modal -->
                            <div class="modal fade" id="tolakModal_<?=$cuti['id']?>" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content" action="/cuti/tolak/<?= $cuti['id']?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="pengguna_id" value="<?= session('id'); ?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Konfirmasi Tolak <?= $title; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda Yakin Ingin Menolak Pengajuan Cuti?</p>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                                <i class="bx bx-arrow-back"></i> Kembali
                                            </button>
                                            <button type="submit" class="btn btn-success"><i class="bx bx-check"></i> Ya</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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