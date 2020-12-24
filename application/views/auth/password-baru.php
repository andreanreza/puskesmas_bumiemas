<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <h5 class="text-center" href="index.html">
                                <h4><strong>Ganti Password</strong></h4>
                                <h4><?= $this->session->userdata('reset_email'); ?></h4>
                            </h5>

                            <form class="mt-5 mb-5 login-input" action="<?= base_url('auth/passwordBaru'); ?>" method="post">
                                <div class="form-group">
                                    <input type="password" id="password" class="form-control" placeholder="password baru" name="password">
                                    <?= form_error('password', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn login-form__btn submit w-100">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>