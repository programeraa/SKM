<?php 
if ($komisi->mar_listing_komisi == 38) {
 $status_afw = 'Listing';
}elseif ($komisi->mar_listing2_komisi == 38) {
 $status_afw = 'Listing 2';
}elseif ($komisi->mar_selling_komisi == 38) {
 $status_afw = 'Selling';
}elseif ($komisi->mar_selling2_komisi == 38) {
 $status_afw = 'Selling 2';
} ?>

<table class="tg table table-striped table-dark">
    <tbody>
      <tr>
        <td class="tg-0lax"><?php echo 'Fee Marketing Sebelum Dibagi 2'?></td>
        <td class="tg-0lax text-right"><?php echo $afw_1_r; ?></td>
    </tr>
    <tr>
        <td class="tg-0lax"><?php echo 'Fee Marketing'?></td>
        <td class="tg-0lax text-right"><?php echo $afw_2_r; ?></td>
    </tr>
    <tr>
        <td class="tg-0lax text-warning"><?php echo 'Dikurangi Admin Sebesar 2.5%'?></td>
        <td class="tg-0lax text-right"><?php echo $admin_listing_ang_r; ?></td>
    </tr>
    <tr>
        <td class="tg-0lax"><?php echo 'Fee Marketing Sementara'?></td>
        <td class="tg-0lax text-right"><?php echo $fmk3_listing_ang_r; ?></td>
    </tr>
    <tr>
        <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$pph_listing_ang.')'?></td>
        <td class="tg-0lax text-right"><?php echo $biaya_pph_l_ang_r ?></td>
    </tr>
    <?php if ($jumlah_kurang_ang != 0) {?>
        <tr>
            <td class="tg-0lax text-warning">Biaya Pengurangan (<?= $keterangan_kurang_ang ?>)</td>
            <td class="tg-0lax text-right"><?php echo $jumlah_kurang_ang_r; ?></td>
        </tr>
    <?php } ?>
    <tr>
        <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
        <td class="tg-0lax text-warning text-right"><?php echo $fmb_l_ang_r; ?></td>
    </tr>
    <tr>
        <td class="tg-0lax text-right" colspan="2"><?php echo $norek_ang; ?></td>
    </tr>
</tbody>
</table>

