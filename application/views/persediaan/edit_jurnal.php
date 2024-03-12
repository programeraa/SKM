 <div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">

        <div class="text-right">
            <?php if(isset($_GET['from'])){ ?>
                <a href="<?= base_url('persediaan/tambah_jurnal_lanjutan/'.$_GET['from']);?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
            <?php }else{ ?>
                <a href="<?= base_url('persediaan'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
            <?php } ?>
        </div>

        <div class="text-right">
        </div>
    </div>

    <div class="card">
        <?php
        foreach ($jurnal_persediaan as $jurnal) { 
            foreach ($master_persediaan as $master) {
                if ($jurnal->id_barang == $master->id_persediaan) {
                    $kode_barang = $master->kode_persediaan;
                    $nama_barang = $master->nama_persediaan;
                }
            }?>
            <div class="card-header bg-dark text-white">
                <h4 class="card-title" style="text-align: left;">Edit Data Jurnal</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('persediaan/update_jurnal'); ?>" enctype="multipart/form-data">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kode_barang" class="col-form-label">Kode Barang</label>
                                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?= $kode_barang .' - ' . $nama_barang ?>" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="harga_satuan" class="col-form-label">Harga Satuan</label>
                                        <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" value="<?= numberToRupiah2($jurnal->harga_satuan_jurnal) ?>" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jumlah_barang" class="col-form-label">Jumlah Barang</label>
                                        <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?= $jurnal->kuantitas_jurnal ?>" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="total_harga" class="col-form-label">Total Harga</label>
                                        <input type="text" class="form-control" id="total_harga" name="total_harga" value="<?= numberToRupiah2($jurnal->nominal_jurnal) ?>" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keterangan" class="col-form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $jurnal->keterangan_jurnal ?>" required>
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
                                <th>Kode Barang</th>
                                <th>Keterangan</th>
                                <th>Jumlah Barang</th>
                                <th>Nominal</th>
                                <th>Jenis Jurnal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $id_jurnal_saat_ini = $jurnal->id_jurnal;

                            foreach ($jurnal_persediaan2 as $jurnal) {
                                $kode_jurnal = $jurnal->kode_jurnal;
                                ?>
                                <tr>
                                    <td>
                                        <!-- <a href="<?= base_url('jurnal/edit_jurnal/' . $jurnal->id_jurnal.'?from='.$kode_jurnal); ?>" class="btn btn-success btn-sm" data-target="#editModal"><i class="fas fa-edit" title="Edit Jurnal"></i></a> -->

                                        <a href="<?= base_url('persediaan/edit_jurnal/' . $jurnal->id_jurnal.'?Kojur='.$jurnal->kode_jurnal); ?>" class="btn btn-success btn-sm" data-target="#editModal"><i class="fas fa-edit" title="Edit Jurnal"></i></a>

                                        <!-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_jurnal_lanjutan<?php echo $jurnal->id_jurnal; ?>" data-whatever="@getbootstrap" ><i class="fas fa-edit" title="Edit Jurnal"></i></button>-->

                                        <?php //include "edit_jurnal_lanjutan.php"; ?> 

                                        <a href="<?= base_url('persediaan/hapus_jurnal/' . $jurnal->id_jurnal.'?ID='.$id_jurnal_saat_ini.'&Kojur='.$jurnal->kode_jurnal); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data jurnal ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash" title="Hapus"></i></a>

                                    </td>
                                    <td>
                                        <?= $kode_barang .' - ' . $nama_barang ?>
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
                             <td><?= $jurnal->kuantitas_jurnal ?></td>
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
               <a href="<?= base_url('persediaan/tambah_jurnal_lanjutan/'.$jurnal->kode_jurnal); ?>"><button class="btn btn-secondary">Tambah Data Baru</button></a>
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