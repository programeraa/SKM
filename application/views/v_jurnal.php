<?php include 'session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <?php require 'v_navigasi2.php'; ?>
        </div>
        <?php
        $tampil_tambah = true;
        $bulan_tahun_saat_ini = date("m-Y");

        foreach ($tutup_jurnal as $ttp_j) {
            $tgl_input_tutup_jurnal = date("m-Y", strtotime($ttp_j->tgl_jurnal));

            if (isset($_GET['dari']) && isset($_GET['ke'])){
                $cari_dari = date("m-Y", strtotime($_GET['dari']));
                $cari_ke = date("m-Y", strtotime($_GET['ke']));

                if ($tgl_input_tutup_jurnal == $cari_dari || $tgl_input_tutup_jurnal == $cari_ke) {
                    $tampil_tambah = false;
                }

                if ($_GET['dari'] == '' || $_GET['ke'] == '' ) {
                    $tampil_tambah = false;
                }
            }else{
                if ($tgl_input_tutup_jurnal == $bulan_tahun_saat_ini) {
                    $tampil_tambah = false;
                }
            }
        }
        ?>

        <?php if ($level_asli != 'CMO' && $tampil_tambah) {?>
            <div class="text-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
            </div>
        <?php } ?>
    </div>

    <?php include "jurnal/tambah_jurnal.php" ?>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <?php 
            $monthTranslations = array(
                'January' => 'Januari',
                'February' => 'Februari',
                'March' => 'Maret',
                'April' => 'April',
                'May' => 'Mei',
                'June' => 'Juni',
                'July' => 'Juli',
                'August' => 'Agustus',
                'September' => 'September',
                'October' => 'Oktober',
                'November' => 'November',
                'December' => 'Desember'
            );

            $k = null;

            date_default_timezone_set("Asia/Jakarta");
            $waktu = date("Y-m-d H:i:s");

            $tahun_bulan = date("Y-m", strtotime($waktu));

            $bulan_inggris = date("F", strtotime($waktu));
            $bulan_filter = isset($monthTranslations[$bulan_inggris]) ? $monthTranslations[$bulan_inggris] : $bulan_inggris;



            $nama_bulan = date("F", strtotime($waktu));

            if(isset($_GET['dari']) && isset($_GET['ke'])){
                $b = $_GET['dari'];
                $t = $_GET['ke'];

                $bulan_inggris = date("F", strtotime($b));
                $bulan_filter = isset($monthTranslations[$bulan_inggris]) ? $monthTranslations[$bulan_inggris] : $bulan_inggris;

                $tahun_bulan = date("Y-m", strtotime($b));
            }else{
                $b = null;
                $t = null;
            }

            ?>
            <h4 class="card-title" style="text-align: center;">Jurnal Umum</h4>
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
            <form method="get" action="<?= base_url('jurnal/filterJurnal'); ?>">
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
            <!-- <div class="col-auto pr-0">
                <select class="form-control select2bs4" id="kode_per" name="kode_per">
                    <option value="">Pilih Kode Perkiraan</option>
                    <?php 
                    foreach($jurnal_bttb as $each){ ?>
                        <option value="<?php echo $each->id_bttb; ?>">
                            <?= $each->kode_perkiraan; ?> - <?= $each->keterangan; ?> 
                        </option>;
                    <?php } ?>
                </select>
            </div>
            <div class="col-auto pr-0">
                <select class="form-control" id="j_kode" name="j_kode">
                    <option value="">Pilih Jenis Kode Perkiraan</option>
                    <option value="BT">BT</option>
                    <option value="TB">TB</option>
                </select>
            </div> -->
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
                <th>Admin</th>
                <th>Tgl Input</th>
                <th class="sticky">Kode Perkiraan</th>
                <th>Keterangan</th>
                <th>Debit</th>
                <th>Kredit</th>
                <!-- <th>Saldo Akhir</th> -->
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            //$saldo_akhir = 0;
            $sum_saldo = 0;
            $sum_kredit = 0;
            //$sum_saldo_akhir = 0;

            $total_saldo = 0;
            $total_kredit = 0;
            //$total_saldo_akhir = 0;

            $tanggal_jurnal = []; 

            foreach ($jurnal_umum as $jurnal) { 

                $cell_content = '';

                if (!in_array($jurnal->tgl_input_jurnal, $tanggal_jurnal)) {
                    $cell_content = $jurnal->tgl_input_jurnal;
                    $tanggal_jurnal[] = $jurnal->tgl_input_jurnal; 
                }

                $tgl_input_jurnal = ($cell_content !== '') ? date("d-m-Y", strtotime($cell_content)) : '';

                if ($jurnal->jenis_jurnal == 'Debit') {
                    //$saldo_akhir += $jurnal->nominal_jurnal;
                    $total_saldo = $sum_saldo += $jurnal->nominal_jurnal;
                } else {
                    //$saldo_akhir -= $jurnal->nominal_jurnal;
                    $total_kredit = $sum_kredit += $jurnal->nominal_jurnal;
                }

                // $total_saldo_akhir = $sum_saldo_akhir += $saldo_akhir;

                foreach ($tampil_pengguna as $pengguna) {
                    if ($pengguna->id_pengguna == $jurnal->admin_jurnal) {
                        $admin_input = $pengguna->nama_pengguna;
                        break;
                    }
                }

                ?>
                <tr>
                    <td>
                        <?php //if (strpos($jurnal->keterangan_jurnal, 'Saldo Awal') === false) {?>
                            <?php if ($level_asli != 'CMO' && $tampil_tambah) {?>
                                <div>
                                <?php }else{ ?>
                                    <div class="d-xl-none">
                                    <?php } ?>
                                    <a href="<?= base_url('jurnal/edit_jurnal/' . $jurnal->id_jurnal); ?>" class="btn btn-success btn-sm" data-target="#editModal"><i class="fas fa-edit" title="Edit Jurnal"></i></a>


                                    <a href="<?= base_url('jurnal/hapus_jurnal/' . $jurnal->id_jurnal); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data jurnal ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash" title="Hapus"></i></a>
                                </div>
                                <?php //} ?>
                            </td>
                            <td>
                                <?= $admin_input; ?>
                            </td>
                            <td><?= $tgl_input_jurnal ?></td>
                            <td class="sticky">
                                <?php
                                if ($jurnal->kode_perkiraan == '') {
                                 echo '';
                             }elseif ($jurnal->id_bttb == 10 || $jurnal->id_bttb == 175 || $jurnal->id_bttb == 182 || $jurnal->id_bttb == 184 || $jurnal->id_bttb == 189) {
                                echo "<span class='badge badge-primary p-2'>".$jurnal->kode_perkiraan.$jurnal->nomor_perkiraan." - ".$jurnal->keterangan."</span>";
                            }else{
                                echo "<span class='badge badge-success p-2'>".$jurnal->kode_perkiraan.$jurnal->nomor_perkiraan." - ".$jurnal->keterangan."</span>"; 

                            // if (!isset($editLinkDisplayed[$jurnal->tgl_input_jurnal])) {
                            //     echo '<a href="' . base_url('jurnal/filterJurnal/?kode=' . $jurnal->kode_perkiraan . '&tgl=' . $jurnal->tgl_input_jurnal.'&ket=' . $jurnal->keterangan) . '" class="btn btn-warning btn-sm ml-2" data-target="#editModal"><i class="fas fa-list" title="Rincian Jurnal"></i></a>';

                            //     // Tandai bahwa link untuk kode perkiraan ini sudah ditampilkan
                            //     $editLinkDisplayed[$jurnal->tgl_input_jurnal] = true;
                            // }

                            }?>
                        </td>
                        <td>
                            <?php
                            if (strpos($jurnal->keterangan_jurnal, 'Saldo Awal') !== false) {
                                echo "<span class='badge badge-success p-2'>" . $jurnal->keterangan_jurnal . "</span>";
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
                <!-- <td>
                    <?php
                    if (strpos($jurnal->keterangan_jurnal, 'Saldo Awal') !== false) {
                        echo "<span class='badge badge-success p-2'>" . numberToRupiah2($saldo_akhir) . "</span>";
                    } elseif ($saldo_akhir != 0 && $jurnal->jenis_jurnal == 'Kredit') {
                        echo "<span class='badge badge-danger p-2'>" . numberToRupiah2($saldo_akhir) . "</span>";
                    } else {
                        echo numberToRupiah2($saldo_akhir);
                    }
                    ?>

                </td> -->
            </tr>
            <?php $no++;
        } ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Total</th>
            <th></th>
            <th></th>
            <th class="sticky"></th>
            <th></th>
            <th><?= numberToRupiah2($total_saldo) ?></th>
            <th><?= numberToRupiah2($total_kredit) ?></th>
                <!-- <th><?php
                if ($saldo_akhir != 0) {
                    echo "<span class='badge badge-danger p-2'>" . numberToRupiah2($saldo_akhir) . "</span>";
                } else {
                    echo numberToRupiah2($saldo_akhir);
                }
            ?>
        </th> -->
    </tr>
</tfoot>
</table>
</div>
<?php 
$hapus_jurnal = false;

date_default_timezone_set("Asia/Jakarta");
$waktu_awal = date("d-m-Y");
$waktu = date("m-Y");

$bulan_sekarang = date("F", strtotime($waktu_awal));

$waktu_terbaru = DateTime::createFromFormat('F', $bulan_sekarang);
$waktu_terbaru->modify('+1 month');
$bulan_berikutnya = $waktu_terbaru->format('F');

$bulan_indonesia = isset($monthTranslations[$bulan_sekarang]) ? $monthTranslations[$bulan_sekarang] : $bulan_sekarang;

$bulan_indonesia_berikutnya = isset($monthTranslations[$bulan_berikutnya]) ? $monthTranslations[$bulan_berikutnya] : $bulan_berikutnya;

$monthTranslations = array(
    'Januari' => 'January',
    'Februari' => 'February',
    'Maret' => 'March',
    'April' => 'April',
    'Mei' => 'May',
    'Juni' => 'June',
    'Juli' => 'July',
    'Agustus' => 'August',
    'September' => 'September',
    'Oktober' => 'October',
    'November' => 'November',
    'Desember' => 'December'
);

$t_nominal = 0;
$t_nominal_bt = 0;
$t_nominal_utj = 0;
$t_nominal_bf = 0;
$t_nominal_bvn = 0;
$t_nominal_kkp = 0;
$t_nominal_kkv = 0;

$tgl_dari = null;
$tgl_ke = null;

foreach ($tutup_jurnal as $t_jurnal) {
    $tgl_jurnalku = date("m-Y", strtotime($t_jurnal->tgl_jurnal));
    $tgl_asli_input = date("d-m-Y", strtotime($t_jurnal->tgl_asli_input));
    $bulan_jurnal = $t_jurnal->bulan_jurnal;

    $kj = '';

    foreach ($jurnal_umum_2 as $j_umum) {
        $tgl_input_asli_jurnal = $j_umum->tgl_input_asli_jurnal;
        $kode_bttb = $j_umum->id_bttb;

        if (strpos($j_umum->keterangan_jurnal, 'Saldo Awal') !== false) {
            $kj = $j_umum->keterangan_jurnal;
        }
    }

    $tgl_dari_ke = null;

    if (isset($_GET['dari']) && isset($_GET['ke'])) {
        $tgl_dari = date("m-Y", strtotime($_GET['dari']));
        $tgl_ke = date("m-Y", strtotime($_GET['ke']));

        if ($tgl_dari == $tgl_ke ) {
            $tgl_dari_ke = $tgl_dari;
        }

        if ($tgl_jurnalku == $tgl_dari || $tgl_jurnalku == $tgl_ke) {
            $bulan_jurnal_lama = $t_jurnal->bulan_jurnal;

            $bulan_jurnal = isset($monthTranslations[$bulan_jurnal_lama]) ? $monthTranslations[$bulan_jurnal_lama] : $bulan_jurnal_lama;

            $hapus_jurnal = true; 
            $id_jurnalku = $t_jurnal->id_jurnal;
            break;
        }
    }
    else{
        if ($bulan_jurnal == $bulan_indonesia && $tgl_jurnalku == $waktu) {
            $bulan_jurnal = $bulan_sekarang;
            $hapus_jurnal = true; 
            $id_jurnalku = $t_jurnal->id_jurnal;
            break;
        }
    }
}

$totalDebitBT = 0;
$totalKreditBT = 0;

$totalDebitUTJ = 0;
$totalKreditUTJ = 0;

$totalDebitBF = 0;
$totalKreditBF = 0;

$totalDebitBVN = 0;
$totalKreditBVN = 0;

$totalDebitKKP = 0;
$totalKreditKKP = 0;

$totalDebitKKV = 0;
$totalKreditKKV = 0;

foreach ($jurnal_umum_2 as $j_umum2) {
    if ($tgl_dari == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $tgl_ke == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && strpos($j_umum2->keterangan_jurnal, 'Saldo Awal') !== false && $j_umum2->id_bttb == 0){
        $t_nominal = $j_umum2->nominal_jurnal;
    }

    if ($tgl_dari == '' || $tgl_ke == '' ) {
        if ($waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && strpos($j_umum2->keterangan_jurnal, 'Saldo Awal') !== false && $j_umum2->id_bttb == 0){
            $t_nominal = $j_umum2->nominal_jurnal;
        }
    }

    //======================================== Cari Saldo Awal BT

    if ($tgl_dari == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $tgl_ke == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && strpos($j_umum2->keterangan_jurnal, 'Saldo Awal BT') !== false && $j_umum2->id_bttb == 0){
        $t_nominal_bt = $j_umum2->nominal_jurnal;
    }

    if ($tgl_dari == '' || $tgl_ke == '' ) {
        if ($waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && strpos($j_umum2->keterangan_jurnal, 'Saldo Awal BT') !== false && $j_umum2->id_bttb == 0){
            $t_nominal_bt = $j_umum2->nominal_jurnal;
        }
    }

    //======================================= Cari Saldo Awal UTJ

    if ($tgl_dari == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $tgl_ke == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && strpos($j_umum2->keterangan_jurnal, 'Saldo Awal UTJ') !== false && $j_umum2->id_bttb == 0){
        $t_nominal_utj = $j_umum2->nominal_jurnal;
    }

    if ($tgl_dari == '' || $tgl_ke == '' ) {
        if ($waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && strpos($j_umum2->keterangan_jurnal, 'Saldo Awal UTJ') !== false && $j_umum2->id_bttb == 0){
            $t_nominal_utj = $j_umum2->nominal_jurnal;
        }
    }

    //======================================= Cari Saldo Awal Bank Fee

    if ($tgl_dari == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $tgl_ke == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && strpos($j_umum2->keterangan_jurnal, 'Saldo Awal Bank Fee') !== false && $j_umum2->id_bttb == 0){
        $t_nominal_bf = $j_umum2->nominal_jurnal;
    }

    if ($tgl_dari == '' || $tgl_ke == '' ) {
        if ($waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && strpos($j_umum2->keterangan_jurnal, 'Saldo Awal Bank Fee') !== false && $j_umum2->id_bttb == 0){
            $t_nominal_bf = $j_umum2->nominal_jurnal;
        }
    }

    //======================================= Cari Saldo Awal Bank Vision New

    if ($tgl_dari == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $tgl_ke == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && strpos($j_umum2->keterangan_jurnal, 'Saldo Awal Bank Vision New') !== false && $j_umum2->id_bttb == 0){
        $t_nominal_bvn = $j_umum2->nominal_jurnal;
    }

    if ($tgl_dari == '' || $tgl_ke == '' ) {
        if ($waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && strpos($j_umum2->keterangan_jurnal, 'Saldo Awal Bank Vision New') !== false && $j_umum2->id_bttb == 0){
            $t_nominal_bvn = $j_umum2->nominal_jurnal;
        }
    }

    //======================================= Cari Saldo Awal Kas Kecil Pusat

    if ($tgl_dari == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $tgl_ke == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && strpos($j_umum2->keterangan_jurnal, 'Saldo Awal Kas Kecil Pusat') !== false && $j_umum2->id_bttb == 0){
        $t_nominal_kkp = $j_umum2->nominal_jurnal;
    }

    if ($tgl_dari == '' || $tgl_ke == '' ) {
        if ($waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && strpos($j_umum2->keterangan_jurnal, 'Saldo Awal Kas Kecil Pusat') !== false && $j_umum2->id_bttb == 0){
            $t_nominal_kkp = $j_umum2->nominal_jurnal;
        }
    }

    //======================================= Cari Saldo Awal Kas Kecil Vision

    if ($tgl_dari == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $tgl_ke == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && strpos($j_umum2->keterangan_jurnal, 'Saldo Awal Kas Kecil Vision') !== false && $j_umum2->id_bttb == 0){
        $t_nominal_kkv = $j_umum2->nominal_jurnal;
    }

    if ($tgl_dari == '' || $tgl_ke == '' ) {
        if ($waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && strpos($j_umum2->keterangan_jurnal, 'Saldo Awal Kas Kecil Vision') !== false && $j_umum2->id_bttb == 0){
            $t_nominal_kkv = $j_umum2->nominal_jurnal;
        }
    }

    //======================================= Cari Debit dan Kredit 

    if ($tgl_dari == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $tgl_ke == date("m-Y", strtotime($j_umum2->tgl_input_jurnal))) {
        if ($j_umum2->id_bttb == 10 && $j_umum2->jenis_jurnal == 'Debit') {
            $totalDebitBT += $j_umum2->nominal_jurnal;
        }

        if ($j_umum2->id_bttb == 10 && $j_umum2->jenis_jurnal == 'Kredit') {
            $totalKreditBT += $j_umum2->nominal_jurnal;
        }

        //==========================================================================

        if ($j_umum2->kode_perkiraan == 'UTJ' && $j_umum2->jenis_jurnal == 'Debit') {
            $totalDebitUTJ += $j_umum2->nominal_jurnal;
        }

        if ($j_umum2->kode_perkiraan == 'UTJ' && $j_umum2->jenis_jurnal == 'Kredit') {
            $totalKreditUTJ += $j_umum2->nominal_jurnal;
        }

        //==========================================================================

        if ($j_umum2->id_bttb == 175 && $j_umum2->jenis_jurnal == 'Debit') {
            $totalDebitBF += $j_umum2->nominal_jurnal;
        }

        if ($j_umum2->id_bttb == 175 && $j_umum2->jenis_jurnal == 'Kredit') {
            $totalKreditBF += $j_umum2->nominal_jurnal;
        }

        //==========================================================================

        if ($j_umum2->id_bttb == 182 && $j_umum2->jenis_jurnal == 'Debit') {
            $totalDebitBVN += $j_umum2->nominal_jurnal;
        }

        if ($j_umum2->id_bttb == 182 && $j_umum2->jenis_jurnal == 'Kredit') {
            $totalKreditBVN += $j_umum2->nominal_jurnal;
        }

        //==========================================================================

        if ($j_umum2->id_bttb == 184 && $j_umum2->jenis_jurnal == 'Debit') {
            $totalDebitKKP += $j_umum2->nominal_jurnal;
        }

        if ($j_umum2->id_bttb == 184 && $j_umum2->jenis_jurnal == 'Kredit') {
            $totalKreditKKP += $j_umum2->nominal_jurnal;
        }

        //==========================================================================

        if ($j_umum2->id_bttb == 189 && $j_umum2->jenis_jurnal == 'Debit') {
            $totalDebitKKV += $j_umum2->nominal_jurnal;
        }

        if ($j_umum2->id_bttb == 189 && $j_umum2->jenis_jurnal == 'Kredit') {
            $totalKreditKKV += $j_umum2->nominal_jurnal;
        }
    }

    if ($tgl_dari == '' || $tgl_ke == '' ) {
        if ($waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal)) && $waktu == date("m-Y", strtotime($j_umum2->tgl_input_jurnal))) {
            if ($j_umum2->id_bttb == 10 && $j_umum2->jenis_jurnal == 'Debit') {
                $totalDebitBT += $j_umum2->nominal_jurnal;
            }

            if ($j_umum2->id_bttb == 10 && $j_umum2->jenis_jurnal == 'Kredit') {
                $totalKreditBT += $j_umum2->nominal_jurnal;
            }

            //==========================================================================

            if ($j_umum2->kode_perkiraan == 'UTJ' && $j_umum2->jenis_jurnal == 'Debit') {
                $totalDebitUTJ += $j_umum2->nominal_jurnal;
            }

            if ($j_umum2->kode_perkiraan == 'UTJ' && $j_umum2->jenis_jurnal == 'Kredit') {
                $totalKreditUTJ += $j_umum2->nominal_jurnal;
            }

            //==========================================================================

            if ($j_umum2->id_bttb == 175 && $j_umum2->jenis_jurnal == 'Debit') {
                $totalDebitBF += $j_umum2->nominal_jurnal;
            }

            if ($j_umum2->id_bttb == 175 && $j_umum2->jenis_jurnal == 'Kredit') {
                $totalKreditBF += $j_umum2->nominal_jurnal;
            }

            //==========================================================================

            if ($j_umum2->id_bttb == 182 && $j_umum2->jenis_jurnal == 'Debit') {
                $totalDebitBVN += $j_umum2->nominal_jurnal;
            }

            if ($j_umum2->id_bttb == 182 && $j_umum2->jenis_jurnal == 'Kredit') {
                $totalKreditBVN += $j_umum2->nominal_jurnal;
            }

            //==========================================================================

            if ($j_umum2->id_bttb == 184 && $j_umum2->jenis_jurnal == 'Debit') {
                $totalDebitKKP += $j_umum2->nominal_jurnal;
            }

            if ($j_umum2->id_bttb == 184 && $j_umum2->jenis_jurnal == 'Kredit') {
                $totalKreditKKP += $j_umum2->nominal_jurnal;
            }

            //==========================================================================

            if ($j_umum2->id_bttb == 189 && $j_umum2->jenis_jurnal == 'Debit') {
                $totalDebitKKV += $j_umum2->nominal_jurnal;
            }

            if ($j_umum2->id_bttb == 189 && $j_umum2->jenis_jurnal == 'Kredit') {
                $totalKreditKKV += $j_umum2->nominal_jurnal;
            }

        }
    }

}

