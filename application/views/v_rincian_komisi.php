<div class="container pt-5 pb-5">
    <?php foreach ($komisi as $komisi) { ?>
        <div class="d-flex justify-content-between mb-2">
            <div class="text-right">
                <a href="<?= base_url('Komisi/komisi'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
            </div>

            <div class="text-right">
                <p class="text-danger font-weight-bold">Closing : <?= date("d-m-Y", strtotime($komisi->tgl_closing_komisi))?> - <span class="text-dark">Tanggal Input : <?= date("d-m-Y", strtotime($komisi->waktu_komisi))?></span>
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