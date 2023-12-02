<?php include "session_identitas.php" ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <?php require'v_navigasi.php'; ?>
        <?php if ($level == 'Administrator'): ?> 
            <div class="text-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
            </div>
        <?php endif ?>
        <!-- <div class="text-right">
            <a href="<?= base_url('Komisi/komisi'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
        </div> -->
    </div>

    <?php include "pengaturan/tambah_jabatan.php" ?>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title" style="text-align: center;">Data Jabatan Marketing</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jabatan</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jabatan as $jabatan) { 
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $jabatan->nama_jabatan; ?></td>
                                <td><?= $jabatan->nilai_jabatan; ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#edit_jabatan<?php echo $jabatan->id_jabatan; ?>" class="btn btn-primary"><i class="fas fa-edit" title="Edit"></i></a>

                                    <?php include "pengaturan/edit_jabatan.php" ?>

                                    <a href="<?= base_url('pengaturan/hapus_jabatan/' . $jabatan->id_jabatan); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data jabatan?')" class="btn btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
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
