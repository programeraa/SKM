 <!--   Modal Tambah Data-->
 <div class="modal fade" id="edit_level<?= $level->id_level ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Level Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('Pengaturan/update_level'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="level" class="col-form-label">Level</label>
                        <input type="text" class="form-control" id="level" name="level" value="<?= $level->level ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="akses" class="col-form-label">Akses</label>
                        <select class="form-control" id="akses" name="akses">
                            <option value="">Pilih Akses</option>
                            <?php 
                            if ($level->akses_level == "Semua") echo "<option value='Semua' selected>Semua</option>";
                            else echo "<option value='Semua'>Semua</option>";

                            if ($level->akses_level == "Komisi & Akunting") echo "<option value='Komisi & Akunting' selected>Komisi & Akunting</option>";
                            else echo "<option value='Komisi & Akunting'>Komisi & Akunting</option>";

                            if ($level->akses_level == "Komisi") echo "<option value='Komisi' selected>Komisi</option>";
                            else echo "<option value='Komisi'>Komisi</option>";

                            if ($level->akses_level == "Akunting") echo "<option value='Akunting' selected>Akunting</option>";
                            else echo "<option value='Akunting'>Akunting</option>";

                        ?>
                    </select>
                </div>
                <div class="form-group d-xl-none">
                    <label for="id_level" class="col-form-label">Id Level</label>
                    <input type="text" class="form-control" id="id_level" name="id_level" value="<?= $level->id_level ?>" required>
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
