<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <a href="<?= base_url('Komisi/komisi'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title">Edit Data Komisi</h4>
        </div>
        <div class="card-body">
            <?php foreach ($komisi as $komisi) { ?>
                <form method="post" action="<?= base_url('komisi/update_komisi'); ?>">
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
                                <select class="form-control select2bs4" id="marketing_listing" name="marketing_listing">
                                    <option value="">Pilih Nama</option>
                                    <?php 
                                    foreach($marketing as $each){ ?>
                                        <option value="<?php echo $each->id_mar; ?>"
                                            <?=$komisi->mar_listing_komisi==$each->id_mar ? "selected" : null ?>>
                                            <?php echo $each->nama_mar ?>
                                        </option>;
                                    <?php } ?>
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="marketing_selling" class="col-form-label">Marketing Selling</label>
                            <select class="form-control select2bs4" id="marketing_selling" name="marketing_selling">
                                <option value="">Pilih Nama</option>
                                <?php 
                                foreach($marketing as $each){ ?>
                                    <option value="<?php echo $each->id_mar; ?>"
                                        <?= $komisi->mar_selling_komisi==$each->id_mar ? "selected" : null ?>>
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
          <div class="text-right">
            <button class="btn btn-success">Update</button>
        </div>
    </form>

<?php } ?>
</div>
</div>
</div>