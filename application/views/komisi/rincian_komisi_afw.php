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
    <tr>
        <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
        <td class="tg-0lax text-warning text-right"><?php echo $fmb_l_ang_r; ?></td>
    </tr>
    <tr>
        <td class="tg-0lax text-right" colspan="2"><?php echo $norek_ang; ?></td>
    </tr>
</tbody>
</table>

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
        <tr>
            <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
            <td class="tg-0lax text-warning text-right"><?php echo $fmb_l_fran_r; ?></td>
        </tr>
        <tr>
            <td class="tg-0lax text-right" colspan="2"><?php echo $norek_fran; ?></td>
        </tr>
    </tbody>
</table>

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
        <tr>
            <td class="tg-0lax"><?php echo 'Fee Diterima'?></td>
            <td class="tg-0lax text-warning text-right"><?php echo $fmb_l_win_r; ?></td>
        </tr>
        <tr>
            <td class="tg-0lax text-right" colspan="2"><?php echo $norek_win; ?></td>
        </tr>
    </tbody>
</table>
