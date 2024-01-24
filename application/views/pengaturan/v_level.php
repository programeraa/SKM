<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <?php require __DIR__ . '/../v_navigasi.php'; ?>
        <?php if ($level_asli != 'CMO'): ?> 
            <div class="text-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
            </div>
        <?php endif ?>
    </div>

    <?php include "tambah_level.php" ?>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title" style="text-align: center;">Data Level Pengguna</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Level</th>
                            <th>Akses</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($tampil_level as $level) { 

                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $level->level; ?></td>
                                <td><?= $level->akses_level; ?></td>
                                <td>
                                    <?php if ($level_asli != 'CMO'){ ?> 
                                        <a href="#" data-toggle="modal" data-target="#edit_level<?php echo $level->id_level; ?>" class="btn btn-primary"><i class="fas fa-edit" title="Edit"></i></a>

                                        <?php include "edit_level.php" ?>

                                        <a href="<?= base_url('pengaturan/hapus_level/' . $level->id_level); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data level?')" class="btn btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
                                    <?php } ?>
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
