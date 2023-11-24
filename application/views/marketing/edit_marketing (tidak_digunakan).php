 <!--   Modal Edit Data-->
 <div class="modal fade" id="edit_marketing<?php echo $mkt->id_mar; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Marketing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
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
                                <label for="emd" class="col-form-label">Upline EMD</label>
                                <input type="text" class="form-control" id="emd" name="emd" value="<?php echo $mkt->upline_emd_mar; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="cmo" class="col-form-label">Upline CMO</label>
                                <input type="text" class="form-control" id="cmo" name="cmo" value="<?php echo $mkt->upline_cmo_mar; ?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="npwp" class="col-form-label">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="npwp" value="<?php echo $mkt->npwp_mar; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="norek" class="col-form-label">No. Rekening</label>
                                <input type="text" class="form-control" id="norek" name="norek" value="<?php echo $mkt->norek_mar; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="fasilitas" class="col-form-label">Fasilitas</label>
                                <input type="text" class="form-control" id="fasilitas" name="fasilitas" value="<?php echo $mkt->fasilitas_mar; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jabatan" class="col-form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $mkt->jabatan_mar; ?>" readonly>
                            </div>
                        </div>
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