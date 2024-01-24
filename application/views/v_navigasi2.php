<div class="d-flex bd-highlight mb-2">
    <div class="text-right">
        <a href="<?= base_url('Komisi');?>">
            <button type="button" class="btn btn-dark" data-whatever="@getbootstrap" >Dashboard</button></a>
        </div>

        <div class="text-right ml-2">
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
                    </div>

                    <div class="text-right ml-2">
                     <!-- Example split danger button -->
                     <div class="btn-group">
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sub Ledger Biaya
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url('Jurnal/biaya_administrasi');?>">Biaya Administrasi (701)</a>
                        <a class="dropdown-item" href="<?= base_url('Jurnal/biaya_marketing');?>">Biaya Marketing (801)</a>
                    </div>
                </div>
            </div>

            <?php if ($level_asli != 'Admin Komisi' && $level_asli != 'Admin Akuntan') {?>
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

