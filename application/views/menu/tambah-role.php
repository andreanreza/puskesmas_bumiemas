<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <h4><?= $judul; ?></h4>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="<?= base_url('menu/tambahRole'); ?>">
                    <div class="form-group">

                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Masukan Role">
                        <small class="form-text text-danger"><?= form_error('role'); ?></small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>