<?php include "session_identitas.php"; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <?php include "v_navigasi2.php" ?>
            <!-- <?php if ($level == 'Administrator'): ?> 
                <div class="text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
                </div>
                <?php endif ?> -->
            </div>

            <?php include "bank_titipan/tambah_bt.php" ?>

            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4 class="card-title" style="text-align: center;">Data Bank Titipan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Perkiraan</th>
                                    <th>Properti</th>
                                    <th>Status</th>
                                    <th>Marketing</th>
                                    <th>Input</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; 
                                foreach ($bank_titipan as $bt) {
                                    $nominal = stringToNumber($bt->nilai_nominal);
                                    $nominal_r = numberToRupiah($nominal);

                                    $tgl_input = date("d-m-Y", strtotime($bt->tgl_input));

                                    ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $bt->kode_perkiraan ?></td>
                                        <td><?= $bt->nama_properti ?></td>
                                        <td><?= $bt->status_properti ?></td>
                                        <td><?= $bt->nama_mar ?></td>
                                        <td><?= $tgl_input ?></td>
                                        <td><?= $nominal_r ?></td>
                                        <td><?= $bt->keterangan ?></td>
                                        <td>
                                            <a href="<?= base_url('BankTitipan/rincian/' . $bt->id_bta); ?>"data-target="#editModal" class="btn btn-primary"><i class="fas fa-list" title="Rincian"></i></a>

                                            <?php include "bank_titipan/lihat_bt.php" ?>


                                            <a href="<?= base_url('BankTitipan/edit/' . $bt->id_bta); ?>" class="btn btn-success" data-target="#editModal"><i class="fas fa-edit" title="Edit"></i></a>

                                            <a href="<?= base_url('BankTitipan/hapus/' . $bt->id_bta); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data bank titipan?')" class="btn btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
                                        </td>
                                    </tr>
                                    <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
