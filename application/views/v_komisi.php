<?php include "session_identitas.php"; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <?php require'v_navigasi.php'; ?>
        <?php if ($level == 'Administrator'): ?> 
            <div class="text-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
            </div>
        <?php endif ?>
    </div>
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title" style="text-align: center;">Data Komisi Closing</h4>
        </div>

        <?php include "komisi/tambah_komisi.php"; ?>

        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Alamat</th>
                            <th>Jenis Transaksi</th>
                            <th>Closing</th>
                            <th>Marketing Listing</th>
                            <th>Marketing Selling</th> 
                            <th>Bruto</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; 
                        foreach ($komisi as $komisi) { 
                            //string to rupiah
                            $bruto = stringToNumber($komisi->bruto_komisi);
                            $bruto_r = numberToRupiah($bruto);

                            $tgl_closing = date("d-m-Y", strtotime($komisi->tgl_closing_komisi));

                            //setting apakah listing 1 a&a atau cobroke
                            $listing_1 = $komisi->nama_mar;
                            foreach ($co_broke as $kubruk) {
                                if ($komisi->mar_listing_komisi == $kubruk->id_komisi_unik && $komisi->id_komisi == $kubruk->id_komisi ) {
                                    $listing_1 = $kubruk->nama_cobroke;
                                }
                            }

                            //setting apakah selling 1 a&a atau cobroke
                            $selling_1 = $komisi->nama_mar2;
                            foreach ($co_broke as $kubruk) {
                                if ($komisi->mar_selling_komisi == $kubruk->id_komisi_unik && $komisi->id_komisi == $kubruk->id_komisi ) {
                                    $selling_1 = $kubruk->nama_cobroke;
                                }
                            }

                            //setting listing 2 dan selling 2
                            if (!empty($komisi->listing_2)) {
                                $listing2_baru = '- '.$komisi->listing_2;
                            }else{
                                $listing2_baru = '';
                            }

                            if (!empty($komisi->selling_2)) {
                                $selling2_baru = '- '.$komisi->selling_2;
                            }else{
                                $selling2_baru = '';
                            }

                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $komisi->alamat_komisi ?></td>
                                <td><?= $komisi->jt_komisi?></td>
                                <td><?= $tgl_closing?></td>
                                <td><?= $listing_1 ?> <?= $listing2_baru?> </td>
                                <td><?= $selling_1 ?> <?= $selling2_baru?></td>
                                <td><?= $bruto_r ?></td>
                                <td>
                                    <div>
                                        <?php 
                                        if ($komisi->status_komisi=='Proses Approve') {
                                            echo "<span class='badge badge-warning p-2'>Proses Approve</span>";
                                        }else{
                                            echo "<span class='badge badge-success p-2'>Approve</span>";
                                        }?>
                                    </div>

                                    <div class="mt-2">
                                        <?php 
                                        if ($komisi->status_transfer=='Proses Transfer') {
                                            echo "<span class='badge badge-secondary p-2'>Proses Transfer</span>";
                                        }else{
                                            echo "<span class='badge badge-success p-2'>Transfer</span>";
                                        }?>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#lihat_komisi<?php echo $komisi->id_komisi; ?>" class="btn btn-primary btn-sm mt-1"><i class="fas fa-eye" title="Detail"></i></a>

                                    <?php include "komisi/lihat_komisi.php"; ?>

                                    <a href="<?= base_url('komisi/rincian_komisi/' . $komisi->id_komisi); ?>" class="btn btn-warning btn-sm mt-1" data-target="#editModal"><i class="fas fa-list" title="Lihat Rincian"></i></a>

                                    <?php if ($level == 'Administrator' && $komisi->status_komisi != 'Approve'): ?>  
                                        <a href="<?= base_url('komisi/edit_komisi/' . $komisi->id_komisi); ?>" class="btn btn-success btn-sm mt-1" data-target="#editModal"><i class="fas fa-edit" title="Edit Komisi"></i></a>

                                        <a href="<?= base_url('komisi/hapus/' . $komisi->id_komisi); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data komisi?')" class="btn btn-danger btn-sm mt-1"><i class="fas fa-trash" title="Hapus"></i></a>
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
</body>


