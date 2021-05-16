<?php $__env->startSection('title', 'Kullanıcı Paneli - ' . Auth::user()->name); ?>

<?php $__env->startSection('keywords', ''); ?>

<?php $__env->startSection('description', ''); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('front.usersidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a style="text-decoration:none;" href="<?php echo e(url('/')); ?>/anasayfa">Anasayfa</a></li>
                    <li class="active">Profil</li>
                </ol>
            </div>
            <!--/breadcrums-->



            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="shopper-info">
                            <p>Kişisel Bilgiler</p>
                            <form method="POST" action="<?php echo e(url('/')); ?>/user/kisisel/save"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input onkeyup="this.value = this.value.toUpperCase();" value="<?php echo e($data[0]->name); ?>"
                                    name="ad" required type="text" maxlength="50" placeholder="Adı *">
                                <input value="<?php echo e($data[0]->email); ?>" name="email" required type="email" maxlength="100"
                                    placeholder="E-mail *">
                                <input name="password" type="password" minlength="8" maxlength="100" placeholder="Şifre *">
                                <label>Hesap Durumu *</label>
                                <select name="durum">
                                    <?php if($data[0]->active == 'True'): ?>
                                        <option value="True">Aktif</option>
                                        <option value="False">Pasif</option>
                                    <?php else: ?>
                                        <option value="False">Pasif</option>
                                        <option value="True">Aktif</option>
                                    <?php endif; ?>
                                </select>

                                <input type="submit" class="btn btn-primary" value="Bilgileri Güncelle">
                                <?php if(\Session::has('m1')): ?>
                                    <div
                                        style="border-radius:4px; background-color:#00a854;border: 2px solid #007e3f;margin-top:15px;">
                                        <p style="margin: 0 auto!important;color:#ffffff">
                                            <?php echo e(\Session::get('m1')); ?>

                                        </p>
                                    </div>
                                <?php endif; ?>
                            </form>

                        </div>
                    </div>
                    <div class="col-sm-5 clearfix">
                        <div class="bill-to">
                            <p>Adres</p>
                            <div class="form-one">
                                <form method="POST" action="<?php echo e(url('/')); ?>/user/adres/save"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php if(count($adres) > 0): ?>
                                        <input onkeyup="this.value = this.value.toUpperCase();"
                                            value="<?php echo e($adres[0]->adres_basligi); ?>" name="adresbaslik" required
                                            maxlength="50" type="text" placeholder="Adres Başlığı (örn. ev) *">
                                        <input onkeyup="this.value = this.value.toUpperCase();"
                                            value="<?php echo e($adres[0]->il); ?>" name="il" required maxlength="50" type="text"
                                            placeholder="İl *">
                                        <input onkeyup="this.value = this.value.toUpperCase();"
                                            value="<?php echo e($adres[0]->ilce); ?>" name="ilce" required maxlength="50" type="text"
                                            placeholder="İlçe *">
                                        <textarea onkeyup="this.value = this.value.toUpperCase();" name="acikadres" required
                                            maxlength="50" style="margin-bottom:10px ;"
                                            placeholder="Açık adres *"><?php echo e($adres[0]->acik_adres); ?></textarea>
                                        <input value="<?php echo e($adres[0]->posta_kodu); ?>" name="postakodu" required
                                            maxlength="50" type="number" placeholder="Posta kodu *">
                                        <input value="<?php echo e($adres[0]->telefon); ?>" name="telefon" required maxlength="10"
                                            type="text" placeholder="Telefon numarası(5XX XXX XXXX)">
                                        <input type="submit" class="btn btn-primary" value="Adresi Güncelle">
                                    <?php else: ?>

                                        <input onkeyup="this.value = this.value.toUpperCase();" name="adresbaslik" required
                                            maxlength="50" type="text" placeholder="Adres Başlığı (örn. ev) *">
                                        <input onkeyup="this.value = this.value.toUpperCase();" name="il" required
                                            maxlength="50" type="text" placeholder="İl *">
                                        <input onkeyup="this.value = this.value.toUpperCase();" name="ilce" required
                                            maxlength="50" type="text" placeholder="İlçe *">
                                        <textarea onkeyup="this.value = this.value.toUpperCase();" name="acikadres" required
                                            maxlength="50" style="margin-bottom:10px ;"
                                            placeholder="Açık adres *"></textarea>
                                        <input name="postakodu" required maxlength="50" type="number"
                                            placeholder="Posta kodu *">
                                        <input name="telefon" required maxlength="10" type="text"
                                            placeholder="Telefon numarası(5XX XXX XXXX)">
                                        <input type="submit" class="btn btn-primary" value="Adresi Güncelle">

                                    <?php endif; ?>

                                    <?php if(\Session::has('m2')): ?>
                                        <div
                                            style="border-radius:4px; background-color:#00a854;border: 2px solid #007e3f;margin-top:15px;">
                                            <p style="margin: 0 auto!important;color:#ffffff">
                                                <?php echo e(\Session::get('m2')); ?>

                                            </p>
                                        </div>
                                    <?php endif; ?>
                                </form>
                            </div>
                            <div class="form-two">
                                <form method="POST" action="<?php echo e(url('/')); ?>/user/kart/save"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php if(count($kart) > 0): ?>
                                        <input onkeyup="this.value = this.value.toUpperCase();"
                                            value="<?php echo e($kart[0]->kart_baslik); ?>" name="kartbaslik" required maxlength="50"
                                            type="text" placeholder="Kart başlığı *">
                                        <input value="<?php echo e($kart[0]->kart_numara); ?>" name="kartnumber" required
                                            maxlength="50" type="number" placeholder="Kart numarası *">
                                        <input value="<?php echo e($kart[0]->kart_sifre); ?>" name="kartpassword" required maxlength="20" type="password"
                                             placeholder="Kart şifresi *">
                                        <input value="<?php echo e($kart[0]->kart_cvv); ?>" name="kartcvv" required type="number"
                                            maxlength="3" placeholder="CVV *">
                                        <input onkeyup="this.value = this.value.toUpperCase();"
                                            value="<?php echo e($kart[0]->kart_skt); ?>" name="kartsonskt" required type="text"
                                            maxlength="5" placeholder="Son kullanma tarihi örn. 12/26 *">
                                        <input type="submit" class="btn btn-primary" value="Kart Bilgilerini Güncelle">
                                    <?php else: ?>
                                        <input onkeyup="this.value = this.value.toUpperCase();" name="kartbaslik" required
                                            maxlength="50" type="text" placeholder="Kart başlığı *">
                                        <input name="kartnumber" required maxlength="50" type="text"
                                            placeholder="Kart numarası *">
                                        <input name="kartpassword" required maxlength="20" type="password"
                                            placeholder="Kart şifresi *">
                                        <input name="kartcvv" required type="number" maxlength="3" placeholder="CVV *">
                                        <input onkeyup="this.value = this.value.toUpperCase();" name="kartsonskt" required
                                            type="text" maxlength="5" placeholder="Son kullanma tarihi örn. 12/26 *">
                                        <input type="submit" class="btn btn-primary" value="Kart Bilgilerini Güncelle">
                                    <?php endif; ?>

                                    <?php if(\Session::has('m3')): ?>
                                        <div
                                            style="border-radius:4px; background-color:#00a854;border: 2px solid #007e3f;margin-top:15px;">
                                            <p style="margin: 0 auto!important;color:#ffffff">
                                                <?php echo e(\Session::get('m3')); ?>

                                            </p>
                                        </div>
                                    <?php endif; ?>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


    </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.fmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/front/user_panel.blade.php ENDPATH**/ ?>