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
                            <form method="post" action="<?= base_url('pendaftaran/pendaftaran/tambahpasien'); ?>">
                                <div class="form-group">
                                    <label for="nama">Nama pasien</label>
                                    <input type="text" class="form-control input-default" name="nama">
                                    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama">No Rekam medis</label>
                                    <input type="text" value="<?= $rm; ?>" name="no_rm" class="form-control input-default" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
                                    <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis kelamin</label>
                                    <select name="jk" id="jk" class="form-control input-default">
                                        <option value="">Pilih</option>
                                        <?php foreach ($jk as $j) : ?>
                                            <option value="<?= $j; ?>"><?= $j; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('jk'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">tanggal lahir</label>
                                    <input type="date" class="form-control input-default" name="tgl_lahir">
                                    <small class="form-text text-danger"><?= form_error('tgl_lahir'); ?></small>
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