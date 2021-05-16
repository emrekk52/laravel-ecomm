

<?php $__env->startSection('title', 'Mesajlarım'); ?>

<?php $__env->startSection('keywords', ''); ?>

<?php $__env->startSection('description', ''); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('front.usersidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if($mesajlar != null): ?>


        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('/')); ?>/anasayfa">Anasayfa</a></li>
                        <li class="active">Mesajlarım</li>
                    </ol>
                </div>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr style="background-color:rgb(0, 177, 15);" class="cart_menu">
                                <td>Konu</td>
                                <td class="image">Mesaj</td>
                                <td class="description ">Durum</td>
                                <td class="price ">Cevap</td>
                                <td class="total">Gönderilme Tarihi</td>
                                <td>Sil</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $mesajlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mesaj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <tr>

                                    <td class="cart_description">
                                        <h4><a><?php echo e($mesaj->konu); ?>

                                            </a></h4>
                                        <p>Mesaj ID: <?php echo e($mesaj->id); ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo e($mesaj->mesaj); ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo e($mesaj->mesaj_durumu); ?></p>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price"><?php echo e($mesaj->cevap); ?></p>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price"><?php echo e($mesaj->gonderilme_saati); ?></p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete"
                                            href="<?php echo e(url('/')); ?>/mesaj-sil/<?php echo e($mesaj->id); ?>"><i
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
                    <i class="fa fa-envelope"></i> Mesajlar boş!
                </p>
            </div>

        </section>

        

    <?php endif; ?>

    <br />
        <div class="" id="reviews">
            <div class="col-sm-12 ">
                <p><b>Admine Mesaj Yazın</b></p>
                <?php if(\Session::has('message')): ?>
                    <div
                        style="border-radius:4px; background-color:#00c20a;border: 2px solid #018508;margin-top:15px;margin:20px;">
                        <p style="margin: 0 auto!important;color:#ffffff">
                            <?php echo e(\Session::get('message')); ?>

                        </p>
                    </div>
                <?php endif; ?>
                <form enctype="multipart/form-data" action="<?php echo e(url('/')); ?>/mesaj-gonder" method="POST">
                    <?php echo csrf_field(); ?>

                    <span>
                        <input maxlength="20" required name="konu" type="text" placeholder="Konu" />
                        <input readonly value="<?php echo e(Auth::user()->name); ?>" type="text" />

                    </span>



                    <textarea required maxlength="100" placeholder="Mesaj giriniz.. (100 karakter ile sınırlıdır)"
                        name="mesaj"></textarea>

                        <input type="submit" value="GÖNDER" style="background-color:green;border-radius:10px;margin:10px"
                        class="btn btn-default btn-primary pull-right">

                </form>

            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.fmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/front/mesajlar.blade.php ENDPATH**/ ?>