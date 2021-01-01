<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <h4><small><?= $judul; ?></small></h4>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">

                        <div class="card mt5">
                            <div class="card-header">

                            </div>
                            <div class="card-body">
                                <form method="post" action="<?= base_url('pendaftaran/kunjungan/proses'); ?>">

                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $idKunjungan->nama; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_rm" class="col-sm-2 col-form-label">no_rm</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="no_rm" name="no_rm" value="<?= $idKunjungan->no_rm; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $idKunjungan->alamat; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis kelamin</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $idKunjungan->jk; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
                                        <div class="col-sm-6">
                                            <textarea name="keluhan" id="keluhan" class="form-control" readonly cols="3" rows="3"><?= $idKunjungan->keluhan; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="poli" class="col-sm-2 col-form-label">Poli</label>
                                        <div class="col-sm-6"><select name="id_poli" id="poli" class="form-control">
                                                <?php foreach ($poli as $p) : ?>
                                                    <?php if ($p->id == $idKunjungan->id_poli) : ?>
                                                        <option value="<?= $p->id; ?>" selected><?= $p->poli; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $p->id; ?>"><?= $p->poli; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirem</button>
                                    <a href="<?= base_url('pendaftaran/kunjungan'); ?>" class="btn btn-secondary">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>