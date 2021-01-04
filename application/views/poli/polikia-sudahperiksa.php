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
                                        <th>obat</th>
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
                                                <?php
                                                $id_rm = $rm->id;
                                                $this->db->select('tbl_rm_obat.*, tbl_rekam.*, tbl_obat.nama_obat');
                                                $this->db->from('tbl_rm_obat');
                                                $this->db->join('tbl_rekam', 'tbl_rm_obat.id_rm = tbl_rekam.id');
                                                $this->db->join('tbl_obat', 'tbl_rm_obat.id_obat = tbl_obat.id');
                                                $this->db->where('tbl_rm_obat.id_rm', $id_rm);
                                                $query = $this->db->get()->result();
                                                ?>
                                                <?php foreach ($query as $ro) : ?>
                                                    <?= $ro->nama_obat; ?><br>
                                                <?php endforeach; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('polikia/polikia/cetakpdf/') . $rm->id; ?>" <i class="fas fa-file-pdf text-success"></i></a>
                                                <a href="<?= base_url('polikia/polikia/hapusrekmed/') . $rm->id; ?>" <i class="fas fa-trash text-danger ml-2" onclick="return confirm('yakin ?'); "></i></a>
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