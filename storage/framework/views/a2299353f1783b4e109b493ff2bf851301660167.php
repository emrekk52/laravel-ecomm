<?php $__env->startSection('slider'); ?>



    <div class="col-sm-12">
        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $__currentLoopData = $sliderCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key == 0): ?>
                        <li data-target="#slider-carousel" data-slide-to="<?php echo e($key); ?>" class="active"></li>
                    <?php else: ?>
                        <li data-target="#slider-carousel" data-slide-to="<?php echo e($key); ?>"></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>

            <div class="carousel-inner">

                <?php $__currentLoopData = $sliderCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($key == 0): ?>

                        <div class="item active">
                            <a href="<?php echo e(url('/')); ?>/urun/<?php echo e($slide->id); ?>">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2><?php echo e($slide->marka); ?> <?php echo e($slide->tur); ?></h2>
                                    <p style="background-color: orange;padding:20px;color:white;"><?php echo e($slide->keywords); ?></p>
                                    <button type="button" class="btn btn-default get">Gözat</button>
                                </div>
                                <div class="col-sm-6">
                                    <img style="height: 450px" src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($slide->resim); ?>"
                                        class="girl img-responsive" alt="<?php echo e($slide->resim); ?>" />
                                </div>
                            </a>
                        </div>

                    <?php else: ?>

                        <div class="item">
                            <a href="<?php echo e(url('/')); ?>/urun/<?php echo e($slide->id); ?>">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2><?php echo e($slide->marka); ?> <?php echo e($slide->tur); ?></h2>
                                    <p style="background-color: orange;padding:20px;color:white;"><?php echo e($slide->keywords); ?></p>
                                    <button type="button" class="btn btn-default get">Gözat</button>
                                </div>
                                <div class="col-sm-6">
                                    <img style="height: 450px" src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($slide->resim); ?>"
                                        class="girl img-responsive" alt="<?php echo e($slide->resim); ?>" />

                                </div>
                            </a>
                        </div>

                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>

            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\ecomm\resources\views/front/fslider.blade.php ENDPATH**/ ?>