

<?php $__env->startSection('title', 'Yorumlarım'); ?>

<?php $__env->startSection('keywords', ''); ?>

<?php $__env->startSection('description', ''); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('front.usersidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if($yorumlar != null): ?>


        <section id="cart_items">
            <div class="container col-md-12">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('/')); ?>/anasayfa">Anasayfa</a></li>
                        <li class="active">Yorumlarım</li>
                    </ol>
                </div>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr style="background-color: rgb(255, 0, 0)"  class="cart_menu">
                                <td class="description">Ürün</td>
                                <td class="price">Yorum</td>
                                <td class="total">Tarih</td>
                                <td class="total">Sil</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $yorumlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yorum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <tr>
                                  
                                    <td class="cart_description">
                                        <h4><a href="<?php echo e(url('/')); ?>/urun/<?php echo e($yorum->urun_id); ?>"><?php echo e($yorum->marka); ?>

                                                <?php echo e($yorum->tur); ?></a></h4>
                                        <p>Ürün ID: <?php echo e($yorum->urun_id); ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo e($yorum->yorum); ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo e($yorum->tarih); ?></p>
                                    </td>
                                
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete"
                                            href="<?php echo e(url('/')); ?>/yorum-sil/<?php echo e($yorum->id); ?>"><i
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
                    <i class="fa fa-comment"></i> Yorumlar boş!
                </p>
            </div>

        </section>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.fmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/front/yorumlar.blade.php ENDPATH**/ ?>