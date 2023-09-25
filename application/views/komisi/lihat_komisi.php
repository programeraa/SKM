<!-- Modal Edit Data -->
<div class="modal fade" id="lihat_komisi<?= $komisi->id_komisi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data Komisi Marketing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action=" ">
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat" class="col-form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $komisi->alamat_komisi ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jt" class="col-form-label">Jenis Transaksi</label>
                            <input type="text" class="form-control" id="jt" name="jt" value="<?= $komisi->jt_komisi ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tgl_closing" class="col-form-label">Tanggal Closing</label>
                            <input type="text" class="form-control" id="tgl_closing" name="tgl_closing" value="<?= $tgl_closing ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="marketing_listing" class="col-form-label">Marketing Listing</label>
                            <input type="text" class="form-control" id="marketing_listing" name="marketing_listing" value="<?= $komisi->nama_mar; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="marketing_selling" class="col-form-label">Marketing Selling</label>
                            <input type="text" class="form-control" id="marketing_selling" name="marketing_selling" value="<?= $komisi->nama_mar2; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="komisi" class="col-form-label">Komisi Bruto</label>
                            <input type="text" class="form-control" id="komisi" name="komisi" value="<?= $bruto_r ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group d-xl-none">
                  <label class="col-sm-15 col-form-label">No Sistem</label>
                  <input type="text" class="form-control" id="id_komisi" name="id_komisi" value="<?php echo $komisi->id_komisi; ?>">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</div>
</div>
</div>
</div>