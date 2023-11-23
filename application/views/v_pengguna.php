<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <a href="<?= base_url('Komisi/komisi'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
        </div>
    </div>

    <?php include "pengguna/tambah_pengguna.php" ?>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title" style="text-align: center;">Data Pengguna</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pengguna as $user) { 
                            if (!empty($user->gambar_ttd_pengguna)) {
                                $gambar_ttd = 1;
                            }else{
                                $gambar_ttd = 0;
                            }
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $user->nama_pengguna ?></td>
                                <td><?= $user->username_pengguna ?></td>
                                <td><?= $user->level_pengguna ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#edit_pengguna<?php echo $user->id_pengguna; ?>" class="btn btn-primary"><i class="fas fa-edit" title="Edit"></i></a>

                                    <?php include "pengguna/edit_pengguna.php" ?>

                                    <a href="<?= base_url('pengguna/hapus/' . $user->id_pengguna); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data pengguna?')" class="btn btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
                                </td>
                            </tr>
                            <?php $no++;
                        } ?>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
