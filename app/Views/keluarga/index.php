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
            <?= $this->include('keluarga/create'); ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTables" width="100%" cellspacing="0">
                <thead class="text-center mt-2">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Hubungan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listKeluarga as $key => $keluarga) :?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $keluarga['nama']; ?></td>
                        <td><?= date('d M Y',strtotime($keluarga['tanggal_lahir'])); ?></td>
                        <td>
                            <button class="btn btn-success btn-sm ml-4" data-bs-toggle="modal" data-bs-target="#editModal_<?= $keluarga['id'] ?>"><i class="bx bx-edit"></i> Edit</button>
                            <!-- Modal -->
                            <div class="modal fade" id="editModal_<?= $keluarga['id']?>" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content" action="/keluarga/edit/<?= $keluarga['id'] ?>" method="POST">
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
                                                    <label for="nama" class="form-label">Nama Anggota Keluarga</label>
                                                    <input type="text" name="nama" id="nama" class="form-control"
                                                        placeholder="Masukkan Nama Keluarga" value="<?= $keluarga['nama'] ?>"> 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="awal" class="form-label">Tanggal Lahir</label>
                                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                                        placeholder="Masukkan Tanggal Lahir Keluarga" value="<?=$keluarga['tanggal_lahir']?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="hubungan" class="form-label">Hubungan</label>
                                                    <select name="hubungan" id="hubungan" class="form-control">
                                                        <option value="Orang Tua" <?= $keluarga['hubungan'] == 'Orang Tua' ? 'selected' : null ?>>Orang Tua</option>
                                                        <option value="Suami" <?= $keluarga['hubungan'] == 'Suami' ? 'selected' : null ?>>Suami</option>
                                                        <option value="Istri" <?= $keluarga['hubungan'] == 'Istri' ? 'selected' : null ?>>Istri</option>
                                                        <option value="Anak" <?= $keluarga['hubungan'] == 'Anak' ? 'selected' : null ?>>Anak</option>
                                                    </select>
                                                    
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
                                
                            <!-- Delete keluarga -->
                            <button class="btn btn-danger btn-sm mr-4" data-bs-toggle="modal" data-bs-target="#deleteModal_<?= $keluarga['id']?>"><i class="bx bx-trash"></i> Hapus</button>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal_<?=$keluarga['id']?>" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content" action="/keluarga/delete/<?= $keluarga['id']?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Konfirmasi Hapus <?= $title; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda Yakin Ingin Menghapus Keluarga?</p>
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
    // $('.year-picker').datepicker({
    //     changeYear: true,
    //     showButtonPanel: true,
    //     dateFormat: 'yy',
    // });
});
</script>
<?= $this->endSection(); ?>