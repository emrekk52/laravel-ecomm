<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giriş Yap</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/admin/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?php echo e(url('/')); ?>/anasayfa" class="h1"><b>E-</b>SHOPPER</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Oturum açın..</p>

                <?php if(\Session::has('message')): ?>
                    <div class="alert bg-danger">
                        <p style="margin: 0 auto!important">
                            <?php echo e(\Session::get('message')); ?>

                        </p>
                    </div>
                <?php endif; ?>

                <?php if(\Session::has('success')): ?>
                    <div class="alert bg-success">
                        <p style="margin: 0 auto!important">
                            <?php echo e(\Session::get('success')); ?>

                        </p>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(url('/')); ?>/admin/login" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input maxlength="100" required name="email" type="email" class="form-control"
                            placeholder="E-mail">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input minlength="8" maxlength="100" required name="password" type="password"
                            class="form-control" placeholder="Şifre">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Beni hatırla
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Giriş yap</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>




                <p class="mb-1">
                    <a href="forgot-password.html">Şifremi unuttum</a>
                </p>
                <p class="mb-0">
                    <a href="<?php echo e(url('/')); ?>/admin/register" class="text-center">Kayıt ol</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo e(url('/')); ?>/assets/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(url('/')); ?>/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(url('/')); ?>/assets/admin/js/adminlte.min.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/login.blade.php ENDPATH**/ ?>