<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-4">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Data Pasien</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $countDataPasien['jumlah']; ?></h2>
                            <p class="text-white mb-0"><?= date('d F'); ?></p>
                            <p class="text-white mb-0"><?= date('Y'); ?></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Kunjungan Pasien</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $countDataKunjungan['jumlahKunjungan']; ?></h2>
                            <p class="text-white mb-0"><?= date('d F'); ?></p>
                            <p class="text-white mb-0"><?= date('Y'); ?></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Poliumum belum diperiksa</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $umumterperiksa['jumlah']; ?></h2>
                            <p class="text-white mb-0"><?= date('d F'); ?></p>
                            <p class="text-white mb-0"><?= date('Y'); ?></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Poliumum Belum diperiksa</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $umumbelumperiksa['jumlah']; ?></h2>
                            <p class="text-white mb-0"><?= date('d F'); ?></p>
                            <p class="text-white mb-0"><?= date('Y'); ?></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Polikia belum diperiksa</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $belumperiksa['jumlah']; ?></h2>
                            <p class="text-white mb-0"><?= date('d F'); ?></p>
                            <p class="text-white mb-0"><?= date('Y'); ?></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Polikia Belum diperiksa</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $terperiksa['jumlah']; ?></h2>
                            <p class="text-white mb-0"><?= date('d F'); ?></p>
                            <p class="text-white mb-0"><?= date('Y'); ?></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
        </div>







        <div class="row">
            <?php foreach ($us as $u) : ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?= base_url('assets/profile/') . $u['image']; ?>" class="rounded-circle img-thumbnail">
                                <h5 class="mt-3 mb-1"><?= $u['name']; ?></h5>
                                <p class="m-0"><?= $u['role']; ?></p>
                                <hr>
                                <p class="m-0"> <?php
                                                switch ($u['is_active']) {
                                                    case '0':
                                                        echo "status : tidak aktif";
                                                        break;
                                                    case '1':
                                                        echo "status : aktif";
                                                        break;
                                                    default:
                                                        echo "null";
                                                        break;
                                                }
                                                ?>
                                </p>
                                <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </div>
    <!-- #/ container -->
</div>