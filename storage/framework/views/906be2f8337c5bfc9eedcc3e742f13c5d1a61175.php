

<?php $__env->startSection('title', 'Siparişlerim'); ?>

<?php $__env->startSection('keywords', ''); ?>

<?php $__env->startSection('description', ''); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('front.usersidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if($siparisler != null): ?>


        <section id="cart_items">
            <div  class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('/')); ?>/anasayfa">Anasayfa</a></li>
                        <li class="active">Siparişlerim</li>
                    </ol>
                </div>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead >
                            <tr style="background-color:rgb(0, 110, 255);"  class="cart_menu">
                                <td class="image col-md-2">Resim</td>
                                <td class="description ">Ürün</td>
                                <td class="price ">Renk</td>
                                <td class="total ">Sipariş Tarihi</td>
                                <td >Adres</td>
                                <td >Telefon</td>
                                <td >Sipariş Durumu</td>
                                <td >Sipariş Notu</td>
                                <td>Ödenen Tutar</td>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $siparisler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $siparis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <tr>
                                    <td class="cart_product">
                                        <a rel="lightbox2"
                                            href="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($siparis->resim); ?>"><img
                                                style="height: 150px;"
                                                src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($siparis->resim); ?>"
                                                alt="<?php echo e($siparis->resim); ?>"></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="<?php echo e(url('/')); ?>/urun/<?php echo e($siparis->id); ?>"><?php echo e($siparis->marka); ?>

                                                <?php echo e($siparis->tur); ?> <?php echo e($siparis->beden_adi); ?></a></h4>
                                        <p>Sipariş ID: <?php echo e($siparis->siparis_id); ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo e($siparis->renk); ?></p>
                                    </td>

                                    <td class="cart_price">
                                        <p><?php echo e($siparis->siparis_saati); ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo e($siparis->acik_adres); ?>, <?php echo e($siparis->ilce); ?>/<?php echo e($siparis->il); ?>, <?php echo e($siparis->posta_kodu); ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo e($siparis->telefon); ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo e($siparis->siparis_durum); ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo e($siparis->siparis_notu); ?></p>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price"><?php echo e($siparis->toplam_fiyat); ?>₺</p>
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
                    <i class="fa fa-shopping-cart"></i> Siparişler boş!
                </p>
            </div>

        </section>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.fmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/front/siparisler.blade.php ENDPATH**/ ?>