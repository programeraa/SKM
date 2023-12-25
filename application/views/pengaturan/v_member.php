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

    <?php include "tambah_member.php" ?>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title" style="text-align: center;">Data Member Marketing</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Member</th>
                            <th>Nilai Secondary</th>
                            <th>Nilai KPR</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($member as $member_mar) { 
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $member_mar->member; ?></td>
                                <td><?= $member_mar->nilai_secondary; ?></td>
                                <td><?= $member_mar->nilai_kpr; ?></td>
                                <td>
                                    <?php if ($level_asli != 'CMO'){ ?> 
                                        <a href="#" data-toggle="modal" data-target="#edit_member<?php echo $member_mar->id_member; ?>" class="btn btn-primary"><i class="fas fa-edit" title="Edit"></i></a>

                                        <?php include "edit_member.php" ?>

                                        <a href="<?= base_url('pengaturan/hapus_member/' . $member_mar->id_member); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data member?')" class="btn btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
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
