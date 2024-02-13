<div class="card-body">
    <div class="card-header-sm text-dark">
        <div class="d-flex justify-content-between mb-2">
            <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 Ang : (<?php 
                if ($nama_upline1_ang) {
                    echo $nama_upline1_ang;
                }else{
                    echo "Tidak Ada";
                }
            ?>)</h4>
        </div>
    </div>

    <div class="card-body p-0 pt-2">
        <form method="post" action="">
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
                        <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak_upline_ang  ?>)</td>
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
    </form>
</div>

<div class="card-header-sm text-dark">
    <div class="d-flex justify-content-between mb-2">
        <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 Ang : (<?php 
            if ($nama_upline2_ang) {
                echo $nama_upline2_ang;
            }else{
                echo "Tidak Ada";
            }
        ?>)</h4>
    </div>
</div>

<div class="card-body p-0 pt-2">
    <form method="post" action="">
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
                    <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak_upline_ang2  ?>)</td>
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
</form>
</div>
</div>

<!-- Upline Milik Fran -->
<div class="card-body">
    <div class="card-header-sm text-dark">
        <div class="d-flex justify-content-between mb-2">
            <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 Fran : (<?php 
                if ($nama_upline1_fran) {
                    echo $nama_upline1_fran;
                }else{
                    echo "Tidak Ada";
                }
            ?>)</h4>
        </div>
    </div>

    <div class="card-body p-0 pt-2">
        <form method="post" action="">
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
                        <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak_upline_fran  ?>)</td>
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
    </form>
</div>

<div class="card-header-sm text-dark">
    <div class="d-flex justify-content-between mb-2">
        <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 Fran : (<?php 
            if ($nama_upline2_fran) {
                echo $nama_upline2_fran;
            }else{
                echo "Tidak Ada";
            }
        ?>)</h4>
    </div>
</div>

<div class="card-body p-0 pt-2">
    <form method="post" action="">
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
                    <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak_upline_fran2  ?>)</td>
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

</form>
</div>
</div>

<!-- Upline Milik Winata -->
<div class="card-body">
    <div class="card-header-sm text-dark">
        <div class="d-flex justify-content-between mb-2">
            <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 1 Winata : (<?php 
                if ($nama_upline1_win) {
                    echo $nama_upline1_win;
                }else{
                    echo "Tidak Ada";
                }
            ?>)</h4>
        </div>
    </div>

    <div class="card-body p-0 pt-2">
        <form method="post" action="">
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
                        <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak_upline_win  ?>)</td>
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

    </form>
</div>

<div class="card-header-sm text-dark">
    <div class="d-flex justify-content-between mb-2">
        <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 Winata : (<?php 
            if ($nama_upline2_win) {
                echo $nama_upline2_win;
            }else{
                echo "Tidak Ada";
            }
        ?>)</h4>
    </div>
</div>

<div class="card-body p-0 pt-2">
    <form method="post" action="">
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
                    <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak_upline_win2  ?>)</td>
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
</form>
</div>
</div>