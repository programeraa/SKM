 <!--   Modal Tambah Data-->
 <div class="modal fade" id="edit_member<?= $member_mar->id_member ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('Pengaturan/edit_member'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="member" class="col-form-label">Member</label>
                        <input type="text" class="form-control" id="member" name="member" value="<?= $member_mar->member ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nilai_s" class="col-form-label">Nilai Secondary</label>
                        <input type="text" class="form-control" id="nilai_s" name="nilai_s" value="<?= $member_mar->nilai_secondary ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nilai_kpr" class="col-form-label">Nilai KPR</label>
                        <input type="text" class="form-control" id="nilai_kpr" name="nilai_kpr" value="<?= $member_mar->nilai_kpr ?>" required>
                    </div>
                    <div class="form-group d-xl-none">
                        <label for="id_member" class="col-form-label">Id Jabatan</label>
                        <input type="text" class="form-control" id="id_member" name="id_member" value="<?= $member_mar->id_member ?>" required>
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
