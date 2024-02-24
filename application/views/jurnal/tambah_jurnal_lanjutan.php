<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <a href="<?= base_url('Jurnal'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
        </div>
        <div class="text-right">
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title" style="text-align: left;">Tambah Data Jurnal</h4>
        </div>

        <div class="card-body">
            <form method="post" action="<?= base_url('Jurnal/input_jurnal'); ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_input" class="col-form-label">Tanggal Input</label>
                            <input type="date" class="form-control" id="tgl_input" name="tgl_input" required>
                        </div>
                    </div>
                    <?php 
                    $jumlah_data_per_kode_jurnal = array();

                    foreach ($jurnal_umum as $jurnal) {
                        $kode_jurnal = $jurnal->kode_jurnal; 

                        if (!isset($jumlah_data_per_kode_jurnal[$kode_jurnal])) {
                            $jumlah_data_per_kode_jurnal[$kode_jurnal] = 1;
                        } else {
                            $jumlah_data_per_kode_jurnal[$kode_jurnal]++;
                        }
                    }

                    foreach ($jumlah_data_per_kode_jurnal as $kode_jurnal => $jumlah_data) {
                        $jumlah_kode_jurnal = $jumlah_data;
                    }
                    ?>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_jurnal" class="col-form-label">Kode Jurnal</label>
                            <input type="text" class="form-control" id="kode_jurnal" name="kode_jurnal" value="<?= $kode_jurnal ?>" required readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_perkiraan" class="col-form-label">Kode Perkiraaan</label>
                            <select class="form-control select2bs4" id="kode_perkiraan" name="kode_perkiraan">
                                <option value="">Pilih Kode Perkiraan</option>
                                <?php 
                                foreach($jurnal_bttb as $each){ ?>
                                    <option value="<?php echo $each->id_bttb; ?>">
                                        <?= $each->kode_perkiraan; ?> - <?= $each->keterangan; ?> 
                                    </option>;
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="keterangan" class="col-form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tampil_nominal" class="col-form-label">Nominal</label>
                            <input type="text" class="form-control" name="tampil_nominal" id="tampil_nominal" onkeyup="formatRupiah2(this, 'nominal')">
                            <input type="hidden" class="form-control" id="nominal" name="nominal">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="j_jurnal" class="col-form-label">Jenis Jurnal</label>
                            <select class="form-control" id="j_jurnal" name="j_jurnal" required>
                                <option value="">Pilih Jenis Jurnal</option>
                                <option value="Debit">Debit</option>
                                <option value="Kredit">Kredit</option>
                            </select>
                        </div>
                    </div>
                </div>

                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id ?>" required>
                <div class="modal-footer pr-0">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            <div class="table-responsive">
                <table id="myTable" class="myTable table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Aksi</th>
                            <th>Tgl Input</th>
                            <th>Kode Perkiraan</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                            <th>Jenis Jurnal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($jurnal_umum as $jurnal) {
                            $kode_jurnal = $jurnal->kode_jurnal;
                            ?>
                            <tr>
                                <td>
                                    <!-- <a href="<?= base_url('jurnal/edit_jurnal/' . $jurnal->id_jurnal.'?from='.$kode_jurnal); ?>" class="btn btn-success btn-sm" data-target="#editModal"><i class="fas fa-edit" title="Edit Jurnal"></i></a> -->

                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_jurnal_lanjutan<?php echo $jurnal->id_jurnal; ?>" data-whatever="@getbootstrap" ><i class="fas fa-edit" title="Edit Jurnal"></i></button>

                                    <?php include "edit_jurnal_lanjutan.php"; ?>

                                    <a href="<?= base_url('jurnal/hapus_jurnal/' . $jurnal->id_jurnal.'?from='.$kode_jurnal.'&JKJ='.$jumlah_kode_jurnal); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data jurnal ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash" title="Hapus"></i></a>
                                </td>
                                <td><?= date("d-m-Y", strtotime($jurnal->tgl_input_jurnal)) ?></td>
                                <td>
                                    <?php
                                    if ($jurnal->kode_perkiraan == '') {
                                     echo '';
                                 }elseif ($jurnal->id_bttb == 10 || $jurnal->id_bttb == 175 || $jurnal->id_bttb == 182 || $jurnal->id_bttb == 184 || $jurnal->id_bttb == 189) {
                                    echo "<span class='badge badge-primary p-2'>".$jurnal->kode_perkiraan.$jurnal->nomor_perkiraan." - ".$jurnal->keterangan."</span>";
                                }else{
                                    echo "<span class='badge badge-success p-2'>".$jurnal->kode_perkiraan.$jurnal->nomor_perkiraan." - ".$jurnal->keterangan."</span>"; 
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if (strpos($jurnal->keterangan_jurnal, 'Saldo Awal') !== false) {
                                    echo "<span class='badge badge-success p-2'>" . $jurnal->keterangan_jurnal . "</span>";
                                }else{
                                   echo $jurnal->keterangan_jurnal;
                               }
                               ?>
                           </td>
                           <td><?= numberToRupiah2($jurnal->nominal_jurnal); ?></td>
                           <td><?php 
                           if ($jurnal->jenis_jurnal == "Debit") {
                            echo "<span class='badge badge-primary p-2'>" . $jurnal->jenis_jurnal . "</span>";
                        }else{
                         echo "<span class='badge badge-success p-2'>" . $jurnal->jenis_jurnal . "</span>"; 
                     } ?></td>
                 </tr>
                 <?php
             } ?>
         </tbody>
         <tfoot>

         </tfoot>
     </table>
     <div>
     </div>
 </div>
</div>
</div>
</div>
</body>


<!--   Modal Tambah Data-->
 <!-- <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jurnal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('Jurnal/tambah_jurnal'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tgl_input" class="col-form-label">Tanggal Input</label>
                        <input type="date" class="form-control" id="tgl_input" name="tgl_input" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_perkiraan" class="col-form-label">Kode Perkiraaan</label>
                        <select class="form-control select2bs4" id="kode_perkiraan" name="kode_perkiraan">
                            <option value="">Pilih Kode Perkiraan</option>
                            <?php 
                            foreach($jurnal_bttb as $each){ ?>
                                <option value="<?php echo $each->id_bttb; ?>">
                                    <?= $each->kode_perkiraan; ?> - <?= $each->keterangan; ?> 
                                </option>;
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                    </div>
                    <div class="form-group">
                        <label for="tampil_nominal" class="col-form-label">Nominal</label>

                        <input type="text" class="form-control" name="tampil_nominal" id="tampil_nominal" onkeyup="formatRupiah2(this, 'nominal')">
                        <input type="hidden" class="form-control" id="nominal" name="nominal">

                    </div>
                    <div class="form-group">
                        <label for="j_jurnal" class="col-form-label">Jenis Jurnal</label>
                        <select class="form-control" id="j_jurnal" name="j_jurnal" required>
                            <option value="">Pilih Jenis Jurnal</option>
                            <option value="Debit">Debit</option>
                            <option value="Kredit">Kredit</option>
                        </select>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id ?>" required>
                    <div class="modal-footer pr-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
