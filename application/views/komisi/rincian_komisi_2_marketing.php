<div class="card">
    <div class="card-header bg-danger text-white">
        <h4 class="card-title" style="text-align: center;">Detail Komisi Closing</h4>
    </div>

    <div class="card-body">

        <form method="post" action="<?= base_url('Marketing/update'); ?>">
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
    </form>
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
                  <tr>
                    <th class="tg-0lax" colspan="4">Komisi Bruto</th>
                    <th scope="col" class="text-right"><?php echo $bruto_r;?></th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td class="tg-0lax"><?php echo 'Marketing Listing'?></td>
                <td class="tg-0lax"><?php echo $fmk_r; ?></td>
                <td class="tg-0lax" rowspan="3"></td>
                <td class="tg-0lax "><?php echo 'Marketing Selling'?></td>
                <td class="tg-0lax text-right"><?php echo $fmk_r; ?></td>
            </tr>
            <tr>
                <td class="tg-0lax"><?php echo 'Fee Marketing'. ' ('.$komisi->nama_mar.' - '.$l_member.'%'.')'?></td>
                <td class="tg-0lax"><?php echo $fmk2_listing_r; ?></td>
                <td class="tg-0lax"><?php echo 'Fee Marketing'. ' ('.$komisi->nama_mar2.' - '.$s_member.'%'.')'?></td>
                <td class="tg-0lax text-right"><?php echo $fmk2_selling_r; ?></td>
            </tr>
            <tr>
                <td class="tg-0lax"><?php echo 'Fee Kantor'?></td>
                <td class="tg-0lax"><?php echo $fkl_r; ?></td>
                <td class="tg-0lax"><?php echo 'Fee Kantor'?></td>
                <td class="tg-0lax text-right"><?php echo $fks_r; ?></td>
            </tr>
        </tbody>
    </table>
</div>
</div>

<div class="card-header-sm text-dark">
    <div class="d-flex justify-content-between mb-2">
        <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi <?php echo $marketing_listing; ?></h4>
        <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi <?php echo $marketing_selling; ?></h4>
    </div>
</div>

<div class="card-body p-0 pt-2">
    <form method="post" action="<?= base_url('Marketing/update'); ?>">
        <div class="row">
            <div class="col-md-6">
                <table class="tg table table-striped table-dark">
                    <tbody>
                      <tr>
                        <td class="tg-0lax"><?php echo 'Fee Marketing'?></td>
                        <td class="tg-0lax"><?php echo $fmk2_listing_r; ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"><?php echo 'Dikurangi Admin Sebesar 2.5%'?></td>
                        <td class="tg-0lax"><?php echo $admin_listing_r; ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax"><?php echo 'Fee Marketing Sementara'?></td>
                        <td class="tg-0lax"><?php echo $fmk3_listing_r; ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$pph_listing.')'?></td>
                        <td class="tg-0lax"><?php echo $biaya_pph_l_r ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
                        <td class="tg-0lax text-warning"><?php echo $fmb_l_r; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
           <table class="tg table table-striped table-dark">
            <tbody>
              <tr>
                <td class="tg-0lax"><?php echo 'Fee Marketing'?></td>
                <td class="tg-0lax"><?php echo $fmk2_selling_r; ?></td>
            </tr>
            <tr>
                <td class="tg-0lax text-warning"><?php echo 'Dikurangi Admin Sebesar 2.5%'?></td>
                <td class="tg-0lax"><?php echo $admin_selling_r; ?></td>
            </tr>
            <tr>
                <td class="tg-0lax"><?php echo 'Fee Marketing Sementara'?></td>
                <td class="tg-0lax"><?php echo $fmk3_selling_r; ?></td>
            </tr>
            <tr>
                <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$pph_selling.')'?></td>
                <td class="tg-0lax"><?php echo $biaya_pph_s_r ?></td>
            </tr>
            <tr>
                <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
                <td class="tg-0lax text-warning"><?php echo $fmb_s_r; ?></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</form>
</div>

<div class="card-header-sm text-dark ">
    <div class="d-flex justify-content-between mb-2">
        <h6 class="card-title p-0 m-0 font-weight-bold" style="text-align: center;"><?php echo $norek_listing; ?></h6>
        <h6 class="card-title p-0 m-0 font-weight-bold" style="text-align: center;"><?php echo $norek_selling; ?></h6>
    </div>
</div>
</div>

<div class="card-header-sm bg-dark text-white">
    <h4 class="card-title p-2 m-0" style="text-align: center;">Rincian Fee Upline</h4>
</div>

