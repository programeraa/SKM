 <!--   Modal Tambah Data-->
 <div class="modal fade" id="edit_bttb<?= $jurnal->id_bttb ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('Jurnal/update_bttb'); ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_perkiraan" class="col-form-label">Kode Perkiraaan</label>
                                <input type="text" class="form-control" id="kode_perkiraan" name="kode_perkiraan" placeholder="Contoh : BT001 Atau TB001" value="<?= $jurnal->kode_perkiraan ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor_perkiraan" class="col-form-label">Nomor Perkiraaan</label>
                                <input type="text" class="form-control" id="nomor_perkiraan" name="nomor_perkiraan" placeholder="Contoh : 001, 002 Dst" value="<?= $jurnal->nomor_perkiraan ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $jurnal->keterangan ?>" required>
                    </div>
                    
                    <input type="hidden" name="id_bttb" value="<?= $jurnal->id_bttb ?>">

                    <div class="modal-footer pr-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
