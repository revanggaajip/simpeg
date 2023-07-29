<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between mb-3">
        <h4 class="my-auto"><?= $title; ?></h4>
        <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="bx bx-plus-circle"></i> Tambah
            </button>
            <?= $this->include('gaji/create'); ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="dataTables" width="100%" cellspacing="0">
                <thead class="text-center mt-2">
                    <tr>
                        <th>No</th>
                        <th>Periode</th>
                        <th>Gaji Pokok</th>
                        <th>Potongan</th>
                        <th>Tunjangan</th>
                        <th>Total</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listGaji as $key => $gaji) :?>
                    <tr>
                        <td><?= $key + 1; ?></td>
                        <td><?= $gaji['periode']; ?></td>
                        <td><?= $gaji['gapok']; ?></td>
                        <td><?= $gaji['potongan']; ?></td>
                        <td><?= $gaji['tunjangan']; ?></td>
                        <td><?= $gaji['total']; ?></td>
                        <td><?= $gaji['keterangan']; ?></td>
                        <td>
                        <button class="btn btn-success btn-sm ml-4" data-bs-toggle="modal" data-bs-target="#editModal_<?= $gaji['id'] ?>"><i class="bx bx-edit"></i> Edit</button>
                            <!-- Modal -->
                            <div class="modal fade" id="editModal_<?= $gaji['id']?>" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content" action="/gaji/edit/<?= $gaji['id'] ?>" method="POST">
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
                    <label for="periode" class="form-label">Periode Gaji</label>
                    <input type="month" name="periode" id="edit_periode" class="form-control"
                        placeholder="Masukkan Periode" value="<?= $gaji['periode'] ?>"> 
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="gapok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="gapok" id="edit_gapok" class="form-control" onchange="editTotalGaji()"
                        placeholder="Masukkan Gaji pokok" value="<?= $gaji['gapok']?>"> 
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="potongan" class="form-label">Potongan</label>
                    <input type="number" name="potongan" id="edit_potongan" class="form-control" onchange="editTotalGaji()"
                        placeholder="Masukkan Potongan" value="<?= $gaji['potongan'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="tunjangan" class="form-label">Tunjangan</label>
                    <input type="number" name="tunjangan" id="edit_tunjangan" class="form-control" onchange="editTotalGaji()"
                        placeholder="Masukkan Tunjangan" value="<?= $gaji['tunjangan'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="number" name="total" id="edit_total" class="form-control" value="<?=$gaji['total']?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" id="edit_keterangan" cols="30" rows="3"><?= $gaji['keterangan'] ?></textarea>                </div>
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
                            <button class="btn btn-danger btn-sm mr-4" data-bs-toggle="modal" data-bs-target="#deleteModal_<?= $gaji['id']?>"><i class="bx bx-trash"></i> Hapus</button>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal_<?=$gaji['id']?>" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="modal-content" action="/gaji/delete/<?= $gaji['id']?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="backDropModalTitle">Konfirmasi Hapus <?= $title; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda Yakin Ingin Menghapus Riwayat Gaji?</p>
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

function editTotalGaji() {
                let gapok = document.getElementById('edit_gapok').value
                let potongan = document.getElementById('edit_potongan').value
                let tunjangan = document.getElementById('edit_tunjangan').value
                let total = document.getElementById('edit_total')

                total.value = parseInt(gapok) - parseInt(potongan) + parseInt(tunjangan);
        }
</script>
<?= $this->endSection(); ?>