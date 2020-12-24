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
                            <form method="post" action="<?= base_url('pendaftaran/kunjungan/tambahkunjungan'); ?>">
                                <div class="form-group">
                                    <label for="id_pasien">No Rm</label>
                                    <select name="id_pasien" id="id_pasien" class="form-control input-default">
                                        <option value="">Pilih</option>
                                        <?php foreach ($pasien as $p) : ?>
                                            <option value="<?= $p->id; ?>"><?= $p->no_rm; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="keluhan">keluhan</label>
                                    <textarea class="form-control" id="keluhan" rows="3" name="keluhan"></textarea>
                                    <small class="form-text text-danger"><?= form_error('keluhan'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="id_poli">Poli</label>
                                    <select name="id_poli" id="id_poli" class="form-control input-default">
                                        <option value="">Pilih</option>
                                        <?php foreach ($poli as $p) : ?>
                                            <option value="<?= $p['id']; ?>"><?= $p['poli']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
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