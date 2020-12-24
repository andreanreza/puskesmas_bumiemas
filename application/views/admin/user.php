<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)"><?= $judul; ?></a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?= $this->session->flashdata('pesan'); ?>
                        <!-- <h4 class="card-title ml-4">Data User</h4> -->
                        <a href="<?= base_url(); ?>auth/registrasi" class="btn btn-primary ml-4">Tambah User</a>

                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Role</th>
                                        <th>Tanggal Reg</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getuser as $user) : ?>
                                        <tr>
                                            <td><?= $user['name']; ?></td>
                                            <td><?= $user['email']; ?></td>
                                            <td><img class="rounded-circle" src="<?= base_url('assets/profile/') . $user['image']; ?>" width="70px" alt=""></td>
                                            <td><?= $user['role']; ?></td>
                                            <td><?= date('d F Y', $user['date_created']); ?></td>
                                            <td>
                                                <a href="" class="badge badge-warning">Edit</a>
                                                <a href="<?= base_url('admin/hapusUser/') . $user['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda ingin menghapus ?'); ">Hapus</a>
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