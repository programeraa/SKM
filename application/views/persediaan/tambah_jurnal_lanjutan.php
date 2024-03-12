<?php include __DIR__ . '/../session_identitas.php'; ?>
<div class="container pt-5 pb-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <a href="<?= base_url('Persediaan'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
        </div>
        <div class="text-right">
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title" style="text-align: left;">Tambah Data Jurnal</h4>
        </div>

        <div class="card-body">
            <form method="post" action="<?= base_url('Persediaan/input_jurnal'); ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_input" class="col-form-label">Tanggal Input</label>
                            <input type="date" class="form-control" id="tgl_input" name="tgl_input" required>
                        </div>
                    </div>
                    <?php 
                    $jumlah_data_per_kode_jurnal = array();

                    foreach ($jurnal_persediaan as $jurnal) {
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_barang" class="col-form-label">Kode Barang</label>
                                    <select class="form-control select2bs4" id="kode_barang" name="kode_barang" onchange="changeValue(this.value)">
                                        <option value="">Pilih Kode Barang</option>
                                        <?php 
                                        $jsArray = "var prdName = new Array();\n";

                                        foreach($master_persediaan as $each){ ?>
                                            <option value="<?= $each->id_persediaan; ?>">
                                                <?= $each->kode_persediaan; ?> - <?= $each->nama_persediaan; ?>
                                            </option>

                                            <?php 
                                            $jsArray .= "prdName['" . $each->id_persediaan . "'] = {
                                                harga_satuan:'" . addslashes($each->harga_persediaan) ."',
                                                stok_barang:'" . addslashes($each->stok_persediaan) ."'
                                            };\n";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="harga_satuan" class="col-form-label">Harga Satuan</label>
                                    <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" required readonly>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="stok_barang" class="col-form-label">Stok</label>
                                    <input type="text" class="form-control" id="stok_barang" name="stok_barang" required readonly>
                                </div>
                            </div>

                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah_barang" class="col-form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="keterangan" class="col-form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
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
                    <button type="submit" onclick="return confirm('Apakah data sudah benar ?, bila data disimpan maka akan otomatis merubah stok barang')" class="btn btn-primary">Submit</button>
                </div>
            </form>

            <div class="table-responsive">
                <table id="myTable" class="myTable table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Aksi</th>
                            <th>Tgl Jurnal</th>
                            <th>Kode Barang</th>
                            <th>Keterangan</th>
                            <th>Jumlah Barang</th>
                            <th>Nominal</th>
                            <th>Jenis Jurnal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($jurnal_persediaan as $jurnal) {
                            $kode_jurnal = $jurnal->kode_jurnal;

                            foreach ($master_persediaan as $master) {
                                if ($master->id_persediaan == $jurnal->id_barang) {
                                    $nama_barang = $master->nama_persediaan;
                                }
                            }
                            ?>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_jurnal_lanjutan<?php echo $jurnal->id_jurnal; ?>" data-whatever="@getbootstrap" ><i class="fas fa-edit" title="Edit Jurnal"></i></button>

                                    <?php include "edit_jurnal_lanjutan.php"; ?>

                                    <a href="<?= base_url('persediaan/hapus_jurnal/' . $jurnal->id_jurnal.'?from='.$kode_jurnal.'&JKJ='.$jumlah_kode_jurnal); ?>" onclick="javascript:return confirm('Apakah Anda yakin ingin menghapus data jurnal ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash" title="Hapus"></i></a>
                                </td>
                                <td><?= date("d-m-Y", strtotime($jurnal->tgl_input_jurnal)) ?></td>
                                <td>
                                    <?= $nama_barang ?>
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
           <div>
           </div>
       </div>
   </div>
</div>
</div>
</body>

<script type="text/javascript"> 
    <?php echo $jsArray; ?>
    function changeValue(id){
        document.getElementById('harga_satuan').value = prdName[id].harga_satuan;
        document.getElementById('stok_barang').value = prdName[id].stok_barang;
    };
</script>
