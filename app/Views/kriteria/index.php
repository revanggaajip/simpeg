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
            <?= $this->include('kriteria/create'); ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTables" width="100%" cellspacing="0">
                <thead class="text-center mt-2">
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Bobot</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listKriteria as $key => $kriteria) :?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $kriteria['id']; ?></td>
                        <td><?= $kriteria['nama']; ?></td>
                        <td><?= $kriteria['bobot']; ?></td>
                        <td><?= $kriteria['status']; ?></td>
                        <td>
                            <!-- Button Edit -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editModal-<?= $kriteria['id']; ?>">
                                <i class="bx bx-edit"></i> Edit
                            </button>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal-<?= $kriteria['id']; ?>" data-bs-backdrop="static"
                                tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content"
                                        action="<?= route_to('kriteria.update', $kriteria['id']); ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Edit Kriteria</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="id">
                                                <div class="col mb-3">
                                                    <label for="id" class="form-label">Id Kriteria</label>
                                                    <input type="text" id="id" name="id" class="form-control"
                                                        placeholder="Masukkan Id Kategori"
                                                        value="<?= $kriteria['id']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nama" class="form-label">Nama Kriteria</label>
                                                    <input type="text" name="nama" id="nama_kriteria"
                                                        class="form-control" placeholder="Masukkan Nama Kategori"
                                                        value="<?= $kriteria['nama']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="bobot" class="form-label">Bobot Kriteria</label>
                                                    <input type="number" name="bobot" id="number_kriteria"
                                                        class="form-control" placeholder="Masukkan Bobot Kategori"
                                                        value="<?= $kriteria['bobot']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="status" class="form-label">Status Kriteria</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="" disabled>Pilih Status Kriteria
                                                        </option>
                                                        <option value="benefit"
                                                            <?= $kriteria['status'] == 'benefit' ? 'selected' : null; ?>>
                                                            Benefit</option>
                                                        <option value="cost"
                                                            <?= $kriteria['status'] == 'cost' ? 'selected' : null; ?>>
                                                            Cost</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-outline-danger"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x-circle"></i> Batal
                                            </button>
                                            <button type="submit" class="btn btn-success"><i
                                                    class="bx bx-check-circle"></i> Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Button Delete -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-<?= $kriteria['id']; ?>">
                                <i class="bx bx-trash"></i> Hapus
                            </button>

                            <!-- Modal Delete-->
                            <div class="modal fade" id="deleteModal-<?= $kriteria['id']; ?>" data-bs-backdrop="static"
                                tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content"
                                        action="<?= route_to('kriteria.delete', $kriteria['id']); ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Hapus Kriteria</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin untuk menghapus kriteria <?= $kriteria['nama']; ?></p>
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