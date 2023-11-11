<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <a href="<?= base_url('BankTitipan'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title">Edit Data Marketing</h4>
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
                                <input type="text" class="form-control" id="kode_perkiraan" name="kode_perkiraan" value="<?= $bt->kode_perkiraan ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama_properti" class="col-form-label">Properti</label>
                                <input type="text" class="form-control" id="nama_properti" name="nama_properti" value="<?= $bt->nama_properti ?>">
                            </div>
                            <div class="form-group">
                                <label for="jt" class="col-form-label">Jenis Transaksi</label>
                                <select class="form-control" id="jt" name="jt">
                                    <option value="">Pilih</option>
                                    <?php
                                    if ($bt->status_properti == "Jual") echo "<option value='Jual' selected>Jual</option>";
                                    else echo "<option value='Jual'>Jual</option>";

                                    if ($bt->status_properti == "Sewa") echo "<option value='Sewa' selected>Sewa</option>";
                                    else echo "<option value='Sewa'>Sewa</option>";

                                    if ($bt->status_properti == "Jual/Sewa") echo "<option value='Jual/Sewa' selected>Jual/Sewa</option>";
                                    else echo "<option value='Jual/Sewa'>Jual/Sewa</option>";
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_input" class="col-form-label">Tanggal Input</label>
                                <input type="date" class="form-control" id="tgl_input" name="tgl_input" value="<?= $bt->tgl_input ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_marketing" class="col-form-label">Marketing</label>
                                <select class="form-control select2bs4" id="nama_marketing" name="nama_marketing">
                                    <option value="">Tidak Ada</option>
                                    <?php 
                                    foreach($marketing as $each){ ?>
                                        <option value="<?php echo $each->id_mar; ?>"
                                            <?=$bt->id_marketing==$each->id_mar ? "selected" : null ?>>
                                            <?php echo $each->nama_mar ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tampil_nominal" class="col-form-label">Nilai Nominal</label>
                                <input type="text" class="form-control" name="tampil_nominal" id="tampil_nominal" value="<?= $bt->nilai_nominal ?>" onkeyup="formatRupiah(this, 'nominal')">
                                <input type="hidden" id="nominal" name="nominal" value="<?= $bt->nilai_nominal ?>">
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $bt->keterangan ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kredit" class="col-form-label">Tambah Kredit</label>
                                        <input type="text" class="form-control" id="kredit" name="kredit">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tampil_n_kredit" class="col-form-label">Nominal</label>

                                        <input type="text" class="form-control" name="tampil_n_kredit" id="tampil_n_kredit" onkeyup="formatRupiah(this, 'n_kredit')">

                                        <input type="hidden" id="n_kredit" name="n_kredit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mt-3">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Input</th>
                                    <th>Keterangan</th>
                                    <th>Nominal Kredit</th>
                                    <th>Aksi</th>
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
                                        <td>
                                          <a href="#" data-toggle="modal" data-target="#edit_kredit<?php echo $kredit->id_kredit; ?>" class="btn btn-success"><i class="fas fa-edit" title="Edit"></i></a>

                                          <?php include "bank_titipan/edit_kredit_bt.php" ?>

                                          <a href="<?= base_url('BankTitipan/hapus_kredit_bt/' . $kredit->id_kredit . '?' . 'id_bta=' . $bt->id_bta); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data bank titipan?')" class="btn btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>

                                      </td>
                                  </tr>
                                  <?php $no++;
                              } ?>
                          </tbody>
                      </table>
                  </div>

                  <input type="hidden" value="<?= $bt->id_bta ?>" name="id_bta">
                  <div class="text-right mt-3">
                    <button class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    <?php } ?>
</div>
</div>
</div>
