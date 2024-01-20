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
            $k = null;
            $n = null;
            if(isset($_GET['dari']) && isset($_GET['ke']) || isset($_GET['kode_per']) || isset($_GET['j_kode'])){
                $b = $_GET['dari'];
                $t = $_GET['ke'];
                $j_kode = $_GET['j_kode'];

                foreach ($jurnal_bttb as $each) {
                    if ($each->id_bttb == $_GET['kode_per'] ) {
                        $k = $each->kode_perkiraan;
                        $n = $each->nomor_perkiraan;
                    }
                }
            }else{
                $b = null;
                $t = null;
                $j_kode = null;

                $kode = null;
                $ket = null;
            }

            if (isset(($_GET['kode']))) {
                $kode = $_GET['kode'];
                $ket = $_GET['ket'];
            }else{
                $kode = null;
                $ket = null;
            }
            ?>
            <h4 class="card-title" style="text-align: center;">Buku Besar</h4>
            <?php if ($b != null){ ?>
                <h5>
                  <?php 
                  echo '<div class="justify-content-center">
                  <div class="col-auto text-center">
                  <strong><span class="text-warning">Periode '.date("d-m-Y", strtotime($b)).' sampai '.date("d-m-Y", strtotime($t)).'</span></strong> 
                  </div>';

                  if ($j_kode != null && $k != null) {
                      echo '<div class="col-auto text-center">
                      <strong><span class="text-warning">Jenis Kode Perkiraan ('.$j_kode.') - Kode Perkiraan ('.$k.$n.')</span></strong> 
                      </div>
                      </div>'; 
                  }elseif($j_kode != null && $k == null){
                    echo '<div class="col-auto text-center">
                    <strong><span class="text-warning">Jenis Kode Perkiraan ('.$j_kode.')</span></strong> 
                    </div>
                    </div>'; 
                }elseif($j_kode == null && $k != null){
                    echo '<div class="col-auto text-center">
                    <strong><span class="text-warning">Kode Perkiraan ('.$k.$n.')</span></strong> 
                    </div>
                    </div>'; 
                }
                ?>
            </h5>

        <?php }elseif($j_kode != null){ ?>
            <h5><?php 
            if ($k != null) {
              echo '<div class="col-auto text-center">
              <strong><span class="text-warning">Jenis Kode Perkiraan ('.$j_kode.') - Kode Perkiraan ('.$k.')</span></strong> 
              </div>
              </div>'; 
          }else{
            echo '<div class="col-auto text-center">
            <strong><span class="text-warning">Jenis Kode Perkiraan ('.$j_kode.')</span></strong> 
            </div>
            </div>'; 
        }
    ?></h5> 
<?php }elseif($k != null){ ?>
    <h5><?php 
    if ($j_kode != null && $k != null) {
      echo '<div class="col-auto text-center">
      <strong><span class="text-warning">Jenis Kode Perkiraan ('.$j_kode.') - Kode Perkiraan ('.$k.')</span></strong> 
      </div>
      </div>'; 
  }else{
    echo '<div class="col-auto text-center">
    <strong><span class="text-warning">Kode Perkiraan ('.$k.$n.')</span></strong> 
    </div>
    </div>';
}
?></h5> 
<?php }elseif($kode != null){ ?>
    <h5>
        <?php 
        echo '<div class="col-auto text-center">
        <strong><span class="text-warning">Rincian Jurnal ('.$kode.' - '.$ket.')</span></strong> 
        </div>
        </div>';
        ?>
    </h5>
<?php } ?>
</div>
<div class="card-body">
    <div class="pb-3 d-sm-flex justify-content-start">
        <form method="get" action="<?= base_url('jurnal/filterBukuBesar'); ?>">
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
            <div class="col-auto pr-0" style="width: 300px;">
                <select class="form-control select2bs4" id="kode_per" name="kode_per">
                    <option value="">Kode Perkiraan</option>
                    <?php 
                    foreach($jurnal_bttb as $each){ ?>
                        <option value="<?php echo $each->id_bttb; ?>">
                            <?= $each->kode_perkiraan; ?><?= $each->nomor_perkiraan; ?> - <?= $each->keterangan; ?> 
                        </option>;
                    <?php } ?>
                </select>
            </div>
            <div class="col-auto pr-0">
                <select class="form-control select2bs4" id="j_kode" name="j_kode">
                    <option value="">Jenis Kode Perkiraan</option>
                    <?php 
                    $kode_perkiraan_values = array_unique(array_column($jurnal_bttb, 'kode_perkiraan'));
                    foreach($kode_perkiraan_values as $kode_perkiraan) { 
                        ?>
                        <option value="<?= $kode_perkiraan; ?>">
                            <?= $kode_perkiraan; ?>
                        </option>
                    <?php } ?>
                </select>
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
                <th style="display: none;">Aksi</th>
                <th>Tgl Input</th>
                <th>Kode Perkiraan</th>
                <th>Keterangan</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Saldo Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $saldo_akhir = 0;
            $sum_saldo = 0;
            $sum_kredit = 0;
            $sum_saldo_akhir = 0;

            $total_saldo = 0;
            $total_kredit = 0;
            $total_saldo_akhir = 0;

            $tanggal_jurnal = []; 

            $warna = '';

            foreach ($jurnal_umum as $jurnal) { 

                $cell_content = '';

                if (!in_array($jurnal->tgl_input_jurnal, $tanggal_jurnal)) {
                    $cell_content = $jurnal->tgl_input_jurnal;
                    $tanggal_jurnal[] = $jurnal->tgl_input_jurnal; 
                }

                $tgl_input_jurnal = ($cell_content !== '') ? date("d-m-Y", strtotime($cell_content)) : '';

                if (strpos($jurnal->keterangan_jurnal, 'Saldo Awal') !== false) {
                    $saldo_akhir += $jurnal->nominal_jurnal;
                }

                if (strpos($jurnal->keterangan_jurnal, 'Koreksi Saldo') !== false) {
                    $saldo_akhir += $jurnal->nominal_jurnal;
                }

                if(isset($_GET['dari']) && isset($_GET['ke']) || isset($_GET['kode_per']) || isset($_GET['j_kode'])) {

                    $angka_kiri = substr($_GET['j_kode'], 0, 1);

                    $k_kiri = substr($k, 0, 1);

                    if (($k == 'UTJ' || $_GET['j_kode'] == 'UTJ') || (($k == 801 && in_array($n, [100, 101, 104, 105, 106, 107])) || ($k == 101 && in_array($n, [1, 2, 3, 4, 5])))) {
                        if ($jurnal->jenis_jurnal == 'Debit') {
                            $saldo_akhir -= $jurnal->nominal_jurnal;
                            $total_saldo = $sum_saldo += $jurnal->nominal_jurnal;
                        } elseif ($jurnal->jenis_jurnal == 'Kredit') {
                            $saldo_akhir += $jurnal->nominal_jurnal;
                            $total_kredit = $sum_kredit += $jurnal->nominal_jurnal;
                        }
                        $warna = 'Tidak Merah';
                    }
                    elseif(($k_kiri == '2' || $k_kiri == '3' || $k_kiri == '4' || $k_kiri == '5') && ($angka_kiri == '2' || $angka_kiri == '3' || $angka_kiri == '4' || $angka_kiri == '5')){
                        if ($jurnal->jenis_jurnal == 'Debit') {
                            $saldo_akhir += $jurnal->nominal_jurnal;
                            $total_saldo = $sum_saldo += $jurnal->nominal_jurnal;
                        } elseif ($jurnal->jenis_jurnal == 'Kredit') {
                            $saldo_akhir -= $jurnal->nominal_jurnal;
                            $total_kredit = $sum_kredit += $jurnal->nominal_jurnal;
                        }

                        $warna = 'Tidak Merah';

                    }
                    else{
                        if ($jurnal->jenis_jurnal == 'Debit') {
                            $saldo_akhir += $jurnal->nominal_jurnal;
                            $total_saldo = $sum_saldo += $jurnal->nominal_jurnal;
                        } elseif ($jurnal->jenis_jurnal == 'Kredit') {
                            $saldo_akhir -= $jurnal->nominal_jurnal;
                            $total_kredit = $sum_kredit += $jurnal->nominal_jurnal;
                        }

                        $warna = 'Tidak Merah';
                    }
                }else{
                    if ($jurnal->jenis_jurnal == 'Debit') {
                        $saldo_akhir += $jurnal->nominal_jurnal;
                        $total_saldo = $sum_saldo += $jurnal->nominal_jurnal;
                    } elseif ($jurnal->jenis_jurnal == 'Kredit') {
                        $saldo_akhir -= $jurnal->nominal_jurnal;
                        $total_kredit = $sum_kredit += $jurnal->nominal_jurnal;
                    }
                }

                $total_saldo_akhir = $sum_saldo_akhir += $saldo_akhir;

                ?>
                <tr>
                    <td style="display: none;">
                        <a href="<?= base_url('jurnal/edit_jurnal/' . $jurnal->id_jurnal); ?>" class="btn btn-success btn-sm" data-target="#editModal"><i class="fas fa-edit" title="Edit Jurnal"></i></a>

                        <a href="<?= base_url('jurnal/hapus_jurnal/' . $jurnal->id_jurnal); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data jurnal ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash" title="Hapus"></i></a>
                    </td>
                    <td><?= $tgl_input_jurnal ?></td>
                    <td>
                        <?php 
                        if ($jurnal->kode_perkiraan == '') {
                           echo '';
                       }elseif (strpos($jurnal->kode_perkiraan, 'BT') !== false) {
                        echo "<span class='badge badge-primary p-2'>".$jurnal->kode_perkiraan.$jurnal->nomor_perkiraan." - ".$jurnal->keterangan."</span>";
                    }else{
                        echo "<span class='badge badge-success p-2'>".$jurnal->kode_perkiraan.$jurnal->nomor_perkiraan." - ".$jurnal->keterangan."</span>";

                            // $kode_bt = '';

                            // foreach ($jurnal_umum as $jurnal_2) {
                            //     if ($jurnal_2->tgl_input_jurnal == $jurnal->tgl_input_jurnal && strpos($jurnal_2->kode_perkiraan, 'BT') !== false) {
                            //         $kode_bt = 'BT';
                            //     }
                            // }

                            // if (!isset($editLinkDisplayed[$jurnal->tgl_input_jurnal . $jurnal->kode_perkiraan])) {
                            //     echo '<a href="' . base_url('jurnal/filterBukuBesar/?kode=' . $jurnal->kode_perkiraan . '&tgl=' . $jurnal->tgl_input_jurnal.'&ket=' . $jurnal->keterangan. '&bt=' . $kode_bt) . '" class="btn btn-warning btn-sm ml-2" data-target="#editModal"><i class="fas fa-list" title="Rincian Jurnal"></i></a>';

                            //     $editLinkDisplayed[$jurnal->tgl_input_jurnal . $jurnal->kode_perkiraan] = true;
                            // }

                    }?>
                </td>
                <td>
                    <?php
                    if ($jurnal->id_bttb == 0 && strpos($jurnal->keterangan_jurnal, 'Saldo Awal') !== false) {
                        echo "<span class='badge badge-success p-2'>" . $jurnal->keterangan_jurnal." - ".number_format($jurnal->nominal_jurnal). "</span>";
                    }elseif ($jurnal->id_bttb == 0 && strpos($jurnal->keterangan_jurnal, 'Koreksi Saldo') !== false) {
                        echo "<span class='badge badge-primary p-2'>" . $jurnal->keterangan_jurnal." - ".number_format($jurnal->nominal_jurnal)."</span>";
                    }else{
                       echo $jurnal->keterangan_jurnal;
                   }
                   ?>
               </td>
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
            <td>
                <?php
                if ($warna == 'Tidak Merah') {
                    echo numberToRupiah2($saldo_akhir);
                }elseif($warna == 'Tidak Merah' && $saldo_akhir > 0){
                    echo "<span class='badge badge-danger p-2'>" . numberToRupiah2($saldo_akhir) . "</span>";
                }elseif ($saldo_akhir < 0 && $jurnal->jenis_jurnal == 'Kredit') {
                    echo "<span class='badge badge-danger p-2'>" . numberToRupiah2($saldo_akhir) . "</span>";
                }elseif ($jurnal->jenis_jurnal == 'Debit') {
                    echo numberToRupiah2($saldo_akhir);
                }else{
                    echo numberToRupiah2($jurnal->nominal_jurnal);
                }
                ?>
            </td>

        </tr>
        <?php $no++;
    } ?>
</tbody>
<tfoot>
    <tr>
        <th>Total</th>
        <th style="display: none;"></th>
        <th></th>
        <th></th>
        <th><?= numberToRupiah2($total_saldo) ?></th>
        <th><?= numberToRupiah2($total_kredit) ?></th>
                <th><!-- <?php
                if ($saldo_akhir != 0) {
                    echo "<span class='badge badge-danger p-2'>" . numberToRupiah2($saldo_akhir) . "</span>";
                } else {
                    echo numberToRupiah2($saldo_akhir);
                }
            ?> -->
        </th>
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
