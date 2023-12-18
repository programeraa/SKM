<div class="d-flex bd-highlight mb-2">
    <div class="text-right">
        <a href="<?= base_url('Komisi');?>">
            <button type="button" class="btn btn-dark" data-whatever="@getbootstrap" >Dashboard</button></a>
        </div>
        <div class="text-right ml-2">
         <!-- Example split danger button -->
         <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Data Master
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= base_url('Komisi/komisi');?>">Data Komisi</a>
            <a class="dropdown-item" href="<?= base_url('Marketing');?>">Data Marketing</a>
            <?php if ($level == 'Administrator'): ?> 
                <a class="dropdown-item" href="<?= base_url('Pengguna');?>">Data Pengguna</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('Pengaturan/jabatan');?>">Pengaturan Jabatan</a>
                <a class="dropdown-item" href="<?= base_url('Pengaturan/member');?>">Pengaturan Member</a>
                <a class="dropdown-item" href="<?= base_url('Pengaturan/kantor');?>">Pengaturan Kantor</a>
            <?php endif ?>
        </div>
    </div>
</div>

<div class="text-right ml-2">
   <!-- Example split danger button -->
   <div class="btn-group">
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Laporan
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= base_url('Laporan/omzet_vision');?>">Omzet A&A Vision</a>
        <a class="dropdown-item" href="<?= base_url('Laporan/omzet_marketing');?>">Omzet Per Marketing</a>
        <a class="dropdown-item" href="<?= base_url('Laporan/pph_cobroke');?>">PPH 21 Cobroke</a>
        <a class="dropdown-item" href="<?= base_url('Laporan/pph_marketing');?>">PPH 21 Marketing</a>
        <a class="dropdown-item" href="<?= base_url('Laporan/status_approve');?>">Status Approve</a>
        <a class="dropdown-item" href="<?= base_url('Laporan/status_transaksi');?>">Status Transfer</a>
        <a class="dropdown-item" href="<?= base_url('Laporan/admin_komisi');?>">Admin Komisi</a>
    </div>
</div>
</div>

<!-- <div class="text-right ml-2">
    <a href="<?= base_url('Marketing');?>">
        <button type="button" class="btn btn-primary" data-whatever="@getbootstrap" >Data Marketing</button></a>
    </div>
    <?php if ($level == 'Administrator'): ?> 
        <div class="text-right ml-2">
            <a href="<?= base_url('Pengguna');?>">
                <button type="button" class="btn btn-success" data-whatever="@getbootstrap" >Data Pengguna</button></a>
            </div>

            <div class="text-right ml-2">
                <a href="<?= base_url('Pengaturan');?>">
                    <button type="button" class="btn btn-info" data-whatever="@getbootstrap" >Pengaturan</button></a>
                </div>
                <?php endif ?> -->
            </div>

            <!-- <?php if ($level == 'Administrator'): ?> 
                <div class="text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
                </div>
            <?php endif ?> -->

