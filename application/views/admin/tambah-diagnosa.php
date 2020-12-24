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
                            <form method="post" action="<?= base_url('admin/diagnosa/tambahDiagnosa'); ?>">
                                <!-- <input type="hidden" value="<?= $sub['id']; ?>" name="id"> -->
                                <div class="form-group">
                                    <label for="kode_diagnosa">Kode diagnosa</label>
                                    <input type="text" class="form-control input-default" name="kode_diagnosa">
                                    <small class="form-text text-danger"><?= form_error('kode_diagnosa'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama_diagnosa">Nama diagnosa</label>
                                    <input type="text" class="form-control input-default" name="nama_diagnosa">
                                    <small class="form-text text-danger"><?= form_error('nama_diagnosa'); ?></small>
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