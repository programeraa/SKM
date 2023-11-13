<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <a href="<?= base_url('BankTitipan/jurnal_ledger'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title">Rincian Jurnal Ledger</h4>
        </div>
        <div class="card-body">
            <?php 
            foreach ($bank_titipan as $bt) {
                ?>
                <form method="post" action="<?= base_url('BankTitipan/update'); ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_perkiraan" class="col-form-label">Kode Perkiraan</label>
                                <input type="text" class="form-control" id="kode_perkiraan" name="kode_perkiraan" value="<?= $bt->kode_perkiraan ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_properti" class="col-form-label">Properti</label>
                                <input type="text" class="form-control" id="nama_properti" name="nama_properti" value="<?= $bt->nama_properti ?>" readonly>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jt" class="col-form-label">Jenis Transaksi</label>
                                        <input type="text" class="form-control" id="jt" name="jt" value="<?= $bt->status_properti ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tgl_input" class="col-form-label">Tanggal Input</label>
                                        <input type="date" class="form-control" id="tgl_input" name="tgl_input" value="<?= $bt->tgl_input ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_marketing" class="col-form-label">Marketing</label>
                                <input type="text" class="form-control" id="nama_marketing" name="nama_marketing" value="<?= $bt->nama_mar ?>" readonly>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tampil_nominal" class="col-form-label">Nilai Nominal</label>
                                        <input type="text" class="form-control" id="nominal" name="nominal" value="<?= $bt->nilai_nominal ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis" class="col-form-label">Jenis Transfer</label>
                                        <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $bt->jenis ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $bt->keterangan ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="card-body pt-0">
                <div class="table-responsive mt-0">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Input</th>
                                <th>Keterangan</th>
                                <th>Nominal Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; 
                            foreach ($kredit_bt as $kredit) {
                                $nominal_baru = stringToNumber($kredit->nominal_kredit);
                                $nominal_baru_r = numberToRupiah($nominal_baru);

                                $tgl_input = date("d-m-Y", strtotime($kredit->tgl_input_kredit));

                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $tgl_input ?></td>
                                    <td><?= $kredit->keterangan_kredit ?></td>
                                    <td><?= $nominal_baru_r ?></td>
                                </tr>
                                <?php $no++;
                            } ?>
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>
