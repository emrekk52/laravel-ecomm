<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a style="text-align:center;" href="<?php echo e(url('/')); ?>/admin" class="brand-link">

        <span  class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo e(url('/')); ?>/userimage/<?php echo e(Auth::user()->images); ?>" class="img-circle elevation-2"
                    alt="profile">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(Auth::user()->name); ?> - <?php echo e(Auth::user()->role); ?> </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Ara.." aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?php echo e(url('/')); ?>/admin" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Anasayfa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            T-Shirt işlemleri
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(url('/')); ?>/admin/urunler" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>T-Shirtler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/')); ?>/admin/siparisler" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Siparişler</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('/')); ?>/admin/mesajlar" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Müşteri Mesajları
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('/')); ?>/admin/uyeler" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Üyeler
                        </p>
                    </a>
                </li>
               
                <li class="nav-item">
                    <a href="<?php echo e(url('/')); ?>/admin/yorumlar" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Yorumlar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('/')); ?>/admin/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Çıkış Yap
                        </p>
                    </a>
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\xampp\htdocs\ecomm\resources\views/layouts/admin/asidebar.blade.php ENDPATH**/ ?>