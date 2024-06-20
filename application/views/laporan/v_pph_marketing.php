<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <?php require __DIR__ . '/../v_navigasi.php'; ?>
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

            <h4 class="card-title" style="text-align: center;">Laporan PPH 21 Marketing</h4>
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
            <form method="get" action="<?= base_url('laporan/filterDataPphMarketing'); ?>">
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
                    <!-- <th>ID Komisi</th> -->
                    <th>Kantor</th>
                    <th>Tanggal Closing</th>
                    <th>ID Marketing</th>
                    <th>Alamat Properti</th>
                    <th>Status Properti</th>
                    <th>Nama Marketing</th>
                    <th>Fee Setelah Dipotong Admin</th>
                    <th>PPH 21</th>
                    <th>FGS</th>
                    <th>PPH 21</th>
                    <th>Total PPH 21</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                $no = 1;
                $sum_fee_set_adm = 0;
                $sum_pph21 = 0;
                $sum_fgs = 0;
                $sum_pph21_up = 0;
                $sum_total_pph = 0;

                $total_fee_set_adm = 0;
                $total_pph21 = 0;
                $total_fgs = 0;
                $total_pph21_up = 0;
                $total_total_pph = 0;

                $id_komisi_values = []; 
                $tgl_closing_values = [];
                $alamat_properti = [];
                $status_properti = [];

                $unique_kantor_nomor_values = []; 

                foreach ($tampil_pph as $pph) {

                    foreach ($marketing as $mkt) {
                       if ($mkt->id_mar == $pph->id_marketing) {
                           $nama_marketing = $mkt->nama_mar;
                           $id_marketing = $mkt->id_mar;
                       }
                   }

                   if ($pph->fee_setelah_adm != 0) {
                    $total_fee_set_adm = $sum_fee_set_adm += $pph->fee_setelah_adm;
                }

                if ($pph->fgs == 0) {
                    $total_pph21 = $sum_pph21 += $pph->ptn_pph;
                }

                if ($pph->fgs != 0) {
                    $total_fgs = $sum_fgs += $pph->fgs;
                }

                if ($pph->fgs != 0) {
                    $total_pph21_up = $sum_pph21_up += $pph->ptn_pph;
                }

                $total_total_pph = $sum_total_pph += $pph->total_pph;

                $id_komisi_fix = '';

                if (!in_array($pph->id_komisi, $id_komisi_values)) {
                    $id_komisi_fix = $pph->id_komisi;
                    $id_komisi_values[] = $pph->id_komisi; 
                }

                $tgl_closing_fix = '';

                $tgl = date("d-m-Y", strtotime($pph->tgl_closing_komisi));

                if (!in_array($tgl, $tgl_closing_values)) {
                    $tgl_closing_fix = $tgl;
                    $tgl_closing_values[] = $tgl; 
                }

                $alamat_properti_fix = '';

                if (!in_array($pph->alamat_komisi, $alamat_properti)) {
                    $alamat_properti_fix= $pph->alamat_komisi;
                    $alamat_properti[] = $pph->alamat_komisi; 
                }

                $status_properti_fix = '';

                if (!in_array($pph->jt_komisi, $status_properti)) {
                    $status_properti_fix= $pph->jt_komisi;
                    $status_properti[] = $pph->jt_komisi; 
                }

                foreach ($kantor as $ktr) {
                    if ($ktr->id_kantor == $pph->kantor_komisi) {
                        $kantor_komisi = $ktr->kantor;
                    }
                }

                ?>
                <tr>
                    <td><?= $no ?></td>
                    <!-- <td><?= $id_komisi_fix ?></td> -->
                    <td>
                        <?php 
                        $kantor_nomor_key = $pph->kantor_komisi . '-' . $pph->nomor_kantor_komisi;

                        if (!in_array($kantor_nomor_key, $unique_kantor_nomor_values)) {
                            $unique_kantor_nomor_values[] = $kantor_nomor_key; ?>

                            <div>
                                <?php 
                                if ($kantor_komisi == 'Pusat') {
                                    echo "<span class='badge badge-primary p-2'>".strtoupper($kantor_komisi)." - ".$pph->nomor_kantor_komisi."</span>";
                                } else {
                                    echo "<span class='badge badge-success p-2'>".strtoupper($kantor_komisi)." - ".$pph->nomor_kantor_komisi."</span>";
                                }
                                ?>

                            </div>

                            <div class="mt-2">
                                <?php 
                                if ($pph->jenis_hitungan_komisi == 'Secondary') {
                                    echo "<span class='badge badge-secondary p-2'>".strtoupper($pph->jenis_hitungan_komisi)."</span>";
                                } elseif($komisi->jenis_hitungan_komisi == 'KPR') {
                                    echo "<span class='badge badge-warning p-2'>".strtoupper($pph->jenis_hitungan_komisi)."</span>";
                                }else{
                                    echo "<span class='badge badge-danger p-2'>".strtoupper($pph->jenis_hitungan_komisi)."</span>";
                                }
                                ?>
                            </div>

                        <?php } ?>
                    </td>
                    <td><?= $tgl_closing_fix ?></td>
                    <td><?= $id_marketing ?></td>
                    <td><?= $alamat_properti_fix?></td>
                    <td><?= $status_properti_fix ?></td>
                    <td>
                        <?php 
                        if ($pph->status_marketing == 'Listing/Selling') {
                            echo $nama_marketing;
                        }else{
                            echo $nama_marketing.' '."<span class='badge badge-warning'>U</span>";
                        }
                        ?>
                    </td>
                    <td>
                        <?php if ($pph->fee_setelah_adm != 0) {
                            echo numberToRupiah($pph->fee_setelah_adm);
                        }else{
                            echo '';
                        }
                        ?>
                    </td>
                    <td>
                        <?php if ($pph->fgs == 0) {
                            echo numberToRupiah($pph->ptn_pph);
                        }else{
                            echo '';
                        }
                        ?>
                    </td>
                    <td>
                        <?php if ($pph->fgs != 0) {
                            echo numberToRupiah($pph->fgs);
                        }else{
                            echo '';
                        }
                        ?>
                    </td>
                    <td>
                        <?php if ($pph->fgs != 0) {
                            echo numberToRupiah($pph->ptn_pph);
                        }else{
                            echo '';
                        }
                        ?>
                    </td>
                    <td><?= numberToRupiah($pph->total_pph) ?></td>
                </tr>
                <?php $no++; }  ?>
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

                    <th><?= numberToRupiah($total_fee_set_adm) ?></th>
                    <th><?= numberToRupiah($total_pph21) ?></th>
                    <th><?= numberToRupiah($total_fgs) ?></th>
                    <th><?= numberToRupiah($total_pph21_up) ?></th>
                    <th><?= numberToRupiah($total_total_pph) ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
</div>
</div>
</body>


