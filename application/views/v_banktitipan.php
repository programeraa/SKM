<?php include "session_identitas.php"; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <?php include "v_navigasi2.php" ?>
    </div>

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
                <h4 class="card-title" style="text-align: center;">Jurnal Umum</h4>
            <?php }else{ ?>
                <h4 class="card-title" style="text-align: center;">Jurnal Umum</h4>
                <h5><?php echo '<div class="justify-content-center">
                <div class="col-auto text-center">
                <strong><span class= text-warning>Periode '.date("d-m-Y", strtotime($b)).' sampai '.date("d-m-Y", strtotime($t)).'</span></strong> 
                </div>
            </div>'; }?></h5> 
        </div>
        <div class="card-body">
            <div class="pb-3 d-sm-flex justify-content-start">
                <form method="get" action="<?= base_url('BankTitipan/filterDataJurnalUmum'); ?>">
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
                        <th>Saldo Awal</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Saldo Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; 
                    $sum_debit = 0;
                    $sum_kredit = 0;
                    $sum_saldo_akhir = 0;
                    foreach ($bank_titipan as $bt) {
                        $sum_kredit_per_baris = 0;
                        $ada_kredit = 0;
                        foreach ($kredit_jl as $kredit) {
                            if ($kredit->id_bta == $bt->id_bta) {
                                $sum_kredit_per_baris += $kredit->nominal_kredit;
                                $ada_kredit = $kredit->nominal_kredit;
                            }
                        }

                        $kredit = stringToNumber($sum_kredit_per_baris);
                        $kredit_r = numberToRupiah($kredit);

                        $saldo_akhir = stringToNumber($bt->nilai_nominal - $sum_kredit_per_baris);
                        $saldo_akhir_r = numberToRupiah($saldo_akhir);

                        if ($bt->jenis == 'Debit') {
                            $sum_debit += $bt->nilai_nominal;
                        }

                        $nilai_kredit = 0;
                        if ($bt->jenis == 'Kredit') {
                            $nilai_kredit += $bt->nilai_nominal;
                        }

                        $total_debit = stringToNumber($sum_debit);
                        $total_debit_r = numberToRupiah($total_debit);

                        // $total_debit = stringToNumber($sum_debit += $bt->nilai_nominal);
                        // $total_debit_r = numberToRupiah($total_debit);

                        $total_kredit = stringToNumber($sum_kredit += $sum_kredit_per_baris + $nilai_kredit);
                        $total_kredit_r = numberToRupiah($total_kredit);

                        $total_saldo_akhir = stringToNumber($sum_saldo_akhir += $saldo_akhir);
                        $total_saldo_akhir_r = numberToRupiah($total_saldo_akhir);

                        $nominal = stringToNumber($bt->nilai_nominal);
                        $nominal_r = numberToRupiah($nominal);

                        $tgl_input = date("d-m-Y", strtotime($bt->tgl_input));

                        $nama_mar = null;
                        foreach ($marketing as $mar) {
                            if ($mar->id_mar == $bt->id_marketing) {
                                 $nama_mar = $mar->nama_mar;
                                 break;
                            }
                        }

                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $bt->kode_perkiraan ?></td>
                            <td><?= $bt->nama_properti ?></td>
                            <td><?= $bt->status_properti ?></td>
                            <td><?= $nama_mar ?></td>
                            <td><?= $tgl_input ?></td>
                            <td></td>
                            <td>
                                <?php 
                                if ($bt->jenis == 'Debit') {
                                    echo $nominal_r;
                                }else{
                                    echo '';
                                }
                                ?>
                            </td>
                            <td><?php
                            if ($bt->jenis == 'Kredit') {
                                if ($nominal != 0) {
                                    if ($ada_kredit != 0) {
                                        echo numberToRupiah($akhir = $nominal + $ada_kredit);
                                    }else{
                                     echo $nominal_r;
                                 }
                             }else{
                                echo '';
                            }
                        }else{
                            if ($kredit != 0) {
                                echo $kredit_r;
                            }else{
                                echo '';
                            }
                        }
                        ?>
                    </td>
                    <td><?= $saldo_akhir_r ?></td>
                </tr>
                <?php $no++;
            } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Total</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th><?= $total_debit_r ?></th>
                <th><?= $total_kredit_r ?></th>
                <th><?= $total_saldo_akhir_r ?></th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
