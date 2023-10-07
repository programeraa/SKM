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
                        }else{
                            $j_cobroke = 'Non-Badan (Non-NPWP)';
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
                        }else{
                            $s_cobroke = 'Non-Badan (Non-NPWP)';
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
                <a href="<?= base_url('Komisi/komisi'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
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

        <?php } ?>
    </div>
</body>
