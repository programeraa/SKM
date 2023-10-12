<!--   Modal Tambah Data-->
<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
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
                                <label for="alamat" class="col-form-label">Alamat Closing</label>
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
                            <div class="form-group">
                                <label for="komisi" class="col-form-label">Komisi Bruto</label>
                                <input type="text" class="form-control" name="tampil_komisi" id="tampil_komisi" onkeyup="formatRupiah(this, 'komisi')">
                                <input type="hidden" id="komisi" name="komisi">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="referal" class="col-form-label">Referal</label>
                                        <input type="text" class="form-control" id="referal" name="referal">
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="j_referal" class="col-form-label">Jumlah
                                        </label>
                                        <input type="text" class="form-control" name="tampil_referal" id="tampil_referal" onkeyup="formatRupiah(this, 'j_referal')">
                                        <input type="hidden" class="form-control" id="j_referal" name="j_referal">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ml" class="col-form-label">Marketing Listing</label>
                                <select class="form-control" id="ml" name="ml" onchange="showOtherInput(this.value);">
                                    <option value="">Pilih Marketing</option>
                                    <option value="A&A">Sesama A&A</option>
                                    <option value="Broker">CO-Broker Lain</option>
                                </select>
                            </div>

                            <!-- Marketing A&A Indonesia -->
                            <div id="marketing_listing2" class="form-group" style="display: none;">
                                <label for="marketing_listing" class="col-form-label">Marketing Listing</label>
                                <select class="form-control select2bs4" id="marketing_listing2" name="marketing_listing[]" multiple onchange="changeValue(this)">
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

                                <!-- Broker 1 -->
                                <div id="broker_1" style="display:none;">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="broker_1" class="col-form-label">Nama Broker</label>
                                                <input type="text" class="form-control" id="broker_1" name="broker_1">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="j_broker" class="col-form-label">Jenis Broker</label>
                                                <select class="form-control" id="j_broker" name="j_broker">
                                                    <option value="">Pilih Broker</option>
                                                    <option value="0">Ada SKB</option>
                                                    <option value="2">Badan</option>
                                                    <option value="2.5">Non-Badan (NPWP)</option>
                                                    <option value="3">Non-Badan (Non NPWP)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 ml-auto">
                                            <div class="form-group">
                                                <label for="persen_komisi_1" class="col-form-label">% Komisi</label>
                                                <input type="number" class="form-control" id="persen_komisi_1" name="persen_komisi_1" value="50">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ms" class="col-form-label">Marketing Selling</label>
                                    <select class="form-control" id="ms" name="ms" onchange="showOtherInput_2(this.value);">
                                        <option value="">Pilih Marketing</option>
                                        <option value="A&A2">Sesama A&A</option>
                                        <option value="Broker2">CO-Broker Lain</option>
                                    </select>
                                </div>

                                <!-- Marketing A&A Indonesia -->
                                <div id="marketing_selling2" class="form-group" style="display: none;">
                                    <label for="marketing_selling" class="col-form-label">Marketing Selling</label>
                                    <select class="form-control select2bs4" id="marketing_selling2" name="marketing_selling[]" multiple onchange="changeValue_s(this)">
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

                                    <!-- Broker 2 -->
                                    <div id="broker_2" style="display:none;">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="broker_2" class="col-form-label">Nama Broker</label>
                                                    <input type="text" class="form-control" id="broker_2" name="broker_2">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="j_broker2" class="col-form-label">Jenis Broker</label>
                                                    <select class="form-control" id="j_broker2" name="j_broker2">
                                                        <option value="">Pilih Broker</option>
                                                        <option value="0">Ada SKB</option>
                                                        <option value="2">Badan</option>
                                                        <option value="2.5">Non-Badan (NPWP)</option>
                                                        <option value="3">Non-Badan (Non NPWP)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 ml-auto">
                                                <div class="form-group">
                                                    <label for="persen_komisi_2" class="col-form-label">% Komisi</label>
                                                    <input type="number" class="form-control" id="persen_komisi_2" name="persen_komisi_2" value="50">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="potongan" class="col-form-label">Potongan Lainnya</label>
                                                <input type="text" class="form-control" id="potongan" name="potongan">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="j_potongan" class="col-form-label">Jumlah</label>
                                                <input type="text" class="form-control" name="tampil_potongan" id="tampil_potongan" onkeyup="formatRupiah(this, 'j_potongan')">
                                                <input type="hidden" class="form-control" id="j_potongan" name="j_potongan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-xl-none">
                                        <!--tambahan input marketing listing-->
                                        <div class="form-group">
                                            <label for="mm_listing" class="col-form-label">Member ML</label>
                                            <input type="text" class="form-control" id="mm_listing" name="mm_listing[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwpm_listing" class="col-form-label">NPWP ML</label>
                                            <input type="text" class="form-control" id="npwpm_listing" name="npwpm_listing[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwpum_listing" class="col-form-label">NPWP UML</label>
                                            <input type="text" class="form-control" id="npwpum_listing" name="npwpum_listing[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwpum_listing2" class="col-form-label">NPWP UML2</label>
                                            <input type="text" class="form-control" id="npwpum_listing2" name="npwpum_listing2[]">
                                        </div>

                                        <!--tambahan input marketing selling-->
                                        <div class="form-group">
                                            <label for="mm_selling" class="col-form-label">Member MS</label>
                                            <input type="text" class="form-control" id="mm_selling" name="mm_selling[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwpm_selling" class="col-form-label">NPWP MS</label>
                                            <input type="text" class="form-control" id="npwpm_selling" name="npwpm_selling[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwpum_selling" class="col-form-label">NPWP UMS</label>
                                            <input type="text" class="form-control" id="npwpum_selling" name="npwpum_selling[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwpum_selling2" class="col-form-label">NPWP UMS2</label>
                                            <input type="text" class="form-control" id="npwpum_selling2" name="npwpum_selling2[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="admin" class="col-form-label">Admin</label>
                                            <input type="text" class="form-control" id="admin" name="admin" value="<?php echo $id ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer pr-0">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- JS Marketing Listing -->
        <script type="text/javascript">
            <?php echo $jsArray; ?>

            function changeValue(select) {
                var selectedOptions = select.selectedOptions;
                var mm_listing = [];
                var npwpm_listing = [];
                var npwpum_listing = [];
                var npwpum_listing2 = [];

                for (var i = 0; i < selectedOptions.length; i++) {
                    var id = selectedOptions[i].value;
                    mm_listing.push(prdName[id].member_mar);
                    npwpm_listing.push(prdName[id].npwp_mar);
                    npwpum_listing.push(prdName[id].npwpum_listing);
                    npwpum_listing2.push(prdName[id].npwpum_listing2);
                }

                document.getElementById('mm_listing').value = mm_listing.join(', ');
                document.getElementById('npwpm_listing').value = npwpm_listing.join(', ');
                document.getElementById('npwpum_listing').value = npwpum_listing.join(', ');
                document.getElementById('npwpum_listing2').value = npwpum_listing2.join(', ');
            }
        </script>

        <!-- JS Marketing Selling -->
        <script type="text/javascript">
            <?php echo $jsArray_s; ?>

            function changeValue_s(select) {
                var selectedOptions = select.selectedOptions;
                var mm_selling = [];
                var npwpm_selling = [];
                var npwpum_selling = [];
                var npwpum_selling2 = [];

                for (var i = 0; i < selectedOptions.length; i++) {
                    var id = selectedOptions[i].value;
                    mm_selling.push(prdName_s[id].member_mar);
                    npwpm_selling.push(prdName_s[id].npwp_mar);
                    npwpum_selling.push(prdName_s[id].npwpum_selling);
                    npwpum_selling2.push(prdName_s[id].npwpum_selling2);
                }

                document.getElementById('mm_selling').value = mm_selling.join(', ');
                document.getElementById('npwpm_selling').value = npwpm_selling.join(', ');
                document.getElementById('npwpum_selling').value = npwpum_selling.join(', ');
                document.getElementById('npwpum_selling2').value = npwpum_selling2.join(', ');
            }
        </script>

        <!-- JS Tampil Marketing Listing A&A dan Broker -->
        <script>
            function showOtherInput(selectedValue) {
                var marketingListingInput = document.getElementById('marketing_listing2');
                var brokerInput = document.getElementById('broker_1');

                var marketingListingOption = "A&A";
                var brokerOption = "Broker";

                if (selectedValue === marketingListingOption) {
            marketingListingInput.style.display = 'block'; // Tampilkan input teks jika 'A&A' dipilih
            brokerInput.style.display = 'none'; // Sembunyikan input teks broker
        } else if (selectedValue === brokerOption) {
            marketingListingInput.style.display = 'none'; // Sembunyikan input teks marketing_listing2
            brokerInput.style.display = 'block'; // Tampilkan input teks jika 'broker' dipilih
        } else {
            marketingListingInput.style.display = 'none'; // Sembunyikan input teks marketing_listing2
            brokerInput.style.display = 'none'; // Sembunyikan input teks broker
        }
    }
</script>

<!-- JS Tampil Marketing Selling A&A dan Broker -->
<script>
    function showOtherInput_2(selectedValue) {
        var marketingSellingInput = document.getElementById('marketing_selling2');
        var brokerInput = document.getElementById('broker_2');

        var marketingSellingOption = "A&A2";
        var brokerOption = "Broker2";

        if (selectedValue === marketingSellingOption) {
            marketingSellingInput.style.display = 'block'; // Tampilkan input teks jika 'A&A' dipilih
            brokerInput.style.display = 'none'; // Sembunyikan input teks broker
        } else if (selectedValue === brokerOption) {
            marketingSellingInput.style.display = 'none'; // Sembunyikan input teks marketing_listing2
            brokerInput.style.display = 'block'; // Tampilkan input teks jika 'broker' dipilih
        } else {
            marketingSellingInput.style.display = 'none'; // Sembunyikan input teks marketing_listing2
            brokerInput.style.display = 'none'; // Sembunyikan input teks broker
        }
    }
</script>


