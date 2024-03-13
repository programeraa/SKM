<!--   Modal Tambah Data-->
<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Persediaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('persediaan/tambah_persediaan'); ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_barang" class="col-form-label">Kode Barang</label>
                                <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
                            </div>

                            <div class="form-group">
                                <label for="harga_satuan" class="col-form-label">Harga Satuan</label>

                                <input type="text" class="form-control" name="harga_satuan" id="harga_satuan" onkeyup="formatRupiah2(this, 'nominal')">
                                <input type="hidden" class="form-control" id="nominal" name="nominal">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_barang" class="col-form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="jumlah_stok" class="col-form-label">Jumlah Stok</label>
                                <input type="text" class="form-control" id="jumlah_stok" name="jumlah_stok" placeholder="Stok Diatur Lewat Jurnal" required readonly>
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