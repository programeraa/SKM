<?php include 'session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <?php require 'v_navigasi2.php'; ?>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
        </div>
    </div>

    <?php include "jurnal/tambah_jurnal.php" ?>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <?php 
            $k = null;
            if(isset($_GET['dari']) && isset($_GET['ke'])){
                $b = $_GET['dari'];
                $t = $_GET['ke'];
            }else{
                $b = null;
                $t = null;
            }
            ?>
            <h4 class="card-title" style="text-align: center;">Jurnal Umum</h4>
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
            <form method="get" action="<?= base_url('jurnal/filterJurnal'); ?>">
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
            <!-- <div class="col-auto pr-0">
                <select class="form-control select2bs4" id="kode_per" name="kode_per">
                    <option value="">Pilih Kode Perkiraan</option>
                    <?php 
                    foreach($jurnal_bttb as $each){ ?>
                        <option value="<?php echo $each->id_bttb; ?>">
                            <?= $each->kode_perkiraan; ?> - <?= $each->keterangan; ?> 
                        </option>;
                    <?php } ?>
                </select>
            </div>
            <div class="col-auto pr-0">
                <select class="form-control" id="j_kode" name="j_kode">
                    <option value="">Pilih Jenis Kode Perkiraan</option>
                    <option value="BT">BT</option>
                    <option value="TB">TB</option>
                </select>
            </div> -->
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
            <?php 
            $no = 1;
            $saldo_akhir = 0;
            $sum_saldo = 0;
            $sum_kredit = 0;
            $sum_saldo_akhir = 0;

            $total_saldo = 0;
            $total_kredit = 0;
            $total_saldo_akhir = 0;

            $tanggal_jurnal = []; 

            foreach ($jurnal_umum as $jurnal) { 

                $cell_content = '';

                if (!in_array($jurnal->tgl_input_jurnal, $tanggal_jurnal)) {
                    $cell_content = $jurnal->tgl_input_jurnal;
                    $tanggal_jurnal[] = $jurnal->tgl_input_jurnal; 
                }

                $tgl_input_jurnal = ($cell_content !== '') ? date("d-m-Y", strtotime($cell_content)) : '';

                if ($jurnal->jenis_jurnal == 'Debit') {
                    $saldo_akhir += $jurnal->nominal_jurnal;
                    $total_saldo = $sum_saldo += $jurnal->nominal_jurnal;
                } else {
                    $saldo_akhir -= $jurnal->nominal_jurnal;
                    $total_kredit = $sum_kredit += $jurnal->nominal_jurnal;
                }

                $total_saldo_akhir = $sum_saldo_akhir += $saldo_akhir;

                ?>
                <tr>
                    <td>
                        <a href="<?= base_url('jurnal/edit_jurnal/' . $jurnal->id_jurnal); ?>" class="btn btn-success btn-sm" data-target="#editModal"><i class="fas fa-edit" title="Edit Jurnal"></i></a>

                        <a href="<?= base_url('jurnal/hapus_jurnal/' . $jurnal->id_jurnal); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data jurnal ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash" title="Hapus"></i></a>
                    </td>
                    <td><?= $tgl_input_jurnal ?></td>
                    <td>
                        <?php 
                        if (strpos($jurnal->kode_perkiraan, 'BT') !== false) {
                            echo "<span class='badge badge-primary p-2'>".$jurnal->kode_perkiraan." - ".$jurnal->keterangan."</span>";
                        }else{
                            echo "<span class='badge badge-success p-2'>".$jurnal->kode_perkiraan." - ".$jurnal->keterangan."</span>"; 

                            // if (!isset($editLinkDisplayed[$jurnal->tgl_input_jurnal])) {
                            //     echo '<a href="' . base_url('jurnal/filterJurnal/?kode=' . $jurnal->kode_perkiraan . '&tgl=' . $jurnal->tgl_input_jurnal.'&ket=' . $jurnal->keterangan) . '" class="btn btn-warning btn-sm ml-2" data-target="#editModal"><i class="fas fa-list" title="Rincian Jurnal"></i></a>';

                            //     // Tandai bahwa link untuk kode perkiraan ini sudah ditampilkan
                            //     $editLinkDisplayed[$jurnal->tgl_input_jurnal] = true;
                            // }

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
                    <td>
                        <?php
                        if ($saldo_akhir != 0 && $jurnal->jenis_jurnal == 'Kredit') {
                            echo "<span class='badge badge-danger p-2'>" . numberToRupiah($saldo_akhir) . "</span>";
                        } else {
                            echo numberToRupiah($saldo_akhir);
                        }
                        ?>
                    </td>

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
                <th><?= numberToRupiah($total_saldo) ?></th>
                <th><?= numberToRupiah($total_kredit) ?></th>
                <th><!-- <?php
                if ($saldo_akhir != 0) {
                    echo "<span class='badge badge-danger p-2'>" . numberToRupiah($saldo_akhir) . "</span>";
                } else {
                    echo numberToRupiah($saldo_akhir);
                }
            ?> -->
        </th>
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
