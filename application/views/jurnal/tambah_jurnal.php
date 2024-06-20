<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <a href="<?= base_url('Jurnal'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
        </div>
        <div class="text-right">
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title" style="text-align: left;">Tambah Data Jurnal</h4>
        </div>

        <div class="card-body">
            <form method="post" action="<?= base_url('Jurnal/input_jurnal'); ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_input" class="col-form-label">Tanggal Input</label>
                            <input type="date" class="form-control" id="tgl_input" name="tgl_input" required>
                        </div>
                    </div>

                    <?php 
                    $kode_jurnal_terakhir = $latest_kode_jurnal;

                    $angka_only = preg_replace("/[^0-9]/", "", $kode_jurnal_terakhir);
                    $kode_jur_baru = $angka_only+1;
                    ?>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_jurnal" class="col-form-label">Kode Jurnal</label>
                            <input type="text" class="form-control" id="kode_jurnal" name="kode_jurnal" value="<?= 'JU'. $kode_jur_baru ?>" required readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_perkiraan" class="col-form-label">Kode Perkiraaan</label>
                            <select class="form-control select2bs4" id="kode_perkiraan" name="kode_perkiraan">
                                <option value="">Pilih Kode Perkiraan</option>
                                <?php 
                                foreach($jurnal_bttb as $each){ ?>
                                    <option value="<?php echo $each->id_bttb; ?>">
                                        <?= $each->kode_perkiraan; ?> - <?= $each->keterangan; ?> 
                                    </option>;
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="keterangan" class="col-form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tampil_nominal" class="col-form-label">Nominal</label>
                            <input type="text" class="form-control" name="tampil_nominal" id="tampil_nominal" onkeyup="formatRupiah2(this, 'nominal')">
                            <input type="hidden" class="form-control" id="nominal" name="nominal">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="j_jurnal" class="col-form-label">Jenis Jurnal</label>
                            <select class="form-control" id="j_jurnal" name="j_jurnal" required>
                                <option value="">Pilih Jenis Jurnal</option>
                                <option value="Debit">Debit</option>
                                <option value="Kredit">Kredit</option>
                            </select>
                        </div>
                    </div>
                </div>

                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id ?>" required>
                <div class="modal-footer pr-0">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            <div class="table-responsive">
                <table id="myTable" class="myTable table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Aksi</th>
                            <th>Kode Perkiraan</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                            <th>Jenis Jurnal</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
                <div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>


<!--   Modal Tambah Data-->
 <!-- <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jurnal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('Jurnal/tambah_jurnal'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tgl_input" class="col-form-label">Tanggal Input</label>
                        <input type="date" class="form-control" id="tgl_input" name="tgl_input" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_perkiraan" class="col-form-label">Kode Perkiraaan</label>
                        <select class="form-control select2bs4" id="kode_perkiraan" name="kode_perkiraan">
                            <option value="">Pilih Kode Perkiraan</option>
                            <?php 
                            foreach($jurnal_bttb as $each){ ?>
                                <option value="<?php echo $each->id_bttb; ?>">
                                    <?= $each->kode_perkiraan; ?> - <?= $each->keterangan; ?> 
                                </option>;
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                    </div>
                    <div class="form-group">
                        <label for="tampil_nominal" class="col-form-label">Nominal</label>

                        <input type="text" class="form-control" name="tampil_nominal" id="tampil_nominal" onkeyup="formatRupiah2(this, 'nominal')">
                        <input type="hidden" class="form-control" id="nominal" name="nominal">

                    </div>
                    <div class="form-group">
                        <label for="j_jurnal" class="col-form-label">Jenis Jurnal</label>
                        <select class="form-control" id="j_jurnal" name="j_jurnal" required>
                            <option value="">Pilih Jenis Jurnal</option>
                            <option value="Debit">Debit</option>
                            <option value="Kredit">Kredit</option>
                        </select>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id ?>" required>
                    <div class="modal-footer pr-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
