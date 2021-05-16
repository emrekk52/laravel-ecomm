<?php $__env->startSection('content'); ?>



    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Öne Çıkanlar</h2>

        <?php $__currentLoopData = $onecikanlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $onecikan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($onecikan->resim); ?>" alt="t-shirt" />
                            <h2><?php echo e($onecikan->fiyat); ?>₺</h2>
                            <p><?php echo e($onecikan->marka); ?> <?php echo e($onecikan->renk); ?> <?php echo e($onecikan->tur); ?></p>
                            <a href="<?php echo e(url('/')); ?>/urun/<?php echo e($onecikan->id); ?>" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>İncele</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2><?php echo e($onecikan->fiyat); ?>₺</h2>
                                <a href="<?php echo e(url('/')); ?>/urun/<?php echo e($onecikan->id); ?>">
                                    <p><?php echo e($onecikan->marka); ?> <?php echo e($onecikan->renk); ?> <?php echo e($onecikan->tur); ?></p>
                                </a>
                                <a href="<?php echo e(url('/')); ?>/urun/<?php echo e($onecikan->id); ?>"
                                    class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>İncele
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="<?php echo e(url('/')); ?>/favori-ekle/<?php echo e($onecikan->id); ?>"><i
                                        class="fa fa-plus-square"></i>Favorilere ekle</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <!--features_items-->



    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">Sizin İçin Seçtiklerimiz</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <div class="item active">
                    <?php $__currentLoopData = $onerilenlerCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $onerilen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key < 3): ?>
                            <a href="<?php echo e(url('/')); ?>/urun/<?php echo e($onerilen->id); ?>">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($onerilen->resim); ?>"
                                                    alt="<?php echo e($onerilen->resim); ?>" />
                                                <h2><?php echo e($onerilen->fiyat); ?>₺</h2>
                                                <p><?php echo e($onerilen->marka); ?> <?php echo e($onerilen->tur); ?></p>
                                                <a href="<?php echo e(url('/')); ?>/favori-ekle/<?php echo e($onerilen->id); ?>" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-star"></i>Favorilere
                                                    ekle</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="item">
                    <?php $__currentLoopData = $onerilenlerCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $onerilen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key >= 3): ?>
                            <a href="<?php echo e(url('/')); ?>/urun/<?php echo e($onerilen->id); ?>">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($onerilen->resim); ?>"
                                                    alt="<?php echo e($onerilen->resim); ?>" />
                                                <h2><?php echo e($onerilen->fiyat); ?>₺</h2>
                                                <p><?php echo e($onerilen->marka); ?> <?php echo e($onerilen->tur); ?></p>
                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Sepete
                                                    ekle</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>




            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--/recommended_items-->

    </div>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\ecomm\resources\views/front/fcontent.blade.php ENDPATH**/ ?>