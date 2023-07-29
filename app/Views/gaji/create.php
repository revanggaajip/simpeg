<!-- Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" tabindex="-1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="/gaji/create/<?= $pengguna['id']?>" method="POST">
            <?= csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Tambah <?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col mb-3">
                    <label for="periode" class="form-label">Periode Gaji</label>
                    <input type="month" name="periode" id="periode" class="form-control"
                        placeholder="Masukkan Periode"> 
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="gapok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="gapok" id="gapok" class="form-control" onchange="totalGaji()"
                        placeholder="Masukkan Gaji pokok"> 
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="potongan" class="form-label">Potongan</label>
                    <input type="number" name="potongan" id="potongan" class="form-control" onchange="totalGaji()"
                        placeholder="Masukkan Potongan">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="tunjangan" class="form-label">Tunjangan</label>
                    <input type="number" name="tunjangan" id="tunjangan" class="form-control" onchange="totalGaji()"
                        placeholder="Masukkan Tunjangan">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="number" name="total" id="total" class="form-control" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="3"></textarea>                </div>
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

<?= $this->section('scripts')?>
    <script>
        $(document).ready(() => {
            // let gapok = document.getElementById('gapok')
            // let potongan = document.getElementById('potongan')
            // let tunjangan = document.getElementById('tunjangan')
            
            // gapok.ch(() => {
                //     total.value = gapok - potongan + tunjangan
                // })
            })
            
            function totalGaji() {
                let gapok = document.getElementById('gapok').value
                let potongan = document.getElementById('potongan').value
                let tunjangan = document.getElementById('tunjangan').value
                let total = document.getElementById('total')

                total.value = parseInt(gapok) - parseInt(potongan) + parseInt(tunjangan);
        }
    </script>
<?= $this->endSection()?>