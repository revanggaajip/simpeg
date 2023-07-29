<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header mb-3">
        <h4><?= $title; ?></h4>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Kriteria</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="bx bx-tag bx-lg text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Pegawai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengguna; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="bx bx-user bx-lg text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pengajuan Cuti
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $cuti?></div>
                            </div>
                            <div class="col-auto">
                                <i class="bx bx-calendar-event bx-lg text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Penggajian</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= $gaji['total'] ?? 0 ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="bx bx-dollar bx-lg text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>