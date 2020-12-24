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

                        <a href="<?= base_url('pendaftaran/pendaftaran/tambahkunjungan'); ?>" class="btn btn-primary ml-4">Tambah Pasien baru</a>
                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nama Rm</th>
                                        <th>Poli</th>
                                        <th>keluhan</th>
                                        <th>Tgl kun</th>
                                        <th>Status</th>
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
                                            <td><?= $k->id_poli; ?></td>
                                            <td><?= $k->keluhan; ?></td>
                                            <td><?= date('d F Y', $k->tgl_kun); ?></td>
                                            <td>
                                                <?php if ($k->proses = 1) : ?>
                                                    <button type="button" class="btn btn-danger">Belum di proses</button>
                                                <?php else : ?>
                                                    <button type="button" class="btn btn-success">sudah di proses</button>
                                                <?php endif; ?>
                                            </td>
                                            <td>

                                                <a href="<?= base_url('pendaftaran/kunjungan/editkunjungan/') . $k->id; ?>" class="badge badge-secondary">Edit</a>
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