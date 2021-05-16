<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hesap Oluştur</title>

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

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?php echo e(url('/')); ?>/admin/anasayfa" class="h1"><b>E-</b>SHOPPER</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Üyelik oluştur..</p>

                <form action="<?php echo e(url('/')); ?>/admin/register" enctype="multipart/form-data" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input onkeyup="this.value = this.value.toUpperCase();" name="name" required type="text"
                            class="form-control" placeholder="Tam isim">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="email" required type="email" class="form-control" placeholder="E-mail">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input minlength="8" name="password" required type="password" class="form-control"
                            placeholder="Şifre">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group">
                            <div class="custom-file">
                                <input onchange="showname()" type="file" class="custom-file-input" name="profile"
                                    id="profile" accept="image/png, image/jpeg, image/jpg, image/webp">
                                <label class="custom-file-label" id="profilresmi" style="color:#808080;">Profil resmi..
                                    (varsayılan)</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input required type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    Tüm şartları <a href="#">kabul edin</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Kayıt Ol</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <a href="<?php echo e(url('/')); ?>/admin/login" class="text-center">Zaten üyeyim</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?php echo e(url('/')); ?>/assets/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(url('/')); ?>/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(url('/')); ?>/assets/admin/js/adminlte.min.js"></script>

    <script type="text/javascript">

        function showname() {
            var name = document.getElementById('profile');
            var resimDetay = document.getElementById('profilresmi');
            resimDetay.innerHTML = name.files.item(0).name + ', ' + returnFileSize(name.files.item(0).size);

        }


        function returnFileSize(number) {
            if (number < 1024) {
                return number + 'bytes';
            } else if (number >= 1024 && number < 1048576) {
                return (number / 1024).toFixed(1) + 'KB';
            } else if (number >= 1048576) {
                return (number / 1048576).toFixed(1) + 'MB';
            }
        }

    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/register.blade.php ENDPATH**/ ?>