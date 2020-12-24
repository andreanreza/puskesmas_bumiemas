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

                        <a href="<?= base_url('pendaftaran/kunjungan/tambahkunjungan'); ?>" class="btn btn-primary ml-4">Tambah kunjungan pasien</a>
                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nama Rm</th>
                                        <th>alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Keluhan</th>
                                        <th>tgl kunjungan</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kunjungan as $k) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $k->nama; ?></td>
                                            <td><?= $k->no_rm; ?></td>
                                            <td><?= $k->alamat; ?></td>
                                            <td><?= $k->jk; ?></td>
                                            <td><?= $k->keluhan; ?></td>
                                            <td><?= date('d F Y', $k->tgl_kun); ?></td>
                                            <td>

                                                <a href="<?= base_url('pendaftaran/kunjungan/detailkunjungan/') . $k->id; ?>" class="badge badge-secondary">Detail</a>
                                                <a href="<?= base_url('pendaftaran/kunjungan/hapuskunjungan/') . $k->id; ?>" class="badge badge-danger" onclick="return confirm('yakin ?'); ">Hapus</a>
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