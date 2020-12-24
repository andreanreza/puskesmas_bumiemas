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
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>

                            <?= $this->session->flashdata('pesan'); ?>
                        </div>

                        <a href="" class="btn btn-primary ml-4" data-toggle="modal" data-target="#submenuModal">Tambah subMenu</a>
                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Menu</th>
                                        <th>Url</th>
                                        <th>Icon</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($submenu as $sm) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $sm['judul']; ?></td>
                                            <td><?= $sm['menu']; ?></td>
                                            <td><?= $sm['url']; ?></td>
                                            <td><i class="<?= $sm['icon']; ?>"></i></td>
                                            <!-- <td><?= $sm['is_aktif']; ?></td> -->
                                            <td>
                                                <a href="<?= base_url('menu/editSubMenu/') . $sm['id']; ?>" class="badge badge-warning">Edit</a>
                                                <a href="<?= base_url('menu/hapusSubMenu/') . $sm['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin menghapus <?= $sm['judul']; ?> ?');">Hapus</a>
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

    <!-- Modal -->
    <div class="modal fade" id="submenuModal" tabindex="-1" role="dialog" aria-labelledby="submenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="submenuModalLabel">Tambah Submenu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('menu/submenu'); ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="judul" placeholder="masukan judul" name="judul">
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="menu_id" name="menu_id">
                                <option value="">Silahkan pilih</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" placeholder="masukan url" name="url">
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="menu_id" name="icon">
                                <option value="">Silahkan pilih</option>
                                <?php foreach ($icon as $i) : ?>
                                    <option value="<?= $i['nama_icon']; ?>"><?= $i['nama_icon']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="is_aktif" checked>
                                <label class="form-check-label" for="defaultCheck1">
                                    Aktif
                                </label>
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

<!-- footer -->
</div>