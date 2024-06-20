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

            <h4 class="card-title" style="text-align: center;">Laporan PPH Non A&A</h4>
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
            <form method="get" action="<?= base_url('laporan/filterDataPphCobroke'); ?>">
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
                    <th>Alamat Properti</th>
                    <th>Status Properti</th>
                    <th>Cobroke/Referal</th>
                    <th>Fee</th>
                    <th>PPH 21</th>
                    <th>PPH 23</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $sum_fee_cobroke = 0;
                $sum_pph_21 = 0;
                $sum_pph_23 = 0;

                $total_fee_cobroke = 0;
                $total_pph_21 = 0;
                $total_pph_23 = 0;

                //$unique_kantor_nomor_values = []; 

                foreach ($tampil_pph as $pph) {
                    $tgl_closing = date("d-m-Y", strtotime($pph->tgl_closing_komisi));

                    if ($pph->jenis_cobroke != 2 || $pph->jenis_cobroke != 0) {
                       $j_pph = 21;
                   }else{
                    $j_pph = 23;
                }

                $total_fee_cobroke = $sum_fee_cobroke += $pph->fee_cobroke;

                if ($pph->jenis_cobroke != 2 && $pph->jenis_cobroke != 0) {
                    $total_pph_21 = $sum_pph_21 += $pph->pph_cobroke;      
                }

                if ($pph->jenis_cobroke != 2.5 && $pph->jenis_cobroke != 3) {
                    $total_pph_23 = $sum_pph_23 += $pph->pph_cobroke;    
                }   

                foreach ($kantor as $ktr) {
                    if ($ktr->id_kantor == $pph->kantor_komisi) {
                        $kantor_komisi = $ktr->kantor;
                    }
                }

                foreach ($tampil_referal as $referal) {
                    if ($referal->id_komisi == $pph->id_komisi) {
                        $nama_referal = $referal->keterangan_referal;
                        break;
                    }
                }
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <!-- <td><?= $pph->id_komisi ?></td> -->
                    <td>

                        <!-- // $kantor_nomor_key = $pph->kantor_komisi . '-' . $pph->nomor_kantor_komisi;

                        // if (!in_array($kantor_nomor_key, $unique_kantor_nomor_values)) {
                            //     $unique_kantor_nomor_values[] = $kantor_nomor_key; -->

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
                                } elseif($pph->jenis_hitungan_komisi == 'KPR') {
                                    echo "<span class='badge badge-warning p-2'>".strtoupper($pph->jenis_hitungan_komisi)."</span>";
                                }else{
                                    echo "<span class='badge badge-danger p-2'>".strtoupper($pph->jenis_hitungan_komisi)."</span>";
                                }
                                ?>
                            </div>

                        </td>
                        <td><?= $tgl_closing ?></td>
                        <td><?= $pph->alamat_komisi ?></td>
                        <td><?= $pph->jt_komisi ?></td>
                        <td>
                            <?php 
                            if ($pph->ref_cobroke == 1) {
                                echo "Ref : ".$nama_referal;
                            }else{
                                echo $pph->nama_cobroke;
                            }
                            ?>
                        </td>
                        <td><?= numberToRupiah($pph->fee_cobroke) ?></td>
                        <td>
                            <?php 
                            if ($pph->ref_cobroke == 1 || $pph->jenis_cobroke == 2.5 || $pph->jenis_cobroke == 3) {
                                echo numberToRupiah($pph->pph_cobroke);
                            }else{
                                echo '';
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            if ($pph->ref_cobroke != 1 && $pph->jenis_cobroke == 0 || $pph->jenis_cobroke == 2) {
                                echo numberToRupiah($pph->pph_cobroke);
                            }else{
                                echo '';
                            }
                            ?>
                        </td>
                        <?php $no++; } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><?= numberToRupiah($total_fee_cobroke) ?></th>
                            <th><?= numberToRupiah($total_pph_21) ?></th>
                            <th><?= numberToRupiah($total_pph_23) ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</body>


