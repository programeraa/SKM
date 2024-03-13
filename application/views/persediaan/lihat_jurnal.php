<div class="modal fade" id="lihat_jurnal<?php echo $jurnal->id_jurnal; ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lihat Data Jurnal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_jurnal" class="col-form-label">Kode Jurnal</label>
                                <input type="text" class="form-control" id="kode_jurnal" name="kode_jurnal" value="<?= $jurnal->kode_jurnal ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kode_barang" class="col-form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?= $nama_barang ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_barang" class="col-form-label">Jumlah Barang</label>
                                <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?= $jurnal->kuantitas_jurnal ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $jurnal->keterangan_jurnal ?>" required readonly>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="tgl_input" class="col-form-label">Tanggal Input</label>
                                <input type="date" class="form-control" id="tgl_input" name="tgl_input" required value="<?= $jurnal->tgl_input_jurnal ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="harga_satuan" class="col-form-label">Harga Satuan</label>
                                <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" value="<?= numberToRupiah2($jurnal->harga_satuan_jurnal) ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="total_nominal" class="col-form-label">Total Nominal</label>
                                <input type="text" class="form-control" id="total_nominal" name="total_nominal" value="<?= numberToRupiah2($jurnal->nominal_jurnal) ?>" required readonly>
                            </div>
                            
                            <div class="form-group">
                                <label for="j_jurnal" class="col-form-label">Jenis Jurnal</label>
                                <input type="text" class="form-control" id="j_jurnal" name="j_jurnal" value="<?= $jurnal->jenis_jurnal ?>" required readonly>
                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                            <label for="admin_input" class="col-form-label">Admin Input</label>
                            <input type="text" class="form-control" id="admin_input" name="admin_input" value="<?= $nama_admin ?>" required readonly>
                        </div>

                    <input type="hidden" class="form-control" id="id_jurnal" name="id_jurnal" value="<?php echo $jurnal->id_jurnal ?>" required>

                    <div class="modal-footer pr-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

