<?php include "session_identitas.php"; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <!-- <div class="text-right"> -->
            <?php require'v_navigasi.php'; ?>
        <!-- </div> -->
        <?php if ($level == 'Administrator'): ?> 
            <div class="text-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
            </div>
            <?php endif ?>
        </div>

        <?php include "marketing/tambah_marketing.php" ?>

        <div class="card">
            <div class="card-header bg-dark text-white">
                <h4 class="card-title" style="text-align: center;">Data Marketing</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Marketing</th>
                                <th>Member</th>
                                <th>Upline 1</th>
                                <th>Upline 2</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($marketing as $mkt) { 

                                $check = false;

                                foreach ($komisi as $cek_komisi) {
                                    if ($cek_komisi->mar_listing_komisi == $mkt->id_mar || $cek_komisi->mar_listing2_komisi == $mkt->id_mar || $cek_komisi->mar_selling_komisi == $mkt->id_mar || $cek_komisi->mar_selling2_komisi == $mkt->id_mar ) {
                                        $check = true;
                                    }
                                }

                                $afw = false;

                                if ($mkt->nama_mar == 'Ang' || $mkt->nama_mar == 'Fran' || $mkt->nama_mar == 'Winata' || $mkt->nama_mar == 'Ang/Fran/Win') {
                                    $afw = true;
                                }

                                $upline = false;

                                foreach ($marketing as $cek_upline) {
                                    if ($mkt->id_mar == $cek_upline->upline_emd_mar || $mkt->id_mar == $cek_upline->upline_cmo_mar) {
                                        $upline = true;
                                    }
                                }

                                if (!empty($mkt->gambar_ktp_mar)) {
                                    $gambar_ktp = 1;
                                }else{
                                    $gambar_ktp = 0;
                                }

                                if(!empty($mkt->gambar_npwp_mar)) {
                                    $gambar_npwp = 1;
                                }else{
                                    $gambar_npwp = 0;
                                }
                                ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $mkt->nama_mar;?> (<?= $mkt->nomor_mar;?>)</td>
                                    <td><?php $member = $mkt->member_mar; 
                                    if ($member == 'Silver') {
                                        echo $mkt->member_mar; echo ' (50%)';
                                    }elseif ($member == 'Gold Express') {
                                        echo $mkt->member_mar; echo ' (60%)';
                                    }elseif ($member == 'Prime Pro') {
                                        echo $mkt->member_mar; echo ' (70%)';
                                    }else{
                                        echo $mkt->member_mar; echo ' (80%)';
                                    }
                                    ?>
                                </td>
                                <?php 
                                $emd = $mkt->upline_emd_mar;
                                foreach ($marketing as $mkt2) {
                                    if ($mkt2->id_mar == $emd) {
                                        $emd_baru = $mkt2->nama_mar;
                                        break;
                                    }else{
                                        $emd_baru = 'Tidak Ada';
                                    }
                                }
                                ?>
                                <td>
                                    <?= $emd_baru; ?>
                                </td>
                                <?php 
                                $cmo = $mkt->upline_cmo_mar;
                                foreach ($marketing as $mkt2) {
                                    if ($mkt2->id_mar == $cmo) {
                                        $cmo_baru = $mkt2->nama_mar;
                                        break;
                                    }else{
                                        $cmo_baru = 'Tidak Ada';
                                    }
                                }
                                ?>
                                <td>
                                   <?= $cmo_baru; ?>
                               </td>
                               <td>
                                <a href="#" data-toggle="modal" data-target="#lihat_marketing<?php echo $mkt->id_mar; ?>" class="btn btn-primary"><i class="fas fa-eye" title="Lihat"></i></a>

                                <?php include "marketing/lihat_marketing.php" ?>

                                <?php if ($level == 'Administrator'): ?> 

                                    <a href="<?= base_url('marketing/edit/' . $mkt->id_mar); ?>" class="btn btn-success" data-target="#editModal"><i class="fas fa-edit" title="Edit"></i></a>

                                    <?php if (!$afw && !$check && !$upline): ?>
                                        <a href="<?= base_url('marketing/hapus/' . $mkt->id_mar); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data marketing?')" class="btn btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
                                    <?php endif ?>

                                <?php endif ?>
                            </td>
                        </tr>
                        <?php $no++;
                    } ?>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
</body>
