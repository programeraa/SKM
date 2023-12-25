 <!--   Modal Tambah Data-->
 <div class="modal fade" id="edit_kantor<?= $kantor->id_kantor ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kantor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('Pengaturan/edit_kantor'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="kantor" class="col-form-label">Kantor</label>
                        <input type="text" class="form-control" id="kantor" name="kantor" value="<?= $kantor->kantor ?>" required>
                    </div>
                    <div class="form-group d-xl-none">
                        <label for="id_kantor" class="col-form-label">Id Kantor</label>
                        <input type="text" class="form-control" id="id_kantor" name="id_kantor" value="<?= $kantor->id_kantor ?>" required>
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
