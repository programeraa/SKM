<?php include "session_identitas.php"; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <?php require'v_navigasi.php'; ?>
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

                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $komisi->alamat_komisi ?></td>
                                <td><?= $komisi->jt_komisi?></td>
                                <td><?= $tgl_closing?></td>
                                <td><?= $komisi->nama_mar?></td>
                                <td><?= $komisi->nama_mar2 ?></td>
                                <td><?= $bruto_r ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#lihat_komisi<?php echo $komisi->id_komisi; ?>" class="btn btn-primary btn-sm mt-1"><i class="fas fa-eye" title="Detail"></i></a>

                                    <?php include "komisi/lihat_komisi.php"; ?>

                                    <a href="<?= base_url('komisi/rincian_komisi/' . $komisi->id_komisi); ?>" class="btn btn-warning btn-sm mt-1" data-target="#editModal"><i class="fas fa-list" title="Lihat Rincian"></i></a>

                                    <a href="<?= base_url('komisi/edit_komisi/' . $komisi->id_komisi); ?>" class="btn btn-success btn-sm mt-1" data-target="#editModal"><i class="fas fa-edit" title="Edit Komisi"></i></a>

                                    <a href="<?= base_url('komisi/hapus/' . $komisi->id_komisi); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data komisi?')" class="btn btn-danger btn-sm mt-1"><i class="fas fa-trash" title="Hapus"></i></a>
                                    
                                </td>
                            </tr>
                            <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>


