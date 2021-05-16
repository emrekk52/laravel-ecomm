

<?php $__env->startSection('title', 'Sipariş Detayı'); ?>


<?php $__env->startSection('content'); ?>


    <div class="content-wrapper">

        <section class="content">


            <!-- Default box -->
            <div class="card card-solid">

                <?php
                $kargo = 15;
                $kdv = 12;
                ?>


                <?php $__currentLoopData = $siparisdetay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siparis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none"><?php echo e($siparis->marka); ?> <?php echo e($siparis->tur); ?></h3>
                                <div class="col-7">
                                    <img src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($siparis->resim); ?>" class="product-image"
                                        alt="t-shirt">
                                </div>

                            </div>
                            <div class="col-12 col-sm-5">
                                <h3 class="my-3"><?php echo e($siparis->marka); ?> <?php echo e($siparis->tur); ?></h3>
                                <p><?php echo "{$siparis->description}"; ?></p>

                                <hr>
                                <h4>Renk</h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-default text-center active">
                                        <input type="radio" name="color_option" id="color_option_a1" autocomplete="off"
                                            checked>
                                        <?php echo e($siparis->renk); ?>

                                        <br>
                                        <?php if($siparis->renk == 'KIRMIZI'): ?>
                                            <i class="fas fa-circle fa-2x text-red"></i>
                                        <?php elseif( $siparis->renk =='YEŞİL'): ?>
                                            <i class="fas fa-circle fa-2x text-green"></i>
                                        <?php elseif( $siparis->renk =='SARI'): ?>
                                            <i class="fas fa-circle fa-2x text-yellow"></i>
                                        <?php elseif( $siparis->renk =='MAVİ' || $siparis->renk =='LACİVERT'): ?>
                                            <i class="fas fa-circle fa-2x text-blue"></i>
                                        <?php elseif( $siparis->renk =='BEYAZ' || $siparis->renk =='KREM'): ?>
                                            <i class="fas fa-circle fa-2x text-white"></i>
                                        <?php elseif( $siparis->renk =='SİYAH'): ?>
                                            <i class="fas fa-circle fa-2x text-black"></i>
                                        <?php elseif( $siparis->renk =='PEMBE'): ?>
                                            <i class="fas fa-circle fa-2x text-pink"></i>
                                        <?php elseif( $siparis->renk =='MOR' || $siparis->renk =='BORDO'): ?>
                                            <i class="fas fa-circle fa-2x text-purple"></i>
                                        <?php elseif( $siparis->renk =='GRİ'): ?>
                                            <i class="fas fa-circle fa-2x text-gray"></i>
                                        <?php endif; ?>

                                    </label>


                                </div>

                                <h4 class="mt-3">Beden </h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-default text-center">
                                        <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                        <span class="text-xl"> <?php echo e($siparis->beden); ?></span>
                                        <br>
                                        <?php echo e($siparis->beden_tam); ?>


                                    </label>

                                </div>

                                <div class="bg-gray py-2 px-3 mt-4">
                                    <h2 class="mb-0">
                                        <?php echo e($siparis->fiyat); ?>₺
                                    </h2>
                                    <span> <?php echo e($siparis->fiyat); ?>₺ X <?php echo e($siparis->adet); ?> =
                                        <?php echo e($siparis->fiyat * $siparis->adet); ?>₺</span>
                                </div>
                            </div>
                        </div>



                    </div>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <div class="row">

                    <div class="col-6">

                    </div>

                    <div class="col-6">
                        <p class="lead">Sipariş Tarihi <?php echo e($siparisdetay[0]->siparis_saati); ?></p>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Sepet toplamı:</th>
                                    <td><?php echo "{$siparisdetay[0]->sepet_toplam}" - $kargo - $kdv; ?>₺</td>
                                </tr>
                                <tr>
                                    <th>Kargo</th>
                                    <td><?php if ("{$siparisdetay[0]->sepet_toplam}" - $kargo - $kdv < 100) {
                                            echo $kargo . '₺' ; } else { echo 'Ücretsiz' ; } ?></td>
                                </tr>
                                <tr>
                                    <th>KDV</th>
                                    <td><?php echo $kdv; ?>₺</td>
                                </tr>
                                <tr>
                                    <th>Adres</th>
                                    <td><?php echo e($siparisdetay[0]->adres_basligi); ?><br/><?php echo e($siparisdetay[0]->acik_adres); ?>, <?php echo e($siparisdetay[0]->il); ?>/<?php echo e($siparisdetay[0]->ilce); ?>, <?php echo e($siparisdetay[0]->posta_kodu); ?></td>
                                </tr>
                                <tr>
                                    <th>Telefon</th>
                                    <td><?php echo e($siparisdetay[0]->telefon); ?></td>
                                </tr>
                                <tr>
                                    <th>Sipariş Notu</th>
                                    <td><?php echo e($siparisdetay[0]->siparis_notu); ?></td>
                                </tr>
                                <tr>
                                    <th>Alıcı</th>
                                    <td><?php echo e($siparisdetay[0]->name); ?></td>
                                </tr>
                                <tr>
                                    <th style="width:50%">Sipariş toplamı:</th>
                                    <td><?php echo e($siparisdetay[0]->sepet_toplam); ?>₺</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>



            </div>




        </section>

    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.amaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/siparis_detay.blade.php ENDPATH**/ ?>