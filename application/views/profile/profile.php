<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <h4><?= $judul; ?></h4>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card border-primary mb-3">
                    <div class="card-header">Data User</div>
                    <div class="card-body text-primary">
                        <img src="<?= base_url('assets/profile/') . $user['image']; ?>" alt="">
                        <h5 class="card-title mt-3"><?= $user['name']; ?></h5>
                        <p class="card-text"><?= $user['email']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
</div>