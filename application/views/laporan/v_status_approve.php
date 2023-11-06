<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <?php require __DIR__ . '/../v_navigasi.php'; ?>
    </div>
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title" style="text-align: center;">Laporan Status Approve</h4>
        </div>

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
                                    <?php 
                                    if ($komisi->status_komisi=='Proses Approve') {
                                        echo "<span class='badge badge-warning p-2'>Proses Approve</span>";
                                    }else{
                                        echo "<span class='badge badge-success p-2'>Approve</span>";
                                    }?>
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


