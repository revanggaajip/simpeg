<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
    <h4>Data <?= $title; ?></h4>
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
                        <td><?= $pengguna['role']; ?></td>
                        <td>
                            <?php if ($pengguna['status'] == 'Aktif') { ?>
                            <span class="badge bg-success">Aktif</span>
                            <?php } else { ?>
                            <span class="badge bg-danger">Tidak Aktif</span>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="/gaji/detail/<?= $pengguna['id'] ?>" class="btn btn-info btn-sm">
                                <i class="bx bx-info-circle"></i> Detail
                            </a>
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
const uppercaseFormatEdit = () => {
    let value = $('#edit_nama_pengguna').val().toUpperCase();
    $('#edit_nama_pengguna').val(value);
}

let onClickDetail = (id) => {
    document.location.href = `/pengguna/detail/${id}`
}
</script>
<?= $this->endSection(); ?>