<div>
    <?php if ($level == 'Administrator' && $komisi->status_komisi != 'Approve'):?>
        <?php if ($jumlah_kurang_ang == 0) {?>

            <?php if (!empty($ml_afw) || !empty($ml_2_afw)) { ?>
                <div class="d-flex justify-content-start">
                <?php }else{ ?>
                    <div class="d-flex justify-content-end">
                    <?php } ?>
                    <button type="button" class="btn btn-danger mb-3" id="toggleForm5">Biaya Pengurang (Bila Ada)</button>
                </div>
            <?php }else{ ?>
                <?php if (!empty($ml_afw) || !empty($ml_2_afw)) { ?>
                    <div class="d-flex justify-content-start">
                    <?php }else{ ?>
                        <div class="d-flex justify-content-end">
                        <?php } ?>
                        <a href="<?= base_url('komisi/hapus_pengurangan_fee?id_komisi=' . $komisi->id_komisi . '&id_marketing=' . $id_ang); ?>"  class="btn btn-primary mb-3"><i class="fas fa-trash mr-2" title="Hapus"></i>Hapus Biaya Pengurangan</a>
                    </div>  
                <?php } ?>
            <?php endif ?>
            <div id="pengurangan_afw1" style="display:none;">
                <form method="post" action="<?= base_url('komisi/tambah_pengurangan_fee') ?>">
                  <div class="form-group">
                    <label for="keterangan_pengurangan">Keterangan Pengurangan</label>
                    <input type="text" class="form-control" id="keterangan_pengurangan" name="keterangan_pengurangan">
                </div>
                <div class="form-group">
                    <label for="jumlah_pengurangan5">Jumlah</label>
                    <input type="text" class="form-control" name="tampil_pengurangan" id="tampil_pengurangan" onkeyup="formatRupiah(this, 'jumlah_pengurangan5')">

                    <input type="hidden" class="form-control" id="jumlah_pengurangan5" name="jumlah_pengurangan">
                </div>
                <div class="form-group d-xl-none">
                    <label for="id_komisi">ID Komisi</label>
                    <input type="text" class="form-control" id="id_komisi" name="id_komisi" value="<?= $komisi->id_komisi ?>">
                </div>
                <div class="form-group d-xl-none">
                    <label for="id_marketing">ID Marketing</label>
                    <input type="text" class="form-control" id="id_marketing" name="id_marketing" value="<?= $id_ang ?>">
                </div>
                <div class="form-group d-xl-none">
                    <label for="status_marketing">Status Marketing</label>
                    <input type="text" class="form-control" id="status_marketing" name="status_marketing" value="<?= $status_afw ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="card-header-sm text-dark">
        <?php if (!empty($ml_afw) || !empty($ml_2_afw)) { ?>
            <div class="d-flex justify-content-start mb-3">
            <?php }else{ ?>
                <div class="d-flex justify-content-end mb-3">
                <?php } ?>
                <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi Fran</h4>
            </div>
        </div>

        <table class="tg table table-striped table-dark">
            <tbody>
              <tr>
                <td class="tg-0lax"><?php echo 'Fee Marketing Sebelum Dibagi 2'?></td>
                <td class="tg-0lax text-right"><?php echo $afw_1_r; ?></td>
            </tr>
            <tr>
                <td class="tg-0lax"><?php echo 'Fee Marketing'?></td>
                <td class="tg-0lax text-right"><?php echo $afw_2_r; ?></td>
            </tr>
            <tr>
                <td class="tg-0lax text-warning"><?php echo 'Dikurangi Admin Sebesar 2.5%'?></td>
                <td class="tg-0lax text-right"><?php echo $admin_listing_fran_r; ?></td>
            </tr>
            <tr>
                <td class="tg-0lax"><?php echo 'Fee Marketing Sementara'?></td>
                <td class="tg-0lax text-right"><?php echo $fmk3_listing_fran_r; ?></td>
            </tr>
            <tr>
                <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$pph_listing_fran.')'?></td>
                <td class="tg-0lax text-right"><?php echo $biaya_pph_l_fran_r ?></td>
            </tr>
            <?php if ($jumlah_kurang_fran != 0) {?>
                <tr>
                    <td class="tg-0lax text-warning">Biaya Pengurangan (<?= $keterangan_kurang_fran ?>)</td>
                    <td class="tg-0lax text-right"><?php echo $jumlah_kurang_fran_r; ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
                <td class="tg-0lax text-warning text-right"><?php echo $fmb_l_fran_r; ?></td>
            </tr>
            <tr>
                <td class="tg-0lax text-right" colspan="2"><?php echo $norek_fran; ?></td>
            </tr>
        </tbody>
    </table>

    <div>
        <?php if ($level == 'Administrator' && $komisi->status_komisi != 'Approve'):?>
            <?php if ($jumlah_kurang_fran == 0) {?>
                <?php if (!empty($ml_afw) || !empty($ml_2_afw)) { ?>
                    <div class="d-flex justify-content-start">
                    <?php }else{ ?>
                        <div class="d-flex justify-content-end">
                        <?php } ?>
                        <button type="button" class="btn btn-danger mb-3" id="toggleForm6">Biaya Pengurang (Bila Ada)</button>
                    </div>
                <?php }else{ ?>
                    <?php if (!empty($ml_afw) || !empty($ml_2_afw)) { ?>
                        <div class="d-flex justify-content-start">
                        <?php }else{ ?>
                            <div class="d-flex justify-content-end">
                            <?php } ?>
                            <a href="<?= base_url('komisi/hapus_pengurangan_fee?id_komisi=' . $komisi->id_komisi . '&id_marketing=' . $id_fran); ?>"  class="btn btn-primary mb-3"><i class="fas fa-trash mr-2" title="Hapus"></i>Hapus Biaya Pengurangan</a>
                        </div>
                    <?php } ?>
                <?php endif ?>
                <div id="pengurangan_afw2" style="display:none;">
                    <form method="post" action="<?= base_url('komisi/tambah_pengurangan_fee') ?>">
                      <div class="form-group">
                        <label for="keterangan_pengurangan">Keterangan Pengurangan</label>
                        <input type="text" class="form-control" id="keterangan_pengurangan" name="keterangan_pengurangan">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pengurangan6">Jumlah</label>
                        <input type="text" class="form-control" name="tampil_pengurangan" id="tampil_pengurangan" onkeyup="formatRupiah(this, 'jumlah_pengurangan6')">

                        <input type="hidden" class="form-control" id="jumlah_pengurangan6" name="jumlah_pengurangan">
                    </div>
                    <div class="form-group d-xl-none">
                        <label for="id_komisi">ID Komisi</label>
                        <input type="text" class="form-control" id="id_komisi" name="id_komisi" value="<?= $komisi->id_komisi ?>">
                    </div>
                    <div class="form-group d-xl-none">
                        <label for="id_marketing">ID Marketing</label>
                        <input type="text" class="form-control" id="id_marketing" name="id_marketing" value="<?= $id_fran ?>">
                    </div>
                    <div class="form-group d-xl-none">
                        <label for="status_marketing">Status Marketing</label>
                        <input type="text" class="form-control" id="status_marketing" name="status_marketing" value="<?= $status_afw ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="card-header-sm text-dark">
            <?php if (!empty($ml_afw) || !empty($ml_2_afw)) { ?>
                <div class="d-flex justify-content-start mb-3">
                <?php }else{ ?>
                    <div class="d-flex justify-content-end mb-3">
                    <?php } ?>
                    <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi Winata</h4>
                </div>
            </div>

            <table class="tg table table-striped table-dark">
                <tbody>
                  <tr>
                    <td class="tg-0lax"><?php echo 'Fee Marketing'?></td>
                    <td class="tg-0lax text-right"><?php echo $afw_1_r; ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax text-warning"><?php echo 'Dikurangi Admin Sebesar 2.5%'?></td>
                    <td class="tg-0lax text-right"><?php echo $admin_listing_win_r; ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax"><?php echo 'Fee Marketing Sementara'?></td>
                    <td class="tg-0lax text-right"><?php echo $fmk3_listing_win_r; ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$pph_listing_win.')'?></td>
                    <td class="tg-0lax text-right"><?php echo $biaya_pph_l_win_r ?></td>
                </tr>
                <?php if ($jumlah_kurang_win != 0) {?>
                    <tr>
                        <td class="tg-0lax text-warning">Biaya Pengurangan (<?= $keterangan_kurang_win ?>)</td>
                        <td class="tg-0lax text-right"><?php echo $jumlah_kurang_win_r; ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
                    <td class="tg-0lax text-warning text-right"><?php echo $fmb_l_win_r; ?></td>
                </tr>
                <tr>
                    <td class="tg-0lax text-right" colspan="2"><?php echo $norek_win; ?></td>
                </tr>
            </tbody>
        </table>

        <div>
            <?php if ($level == 'Administrator' && $komisi->status_komisi != 'Approve'):?>
                <?php if ($jumlah_kurang_win == 0) {?>
                    <?php if (!empty($ml_afw) || !empty($ml_2_afw)) { ?>
                        <div class="d-flex justify-content-start">
                        <?php }else{ ?>
                            <div class="d-flex justify-content-end">
                            <?php } ?>
                            <button type="button" class="btn btn-danger mb-3" id="toggleForm7">Biaya Pengurang (Bila Ada)</button>
                        </div>
                    <?php }else{ ?>
                        <?php if (!empty($ml_afw) || !empty($ml_2_afw)) { ?>
                            <div class="d-flex justify-content-start">
                            <?php }else{ ?>
                                <div class="d-flex justify-content-end">
                                <?php } ?>
                                <a href="<?= base_url('komisi/hapus_pengurangan_fee?id_komisi=' . $komisi->id_komisi . '&id_marketing=' . $id_win); ?>"  class="btn btn-primary mb-3"><i class="fas fa-trash mr-2" title="Hapus"></i>Hapus Biaya Pengurangan</a>
                            </div>
                        <?php } ?>
                    <?php endif ?>
                    <div id="pengurangan_afw3" style="display:none;">
                        <form method="post" action="<?= base_url('komisi/tambah_pengurangan_fee') ?>">
                          <div class="form-group">
                            <label for="keterangan_pengurangan">Keterangan Pengurangan</label>
                            <input type="text" class="form-control" id="keterangan_pengurangan" name="keterangan_pengurangan">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_pengurangan7">Jumlah</label>
                            <input type="text" class="form-control" name="tampil_pengurangan" id="tampil_pengurangan" onkeyup="formatRupiah(this, 'jumlah_pengurangan7')">

                            <input type="hidden" class="form-control" id="jumlah_pengurangan7" name="jumlah_pengurangan">
                        </div>
                        <div class="form-group d-xl-none">
                            <label for="id_komisi">ID Komisi</label>
                            <input type="text" class="form-control" id="id_komisi" name="id_komisi" value="<?= $komisi->id_komisi ?>">
                        </div>
                        <div class="form-group d-xl-none">
                            <label for="id_marketing">ID Marketing</label>
                            <input type="text" class="form-control" id="id_marketing" name="id_marketing" value="<?= $id_win ?>">
                        </div>
                        <div class="form-group d-xl-none">
                            <label for="status_marketing">Status Marketing</label>
                            <input type="text" class="form-control" id="status_marketing" name="status_marketing" value="<?= $status_afw ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>