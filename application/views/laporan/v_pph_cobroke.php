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
            }else{
                $b = null;
                $t = null;
            }
            ?>

            <h4 class="card-title" style="text-align: center;">Laporan PPH 21 Cobroke</h4>
            <?php if ($b != null) {?>
                <h5><?php echo '<div class="justify-content-center">
                <div class="col-auto text-center">
                <strong><span class= text-warning>Periode '.date("d-m-Y", strtotime($b)).' sampai '.date("d-m-Y", strtotime($t)).'</span></strong> 
                </div>
            </div>'; ?></h5> 
        <?php } ?>
    </div>

    <div class="card-body">
        <div class="pb-3 d-sm-flex justify-content-start">
            <form method="get" action="<?= base_url('laporan/filterDataPphCobroke'); ?>">
                <div class="row g-3 align-items-center justify-content-end">
                  <div class="col-auto">
                    <label class="col-form-label">Periode</label>
                </div>
                <div class="col-auto p-0">
                    <input type="date" class="form-control" name="dari" >
                </div>
                <div class="col-auto">
                    -
                </div>
                <div class="col-auto p-0">
                    <input type="date" class="form-control" name="ke">
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
                    <th>ID Komisi</th>
                    <th>Tanggal Closing</th>
                    <th>Alamat Properti</th>
                    <th>Status Properti</th>
                    <th>Nama Cobroke</th>
                    <th>Fee Cobroke</th>
                    <th>PPH 21</th>
                    <th>PPH 23</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $sum_fee_cobroke = 0;
                $sum_pph_21 = 0;
                $sum_pph_23 = 0;

                $total_fee_cobroke = 0;
                $total_pph_21 = 0;
                $total_pph_23 = 0;

                foreach ($tampil_pph as $pph) {
                    $tgl_closing = date("d-m-Y", strtotime($pph->tgl_closing_komisi));

                    if ($pph->jenis_cobroke != 2 || $pph->jenis_cobroke != 0) {
                       $j_pph = 21;
                   }else{
                    $j_pph = 23;
                }

                $total_fee_cobroke = $sum_fee_cobroke += $pph->fee_cobroke;

                if ($pph->jenis_cobroke != 2 && $pph->jenis_cobroke != 0) {
                    $total_pph_21 = $sum_pph_21 += $pph->pph_cobroke;      
                }

                if ($pph->jenis_cobroke != 2.5 && $pph->jenis_cobroke != 3) {
                    $total_pph_23 = $sum_pph_23 += $pph->pph_cobroke;    
                }   
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $pph->id_komisi ?></td>
                    <td><?= $tgl_closing ?></td>
                    <td><?= $pph->alamat_komisi ?></td>
                    <td><?= $pph->jt_komisi ?></td>
                    <td><?= $pph->nama_cobroke ?></td>
                    <td><?= numberToRupiah($pph->fee_cobroke) ?></td>
                    <td>
                        <?php 
                        if ($pph->jenis_cobroke == 2.5 || $pph->jenis_cobroke == 3) {
                            echo numberToRupiah($pph->pph_cobroke);
                        }else{
                            echo '';
                        }
                        ?>
                    </td>
                    <td>
                        <?php 
                        if ($pph->jenis_cobroke == 0 || $pph->jenis_cobroke == 2) {
                            echo numberToRupiah($pph->pph_cobroke);
                        }else{
                            echo '';
                        }
                        ?>
                    </td>
                </tbody>
                <?php $no++; } ?>
                <tfoot>
                    <tr>
                        <th>Total</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><?= numberToRupiah($total_fee_cobroke) ?></th>
                        <th><?= numberToRupiah($total_pph_21) ?></th>
                        <th><?= numberToRupiah($total_pph_23) ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</div>
</body>


