<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><?= $role['role']; ?></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-6">
                <?= $this->session->flashdata('pesan'); ?>
                <table class="table">
                    <thead class="thead-secondary">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($menu as $m) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $m['menu']; ?></td>
                                <td>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" <?= cek_akses($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>