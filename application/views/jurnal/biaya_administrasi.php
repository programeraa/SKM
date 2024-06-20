<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <?php require __DIR__ . '/../v_navigasi2.php'; ?>
        </div>
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
            <h4 class="card-title" style="text-align: center;">Sub Ledger Biaya Administrasi Pusat</h4>
            <?php if ($b != null){ ?>
                <h5>
                  <?php 
                  echo '<div class="justify-content-center">
                  <div class="col-auto text-center">
                  <strong><span class="text-warning">Periode '.date("d-m-Y", strtotime($b)).' sampai '.date("d-m-Y", strtotime($t)).'</span></strong> 
                  </div>';
                  ?>
              </h5>
          <?php } ?>
      </div>
      <div class="card-body">
        <div class="pb-3 d-sm-flex justify-content-start">
            <form method="get" action="<?= base_url('jurnal/filterBiayaAdministrasi'); ?>">
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
                    <th>Keterangan</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $saldo_akhir = 0 ;
                $total_saldo_akhir = 0 ;

                foreach ($total_biaya as $biaya) { 
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td>
                            <?php 
                            if (strpos($biaya->kode_perkiraan, 'BT') !== false) {
                                echo "<span class='badge badge-primary p-2'>".$biaya->kode_perkiraan.'-'.$biaya->nomor_perkiraan."</span>";
                            }else{
                                echo "<span class='badge badge-success p-2'>".$biaya->kode_perkiraan.'-'.$biaya->nomor_perkiraan."</span>";
                            }?>
                        </td>
                        <td><?= $biaya->keterangan ?></td>
                        <td>
                            <?php
                            $total_nominal = 0;
                            foreach ($jurnal_umum as $jurnal) {
                                if ($jurnal->id_bttb == $biaya->id_bttb) {
                                    if ($jurnal->jenis_jurnal == 'Debit') {
                                        $total_nominal += $jurnal->nominal_jurnal;
                                    } elseif ($jurnal->jenis_jurnal == 'Kredit') {
                                        $total_nominal -= $jurnal->nominal_jurnal;
                                    }
                                }

                            }
                            $total_saldo_akhir = $saldo_akhir += $total_nominal;
                            echo numberToRupiah2(abs($total_nominal));
                            ?>
                        </td>

                    </tr>
                    <?php $no++;
                } ?>
            </tbody>
            <tfoot>
                <th>Total</th>
                <th></th>
                <th></th>
                <th><?= numberToRupiah2($total_saldo_akhir)  ?></th>
            </tfoot>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>
</body>
