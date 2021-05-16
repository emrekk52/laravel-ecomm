

<?php $__env->startSection('title', 'Sepetim'); ?>

<?php $__env->startSection('keywords', ''); ?>

<?php $__env->startSection('description', ''); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('front.usersidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if($sepetler != null): ?>



        <section id="cart_items">

            <div class="container col-md-12">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('/')); ?>/anasayfa">Anasayfa</a></li>
                        <li class="active">Sepetim</li>
                    </ol>
                </div>

                <div class="review-payment">
                    <h2>Sepet & Ödeme</h2>
                </div>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr style="background-color:rgb(212, 0, 255);" class="cart_menu">
                                <td class="image col-md-2">Resim</td>
                                <td class="description col-md-2">Marka</td>
                                <td class="price col-md-2">Tür</td>
                                <td class="total">Renk</td>
                                <td>Fiyat</td>
                                <td>Beden</td>
                                <td>Adet</td>
                                <td>Sil</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $toplamtutar = 0;
                            $kdv = 12;
                            $kargo = 15;
                            ?>

                            <?php $__currentLoopData = $sepetler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sepet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td class="cart_product">
                                        <a rel="lightbox2" href="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($sepet->resim); ?>"><img
                                                style="height: 150px;"
                                                src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($sepet->resim); ?>"
                                                alt="<?php echo e($sepet->resim); ?>"></a>
                                    </td>
                                    <td style="text-align:center;" class="cart_description">
                                        <h4><a href="<?php echo e(url('/')); ?>/urun/<?php echo e($sepet->id); ?>"><?php echo e($sepet->marka); ?>

                                            </a></h4>
                                        <p>Sepet ID: <?php echo e($sepet->sepetid); ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo e($sepet->tur); ?></p>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo e($sepet->renk); ?></p>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">
                                            <?php echo e($sepet->fiyat); ?>₺</p>
                                        <?php $toplamtutar += $sepet->fiyat * $sepet->urun_adet; ?>

                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price"><?php echo e($sepet->beden_adi); ?></p>
                                    </td>

                                    <td class="cart_total">
                                        <p class="cart_total_price"><?php echo e($sepet->urun_adet); ?></p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete"
                                            href="<?php echo e(url('/')); ?>/sepet-sil/<?php echo e($sepet->sepet_id); ?>"><i
                                                class="fa fa-times"></i></a>
                                    </td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($sepetler != null): ?>

                                <form action="<?php echo e(url('/')); ?>/siparis-ekle" method="POST"
                                    enctype="multipart/form-data">

                                    <?php echo csrf_field(); ?>
                                    <tr>
                                        <td colspan="4">&nbsp;</td>

                                        <td colspan="4">
                                            <table class="table table-condensed total-result">
                                                <tr>
                                                    <td><a style="color:orange"> 100₺ üzeri alışverişlerde kargo
                                                            ücretsiz</a>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Sepet tutarı</td>
                                                    <td><?php echo $toplamtutar; ?>₺</td>
                                                </tr>
                                                <tr>
                                                    <td>KDV</td>
                                                    <td><?php echo $kdv; ?>₺</td>
                                                </tr>
                                                <tr class="shipping-cost">
                                                    <td>Kargo ücreti</td>
                                                    <td><?php if ($toplamtutar < 100) { echo $kargo . '₺' ; }
                                                            else { echo 'Ücretsiz' ; } ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Toplam ödenecek tutar</td>

                                                    <td name="toplamtutar"><span><?php if ($toplamtutar >
                                                                100) { echo $toplamtutar + $kdv ;}
                                                                else {
                                                                    echo $toplamtutar + $kdv + $kargo;
                                                                } ?>₺</span>
                                                    </td>
                                                    <input name="toplam" type="hidden"
                                                        value="<?php if ($toplamtutar >
                                                        100) { echo $toplamtutar + $kdv ;}
                                                        else {
                                                            echo $toplamtutar + $kdv + $kargo;
                                                        } ?>">
                                                    <input name="sepet_id" type="hidden"
                                                        value="<?php echo e($sepetler[0]->sepetid); ?>">
                                                </tr>
                                                <tr>
                                                    <td><label>Sipariş notu</label>
                                                        <textarea name="siparis_notu"
                                                            placeholder="sipariş notunu giriniz.."></textarea>


                                                    </td>
                                                    <td><input type="submit" class="btn btn-primary"
                                                            value="Alışverişi tamamla"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </form>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    <?php else: ?>

        <section class="card-items">
            <div class="table-responsive cart_info" style="border: 2px solid orange">

                <p style="margin:0 auto !important; text-align:center;color:#ccc;font-size:70px">
                    <i class="fa fa-shopping-cart"></i> Sepetiniz boş!
                </p>
            </div>

        </section>

    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.fmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/front/sepetler.blade.php ENDPATH**/ ?>