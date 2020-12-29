<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <h4><small><?= $judul; ?></small></h4>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <!-- <p class="text-muted m-b-15 f-s-12"><strong>Edit Data</strong></p> -->
                        <div class="basic-form">
                            <form method="post" action="">
                                <input type="hidden" value="<?= $obatById->id; ?>" name="id">
                                <div class="form-group">
                                    <label for="kode_obat">Kode obat</label>
                                    <input type="text" class="form-control input-default" name="kode_obat" value="<?= $obatById->kode_obat; ?>">
                                    <small class="form-text text-danger"><?= form_error('kode_obat'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama_obat">Nama obat</label>
                                    <input type="text" class="form-control input-default" name="nama_obat" value="<?= $obatById->nama_obat; ?>">
                                    <small class="form-text text-danger"><?= form_error('nama_obat'); ?></small>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>