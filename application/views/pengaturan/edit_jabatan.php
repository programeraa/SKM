 <!--   Modal Tambah Data-->
 <div class="modal fade" id="edit_jabatan<?= $jabatan->id_jabatan ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Pengaturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('Pengaturan/edit_jabatan'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Jabatan</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $jabatan->nama_jabatan ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nilai" class="col-form-label">Nilai</label>
                        <input type="text" class="form-control" id="nilai" name="nilai" value="<?= $jabatan->nilai_jabatan ?>" required>
                    </div>
                    <div class="form-group d-xl-none">
                        <label for="id_jabatan" class="col-form-label">Id Jabatan</label>
                        <input type="text" class="form-control" id="id_jabatan" name="id_jabatan" value="<?= $jabatan->id_jabatan ?>" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
