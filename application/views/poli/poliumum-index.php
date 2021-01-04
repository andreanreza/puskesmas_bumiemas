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

                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No Rm</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Keluhan</th>
                                        <th>tgl rekmed</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($rekmed as $rm) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $rm->nama; ?></td>
                                            <td><?= $rm->no_rm; ?></td>
                                            <td><?= $rm->jenis_kelamin; ?></td>
                                            <td><?= $rm->keluhan; ?></td>
                                            <td><?= date('d F Y', $rm->tgl_rekam); ?></td>
                                            <td>
                                                <?php if ($rm->status == 0) : ?>
                                                    belum diperiksa
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('poliumum/poliumum/editrekmed/') . $rm->id; ?>" <i class="fas fa-receipt text-primary"></i></a>
                                                <a href="<?= base_url('poliumum/poliumum/hapusrekmed/') . $rm->id; ?>" <i class="fas fa-trash text-danger ml-2" onclick="return confirm('yakin ?'); "></a>
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