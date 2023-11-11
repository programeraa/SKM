 <!--   Modal Tambah Data-->
 <div class="modal fade" id="edit_kredit<?php echo $kredit->id_kredit; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bank Titipan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('BankTitipan/edit_kredit'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tgl_kredit" class="col-form-label">Tanggal Input</label>
                        <input type="date" class="form-control" id="tgl_kredit" name="tgl_kredit" value="<?= $kredit->tgl_input_kredit ?>">
                    </div>
                    <div class="form-group">
                        <label for="keterangan_kredit" class="col-form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan_kredit" name="keterangan_kredit" value="<?= $kredit->keterangan_kredit ?>">
                    </div>
                    <div class="form-group">
                        <label for="tampil_nominal_kredit" class="col-form-label">Nominal Kredit</label>

                        <input type="text" class="form-control" name="tampil_nominal_kredit" id="tampil_nominal_kredit" value="<?= $kredit->nominal_kredit ?>" onkeyup="formatRupiah(this, 'nominal_kredit')">
                        <input type="hidden" id="nominal_kredit" name="nominal_kredit" value="<?= $kredit->nominal_kredit ?>">
                    </div>
                </div>

                <input type="hidden" value="<?= $kredit->id_kredit ?>" name="id_kredit">
                <input type="hidden" value="<?= $bt->id_bta ?>" name="id_bta">

                <div class="modal-footer pr-3">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
