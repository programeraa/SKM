<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <?php require __DIR__ . '/../v_navigasi3.php'; ?>
        </div>

        <?php if ($level_asli != 'CMO') {?>
            <div class="text-right">
                <!-- <a href="<?= base_url('jurnal/tambah_jurnal/'); ?>"><button type="button" class="btn btn-success">Tambah Data</button></a> -->

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
            </div>    
        <?php } ?>
    </div>

    <?php include "tambah_persediaan.php" ?>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title" style="text-align: center;">Master Persediaan</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="myTable table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($master_persediaan as $master) {

                            $jangan_hapus = false;

                            foreach ($jurnal_persediaan as $jurnal) {
                                if ($jurnal->id_barang == $master->id_persediaan) {
                                    $jangan_hapus = true;
                                }
                            }?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $master->kode_persediaan ?></td>
                                <td><?= $master->nama_persediaan ?></td>
                                <td><?= numberToRupiah2($master->harga_persediaan) ?></td>
                                <td><?= $master->stok_persediaan ?></td>
                                <td>
                                    <?php if ($level_asli != 'CMO') {?>
                                        <a href="#" data-toggle="modal" data-target="#edit_persediaan<?php echo $master->id_persediaan; ?>" class="btn btn-primary"><i class="fas fa-edit" title="Edit"></i></a>

                                        <?php include "edit_persediaan.php" ?>

                                        <?php if (!$jangan_hapus): ?>
                                            <a href="<?= base_url('persediaan/hapus_persediaan/' . $master->id_persediaan); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data persediaan?')" class="btn btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
                                        <?php endif ?>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php $no++;
                        } ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
