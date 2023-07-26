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
            <?= $this->include('pendidikan/create'); ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTables" width="100%" cellspacing="0">
                <thead class="text-center mt-2">
                    <tr>
                        <th>No</th>
                        <th>Nama Sekolah</th>
                        <th>Tingkat Pendidikan</th>
                        <th>Masa Sekolah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listPendidikan as $key => $pendidikan) :?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $pendidikan['nama']; ?></td>
                        <td><?= $pendidikan['tingkatan'] ?></td>
                        <td><?= $pendidikan['masuk'] ?> - <?= $pendidikan['lulus'] ?></td>
                        <td>
                            <button class="btn btn-success btn-sm ml-4" data-bs-toggle="modal" data-bs-target="#editModal_<?= $pendidikan['id'] ?>"><i class="bx bx-edit"></i> Edit</button>

                            <!-- Modal -->
                            <div class="modal fade" id="editModal_<?= $pendidikan['id']?>" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content" action="/pendidikan/edit/<?= $pendidikan['id'] ?>" method="POST">
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
                                                <label for="nama" class="form-label">Nama Sekolah</label>
                                                <input type="text" name="nama" id="nama" class="form-control"
                                                    placeholder="Masukkan Nama Sekolah" value="<?= $pendidikan['nama'] ?>"> 
                                            </div>
                                        </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="tingkatan" class="form-label">Tingkat Pendidikan</label>
                                                    <select name="tingkatan" id="tingkatan" class="form-control">
                                                        <option value="TK" <?= $pendidikan['tingkatan'] == 'TK' ? 'selected' : null ?>>TK</option>
                                                        <option value="SD" <?= $pendidikan['tingkatan'] == 'SD' ? 'selected' : null ?>>SD / Sederajat</option>
                                                        <option value="SMP" <?= $pendidikan['tingkatan'] == 'SMP' ? 'selected' : null ?>>SMP / Sederajat</option>
                                                        <option value="SMA" <?= $pendidikan['tingkatan'] == 'SMA' ? 'selected' : null ?>>SMA / Sederajat</option>
                                                        <option value="D1" <?= $pendidikan['tingkatan'] == 'D1' ? 'selected' : null ?>>D1</option>
                                                        <option value="D2" <?= $pendidikan['tingkatan'] == 'D2' ? 'selected' : null ?>>D2</option>
                                                        <option value="D3" <?= $pendidikan['tingkatan'] == 'D3' ? 'selected' : null ?>>D3</option>
                                                        <option value="D4" <?= $pendidikan['tingkatan'] == 'D4' ? 'selected' : null ?>>D4</option>
                                                        <option value="S1" <?= $pendidikan['tingkatan'] == 'S1' ? 'selected' : null ?>>S1</option>
                                                        <option value="S2" <?= $pendidikan['tingkatan'] == 'S2' ? 'selected' : null ?>>S2</option>
                                                        <option value="S3" <?= $pendidikan['tingkatan'] == 'S3' ? 'selected' : null ?>>S3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="masuk" class="form-label">Tahun Masuk</label>
                                                    <select name="masuk" id="masuk" class="form-control">
                                                        <?php for ($i= date('Y'); $i >= 1950; $i--) { ?>
                                                            <option value="<?= $i ?>" <?= $i == $pendidikan['masuk'] ? 'selected' : null ?>><?= $i ?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col mb-3">
                                                    <label for="lulus" class="form-label">Tahun Lulus</label>
                                                    <select name="lulus" id="lulus" class="form-control">
                                                        <?php for ($i= date('Y'); $i >= 1900; $i--) { ?>
                                                            <option value="<?= $i ?>" <?= $i == $pendidikan['lulus'] ? 'selected' : null ?>><?= $i ?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                                <i class="bx bx-x-circle"></i> Batal
                                            </button>
                                            <button type="submit" class="btn btn-success"><i class="bx bx-check-circle"></i> Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                                
                            <!-- Delete pendidikan -->
                            <button class="btn btn-danger btn-sm mr-4" data-bs-toggle="modal" data-bs-target="#deleteModal_<?= $pendidikan['id']?>"><i class="bx bx-trash"></i> Hapus</button>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal_<?=$pendidikan['id']?>" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content" action="/pendidikan/delete/<?= $pendidikan['id']?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Konfirmasi Hapus <?= $title; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda Yakin Ingin Menghapus Pendidikan?</p>
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