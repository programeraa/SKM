<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <?php require __DIR__ . '/../v_navigasi.php'; ?>
        <?php if ($level == 'Administrator'): ?> 
            <div class="text-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
            </div>
        <?php endif ?>
    </div>

    <?php include "tambah_kantor.php" ?>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title" style="text-align: center;">Data Kantor</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kantor</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($semua_kantor as $kantor) { 

                            $hapus = true;

                            foreach ($komisi as $kms) {
                                if ($kms->kantor_komisi == $kantor->id_kantor) {
                                    $hapus = false;
                                }
                            }
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $kantor->kantor; ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#edit_kantor<?php echo $kantor->id_kantor; ?>" class="btn btn-primary"><i class="fas fa-edit" title="Edit"></i></a>

                                    <?php include "edit_kantor.php" ?>

                                    <?php if ($hapus) {?>
                                        <a href="<?= base_url('pengaturan/hapus_kantor/' . $kantor->id_kantor); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data kantor?')" class="btn btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
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
