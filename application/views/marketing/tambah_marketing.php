 <!--   Modal Tambah Data-->
 <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Marketing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('Marketing/tambah'); ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama" class="col-form-label">Nama Marketing</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="nomor" class="col-form-label">ID Marketing</label>
                                <input type="text" class="form-control" id="nomor" name="nomor" required>
                            </div>
                            <div class="form-group">
                                <label for="member" class="col-form-label">Member</label>
                                <select class="form-control" id="member" name="member" required>
                                    <option value="">Pilih Member</option>
                                    <option value="Silver">Silver (50)</option>
                                    <option value="Gold Express">Gold Express (60)</option>
                                    <option value="Prime Pro">Prime Pro (70)</option>
                                    <option value="Black Jack">Black Jack (80)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="norek" class="col-form-label">No. Rekening</label>
                                <input type="text" class="form-control" id="norek" name="norek" placeholder="Misal : BCA-xxxxxxxx (Citra)">
                            </div>
                            <div class="form-group">
                                <label for="fasilitas" class="col-form-label">Fasilitas</label>
                                <input type="text" class="form-control" id="fasilitas" name="fasilitas">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emd" class="col-form-label">Upline 1</label>
                                <select class="form-control select2bs4" id="emd" name="emd">
                                    <option value="">Pilih Nama</option>
                                    <?php 
                                    foreach($marketing as $each){ ?>
                                        <option value="<?php echo $each->id_mar; ?>">
                                            <?php echo $each->nama_mar; ?> (<?php echo $each->nomor_mar; ?>)
                                        </option>;
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cmo" class="col-form-label">Upline 2</label>
                                <select class="form-control select2bs4" id="cmo" name="cmo">
                                    <option value="">Pilih Nama</option>
                                    <?php 
                                    foreach($marketing as $each){ ?>
                                        <option value="<?php echo $each->id_mar; ?>">
                                            <?php echo $each->nama_mar; ?> (<?php echo $each->nomor_mar; ?>)
                                        </option>;
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="npwp" class="col-form-label">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="npwp">
                            </div> -->
                            
                            <div class="form-group">
                                <label for="jabatan" class="col-form-label">Jabatan</label>
                                <select class="form-control" id="jabatan" name="jabatan" required>
                                    <option value="">Pilih Jabatan</option>
                                    <option value="me">Marketing Executive (ME)</option>
                                    <option value="emd">Executive Marketing Director (EMD)</option>
                                    <option value="cmo">Chief Marketing Officer (CMO)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="g_ktp" class="col-form-label">Foto KTP</label>
                                <input type="file" class="form-control" id="g_ktp" name="g_ktp">
                            </div>
                            <div class="form-group">
                                <label for="g_npwp" class="col-form-label">Foto NPWP</label>
                                <input type="file" class="form-control" id="g_npwp" name="g_npwp">
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
