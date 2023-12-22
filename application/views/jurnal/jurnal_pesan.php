<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <?php require __DIR__ . '/../v_navigasi2.php'; ?>
        </div>
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
            <h4 class="card-title" style="text-align: center;">Request Buka Jurnal</h4>
            <?php if ($b != null){ ?>
                <h5>
                  <?php 
                  echo '<div class="justify-content-center">
                  <div class="col-auto text-center">
                  <strong><span class="text-warning">Periode '.date("d-m-Y", strtotime($b)).' sampai '.date("d-m-Y", strtotime($t)).'</span></strong> 
                  </div>';
                  ?>
              </h5>
          <?php } ?>
      </div>
      <div class="card-body">
        <div class="pb-3 d-sm-flex justify-content-start">
            <form method="get" action="<?= base_url('jurnal/filterPesan'); ?>">
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
                    <th>Tgl Input</th>
                    <th>Pesan</th>
                    <th>Admin Request</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($jurnal_pesan as $pesan) { 
                    foreach ($tampil_pengguna as $pengguna) {
                        if ($pengguna->id_pengguna == $pesan->admin_input) {
                            $admin = $pengguna->nama_pengguna;
                            break;
                        }
                    }

                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= date("d-m-Y", strtotime($pesan->tgl_input_pesan))?></td>
                        <td><?= $pesan->pesan ?></td>
                        <td><?= $admin ?></td>
                        <td><?php if ($pesan->status_pesan == 'Tutup') {?>
                            <a href="<?= base_url('jurnal/hapus_tutup_jurnal_2/' . $pesan->tgl_pesan . '?bulan=' . $pesan->bulan_pesan . '&id=' . $pesan->id_pesan); ?>" 
                               onclick="return confirm('Apakah Anda yakin ingin membuka jurnal?')" 
                               class="btn btn-danger">
                               Buka Jurnal
                           </a>
                       <?php }else{ ?>
                        <?php echo "<span class='badge badge-secondary p-2'>".'Sudah Dibuka'."</span>"; }?>
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
