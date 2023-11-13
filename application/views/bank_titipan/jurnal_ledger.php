<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <?php include __DIR__ . "/../v_navigasi2.php" ?>
        <div class="text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
        </div>
    </div>

    <?php include "tambah_jl.php" ?>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <?php 
            if(isset($_GET['dari']) && isset($_GET['ke'])){
                $b = $_GET['dari'];
                $t = $_GET['ke'];

            }else{
                $b = null;
                $t = null;
            }
            ?>

            <?php if ($b == null) {?>
                <h4 class="card-title" style="text-align: center;">Jurnal Ledger</h4>
            <?php }else{ ?>
                <h4 class="card-title" style="text-align: center;">Jurnal Ledger</h4>
                <h5><?php echo '<div class="justify-content-center">
                <div class="col-auto text-center">
                <strong><span class= text-warning>Periode '.date("d-m-Y", strtotime($b)).' sampai '.date("d-m-Y", strtotime($t)).'</span></strong> 
                </div>
            </div>'; }?></h5> 
        </div>
        <div class="card-body">
            <div class="pb-3 d-sm-flex justify-content-start">
                <form method="get" action="<?= base_url('BankTitipan/filterDataJurnalLedger'); ?>">
                    <div class="row g-3 align-items-center justify-content-end">
                      <div class="col-auto">
                        <label class="col-form-label">Periode</label>
                    </div>
                    <div class="col-auto p-0">
                        <input type="date" class="form-control" name="dari" >
                    </div>
                    <div class="col-auto">
                        -
                    </div>
                    <div class="col-auto p-0">
                        <input type="date" class="form-control" name="ke">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit">Tampilkan</button>
                    </div>
                </div>
            </form>
        </div>
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
                        <th>Jenis</th>
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
                            <td><?= $bt->jenis ?></td>
                            <td><?= $bt->keterangan ?></td>
                            <td>
                                <a href="<?= base_url('BankTitipan/rincian_ledger/' . $bt->id_bta); ?>"data-target="#editModal" class="btn btn-primary"><i class="fas fa-list" title="Rincian"></i></a>

                                <?php include "lihat_jl.php" ?>


                                <a href="<?= base_url('BankTitipan/edit_ledger/' . $bt->id_bta); ?>" class="btn btn-success" data-target="#editModal"><i class="fas fa-edit" title="Edit"></i></a>

                                <a href="<?= base_url('BankTitipan/hapus_ledger/' . $bt->id_bta); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data bank titipan?')" class="btn btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
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
