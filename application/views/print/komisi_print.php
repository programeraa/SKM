<?php include __DIR__ . '/../session_identitas.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px; 

        }

        .table th, .table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #343a40; 
            color: #fff; 
        }

        .table tbody tr:nth-child(even) {
            background-color: #f8f9fa; 
        }

        .table tbody tr:hover {
            background-color: #e2e6ea; 
        }

        .text-right {
            text-align: right; 
        }

        .bg-light {
            background-color: #f8f9fa; 
        }

        .table th[colspan="4"] {
            text-align: center; 
        }

        .table th[colspan="4"].text-warning {
            background-color: #ffc107; 
        }

        .form-group label span {
            font-weight: bold;
        }

        .table tr.d-xl-none {
            height: 20px; 
        }


        .card-body {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; 
            justify-content: space-between;
        }

        .col-md-6 {
            flex: 0 0 calc(50% - 20px);
            box-sizing: border-box;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group label span {
            font-weight: bold;
        }

    </style>

</head>
<body>
    <?php foreach ($komisi as $komisi) { 
        //setting apakah listing 1 a&a atau cobroke
        foreach ($marketing as $mkt) {
            if ($mkt->id_mar == $komisi->mar_listing_komisi) {
                $listing_1 = $mkt->nama_mar;
                break;
            }else {
                foreach ($co_broke as $kubruk) {
                    if ($komisi->mar_listing_komisi == $kubruk->id_komisi_unik && $komisi->id_komisi == $kubruk->id_komisi ) {
                        $listing_1 = $kubruk->nama_cobroke;
                        $jcl = $kubruk->jenis_cobroke;
                        if ($listing_2 = $kubruk->jenis_cobroke == 2) {
                            $j_cobroke = 'Badan';
                        }elseif ($listing_2 = $kubruk->jenis_cobroke == 2.5) {
                            $j_cobroke = 'Non-Badan (NPWP)';
                        }elseif($listing_2 = $kubruk->jenis_cobroke == 3){
                            $j_cobroke = 'Non-Badan (Non-NPWP)';
                        }
                        else{
                            $j_cobroke = 'Badan (Ada SKB)';
                        }
                        //$j_cobroke_angka = $kubruk->jenis_cobroke;
                    }
                }
            }
        }

        //setting apakah selling 1 a&a atau cobroke
        foreach ($marketing as $mkt) {
            if ($mkt->id_mar == $komisi->mar_selling_komisi) {
                $selling_1 = $mkt->nama_mar;
                break;
            }else{
                foreach ($co_broke as $kubruk) {
                    if ($komisi->mar_selling_komisi == $kubruk->id_komisi_unik && $komisi->id_komisi == $kubruk->id_komisi ) {
                        $selling_1 = $kubruk->nama_cobroke;
                        $jcs = $kubruk->jenis_cobroke;
                        if ($selling_2 = $kubruk->jenis_cobroke == 2) {
                            $s_cobroke = 'Badan';
                        }elseif ($selling_2 = $kubruk->jenis_cobroke == 2.5) {
                            $s_cobroke = 'Non-Badan (NPWP)';
                        }elseif($selling_2 = $kubruk->jenis_cobroke == 3){
                            $s_cobroke = 'Non-Badan (Non-NPWP)';
                        }
                        else{
                            $s_cobroke = 'Badan (Ada SKB)';
                        }
                        //$s_cobroke_angka = $kubruk->jenis_cobroke;
                    }
                }
            }
        }

        //setting marketing listing 2
        if (!empty($komisi->mar_listing2_komisi)) {
            foreach ($marketing as $mkt) {
                if ($mkt->id_mar == $komisi->mar_listing2_komisi) {
                    $listing2_baru = '- '.$mkt->nama_mar;
                }
            }
        }else{
            $listing2_baru = '';
        }

        //setting marketing selling 2
        if (!empty($komisi->mar_selling2_komisi)) {
            foreach ($marketing as $mkt) {
                if ($mkt->id_mar == $komisi->mar_selling2_komisi) {
                    $selling2_baru = '- '.$mkt->nama_mar;
                }
            }
        }else{
            $selling2_baru = '';
        }

        foreach ($referal as $ref) {
            if ($komisi->id_komisi == $ref->id_komisi) {
                $ket_referal = $ref->keterangan_referal;
                $jumlah_referal = $ref->jumlah_referal;

                $jumlah_referal_n = stringToNumber($jumlah_referal);
                $jumlah_referal_r = numberToRupiah($jumlah_referal_n);
                break;
            }
        }

        foreach ($potongan as $potongan_item) {
            if ($komisi->id_komisi == $potongan_item->id_komisi) {
                $ket_potongan = $potongan_item->keterangan_potongan;
                $jumlah_potongan = $potongan_item->jumlah_potongan;

                $jumlah_potongan_n = stringToNumber($jumlah_potongan);
                $jumlah_potongan_r = numberToRupiah($jumlah_potongan_n);
                break;
            }
        }

        $cek_cobroke = 0;
        foreach ($co_broke as $cek_kubruk) {
            if ($komisi->mar_selling_komisi == $cek_kubruk->id_komisi_unik && $komisi->id_komisi == $cek_kubruk->id_komisi) {
                $cek_nama_kubruk = $cek_kubruk->nama_cobroke;
                if (!empty($cek_nama_kubruk)) {
                    $cek_cobroke = 1;
                }
            }
        }

        foreach ($kantor as $ktr) {
            if ($ktr->id_kantor == $komisi->kantor_komisi) {
                $kantor_komisi = $ktr->kantor;
            }
        }

        foreach ($tampil_level as $level) {
            if ($level->id_level  == $komisi->level_pengguna) {
                $pengguna_level = $level->level;
            }

            if ($level->id_level  == $komisi->level_disetujui) {
                $disetujui_level = $level->level;
            }
        }
        ?>
        <h1>Detail Komisi Closing</h1>
        <div class="card-body">
            <div class="form-group">
                <label for="alamat" class="col-form-label"><span>Alamat Closing : </span> <?php echo $komisi->alamat_komisi; ?></label>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kantor" class="col-form-label"><span>Closing : </span> <?= date("d-m-Y", strtotime($komisi->tgl_closing_komisi))?></label>
                    </div>
                    <div class="form-group">
                        <label for="kantor" class="col-form-label"><span>Kantor : </span> <?= $kantor_komisi ?></label>
                    </div>
                    <div class="form-group">
                        <label for="nomor_kantor" class="col-form-label"><span>Nomor Kantor : </span> <?= $komisi->nomor_kantor_komisi ?></label>
                    </div>
                    <div class="form-group">
                        <label for="jt" class="col-form-label"><span>Jenis Transaksi : </span> <?php echo $komisi->jt_komisi; ?></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kantor" class="col-form-label"><span>Tgl Input : </span> <?= date("d-m-Y", strtotime($komisi->waktu_komisi))?>/<?= $komisi->nama_pengguna ?></label>
                    </div>
                    <div class="form-group">
                        <label for="jenis_hitungan_komisi" class="col-form-label"><span>Jenis Hitungan Komisi : </span><?= $komisi->jenis_hitungan_komisi ?></label>
                    </div>
                    <div class="form-group">
                        <label for="m_listing" class="col-form-label"><span>Marketing Listing : </span> <?= $listing_1 ?> <?= $listing2_baru ?></label>
                    </div>
                    <div class="form-group">
                        <label for="m_selling" class="col-form-label"><span>Marketing Selling : </span><?= $selling_1 ?> <?= $selling2_baru ?></label>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!empty($komisi->keterangan_komisi)) {?>
            <div class="card-body">
                <div class="form-group">
                    <label for="keterangan" class="col-form-label"><span>Keterangan : </span><?= $komisi->keterangan_komisi ?></label>
                </div>
            </div>
        <?php } ?>

        <!-- Rumus 1-->
        <?php include __DIR__ . '/../komisi/rumus_1.php'; ?>

        <h1>Rincian Fee Marketing</h1>

        <?php if ($komisi->mar_listing_komisi == $komisi->mar_selling_komisi){ ?>
            <div class="row">
                <div class="col">
                    <table class="tg table table-dark" width="100">
                        <thead>
                            <?php if (!empty($ket_referal) || !empty($ket_potongan)) {?>
                              <tr>
                                <th class="tg-0lax" colspan="1">Komisi Awal Diterima</th>
                                <th scope="col" class="text-right"><?php echo $bruto_awal_r;?></th> 
                            </tr>
                        <?php } ?>

                        <?php if ($komisi_kordinator != 0 && (!empty($ket_referal) || !empty($ket_potongan))) {?>
                            <tr>
                                <th class="tg-0lax" colspan="1">Komisi Kordinator (<?= $nilai_primary ?>%)</th>
                                <th scope="col" class="text-right"><?php echo $komisi_kordinator_r;?></th> 
                            </tr>
                        <?php } ?>

                        <?php if (!empty($ket_referal)) {?>
                            <tr>
                                <th class="tg-0lax text-warning" colspan="1">Referal (<?= $ket_referal; ?>)</th>
                                <?php if (strlen($referal_jumlah) <= 2) {?>
                                    <th scope="col" class="text-right"><?php echo $jumlah_referal_r;?> % : <?= $hitung_referal_r; ?></th>
                                <?php }else{ ?>
                                    <th scope="col" class="text-right"><?php echo $jumlah_referal_r;?></th>
                                <?php } ?>
                            </tr>
                        <?php }?>

                        <?php if (!empty($ket_potongan)) {?>
                            <tr>
                                <th class="tg-0lax text-warning" colspan="1">Potongan (<?= $ket_potongan; ?>)</th>
                                <th scope="col" class="text-right"><?php echo $jumlah_potongan_r;?></th>
                            </tr>
                        <?php }?>

                        <?php if (!empty($referal_jumlah) || !empty($potongan_jumlah)) {?>
                            <tr>
                                <th class="tg-0lax" colspan="1">Komisi Bruto</th>
                                <th scope="col" class="text-right text-warning"><?php echo $bruto_2_r;?></th>
                            </tr>

                            <?php if ($komisi->kantor_komisi == 1 && $komisi->mar_listing_komisi == 77 || $komisi->mar_selling_komisi == 77) {?>

                            <?php }else{ ?>
                                <tr>
                                    <th class="tg-0lax bg-light" style="background-color: #fff;" colspan="1"></th>
                                    <th scope="col" class="bg-light" style="background-color: #fff;"></th>
                                </tr>
                            <?php } ?>
                        <?php }else{?>
                            <tr>
                                <th class="tg-0lax" colspan="1">Komisi Bruto</th>
                                <?php if ($komisi_kordinator != 0) {?>
                                    <th scope="col" class="text-right"><?php echo $bruto_awal_r;?></th>
                                <?php }else{ ?>
                                    <th scope="col" class="text-right"><?php echo $bruto_r;?></th>
                                <?php } ?>
                            </tr>
                        <?php } ?>

                        <?php if ($komisi_kordinator != 0 && (empty($ket_referal) && empty($ket_potongan))) {?>
                            <tr>
                                <th class="tg-0lax" colspan="1">Komisi Kordinator (<?= $nilai_primary ?>%)</th>
                                <th scope="col" class="text-right"><?php echo $komisi_kordinator_r;?></th> 
                            </tr>
                        <?php } ?>

                    </thead>
                    <?php if ($komisi->kantor_komisi == 1 && $komisi->mar_listing_komisi == 77 || $komisi->mar_selling_komisi == 77) {?>

                    <?php }else{ ?>
                        <tbody>
                            <tr>
                                <td class="tg-0lax"><?php echo 'Fee Marketing'. ' ('.$komisi->nama_mar.' - '.$l_member.'%'.')'?></td>
                                <td class="tg-0lax text-right"><?php echo $fmk2_listing_r; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax"><?php echo 'Fee Kantor'?></td>
                                <td class="tg-0lax text-right"><?php echo $fkl_r; ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>

        <div class="card-header-sm text-dark">
            <?php if ($ml_afw || $ml_2_afw || $ms_afw || $ms_2_afw   == 'Ang/Fran/Win') {?>
                <h4 class="card-title pt-1 pb-2" style="text-align: left;">Rincian Komisi Ang</h4>
            <?php }else{ ?>
                <?php if ($komisi->kantor_komisi == 1 && $komisi->mar_listing_komisi == 77 || $komisi->mar_selling_komisi == 77) {?>
                <?php }else{ ?>
                    <h4 class="card-title p-2 m-0" style="text-align: center;">Rincian Komisi <?php echo $nama_marketing_listing_1; ?></h4>
                <?php } ?>
            <?php } ?>
        </div>

        <?php if ($ml_afw || $ml_2_afw || $ms_afw || $ms_2_afw   == 'Ang/Fran/Win') {?>

            <?php include __DIR__ . '/../komisi/rincian_komisi_afw.php'; ?>

        <?php }else{ ?>

            <div class="card-body p-0 pt-2">
                <?php if ($komisi->kantor_komisi == 1 && $komisi->mar_listing_komisi == 77 || $komisi->mar_selling_komisi == 77) {?>

                <?php }else{ ?>
                    <table class="tg table table-striped table-dark">
                        <tbody>
                          <tr>
                            <td class="tg-0lax"><?php echo 'Fee Marketing'?></td>
                            <td class="tg-0lax text-right"><?php echo $fmk2_listing_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"><?php echo 'Dikurangi Admin Sebesar 2.5%'?></td>
                            <td class="tg-0lax text-right"><?php echo $admin_listing_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Marketing Sementara'?></td>
                            <td class="tg-0lax text-right"><?php echo $fmk3_listing_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$pph_listing.')'?></td>
                            <td class="tg-0lax text-right"><?php echo $biaya_pph_l_r ?></td>
                        </tr>
                        <?php if ($jumlah_kurang_listing != 0) {?>
                            <tr>
                                <td class="tg-0lax text-warning">Biaya Pengurangan (<?= $keterangan_kurang_listing ?>)</td>
                                <td class="tg-0lax text-right"><?php echo $jumlah_kurang_listing_r; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
                            <td class="tg-0lax text-right text-warning"><?php echo $fmb_l_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-right" colspan="2"><?php echo $norek_listing; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if (!empty($referal_keterangan)) {?>
        <div class="card-header-sm text-dark">
            <h4 class="card-title p-2 m-0" style="text-align: center;">Rincian Komisi Referal <?php echo $referal_keterangan; ?></h4>
        </div>

        <div class="card-body p-0 pt-2">
            <table class="tg table table-striped table-dark">
                <tbody>
                  <tr>
                    <td class="tg-0lax"><?php echo 'Fee Referal'?></td>
                    <?php if (strlen($referal_jumlah) <= 2) {?>
                        <td class="tg-0lax text-right"><?php echo numberToRupiah($hitung_referal); ?></td>
                    <?php }else{ ?>
                        <td class="tg-0lax text-right"><?php echo numberToRupiah($referal_jumlah); ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$pph_referal.'% - '.$keterangan_pph.')'?></td>
                    <?php if (strlen($referal_jumlah) <= 2) {?>
                        <td class="tg-0lax text-right"><?php echo numberToRupiah($pajak_ref_2) ?></td>
                    <?php }else{ ?>
                        <td class="tg-0lax text-right"><?php echo numberToRupiah($total_pph_ref) ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
                    <?php if (strlen($referal_jumlah) <= 2) {?>
                        <td class="tg-0lax text-right"><?php echo numberToRupiah($fee_ref_diterima_2) ?></td>
                    <?php }else{ ?>
                        <td class="tg-0lax text-right text-warning"><?php echo numberToRupiah($fee_asli_referal); ?></td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
<?php } ?>

</div>

<div class="card-header-sm bg-dark text-white">
    <h4 class="card-title p-2 m-0" style="text-align: center;">Rincian Fee Upline</h4>
</div>

<!-- rumus 2 -->
<?php include __DIR__ . '/../komisi/rumus_2.php'; ?>

<?php if ($ml_afw || $ms_afw || $ml_2_afw || $ms_2_afw == "Ang/Fran/Win") { ?>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 Ang : (<?php 
                        if ($nama_upline1_ang) {
                            echo $nama_upline1_ang;
                        }else{
                            echo "Tidak Ada";
                        }
                    ?>)</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 Ang : (<?php 
                        if ($nama_upline2_ang) {
                            echo $nama_upline2_ang;
                        }else{
                            echo "Tidak Ada";
                        }
                    ?>)</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <?php if ($nama_upline1_ang != '') { ?>
                    <table class="tg table table-striped table-dark">
                        <tbody>
                          <tr>
                            <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                            <td class="tg-0lax text-right"><?php echo $afw_2_r; ?> * <?= $jup_1_ang ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-right"><?php echo $fuk_ang_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak_upline_ang  ?>)</td>
                            <td class="tg-0lax text-right"><?php echo $fuk_ang_r ?> * <?= $npwp_upline_ang_angka ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-right"><?php echo $pajak_upline_ang_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                            <td class="tg-0lax text-right"><?php echo $fuk_ang_r; ?> - <?= $pajak_upline_ang_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-warning text-right"><?php echo $netto_upline_ang_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-right" colspan="2"><?php echo $norek_upline1_ang; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php if ($nama_upline2_ang != '') { ?>
                    <table class="tg table table-striped table-dark">
                        <tbody>
                          <tr>
                            <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                            <td class="tg-0lax text-right"><?php echo $afw_2_r; ?> * <?= $jup_2_ang ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-right"><?php echo $fuk_ang2_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak_upline_ang2  ?>)</td>
                            <td class="tg-0lax text-right"><?php echo $fuk_ang2_r ?> * <?= $npwp_upline_ang2_angka ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-right"><?php echo $pajak_upline_ang2_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                            <td class="tg-0lax text-right"><?php echo $fuk_ang2_r; ?> - <?= $pajak_upline_ang2_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-warning text-right"><?php echo $netto_upline_ang2_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-right" colspan="2"><?php echo $norek_upline2_ang; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
</div>

<!-- Upline Milik Fran -->

<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 Fran : (<?php 
                    if ($nama_upline1_fran) {
                        echo $nama_upline1_fran;
                    }else{
                        echo "Tidak Ada";
                    }
                ?>)</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 Fran : (<?php 
                    if ($nama_upline2_fran) {
                        echo $nama_upline2_fran;
                    }else{
                        echo "Tidak Ada";
                    }
                ?>)</h4>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <?php if ($nama_upline1_fran != '') { ?>
                <table class="tg table table-striped table-dark">
                    <tbody>
                      <tr>
                        <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                        <td class="tg-0lax text-right"><?php echo $afw_2_r; ?> * <?= $jup_1_fran ?>%</td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax text-right"><?php echo $fuk_fran_r; ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak_upline_fran  ?>)</td>
                        <td class="tg-0lax text-right"><?php echo $fuk_fran_r ?> * <?= $npwp_upline_fran_angka ?>%</td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax text-right"><?php echo $pajak_upline_fran_r ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                        <td class="tg-0lax text-right"><?php echo $fuk_fran_r; ?> - <?= $pajak_upline_fran_r ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax text-warning text-right"><?php echo $netto_upline_fran_r; ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-right" colspan="2"><?php echo $norek_upline1_fran; ?></td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?php if ($nama_upline2_fran != '') { ?>
            <table class="tg table table-striped table-dark">
                <tbody>
                  <tr>
                    <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                    <td class="tg-0lax text-right"><?php echo $afw_2_r; ?> * <?= $jup_2_fran ?>%</td>
                </tr>
                <tr>
                    <td class="tg-0lax text-warning"></td>
                    <td class="tg-0lax text-right"><?php echo $fuk_fran2_r; ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak_upline_fran2  ?>)</td>
                    <td class="tg-0lax text-right"><?php echo $fuk_fran2_r ?> * <?= $npwp_upline_fran2_angka ?>%</td>
                </tr>
                <tr>
                    <td class="tg-0lax text-warning"></td>
                    <td class="tg-0lax text-right"><?php echo $pajak_upline_fran2_r ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                    <td class="tg-0lax text-right"><?php echo $fuk_fran2_r; ?> - <?= $pajak_upline_fran2_r ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax text-warning"></td>
                    <td class="tg-0lax text-warning text-right"><?php echo $netto_upline_fran2_r; ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax text-right" colspan="2"><?php echo $norek_upline2_fran; ?></td>
                </tr>
            </tbody>
        </table>
    <?php } ?>
</div>
</div>
</div>

<!-- Upline Milik Winata -->

<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 Winata : (<?php 
                    if ($nama_upline1_win) {
                        echo $nama_upline1_win;
                    }else{
                        echo "Tidak Ada";
                    }
                ?>)</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 Winata : (<?php 
                    if ($nama_upline2_win) {
                        echo $nama_upline2_win;
                    }else{
                        echo "Tidak Ada";
                    }
                ?>)</h4>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <?php if ($nama_upline1_win != '') { ?>
                <table class="tg table table-striped table-dark">
                    <tbody>
                      <tr>
                        <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                        <td class="tg-0lax text-right"><?php echo $afw_1_r; ?> * <?= $jup_1_win ?>%</td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax text-right"><?php echo $fuk_win_r; ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak_upline_win  ?>)</td>
                        <td class="tg-0lax text-right"><?php echo $fuk_win_r ?> * <?= $npwp_upline_win_angka ?>%</td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax text-right"><?php echo $pajak_upline_win_r ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                        <td class="tg-0lax text-right"><?php echo $fuk_win_r; ?> - <?= $pajak_upline_win_r ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax text-warning text-right"><?php echo $netto_upline_win_r; ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-right" colspan="2"><?php echo $norek_upline1_win; ?></td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?php if ($nama_upline2_win != '') { ?>
            <table class="tg table table-striped table-dark">
                <tbody>
                  <tr>
                    <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                    <td class="tg-0lax text-right"><?php echo $afw_1_r; ?> * <?= $jup_2_win ?>%</td>
                </tr>
                <tr>
                    <td class="tg-0lax text-warning"></td>
                    <td class="tg-0lax text-right"><?php echo $fuk_win2_r; ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak_upline_win2  ?>)</td>
                    <td class="tg-0lax text-right"><?php echo $fuk_win2_r ?> * <?= $npwp_upline_win2_angka ?>%</td>
                </tr>
                <tr>
                    <td class="tg-0lax text-warning"></td>
                    <td class="tg-0lax text-right"><?php echo $pajak_upline_win2_r ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                    <td class="tg-0lax text-right"><?php echo $fuk_win2_r; ?> - <?= $pajak_upline_win2_r ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax text-warning"></td>
                    <td class="tg-0lax text-warning text-right"><?php echo $netto_upline_win2_r; ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax text-right" colspan="2"><?php echo $norek_upline2_win; ?></td>
                </tr>
            </tbody>
        </table>
    <?php } ?>
</div>
</div>
</div>


<?php }else{ ?>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 (<?php 
                        if (!empty($up_1_listing)) {
                            echo $up_1_listing;
                        }else{
                            echo "Tidak Ada";
                        }
                    ?>)</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 (<?php 
                        if ($up_2_listing) {
                            echo $up_2_listing;
                        }else{
                            echo "Tidak Ada"; 
                        }
                    ?>)</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="card-body p-0 pt-2">
            <div class="row">
                <div class="col-md-6">
                    <?php if ($up_listing_1 == 1) { ?>
                        <table class="tg table table-striped table-dark">
                            <tbody>
                              <tr>
                                <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                                <td class="tg-0lax text-right"><?php echo $fkl_r; ?> * <?= $jup_l1 ?>%</td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"></td>
                                <td class="tg-0lax text-right"><?php echo $fuk_r; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak_listing_1  ?>)</td>
                                <td class="tg-0lax text-right"><?php echo $fuk_r ?> * <?= $npwp_upline1_listing ?>%</td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"></td>
                                <td class="tg-0lax text-right"><?php echo $pajak_listing_1_r ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                                <td class="tg-0lax text-right"><?php echo $fuk_r; ?> - <?= $pajak_listing_1_r ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"></td>
                                <td class="tg-0lax text-warning text-right"><?php echo $netto_listing_1_r; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-right" colspan="2"><?php echo $norek_up_listing1; ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?php if ($up_listing_2 == 1) { ?>
                    <table class="tg table table-striped table-dark">
                        <tbody>
                          <tr>
                            <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                            <td class="tg-0lax text-right"><?php echo $fkl_r; ?> * <?= $jup_l2 ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-right"><?php echo $fuk2_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak_listing_2  ?>)</td>
                            <td class="tg-0lax text-right"><?php echo $fuk2_r ?> * <?= $npwp_upline2_listing ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-right"><?php echo $pajak_listing_2_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                            <td class="tg-0lax text-right"><?php echo $fuk2_r; ?> - <?= $pajak_listing_2_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-warning text-right"><?php echo $netto_listing_2_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-right" colspan="2"><?php echo $norek_up_listing2; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>

</div>
<?php } ?>
</div>

<?php }else{ ?>
    <div>
        <div class="card-body">
            <!-- Kasus jika 2 marketing (listing dan selling)-->
            <div class="row" style="width:100%">
                <div class="col">
                    <table class="tg table table-dark" width="100">
                        <thead>
                            <?php if (!empty($ket_referal) || !empty($ket_potongan) || !empty($j_cobroke) || !empty($s_cobroke)) {?>
                              <tr>
                                <th class="tg-0lax" colspan="4">Komisi Bruto Awal</th>
                                <th scope="col" class="text-right"><?php echo $bruto_awal_r;?></th> 
                            </tr>
                        <?php } ?>

                        <?php if ($komisi_kordinator != 0 && (!empty($ket_referal) || !empty($ket_potongan))) {?>
                            <tr>
                                <th class="tg-0lax" colspan="4">Komisi Kordinator (<?= $nilai_primary ?>%)</th>
                                <th scope="col" class="text-right"><?php echo $komisi_kordinator_r;?></th> 
                            </tr>
                        <?php } ?>

                        <?php if (!empty($referal_keterangan) && empty($kubruk_nama)) {?>
                            <tr>
                                <th class="tg-0lax" colspan="4">Referal (<?= $ket_referal; ?>)</th>
                                <?php if (strlen($referal_jumlah) <= 2) {?>
                                    <th scope="col" class="text-right"><?php echo $jumlah_referal_r;?> % : <?= $hitung_referal_r; ?></th>
                                <?php }else{ ?>
                                    <th scope="col" class="text-right"><?php echo $jumlah_referal_r;?></th>
                                <?php } ?>
                            </tr>
                        <?php }?>

                        <?php if (!empty($ket_potongan)) {?>
                            <tr>
                                <th class="tg-0lax text" colspan="4">Potongan (<?= $ket_potongan;?>)</th>
                                <th scope="col" class="text-right"><?php echo $jumlah_potongan_r;?></th>
                            </tr>
                        <?php }?>

                        <?php if (!empty($potongan_jumlah)) {?>
                            <tr>
                                <th class="tg-0lax" colspan="4">Komisi Bruto</th>
                                <th scope="col" class="text-right text-warning"><?php echo $bruto_2_r;?></th>
                            </tr>
                            <tr>
                                <th class="tg-0lax" colspan="4" style="background-color: #fff;"></th>
                                <th scope="col" class="bg-light" style="background-color: #fff;"></th>
                            </tr>
                        <?php }elseif (!empty($kubruk_nama)) {?>
                            <tr class="d-xl-none"></tr>
                        <?php }else{ ?>
                            <tr>
                                <th class="tg-0lax" colspan="4">Komisi Bruto</th>
                                <?php if ($komisi_kordinator != 0) {?>
                                    <?php if (!empty($ket_referal)){ ?>
                                        <th scope="col" class="text-right"><?php echo $bruto_1_r;?></th>
                                    <?php }else{?>
                                        <th scope="col" class="text-right"><?php echo $bruto_awal_r;?></th>
                                    <?php } ?>
                                <?php }else{ ?>
                                    <th scope="col" class="text-right"><?php echo $bruto_r;?></th>
                                <?php } ?>
                            </tr>
                        <?php } ?>

                        <?php if ($komisi_kordinator != 0 && (empty($ket_referal) && empty($ket_potongan))) {?>
                            <tr>
                                <th class="tg-0lax" colspan="4">Komisi Kordinator (<?= $nilai_primary ?>%)</th>
                                <th scope="col" class="text-right"><?php echo $komisi_kordinator_r;?></th> 
                            </tr>
                        <?php } ?>

                    </thead>
                    <tbody>
                        <?php if (!empty($referal_keterangan) && !empty($kubruk_nama)) {?>
                            <tr>
                                <th class="tg-0lax" colspan="4">Referal (<?= $ket_referal; ?>)</th>
                                <?php if (strlen($referal_jumlah) <= 2) {?>
                                    <th scope="col" class="text-right"><?php echo $jumlah_referal_r;?> % : <?= $hitung_referal_baru_r; ?></th>
                                <?php }else{ ?>
                                    <th scope="col" class="text-right"><?php echo $jumlah_referal_r;?></th>
                                <?php } ?>
                            </tr>
                        <?php }?>

                        <tr>
                            <?php if (($komisi->mar_listing_komisi == 77 && !empty($s_cobroke))){?>

                                <td class="tg-0lax "><?php echo 'Fee Listing/Kantor'?></td>

                                <?php if (!empty($j_cobroke)) {?>
                                    <td class="tg-0lax text-right"><?php echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;' . $bruto_3_r; ?></td>
                                <?php }else{ ?>
                                    <td class="tg-0lax text-right"><?php echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;' . $fmk_r; ?></td>
                                <?php } ?>

                            <?php }else{ ?>

                                <td class="tg-0lax "><?php echo 'Marketing Listing'?></td>
                                <?php if (!empty($j_cobroke)) {?>
                                    <td class="tg-0lax text-right"><?php echo $bruto_3_r; ?></td>
                                <?php }else{ ?>
                                    <td class="tg-0lax text-right"><?php echo $fmk_r; ?></td>
                                <?php } ?>

                            <?php } ?>

                            <td class="tg-0lax " rowspan="3"></td>

                            <?php if (($komisi->mar_selling_komisi == 77 && !empty($j_cobroke))){?>

                                <td class="tg-0lax "><?php echo 'Fee Selling/Kantor'?></td>
                                <?php if (!empty($s_cobroke)) {?>
                                    <td class="tg-0lax text-right"><?php echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;' . $bruto_3_r; ?></td>
                                <?php }else{ ?>
                                    <td class="tg-0lax text-right"><?php echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;' . $fmk_r; ?></td>
                                <?php } ?>

                            <?php }else{ ?>

                                <td class="tg-0lax "><?php echo 'Marketing Selling'?></td>
                                <?php if (!empty($s_cobroke)) {?>
                                    <td class="tg-0lax text-right"><?php echo $bruto_3_r; ?></td>
                                <?php }else{ ?>
                                    <td class="tg-0lax text-right"><?php echo $fmk_r; ?></td>
                                <?php } ?>
                            <?php } ?>
                        </tr>
                        <tr>
                            <?php if (!empty($j_cobroke)) {?>

                                <td class="tg-0lax"><?php echo 'Co-Broke : '.''.$listing_1.''?></td>
                                <td class="tg-0lax text-right">Komisi : <?= $persen_cobroke ?> %</td>

                            <?php }else{ ?>

                                <?php if (($komisi->mar_listing_komisi == 77 && !empty($s_cobroke)) || ($komisi->mar_selling_komisi == 77 && !empty($j_cobroke))){?>

                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax text-right"></td>

                                <?php }else{ ?>

                                    <td class="tg-0lax"><?php echo 'Fee Marketing'. ' ('.$komisi->nama_mar.' - '.$l_member.'%'.')'?></td>
                                    <td class="tg-0lax text-right"><?php echo $fmk2_listing_r; ?></td>

                                <?php } ?>
                            <?php } ?>

                            <?php if (!empty($s_cobroke)) {?>

                                <td class="tg-0lax"><?php echo 'Co-Broke : '.''.$selling_1.''?></td>
                                <td class="tg-0lax text-right">Komisi : <?= $persen_cobroke ?> %</td>

                            <?php }else{ ?>

                                <?php if (($komisi->mar_listing_komisi == 77 && !empty($s_cobroke)) || ($komisi->mar_selling_komisi == 77 && !empty($j_cobroke))){?>
                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax text-right"></td>

                                <?php }else{ ?>

                                    <td class="tg-0lax"><?php echo 'Fee Marketing'. ' ('.$komisi->nama_mar2.' - '.$s_member.'%'.')'?></td>
                                    <td class="tg-0lax text-right"><?php echo $fmk2_selling_r; ?></td>

                                <?php } ?>
                            <?php } ?>

                        </tr>
                        <tr>
                            <?php if (!empty($j_cobroke)) {?>

                                <td class="tg-0lax">Jenis Co-Broke</td>
                                <td class="tg-0lax text-right"><?php echo $j_cobroke; ?></td>

                            <?php }else{ ?>

                                <?php if (($komisi->mar_listing_komisi == 77 && !empty($s_cobroke)) || ($komisi->mar_selling_komisi == 77 && !empty($j_cobroke))){?>

                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax text-right"></td>

                                <?php }else{ ?>
                                    <td class="tg-0lax"><?php echo 'Fee Kantor'?></td>
                                    <td class="tg-0lax text-right"><?php echo $fkl_r; ?></td>
                                <?php } ?>
                            <?php } ?>

                            <?php if (!empty($s_cobroke)) {?>

                                <td class="tg-0lax">Jenis Co-Broke</td>
                                <td class="tg-0lax text-right"><?php echo $s_cobroke; ?></td>

                            <?php }else{ ?>
                                <?php if (($komisi->mar_listing_komisi == 77 && !empty($s_cobroke)) || ($komisi->mar_selling_komisi == 77 && !empty($j_cobroke))){?>

                                    <td class="tg-0lax"></td>
                                    <td class="tg-0lax text-right"></td>

                                <?php }else{ ?>
                                    <td class="tg-0lax"><?php echo 'Fee Kantor'?></td>
                                    <td class="tg-0lax text-right"><?php echo $fks_r; ?></td>
                                <?php } ?>
                            <?php } ?>

                        </tr>
                        <?php if (!empty($m_listing_2 || $m_selling_2)) { ?>
                            <tr>
                                <td class="tg-0lax bg-light"></td>
                                <td class="tg-0lax bg-light"></td>
                                <td class="tg-0lax bg-light"></td>
                                <td class="tg-0lax bg-light"></td>
                                <td class="tg-0lax bg-light"></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax"><?php echo 'Marketing Listing Ke 2'?></td>
                                <td class="tg-0lax text-right"><?php if (!empty($m_listing_2)) { echo $fmk_r;}else{echo 0;}?></td>
                                <td class="tg-0lax" rowspan="3"></td>
                                <td class="tg-0lax "><?php echo 'Marketing Selling Ke 2'?></td>
                                <td class="tg-0lax text-right"><?php if (!empty($m_selling_2)) { echo $fmk_r;}else{echo 0;}?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax"><?php echo 'Fee Marketing'. ' ('.$komisi->listing_2.' - '.$l_member2.'%'.')'?></td>
                                <td class="tg-0lax text-right"><?php echo $fmk2_listing2_r; ?></td>
                                <td class="tg-0lax"><?php echo 'Fee Marketing'. ' ('.$komisi->selling_2.' - '.$s_member2.'%'.')'?></td>
                                <td class="tg-0lax text-right"><?php echo $fmk2_selling2_r; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax"><?php echo 'Fee Kantor'?></td>
                                <td class="tg-0lax text-right"><?php if (!empty($m_listing_2)) {echo $fkl2_r;}else{echo 0;}?></td>
                                <td class="tg-0lax"><?php echo 'Fee Kantor'?></td>
                                <td class="tg-0lax text-right"><?php if (!empty($m_selling_2)) {echo $fks2_r;}else{echo 0;}?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php if (!empty($j_cobroke)) {?>
                        <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi <?php echo $listing_1; ?></h4>
                    <?php }else{ ?>
                        <?php if ($ml_afw == 'Ang/Fran/Win') {?>
                            <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi Ang</h4>
                        <?php }else{ ?>

                            <?php if (($komisi->mar_listing_komisi == 77 && !empty($s_cobroke)) || ($komisi->mar_selling_komisi == 77 && !empty($j_cobroke))){?>
                                <h4 class="card-title p-0 m-0" style="text-align: center;"></h4>
                            <?php }else{ ?>
                                <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi <?php echo $nama_marketing_listing_1; ?></h4>
                            <?php } ?>

                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php if (!empty($s_cobroke)) {?>
                        <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi <?php echo $selling_1; ?></h4>
                    <?php }else{ ?>
                        <?php if ($ms_afw == 'Ang/Fran/Win') {?>
                            <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi Ang</h4>
                        <?php }else{ ?>

                            <?php if (($komisi->mar_listing_komisi == 77 && !empty($s_cobroke)) || ($komisi->mar_selling_komisi == 77 && !empty($j_cobroke))){?>
                                <h4 class="card-title p-0 m-0" style="text-align: center;"></h4>
                            <?php }else{ ?>
                                <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi <?php echo $nama_marketing_selling_1; ?></h4>
                            <?php } ?>

                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="card-body p-0 pt-2" style="width:100%">
            <div class="row">
                <div class="col-md-6">
                    <?php if (!empty($j_cobroke)) {?>
                        <!-- hitung marketing listing co broke-->
                        <table class="tg table table-striped table-dark">
                            <tbody>
                              <tr>
                                <td class="tg-0lax">Fee Marketing Co-Broke</td>
                                <td class="tg-0lax text-right"><?php echo $bruto_cobroke_r; ?></td>
                            </tr>
                            <tr>
                                <?php if ($jcl == 2) {?>
                                    <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 23 ('.$j_cobroke_angka.'% - '.$j_cobroke.')'?></td>
                                <?php }else{ ?>
                                    <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$j_cobroke_angka.'% - '.$j_cobroke.')'?></td>
                                <?php } ?>
                                <td class="tg-0lax text-right"><?php echo $pph_cobroke_listing_r ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
                                <td class="tg-0lax text-warning text-right"><?php echo $fee_cobroke_listing_r; ?></td>
                            </tr>
                        <!-- <tr>
                            <td class="tg-0lax">No Rekening</td>
                            <td class="tg-0lax text-right"><?php echo $norek_listing; ?></td>
                        </tr> -->
                    </tbody>
                </table>
            <?php }else{ ?>

                <?php if ($ml_afw == 'Ang/Fran/Win') {?>

                    <?php include __DIR__ . '/../komisi/rincian_komisi_afw.php'; ?>

                <?php }else{ ?>
                    <?php if (($komisi->mar_listing_komisi == 77 && !empty($s_cobroke)) || ($komisi->mar_selling_komisi == 77 && !empty($j_cobroke))){?>

                    <?php }else{ ?>
                        <table class="tg table table-striped table-dark">
                            <tbody>
                              <tr>
                                <td class="tg-0lax"><?php echo 'Fee Marketing'?></td>
                                <td class="tg-0lax text-right"><?php echo $fmk2_listing_r; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"><?php echo 'Dikurangi Admin Sebesar 2.5%'?></td>
                                <td class="tg-0lax text-right"><?php echo $admin_listing_r; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax"><?php echo 'Fee Marketing Sementara'?></td>
                                <td class="tg-0lax text-right"><?php echo $fmk3_listing_r; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$pph_listing.')'?></td>
                                <td class="tg-0lax text-right"><?php echo $biaya_pph_l_r ?></td>
                            </tr>
                            <?php if ($jumlah_kurang_listing != 0) {?>
                                <tr>
                                    <td class="tg-0lax text-warning">Biaya Pengurangan (<?= $keterangan_kurang_listing ?>)</td>
                                    <td class="tg-0lax text-right"><?php echo $jumlah_kurang_listing_r; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
                                <td class="tg-0lax text-warning text-right"><?php echo $fmb_l_r; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-right" colspan="2"><?php echo $norek_listing; ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?php if (!empty($s_cobroke)) {?>
            <!-- hitung marketing selling co broke-->
            <table class="tg table table-striped table-dark">
                <tbody>
                  <tr>
                    <td class="tg-0lax">Fee Marketing Co-Broke</td>
                    <td class="tg-0lax text-right"><?php echo $bruto_cobroke_r; ?></td>
                </tr>
                <tr>
                    <?php if ($jcs == 2) {?>
                        <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 23 ('.$s_cobroke_angka.'% - '.$s_cobroke.')'?></td>
                    <?php }else{?>
                        <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$s_cobroke_angka.'% - '.$s_cobroke.')'?></td>
                    <?php } ?>
                    <td class="tg-0lax text-right"><?php echo $pph_cobroke_selling_r ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
                    <td class="tg-0lax text-warning text-right"><?php echo $fee_cobroke_selling_r; ?></td>
                </tr>
                        <!-- <tr>
                            <td class="tg-0lax">No Rekening</td>
                            <td class="tg-0lax text-right"><?php echo $norek_listing; ?></td>
                        </tr> -->
                    </tbody>
                </table>
            <?php }else{ ?>

                <?php if ($ms_afw == 'Ang/Fran/Win') {?>

                    <?php include __DIR__ . '/../komisi/rincian_komisi_afw.php'; ?>

                <?php }else{ ?>
                    <?php if (($komisi->mar_listing_komisi == 77 && !empty($s_cobroke)) || ($komisi->mar_selling_komisi == 77 && !empty($j_cobroke))){?>

                    <?php }else{ ?>
                     <table class="tg table table-striped table-dark">
                        <tbody>
                          <tr>
                            <td class="tg-0lax"><?php echo 'Fee Marketing'?></td>
                            <td class="tg-0lax text-right"><?php echo $fmk2_selling_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"><?php echo 'Dikurangi Admin Sebesar 2.5%'?></td>
                            <td class="tg-0lax text-right"><?php echo $admin_selling_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Marketing Sementara'?></td>
                            <td class="tg-0lax text-right"><?php echo $fmk3_selling_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$pph_selling.')'?></td>
                            <td class="tg-0lax text-right"><?php echo $biaya_pph_s_r ?></td>
                        </tr>
                        <?php if ($jumlah_kurang_selling != 0) {?>
                            <tr>
                                <td class="tg-0lax text-warning">Biaya Pengurangan (<?= $keterangan_kurang_selling ?>)</td>
                                <td class="tg-0lax text-right"><?php echo $jumlah_kurang_selling_r; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
                            <td class="tg-0lax text-warning text-right"><?php echo $fmb_s_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-right" colspan="2"><?php echo $norek_selling; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</div>
</div>
</div>
</div>

<!-- Kasus jika 4 marketing (listing 2 dan selling 2)-->
<?php if (!empty($m_listing_2 || $m_selling_2)) { ?>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php if ($ml_2_afw == 'Ang/Fran/Win') {?>
                        <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi Ang</h4>
                    <?php }else{ ?>
                        <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi <?php echo $komisi->listing_2; ?></h4>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php if ($ms_2_afw == 'Ang/Fran/Win') {?>
                        <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi Ang</h4>
                    <?php }else{ ?>
                        <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi <?php echo $komisi->selling_2; ?></h4>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


    <div class="card-body">
        <div class="card-body p-0 pt-2" style="width : 100%">
            <div class="row">
                <div class="col-md-6">
                    <?php if ($ml_2_afw == 'Ang/Fran/Win') {?>

                        <?php include __DIR__ . '/../komisi/rincian_komisi_afw.php'; ?>

                    <?php }else{ ?>
                        <?php if (!empty($m_listing_2)) {?>
                            <table class="tg table table-striped table-dark">
                                <tbody>
                                  <tr>
                                    <td class="tg-0lax"><?php echo 'Fee Marketing'?></td>
                                    <td class="tg-0lax text-right"><?php echo $fmk2_listing2_r; ?></td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax text-warning"><?php echo 'Dikurangi Admin Sebesar 2.5%'?></td>
                                    <td class="tg-0lax text-right"><?php echo $admin_listing2_r; ?></td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax"><?php echo 'Fee Marketing Sementara'?></td>
                                    <td class="tg-0lax text-right"><?php echo $fmk3_listing2_r; ?></td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$pph_listing2.')'?></td>
                                    <td class="tg-0lax text-right"><?php echo $biaya_pph_l2_r ?></td>
                                </tr>
                                <?php if ($jumlah_kurang_listing2 != 0) {?>
                                    <tr>
                                        <td class="tg-0lax text-warning">Biaya Pengurangan (<?= $keterangan_kurang_listing2 ?>)</td>
                                        <td class="tg-0lax text-right"><?php echo $jumlah_kurang_listing2_r; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
                                    <td class="tg-0lax text-warning text-right"><?php echo $fmb_l2_r; ?></td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax text-right" colspan="2"><?php echo $norek_listing2; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?php if ($ms_2_afw == 'Ang/Fran/Win') {?>

                    <?php include __DIR__ . '/../komisi/rincian_komisi_afw.php'; ?>

                <?php }else{ ?>
                    <?php if (!empty($m_selling_2)) {?>
                     <table class="tg table table-striped table-dark">
                        <tbody>
                          <tr>
                            <td class="tg-0lax"><?php echo 'Fee Marketing'?></td>
                            <td class="tg-0lax text-right"><?php echo $fmk2_selling2_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"><?php echo 'Dikurangi Admin Sebesar 2.5%'?></td>
                            <td class="tg-0lax text-right"><?php echo $admin_selling2_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Marketing Sementara'?></td>
                            <td class="tg-0lax text-right"><?php echo $fmk3_selling2_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$pph_selling2.')'?></td>
                            <td class="tg-0lax text-right"><?php echo $biaya_pph_s2_r ?></td>
                        </tr>
                        <?php if ($jumlah_kurang_selling2 != 0) {?>
                            <tr>
                                <td class="tg-0lax text-warning">Biaya Pengurangan (<?= $keterangan_kurang_selling2 ?>)</td>
                                <td class="tg-0lax text-right"><?php echo $jumlah_kurang_selling2_r; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
                            <td class="tg-0lax text-warning text-right"><?php echo $fmb_s2_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-right" colspan="2"><?php echo $norek_selling2; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        <?php } ?>
    </div>
</div>
</div>
</div>
<?php } ?>

<?php if (!empty($referal_keterangan)) {?>
    <div class="card-header-sm text-dark">
        <h4 class="card-title p-2 m-0" style="text-align: center;">Rincian Komisi Referal <?php echo $referal_keterangan; ?></h4>
    </div>

    <div class="card-body p-0 pt-2">
        <table class="tg table table-striped table-dark">
            <tbody>
              <tr>
                <td class="tg-0lax"><?php echo 'Fee Referal'?></td>
                <?php if (strlen($referal_jumlah) <= 2) {?>
                    <?php if (!empty($kubruk_nama)){ ?>
                        <td class="tg-0lax text-right"><?php echo numberToRupiah($hitung_referal_baru); ?></td>
                    <?php }else{ ?>
                        <td class="tg-0lax text-right"><?php echo numberToRupiah($hitung_referal); ?></td>
                    <?php } ?>
                <?php }else{ ?>
                    <td class="tg-0lax text-right"><?php echo numberToRupiah($referal_jumlah); ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$pph_referal.'% - '.$keterangan_pph.')'?></td>
                <?php if (strlen($referal_jumlah) <= 2) {?>
                    <?php if (!empty($kubruk_nama)) {?>
                        <td class="tg-0lax text-right"><?php echo numberToRupiah($pajak_ref_1) ?></td>
                    <?php }else{ ?>
                        <td class="tg-0lax text-right"><?php echo numberToRupiah($pajak_ref_2) ?></td>
                    <?php } ?>
                <?php }else{ ?>
                    <td class="tg-0lax text-right"><?php echo numberToRupiah($total_pph_ref) ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
                <?php if (strlen($referal_jumlah) <= 2) {?>
                    <?php if (!empty($kubruk_nama)) {?>
                        <td class="tg-0lax text-right"><?php echo numberToRupiah($fee_ref_diterima_1) ?></td>
                    <?php }else{ ?>
                        <td class="tg-0lax text-right"><?php echo numberToRupiah($fee_ref_diterima_2) ?></td>
                    <?php } ?>
                <?php }else{ ?>
                    <td class="tg-0lax text-right text-warning"><?php echo numberToRupiah($fee_asli_referal); ?></td>
                <?php } ?>
            </tr>
        </tbody>
    </table>
</div>
<?php } ?>

<?php include __DIR__ . '/../komisi/rumus_2.php'; ?>

<div class="card-header-sm bg-dark text-white">
    <h4 class="card-title p-2 m-0" style="text-align: center; margin-bottom: 0px;">Rincian Fee Upline 1</h4>
</div>

<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php if ($ml_afw == "Ang/Fran/Win") { ?>
                    <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 Ang : (<?php
                        if ($nama_upline1_ang) {
                            echo $nama_upline1_ang;
                        }else{
                            echo "Tidak Ada";
                        }?>)
                    </h4>
                <?php }else{ ?>

                    <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 Listing (<?php 
                        if (!empty($up_1_listing)) {
                         echo $up_1_listing;
                     }else{ echo "Tidak Ada"; 
                 } ?>)
             </h4>
         <?php } ?>
     </div>
 </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php if ($ms_afw == "Ang/Fran/Win") { ?>
                <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 Ang : (<?php 
                    if ($nama_upline1_ang) {
                        echo $nama_upline1_ang;
                    }else{
                        echo "Tidak Ada";
                    }?>)
                </h4>
            <?php }else{ ?>
             <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 Selling (<?php 
                if (!empty($up_1_selling)) {
                    echo $up_1_selling;
                }else{
                    echo "Tidak Ada";
                }?>)
            </h4>
        <?php } ?>
    </div>
</div>
</div>
</div>

<div class="card-body">
    <div class="card-body p-0 pt-2" style="width : 100%">
        <div class="row">
            <div class="col-md-6">
                <?php if ($ml_afw == "Ang/Fran/Win") { ?>

                    <?php include __DIR__ . '/../komisi/upline_afw_2.php'; ?>

                <?php }else{ ?>
                    <?php if ($up_listing_1 == 1) { ?>
                        <table class="tg table table-striped table-dark">
                            <tbody>
                              <tr>
                                <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                                <td class="tg-0lax text-right"><?php echo $fkl_r; ?> * <?= $jup_l1 ?>%</td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"></td>
                                <td class="tg-0lax text-right"><?php echo $fuk_r; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak_listing_1  ?>)</td>
                                <td class="tg-0lax text-right"><?php echo $fuk_r ?> * <?= $npwp_upline1_listing ?>%</td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"></td>
                                <td class="tg-0lax text-right"><?php echo $pajak_listing_1_r ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                                <td class="tg-0lax text-right"><?php echo $fuk_r; ?> - <?= $pajak_listing_1_r ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"></td>
                                <td class="tg-0lax text-warning text-right"><?php echo $netto_listing_1_r; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-right" colspan="2"><?php echo $norek_up_listing1; ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php if ($ms_afw == "Ang/Fran/Win") { ?>

                <?php include __DIR__ . '/../komisi/upline_afw_2.php'; ?>

            <?php }else{ ?>
                <?php if ($up_selling_1 == 1) { ?>
                    <table class="tg table table-striped table-dark">
                        <tbody>
                          <tr>
                            <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                            <td class="tg-0lax text-right"><?php echo $fks_r; ?> * <?= $jup_s1 ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-right"><?php echo $fuk_s_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak_selling_1  ?>)</td>
                            <td class="tg-0lax text-right"><?php echo $fuk_s_r ?> * <?= $npwp_upline1_selling ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-right"><?php echo $pajak_selling_1_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                            <td class="tg-0lax text-right"><?php echo $fuk_s_r; ?> - <?= $pajak_selling_1_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-warning text-right"><?php echo $netto_selling_1_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-right" colspan="2"><?php echo $norek_up_selling1; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        <?php } ?>
    </div>
</div>
</div>
</div>

<!--upline listing dan selling 2-->
<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 Listing (<?php 
                    if (!empty($up_2_listing)) {
                        echo $up_2_listing;
                    }else{
                        echo "Tidak Ada";
                    }
                ?>)</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 Selling (<?php 
                    if ($up_2_selling) {
                        echo $up_2_selling;
                    }else{
                        echo "Tidak Ada";
                    }
                ?>)</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="card-body p-0 pt-2" style="width:100%;">
        <div class="row">
            <div class="col-md-6">
                <?php if ($up_listing_2 == 1) { ?>
                    <table class="tg table table-striped table-dark">
                        <tbody>
                          <tr>
                            <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                            <td class="tg-0lax text-right"><?php echo $fkl_r; ?> * <?= $jup_l2 ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-right"><?php echo $fuk2_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak_listing_2  ?>)</td>
                            <td class="tg-0lax text-right"><?php echo $fuk2_r ?> * <?= $npwp_upline2_listing ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-right"><?php echo $pajak_listing_2_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                            <td class="tg-0lax text-right"><?php echo $fuk2_r; ?> - <?= $pajak_listing_2_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-warning text-right"><?php echo $netto_listing_2_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-right" colspan="2"><?php echo $norek_up_listing2; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php if ($up_selling_2 == 1) { ?>
                <table class="tg table table-striped table-dark">
                    <tbody>
                      <tr>
                        <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                        <td class="tg-0lax text-right"><?php echo $fks_r; ?> * <?= $jup_s2 ?>%</td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax text-right"><?php echo $fuk2_s_r; ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak_selling_2  ?>)</td>
                        <td class="tg-0lax text-right"><?php echo $fuk2_s_r ?> * <?= $npwp_upline2_selling ?>%</td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax text-right"><?php echo $pajak_selling_2_r ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                        <td class="tg-0lax text-right"><?php echo $fuk2_s_r; ?> - <?= $pajak_selling_2_r ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax text-warning text-right"><?php echo $netto_selling_2_r; ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-right" colspan="2"><?php echo $norek_up_selling2; ?></td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>
</div>
</div>

<?php if (!empty($komisi->up_1_listing2) || !empty($komisi->up_2_listing2) || !empty($komisi->up_1_selling2) || !empty($komisi->up_2_selling2) || $ml_2_afw == "Ang/Fran/Win" || $ms_2_afw == "Ang/Fran/Win") :?>
<div class="card-header-sm bg-dark text-white">
    <h4 class="card-title p-2 m-0" style="text-align: center; margin-bottom: 0px;">Rincian Fee Upline 2</h4>
</div>

<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php if ($ml_2_afw == "Ang/Fran/Win") { ?>
                    <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 Ang : (<?php
                        if ($nama_upline1_ang) {
                            echo $nama_upline1_ang;
                        }else{
                            echo "Tidak Ada";
                        }?>)
                    </h4>
                <?php }else{ ?>
                    <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 Listing 2 (<?php 
                        if ($up_1_listing2) {
                            echo $up_1_listing2;
                        }else{
                            echo "Tidak Ada";
                        }?>)
                    </h4>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php if ($ms_2_afw == "Ang/Fran/Win") { ?>
                    <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 Ang : (<?php
                        if ($nama_upline1_ang) {
                            echo $nama_upline1_ang;
                        }else{
                            echo "Tidak Ada";
                        }?>)
                    </h4>
                <?php }else{ ?>
                    <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 Selling 2 (<?php 
                        if ($up_1_selling2) {
                            echo $up_1_selling2;
                        }else{
                            echo "Tidak Ada";
                        }?>)
                    </h4>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="card-body p-0 pt-2" style="width:100%">
        <div class="row">
            <div class="col-md-6">
                <?php if ($ml_2_afw == 'Ang/Fran/Win') { ?>

                    <?php include __DIR__ . '/../komisi/upline_afw_2.php'; ?>

                <?php }else{ ?>
                    <?php if ($up_listing2_1 == 1) { ?>
                        <table class="tg table table-striped table-dark">
                            <tbody>
                              <tr>
                                <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                                <td class="tg-0lax text-right"><?php echo $fkl2_r; ?> * <?= $jup_l2_1 ?>%</td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"></td>
                                <td class="tg-0lax text-right"><?php echo $fuk3_r; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak1_listing_2  ?>)</td>
                                <td class="tg-0lax text-right"><?php echo $fuk3_r ?> * <?= $npwp_upline1_listing2 ?>%</td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"></td>
                                <td class="tg-0lax text-right"><?php echo $pajak1_listing_2_r ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                                <td class="tg-0lax text-right"><?php echo $fuk3_r; ?> - <?= $pajak1_listing_2_r ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"></td>
                                <td class="tg-0lax text-warning text-right"><?php echo $netto1_listing_2_r; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-right" colspan="2"><?php echo $norek_up1_listing2; ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php if ($ms_2_afw == 'Ang/Fran/Win') { ?>

                <?php include __DIR__ . '/../komisi/upline_afw_2.php'; ?>

            <?php }else{ ?>
                <?php if ($up_selling2_1 == 1) { ?>
                    <table class="tg table table-striped table-dark">
                        <tbody>
                          <tr>
                            <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                            <td class="tg-0lax text-right"><?php echo $fks2_r; ?> * <?= $jup_s2_1 ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-right"><?php echo $fuk3_s_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak1_selling_2  ?>)</td>
                            <td class="tg-0lax text-right"><?php echo $fuk3_s_r ?> * <?= $npwp_upline1_selling2 ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-right"><?php echo $pajak1_selling_2_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                            <td class="tg-0lax text-right"><?php echo $fuk3_s_r; ?> - <?= $pajak1_selling_2_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-warning text-right"><?php echo $netto1_selling_2_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-right" colspan="2"><?php echo $norek_up1_selling2; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        <?php } ?>
    </div>
</div>
</div>
</div>

<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 Listing 2 (<?php 
                    if ($up_2_listing2) {
                        echo $up_2_listing2;
                    }else{
                        echo "Tidak Ada";
                    }
                ?>)</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 Selling 2 (<?php 
                    if ($up_2_selling2) {
                        echo $up_2_selling2;
                    }else{
                        echo "Tidak Ada";
                    }
                ?>)</h4>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <div class="card-body p-0 pt-2" style="width : 100%">
        <div class="row">
            <div class="col-md-6">
                <?php if ($up_listing2_2 == 1) { ?>
                    <table class="tg table table-striped table-dark">
                        <tbody>
                          <tr>
                            <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                            <td class="tg-0lax text-right"><?php echo $fkl2_r; ?> * <?= $jup_l2_2 ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-right"><?php echo $fuk4_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak2_listing_2  ?>)</td>
                            <td class="tg-0lax text-right"><?php echo $fuk4_r ?> * <?= $npwp_upline2_listing2 ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-right"><?php echo $pajak2_listing_2_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                            <td class="tg-0lax text-right"><?php echo $fuk4_r; ?> - <?= $pajak2_listing_2_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-warning text-right"><?php echo $netto2_listing_2_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-right" colspan="2"><?php echo $norek_up2_listing2; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php if ($up_selling2_2 == 1) { ?>
                <table class="tg table table-striped table-dark">
                    <tbody>
                      <tr>
                        <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                        <td class="tg-0lax text-right"><?php echo $fks2_r; ?> * <?= $jup_s2_2 ?>%</td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax text-right"><?php echo $fuk4_s_r; ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning">Potong Pajak (<?= $teks_pajak2_selling_2  ?>)</td>
                        <td class="tg-0lax text-right"><?php echo $fuk4_s_r ?> * <?= $npwp_upline2_selling2 ?>%</td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax text-right"><?php echo $pajak2_selling_2_r ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                        <td class="tg-0lax text-right"><?php echo $fuk4_s_r; ?> - <?= $pajak2_selling_2_r ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax text-warning text-right"><?php echo $netto2_selling_2_r; ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-right" colspan="2"><?php echo $norek_up2_selling2; ?></td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>
</div>
</div>
<?php endif ?>
</div>
<?php } ?>

<br>
<div class="card-body">
    <?php if ($komisi->status_komisi == "Approve") {?>
        <div class="card-body mt-0">
            <div class="card-body p-0">
                <div class="card text-center w-50 mx-auto my-auto">
                    <div class="card-header">
                        Surabaya, <?= date("d-m-Y", strtotime($komisi->tgl_disetujui)); ?>
                    </div>
                    <div >
                        <h5 class="card-title">Mengetahui</h5>
                        <img style="width : 80px; height: auto; margin-top: 0px;" class="profile-img" src="<?php echo base_url('assets/foto_ttd/').$komisi->gambar_ttd_pengguna; ?>"
                        alt="">
                        <br>
                        <p><?= $komisi->admin_disetujui ?> - <?= $disetujui_level ?></p>
                    </div>
                    <div class="card-footer">
                        A&A Indonesia
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<script type="text/javascript">
    window.print();
</script>





<?php } ?>
</body>
</html>

