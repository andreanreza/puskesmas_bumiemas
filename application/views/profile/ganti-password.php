<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <h4><?= $judul; ?></h4>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card col-lg-6">
            <div class="card-header">
                <h5> Email : <?= $user['email']; ?></h5>
            </div>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card-body">
                <form method="post" action="<?= base_url('profile/gantiPassword'); ?>">
                    <div class="form-group">
                        <label for="password_lama">Password Lama</label>
                        <input type="password" class="form-control" id="password_lama" name="password_lama">
                        <small class="form-text text-danger"><?= form_error('password_lama'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password_baru">Password Baru</label>
                        <input type="password" class="form-control" id="password_baru" name="password_baru">
                        <small class="form-text text-danger"><?= form_error('password_baru'); ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->
</div>