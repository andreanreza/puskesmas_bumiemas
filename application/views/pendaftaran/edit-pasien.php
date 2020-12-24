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
                        <div class="basic-form">
                            <form method="post" action="">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?= $rmId->id; ?>">
                                    <label for="nama">Nama pasien</label>
                                    <input type="text" class="form-control input-default" name="nama" value="<?= $rmId->nama; ?>">
                                    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="nama">No Rekam medis</label>
                                    <input type="text" value="<?= $rmId->no_rm; ?>" name="no_rm" class="form-control input-default" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat"> <?= $rmId->alamat; ?></textarea>
                                    <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis kelamin</label>
                                    <select name="jk" id="jk" class="form-control input-default">
                                        <?php foreach ($jk as $j) : ?>
                                            <?php if ($j == $rmId->jk) : ?>
                                                <option value="<?= $j; ?>" selected><?= $j; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $j; ?>"><?= $j; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('jk'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">tanggal lahir</label>
                                    <input type="date" class="form-control input-default" name="tgl_lahir" value="<?= $rmId->tgl_lahir; ?>">
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