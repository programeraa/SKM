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
            <?php foreach ($marketing as $mkt) { 
                if (!empty($mkt->gambar_ktp_mar)) {
                    $gambar_ktp = 1;
                }else{
                    $gambar_ktp = 0;
                }

                if(!empty($mkt->gambar_npwp_mar)) {
                    $gambar_npwp = 1;
                }else{
                    $gambar_npwp = 0;
                }
                ?>
                <form method="post" action="<?= base_url('Marketing/update'); ?>" enctype="multipart/form-data">
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
                                    foreach($member_marketing as $each){ ?>
                                        <option value="<?php echo $each->id_member; ?>"
                                            <?=$mkt->member_mar==$each->id_member ? "selected" : null ?>>
                                            <?php echo $each->member; ?> (<?php echo "Sec : ".$each->nilai_secondary; ?>) - (<?php echo "Kpr : " .$each->nilai_kpr; ?>)
                                        </option>
                                    <?php } ?>


                                    <!-- <?php
                                    if ($mkt->member_mar == "Silver") echo "<option value='Silver' selected>Silver (50%)</option>";
                                    else echo "<option value='Silver'>Silver (50%)</option>";

                                    if ($mkt->member_mar == "Gold Express") echo "<option value='Gold Express' selected>Gold Express (60%)</option>";
                                    else echo "<option value='Gold Express'>Gold Express (60%)</option>";

                                    if ($mkt->member_mar == "Prime Pro") echo "<option value='Prime Pro' selected>Prime Pro (70%)</option>";
                                    else echo "<option value='Prime Pro'>Prime Pro (70%)</option>";

                                    if ($mkt->member_mar == "Black Jack") echo "<option value='Black Jack' selected>Black Jack (80%)</option>";
                                    else echo "<option value='Black Jack'>Black Jack (80%)</option>";
                                ?> -->
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
                            <label for="norek" class="col-form-label">No. Rekening</label>
                            <input type="text" class="form-control" id="norek" name="norek" value="<?php echo $mkt->norek_mar; ?>">
                        </div>
                        <div class="form-group">
                            <label for="fasilitas" class="col-form-label">Fasilitas</label>
                            <input type="text" class="form-control" id="fasilitas" name="fasilitas" value="<?php echo $mkt->fasilitas_mar; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jabatan" class="col-form-label">Jabatan</label>
                            <select class="form-control" id="jabatan" name="jabatan">
                                <option value="">Pilih Jabatan</option>
                                <?php 
                                foreach($tampil_jabatan as $jabatan){ ?>
                                    <!-- <option value="<?php echo $jabatan->nilai_jabatan; ?>,<?php echo $jabatan->nama_jabatan; ?>"
                                        <?= $mkt->jabatan_mar==$jabatan->nama_jabatan && $mkt->nilai_jabatan_mar==$jabatan->nilai_jabatan ? "selected" : null ?>> 
                                        <?php echo $jabatan->nama_jabatan; ?> (<?php echo $jabatan->nilai_jabatan; ?>)
                                    </option>; -->

                                    <option value="<?php echo $jabatan->id_jabatan; ?>"
                                        <?= $mkt->jabatan_mar==$jabatan->id_jabatan ? "selected" : null ?>> 
                                        <?php echo $jabatan->nama_jabatan; ?> (<?php echo $jabatan->nilai_jabatan; ?>)
                                    </option>;
                                <?php } ?>
                            </select>
                        </div> 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="g_ktp" class="col-form-label">Foto KTP</label>
                                    <br>
                                    <?php if ($gambar_ktp == 1) { ?>
                                        <img style="width: 200px; height: 130px;" src="<?= base_url('assets/foto_marketing/' . $mkt->gambar_ktp_mar) ?>" alt="Gambar KTP">
                                        <br>
                                        <a style="width: 200px;" href="<?= base_url('Marketing/hapus_gambar_ktp/' . $mkt->id_mar); ?>" class="btn btn-danger">Hapus Gambar KTP</a>
                                    <?php } else { ?>
                                        <img style="width: 200px; height: 130px;" src="<?= base_url('assets/foto_marketing/tidak_ada.jpg') ?>" alt="Gambar KTP">
                                    <?php } ?>
                                    <br>
                                    <br>
                                    <input type="file" class="form-control" id="g_ktp" name="g_ktp" value="<?php echo $mkt->gambar_ktp_mar; ?>">
                                    <input type="hidden" class="form-control" name="g_ktp2" value="<?php echo $mkt->gambar_ktp_mar; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="g_npwp" class="col-form-label">Foto NPWP</label>
                                    <br>
                                    <?php if ($gambar_npwp == 1) { ?>
                                        <img style="width: 200px; height: 130px;" src="<?= base_url('assets/foto_marketing/' . $mkt->gambar_npwp_mar) ?>" alt="Gambar NPWP">
                                        <br>
                                        <a style="width: 200px;" href="<?= base_url('Marketing/hapus_gambar_npwp/' . $mkt->id_mar); ?>" class="btn btn-danger">Hapus Gambar NPWP</a>
                                    <?php } else { ?>
                                        <img style="width: 200px; height: 130px;" src="<?= base_url('assets/foto_marketing/tidak_ada.jpg') ?>" alt="Gambar NPWP">
                                    <?php } ?>
                                    <br>
                                    <br>
                                    <input type="file" class="form-control" id="g_npwp" name="g_npwp" value="<?php echo $mkt->gambar_npwp_mar; ?>">
                                    <input type="hidden" class="form-control" name="g_npwp2" value="<?php echo $mkt->gambar_npwp_mar; ?>">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" value="<?= $mkt->id_mar; ?>" name="id_mar">
                        <div class="text-right">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>

            <?php } ?>
        </div>
    </div>
</div>