$saldo_awal_bt = abs($t_nominal_bt + ($totalDebitBT - $totalKreditBT));

$saldo_awal_utj = abs($t_nominal_utj + ($totalKreditUTJ - $totalDebitUTJ));

$saldo_awal_bf = abs($t_nominal_bf + ($totalDebitBF - $totalKreditBF));

$saldo_awal_bvn = abs($t_nominal_bvn + ($totalDebitBVN - $totalKreditBVN));

$saldo_awal_kkp = abs($t_nominal_kkp + ($totalDebitKKP - $totalKreditKKP));

$saldo_awal_kkv = abs($t_nominal_kkv + ($totalDebitKKV - $totalKreditKKV));

$pesan_ada = false;

foreach ($tampil_pesan as $pesan) {
    if (($tgl_dari == date("m-Y", strtotime($pesan->tgl_pesan)) || $tgl_ke == date("m-Y", strtotime($pesan->tgl_pesan))) && $pesan->status_pesan == 'Tutup') {
        $pesan_ada = true;
        break;
    }
    
    if (($waktu == date("m-Y", strtotime($pesan->tgl_pesan)) || $waktu == date("m-Y", strtotime($pesan->tgl_pesan))) && $pesan->status_pesan == 'Tutup') {
        $pesan_ada = true;
        break;
    }
}

