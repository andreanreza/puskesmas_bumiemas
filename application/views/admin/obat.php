<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <h4><small><?= $judul; ?></small></h4>
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


                        <a href="<?= base_url('admin/obat/tambahObat'); ?>" class="btn btn-primary ml-4">Tambah Obat</a>
                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>kode Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($obat as $o) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $o->kode_obat; ?></td>
                                            <td><?= $o->nama_obat; ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/obat/editObat/') . $o->id; ?>" class="badge badge-secondary">Edit</a>
                                                <a href="<?= base_url('admin/obat/hapusObat/') . $o->id; ?>" class="badge badge-danger" onclick="return confirm('yakin ?'); ">Hapus</a>
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


</div>