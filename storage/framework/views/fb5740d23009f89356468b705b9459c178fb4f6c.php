<?php $__env->startSection('title', 'Giriş Yap'); ?>

<?php $__env->startSection('keywords', ''); ?>

<?php $__env->startSection('description', ''); ?>

<?php $__env->startSection('content'); ?>

    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Hesabınıza giriş yapın</h2>
                        <form action="<?php echo e(url('/')); ?>/user/login" method="POST">
                            <?php echo csrf_field(); ?>
                            <input required maxlength="100" name="email" type="email" placeholder="Email adresiniz.." />
                            <input name="password" required minlength="8" maxlength="100" type="password"
                                placeholder="Şifre.." />
                            <span>
                                <input type="checkbox" class="checkbox">
                                Beni hatırla
                            </span>
                            <button type="submit" class="btn btn-default">Giriş yap</button>
                        </form>
                    </div>
                    <!--/login form-->
                    <?php if(\Session::has('message')): ?>
                        <div style="border-radius:4px; background-color:#ffa41b;border: 2px solid #fa800f;margin-top:15px;">
                            <p style="margin: 0 auto!important;color:#ffffff">
                                <?php echo e(\Session::get('message')); ?>

                            </p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-sm-1">
                    <h2 class="or">VEYA</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Kayıt olun!</h2>
                        <form action="<?php echo e(url('/')); ?>/user/register" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input name="registername" onkeyup="this.value = this.value.toUpperCase();" type="text"
                                maxlength="50" placeholder="Tam isim" />
                            <input required maxlength="100" name="registeremail" type="email"
                                placeholder="Email adresiniz" />
                            <input name="registerpassword" required minlength="8" maxlength="100" type="password"
                                placeholder="Şifre" />
                            <button type="submit" class="btn btn-default">Kayıt ol</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                    <?php if(\Session::has('rmessage')): ?>
                        <div style="border-radius:4px; background-color:#ff3300;border: 2px solid #fd4800;margin-top:15px;">
                            <p style="margin: 0 auto!important;color:#dddddd">
                                <?php echo e(\Session::get('rmessage')); ?>

                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </section>
    <!--/form-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.fmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/front/login.blade.php ENDPATH**/ ?>