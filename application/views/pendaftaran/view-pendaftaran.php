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

                        <a href="<?= base_url('pendaftaran/pendaftaran/tambahpasien'); ?>" class="btn btn-primary ml-4">Tambah Pasien baru</a>
                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nama Rm</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <!-- <th>Tanggal lahir</th> -->
                                        <th>Tanggal reg</th>
                                        <th>Usia</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pasien as $p) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p->nama; ?></td>
                                            <td><?= $p->no_rm; ?></td>
                                            <td><?= $p->alamat; ?></td>
                                            <td><?= $p->jk; ?></td>
                                            <!-- <td><?= $p->tgl_lahir; ?></td> -->
                                            <td><?= date('d F Y', $p->tgl_reg); ?></td>
                                            <td><?= $p->usia; ?></td>
                                            <td>
                                                <a href="<?= base_url('pendaftaran/pendaftaran/editpasien/') . $p->id; ?>" class="badge badge-secondary">Edit</a>
                                                <a href="<?= base_url('pendaftaran/pendaftaran/hapuspasien/') . $p->id; ?>" class="badge badge-danger" onclick="return confirm('yakin ?'); ">Hapus</a>
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