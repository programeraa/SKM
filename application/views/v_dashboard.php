<div class="container pt-5">
    <div class="d-flex justify-content-between mb-2">
        <div class="text-right">
            <a href="<?= base_url('komisi/komisi');?>">
                <button type="button" class="btn btn-success" data-whatever="@getbootstrap" >Data Komisi</button></a>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h4 class="card-title" style="text-align: center;">Dashboard Uji Coba</h4>
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-xl-3 col-sm-6 py-2">
                        <div class="card bg-success text-white h-100">
                            <div class="card-body bg-success">
                                <div class="rotate">
                                    <i class="fa fa-list fa-2x"></i>
                                </div>
                                <h6 class="text-uppercase">Data Pengajuan</h6>
                                <h1 class="display-6"><?php //echo implode($data_pengajuan); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 py-2">
                        <div class="card text-white bg-primary h-100">
                            <div class="card-body bg-primary">
                                <div class="rotate">
                                    <i class="fa fa-check fa-2x"></i>
                                </div>
                                <h6 class="text-uppercase">Disetujui</h6>
                                <h1 class="display-6"><?php //echo implode($disetujui); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 py-2">
                        <div class="card text-white bg-danger h-100">
                            <div class="card-body bg-danger">
                                <div class="rotate">
                                    <i class="fa fa-times fa-2x"></i>
                                </div>
                                <h6 class="text-uppercase">Ditolak</h6>
                                <h1 class="display-6"><?php //echo implode($ditolak); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 py-2">
                        <div class="card text-white bg-warning h-100">
                            <div class="card-body bg-warning">
                                <div class="rotate">
                                    <i class="fa fa-user fa-2x"></i>
                                </div>
                                <h6 class="text-uppercase">Jumlah Karyawan</h6>
                                <h1 class="display-6"><?php //echo implode($karyawan); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-start mt-3">
            <div class="text-right">
                <a href="<?= base_url('login/logout');?>">
                    <button type="button" class="btn btn-danger" data-whatever="@getbootstrap" >Log Out</button></a>
                </div>
            </div>
        </div>
    </body>
