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
            <?= $this->include('pengguna/create'); ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTables" width="100%" cellspacing="0">
                <thead class="text-center mt-2">
                    <tr>
                        <th>No</th>
                        <th>Nip</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listPengguna as $key => $pengguna) :?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $pengguna['nip']; ?></td>
                        <td><?= $pengguna['nama']; ?></td>
                        <td><?= $pengguna['jenis_kelamin']; ?></td>
                        <td><?= $pengguna['jabatan']; ?></td>
                        <td><?= $pengguna['role']; ?></td>
                        <td>
                            <?php if ($pengguna['status'] == 'Aktif') { ?>
                            <span class="badge bg-success">Aktif</span>
                            <?php } else { ?>
                            <span class="badge bg-danger">Tidak Aktif</span>
                            <?php } ?>
                        </td>
                        <td>
                            <!-- Button Edit -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editModal-<?= $pengguna['id']; ?>">
                                <i class="bx bx-edit"></i> Edit
                            </button>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal-<?= $pengguna['id']; ?>" data-bs-backdrop="static"
                                tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content"
                                        action="<?= route_to('pengguna.update', $pengguna['id']); ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="password" value="<?= $pengguna['password']; ?>">
                                        <input type="hidden" name="role" value="<?= $pengguna['role']; ?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Edit Pengguna</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="edit_nama_pengguna" class="form-label">
                                                        Nama Pengguna
                                                    </label>
                                                    <input type="text" name="nama" id="edit_nama_pengguna"
                                                        class="form-control" placeholder="Masukkan Nama Pengguna"
                                                        value="<?= $pengguna['nama']; ?>"
                                                        onkeyup="uppercaseFormatEdit()">
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
                                data-bs-target="#deleteModal-<?= $pengguna['id']; ?>">
                                <i class="bx bx-trash"></i> Hapus
                            </button>

                            <!-- Modal Delete-->
                            <div class="modal fade" id="deleteModal-<?= $pengguna['id']; ?>" data-bs-backdrop="static"
                                tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content"
                                        action="<?= route_to('pengguna.delete', $pengguna['id']); ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Hapus Pengguna</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin untuk menghapus Pengguna
                                                <?= $pengguna['nama']; ?></p>
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
const uppercaseFormatEdit = () => {
    let value = $('#edit_nama_pengguna').val().toUpperCase();
    $('#edit_nama_pengguna').val(value);
}
</script>
<?= $this->endSection(); ?>