   <!--**********************************
            Sidebar start
        ***********************************-->


   <div class="nk-sidebar">
       <div class="nk-nav-scroll">
           <ul class="metismenu" id="menu">
               <div class="container">
                   <h3 class="text-center"> <img src="<?= base_url('assets/profile/') . $user['image']; ?>" class="img-thumbnail rounded-circle mt-2 justify-content-center" width="100" alt=""></h3>
                   <h5 class="text-center text-primary mt-3"><?= $user['name']; ?></h5>
               </div>
               <hr>
               <!-- query menu -->
               <?php
                $role = $this->session->userdata('role_id');
                $querymenu = "  SELECT `menu_user`.`id`, `menu`
                                FROM `menu_user` JOIN `akses_menu`
                                ON `menu_user`.`id` = `akses_menu`.`menu_id`
                                WHERE `akses_menu`.`role_id` = $role
                                ORDER BY `akses_menu`.`menu_id` ASC
                ";
                $menu = $this->db->query($querymenu)->result_array();
                ?>

               <!-- lopp menu -->
               <?php foreach ($menu as $m) : ?>
                   <li class="nav-label"><?= $m['menu']; ?></li>
                   <!-- <li>
                       <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                           <span class="nav-text"><?= $m['menu']; ?></span>
                       </a> -->

                   <!-- sub menu -->
                   <?php
                    $menuid = $m['id'];
                    $querysub = "   SELECT * 
                                    FROM `sub_menu` JOIN `menu_user`
                                    ON `sub_menu`.`menu_id` = `menu_user`.`id`
                                    WHERE `sub_menu`.`menu_id` = $menuid
                                    AND `sub_menu`.`is_aktif` = 1
                                    
                   ";
                    $submenu = $this->db->query($querysub)->result_array();
                    ?>

                   <?php foreach ($submenu as $sm) : ?>
                       <!-- <ul aria-expanded="false">
                           <li><a href="<?= base_url($sm['url']); ?>">
                                   <i class="<?= $sm['icon']; ?>"></i> <?= $sm['judul']; ?></a></li>
                       </ul>
                       </li> -->
                       <li>
                           <a href="<?= base_url($sm['url']); ?>" aria-expanded="false">
                               <i class="<?= $sm['icon']; ?>"></i><span class="nav-text"><?= $sm['judul']; ?></span>
                           </a>
                       </li>

                   <?php endforeach; ?>
               <?php endforeach; ?>


               <!-- <li>
                   <a href="widgets.html" aria-expanded="false">
                       <i class="fas fa-fw fa-user mr-1"></i><span class="nav-text">user</span>
                   </a>
               </li> -->


               <!-- <li class="nav-label">Pendaftaran</li>
               <li>
                   <a href="widgets.html" aria-expanded="false">
                       <i class="fas fa-fw fa-cash-register mr-1"></i><span class="nav-text">Register</span>
                   </a>
               </li> -->
               <!-- <li>
                   <a href="widgets.html" aria-expanded="false">
                       <i class="fas fa-fw fa-cart-plus mr-1"></i><span class="nav-text">Kunjungan</span>
                   </a>
               </li> -->
               <!-- <li class="nav-label">balai periksa</li>
               <li>
                   <a href="widgets.html" aria-expanded="false">
                       <i class="fas fa-fw fa-laptop-medical mr-1"></i><span class="nav-text">Rekam Medis</span>
                   </a>
               </li> -->
       </div>
   </div>
   <!--**********************************
            Sidebar end 
        ***********************************-->