<?php include "session_identitas.php"; ?>
<div class="container pt-5 pb-5">
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

        ?>

        <div class="d-flex justify-content-between mb-2">
            <div class="text-right">
                <?php if(isset($_GET['from'])){ ?>
                    <a href="<?= base_url('Laporan/omzet_vision');?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
                <?php }else{ ?>
                    <a href="<?= base_url('Komisi/komisi'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
                <?php } ?>
            </div>

            <div class="text-right">
                <p class="text-danger font-weight-bold">Closing : <?= date("d-m-Y", strtotime($komisi->tgl_closing_komisi))?> - <span class="text-dark">Tanggal Input : <?= date("d-m-Y", strtotime($komisi->waktu_komisi))?>/<?= $komisi->nama_pengguna ?> (<?= $komisi->level_pengguna ?>)</span>
                </div>
            </div>

            <?php if ($komisi->mar_listing_komisi == $komisi->mar_selling_komisi){
                include "komisi/rincian_komisi_1_marketing.php";
            }else{
                include "komisi/rincian_komisi_2_marketing.php";
            } 
            ?>

            <?php if ($komisi->status_komisi == "Disetujui" || $level == 'CMO') {?>
                <div class="card-header-sm bg-dark text-white">
                    <h4 class="card-title p-2 m-0" style="text-align: center;">Status Komisi</h4>
                </div>
            <?php } ?>



            <?php if ($level == 'CMO') {?>
                <div class="card-body mt-0 pb-0">
                    <div class="card-body p-0 pt-2 pb-0">
                        <div class="card text-center w-50 mx-auto my-auto">
                            <form method="post" action="<?= base_url('komisi/update_status_komisi'); ?>">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="flex-grow-1">
                                        <select class="form-control" id="status_komisi" name="status_komisi">
                                            <option value="">Pilih Status</option>
                                            <?php
                                            if ($komisi->status_komisi == "Approve") echo "<option value='Approve' selected>Approve</option>";
                                            else echo "<option value='Approve'>Approve</option>";

                                            if ($komisi->status_komisi == "Proses Approve") echo "<option value='Proses Approve' selected>Proses Approve</option>";
                                            else echo "<option value='Proses Approve'>Proses Approve</option>";
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group d-xl-none">
                                      <label class="col-sm-15 col-form-label">No Sistem</label>
                                      <input type="text" class="form-control" id="id_komisi" name="id_komisi" value="<?php echo $komisi->id_komisi; ?>">
                                  </div>
                                  <div class="form-group d-xl-none">
                                    <label for="admin" class="col-form-label">Admin</label>
                                    <input type="text" class="form-control" id="admin" name="admin" value="<?php echo $id; ?>">
                                </div>

                                <div class="form-group d-xl-none">
                                    <?php if (empty($j_cobroke)) {?>
                                        <input type="text" name="id_marketing1" value="<?= $komisi->mar_listing_komisi ?>">
                                    <?php } ?>
                                    <?php if (empty($s_cobroke)) {?>
                                        <input type="text" name="id_marketing2" value="<?= $komisi->mar_selling_komisi ?>">
                                    <?php } ?>
                                    <input type="text" name="id_marketing3" value="<?= $komisi->mar_listing2_komisi ?>">
                                    <input type="text" name="id_marketing4" value="<?= $komisi->mar_selling2_komisi ?>">


                                    <?php 
                                    
                                    if ($komisi->mar_listing_komisi == 38 || $komisi->mar_listing2_komisi == 38 || $komisi->mar_selling_komisi == 38 || $komisi->mar_selling2_komisi == 38) {

                                        $id_ang = null;
                                        $id_fran = null;
                                        $id_win = null;

                                        foreach ($marketing as $afw) {
                                            if ($afw->nama_mar == 'Ang') {
                                                $id_ang = $afw->id_mar;
                                            }

                                            if ($afw->nama_mar == 'Fran') {
                                                $id_fran = $afw->id_mar;
                                            }

                                            if ($afw->nama_mar == 'Winata') {
                                                $id_win = $afw->id_mar;
                                            }
                                        } 

                                        if ($komisi->nama_mar == 'Ang/Fran/Win') {
                                            $fee_kantor_afw = $fmk2_listing;
                                        }elseif ($komisi->nama_mar2 == 'Ang/Fran/Win') {
                                            $fee_kantor_afw = $fmk2_selling;
                                        }elseif ($komisi->$komisi->listing_2 == 'Ang/Fran/Win') {
                                            $fee_kantor_afw = $fmk2_listing2;
                                        }elseif ($komisi->$komisi->selling_2 == 'Ang/Fran/Win') {
                                            $fee_kantor_afw = $fmk2_selling2;
                                        }else{
                                            $fee_kantor_afw = 0;
                                        }
                                    } 
                                    ?>

                                    <?php if ($komisi->mar_listing_komisi == 38 || $komisi->mar_listing2_komisi == 38 || $komisi->mar_selling_komisi == 38 || $komisi->mar_selling2_komisi == 38) { ?>
                                        <input type="text" name="id_ang" value="<?= $id_ang ?>">
                                        <input type="text" name="fee_kantor_afw" value="<?= $fee_kantor_afw ?>">
                                        <input type="text" name="fee_ang" value="<?= $afw_2 ?>">
                                        <input type="text" name="admin_ang" value="<?= $admin_listing_ang_n ?>">
                                        <input type="text" name="pph_ang" value="<?= $biaya_pph_l_ang ?>">
                                        <input type="text" name="ppribadi_ang" value="<?= $jumlah_kurang_ang ?>">
                                        <input type="text" name="netto_ang" value="<?= $fmb_l_ang ?>">

                                        <input type="text" name="id_fran" value="<?= $id_fran ?>">
                                        <input type="text" name="fee_fran" value="<?= $afw_2 ?>">
                                        <input type="text" name="admin_fran" value="<?= $admin_listing_fran_n ?>">
                                        <input type="text" name="pph_fran" value="<?= $biaya_pph_l_fran ?>">
                                        <input type="text" name="ppribadi_fran" value="<?= $jumlah_kurang_fran ?>">
                                        <input type="text" name="netto_fran" value="<?= $fmb_l_fran ?>">

                                        <input type="text" name="id_win" value="<?= $id_win ?>">
                                        <input type="text" name="fee_win" value="<?= $afw_2 ?>">
                                        <input type="text" name="admin_win" value="<?= $admin_listing_win_n ?>">
                                        <input type="text" name="pph_win" value="<?= $biaya_pph_l_win ?>">
                                        <input type="text" name="ppribadi_win" value="<?= $jumlah_kurang_win ?>">
                                        <input type="text" name="netto_win" value="<?= $fmb_l_win ?>">
                                    <?php } ?>

                                    <input type="text" name="fee_kantor1" value="<?= $fkl ?>">
                                    <input type="text" name="fee_kantor2" value="<?= $fks ?>">
                                    <input type="text" name="fee_kantor3" value="<?= $fkl2 ?>">
                                    <input type="text" name="fee_kantor4" value="<?= $fks2 ?>">

                                    <input type="text" name="fee_marketing1" value="<?= $fmk2_listing ?>">
                                    <input type="text" name="fee_marketing2" value="<?= $fmk2_selling ?>">
                                    <input type="text" name="fee_marketing3" value="<?= $fmk2_listing2 ?>">
                                    <input type="text" name="fee_marketing4" value="<?= $fmk2_selling2 ?>">

                                    <input type="text" name="ptn_admin1" value="<?= $admin_listing ?>">
                                    <input type="text" name="ptn_admin2" value="<?= $admin_selling ?>">
                                    <input type="text" name="ptn_admin3" value="<?= $admin_listing2 ?>">
                                    <input type="text" name="ptn_admin4" value="<?= $admin_selling2 ?>">

                                    <input type="text" name="ptn_pph1" value="<?= $biaya_pph_l ?>">
                                    <input type="text" name="ptn_pph2" value="<?= $biaya_pph_s ?>">
                                    <input type="text" name="ptn_pph3" value="<?= $biaya_pph_l2 ?>">
                                    <input type="text" name="ptn_pph4" value="<?= $biaya_pph_s2 ?>">

                                    <input type="text" name="ptn_pribadi1" value="<?= $jumlah_kurang_listing ?>">
                                    <input type="text" name="ptn_pribadi2" value="<?= $jumlah_kurang_selling ?>">
                                    <input type="text" name="ptn_pribadi3" value="<?= $jumlah_kurang_listing2 ?>">
                                    <input type="text" name="ptn_pribadi4" value="<?= $jumlah_kurang_selling2 ?>">

                                    <input type="text" name="netto_marketing1" value="<?= $fmb_l ?>">
                                    <input type="text" name="netto_marketing2" value="<?= $fmb_s ?>">
                                    <input type="text" name="netto_marketing3" value="<?= $fmb_l2 ?>">
                                    <input type="text" name="netto_marketing4" value="<?= $fmb_s2 ?>">
                                </div>

                                <div class="flex-shrink-0">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if ($komisi->status_komisi == "Approve") {?>

            <div class="card-body mt-0">
                <div class="card-body p-0">
                    <div class="card text-center w-50 mx-auto my-auto">
                        <div class="card-header">
                            Surabaya, <?= date("d-m-Y", strtotime($komisi->tgl_disetujui)); ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Mengetahui</h5>
                            <p class="card-text">
                                <img style="width : 80px; height: auto;" class="profile-img" src="<?php echo base_url('assets/foto_ttd/').$komisi->gambar_ttd_pengguna; ?>"
                                alt="">
                            </p>
                            <a href="#" class="btn btn-primary"><?= $komisi->admin_disetujui ?> - <?= $komisi->level_disetujui ?></a>
                        </div>
                        <div class="card-footer">
                            A&A Indonesia
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

<?php } ?>
</div>
</body>
