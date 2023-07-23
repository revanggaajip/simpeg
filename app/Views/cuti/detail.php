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
                                <!-- Edit Cuti -->
                                <button class="btn btn-success btn-sm ml-4" data-bs-toggle="modal" data-bs-target="#editModal_<?= $cuti['id'] ?>"><i class="bx bx-edit"></i> Edit</button>
                                <!-- Modal -->
                                <div class="modal fade" id="editModal_<?= $cuti['id']?>" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form class="modal-content" action="/cuti/edit/<?= $cuti['id'] ?>" method="POST">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="pengguna_id" value="<?= session('id'); ?>">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="backDropModalTitle">Edit <?= $title; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="mulai" class="form-label">Mulai Cuti</label>
                                                        <input type="date" name="mulai" id="mulai" class="form-control"
                                                            placeholder="Masukkan Tanggal Awal Cuti" value="<?= $cuti['mulai']?>">
                                                    </div>
                                                    <div class="col mb-3">
                                                        <label for="akhir" class="form-label">Akhir Cuti</label>
                                                        <input type="date" name="akhir" id="akhir" class="form-control" placeholder="Masukkan Tanggal Akhir Cuti" value="<?= $cuti['akhir'] ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="alasan" class="form-label">Alasan Cuti</label>
                                                        <input type="text" name="alasan" id="alasan" class="form-control"
                                                            placeholder="Masukkan Alasan Cuti" value="<?= $cuti['alasan']?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between">
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                                    <i class="bx bx-x-circle"></i> Batal
                                                </button>
                                                <button type="submit" class="btn btn-success"><i class="bx bx-check-circle"></i> Simpan</button>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                                
                                <!-- Delete Cuti -->
                                <button class="btn btn-danger btn-sm mr-4" data-bs-toggle="modal" data-bs-target="#deleteModal_<?= $cuti['id']?>"><i class="bx bx-trash"></i> Hapus</button>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal_<?=$cuti['id']?>" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form class="modal-content" action="/cuti/delete/<?= $cuti['id']?>" method="POST">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="pengguna_id" value="<?= session('id'); ?>">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="backDropModalTitle">Konfirmasi Hapus <?= $title; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda Yakin Ingin menghapus Pengajuan Cuti?</p>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between">
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                                    <i class="bx bx-x-circle"></i> Batal
                                                </button>
                                                <button type="submit" class="btn btn-success"><i class="bx bx-trash"></i> Hapus</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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