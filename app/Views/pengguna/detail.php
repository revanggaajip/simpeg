<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between mb-3">
        <h4 class="my-auto"><?= $title; ?></h4>
    </div>
    <div class="card-body">
        <table width="100%">
            <tr>
                <td width="20%">NIP</td>
                <td width="1%">:</td>
                <td class="py-2"><?= $pengguna['nip']; ?></td>
            </tr>
            <tr>
                <td width="20%">NIK</td>
                <td width="1%">:</td>
                <td class="py-2"><?= $pengguna['nik']; ?></td>
            </tr>
            <tr>
                <td width="20%">Nama</td>
                <td width="1%">:</td>
                <td class="py-2"><?= $pengguna['nama']; ?></td>
            </tr>
            <tr>
                <td width="20%">Jenis Kelamin</td>
                <td width="1%">:</td>
                <td class="py-2"><?= $pengguna['jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <td width="20%">Tempat, Tanggal Lahir</td>
                <td width="1%">:</td>
                <td class="py-2"><?= $pengguna['tempat_lahir'] ?>,
                    <?= date('d-M-Y', strtotime($pengguna['tanggal_lahir'])) ?></td>
            </tr>
            <tr>
                <td width="20%">Umur</td>
                <td width="1%">:</td>
                <td class="py-2">
                    <?= (date_diff(date_create($pengguna['tanggal_lahir']), date_create(date('Y-m-d'))))->format('%y') ?>
                    Tahun</td>
            </tr>
            <tr>
                <td width="20%">Agama</td>
                <td width="1%">:</td>
                <td class="py-2"><?= $pengguna['agama'] ?></td>
            </tr>
            <tr>
                <td width="20%">Alamat</td>
                <td width="1%">:</td>
                <td class="py-2"><?= $pengguna['alamat'] ?></td>
            </tr>
            <tr>
                <td width="20%">Jabatan</td>
                <td width="1%">:</td>
                <td class="py-2"><?= $pengguna['jabatan'] ?></td>
            </tr>
            <tr>
                <td width="20%">Mulai Kerja</td>
                <td width="1%">:</td>
                <td class="py-2"><?= date('d-m-Y', strtotime($pengguna['mulai_kerja'])) ?></td>
            </tr>
            <tr>
                <td width="20%">Masa Kerja</td>
                <td width="1%">:</td>
                <td class="py-2">
                    <?= (date_diff(date_create($pengguna['tanggal_lahir']), date_create(date('Y-m-d'))))->format('%y') ?>
                    Tahun</td>
            </tr>
            <tr>
                <td width="20%">Gaji</td>
                <td width="1%">:</td>
                <td class="py-2">
                    Rp. <?= $pengguna['gaji']; ?>
                </td>
            </tr>
            <tr>
                <td width="20%">NPWP</td>
                <td width="1%">:</td>
                <td class="py-2">
                    <?= $pengguna['npwp']; ?>
                </td>
            </tr>
        </table>
    </div>
    <?php if (session('role') == 'admin') { ?>
    <div class="card-foot mx-4 mb-4">
        <div class="d-flex justify-content-between">
            <button class="btn btn-danger btn-sm"
                onclick="document.location.href = '<?= route_to('pengguna.index')?>'"><i class="bx bx-arrow-back"></i>
                Kembali</button>
            <div>
                <button class="btn btn-warning btn-sm mr-4" data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                        class="bx bx-trash"></i> Hapus</button>
                <?= $this->include('pengguna/hapus'); ?>
                <button class="btn btn-success btn-sm ml-4" data-bs-toggle="modal" data-bs-target="#editModal">
                    <i class="bx bx-edit"></i> Edit</button>
                <?= $this->include('pengguna/edit'); ?>
            </div>
        </div>
    </div>
    <?php } ?>
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
</script>
<?= $this->endSection(); ?>