<div class="card-body">
    <!-- rumus 2 -->
    <?php include "rumus_2.php" ?>

    <!--upline listing dan selling 1-->
    <div class="card-header-sm text-dark">
        <div class="d-flex justify-content-between mb-2">
            <h4 class="card-title p-0 m-0" style="text-align: center;">Upline Listing 1 (<?php echo $up_1_listing; ?>)</h4>
            <h4 class="card-title p-0 m-0" style="text-align: center;">Upline Selling 1 (<?php echo $up_1_selling; ?>)</h4>
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
                                <td class="tg-0lax"><?php echo $fkl_r; ?> * 5%</td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"></td>
                                <td class="tg-0lax"><?php echo $fuk_r; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak_listing_1  ?>)</td>
                                <td class="tg-0lax"><?php echo $fuk_r ?> * <?= $npwp_upline1_listing ?>%</td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"></td>
                                <td class="tg-0lax"><?php echo $pajak_listing_1_r ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                                <td class="tg-0lax"><?php echo $fuk_r; ?> - <?= $pajak_listing_1_r ?></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax text-warning"></td>
                                <td class="tg-0lax text-warning"><?php echo $netto_listing_1_r; ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
            </div>

            <div class="col-md-6">
                <?php if ($up_selling_1 == 1) { ?>
                    <table class="tg table table-striped table-dark">
                        <tbody>
                          <tr>
                            <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                            <td class="tg-0lax"><?php echo $fks_r; ?> * 5%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax"><?php echo $fuk_s_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak_selling_1  ?>)</td>
                            <td class="tg-0lax"><?php echo $fuk_s_r ?> * <?= $npwp_upline1_selling ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax"><?php echo $pajak_selling_1_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                            <td class="tg-0lax"><?php echo $fuk_s_r; ?> - <?= $pajak_selling_1_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-warning"><?php echo $netto_selling_1_r; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</form>
</div>

<!-- no rek upline listing dan selling 1-->
<div class="card-header-sm text-dark mb-5">
    <div class="d-flex justify-content-between mb-2">
        <?php if ($up_listing_1 == 1) { ?>
            <h6 class="card-title p-0 m-0 font-weight-bold" style="text-align: center;"><?php echo $norek_up_listing1; ?></h6>
        <?php } ?>

        <?php if ($up_selling_1 == 1) { ?>
            <h6 class="card-title p-0 m-0 font-weight-bold" style="text-align: center;"><?php echo $norek_up_selling1; ?></h6>
        <?php } ?>
    </div>
</div>

<!--upline listing dan selling 2-->
<div class="card-header-sm text-dark">
    <div class="d-flex justify-content-between mb-2">
        <h4 class="card-title p-0 m-0" style="text-align: center;">Upline Listing 2 (<?php echo $up_2_listing; ?>)</h4>
        <h4 class="card-title p-0 m-0" style="text-align: center;">Upline Selling 2 (<?php echo $up_2_selling; ?>)</h4>
    </div>
</div>

<div class="card-body p-0 pt-2">
    <form method="post" action="<?= base_url('Marketing/update'); ?>">
        <div class="row">
            <div class="col-md-6">
                <?php if ($up_listing_2 == 1) { ?>
                    <table class="tg table table-striped table-dark">
                        <tbody>
                          <tr>
                            <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                            <td class="tg-0lax"><?php echo $fkl_r; ?> * 5%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax"><?php echo $fuk2_r; ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak_listing_2  ?>)</td>
                            <td class="tg-0lax"><?php echo $fuk2_r ?> * <?= $npwp_upline2_listing ?>%</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax"><?php echo $pajak_listing_2_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                            <td class="tg-0lax"><?php echo $fuk2_r; ?> - <?= $pajak_listing_2_r ?></td>
                        </tr>
                        <tr>
                            <td class="tg-0lax text-warning"></td>
                            <td class="tg-0lax text-warning"><?php echo $netto_listing_2_r; ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?>
        </div>

        <div class="col-md-6">
            <?php if ($up_selling_2 == 1) { ?>
                <table class="tg table table-striped table-dark">
                    <tbody>
                      <tr>
                        <td class="tg-0lax"><?php echo 'Fee Upline'?></td>
                        <td class="tg-0lax"><?php echo $fks_r; ?> * 5%</td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax"><?php echo $fuk2_s_r; ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak_selling_2  ?>)</td>
                        <td class="tg-0lax"><?php echo $fuk2_s_r ?> * <?= $npwp_upline2_selling ?>%</td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax"><?php echo $pajak_selling_2_r ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax"><?php echo 'Fee Diterima (Netto)'?></td>
                        <td class="tg-0lax"><?php echo $fuk2_s_r; ?> - <?= $pajak_selling_2_r ?></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax text-warning"></td>
                        <td class="tg-0lax text-warning"><?php echo $netto_selling_2_r; ?></td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>
</form>
</div>

<!-- no rek upline listing dan selling 2-->
<div class="card-header-sm text-dark">
    <div class="d-flex justify-content-between mb-2">
        <?php if ($up_listing_2 == 1) { ?>
            <h6 class="card-title p-0 m-0 font-weight-bold" style="text-align: center;"><?php echo $norek_up_listing2; ?></h6> 
        <?php } ?>

        <?php if ($up_selling_2 == 1) { ?>
            <h6 class="card-title p-0 m-0 font-weight-bold" style="text-align: center;"><?php echo $norek_up_selling2; ?></h6>
        <?php } ?>
    </div>
</div>

</div>
</div>