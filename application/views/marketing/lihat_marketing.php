 <!--   Modal Lihat Data-->
 <div class="modal fade" id="lihat_marketing<?php echo $mkt->id_mar; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data Marketing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama" class="col-form-label">Nama Marketing</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $mkt->nama_mar; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nomor" class="col-form-label">ID Marketing</label>
                                <input type="text" class="form-control" id="nomor" name="nomor" value="<?php echo $mkt->nomor_mar; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="member" class="col-form-label">Member</label>
                                <input type="text" class="form-control" id="member" name="member" value="<?= $jenis_member ?> (<?= $member_sec ?>/<?= $member_kpr ?>)" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="fasilitas" class="col-form-label">Fasilitas</label>
                                        <input type="text" class="form-control" id="fasilitas" name="fasilitas" value="<?php echo $mkt->fasilitas_mar; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <!-- <div class="form-group">
                                        <label for="npwp" class="col-form-label">NPWP</label>
                                        <input type="text" class="form-control" id="npwp" name="npwp" value="<?php echo $mkt->npwp_mar; ?>" readonly>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="emd" class="col-form-label">Upline</label>
                                        <input type="text" class="form-control" id="emd" name="emd" value="<?php echo $emd_baru; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="cmo" class="col-form-label">Upline (CMO)</label>
                                        <input type="text" class="form-control" id="cmo" name="cmo" value="<?php echo $cmo_baru;; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="norek" class="col-form-label">No. Rekening</label>
                                        <input type="text" class="form-control" id="norek" name="norek" value="<?php echo $mkt->norek_mar; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan" class="col-form-label">Jabatan</label>
                                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $jabatan_marketing; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ktp" class="col-form-label">Foto KTP</label>
                                        <br>
                                        <?php if ($gambar_ktp == 1) { ?>
                                            <img style="width: 200px; height: 130px; " src="<?= base_url('assets/foto_marketing/' . $mkt->gambar_ktp_mar) ?>" alt="Marketing Image">
                                        <?php }else{ ?>
                                            <img style="width: 200px; height: 130px; " src="<?= base_url('assets/foto_marketing/tidak_ada.jpg') ?>" alt="Marketing Image">
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="npwp" class="col-form-label">Foto NPWP</label>
                                        <br>
                                        <?php if ($gambar_npwp == 1) { ?>
                                            <img style="width: 200px; height: 130px; " src="<?= base_url('assets/foto_marketing/' . $mkt->gambar_npwp_mar) ?>" alt="Marketing Image">
                                        <?php }else{ ?>
                                            <img style="width: 200px; height: 130px; " src="<?= base_url('assets/foto_marketing/tidak_ada.jpg') ?>" alt="Marketing Image">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
