<!--   Modal Tambah Data-->
<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Komisi Marketing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('komisi/tambah_komisi'); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat" class="col-form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
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
                                <label for="tgl_closing" class="col-form-label">Tanggal Closing</label>
                                <input type="date" class="form-control" id="tgl_closing" name="tgl_closing">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="marketing_listing" class="col-form-label">Marketing Listing</label>
                                <select class="form-control select2bs4" id="marketing_listing2" name="marketing_listing" onchange='changeValue(this.value)'>
                                    <option value="">Pilih Nama</option>
                                    <?php 
                                    $jsArray = "var prdName = new Array();\n";
                                    foreach($marketing as $each){ 
                                        $a = ''; // Inisialisasi $a di sini

                                        ?>
                                        <option value="<?php echo $each->id_mar; ?>">
                                            <?php echo $each->nama_mar; ?>
                                        </option>;
                                        <?php

                                        //ubah teks member menjadi angka
                                        if ($each->member_mar== 'Silver') {
                                            $mm_listing = 50;
                                        }elseif ($each->member_mar == 'Gold Express') {
                                            $mm_listing = 60;
                                        }elseif ($each->member_mar == 'Prime Pro') {
                                            $mm_listing = 70;
                                        }elseif ($each->member_mar == 'Black Jack') {
                                            $mm_listing = 80;
                                        }  

                                        if (!empty($each->gambar_npwp_mar)) {
                                            $npwp_mar = 1;
                                        }else{
                                            $npwp_mar = 0;
                                        }

                                        //tampilkan upline 1 listing
                                        foreach ($marketing as $upline) {
                                            if ($upline->id_mar == $each->upline_emd_mar) {
                                                $a = $upline->gambar_npwp_mar;
                                                break;
                                            }elseif($each->upline_emd_mar == null){
                                                $a = null;
                                                break;
                                            } 
                                        }

                                        //inisialisasi upline 1 listing
                                        if (!empty($a)) {
                                            $npwpum_listing = 1;
                                        } else {
                                            $npwpum_listing = 0;
                                        }

                                        //tampilkan upline 2 listing
                                        foreach ($marketing as $upline2) {
                                            if ($upline2->id_mar == $each->upline_cmo_mar) {
                                                $b = $upline2->gambar_npwp_mar;
                                                break;
                                            }elseif($each->upline_cmo_mar == null){
                                                $b = null;
                                                break;
                                            }
                                        }

                                        //inisialisasi upline 2 listing
                                        if (!empty($b)) {
                                            $npwpum_listing2 = 1;
                                        }elseif($b == null) {
                                            $npwpum_listing2 = 0;
                                        }

                                        $jsArray .= "prdName['" . $each->id_mar . "'] = {
                                            member_mar:'" . addslashes($mm_listing) ."',
                                            npwp_mar:'" . addslashes($npwp_mar) ."',
                                            npwpum_listing:'" . addslashes($npwpum_listing) ."',
                                            npwpum_listing2:'" . addslashes($npwpum_listing2) ."' };\n";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="marketing_selling" class="col-form-label">Marketing Selling</label>
                                    <select class="form-control select2bs4" id="marketing_selling2" name="marketing_selling" onchange='changeValue_s(this.value)'>
                                        <option value="">Pilih Nama</option>
                                        <?php 
                                        $jsArray_s = "var prdName_s = new Array();\n";
                                        foreach($marketing as $each){ ?>
                                            <option value="<?php echo $each->id_mar; ?>">
                                                <?php echo $each->nama_mar; ?>
                                            </option>;
                                            <?php

                                            if ($each->member_mar== 'Silver') {
                                                $mm_selling = 50;
                                            }elseif ($each->member_mar == 'Gold Express') {
                                                $mm_selling = 60;
                                            }elseif ($each->member_mar == 'Prime Pro') {
                                                $mm_selling = 70;
                                            }elseif ($each->member_mar == 'Black Jack') {
                                                $mm_selling = 80;
                                            }  

                                            if (!empty($each->gambar_npwp_mar)) {
                                                $npwp_mar = 1;
                                            }else{
                                                $npwp_mar = 0;
                                            }

                                            //tampilkan upline 1 selling
                                            foreach ($marketing as $upline) {
                                                if ($upline->id_mar == $each->upline_emd_mar) {
                                                    $a = $upline->gambar_npwp_mar;
                                                    break;
                                                }elseif($each->upline_emd_mar == null){
                                                    $a = null;
                                                    break;
                                                }
                                            }

                                            //inisialisasi upline 1 selling
                                            if (!empty($a)) {
                                                $npwpum_selling = 1;
                                            }
                                            else {
                                                $npwpum_selling = 0;
                                            }

                                            //tampilkan upline 2 selling
                                            foreach ($marketing as $upline2) {
                                                if ($upline2->id_mar == $each->upline_cmo_mar) {
                                                    $b = $upline2->gambar_npwp_mar;
                                                    break;
                                                }elseif($each->upline_cmo_mar == null){
                                                    $b = null;
                                                    break;
                                                }
                                            }

                                            //inisialisasi upline 2 listing
                                            if (!empty($b)) {
                                                $npwpum_selling2 = 1;
                                            }elseif($b == null) {
                                                $npwpum_selling2 = 0;
                                            }

                                            $jsArray_s .= "prdName_s['" . $each->id_mar . "'] = {
                                                member_mar:'" . addslashes($mm_selling) ."',
                                                npwp_mar:'" . addslashes($npwp_mar) ."',
                                                npwpum_selling:'" . addslashes($npwpum_selling) ."',
                                                npwpum_selling2:'" . addslashes($npwpum_selling2) ."' };\n";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="komisi" class="col-form-label">Komisi Bruto</label>
                                        <input type="text" class="form-control" id="komisi" name="komisi">
                                    </div>

                                    <div class="d-xl-none">
                                        <!--tambahan input marketing listing-->
                                        <div class="form-group">
                                            <label for="mm_listing" class="col-form-label">Member ML</label>
                                            <input type="text" class="form-control" id="mm_listing" name="mm_listing">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwpm_listing" class="col-form-label">NPWP ML</label>
                                            <input type="text" class="form-control" id="npwpm_listing" name="npwpm_listing">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwpum_listing" class="col-form-label">NPWP UML</label>
                                            <input type="text" class="form-control" id="npwpum_listing" name="npwpum_listing">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwpum_listing2" class="col-form-label">NPWP UML2</label>
                                            <input type="text" class="form-control" id="npwpum_listing2" name="npwpum_listing2">
                                        </div>

                                        <!--tambahan input marketing selling-->
                                        <div class="form-group">
                                            <label for="mm_selling" class="col-form-label">Member MS</label>
                                            <input type="text" class="form-control" id="mm_selling" name="mm_selling">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwpm_selling" class="col-form-label">NPWP MS</label>
                                            <input type="text" class="form-control" id="npwpm_selling" name="npwpm_selling">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwpum_selling" class="col-form-label">NPWP UMS</label>
                                            <input type="text" class="form-control" id="npwpum_selling" name="npwpum_selling">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwpum_selling2" class="col-form-label">NPWP UMS2</label>
                                            <input type="text" class="form-control" id="npwpum_selling2" name="npwpum_selling2">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript"> 
            <?php echo $jsArray; ?>
            function changeValue(id){
              document.getElementById('mm_listing').value = prdName[id].member_mar;
              document.getElementById('npwpm_listing').value = prdName[id].npwp_mar;
              document.getElementById('npwpum_listing').value = prdName[id].npwpum_listing;
              document.getElementById('npwpum_listing2').value = prdName[id].npwpum_listing2;
          };
      </script>

      <script type="text/javascript"> 
        <?php echo $jsArray_s; ?>
        function changeValue_s(id){
          document.getElementById('mm_selling').value = prdName_s[id].member_mar;
          document.getElementById('npwpm_selling').value = prdName_s[id].npwp_mar;
          document.getElementById('npwpum_selling').value = prdName_s[id].npwpum_selling;
          document.getElementById('npwpum_selling2').value = prdName_s[id].npwpum_selling2;
      };
  </script>
