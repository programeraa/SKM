<!-- Modal Edit Data -->
<div class="modal fade" id="edit_komisi<?= $komisi->id_komisi?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Komisi Marketing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('komisi/edit_komisi'); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat" class="col-form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $komisi->alamat_komisi ?>">
                            </div>
                            <div class="form-group">
                                <label for="jt" class="col-form-label">Jenis Transaksi</label>
                                <select class="form-control" id="jt" name="jt">
                                    <option value="">Pilih</option>
                                    <?php
                                    if ($komisi->jt_komisi == "Jual") echo "<option value='Jual' selected>Jual</option>";
                                    else echo "<option value='Jual'>Jual</option>";

                                    if ($komisi->jt_komisi == "Sewa") echo "<option value='Sewa' selected>Sewa</option>";
                                    else echo "<option value='Sewa'>Sewa</option>";

                                    if ($komisi->jt_komisi == "Jual/Sewa") echo "<option value='Jual/Sewa' selected>Jual/Sewa</option>";
                                    else echo "<option value='Jual/Sewa'>Jual/Sewa</option>";
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_closing" class="col-form-label">Tanggal Closing</label>
                                <input type="date" class="form-control" id="tgl_closing" name="tgl_closing" value="<?= $komisi->tgl_closing_komisi ?>" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="marketing_listing" class="col-form-label">Marketing Listing</label>
                                <select class="form-control" id="marketing_listing" name="marketing_listing">
                                    <option value="">Pilih Nama</option>
                                    <?php 
                                    foreach($marketing as $each){ ?>
                                        <option value="<?php echo $each->id_mar; ?>"
                                            <?=$komisi->nama_mar==$each->nama_mar ? "selected" : null ?>>
                                            <?php echo $each->nama_mar ?>
                                        </option>;
                                    <?php } ?>
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="marketing_selling" class="col-form-label">Marketing Selling</label>
                            <select class="form-control" id="marketing_selling" name="marketing_selling">
                                <option value="">Pilih Nama</option>
                                <?php 
                                foreach($marketing as $each){ ?>
                                    <option value="<?php echo $each->id_mar; ?>"
                                        <?= $a=$komisi->nama_mar2==$each->nama_mar ? "selected" : null ?>>
                                        <?php echo $each->nama_mar ?> 
                                    </option>;
                                <?php } ?>
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="komisi" class="col-form-label">Komisi Bruto</label>
                        <input type="text" class="form-control" id="komisi" name="komisi" value="<?= $komisi->bruto_komisi ?>">
                    </div>
                </div>
            </div>

            <div class="form-group d-xl-none">
              <label class="col-sm-15 col-form-label">No Sistem</label>
              <input type="text" class="form-control" id="id_komisi" name="id_komisi" value="<?php echo $komisi->id_komisi; ?>">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>
</div>
</div>
</div>