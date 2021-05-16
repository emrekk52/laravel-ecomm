

<?php $__env->startSection('title', 'Favorilerim'); ?>

<?php $__env->startSection('keywords', ''); ?>

<?php $__env->startSection('description', ''); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('front.usersidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if($favoriler != null): ?>


        <section id="cart_items">
            <div class="container col-md-12">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('/')); ?>/anasayfa">Anasayfa</a></li>
                        <li class="active">Favorilerim</li>
                    </ol>
                </div>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Resim</td>
                                <td class="description col-md-2">Ürün</td>
                                <td class="price col-md-2">Tür</td>
                                <td class="total">Renk</td>
                                <td>Fiyat</td>
                                <td>Sil</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $favoriler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <tr>
                                    <td class="cart_product">
                                        <a rel="lightbox2"
                                            href="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($favori->resim); ?>"><img
                                                style="height: 150px;"
                                                src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($favori->resim); ?>"
                                                alt="<?php echo e($favori->resim); ?>"></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="<?php echo e(url('/')); ?>/urun/<?php echo e($favori->id); ?>"><?php echo e($favori->marka); ?>

                                                <?php echo e($favori->tur); ?></a></h4>
                                        <p>Ürün ID: <?php echo e($favori->id); ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo e($favori->tur); ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo e($favori->renk); ?></p>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price"><?php echo e($favori->fiyat); ?>₺</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete"
                                            href="<?php echo e(url('/')); ?>/favori-sil/<?php echo e($favori->favori_id); ?>"><i
                                                class="fa fa-times"></i></a>
                                    </td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    <?php else: ?>
        <section class="card-items">
            <div class="table-responsive cart_info" style="border: 2px solid orange">

                <p style="margin:0 auto !important; text-align:center;color:#ccc;font-size:70px">
                    <i class="fa fa-star"></i> Favoriler boş!
                </p>
            </div>

        </section>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.fmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/front/favoriler.blade.php ENDPATH**/ ?>