<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <a href="<?= base_url('Komisi/komisi'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
        </div>
    </div>

    <?php include "jurnal/tambah_jurnal.php" ?>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <?php 
            if(isset($_GET['dari']) && isset($_GET['ke']) || isset($_GET['j_kode'])){
                $b = $_GET['dari'];
                $t = $_GET['ke'];
                $j_kode = $_GET['j_kode'];
            }else{
                $b = null;
                $t = null;
                $j_kode = null;
            }
            ?>
            <h4 class="card-title" style="text-align: center;">Jurnal Umum</h4>
            <?php if ($b != null && $j_kode != null){ ?>
                <h5><?php echo '<div class="justify-content-center">
                <div class="col-auto text-center">
                <strong><span class= text-warning>Periode '.date("d-m-Y", strtotime($b)).' sampai '.date("d-m-Y", strtotime($t)).'</span></strong> 
                </div>

                <div class="col-auto text-center">
                <strong><span class= text-warning>Jenis Kode Perkiraan ('.$j_kode.')</span></strong> 
                </div>
            </div>'; ?></h5> 
        <?php }elseif($b != null && $j_kode == null){ ?>
            <h5><?php echo '<div class="justify-content-center">
            <div class="col-auto text-center">
            <strong><span class= text-warning>Periode '.date("d-m-Y", strtotime($b)).' sampai '.date("d-m-Y", strtotime($t)).'</span></strong> 
            </div>
        </div>'; ?></h5> 
    <?php }elseif($b == null && $j_kode != null){ ?>
        <h5><?php echo '<div class="justify-content-center">
        <div class="col-auto text-center">
        <strong><span class= text-warning>Jenis Kode Perkiraan ('.$j_kode.')</span></strong> 
        </div>
    </div>'; ?></h5> 
<?php } ?>
</div>
<div class="card-body">
    <div class="pb-3 d-sm-flex justify-content-start">
        <form method="get" action="<?= base_url('jurnal/filterBtTb'); ?>">
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
            <div class="col-auto pr-0">
                <select class="form-control" id="j_kode" name="j_kode">
                    <option value="">Pilih Jenis Kode Perkiraan</option>
                    <option value="BT">BT</option>
                    <option value="TB">TB</option>
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
                <th>Aksi</th>
                <th>Tgl Input</th>
                <th>Kode Perkiraan</th>
                <th>Keterangan</th>
                <th>Saldo</th>
                <th>Kredit</th>
                <th>Saldo Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            $id_komisi_values = []; 

            foreach ($jurnal_umum as $jurnal) { 

                $cell_content = '';

                if (!in_array($jurnal->tgl_input_jurnal, $id_komisi_values)) {
                    $cell_content = $jurnal->tgl_input_jurnal;
                    $id_komisi_values[] = $jurnal->tgl_input_jurnal; 
                }

                $tgl_input_jurnal = ($cell_content !== '') ? date("d-m-Y", strtotime($cell_content)) : '';

                ?>
                <tr>
                    <td>
                        <a href="<?= base_url('jurnal/edit_jurnal/' . $jurnal->id_jurnal); ?>" class="btn btn-success btn-sm" data-target="#editModal"><i class="fas fa-edit" title="Edit Jurnal"></i></a>

                        <!-- <a href="#" data-toggle="modal" data-target="#edit_jurnal<?php echo $jurnal->id_jurnal; ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit" title="Edit"></i></a> -->

                        <a href="<?= base_url('jurnal/hapus_jurnal/' . $jurnal->id_jurnal); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data jurnal ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash" title="Hapus"></i></a>
                    </td>
                    <td><?= $tgl_input_jurnal ?></td>
                    <td>
                        <?php 
                        if (strpos($jurnal->kode_perkiraan, 'BT') !== false) {
                            echo "<span class='badge badge-primary p-2'>".$jurnal->kode_perkiraan." - ".$jurnal->keterangan."</span>";
                        }else{
                            echo "<span class='badge badge-success p-2'>".$jurnal->kode_perkiraan." - ".$jurnal->keterangan."</span>";
                        }?>
                    </td>
                    <td><?= $jurnal->keterangan_jurnal ?></td>
                    <td>
                        <?php
                        if ($jurnal->jenis_jurnal == 'Debit') {
                            echo numberToRupiah($jurnal->nominal_jurnal);
                        }else{
                            echo '';
                        }
                        ?> 
                    </td>
                    <td>
                        <?php
                        if ($jurnal->jenis_jurnal == 'Kredit') {
                            echo numberToRupiah($jurnal->nominal_jurnal);
                        }else{
                            echo '';
                        }
                        ?> 
                    </td>
                    <td></td>
                </tr>
                <?php $no++;
            } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Total</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
