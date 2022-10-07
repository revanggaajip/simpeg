<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between mb-3">
        <h4 class="my-auto">Data <?= $title; ?></h4>
        <a href="<?= route_to('pendaftar.create'); ?>" class="btn btn-primary">
            <i class="bx bx-plus-circle"></i> Tambah
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTables" width="100%" cellspacing="0">
                <thead class="text-center mt-2">
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listPendaftar as $key => $pendaftar) :?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $pendaftar['nik']; ?></td>
                        <td><?= $pendaftar['nama']; ?></td>
                        <td><?= $pendaftar['alamat']; ?></td>
                        <td>
                            <!-- Button Detail -->
                            <a href="<?= route_to('pendaftar.detail', $pendaftar['id']); ?>"
                                class="btn btn-success btn-sm">
                                <i class="bx bx-menu"></i> Detail
                            </a>
                            <!-- Button Delete -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-<?= $pendaftar['id']; ?>">
                                <i class="bx bx-trash"></i> Hapus
                            </button>

                            <!-- Modal Delete-->
                            <div class="modal fade" id="deleteModal-<?= $pendaftar['id']; ?>" data-bs-backdrop="static"
                                tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content"
                                        action="<?= route_to('pendaftar.delete', $pendaftar['id']); ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Hapus pendaftar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin untuk menghapus pendaftar <?= $pendaftar['nama']; ?>
                                            </p>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-outline-danger"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x-circle"></i> Batal
                                            </button>
                                            <button type="submit" class="btn btn-success"><i class="bx bx-trash"></i>
                                                Hapus</button>
                                        </div>
                                    </form>
                                </div>
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