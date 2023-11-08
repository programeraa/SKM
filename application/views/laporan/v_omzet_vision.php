<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <?php require __DIR__ . '/../v_navigasi.php'; ?>
    </div>
    <div class="card">
        <div class="card-header bg-dark text-white">
            <?php 
            if(isset($_GET['dari']) && isset($_GET['ke']) || isset($_GET['admin_komisi'])){
                $b = $_GET['dari'];
                $t = $_GET['ke'];

                if ($_GET['j_tanggal'] == 'tgl_closing_komisi') {
                    $j = 'Tgl Closing';
                }elseif($_GET['j_tanggal'] == 'waktu_komisi'){
                    $j = 'Tgl Input';
                }else{
                    $j = 'Tgl Approve';
                }

                $admin = null;
                foreach ($pengguna as $user) {
                    if ($_GET['admin_komisi'] == $user->id_pengguna) {
                        $admin = $user->nama_pengguna;
                    }
                }
                
            }else{
                $b = null;
                $t = null;
                $j = null;
                $admin = null;
            }
            ?>

            <?php if ($b == null) {?>
                <h4 class="card-title" style="text-align: center;">Laporan Omzet Vision</h4>
            <?php }else{ ?>
                <h4 class="card-title" style="text-align: center;">Laporan Omzet Vision</h4>
                <h5><?php echo '<div class="justify-content-center">
                <div class="col-auto text-center">
                <strong><span class= text-warning>'.$j.' Periode '.$b.' sampai '.$t.'</span></strong> 
                </div>
            </div>'; }?></h5> 
        </div>

        <div class="card-body">
            <div class="pb-3 d-sm-flex justify-content-start">
                <form method="get" action="<?= base_url('laporan/filterDataAdminKomisi'); ?>">
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
                        <select class="form-control" id="j_tanggal" name="j_tanggal">
                            <option value="tgl_closing_komisi">Tanggal Closing</option>
                            <option value="waktu_komisi">Tanggal Input</option>
                            <option value="tgl_disetujui">Tanggal Disetujui</option>
                        </select>
                    </div>
                    <div class="col-auto pr-0">
                        <select class="form-control" id="admin_komisi" name="admin_komisi">
                            <option value="">Pilih Admin Komisi</option>
                            <?php 
                            foreach($pengguna as $each){ ?>
                                <option value="<?php echo $each->id_pengguna; ?>">
                                    <?php echo $each->nama_pengguna; ?> 
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
                        <th colspan="2" class="text-center">Netto</th>
                    </tr>
                    <tr>
                        <th>A&A Vision</th>
                        <th>Marketing</th>
                        <th>ADM</th>
                        <th>PPH 21</th>
                        <th>A&A Vision</th>
                        <th>Marketing</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; 
                    foreach ($omzet as $vision) {
                        $fee_kantor = stringToNumber($vision->fee_kantor);
                        $fee_kantor_r = numberToRupiah($fee_kantor);

                        $fee_marketing = stringToNumber($vision->fee_marketing);
                        $fee_marketing_r = numberToRupiah($fee_marketing);

                        $ptn_admin = stringToNumber($vision->ptn_admin);
                        $ptn_admin_r = numberToRupiah($ptn_admin);

                        $ptn_pph = stringToNumber($vision->ptn_pph);
                        $ptn_pph_r = numberToRupiah($ptn_pph);

                        $netto_marketing = stringToNumber($vision->netto_marketing);
                        $netto_marketing_r = numberToRupiah($netto_marketing);

                        $total_fee_vsn = $vision->fee_kantor + $vision->ptn_admin;

                        $total_fee_vision = stringToNumber($total_fee_vsn);
                        $total_fee_vision_r = numberToRupiah($total_fee_vision);

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
                            <td><?= $vision->id_komisi; ?></td>
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
                            <td><?= $netto_marketing_r ?></td>
                        </tr>
                        <?php $no++;
                    } ?>
                </tbody>
            </table>
<!-- 
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
                        <th colspan="2" class="text-center">Netto</th>
                    </tr>
                    <tr>
                        <th>A&A Vision</th>
                        <th>Marketing</th>
                        <th>ADM</th>
                        <th>PPH 21</th>
                        <th>A&A Vision</th>
                        <th>Marketing</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; 
                    foreach ($omzet as $vision) {
                        // $fee_kantor = stringToNumber($vision->fee_kantor);
                        // $fee_kantor_r = numberToRupiah($fee_kantor);

                        // $fee_marketing = stringToNumber($vision->fee_marketing);
                        // $fee_marketing_r = numberToRupiah($fee_marketing);

                        // $ptn_admin = stringToNumber($vision->ptn_admin);
                        // $ptn_admin_r = numberToRupiah($ptn_admin);

                        // $ptn_pph = stringToNumber($vision->ptn_pph);
                        // $ptn_pph_r = numberToRupiah($ptn_pph);

                        // $netto_marketing = stringToNumber($vision->netto_marketing);
                        // $netto_marketing_r = numberToRupiah($netto_marketing);

                        // $total_fee_vsn = $vision->fee_kantor + $vision->ptn_admin;

                        // $total_fee_vision = stringToNumber($total_fee_vsn);
                        // $total_fee_vision_r = numberToRupiah($total_fee_vision);

                        $nama_mar = null;
                        $id_mar = null;
                        foreach ($marketing as $mar) {
                            foreach ($omzet_vision as $vision_2) {
                                if ($vision_2->id_marketing == $mar->id_mar) {
                                    $id_mar = $mar->nomor_mar;
                                    $nama_mar = $mar->nama_mar;
                                }
                            }
                        }

                        $tgl_closing = date("d-m-Y", strtotime($vision->tgl_closing_komisi));
                        ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $vision->id_komisi; ?></td>
                            <td><?= $tgl_closing; ?></td>
                            <td>
                                <table id="myTable" class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Sat</td>
                                        </tr>
                                        <tr>
                                            <td>Sat</td>
                                        </tr>
                                        <tr>
                                            <td>Sat</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table id="myTable" class="table table-bordered table-striped">
                                    <tbody>
                                        <?php 
                                        foreach ($omzet_vision as $vision_2) {
                                            if ($vision->id_omzet == $vision_2->id_omzet) {
                                                foreach ($marketing as $mar) {
                                                    if ($mar->id_mar == $vision_2->id_marketing) {
                                                        echo '<tr>';
                                                        echo '<td>'.$mar->nama_mar . '</td>';
                                                        echo '</tr>';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </td>
                            <td><?= $vision->alamat_komisi ?></td>
                            <td><?= $vision->jt_komisi?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php $no++;
                    } ?>
                </tbody>
            </table> -->
        </div>
    </div>
</div>
</div>
</body>


