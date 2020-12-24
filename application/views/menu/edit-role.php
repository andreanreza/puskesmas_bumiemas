<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <h4><?= $judul; ?></h4>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $roleid['id']; ?>">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="role" name="role" value="<?= $roleid['role']; ?>">
                        <small class="form-text text-danger"><?= form_error('role'); ?></small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>