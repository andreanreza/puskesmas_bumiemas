<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">

                            <a class="text-center" href="index.html">
                                <h4>Create user</h4>
                            </a>
                            <form class="mt-5 mb-5 login-input" method="post" action="<?= base_url('auth/registrasi'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nama" name="name" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email" name="email">
                                    <?= form_error('email', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                    <?= form_error('password', '<small class="text-danger ">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <select name="role" id="" class="form-control">
                                        <option value="">Pilih Role</option>
                                        <?php foreach ($role as $rol) : ?>
                                            <option value="<?= $rol['id']; ?>"><?= $rol['role']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn login-form__btn submit w-100">Sign in</button>
                            </form>
                            <p class="mt-5 login-form__footer"> <a href="<?= base_url('admin/user'); ?>" class="text-primary">kembali </a></p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>