<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"><?= $judul; ?></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="col-md-6 ml-2">

                            <?= $this->session->flashdata('pesan'); ?>
                        </div>

                        <a href="<?= base_url('menu/tambahRole'); ?>" class="btn btn-primary ml-4">Tambah Role</a>
                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($role as $r) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $r['role']; ?></td>
                                            <td>
                                                <a href="<?= base_url('menu/roleakses/') . $r['id']; ?>" class="badge badge-success">Akses Role</a>
                                                <a href="<?= base_url('menu/editRole/') . $r['id']; ?>" class="badge badge-warning">Edit</a>
                                                <a href="<?= base_url('menu/hapusRole/') . $r['id']; ?>" class="badge badge-danger" onclick="return confirm('Anda yakin menghapus ?');">Hapus</a>
                                            </td>
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
    <!-- #/ container -->
</div>