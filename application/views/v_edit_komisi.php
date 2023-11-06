<?php include "session_identitas.php" ?>
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
            <?php foreach ($komisi as $komisi) { 

                //setting apakah listing 1 a&a atau cobroke
                foreach ($marketing as $mkt) {
                    if ($mkt->id_mar == $komisi->mar_listing_komisi) {
                        $listing_1 = $mkt->nama_mar;
                        break;
                    }else {
                        foreach ($co_broke as $kubruk) {
                            if ($komisi->mar_listing_komisi == $kubruk->id_komisi_unik && $komisi->id_komisi == $kubruk->id_komisi ) {
                                $listing_1 = $kubruk->nama_cobroke;
                            }
                        }
                    }
                }

                //setting apakah selling 1 a&a atau cobroke
                foreach ($marketing as $mkt) {
                    if ($mkt->id_mar == $komisi->mar_selling_komisi) {
                        $selling_1 = $mkt->nama_mar;
                        break;
                    }else{
                        foreach ($co_broke as $kubruk) {
                            if ($komisi->mar_selling_komisi == $kubruk->id_komisi_unik && $komisi->id_komisi == $kubruk->id_komisi ) {
                                $selling_1 = $kubruk->nama_cobroke;
                            }
                        }
                    }
                }

                //setting marketing listing 2
                if (!empty($komisi->mar_listing2_komisi)) {
                    foreach ($marketing as $mkt) {
                        if ($mkt->id_mar == $komisi->mar_listing2_komisi) {
                            $listing2_baru = '- '.$mkt->nama_mar;
                        }
                    }
                }else{
                    $listing2_baru = '';
                }

                //setting marketing selling 2
                if (!empty($komisi->mar_selling2_komisi)) {
                    foreach ($marketing as $mkt) {
                        if ($mkt->id_mar == $komisi->mar_selling2_komisi) {
                            $selling2_baru = '- '.$mkt->nama_mar;
                        }
                    }
                }else{
                    $selling2_baru = '';
                }

                ?>
                <form method="post" action="<?= base_url('komisi/update_komisi'); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat" class="col-form-label">Alamat</label>
                                <?php if ($level == 'Administrator') {?>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $komisi->alamat_komisi ?>">
                                <?php }else{ ?>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $komisi->alamat_komisi ?>" readonly>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="jt" class="col-form-label">Jenis Transaksi</label>
                                <?php if ($level == 'Administrator') {?>
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
                                <?php }else{ ?>
                                    <input type="text" class="form-control" id="jt" name="jt" value="<?= $komisi->jt_komisi ?>" readonly>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="tgl_closing" class="col-form-label">Tanggal Closing</label>
                                <?php if ($level == 'Administrator') {?>
                                    <input type="date" class="form-control" id="tgl_closing" name="tgl_closing" value="<?= $komisi->tgl_closing_komisi ?>" >
                                <?php }else{ ?>
                                    <input type="date" class="form-control" id="tgl_closing" name="tgl_closing" value="<?= $komisi->tgl_closing_komisi ?>" readonly>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marketing_listing" class="col-form-label">Marketing Listing</label>
                                        <input type="text" class="form-control" id="marketing_listing" name="marketing_listing" value="<?= $listing_1 ?> <?= $listing2_baru ?>" readonly>
                                <!-- <select class="form-control select2bs4" id="marketing_listing" name="marketing_listing">
                                    <option value="">Pilih Nama</option>
                                    <?php 
                                    foreach($marketing as $each){ ?>
                                        <option value="<?php echo $each->id_mar; ?>"
                                            <?=$komisi->mar_listing_komisi==$each->id_mar ? "selected" : null ?>>
                                            <?php echo $each->nama_mar ?>
                                        </option>;
                                    <?php } ?>
                                ?>
                            </select> -->
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="marketing_selling" class="col-form-label">Marketing Selling</label>
                            <input type="text" class="form-control" id="marketing_selling" name="marketing_selling" value="<?= $selling_1 ?> <?= $selling2_baru ?>" readonly>
                            <!-- <select class="form-control select2bs4" id="marketing_selling" name="marketing_selling">
                                <option value="">Pilih Nama</option>
                                <?php 
                                foreach($marketing as $each){ ?>
                                    <option value="<?php echo $each->id_mar; ?>"
                                        <?= $komisi->mar_selling_komisi==$each->id_mar ? "selected" : null ?>>
                                        <?php echo $each->nama_mar ?> 
                                    </option>;
                                <?php } ?>
                            ?>
                        </select> -->
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="komisi" class="col-form-label">Komisi Bruto</label>

                <?php if ($level == 'Administrator') {?>
                    <input type="text" class="form-control" id="tampil_komisi" name="tampil_komisi" value="<?= $komisi->bruto_komisi ?>" onkeyup="formatRupiah(this, 'komisi')">

                    <input type="hidden" class="form-control" id="komisi" name="komisi" value="<?= $komisi->bruto_komisi ?>">
                <?php }else{ ?>
                    <input type="text" class="form-control" id="komisi" name="komisi" value="<?= $komisi->bruto_komisi ?>" readonly>
                <?php } ?>
            </div>

            <div class="form-group">
                <label for="st" class="col-form-label">Status Transfer</label>
                <?php if ($level == 'Administrator') {?>
                    <select class="form-control" id="st" name="st">
                        <!-- <option value="Proses Transfer">Pilih Status Transfer</option> -->
                        <?php
                        if ($komisi->status_transfer == "Proses Transfer") echo "<option value='Proses Transfer' selected>Proses Transfer</option>";
                        else echo "<option value='Proses Transfer'>Proses Transfer</option>";

                        if ($komisi->status_transfer == "Transfer") echo "<option value='Transfer' selected>Transfer</option>";
                        else echo "<option value='Transfer'>Transfer</option>";
                        ?>
                    </select>
                <?php }else{ ?>
                    <input type="text" class="form-control" id="st" name="st" value="<?= $komisi->status_transfer ?>" readonly>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="form-group d-xl-none">
      <label class="col-sm-15 col-form-label">No Sistem</label>
      <input type="text" class="form-control" id="id_komisi" name="id_komisi" value="<?php echo $komisi->id_komisi; ?>">
  </div>
  <div class="form-group d-xl-none">
    <label for="admin" class="col-form-label">Admin</label>
    <input type="text" class="form-control" id="admin" name="admin" value="<?php echo $id; ?>">
</div>
<div class="text-right">
    <button class="btn btn-success">Update</button>
</div>
</form>

<?php } ?>
</div>
</div>
</div>
