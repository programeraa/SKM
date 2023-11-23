 <!--   Modal Tambah Data-->
 <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data BT / TB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('Jurnal/tambah_bttb'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="kode_perkiraan" class="col-form-label">Kode Perkiraaan</label>
                        <input type="text" class="form-control" id="kode_perkiraan" name="kode_perkiraan" placeholder="Contoh : BT001 Atau TB001" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
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
