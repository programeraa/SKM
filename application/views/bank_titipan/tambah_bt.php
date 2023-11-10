 <!--   Modal Tambah Data-->
 <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bank Titipan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('BankTitipan/tambah'); ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_perkiraan" class="col-form-label">Kode Perkiraan</label>
                                <input type="text" class="form-control" id="kode_perkiraan" name="kode_perkiraan">
                            </div>
                            <div class="form-group">
                                <label for="nama_properti" class="col-form-label">Properti</label>
                                <input type="text" class="form-control" id="nama_properti" name="nama_properti" required>
                            </div>
                            <div class="form-group">
                                <label for="jt" class="col-form-label">Jenis Transaksi</label>
                                <select class="form-control" id="jt" name="jt">
                                    <option value="">Pilih Jenis Transaksi</option>
                                    <option value="Jual">Jual</option>
                                    <option value="Sewa">Sewa</option>
                                    <option value="Jual/Sewa">Jual / Sewa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_input" class="col-form-label">Tanggal Input</label>
                                <input type="date" class="form-control" id="tgl_input" name="tgl_input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_marketing" class="col-form-label">Marketing</label>
                                <select class="form-control select2bs4" id="nama_marketing" name="nama_marketing">
                                    <option value="">Pilih Nama</option>
                                    <?php 
                                    foreach($marketing as $each){ ?>
                                        <option value="<?php echo $each->id_mar; ?>">
                                            <?php echo $each->nama_mar; ?> (<?php echo $each->nomor_mar; ?>)
                                        </option>;
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nominal" class="col-form-label">Nilai Nominal</label>

                                <input type="text" class="form-control" name="tampil_nominal" id="tampil_nominal" onkeyup="formatRupiah(this, 'nominal')">

                                <input type="hidden" id="nominal" name="nominal">
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pr-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
