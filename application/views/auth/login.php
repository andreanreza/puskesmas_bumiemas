<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a class="text-center" href="index.html">
                                <h4>Login</h4>
                            </a>
                            <?= $this->session->flashdata('pesan'); ?>
                            <form class="mt-5 mb-5 login-input" action="<?= base_url('auth'); ?>" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                    <?= form_error('password', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn login-form__btn submit w-100">Sign In</button>
                            </form>
                            <p class="mt-5 login-form__footer">Lupa password ? <a href="<?= base_url('auth/lupaPassword'); ?>" class="text-primary">klik</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>