<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <h4><small><?= $judul; ?></small></h4>
        </div>
    </div>
    <?php
    // var_dump($idKunjungan);
    // die;
    // 
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">

                        <div class="card mt5">
                            <div class="card-header">
                                <h4><?= $idKunjungan->no_rm; ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama" value="<?= $idKunjungan->nama; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama" value="<?= $idKunjungan->alamat; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Jenis kelamin</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama" value="<?= $idKunjungan->jk; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Keluhan</label>
                                    <div class="col-sm-6">
                                        <textarea name="" id="" class="form-control" readonly cols="3" rows="3"><?= $idKunjungan->keluhan; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Tgl Kunjungan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama" value="<?= date('d F Y', $idKunjungan->tgl_kun); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Poli</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama" value="<?= $idKunjungan->poli; ?>" readonly>
                                    </div>
                                </div>


                                <a href="<?= base_url('pendaftaran/kunjungan'); ?>" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>



                    </div>
                </div>
            </div>


        </div>
    </div>
</div>