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
            <?= $this->include('berkas/create'); ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTables" width="100%" cellspacing="0">
                <thead class="text-center mt-2">
                    <tr>
                        <th>No</th>
                        <th>Nama Berkas</th>
                        <th>Preview</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listBerkas as $key => $berkas) :?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $berkas['keterangan']; ?></td>
                        <td><img src="/berkas/<?= $berkas['nama'] ?>" alt="" height="50px"></td>
                        <td>
                            <a href="/berkas/<?= $berkas['nama']?>" class="btn btn-sm btn-primary"><i class="bx bx-download"></i> Download</a>

                            <button class="btn btn-success btn-sm ml-4" data-bs-toggle="modal" data-bs-target="#editModal_<?= $berkas['id'] ?>">
                            <i class="bx bx-edit"></i> Edit
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="editModal_<?= $berkas['id']?>" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content" action="/berkas/edit/<?= $berkas['id'] ?>" method="POST" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="pengguna_id" value="<?= session('id'); ?>">
                                        <input type="hidden" name="edit_berkas" value="<?= $berkas['nama']?>">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Edit <?= $title; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                    <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Keterangan Berkas" value="<?= $berkas['keterangan'] ?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="berkas" class="form-label">Upload Berkas</label>
                                                    <input type="file" name="berkas" id="berkas" class="form-control">
                                                    <small class="text-danger">* Upload file hanya jika ingin mengubah file</small> 
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

                            <!-- Delete keluarga -->
                            <button class="btn btn-danger btn-sm mr-4" data-bs-toggle="modal" data-bs-target="#deleteModal_<?= $berkas['id']?>"><i class="bx bx-trash"></i> Hapus</button>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal_<?=$berkas['id']?>" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content" action="/berkas/delete/<?= $berkas['id']?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="delete_berkas" value="<?= $berkas['nama'] ?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Konfirmasi Hapus <?= $title; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda Yakin Ingin Menghapus Berkas?</p>
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