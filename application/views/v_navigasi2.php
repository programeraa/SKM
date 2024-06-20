<div class="d-flex bd-highlight mb-2">
    <div class="text-right">
        <a href="<?= base_url('Komisi');?>">
            <button type="button" class="btn btn-dark" data-whatever="@getbootstrap" >Dashboard</button></a>
        </div>

        <div class="text-right ml-2">
         <!-- Example split danger button -->
         <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kelola Data
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= base_url('Jurnal');?>">Jurnal Umum</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= base_url('Jurnal/buku_besar');?>">Buku Besar</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= base_url('Jurnal/bttb');?>">Master Akun</a>
        </div>
    </div>
</div>

<!-- <div class="text-right ml-2">
    <a href="<?= base_url('Jurnal');?>">
        <button type="button" class="btn btn-primary" data-whatever="@getbootstrap" >Jurnal Umum</button></a>
    </div>

    <div class="text-right ml-2">
        <a href="<?= base_url('Jurnal/buku_besar');?>">
            <button type="button" class="btn btn-success" data-whatever="@getbootstrap" >Buku Besar</button></a>
        </div>

        <div class="text-right ml-2">
            <a href="<?= base_url('Jurnal/bttb');?>">
                <button type="button" class="btn btn-secondary" data-whatever="@getbootstrap" >Master Akun</button></a>
            </div> -->

            <div class="text-right ml-2">
             <!-- Example split danger button -->
             <div class="btn-group">
              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sub Ledger Biaya
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('Jurnal/biaya_administrasi');?>">Biaya Administrasi (701) - PUSAT</a>
                <a class="dropdown-item" href="<?= base_url('Jurnal/biaya_administrasi_v');?>">Biaya Administrasi (701) - VISION</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('Jurnal/biaya_marketing');?>">Biaya Marketing (801) - PUSAT</a>
                <a class="dropdown-item" href="<?= base_url('Jurnal/biaya_marketing_v');?>">Biaya Marketing (801) - VISION</a>
            </div>
        </div>
    </div>

    <div class="text-right ml-2">
        <a href="<?= base_url('Jurnal/saldo_utj');?>">
            <button type="button" class="btn btn-info" data-whatever="@getbootstrap" >Saldo UTJ</button></a>
        </div>

        <div class="text-right ml-2">
         <!-- Example split danger button -->
         <div class="btn-group">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Saldo PUT
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= base_url('Jurnal/saldo_put');?>">Saldo PUT</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= base_url('Jurnal/saldo_put_v');?>">Saldo PUT Vision</a>
        </div>
    </div>
</div>

<?php if ($level_asli != 'Admin Komisi' && $level_asli != 'Admin Akuntan' && $level_asli != 'Administrator') {?>
    <div class="text-right ml-2">
        <a href="<?= base_url('Jurnal/pesan');?>">
            <button type="button" class="btn btn-dark" data-whatever="@getbootstrap" >Pesan Jurnal<span class="badge badge-danger badge-counter ml-1"><?php
            if ($tutup != 0) {
                echo $tutup;
            }else{
                echo '';
            } ?></span></button></a>
        </div>
    <?php } ?>


        <!-- <div class="text-right ml-2">
         <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Data Master
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= base_url('BankTitipan');?>">Jurnal Umum</a>
            <a class="dropdown-item" href="<?= base_url('BankTitipan/jurnal_ledger');?>">Jurnal Ledger</a>
            <a class="dropdown-item" href="<?= base_url('Jurnal');?>">Jurnal Umum</a>
            <a class="dropdown-item" href="<?= base_url('Jurnal/buku_besar');?>">Buku Besar</a>
            <a class="dropdown-item" href="<?= base_url('Jurnal/bttb');?>">Master BT & TB</a>
        </div>
    </div>
</div> -->

</div>

