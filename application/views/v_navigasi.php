<div class="d-flex bd-highlight mb-2">
    <div class="text-right">
        <a href="<?= base_url('Komisi');?>">
            <button type="button" class="btn btn-dark" data-whatever="@getbootstrap" >Dashboard</button></a>
        </div>
        <div class="text-right ml-2">
            <a href="<?= base_url('Marketing');?>">
                <button type="button" class="btn btn-primary" data-whatever="@getbootstrap" >Data Marketing</button></a>
            </div>
            <?php if ($level == 'Administrator'): ?> 
                <div class="text-right ml-2">
                    <a href="<?= base_url('Pengguna');?>">
                        <button type="button" class="btn btn-success" data-whatever="@getbootstrap" >Data Pengguna</button></a>
                    </div>

                    <div class="text-right ml-2">
                        <a href="<?= base_url('Pengaturan');?>">
                            <button type="button" class="btn btn-info" data-whatever="@getbootstrap" >Pengaturan</button></a>
                        </div>
                    <?php endif ?>
                </div>

                <?php if ($level == 'Administrator'): ?> 
                    <div class="text-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Tambah Data</button>
                    </div>
                <?php endif ?>

