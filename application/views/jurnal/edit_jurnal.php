 <div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <a href="<?= base_url('Jurnal'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
        </div>
        <div class="text-right">
        </div>
    </div>

    <div class="card">
        <?php

        foreach ($jurnal_umum as $jurnal) { ?>
            <div class="card-header bg-dark text-white">
                <h4 class="card-title" style="text-align: left;">Edit Data Jurnal</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('Jurnal/update_jurnal'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tgl_input" class="col-form-label">Tanggal Input</label>
                        <input type="date" class="form-control" id="tgl_input" name="tgl_input" value="<?= $jurnal->tgl_input_jurnal ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_perkiraan" class="col-form-label">Kode Perkiraaan</label>
                        <select class="form-control select2bs4" id="kode_perkiraan" name="kode_perkiraan">
                            <option value="">Pilih Kode Perkiraan</option>
                            <?php 
                            foreach($jurnal_bttb as $each){ ?>
                                <option value="<?php echo $each->id_bttb; ?>"
                                    <?=$jurnal->id_bttb==$each->id_bttb ? "selected" : null ?>>
                                    <?= $each->kode_perkiraan; ?><?= $each->nomor_perkiraan ?> - <?= $each->keterangan; ?> 
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $jurnal->keterangan_jurnal ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tampil_nominal" class="col-form-label">Nominal</label>

                        <input type="text" class="form-control" name="tampil_nominal" id="tampil_nominal" value="<?= $jurnal->nominal_jurnal ?>" onkeyup="formatRupiah2(this, 'nominal')">

                        <input type="hidden" class="form-control" id="nominal" name="nominal" value="<?= $jurnal->nominal_jurnal ?>">

                    </div>
                    <div class="form-group">
                        <label for="j_jurnal" class="col-form-label">Jenis Jurnal</label>
                        <select class="form-control" id="j_jurnal" name="j_jurnal">
                            <option value="">Pilih Jenis Jurnal</option>
                            <?php 

                            if ($jurnal->jenis_jurnal == "Debit") echo "<option value='Debit' selected>Debit</option>";
                            else echo "<option value='Debit'>Debit</option>";

                            if ($jurnal->jenis_jurnal == "Kredit") echo "<option value='Kredit' selected>Kredit</option>";
                            else echo "<option value='Kredit'>Kredit</option>";

                            ?>
                        </select>
                    </div>

                    <input type="hidden" name="id_jurnal" value="<?= $jurnal->id_jurnal ?>">

                    <div class="modal-footer pr-0">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
</div>
</div>
</div>
</body>