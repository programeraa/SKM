<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <?php require __DIR__ . '/../v_navigasi2.php'; ?>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
        </div>
    </div>

    <?php include "tambah_bttb.php" ?>

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
            <h4 class="card-title" style="text-align: center;">Master Akun</h4>
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
                <select class="form-control select2bs4" id="j_kode" name="j_kode">
                    <option value="">Pilih Jenis Kode Perkiraan</option>
                    <?php 
                    $kode_perkiraan_values = array_unique(array_column($jurnal_bttb2, 'kode_perkiraan'));
                    foreach($kode_perkiraan_values as $kode_perkiraan) { 
                        ?>
                        <option value="<?= $kode_perkiraan; ?>">
                            <?= $kode_perkiraan; ?>
                        </option>
                    <?php } ?>
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
                <th>Tgl Input</th>
                <th>Kode Perkiraan</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($jurnal_bttb as $jurnal) { 
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= date("d-m-Y", strtotime($jurnal->tgl_input))?></td>
                    <td>
                        <?php 
                        if (strpos($jurnal->kode_perkiraan, 'BT') !== false) {
                            echo "<span class='badge badge-primary p-2'>".$jurnal->kode_perkiraan.'-'.$jurnal->nomor_perkiraan."</span>";
                        }else{
                            echo "<span class='badge badge-success p-2'>".$jurnal->kode_perkiraan.'-'.$jurnal->nomor_perkiraan."</span>";
                        }?>
                    </td>
                    <td><?= $jurnal->keterangan ?></td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#edit_bttb<?php echo $jurnal->id_bttb; ?>" class="btn btn-primary"><i class="fas fa-edit" title="Edit"></i></a>

                        <?php include "edit_bttb.php" ?>

                        <a href="<?= base_url('jurnal/hapus_bttb/' . $jurnal->id_bttb); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data BT / TB?')" class="btn btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
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
