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
            $ket_kp = null;

            if(isset($_GET['dari']) && isset($_GET['ke']) || isset($_GET['kode_per']) || isset($_GET['j_kode'])){
                $b = $_GET['dari'];
                $t = $_GET['ke'];
                $j_kode = $_GET['j_kode'];

                foreach ($jurnal_bttb as $each) {
                    if ($each->id_bttb == $_GET['kode_per'] ) {
                        $k = $each->kode_perkiraan;
                        $n = $each->nomor_perkiraan;
                        $ket_kp = $each->keterangan;
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
    <table id="myTable" class="myTable table table-bordered table-striped">
        <thead>
            <tr>
                <th style="display: none;">Aksi</th>
                <th>Tgl Input</th>
                <th class="sticky">Kode Perkiraan</th>
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

                $put = $jurnal->kode_perkiraan;

                if(isset($_GET['dari']) && isset($_GET['ke']) || isset($_GET['kode_per']) || isset($_GET['j_kode'])) {

                    $angka_kiri = substr($_GET['j_kode'], 0, 1);

                    $k_kiri = substr($k, 0, 1);

                    if (($k == 'UTJ' || $_GET['j_kode'] == 'UTJ' || $_GET['j_kode'] == 'PUT' || $_GET['j_kode'] == 'PUT.VS' || $put == 'PUT' || $put == 'PUT.VS') || ($_GET['kode_per'] == 164 || $_GET['kode_per'] == 183 || $_GET['kode_per'] == 163 || $_GET['kode_per'] == 178 || $_GET['kode_per'] == 241 || $_GET['kode_per'] == 307 || $_GET['kode_per'] == 54) || (($k == 801 && in_array($n, [100, 101, 104, 105, 106, 107])) || ($k == 101 && in_array($n, [1, 2, 3, 4, 5])))) {
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
                    <td class="sticky">
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
        <th class="sticky"></th>
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


<!-- footer -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php 
$dari = isset($_GET['dari']) && strtotime($_GET['dari']) !== false ? date("d-m-Y", strtotime($_GET['dari'])) : null;
$ke = isset($_GET['ke']) && strtotime($_GET['ke']) !== false ? date("d-m-Y", strtotime($_GET['ke'])) : null;
$ket_1 = isset($_GET['kode_per']) ? $k : null;
$ket_2 = isset($_GET['kode_per']) ? $n : null;
$ket_3 = isset($_GET['kode_per']) ? $ket_kp : null;
$ket_4 = isset($_GET['j_kode']) ? $_GET['j_kode'] : null;

$title = $title; 

if ($dari && $ke) {
    if ($ket_1 || $ket_2 || $ket_3) {
        $title .= '\n' . '\n ' . $ket_1 . $ket_2 . ' - ' . $ket_3 . '\n Tanggal : ' . $dari . ' sampai : ' . $ke;
    }elseif($ket_4){
        $title .= '\n' . '\n ' . $ket_4 . '\n Tanggal : ' . $dari . ' sampai : ' . $ke;
    }else{
        $title .= '\n' . '\n Tanggal : ' . $dari . ' sampai : ' . $ke;
    }
}
elseif ($ket_1 || $ket_2 || $ket_3) {
    $title .= '\n' . '\n ' . $ket_1 . $ket_2 . ' - ' . $ket_3;
}
elseif ($ket_4) {
    $title .= '\n' . '\n ' . $ket_4;
}
?>

<script type="text/javascript">
    $(document).ready(function () {
        var fromDate = <?php echo json_encode($dari); ?>;
        var toDate = <?php echo json_encode($ke); ?>;
        var title = <?php echo json_encode($title); ?>;
        var ket_1 = <?php echo json_encode($ket_1); ?>;
        var ket_2 = <?php echo json_encode($ket_2); ?>;
        var ket_3 = <?php echo json_encode($ket_3); ?>;

        title = title.replace(/\\n/g, '\n');

        var table = $('#myTable').DataTable({
            buttons: [{
                extend: 'copyHtml5',
                footer: true,
                title: title
            },
            {
                extend: 'csvHtml5',
                footer: true,
                title: title
            },
            {
                extend: 'excelHtml5',
                footer: true,
                title: title
            },
            {
                extend: 'pdfHtml5',
                footer: true,
                title: title
            },
            {
                extend: 'print',
                footer: true,
                title: title
            }
            ],
            dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
            ],
            scrollX: true,
            autoWidth: true
        });

        table.buttons().container().appendTo('#table_wrapper .col-md-5:eq(0)');
    });
</script>

<!-- Select2 -->
<script src="<?php echo base_url('plugin/select2/js/select2.full.min.js'); ?>"></script>

<script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
  })
</script>

<script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

</html>