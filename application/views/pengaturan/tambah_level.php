 <!--   Modal Tambah Data-->
 <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Level Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('Pengaturan/tambah_level'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="level" class="col-form-label">Level</label>
                        <input type="text" class="form-control" id="level" name="level" required>
                    </div>
                    <div class="form-group">
                        <label for="akses" class="col-form-label">Akses</label>
                        <select class="form-control" id="akses" name="akses">
                            <option value="">Pilih Akses</option>
                            <option value="Semua">Semua</option>
                            <option value="Komisi & Akunting">Komisi & Akunting</option>
                            <option value="Komisi">Komisi</option>
                            <option value="Akunting">Akunting</option>
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
