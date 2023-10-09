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
                    <div class="row">
                        <div class="col-md-6">

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
                                <label for="level" class="col-form-label">Level Akun</label>
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
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="g_ktp" class="col-form-label">Foto TTD</label>
                                <br>
                                <?php if ($gambar_ttd == 1) { ?>
                                    <img style="width: 200px; height: 130px;" src="<?= base_url('assets/foto_ttd/' . $user->gambar_ttd_pengguna) ?>" alt="Gambar TTD">
                                    <br>
                                    <a style="width: 200px;" href="<?= base_url('Pengguna/hapus_gambar_ttd/' . $user->id_pengguna); ?>" class="btn btn-danger">Hapus Gambar TTD</a>
                                <?php } else { ?>
                                    <img style="width: 200px; height: 130px;" src="<?= base_url('assets/foto_ttd/tidak_ada.jpg') ?>" alt="Gambar TTD">
                                <?php } ?>
                                <br>
                                <br>
                                <input type="file" class="form-control" id="g_ttd" name="g_ttd" value="<?php echo $user->gambar_ttd_pengguna; ?>">
                                <input type="hidden" class="form-control" name="g_ttd2" value="<?php echo $user->gambar_ttd_pengguna; ?>">
                            </div>
                        </div>
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

