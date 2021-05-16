<?php $__env->startSection('sidebar'); ?>

    <div class="left-sidebar">
        <?php if(Auth::check()): ?>
            <h2><?php echo e(Auth::user()->name); ?></h2>
            <div class="panel-group category-products" id="accordian">
                <!--category-productsr-->

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a
                                href="<?php echo e(url('/')); ?>/user/profile">Profil</a>
                        </h4>
                    </div>

                    <div class="panel-heading">
                        <h4 class="panel-title"><a
                                href="<?php echo e(url('/')); ?>/user/siparislerim">Siparişlerim</a></h4>
                    </div>

                    <div class="panel-heading">
                        <h4 class="panel-title"><a
                                href="<?php echo e(url('/')); ?>/user/favorilerim">Favorilerim</a></h4>
                    </div>



                    <div class="panel-heading">
                        <h4 class="panel-title"><a
                                href="<?php echo e(url('/')); ?>/user/sepetim">Sepet</a>
                        </h4>
                    </div>

                    <div class="panel-heading">
                        <h4 class="panel-title"><a
                                href="<?php echo e(url('/')); ?>/user/yorumlarim">Yorumlar</a></h4>
                    </div>

                    <div class="panel-heading">
                        <h4 class="panel-title"><a
                                href="<?php echo e(url('/')); ?>/user/mesajlarim">Mesajlarım</a></h4>
                    </div>

                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="<?php echo e(url('/')); ?>/user/logout">Çıkış Yap</a></h4>
                    </div>



                </div>




            </div>
            <!--/category-products-->
        <?php endif; ?>






    </div>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\ecomm\resources\views/front/usersidebar.blade.php ENDPATH**/ ?>