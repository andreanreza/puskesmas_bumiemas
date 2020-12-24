<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <h4><small><?= $judul; ?></small></h4>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <p class="text-muted m-b-15 f-s-12"><strong>Edit Data</strong></p>
                        <div class="basic-form">
                            <form method="post" action="">
                                <input type="hidden" value="<?= $sub['id']; ?>" name="id">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control input-default" name="judul" value="<?= $sub['judul']; ?>">
                                    <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="menu_id">Menu</label>
                                    <select name="menu_id" id="menu_id" class="form-control">
                                        <?php foreach ($menu as $m) : ?>
                                            <?php if ($m['id'] == $sub['menu_id']) : ?>
                                                <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="url">Url</label>
                                    <input type="text" class="form-control input-default" name="url" value="<?= $sub['url']; ?>">
                                    <small class="form-text text-danger"><?= form_error('url'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <select name="icon" id="icon" class="form-control">
                                        <?php foreach ($icon as $i) : ?>
                                            <?php if ($i['icon'] == $sub['icon']) : ?>
                                                <option value="<?= $i['icon']; ?>" selected><?= $i['icon']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $i['icon']; ?>"><?= $i['icon']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <p><strong>Note</strong></p>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nama icon</th>
                                        <th scope="col">Icon</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($icon as $i) : ?>
                                        <tr>
                                            <td><small><?= $i['nama_icon']; ?></small></td>
                                            <td><i class="<?= $i['icon']; ?>"></i></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>