<div class="card">
    <?php if ($komisi->status_komisi == "Disetujui") { ?>
        <div class="card-header bg-success text-white">
        <?php }else{ ?>
            <div class="card-header bg-danger text-white">
            <?php } ?>
            <h4 class="card-title" style="text-align: center;">Detail Komisi Closing</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alamat" class="col-form-label">Alamat Closing</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $komisi->alamat_komisi; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jt" class="col-form-label">Jenis Transaksi</label>
                        <input type="text" class="form-control" id="jt" name="jt" value="<?php echo $komisi->jt_komisi; ?>" readonly>
                    </div>
                </div>

                <div class="col-md-6">
                   <div class="form-group">
                    <label for="m_listing" class="col-form-label">Marketing Listing</label>
                    <input type="text" class="form-control" id="m_listing" name="m_listing" value="<?php echo $komisi->nama_mar; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="m_selling" class="col-form-label">Marketing Selling</label>
                    <input type="text" class="form-control" id="m_selling" name="m_selling" value="<?php echo $komisi->nama_mar2; ?>" readonly>
                </div>
            </div>
        </div>
    </div>

    <div class="card-header-sm bg-dark text-white">
        <h4 class="card-title p-2 m-0" style="text-align: center;">Rincian Fee Marketing</h4>
    </div>

    <div class="card-body">
        <!-- Rumus 1-->
        <?php include "rumus_1.php" ?>

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
                        <tr>
                            <th class="tg-0lax bg-light" colspan="1"></th>
                            <th scope="col" class="bg-light"></th>
                        </tr>
                    <?php }else{?>
                        <tr>
                            <th class="tg-0lax" colspan="1">Komisi Bruto</th>
                            <th scope="col" class="text-right"><?php echo $bruto_r;?></th>
                        </tr>
                    <?php } ?>
                </thead>
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
            </table>
        </div>
    </div>

    <div class="card-header-sm text-dark">
        <?php if ($ml_afw || $ml_2_afw || $ms_afw || $ms_2_afw   == 'Ang/Fran/Win') {?>
            <h4 class="card-title pt-1 pb-2" style="text-align: left;">Rincian Komisi Ang</h4>
        <?php }else{ ?>
            <h4 class="card-title p-2 m-0" style="text-align: center;">Rincian Komisi <?php echo $nama_marketing_listing_1; ?></h4>
        <?php } ?>
    </div>

    <?php if ($ml_afw || $ml_2_afw || $ms_afw || $ms_2_afw   == 'Ang/Fran/Win') {?>

        <?php include "rincian_komisi_afw.php"; ?>

    <?php }else{ ?>

        <div class="card-body p-0 pt-2">
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
        <div>
            <?php if ($level == 'Administrator' && $komisi->status_komisi != 'Disetujui'):?>
                <?php if ($jumlah_kurang_listing == 0) {?>
                    <button type="button" class="btn btn-danger mb-3" id="toggleForm">Biaya Pengurang (Bila Ada)</button>
                <?php }else{ ?>

                    <a href="<?= base_url('komisi/hapus_pengurangan_fee?id_komisi=' . $komisi->id_komisi . '&id_marketing=' . $komisi->mar_listing_komisi); ?>"  class="btn btn-primary mb-3"><i class="fas fa-trash mr-2" title="Hapus"></i>Hapus Biaya Pengurangan</a>

                <?php } ?>
            <?php endif ?>
            <div id="pengurangan_listing1" style="display:none;">
                <form method="post" action="<?= base_url('komisi/tambah_pengurangan_fee') ?>">
                  <div class="form-group">
                    <label for="keterangan_pengurangan">Keterangan Pengurangan</label>
                    <input type="text" class="form-control" id="keterangan_pengurangan" name="keterangan_pengurangan">
                </div>
                <div class="form-group">
                    <label for="jumlah_pengurangan">Jumlah</label>
                    <input type="text" class="form-control" name="tampil_pengurangan" id="tampil_pengurangan" onkeyup="formatRupiah(this, 'jumlah_pengurangan')">

                    <input type="hidden" class="form-control" id="jumlah_pengurangan" name="jumlah_pengurangan">
                </div>
                <div class="form-group d-xl-none">
                    <label for="id_komisi">ID Komisi</label>
                    <input type="text" class="form-control" id="id_komisi" name="id_komisi" value="<?= $komisi->id_komisi ?>">
                </div>
                <div class="form-group d-xl-none">
                    <label for="id_marketing">ID Marketing</label>
                    <input type="text" class="form-control" id="id_marketing" name="id_marketing" value="<?= $komisi->mar_listing_komisi ?>">
                </div>
                <div class="form-group d-xl-none">
                    <label for="status_marketing">Status Marketing</label>
                    <input type="text" class="form-control" id="status_marketing" name="status_marketing" value="Listing & Selling">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php } ?>

</div>

<div class="card-header-sm bg-dark text-white">
    <h4 class="card-title p-2 m-0" style="text-align: center;">Rincian Fee Upline</h4>
</div>

<!-- rumus 2 -->
<?php include "rumus_2.php" ?>

<?php if ($ml_afw || $ms_afw || $ml_2_afw || $ms_2_afw == "Ang/Fran/Win") { ?>

    <?php include "upline_afw_1.php"; ?>

<?php }else{ ?>
    <div class="card-body">
        <!--upline 1 & 2 listing -->
        <div class="card-header-sm text-dark">
            <div class="d-flex justify-content-between mb-2">
                <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 (<?php 
                    if (!empty($up_1_listing)) {
                        echo $up_1_listing;
                    }else{
                        echo "Tidak Ada";
                    }
                ?>)</h4>
                <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 (<?php 
                    if ($up_2_listing) {
                        echo $up_2_listing;
                    }else{
                        echo "Tidak Ada"; 
                    }
                ?>)</h4>
            </div>
        </div>

        <div class="card-body p-0 pt-2">
            <form method="post" action="">
                <div class="row">
                    <div class="col-md-6">
                        <?php if ($up_listing_1 == 1) { ?>
                            <table class="tg table table-striped table-dark">
                                <tbody>
                                  <tr>
                                    <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                                    <td class="tg-0lax text-right"><?php echo $fkl_r; ?> * 5%</td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax text-warning"></td>
                                    <td class="tg-0lax text-right"><?php echo $fuk_r; ?></td>
                                </tr>
                                <tr>
                                    <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak_listing_1  ?>)</td>
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

                <div class="col-md-6">
                    <?php if ($up_listing_2 == 1) { ?>
                        <table class="tg table table-striped table-dark">
                            <tbody>
                              <tr>
                                <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                                <td class="tg-0lax text-right"><?php echo $fkl_r; ?> * 5%</td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"></td>
                                <td class="tg-0lax text-right"><?php echo $fuk2_r; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak_listing_2  ?>)</td>
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
    </form>
</div>

</div>
<?php } ?>
</div>
