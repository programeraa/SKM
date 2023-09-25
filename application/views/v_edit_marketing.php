<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <a href="<?= base_url('Marketing'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title">Edit Data Marketing</h4>
        </div>
        <div class="card-body">
            <?php foreach ($marketing as $mkt) { ?>
                <form method="post" action="<?= base_url('Marketing/update'); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama" class="col-form-label">Nama Marketing</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $mkt->nama_mar; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nomor" class="col-form-label">ID Marketing</label>
                                <input type="text" class="form-control" id="nomor" name="nomor" value="<?php echo $mkt->nomor_mar; ?>">
                            </div>
                            <div class="form-group">
                                <label for="member" class="col-form-label">Member</label>
                                <select class="form-control" id="member" name="member">
                                    <option value="">Pilih Member</option>
                                    <?php
                                    if ($mkt->member_mar == "Silver") echo "<option value='Silver' selected>Silver (50%)</option>";
                                    else echo "<option value='Silver'>Silver (50%)</option>";

                                    if ($mkt->member_mar == "Gold Express") echo "<option value='Gold Express' selected>Gold Express (60%)</option>";
                                    else echo "<option value='Gold Express'>Gold Express (60%)</option>";

                                    if ($mkt->member_mar == "Prime Pro") echo "<option value='Prime Pro' selected>Prime Pro (70%)</option>";
                                    else echo "<option value='Prime Pro'>Prime Pro (70%)</option>";

                                    if ($mkt->member_mar == "Black Jack") echo "<option value='Black Jack' selected>Black Jack (80%)</option>";
                                    else echo "<option value='Black Jack'>Black Jack (80%)</option>";
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="emd" class="col-form-label">Upline 1</label>
                                <select class="form-control select2bs4" id="emd" name="emd">
                                    <option value="">Tidak Ada</option>
                                    <?php 
                                    foreach($marketing_all as $each){ ?>
                                        <option value="<?php echo $each->id_mar; ?>"
                                            <?=$mkt->upline_emd_mar==$each->id_mar ? "selected" : null ?>>
                                            <?php echo $each->nama_mar ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cmo" class="col-form-label">Upline 2</label>
                                <select class="form-control select2bs4" id="cmo" name="cmo">
                                    <option value="">Tidak Ada</option>
                                    <?php 
                                    foreach($marketing_all as $each){ ?>
                                        <option value="<?php echo $each->id_mar; ?>"
                                            <?=$mkt->upline_cmo_mar==$each->id_mar ? "selected" : null ?>>
                                            <?php echo $each->nama_mar ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="npwp" class="col-form-label">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="npwp" value="<?php echo $mkt->npwp_mar; ?>">
                            </div>
                            <div class="form-group">
                                <label for="norek" class="col-form-label">No. Rekening</label>
                                <input type="text" class="form-control" id="norek" name="norek" value="<?php echo $mkt->norek_mar; ?>">
                            </div>
                            <div class="form-group">
                                <label for="fasilitas" class="col-form-label">Fasilitas</label>
                                <input type="text" class="form-control" id="fasilitas" name="fasilitas" value="<?php echo $mkt->fasilitas_mar; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jabatan" class="col-form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $mkt->jabatan_mar; ?>">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="<?= $mkt->id_mar; ?>" name="id_mar">
                    <div class="text-right">
                        <button class="btn btn-success">Update</button>
                    </div>
                </form>

            <?php } ?>
        </div>
    </div>
</div>