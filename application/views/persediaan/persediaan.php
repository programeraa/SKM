<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <?php require __DIR__ . '/../v_navigasi3.php'; ?>
        </div>

        <?php if ($level_asli != 'CMO') {?>
            <div class="text-right">
                <a href="<?= base_url('persediaan/tambah_jurnal/'); ?>"><button type="button" class="btn btn-success">Tambah Data</button></a>

                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button> -->
            </div> 
        <?php } ?>   
    </div>

    <?php //include "jurnal/tambah_jurnal.php" ?>

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
            <h4 class="card-title" style="text-align: center;">Jurnal Persediaan</h4>
            <?php if ($b != null) {?>
                <h5><?php echo '<div class="justify-content-center">
                <div class="col-auto text-center">
                <strong><span class= text-warning>Periode '.date("d-m-Y", strtotime($b)).' sampai '.date("d-m-Y", strtotime($t)).'</span></strong> 
                </div>
            </div>'; ?></h5> 
        <?php } ?>
    </div>
    <div class="card-body">
        <div class="pb-3 d-sm-flex justify-content-start">
            <form method="get" action="<?= base_url('persediaan/filterJurnal'); ?>">
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
        <table id="myTable" class="myTable table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Aksi</th>
                    <th>Tgl Input</th>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Kuantitas</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                $sum_saldo = 0;
                $sum_kredit = 0;

                $total_saldo = 0;
                $total_kredit = 0;

                $tanggal_jurnal = []; 

                foreach ($jurnal_persediaan as $jurnal) { 

                    $cell_content = '';

                    if (!in_array($jurnal->tgl_input_jurnal, $tanggal_jurnal)) {
                        $cell_content = $jurnal->tgl_input_jurnal;
                        $tanggal_jurnal[] = $jurnal->tgl_input_jurnal; 
                    }

                    $tgl_input_jurnal = ($cell_content !== '') ? date("d-m-Y", strtotime($cell_content)) : '';

                    foreach ($master_persediaan as $master) {
                        if ($jurnal->id_barang == $master->id_persediaan) {
                            $kode_barang = $master->kode_persediaan;
                            $nama_barang = $master->nama_persediaan;
                        }
                    }

                    foreach ($tampil_pengguna as $pengguna) {
                        if ($jurnal->admin_jurnal == $pengguna->id_pengguna) {
                            $nama_admin = $pengguna->nama_pengguna;
                        }
                    }

                    if ($jurnal->jenis_jurnal == 'Debit') {
                        $total_saldo = $sum_saldo += $jurnal->nominal_jurnal;
                    } else {
                        $total_kredit = $sum_kredit += $jurnal->nominal_jurnal;
                    }
                    ?>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihat_jurnal<?php echo $jurnal->id_jurnal; ?>" data-whatever="@getbootstrap" ><i class="fas fa-eye" title="Lihat Jurnal"></i></button>

                            <?php include "lihat_jurnal.php"; ?>

                            <?php if ($level_asli != 'CMO') {?>

                                <a href="<?= base_url('persediaan/edit_jurnal/' . $jurnal->id_jurnal.'?Kojur='.$jurnal->kode_jurnal); ?>" class="btn btn-success btn-sm" data-target="#editModal"><i class="fas fa-edit" title="Edit Jurnal"></i></a>

                                <a href="<?= base_url('persediaan/hapus_jurnal/' . $jurnal->id_jurnal); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data jurnal ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash" title="Hapus"></i></a>

                            <?php } ?>
                        </td>
                        <td><?= $tgl_input_jurnal ?></td>
                        <td>
                            <?php
                            echo "<span class='badge badge-success p-2'>".$kode_barang.' - '.$nama_barang."</span>";?>
                        </td>
                        <td><?= numberToRupiah2($jurnal->harga_satuan_jurnal); ?></td>
                        <td><?= $jurnal->kuantitas_jurnal ?></td>
                        <td>
                            <?php
                            if ($jurnal->jenis_jurnal == 'Debit') {
                                echo numberToRupiah2($jurnal->nominal_jurnal);
                            }else{
                                echo '';
                            }
                            ?> 
                        </td>
                        <td>
                            <?php
                            if ($jurnal->jenis_jurnal == 'Kredit') {
                                echo numberToRupiah2($jurnal->nominal_jurnal);
                            }else{
                                echo '';
                            }
                            ?>
                        </td>
                    </tr>
                    <?php $no++; } ?>
                </tbody>
                <tfoot>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><?= numberToRupiah2($total_saldo) ?></th>
                    <th><?= numberToRupiah2($total_kredit) ?></th>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
</body>
