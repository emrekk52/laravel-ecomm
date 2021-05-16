<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link href="<?php echo e(url('/')); ?>/assets/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(url('/')); ?>/assets/front/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo e(url('/')); ?>/assets/front/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo e(url('/')); ?>/assets/front/css/price-range.css" rel="stylesheet">
    <link href="<?php echo e(url('/')); ?>/assets/front/css/animate.css" rel="stylesheet">
    <link href="<?php echo e(url('/')); ?>/assets/front/css/main.css" rel="stylesheet">
    <link href="<?php echo e(url('/')); ?>/assets/front/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo e(url('/')); ?>/assets/front/images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="<?php echo e(url('/')); ?>/assets/front/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="<?php echo e(url('/')); ?>/assets/front/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="<?php echo e(url('/')); ?>/assets/front/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"
        href="<?php echo e(url('/')); ?>/assets/front/images/ico/apple-touch-icon-57-precomposed.png">

    <link href="<?php echo e(url('/')); ?>/lightbox2/dist/css/lightbox.css" rel="stylesheet" />
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="<?php echo e(url('/')); ?>/anasayfa"><img
                                    src="<?php echo e(url('/')); ?>/assets/front/images/home/logo.png" alt="logo" /></a>
                        </div>

                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <?php if(Auth::check()): ?>
                                    <li><a href="<?php echo e(url('/')); ?>/user/favorilerim"><i class="fa fa-star"></i>
                                            Favorilerim</a></li>
                                    <li><a href="<?php echo e(url('/')); ?>/user/sepetim"><i class="fa fa-shopping-cart"></i>
                                            Sepet</a></li>
                                    <li><a href="<?php echo e(url('/')); ?>/user/kart"><i class="fa fa-credit-card"></i>
                                            Kart</a></li>

                                    <li><a href="<?php echo e(url('/')); ?>/user/profile" class="active"><i
                                                class="fa fa-user"></i><?php echo e(Auth::user()->name); ?>

                                        </a></li>
                                <?php else: ?>
                                    <li><a href="<?php echo e(url('/')); ?>/user/login"><i class="fa fa-lock"></i> Giriş
                                            yap</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="<?php echo e(url('/')); ?>/anasayfa" class="active">Anasayfa</a></li>
                                <li class="dropdown"><a href="#">Alışveriş<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Ürünler</a></li>
                                        <li><a href="#">Ürün detayları</a></li>
                                        <li><a href="#">Ödeme ekranı</a></li>
                                        <li><a href="<?php echo e(url('/')); ?>/user/kart">Kartlarım</a></li>
                                        <li><a href="<?php echo e(url('/')); ?>/user/login">Giriş yap</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                       
                           
                            <div class="search_box pull-right">
                                <input name="search" type="text" placeholder="Ara..">
                            </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <?php echo $__env->yieldContent('slider'); ?>
            </div>
        </div>
    </section>
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php echo $__env->yieldContent('sidebar'); ?>
                </div>

                <div class="col-sm-9 padding-right">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
    </section>

    <footer id="footer">
        <!--Footer-->

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>SERVİSLER</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Yardım</a></li>
                                <li><a href="#">İletişime Geç</a></li>
                                <li><a href="#">Sipariş Durumu</a></li>
                                <li><a href="#">Konum Değiştir</a></li>
                                <li><a href="#">SSS</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>HIZLI ALIŞVERİŞ </h2>
                            <ul class="nav nav-pills nav-stacked">
                                <?php $__currentLoopData = $turler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(url('/')); ?>/kategoriler/<?php echo e($tur->id); ?>"><?php echo e($tur->adi); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>POLİTİKALAR</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Kullanım Şartları</a></li>
                                <li><a href="#">Gizlilik Politikası</a></li>
                                <li><a href="#">Geri Ödeme Politikası</a></li>
                                <li><a href="#">Fatura Sistemi</a></li>
                                <li><a href="#">Bilet Sistemi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>SHOPPER HAKKINDA</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Şirket Hakkında</a></li>
                                <li><a href="#">Kariyerler</a></li>
                                <li><a href="#">Mağaza Konumu</a></li>
                                <li><a href="#">Ortaklık Programı</a></li>
                                <li><a href="#">Telif Hakkı</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>Haberdar Ol</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Email adresiniz" />
                                <button type="submit" class="btn btn-default"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                                <p>En son bildirimlerden haberdar <br />olmak için abone olun...</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2021 E-SHOPPER Inc. Tüm hakları saklıdır.</p>

                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->



    <script src="<?php echo e(url('/')); ?>/assets/front/js/jquery.js"></script>
    <script src="<?php echo e(url('/')); ?>/assets/front/js/bootstrap.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/assets/front/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/assets/front/js/price-range.js"></script>
    <script src="<?php echo e(url('/')); ?>/assets/front/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo e(url('/')); ?>/assets/front/js/main.js"></script>
    <script src="<?php echo e(url('/')); ?>/lightbox2/dist/js/lightbox.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\ecomm\resources\views/layouts/front/fmaster.blade.php ENDPATH**/ ?>