<?php $__env->startSection('sidebar'); ?>

    <div class="left-sidebar">
        <h2>Kategoriler</h2>
        <div class="panel-group category-products" id="accordian">
            <!--category-productsr-->



            <?php $__currentLoopData = $turler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a
                                href="<?php echo e(url('/')); ?>/kategoriler/<?php echo e($tur->id); ?>"><?php echo e($tur->adi); ?></a></h4>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
        <!--/category-products-->

        <div class="brands_products">
            <!--brands_products-->
            <h2>Markalar</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <?php $__currentLoopData = $markalar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $marka): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('/')); ?>/markalar/<?php echo e($marka->id); ?>"> <span
                                    class="pull-right">(<?php echo e($collection[$key]); ?>)</span><?php echo e($marka->marka); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </ul>
            </div>
        </div>
        <!--/brands_products-->

        <div class="price-range">
            <!--price-range-->
            <h2>Fiyat Aralığı</h2>
            <div class="well text-center">
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="<?php echo e($fiyatlar[0]->fiyat); ?>"
                    data-slider-step="5" data-slider-value="[0,100]" id="sl2"><br />

                <b class="pull-left">₺ 0</b> <b class="pull-right">₺ <?php echo e($fiyatlar[0]->fiyat); ?></b>


            </div>
        </div>
        <!--/price-range-->

        <div class="shipping text-center">
            <!--shipping-->
            <img src="<?php echo e(url('/')); ?>/assets/front/images/home/shipping.jpg" alt="reklam" />
        </div>
        <!--/shipping-->

    </div>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\ecomm\resources\views/front/fsidebar.blade.php ENDPATH**/ ?>