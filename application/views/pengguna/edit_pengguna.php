 <!--   Modal Tambah Data-->
 <div class="modal fade" id="edit_pengguna<?php echo $user->id_pengguna; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('Pengguna/update_pengguna'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama Pengguna</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user->nama_pengguna ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $user->username_pengguna ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="" placeholder="Isi Jika Ingin Ganti Password">
                    </div>
                    <div class="form-group">
                        <label for="level" class="col-form-label">Level Akuns</label>
                        <select class="form-control" id="level" name="level" required>
                            <option value="">Pilih Level</option>
                            <?php
                            if ($user->level_pengguna == "Administrator") echo "<option value='Administrator' selected>Administrator</option>";
                            else echo "<option value='Administrator'>Administrator</option>";

                            if ($user->level_pengguna == "CMO") echo "<option value='CMO' selected>CMO</option>";
                            else echo "<option value='CMO'>CMO</option>";
                            ?>
                        </select>
                    </div>
                    <input type="hidden" class="form-control" id="id_pengguna" name="id_pengguna" value="<?= $user->id_pengguna ?>" required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
