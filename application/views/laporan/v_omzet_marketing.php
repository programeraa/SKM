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
                $m = null;
                foreach ($marketing as $mkt) {
                    if ($mkt->id_mar == $_GET['marketing']) {
                        $m = $mkt->nama_mar;
                    }
                }
            }else{
                $b = null;
                $t = null;
                $m = null;
            }
            ?>

            <h4 class="card-title" style="text-align: center;">Laporan Omzet Per Marketing</h4>
            <?php if ($b != null && $m != null) {?>
                <h5><?php echo '<div class="justify-content-center">
                <div class="col-auto text-center">
                <strong><span class= text-warning>Periode '.date("d-m-Y", strtotime($b)).' sampai '.date("d-m-Y", strtotime($t)).'</span></strong> 
                </div>

                <div class="col-auto text-center">
                <strong><span class= text-warning>Marketing ('.$m.')</span></strong> 
                </div>
            </div>'; ?></h5> 
        <?php }elseif ($b != null && $m == null) {?>
            <h5><?php echo '<div class="justify-content-center">
            <div class="col-auto text-center">
            <strong><span class= text-warning>Periode '.date("d-m-Y", strtotime($b)).' sampai '.date("d-m-Y", strtotime($t)).'</span></strong> 
            </div>
        </div>'; ?></h5> 
    <?php }elseif ($b == null && $m != null) {?>
        <h5><?php echo '<div class="justify-content-center">
        <div class="col-auto text-center">
        <strong><span class= text-warning>Marketing ('.$m.')</span></strong> 
        </div>
    </div>'; }?></h5> 
</div>

<div class="card-body">
    <div class="pb-3 d-sm-flex justify-content-start">
        <form method="get" action="<?= base_url('laporan/filterDataOmzetMarketing'); ?>">
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
            <div class="col-auto pr-0">
                <select class="form-control select2bs4" id="marketing" name="marketing">
                    <option value="">Pilih Marketing</option>
                    <?php 
                    foreach($marketing as $each){ ?>
                        <option value="<?php echo $each->id_mar; ?>">
                            <?php echo $each->nama_mar; ?> - (<?php echo $each->nomor_mar; ?>) 
                        </option>;
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
                <th rowspan="2">No</th>
                <th rowspan="2">ID Komisi</th>
                <th rowspan="2">Tanggal Closing</th>
                <th rowspan="2">ID Marketing</th>
                <th rowspan="2">Marketing</th>
                <th rowspan="2">Alamat Properti</th>
                <th rowspan="2">Jenis</th>
                <th colspan="2" class="text-center">Fee Bruto</th>
                <th colspan="2" class="text-center">Potongan</th>
                <th colspan="3" class="text-center">Netto</th>
                <!-- <th rowspan="2">Rincian Komisi</th> -->
            </tr>
            <tr>
                <th>A&A Vision</th>
                <th>Marketing</th>
                <th>ADM</th>
                <th>PPH 21</th>
                <th>A&A Vision</th>
                <th>Potongan Marketing</th>
                <th>Marketing</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; 
            $sum_bruto_aavision = 0;
            $sum_bruto_marketing = 0;
            $sum_ptn_adm = 0;
            $sum_ptn_pajak = 0;
            $sum_ptn_pribadi = 0;
            $sum_total_fee_vision = 0;
            $sum_bersih_marketing = 0;

            $bruto_aa_vision_r = null;
            $bruto_marketing_r = null;
            $sum_ptn_admin_r = null;
            $sum_ptn_pph_r = null;
            $sum_total_fee_vision_r = null;
            $sum_netto_marketing_r = null;
            $sum_ptn_prib_r = null;

                    // $id_komisi_values = []; 

            foreach ($omzet as $vision) {
                        // $cell_content = '';

                        // if (!in_array($vision->id_komisi, $id_komisi_values)) {
                        //     $cell_content = $vision->id_komisi;
                        //     $id_komisi_values[] = $vision->id_komisi; 
                        // }

                $fee_kantor = stringToNumber($vision->fee_kantor);
                $fee_kantor_r = numberToRupiah($fee_kantor);

                $fee_marketing = stringToNumber($vision->fee_marketing);
                $fee_marketing_r = numberToRupiah($fee_marketing);

                $ptn_admin = stringToNumber($vision->ptn_admin);
                $ptn_admin_r = numberToRupiah($ptn_admin);

                $ptn_pph = stringToNumber($vision->ptn_pph);
                $ptn_pph_r = numberToRupiah($ptn_pph);

                $ptn_pribadi = stringToNumber($vision->ptn_pribadi);
                $ptn_pribadi_r = numberToRupiah($ptn_pribadi);

                $netto_marketing = stringToNumber($vision->netto_marketing);
                $netto_marketing_r = numberToRupiah($netto_marketing);

                        //$total_fee_vsn = $vision->fee_kantor + $vision->ptn_admin;

                $total_fee_vision = stringToNumber($vision->netto_vision);
                $total_fee_vision_r = numberToRupiah($total_fee_vision);

                $sum_bruto_aavision += $vision->fee_kantor;

                $bruto_aa_vision = stringToNumber($sum_bruto_aavision);
                $bruto_aa_vision_r = numberToRupiah($bruto_aa_vision);

                $sum_bruto_marketing += $vision->fee_marketing;

                $bruto_marketing = stringToNumber($sum_bruto_marketing);
                $bruto_marketing_r = numberToRupiah($bruto_marketing);

                $sum_ptn_adm += $vision->ptn_admin;

                $sum_ptn_admin = stringToNumber($sum_ptn_adm);
                $sum_ptn_admin_r = numberToRupiah($sum_ptn_admin);

                $sum_ptn_pajak += $vision->ptn_pph;

                $sum_ptn_pph = stringToNumber($sum_ptn_pajak);
                $sum_ptn_pph_r = numberToRupiah($sum_ptn_pph);

                $sum_ptn_pribadi += $vision->ptn_pribadi;

                $sum_ptn_prib = stringToNumber($sum_ptn_pribadi);
                $sum_ptn_prib_r = numberToRupiah($sum_ptn_prib);

                $sum_total_fee_vision += $vision->netto_vision;

                $sum_total_fee_vision = stringToNumber($sum_total_fee_vision);
                $sum_total_fee_vision_r = numberToRupiah($sum_total_fee_vision);

                $sum_bersih_marketing += $vision->netto_marketing;

                $sum_netto_marketing = stringToNumber($sum_bersih_marketing);
                $sum_netto_marketing_r = numberToRupiah($sum_netto_marketing);

                $nama_mar = null;
                $id_mar = null;
                foreach ($marketing as $mar) {
                    if ($vision->id_marketing == $mar->id_mar) {
                        $id_mar = $mar->nomor_mar;
                        $nama_mar = $mar->nama_mar;
                    }
                }

                $tgl_closing = date("d-m-Y", strtotime($vision->tgl_closing_komisi));
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $vision->id_komisi ?></td>
                    <td><?= $tgl_closing; ?></td>
                    <td><?= $id_mar ?></td>
                    <td><?= $nama_mar ?></td>
                    <td><?= $vision->alamat_komisi; ?></td>
                    <td><?= $vision->jt_komisi; ?></td>
                    <td><?= $fee_kantor_r ?></td>
                    <td><?= $fee_marketing_r ?></td>
                    <td><?= $ptn_admin_r ?></td>
                    <td><?= $ptn_pph_r ?></td>
                    <td><?= $total_fee_vision_r ?></td>
                    <td><?= $ptn_pribadi_r?></td>
                    <td><?= $netto_marketing_r ?></td>
                            <!-- <td>
                                <?php if ($cell_content != '') {?>
                                    <a href="<?= base_url('komisi/rincian_komisi/' . $cell_content.'?from=omzet_vision'); ?>" class="btn btn-warning btn-sm mt-1" data-target="#editModal"><i class="fas fa-list" title="Lihat Rincian"></i></a>
                                <?php } ?>
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
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><?= $bruto_aa_vision_r ?></th>
                        <th><?= $bruto_marketing_r ?></th>
                        <th><?= $sum_ptn_admin_r ?></th>
                        <th><?= $sum_ptn_pph_r ?></th>
                        <th><?= $sum_total_fee_vision_r ?></th>
                        <th><?= $sum_ptn_prib_r ?></th>
                        <th><?= $sum_netto_marketing_r ?></th>
                        <!-- <th></th> -->
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</div>
</body>


