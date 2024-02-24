 <div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">

        <div class="text-right">
            <?php if(isset($_GET['from'])){ ?>
                <a href="<?= base_url('jurnal/tambah_jurnal_lanjutan/'.$_GET['from']);?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
            <?php }else{ ?>
                <a href="<?= base_url('Jurnal'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
            <?php } ?>
        </div>

        <!-- <div class="text-right">
            <a href="<?= base_url('Jurnal'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
        </div> -->

        <div class="text-right">
        </div>
    </div>

    <div class="card">
        <?php

        foreach ($jurnal_umum as $jurnal) { ?>
            <div class="card-header bg-dark text-white">
                <h4 class="card-title" style="text-align: left;">Edit Data Jurnal</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('Jurnal/update_jurnal'); ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_input" class="col-form-label">Tanggal Input</label>
                                <input type="date" class="form-control" id="tgl_input" name="tgl_input" value="<?= $jurnal->tgl_input_jurnal ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_jurnal" class="col-form-label">Kode Jurnal</label>
                                <input type="text" class="form-control" value="<?= $jurnal->kode_jurnal ?>" required readonly>
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
                                        <option value="<?php echo $each->id_bttb; ?>"
                                            <?=$jurnal->id_bttb==$each->id_bttb ? "selected" : null ?>>
                                            <?= $each->kode_perkiraan; ?><?= $each->nomor_perkiraan ?> - <?= $each->keterangan; ?> 
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keterangan" class="col-form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $jurnal->keterangan_jurnal ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tampil_nominal" class="col-form-label">Nominal</label>

                                <input type="text" class="form-control" name="tampil_nominal" id="tampil_nominal" value="<?= $jurnal->nominal_jurnal ?>" onkeyup="formatRupiah2(this, 'nominal')">

                                <input type="hidden" class="form-control" id="nominal" name="nominal" value="<?= $jurnal->nominal_jurnal ?>">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="j_jurnal" class="col-form-label">Jenis Jurnal</label>
                                <select class="form-control" id="j_jurnal" name="j_jurnal">
                                    <option value="">Pilih Jenis Jurnal</option>
                                    <?php 

                                    if ($jurnal->jenis_jurnal == "Debit") echo "<option value='Debit' selected>Debit</option>";
                                    else echo "<option value='Debit'>Debit</option>";

                                    if ($jurnal->jenis_jurnal == "Kredit") echo "<option value='Kredit' selected>Kredit</option>";
                                    else echo "<option value='Kredit'>Kredit</option>";

                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id_jurnal" value="<?= $jurnal->id_jurnal ?>">

                    <?php if(isset($_GET['from'])){ ?>
                        <input type="hidden" name="kode_jurnal" value="<?= $_GET['from'] ?>">
                    <?php } ?>

                    <div class="modal-footer pr-0">
                        <button type="submit" name="submit_type" value="<?= $jurnal->kode_jurnal ?>" class="btn btn-success">Submit & Edit</button>
                        <button type="submit" name="submit_type" value="null" class="btn btn-primary">Submit & Keluar</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table id="myTable" class="myTable table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Kode Perkiraan</th>
                                <th>Keterangan</th>
                                <th>Nominal</th>
                                <th>Jenis Jurnal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $id_jurnal_saat_ini = $jurnal->id_jurnal;

                            foreach ($jurnal_umum_2 as $jurnal) {
                                $kode_jurnal = $jurnal->kode_jurnal;
                                ?>
                                <tr>
                                    <td>
                                        <!-- <a href="<?= base_url('jurnal/edit_jurnal/' . $jurnal->id_jurnal.'?from='.$kode_jurnal); ?>" class="btn btn-success btn-sm" data-target="#editModal"><i class="fas fa-edit" title="Edit Jurnal"></i></a> -->

                                        <a href="<?= base_url('jurnal/edit_jurnal/' . $jurnal->id_jurnal.'?Kojur='.$jurnal->kode_jurnal); ?>" class="btn btn-success btn-sm" data-target="#editModal"><i class="fas fa-edit" title="Edit Jurnal"></i></a>

                                        <!-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_jurnal_lanjutan<?php echo $jurnal->id_jurnal; ?>" data-whatever="@getbootstrap" ><i class="fas fa-edit" title="Edit Jurnal"></i></button>-->

                                        <?php //include "edit_jurnal_lanjutan.php"; ?> 

                                        <a href="<?= base_url('jurnal/hapus_jurnal/' . $jurnal->id_jurnal.'?ID='.$id_jurnal_saat_ini.'&Kojur='.$jurnal->kode_jurnal); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data jurnal ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash" title="Hapus"></i></a>

                                        </td>
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
             <div class="d-flex justify-content-end pt-3">
                 <a href="<?= base_url('Jurnal/tambah_jurnal_lanjutan/'.$jurnal->kode_jurnal); ?>"><button class="btn btn-secondary">Tambah Data Baru</button></a>
             </div>
             <div>
             </div>
         </div>

     </div>
 </div>
<?php } ?>
</div>
</div>
</div>
</body>