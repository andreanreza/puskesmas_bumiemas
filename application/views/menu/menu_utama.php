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
                        <!-- <h4 class="card-title ml-4">Data Menu </h4> -->
                        <div class="col-md-6 ml-2"> <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                            <?= $this->session->flashdata('pesan'); ?>
                        </div>

                        <a href="" class="btn btn-primary ml-4" data-toggle="modal" data-target="#menuModal">Tambah Menu</a>
                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
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
                                                <a href="<?= base_url('menu/editMenu/') . $m['id']; ?>" class="badge badge-warning">Edit</a>
                                                <a href="<?= base_url('menu/hapus/') . $m['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin ?'); ">Hapus</a>
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

<!-- Modal -->
<div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="menuModalLabel">Tambah menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('menu'); ?>">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="menu">Menu</label>
                            <input type="text" class="form-control" id="menu" placeholder="Menu" name="menu">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>