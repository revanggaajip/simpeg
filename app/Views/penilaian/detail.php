<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between mb-3">
        <h4 class="my-auto">Detail <?= $title; ?> (<?= $pendaftar['nama']; ?>)</h4>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="bx bx-plus-circle"></i> Input Nilai
        </button>
        <!-- Modal -->
        <div class="modal fade" id="createModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="<?= route_to('penilaian.store', $pendaftar['id']); ?>"
                    method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="backDropModalTitle">Tambah <?= $title; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="id_kriteria" class="form-label">Nama Kriteria</label>
                                <select name="id_kriteria" id="id_kriteria" class="form-control">
                                    <?php foreach($unSelected as $kriteria) : ?>
                                    <option value="<?= $kriteria['id']; ?>"><?= $kriteria['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nilai" class="form-label">Nilai Kriteria</label>
                                <input type="number" name="nilai_kriteria" id="nilai_kriteria" class="form-control"
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
                        <th>Nama Kriteria</th>
                        <th>Nilai Kriteria</th>
                        <th width="18%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listKriteria as $key => $kriteria) :?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $kriteria['nama']; ?></td>
                        <td>
                            <?php foreach($listPenilaian as $penilaian) : ?>
                            <?= $penilaian['id_kriteria'] == $kriteria['id'] ?  $penilaian['nilai_kriteria'] : null?>
                            <?php endforeach ?>
                        </td>
                        <td>
                            <?php foreach($listPenilaian as $penilaian) : ?>
                            <?php if($penilaian['id_kriteria'] == $kriteria['id']) :?>
                            <!-- Button Edit -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editModal-<?= $penilaian['id']; ?>">
                                <i class="bx bx-edit"></i> Edit
                            </button>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal-<?= $penilaian['id']; ?>" data-bs-backdrop="static"
                                tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content"
                                        action="<?= route_to('penilaian.update', $penilaian['id']); ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Edit <?= $title; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nilai" class="form-label">Nilai Kriteria</label>
                                                    <input type="number" name="nilai_kriteria" id="nilai_kriteria"
                                                        class="form-control" placeholder="Masukkan Nilai Kriteria"
                                                        value="<?= $penilaian['nilai_kriteria']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-outline-danger"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x-circle"></i> Batal
                                            </button>
                                            <button type="submit" class="btn btn-success">
                                                <i class="bx bx-check-circle"></i> Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Button Delete -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-<?= $penilaian['id']; ?>">
                                <i class="bx bx-trash"></i> Hapus
                            </button>

                            <!-- Modal Delete-->
                            <div class="modal fade" id="deleteModal-<?= $penilaian['id']; ?>" data-bs-backdrop="static"
                                tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content"
                                        action="<?= route_to('penilaian.delete', $penilaian['id']); ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Hapus Penilaian</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin untuk menghapus penilaian <?= $kriteria['nama']; ?></p>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-outline-danger"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x-circle"></i> Batal
                                            </button>
                                            <button type="submit" class="btn btn-success">
                                                <i class="bx bx-trash"></i> Hapus
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <a href="<?= route_to('penilaian.index'); ?>" class="btn btn-danger btn-sm">
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