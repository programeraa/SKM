<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <?php require __DIR__ . '/../v_navigasi.php'; ?>
    </div>
    <div class="card">
        <div class="card-header bg-dark text-white">
            <?php 
            if(isset($_GET['dari']) && isset($_GET['ke'])){
                $b = $_GET['dari'];
                $t = $_GET['ke'];

                if ($_GET['j_tanggal'] == 'tgl_closing_komisi') {
                    $j = 'Tgl Closing';
                }elseif($_GET['j_tanggal'] == 'waktu_komisi'){
                    $j = 'Tgl Input';
                }else{
                    $j = 'Tgl Approve';
                }

                $s = $_GET['status'];
            }else{
                $b = null;
                $t = null;
                $j = null;
                $s = null;
            }
            ?>

            <h4 class="card-title" style="text-align: center;">Laporan Status Approve</h4>
            <?php if ($b != null && $s != null) {?>
                <h5><?php echo '<div class="justify-content-center">
                <div class="col-auto text-center">
                <strong><span class= text-warning>'.$j.' Periode '.date("d-m-Y", strtotime($b)).' sampai '.date("d-m-Y", strtotime($t)).'</span></strong> 
                </div>

                <div class="col-auto text-center">
                <strong><span class= text-warning>Status ('.$s.')</span></strong> 
                </div>
            </div>'; ?></h5> 
        <?php }elseif ($b != null && $s == null) { ?>
            <h5><?php echo '<div class="justify-content-center">
            <div class="col-auto text-center">
            <strong><span class= text-warning>'.$j.' Periode '.date("d-m-Y", strtotime($b)).' sampai '.date("d-m-Y", strtotime($t)).'</span></strong> 
            </div>
        </div>'; ?></h5>
    <?php }elseif ($b == null && $s != null) { ?>
        <h5><?php echo '<div class="justify-content-center">
        <div class="col-auto text-center">
        <strong><span class= text-warning>Status ('.$s.')</span></strong> 
        </div>
    </div>'; ?></h5> 
<?php } ?>
</div>

<div class="card-body">
    <div class="pb-3 d-sm-flex justify-content-start">
      <form method="get" action="<?= base_url('laporan/filterDataStatusApprove'); ?>">
        <div class="row g-3 align-items-center justify-content-end">
          <div class="col-auto">
            <label class="col-form-label">Periode</label>
        </div>
        <div class="col-auto p-0">
            <input type="date" class="form-control" name="dari">
        </div>
        <div class="col-auto">
            -
        </div>
        <div class="col-auto p-0">
            <input type="date" class="form-control" name="ke">
        </div>
        <div class="col-auto pr-0">
            <select class="form-control" id="j_tanggal" name="j_tanggal">
                <option value="tgl_closing_komisi">Tanggal Closing</option>
                <option value="waktu_komisi">Tanggal Input</option>
                <option value="tgl_disetujui">Tanggal Disetujui</option>
            </select>
        </div>
        <div class="col-auto pr-0">
            <select class="form-control" id="status" name="status">
                <option value="">Pilih Status</option>
                <option value="Approve">Approve</option>
                <option value="Proses Approve">Proses Approve</option>
            </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" type="submit">Tampilkan</button>
        </div>
    </div>
</form>
</div>

<div class="table-responsive">
    <table id="myTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kantor</th>
                <th>Alamat</th>
                <th>Jenis Transaksi</th>
                <th>Closing</th>
                <th>Marketing Listing</th>
                <th>Marketing Selling</th> 
                <th>Bruto</th>
                <th>Status</th>
                <th>Tanggal Input</th>
                <th>Tanggal Approve</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; 
            foreach ($komisi as $komisi) { 
                            //string to rupiah
                $bruto = stringToNumber($komisi->bruto_komisi);
                $bruto_r = numberToRupiah($bruto);

                $tgl_closing = date("d-m-Y", strtotime($komisi->tgl_closing_komisi));
                $tgl_input = date("d-m-Y", strtotime($komisi->waktu_komisi));
                $tgl_approve = date("d-m-Y", strtotime($komisi->tgl_disetujui));

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

                foreach ($kantor as $ktr) {
                    if ($ktr->id_kantor == $komisi->kantor_komisi) {
                        $kantor_komisi = $ktr->kantor;
                    }
                }

                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td>
                        <div>
                            <?php 
                            if ($kantor_komisi == 'Pusat') {
                                echo "<span class='badge badge-primary p-2'>".strtoupper($kantor_komisi)." - ".$komisi->nomor_kantor_komisi."</span>";
                            } else {
                                echo "<span class='badge badge-success p-2'>".strtoupper($kantor_komisi)." - ".$komisi->nomor_kantor_komisi."</span>";
                            }
                            ?>

                        </div>

                        <div class="mt-2">
                            <?php 
                            if ($komisi->jenis_hitungan_komisi == 'Secondary') {
                                echo "<span class='badge badge-secondary p-2'>".strtoupper($komisi->jenis_hitungan_komisi)."</span>";
                            } elseif($komisi->jenis_hitungan_komisi == 'KPR') {
                                echo "<span class='badge badge-warning p-2'>".strtoupper($komisi->jenis_hitungan_komisi)."</span>";
                            }else{
                                echo "<span class='badge badge-danger p-2'>".strtoupper($komisi->jenis_hitungan_komisi)."</span>";
                            }
                            ?>
                        </div>
                    </td>
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
                    <td>
                        <?= $tgl_input; ?>
                    </td>
                    <td>
                        <?php if ($komisi->tgl_disetujui == 0000-00-00){
                            echo "Belum Approve";
                        }else{
                            echo $tgl_approve;
                        }
                        ?>
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


