<?= $this->extend('layouts/main'); ?>

<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header mb-3">
        <h4><?= $title; ?> / Seleksi</h4>
    </div>
    <div class="card-body">
        <section class="mb-3" id="tabelPenilaian">
            <h5 class="mb-3">Tabel Penilaian</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-primary">
                            <th class="text-white">Alternatif</th>
                            <?php foreach ($listKriteria as $key => $kriteria) :?>
                            <th class="text-white"><?= $kriteria['id']; ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listPendaftar as $key => $pendaftar) :?>
                        <tr>
                            <td>A-<?= $pendaftar['id']; ?></td>
                            <?php foreach ($listKriteria as $key => $kriteria) :?>
                            <?php foreach ($listPenilaian as $key => $penilaian) : ?>
                            <?php if ($penilaian['id_pendaftar'] == $pendaftar['id'] && $penilaian['id_kriteria'] == $kriteria['id']) : ?>
                            <td><?= $penilaian['nilai_kriteria']; ?></td>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
        <section id="Bentuk Matrix" class="mt-4">
            <h5 class="mb-3">Bentuk Matrix</h5>
            <div class="d-flex justify-content-center align-items-center">
                <p>X = </p>
                <table>
                    <?php foreach ($listPendaftar as $pendaftar) { ?>
                    <tr>
                        <?php foreach ($listKriteria as $kriteria) { ?>
                        <?php foreach ($listPenilaian as $penilaian) {
                                    if ($penilaian['id_kriteria'] == $kriteria['id'] && $penilaian['id_pendaftar'] == $pendaftar['id']) {
                                        echo '<td width="30px">'.$penilaian['nilai_kriteria'].'</td>';
                                    }
                                } ?>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </section>
        <section id="Normalisasi Perhitungan" class="mt-4">
            <h5 class="mb-3">Normalisasi Perhitungan</h5>
            <div class="d-flex justify-content-center align-items-center">
                <p>X = </p>
                <table>
                    <?php foreach ($listPendaftar as $pendaftar) { ?>
                    <tr>
                        <?php foreach ($listKriteria as $kriteria) { ?>
                        <?php foreach ($calculation as $key => $c) {
                                foreach ($c as $keyKriteria => $value) {
                                    // dd($key);
                                    if ($keyKriteria == $kriteria['id'] && $key == $pendaftar['id']) {
                                        echo '<td width="50px">'.$value.'</td>';
                                    }
                                }
                            } ?>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-4">
                <p class="my-auto">W = </p>
                <table>
                    <tr>
                        <?php foreach ($listKriteria as $kriteria) { ?>
                        <td width="50px" class="text-center"><?= number_format($kriteria['bobot'] / 100, 2); ?></td>
                        <?php } ?>
                    </tr>
                </table>
            </div>
        </section>
        <section id="Hasil Pehitungan" class="mt-4">
            <h5 class="mb-3">Hasil Perhitungan</h5>
            <div class="d-flex justify-content-center">

                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-primary">
                            <td class="text-white">Alternatif</td>
                            <td class="text-white">Perhitungan</td>
                            <td class="text-white">Jumlah</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listPendaftar as $pendaftar) : ?>
                        <tr>
                            <td>V-<?= $pendaftar['id']; ?></td>
                            <td>
                                <?php foreach ($calculation as $key => $datas) : ?>
                                <?php foreach ($datas as $key2 => $data) :?>
                                <?php foreach ($listKriteria as $kriteria) :?>
                                <?php if ($key2 == $kriteria['id'] && $pendaftar['id'] == $key) : ?>
                                (<?= $kriteria['bobot'] / 100; ?> * <?= $data; ?>)
                                <?php if ($key2 != max($listKriteria)['id']) {
                                echo '+';
                            } ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <?php endforeach; ?>
                                <?php endforeach; ?>
                            </td>
                            <?php foreach ($sumResult as $key => $result) : ?>
                            <?php if ($pendaftar['id'] == $key) : ?>
                            <td><?= $result ?></td>
                            <?php endif ?>
                            <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
        <section id="Hasil Seleksi" class="mt-4">
            <form action="<?= route_to('perhitungan.selection'); ?>" method="post">
                <?= csrf_field(); ?>
                <h5 class="mb-3">Hasil Seleksi</h5>
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <td class="text-white">Alternatif</td>
                                <td class="text-white">Nama</td>
                                <td class="text-white">Nilai</td>
                                <td class="text-white">Penerima</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($selectionResult as $keySelection => $selection) : ?>
                            <?php foreach ($sumResult as $keySum => $sum) : ?>
                            <?php if ($selection == $sum) : ?>
                            <?php foreach ($listPendaftar as $keyPendaftar => $pendaftar) : ?>
                            <?php if ($keySum == $pendaftar['id']) :?>
                            <tr>
                                <td>V-<?= $keySum; ?></td>
                                <td><?= $pendaftar['nama']; ?></td>
                                <td><?= $sum; ?></td>
                                <td><?= $keySelection + 1 <= session('jumlah_kuota') ? 'Ya' : 'Tidak'; ?></td>
                            </tr>
                            <input type="hidden" name="id[]" value="<?= $keySum; ?>">
                            <input type="hidden" name="nama[]" value="<?= $pendaftar['nama']; ?>">
                            <input type="hidden" name="nilai[]" value="<?= $sum; ?>">
                            <input type="hidden" name="penerima[]"
                                value="<?= $keySelection + 1 <= session('jumlah_kuota') ? 'Ya' : 'Tidak'; ?>">
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <a href="<?= route_to('perhitungan.reset'); ?>" class="btn btn-warning">
                        <i class="bx bx-undo"></i> Reset
                    </a>
                    <button type="submit" class="btn btn-success"><i class="bx bx-check-circle"></i> Simpan</button>
                </div>
            </form>
        </section>
    </div>
</div>
<?= $this->endSection(); ?>