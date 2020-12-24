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

                        <a href="<?= base_url('admin/diagnosa/tambahDiagnosa'); ?>" class="btn btn-primary ml-4">Tambah Diagnosa</a>
                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>kode</th>
                                        <th>Nama diagnosa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($diagnosa as $d) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $d->kode_diagnosa; ?></td>
                                            <td><?= $d->nama_diagnosa; ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/diagnosa/editdiagnosa/') . $d->id; ?>" class="badge badge-secondary">Edit</a>
                                                <a href="<?= base_url('admin/diagnosa/hapusdiagnosa/') . $d->id; ?>" class="badge badge-danger" onclick="return confirm('yakin ?'); ">Hapus</a>
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