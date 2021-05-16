

<?php $__env->startSection('title', 'Aranan ' . $aranan); ?>

<?php $__env->startSection('keywords', ''); ?>

<?php $__env->startSection('description', ''); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('front.fsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Aranan</h2>
        <?php if($onecikanlar != null): ?>


            <?php $__currentLoopData = $onecikanlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $onecikan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($onecikan->resim); ?>" alt="t-shirt" />
                                <h2><?php echo e($onecikan->fiyat); ?>₺</h2>
                                <p><?php echo e($onecikan->marka); ?> <?php echo e($onecikan->renk); ?> <?php echo e($onecikan->tur); ?></p>
                                <a href="<?php echo e(url('/')); ?>/urun/<?php echo e($onecikan->id); ?>"
                                    class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>İncele</a>
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

        <?php else: ?>
            <section class="card-items">
                <div class="table-responsive cart_info" style="border: 2px solid rgb(0, 183, 255)">

                    <p style="margin:0 auto !important; text-align:center;color:#ccc;font-size:70px">
                        <i class="fa fa-exclamation-circle"></i> "<?php echo e($aranan); ?>" ürün bulunamadı!

                    </p>
                </div>

            </section>
        <?php endif; ?>
    </div>
    <!--features_items-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.fmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/front/search.blade.php ENDPATH**/ ?>