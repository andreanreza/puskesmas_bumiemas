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
                        <div class="col-md-6 ml-2"> <?= form_error('icon', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                            <?= $this->session->flashdata('pesan'); ?>
                        </div>

                        <a href="" class="btn btn-primary ml-4" data-toggle="modal" data-target="#iconModal">Tambah Icon</a>
                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama icon</th>
                                        <th>icon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($icon as $i) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $i['nama_icon']; ?></td>
                                            <td><i class="<?= $i['icon']; ?>"></i></td>
                                            <td>
                                                <a href="<?= base_url('menu/hapusIcon/') . $i['id']; ?>" class="badge badge-danger" onclick="return confirm('Anda yakin menghapus <?= $i['nama_icon']; ?> ?'); ">Hapus</a>
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
<div class="modal fade" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="iconModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="iconModalLabel">Tambah icon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('menu/icon'); ?>">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="icon">Nama Icon</label>
                            <input type="text" class="form-control" id="icon" placeholder="masukan nama icon" name="nama_icon">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" id="icon" placeholder="salin kembali nama icon" name="icon">
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