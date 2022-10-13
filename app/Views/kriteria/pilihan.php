<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between mb-3">
        <h4 class="my-auto">Pilihan <?= $title; ?> (<?= $kriteria['nama']; ?>)</h4>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bx bx-plus-circle"></i> Input Pilihan
        </button>
        <!-- Modal -->
        <div class="modal fade" id="createModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="<?= route_to('kriteria.pilihanStore', $kriteria['id']); ?>"
                    method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="backDropModalTitle">Tambah Pilihan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nama" class="form-label">Nama Pilihan</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Pilihan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="bobot" class="form-label">Bobot Pilihan</label>
                                <input type="number" name="bobot" id="bobot" class="form-control"
                                    placeholder="Masukkan Nilai Kriteria">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            <i class="bx bx-x-circle"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-success"><i class="bx bx-check-circle"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTables" width="100%" cellspacing="0">
                <thead class="text-center mt-2">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Pilihan</th>
                        <th>Bobot Pilihan</th>
                        <th width="18%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listPilihan as $key => $pilihan) :?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $pilihan['nama']; ?></td>
                        <td><?= $pilihan['bobot']; ?></td>
                        <td>
                            <!-- Button Edit -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editModal-<?= $pilihan['id']; ?>">
                                <i class="bx bx-edit"></i> Edit
                            </button>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal-<?= $pilihan['id']; ?>" data-bs-backdrop="static"
                                tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content"
                                        action="<?= route_to('kriteria.pilihanUpdate', $pilihan['id']); ?>"
                                        method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="id_kriteria" value="<?= $kriteria['id'] ?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Edit Pilihan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nama" class="form-label">Nama Pilihan</label>
                                                    <input type="text" class="form-control" name="nama"
                                                        placeholder="Masukkan Nama Pilihan"
                                                        value="<?= $pilihan['nama']; ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="bobot" class="form-label">Bobot Pilihan</label>
                                                    <input type="number" name="bobot" id="bobot" class="form-control"
                                                        placeholder="Masukkan Nilai Kriteria"
                                                        value="<?= $pilihan['bobot']; ?>">
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
                                data-bs-target="#deleteModal-<?= $pilihan['id']; ?>">
                                <i class="bx bx-trash"></i> Hapus
                            </button>

                            <!-- Modal Delete-->
                            <div class="modal fade" id="deleteModal-<?= $pilihan['id']; ?>" data-bs-backdrop="static"
                                tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content"
                                        action="<?= route_to('kriteria.pilihanDelete', $pilihan['id']); ?>"
                                        method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id_kriteria" value="<?= $pilihan['id_kriteria'] ?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Hapus Kriteria</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin untuk menghapus pilihan kriteria
                                                <?= $pilihan['nama']; ?></p>
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
    <div class="card-footer">
        <a href="<?= route_to('kriteria.index'); ?>" class="btn btn-danger btn-sm">
            <i class="bx bx-chevron-left"></i>
            Kembali
        </a>
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