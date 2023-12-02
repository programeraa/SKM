 <!--   Modal Tambah Data-->
 <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jurnal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('Jurnal/tambah_jurnal'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tgl_input" class="col-form-label">Tanggal Input</label>
                        <input type="date" class="form-control" id="tgl_input" name="tgl_input" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_perkiraan" class="col-form-label">Kode Perkiraaan</label>
                        <select class="form-control select2bs4" id="kode_perkiraan" name="kode_perkiraan">
                            <option value="">Pilih Kode Perkiraan</option>
                            <?php 
                            foreach($jurnal_bttb as $each){ ?>
                                <option value="<?php echo $each->id_bttb; ?>">
                                    <?= $each->kode_perkiraan; ?> - <?= $each->keterangan; ?> 
                                </option>;
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                    </div>
                    <div class="form-group">
                        <label for="tampil_nominal" class="col-form-label">Nominal</label>

                        <input type="text" class="form-control" name="tampil_nominal" id="tampil_nominal" onkeyup="formatRupiah(this, 'nominal')">
                        <input type="hidden" class="form-control" id="nominal" name="nominal">

                    </div>
                    <div class="form-group">
                        <label for="j_jurnal" class="col-form-label">Jenis Jurnal</label>
                        <select class="form-control" id="j_jurnal" name="j_jurnal">
                            <option value="">Pilih Jenis Jurnal</option>
                            <option value="Debit">Debit</option>
                            <option value="Kredit">Kredit</option>
                        </select>
                    </div>
                    <div class="modal-footer pr-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