?>

<?php if ($hapus_jurnal) { ?>
    <?php if ($level == 'CMO') {?>
        <div class="text-right mt-3">
            <a href="<?= base_url('Jurnal/hapus_tutup_jurnal?id_jurnal=' . $id_jurnalku.'&bulan='.$bulan_jurnal.'&tgl='.$tgl_asli_input); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin hapus jurnal bulan (<?= $bulan_filter ?>) ?')" class="btn btn-danger mt-1">
                <i class="fas fa-trash" title="Hapus Jurnal"></i>  Hapus Jurnal (<?= $bulan_filter ?>)
            </a>
        </div>
    <?php }else{ 
        if (isset($_GET['dari']) && isset($_GET['ke']) && $_GET['dari'] !== '' && $_GET['ke'] !== '' && $tgl_dari_ke != null) {
            $bulanku = $bulan_inggris;
            $tampil_bulanku = $bulan_filter;
            $t_dari = $_GET['dari'];
            $t_ke = $_GET['ke'];
            $tahun_dari =  date("Y", strtotime($_GET['dari']));
        }else{
            $bulanku = $bulan_sekarang;
            $tampil_bulanku = $bulan_indonesia;
            $t_dari = $waktu_awal;
            $t_ke = $waktu_awal;
            $tahun_dari =  date("Y");
        } ?>

        <?php if ($level_asli != 'CMO') {?>
            <?php if (!$pesan_ada) {?>
                <div class="text-right mt-3">
                    <a href="<?= base_url('Jurnal/tambah_pesan?tgl_input=' . $waktu_awal . '&tgl_dari=' . $t_dari. '&tgl_ke=' . $t_ke. '&pesan=Buka Jurnal ' . $tampil_bulanku.' '.$tahun_dari . '&bulan=' . $tampil_bulanku . '&admin=' . $id); ?>"
                        onclick="javascript:return confirm('Kirim request buka jurnal bulan (<?= $tampil_bulanku ?>) ?')" class="btn btn-secondary mt-1">
                        Request Buka Jurnal (<?= $tampil_bulanku ?>)
                    </a>
                </div>
            <?php }else{ ?>
                <div class="text-right mt-3">
                    <p class="btn btn-success mt-1">Request Buka Jurnal Sudah Diajukan
                    </p>
                </div>
            <?php } ?>
        <?php } ?>

    <?php } ?>
<?php }else{ 
    if (isset($_GET['dari']) && isset($_GET['ke']) && $_GET['dari'] !== '' && $_GET['ke'] !== '') {
        $bulanku = $bulan_inggris;
        $tampil_bulanku = $bulan_filter;
    }else{
        $bulanku = $bulan_sekarang;
        $tampil_bulanku = $bulan_indonesia;
    } 
    ?>
    <?php if ($level_asli != 'CMO') {?>
        <div class="text-right mt-3">
            <a href="<?= base_url('Jurnal/tutup_jurnal?tsa=0'.'&sas='.$t_nominal.'&ts='.$total_saldo.'&tk='.$total_kredit.'&dari='.$b. '&ke='.$t.'&bulan='.$bulanku.'&bulan_tahun='.$tahun_bulan. '&sa_bt='.$saldo_awal_bt. '&sa_utj='.$saldo_awal_utj. '&sa_bf='.$saldo_awal_bf . '&sa_bvn='.$saldo_awal_bvn . '&sa_kkp='.$saldo_awal_kkp . '&sa_kkv='.$saldo_awal_kkv); ?>"
                onclick="javascript:return confirm('Apakah Anda yakin ingin tutup jurnal bulan (<?= $tampil_bulanku ?>) ?')" class="btn btn-primary mt-1">
                Tutup Jurnal (<?= $tampil_bulanku ?>)
            </a>
        </div>
    <?php } ?>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</body>
