<div class="card"> 
    <?php if ($komisi->status_komisi == "Approve") { ?>
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
                        <label for="kantor" class="col-form-label">Kantor</label>
                        <input type="text" class="form-control" id="kantor" name="kantor" value="<?= $komisi->kantor_komisi ?>" readonly>
                    </div>
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
                        <label for="nomor_kantor" class="col-form-label">Nomor Kantor</label>
                        <input type="text" class="form-control" id="nomor_kantor" name="nomor_kantor" value="<?= $komisi->nomor_kantor_komisi ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="m_listing" class="col-form-label">Marketing Listing</label>
                        <input type="text" class="form-control" id="m_listing" name="m_listing" value="<?= $listing_1 ?> <?= $listing2_baru ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="m_selling" class="col-form-label">Marketing Selling</label>
                        <input type="text" class="form-control" id="m_selling" name="m_selling" value="<?= $selling_1 ?> <?= $selling2_baru ?>" readonly>
                    </div>
                </div>
            </div>
            <?php if (!empty($komisi->keterangan_komisi)) {?>
                <div class="form-group">
                    <label for="keterangan" class="col-form-label">Keterangan</label>
                    <input type="teks" class="form-control" id="keterangan" name="keterangan" value="<?= $komisi->keterangan_komisi ?>" readonly>
                </div>
            <?php } ?>
        </div>

        <div class="card-header-sm bg-dark text-white">
            <h4 class="card-title p-2 m-0" style="text-align: center;">Rincian Fee Marketing</h4>
        </div>

        <div class="card-body">
            <!-- Rumus 1-->
            <?php include "rumus_1.php" ?>

            <!-- Kasus jika 2 marketing (listing dan selling)-->
            <div class="row">
                <div class="col">
                    <table class="tg table table-dark" width="100">
                        <thead>
                            <?php if (!empty($ket_referal) || !empty($ket_potongan) || !empty($j_cobroke) || !empty($s_cobroke)) {?>
                              <tr>
                                <th class="tg-0lax" colspan="4">Komisi Bruto Awal</th>
                                <th scope="col" class="text-right"><?php echo $bruto_awal_r;?></th> 
                            </tr>
                        <?php } ?>

                        <?php if (!empty($referal_keterangan) && empty($kubruk_nama)) {?>
                            <tr>
                                <th class="tg-0lax text-warning" colspan="4">Referal (<?= $ket_referal; ?>)</th>
                                <?php if (strlen($referal_jumlah) <= 2) {?>
                                    <th scope="col" class="text-right"><?php echo $jumlah_referal_r;?> % : <?= $hitung_referal_r; ?></th>
                                <?php }else{ ?>
                                    <th scope="col" class="text-right"><?php echo $jumlah_referal_r;?></th>
                                <?php } ?>
                            </tr>
                        <?php }?>

                        <?php if (!empty($ket_potongan)) {?>
                            <tr>
                                <th class="tg-0lax text-warning" colspan="4">Potongan (<?= $ket_potongan;?>)</th>
                                <th scope="col" class="text-right"><?php echo $jumlah_potongan_r;?></th>
                            </tr>
                        <?php }?>

                        <?php if (!empty($potongan_jumlah)) {?>
                            <tr>
                                <th class="tg-0lax" colspan="4">Komisi Bruto</th>
                                <th scope="col" class="text-right text-warning"><?php echo $bruto_2_r;?></th>
                            </tr>
                            <tr>
                                <th class="tg-0lax bg-light" colspan="4"></th>
                                <th scope="col" class="bg-light"></th>
                            </tr>
                        <?php }elseif (!empty($kubruk_nama)) {?>
                            <tr class="d-xl-none"></tr>
                        <?php }else{ ?>
                            <tr>
                                <th class="tg-0lax" colspan="4">Komisi Bruto</th>
                                <th scope="col" class="text-right"><?php echo $bruto_r;?></th>
                            </tr>
                        <?php } ?>

                    </thead>
                    <tbody>
                        <?php if (!empty($referal_keterangan) && !empty($kubruk_nama)) {?>
                            <tr>
                                <th class="tg-0lax text-warning" colspan="4">Referal (<?= $ket_referal; ?>)</th>
                                <?php if (strlen($referal_jumlah) <= 2) {?>
                                    <th scope="col" class="text-right"><?php echo $jumlah_referal_r;?> % : <?= $hitung_referal_baru_r; ?></th>
                                <?php }else{ ?>
                                    <th scope="col" class="text-right"><?php echo $jumlah_referal_r;?></th>
                                <?php } ?>
                            </tr>
                        <?php }?>

                        <tr>
                            <td class="tg-0lax "><?php echo 'Marketing Listing'?></td>
                            <?php if (!empty($j_cobroke)) {?>
                                <td class="tg-0lax text-right"><?php echo $bruto_3_r; ?></td>
                            <?php }else{ ?>
                                <td class="tg-0lax text-right"><?php echo $fmk_r; ?></td>
                            <?php } ?>

                            <td class="tg-0lax " rowspan="3"></td>

                            <td class="tg-0lax "><?php echo 'Marketing Selling'?></td>
                            <?php if (!empty($s_cobroke)) {?>
                                <td class="tg-0lax text-right"><?php echo $bruto_3_r; ?></td>
                            <?php }else{ ?>
                                <td class="tg-0lax text-right"><?php echo $fmk_r; ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <?php if (!empty($j_cobroke)) {?>

                                <td class="tg-0lax"><?php echo 'Co-Broke : '.''.$listing_1.''?></td>
                                <td class="tg-0lax text-right">Komisi : <?= $persen_cobroke ?> %</td>

                            <?php }else{ ?>

                                <td class="tg-0lax"><?php echo 'Fee Marketing'. ' ('.$komisi->nama_mar.' - '.$l_member.'%'.')'?></td>
                                <td class="tg-0lax text-right"><?php echo $fmk2_listing_r; ?></td>

                            <?php } ?>

                            <?php if (!empty($s_cobroke)) {?>

                                <td class="tg-0lax"><?php echo 'Co-Broke : '.''.$selling_1.''?></td>
                                <td class="tg-0lax text-right">Komisi : <?= $persen_cobroke ?> %</td>

                            <?php }else{ ?>

                                <td class="tg-0lax"><?php echo 'Fee Marketing'. ' ('.$komisi->nama_mar2.' - '.$s_member.'%'.')'?></td>
                                <td class="tg-0lax text-right"><?php echo $fmk2_selling_r; ?></td>

                            <?php } ?>

                        </tr>
                        <tr>
                            <?php if (!empty($j_cobroke)) {?>

                                <td class="tg-0lax">Jenis Co-Broke</td>
                                <td class="tg-0lax text-right"><?php echo $j_cobroke; ?></td>

                            <?php }else{ ?>

                                <td class="tg-0lax"><?php echo 'Fee Kantor'?></td>
                                <td class="tg-0lax text-right"><?php echo $fkl_r; ?></td>

                            <?php } ?>

                            <?php if (!empty($s_cobroke)) {?>

                                <td class="tg-0lax">Jenis Co-Broke</td>
                                <td class="tg-0lax text-right"><?php echo $s_cobroke; ?></td>

                            <?php }else{ ?>

                                <td class="tg-0lax"><?php echo 'Fee Kantor'?></td>
                                <td class="tg-0lax text-right"><?php echo $fks_r; ?></td>

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

        <div class="card-header-sm text-dark">
            <div class="d-flex justify-content-between mb-2">
                <?php if (!empty($j_cobroke)) {?>
                    <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi <?php echo $listing_1; ?></h4>
                <?php }else{ ?>
                    <?php if ($ml_afw == 'Ang/Fran/Win') {?>
                        <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi Ang</h4>
                    <?php }else{ ?>
                        <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi <?php echo $nama_marketing_listing_1; ?></h4>
                    <?php } ?>
                <?php } ?>

                <?php if (!empty($s_cobroke)) {?>
                    <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi <?php echo $selling_1; ?></h4>
                <?php }else{ ?>
                    <?php if ($ms_afw == 'Ang/Fran/Win') {?>
                        <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi Ang</h4>
                    <?php }else{ ?>
                        <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi <?php echo $nama_marketing_selling_1; ?></h4>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

        <div class="card-body p-0 pt-2">
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
                                <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$j_cobroke_angka.'% - '.$j_cobroke.')'?></td>
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

                    <?php include "rincian_komisi_afw.php" ?>

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
                <div>
                    <?php if ($level == 'Administrator' && $komisi->status_komisi != 'Approve'):?>
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
                            <input type="text" class="form-control" id="status_marketing" name="status_marketing" value="Listing">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>

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
                <td class="tg-0lax text-warning"><?php echo 'Dikurangi PPH 21 ('.$s_cobroke_angka.'% - '.$s_cobroke.')'?></td>
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

                    <?php include "rincian_komisi_afw.php" ?>

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

            <div>
                <?php if ($level == 'Administrator' && $komisi->status_komisi != 'Approve') :?>
                    <?php if ($jumlah_kurang_selling == 0) {?>
                        <button type="button" class="btn btn-danger float-right" id="toggleForm2">Biaya Pengurang (Bila Ada)</button>
                    <?php }else{ ?>

                        <a href="<?= base_url('komisi/hapus_pengurangan_fee?id_komisi=' . $komisi->id_komisi . '&id_marketing=' . $komisi->mar_selling_komisi); ?>"  class="btn btn-primary mb-3 float-right"><i class="fas fa-trash mr-2" title="Hapus"></i>Hapus Biaya Pengurangan</a>

                    <?php } ?>
                <?php endif ?>
                <div id="pengurangan_selling1" style="display:none;padding-top: 54px;">
                    <form method="post" action="<?= base_url('komisi/tambah_pengurangan_fee') ?>">
                      <div class="form-group">
                        <label for="keterangan_pengurangan">Keterangan Pengurangan</label>
                        <input type="text" class="form-control" id="keterangan_pengurangan" name="keterangan_pengurangan">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pengurangan2">Jumlah</label>
                        <input type="text" class="form-control" name="tampil_pengurangan" id="tampil_pengurangan" onkeyup="formatRupiah(this, 'jumlah_pengurangan2')">

                        <input type="hidden" class="form-control" id="jumlah_pengurangan2" name="jumlah_pengurangan">
                    </div>
                    <div class="form-group d-xl-none">
                        <label for="id_komisi">ID Komisi</label>
                        <input type="text" class="form-control" id="id_komisi" name="id_komisi" value="<?= $komisi->id_komisi ?>">
                    </div>
                    <div class="form-group d-xl-none">
                        <label for="id_marketing">ID Marketing</label>
                        <input type="text" class="form-control" id="id_marketing" name="id_marketing" value="<?= $komisi->mar_selling_komisi ?>">
                    </div>
                    <div class="form-group d-xl-none">
                        <label for="status_marketing">Status Marketing</label>
                        <input type="text" class="form-control" id="status_marketing" name="status_marketing" value="Selling">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    <?php } ?>
<?php } ?>
</div>
</div>
</div>

<!-- Kasus jika 4 marketing (listing 2 dan selling 2)-->
<?php if (!empty($m_listing_2 || $m_selling_2)) { ?>
    <div class="card-header-sm text-dark">
        <div class="d-flex justify-content-between mb-2">
            <?php if ($ml_2_afw == 'Ang/Fran/Win') {?>
                <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi Ang</h4>
            <?php }else{ ?>
                <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi <?php echo $komisi->listing_2; ?></h4>
            <?php } ?>

            <?php if ($ms_2_afw == 'Ang/Fran/Win') {?>
                <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi Ang</h4>
            <?php }else{ ?>
                <h4 class="card-title p-0 m-0" style="text-align: center;">Rincian Komisi <?php echo $komisi->selling_2; ?></h4>
            <?php } ?>
        </div>
    </div>

    <div class="card-body p-0 pt-2">
        <div class="row">
            <div class="col-md-6">
                <?php if ($ml_2_afw == 'Ang/Fran/Win') {?>

                    <?php include "rincian_komisi_afw.php" ?>

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
                    <div>
                        <?php if ($level == 'Administrator' && $komisi->status_komisi != 'Approve'):?>
                            <?php if ($jumlah_kurang_listing2 == 0) {?>
                                <button type="button" class="btn btn-danger mb-3" id="toggleForm3">Biaya Pengurang (Bila Ada)</button>
                            <?php }else{ ?>

                                <a href="<?= base_url('komisi/hapus_pengurangan_fee?id_komisi=' . $komisi->id_komisi . '&id_marketing=' . $komisi->mar_listing2_komisi); ?>"  class="btn btn-primary mb-3"><i class="fas fa-trash mr-2" title="Hapus"></i>Hapus Biaya Pengurangan</a>

                            <?php } ?>
                        <?php endif ?>
                        <div id="pengurangan_listing2" style="display:none;">
                            <form method="post" action="<?= base_url('komisi/tambah_pengurangan_fee') ?>">
                              <div class="form-group">
                                <label for="keterangan_pengurangan">Keterangan Pengurangan</label>
                                <input type="text" class="form-control" id="keterangan_pengurangan" name="keterangan_pengurangan">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_pengurangan3">Jumlah</label>
                                <input type="text" class="form-control" name="tampil_pengurangan" id="tampil_pengurangan" onkeyup="formatRupiah(this, 'jumlah_pengurangan3')">

                                <input type="hidden" class="form-control" id="jumlah_pengurangan3" name="jumlah_pengurangan">
                            </div>
                            <div class="form-group d-xl-none">
                                <label for="id_komisi">ID Komisi</label>
                                <input type="text" class="form-control" id="id_komisi" name="id_komisi" value="<?= $komisi->id_komisi ?>">
                            </div>
                            <div class="form-group d-xl-none">
                                <label for="id_marketing">ID Marketing</label>
                                <input type="text" class="form-control" id="id_marketing" name="id_marketing" value="<?= $komisi->mar_listing2_komisi ?>">
                            </div>
                            <div class="form-group d-xl-none">
                                <label for="status_marketing">Status Marketing</label>
                                <input type="text" class="form-control" id="status_marketing" name="status_marketing" value="Listing 2">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>


    <div class="col-md-6">
        <?php if ($ms_2_afw == 'Ang/Fran/Win') {?>

            <?php include "rincian_komisi_afw.php" ?>

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
        <div>
            <?php if ($level == 'Administrator' && $komisi->status_komisi != 'Approve') :?>
                <?php if ($jumlah_kurang_selling2 == 0) {?>
                    <button type="button" class="btn btn-danger float-right" id="toggleForm4">Biaya Pengurang (Bila Ada)</button>
                <?php }else{ ?>

                    <a href="<?= base_url('komisi/hapus_pengurangan_fee?id_komisi=' . $komisi->id_komisi . '&id_marketing=' . $komisi->mar_selling2_komisi); ?>"  class="btn btn-primary mb-3 float-right"><i class="fas fa-trash mr-2" title="Hapus"></i>Hapus Biaya Pengurangan</a>

                <?php } ?>
            <?php endif ?>
            <div id="pengurangan_selling2" style="display:none;padding-top: 54px;">
                <form method="post" action="<?= base_url('komisi/tambah_pengurangan_fee') ?>">
                  <div class="form-group">
                    <label for="keterangan_pengurangan">Keterangan Pengurangan</label>
                    <input type="text" class="form-control" id="keterangan_pengurangan" name="keterangan_pengurangan">
                </div>
                <div class="form-group">
                    <label for="jumlah_pengurangan4">Jumlah</label>
                    <input type="text" class="form-control" name="tampil_pengurangan" id="tampil_pengurangan" onkeyup="formatRupiah(this, 'jumlah_pengurangan4')">

                    <input type="hidden" class="form-control" id="jumlah_pengurangan4" name="jumlah_pengurangan">
                </div>
                <div class="form-group d-xl-none">
                    <label for="id_komisi">ID Komisi</label>
                    <input type="text" class="form-control" id="id_komisi" name="id_komisi" value="<?= $komisi->id_komisi ?>">
                </div>
                <div class="form-group d-xl-none">
                    <label for="id_marketing">ID Marketing</label>
                    <input type="text" class="form-control" id="id_marketing" name="id_marketing" value="<?= $komisi->mar_selling2_komisi ?>">
                </div>
                <div class="form-group d-xl-none">
                    <label for="status_marketing">Status Marketing</label>
                    <input type="text" class="form-control" id="status_marketing" name="status_marketing" value="Selling 2">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
<?php } ?>
<?php } ?>
</div>
</div>
</div>
<?php } ?>
</div>

<div class="card-header-sm bg-dark text-white">
    <h4 class="card-title p-2 m-0" style="text-align: center;">Rincian Fee Upline 1</h4>
</div>

<div class="card-body">
    <!-- rumus 2 -->
    <?php include "rumus_2.php" ?>
    <!--upline listing dan selling 1-->
    <div class="card-header-sm text-dark">
        <div class="d-flex justify-content-between mb-2">
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

<div class="card-body p-0 pt-2">
    <div class="row">
        <div class="col-md-6">
            <?php if ($ml_afw == "Ang/Fran/Win") { ?>

                <?php include "upline_afw_2.php" ?>

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
        <?php } ?>
    </div>

    <div class="col-md-6">
        <?php if ($ms_afw == "Ang/Fran/Win") { ?>

            <?php include "upline_afw_2.php" ?>

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
                        <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak_selling_1  ?>)</td>
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

<!--upline listing dan selling 2-->
<div class="card-header-sm text-dark">
    <div class="d-flex justify-content-between mb-2">
        <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 Listing (<?php 
            if (!empty($up_2_listing)) {
                echo $up_2_listing;
            }else{
                echo "Tidak Ada";
            }
        ?>)</h4>
        <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 Selling (<?php 
            if ($up_2_selling) {
                echo $up_2_selling;
            }else{
                echo "Tidak Ada";
            }
        ?>)</h4>
    </div>
</div>

<div class="card-body p-0 pt-2">
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
                    <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak_selling_2  ?>)</td>
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
<!-- kasus jika ada upline co listing dan co selling-->
<div class="card-header-sm bg-dark text-white">
    <h4 class="card-title p-2 m-0" style="text-align: center;">Rincian Fee Upline 2</h4>
</div>

<div class="card-body">
    <!--upline listing dan selling 2-->
    <div class="card-header-sm text-dark">
        <div class="d-flex justify-content-between mb-2">
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

    <div class="card-body p-0 pt-2">
        <div class="row">
            <div class="col-md-6">
                <?php if ($ml_2_afw == 'Ang/Fran/Win') { ?>

                    <?php include "upline_afw_2.php" ?>

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
                                <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak1_listing_2  ?>)</td>
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

        <div class="col-md-6">
            <?php if ($ms_2_afw == 'Ang/Fran/Win') { ?>

                <?php include "upline_afw_2.php" ?>

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
                            <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak1_selling_2  ?>)</td>
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

<!--upline listing dan selling 2-->
<div class="card-header-sm text-dark">
    <div class="d-flex justify-content-between mb-2">
        <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 Listing 2 (<?php 
            if ($up_2_listing2) {
                echo $up_2_listing2;
            }else{
                echo "Tidak Ada";
            }
        ?>)</h4>
        <h4 class="card-title p-0 m-0" style="text-align: center;">Upline 2 Selling 2 (<?php 
            if ($up_2_selling2) {
                echo $up_2_selling2;
            }else{
                echo "Tidak Ada";
            }
        ?>)</h4>
    </div>
</div>

<div class="card-body p-0 pt-2">
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
                        <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak2_listing_2  ?>)</td>
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
                    <td class="tg-0lax text-warning">Dikurangi Pajak (<?= $teks_pajak2_selling_2  ?>)</td>
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
