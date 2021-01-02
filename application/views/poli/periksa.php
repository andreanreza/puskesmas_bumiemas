<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <h4><small><?= $judul; ?></small></h4>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="<?= base_url('poliumum/poliumum/rmobat'); ?>">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?= $rekmedId->id; ?>">
                                    <label for="nama">Nama pasien</label>
                                    <input type="text" class="form-control input-default" name="nama" value="<?= $rekmedId->nama; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">No Rekam medis</label>
                                    <input type="text" value="<?= $rekmedId->no_rm; ?>" name="no_rm" class="form-control input-default" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="keluhan">keluhan</label>
                                    <input type="text" value="<?= $rekmedId->keluhan; ?>" name="keluhan" class="form-control input-default" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="id_obat">obat</label>
                                    <select multiple class="form-control" id="id_obat" name="id_obat[]">
                                        <?php foreach ($obat as $o) : ?>
                                            <option value="<?= $o->id; ?>"><?= $o->nama_obat; ?></option>
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