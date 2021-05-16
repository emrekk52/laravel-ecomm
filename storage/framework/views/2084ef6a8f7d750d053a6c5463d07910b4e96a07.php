

<?php $__env->startSection('title', 'Kullanıcı '.$user[0]->name ); ?>

<?php $__env->startSection('keywords', ''); ?>



<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo e($user[0]->name); ?> </h1>

                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">


                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">


                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="<?php echo e(url('/')); ?>/userimage/<?php echo e($user[0]->images); ?>">
                                </div>

                                <h3 class="profile-username text-center"><?php echo e($user[0]->name); ?></h3>

                                <p class="text-muted text-center"><?php echo e($user[0]->role); ?></p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>E-mail</b> <a class="float-right"><?php echo e($user[0]->email); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Hesap Durumu</b>
                                        <?php if($user[0]->active == 'True'): ?>
                                            <a class="float-right">Aktif</a>
                                        <?php else: ?>
                                            <a class="float-right">Pasif</a>
                                        <?php endif; ?>


                                    </li>

                                    <?php if($adres != null): ?>

                                        <li class="list-group-item">
                                            <b>Şehir</b> <a class="float-right"><?php echo e($adres[0]->il); ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>İlçe</b> <a class="float-right"><?php echo e($adres[0]->ilce); ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Açık adres</b> <a class="float-right"><?php echo e($adres[0]->acik_adres); ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Posta kodu</b> <a class="float-right"><?php echo e($adres[0]->posta_kodu); ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Telefon</b> <a class="float-right"><?php echo e($adres[0]->telefon); ?></a>
                                        </li>




                                    <?php endif; ?>


                                </ul>


                            </div>
                            <!-- /.card-body -->
                        </div>





                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#ayarlar"
                                            data-toggle="tab">Profili Düzenle</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#siparis"
                                            data-toggle="tab">Siparişler</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#sepet" data-toggle="tab">Sepetler</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#favori" data-toggle="tab">Favoriler</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="active tab-pane" id="ayarlar">
                                        <form class="form-horizontal" action="<?php echo e(url('/')); ?>/profil-guncelle"
                                            method="POST" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>

                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Adı</label>
                                                <div class="col-sm-10">
                                                    <input value="<?php echo e($user[0]->name); ?>" required type="text"
                                                        class="form-control" name="name" placeholder="Adı">
                                                    <input name="user_id" value="<?php echo e($user[0]->id); ?>" type="hidden">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">E-mail </label>
                                                <div class="col-sm-10">
                                                    <input value="<?php echo e($user[0]->email); ?>" required type="email"
                                                        class="form-control" name="email" placeholder="E-mail">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Şifre *</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="password"
                                                        placeholder="Şifre">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">Hesap
                                                    Durumu</label>
                                                <div class="col-sm-10">
                                                    <select required class="form-control" name="hesap_durum">
                                                        <?php if($user[0]->active == 'True'): ?>
                                                            <option value="True">Aktif</option>
                                                            <option value="False">Pasif</option>
                                                        <?php else: ?>
                                                            <option value="False">Pasif</option>
                                                            <option value="True">Aktif</option>

                                                        <?php endif; ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Hesap
                                                    Tipi</label>
                                                <div class="col-sm-10">
                                                    <select required class="form-control" name="hesap_tipi">
                                                        <?php if($user[0]->role == 'admin'): ?>
                                                            <option value="admin">Admin</option>
                                                            <option value="user">User</option>

                                                        <?php else: ?>
                                                            <option value="user">User</option>
                                                            <option value="admin">Admin</option>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <?php if($adres != null): ?>



                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Şehir</label>
                                                    <div class="col-sm-10">
                                                        <input required value="<?php echo e($adres[0]->il); ?>" type="text"
                                                            class="form-control" name="sehir" placeholder="Şehir">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">İlçe</label>
                                                    <div class="col-sm-10">
                                                        <input required value="<?php echo e($adres[0]->ilce); ?>" type="text"
                                                            class="form-control" name="ilce" placeholder="İlçe">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Açık
                                                        Adres</label>
                                                    <div class="col-sm-10">
                                                        <textarea required class="form-control" name="acik_adres"
                                                            placeholder="İlçe"><?php echo e($adres[0]->acik_adres); ?></textarea>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Posta
                                                        Kodu</label>
                                                    <div class="col-sm-10">
                                                        <input required value="<?php echo e($adres[0]->posta_kodu); ?>" type="text"
                                                            class="form-control" name="posta_kodu" placeholder="Posta kodu">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Telefon</label>
                                                    <div class="col-sm-10">
                                                        <input required value="<?php echo e($adres[0]->telefon); ?>" type="text"
                                                            class="form-control" name="telefon" placeholder="Telefon">
                                                    </div>
                                                </div>



                                            <?php else: ?>


                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Şehir</label>
                                                    <div class="col-sm-10">
                                                        <input required type="text" class="form-control" name="sehir"
                                                            placeholder="Şehir">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">İlçe</label>
                                                    <div class="col-sm-10">
                                                        <input required type="text" class="form-control" name="ilce"
                                                            placeholder="İlçe">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Açık
                                                        Adres</label>
                                                    <div class="col-sm-10">
                                                        <textarea required class="form-control" name="acik_adres"
                                                            placeholder="İlçe"></textarea>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Posta
                                                        Kodu</label>
                                                    <div class="col-sm-10">
                                                        <input required type="text" class="form-control" name="posta_kodu"
                                                            placeholder="Posta kodu">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Telefon</label>
                                                    <div class="col-sm-10">
                                                        <input required type="text" class="form-control" name="telefon"
                                                            placeholder="Telefon">
                                                    </div>
                                                </div>



                                            <?php endif; ?>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Bilgileri
                                                        Güncelle</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                    <div class="tab-pane" id="sepet">

                                        <section class="content">

                                            <!-- Default box -->
                                            <div class="card">

                                                <div class="card-body p-0">
                                                    <table class="table table-striped projects">
                                                        <thead>



                                                            <tr>
                                                                <th style="width: 10%">
                                                                    Sepet ID
                                                                </th>
                                                                <th style="width: 20%">
                                                                    Ürün
                                                                </th>
                                                                <th style="width: 10%">
                                                                    Resim
                                                                </th>
                                                                <th style="width: 10%">
                                                                    Beden
                                                                </th>
                                                                <th style="width: 10%">
                                                                    Renk
                                                                </th>
                                                                <th style="width: 8%" class="text-center">
                                                                    Adet
                                                                </th>
                                                                <th style="width: 20%">

                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $__currentLoopData = $sepetler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sepet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo e($sepet->sepet_id); ?>

                                                                    </td>
                                                                    <td>
                                                                        <a>
                                                                            <?php echo e($sepet->marka); ?> <?php echo e($sepet->tur); ?>

                                                                        </a>
                                                                        <br />
                                                                        <small>
                                                                            <?php echo e($sepet->id); ?>

                                                                        </small>
                                                                    </td>
                                                                    <td>
                                                                        <ul class="list-inline">
                                                                            <li class="list-inline-item">
                                                                                <a rel="lightbox2"
                                                                                    href="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($sepet->resim); ?>">
                                                                                    <img alt="Avatar" class="table-avatar"
                                                                                        src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($sepet->resim); ?>"></a>
                                                                            </li>

                                                                        </ul>
                                                                    </td>
                                                                    <td>
                                                                        <p
                                                                            style="text-align:center;background-color: rgb(0, 140, 255);color:white;border-radius:10px;text-transform:uppercase;">
                                                                            <?php echo e($sepet->beden); ?></p>
                                                                    </td>
                                                                    <td class="project-state">
                                                                        <span class="badge badge-primary">
                                                                            <?php echo e($sepet->renk); ?>

                                                                        </span>
                                                                    </td>
                                                                    <td class="project-state">
                                                                        <span class="badge badge-primary">
                                                                            <?php echo e($sepet->urun_adet); ?>

                                                                        </span>
                                                                    </td>
                                                                    <td class="project-actions text-right">
                                                                        <a class="btn btn-primary btn-sm"
                                                                            href="<?php echo e(url('/')); ?>/urun/<?php echo e($sepet->id); ?>">
                                                                            <i class="fas fa-folder">
                                                                            </i>
                                                                            Ürün
                                                                        </a>


                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->

                                        </section>


                                    </div>

                                    <div class="tab-pane" id="favori">

                                        <section class="content">

                                            <!-- Default box -->
                                            <div class="card">

                                                <div class="card-body p-0">
                                                    <table class="table table-striped projects">
                                                        <thead>



                                                            <tr>
                                                                <th style="width: 15%">
                                                                    Favori ID
                                                                </th>
                                                                <th style="width: 20%">
                                                                    Ürün
                                                                </th>
                                                                <th style="width: 10%">
                                                                    Resim
                                                                </th>

                                                                <th style="width: 10%">
                                                                    Renk
                                                                </th>

                                                                <th style="width: 20%">

                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $__currentLoopData = $favoriler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo e($favori->fav_id); ?>

                                                                    </td>
                                                                    <td>
                                                                        <a>
                                                                            <?php echo e($favori->marka); ?> <?php echo e($favori->tur); ?>

                                                                        </a>
                                                                        <br />
                                                                        <small>
                                                                            <?php echo e($favori->id); ?>

                                                                        </small>
                                                                    </td>
                                                                    <td>
                                                                        <ul class="list-inline">
                                                                            <li class="list-inline-item">
                                                                                <a rel="lightbox2"
                                                                                    href="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($favori->resim); ?>">
                                                                                    <img alt="Avatar" class="table-avatar"
                                                                                        src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($favori->resim); ?>"></a>
                                                                            </li>

                                                                        </ul>
                                                                    </td>

                                                                    <td class="project-state">
                                                                        <span class="badge badge-primary">
                                                                            <?php echo e($favori->renk); ?>

                                                                        </span>
                                                                    </td>

                                                                    <td class="project-actions text-right">
                                                                        <a class="btn btn-primary btn-sm"
                                                                            href="<?php echo e(url('/')); ?>/urun/<?php echo e($favori->id); ?>">
                                                                            <i class="fas fa-folder">
                                                                            </i>
                                                                            Ürün
                                                                        </a>


                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->

                                        </section>


                                    </div>

                                    <div class="tab-pane" id="siparis">

                                        <section class="content">

                                            <div class="card">




                                                <div class="card-body">
                                                    <table class="table table-bordered">

                                                        <thead>
                                                            <tr>
                                                                <th style="width: 10px">Sipariş ID</th>
                                                                <th>Sepet Toplamı</th>
                                                                <th>Sipariş Durumu</th>
                                                                <th>Sipariş Saati</th>
                                                                <th>Sipariş Notu</th>
                                                                <th>Sipariş Onayla</th>
                                                                <th>Detay</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                            <?php $__currentLoopData = $siparisler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siparis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($siparis->id); ?></td>
                                                                    <td><?php echo e($siparis->sepet_toplam); ?>₺</td>
                                                                    <td><?php echo e($siparis->siparis_durum); ?></td>
                                                                    <td><?php echo e($siparis->siparis_saati); ?></td>
                                                                    <td><span
                                                                            class="badge bg-primary"><?php echo e($siparis->siparis_notu); ?></span>
                                                                    </td>
                                                                    <td>
                                                                        <?php if($siparis->siparis_durum != 'ONAYLANDI'): ?>
                                                                            <a class="btn btn-block btn-outline-success btn-xs"
                                                                                href="<?php echo e(url('/')); ?>/admin/siparis-onayla/<?php echo e($siparis->id); ?>">Onayla</a>
                                                                        <?php endif; ?>

                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-block btn-outline-primary btn-xs"
                                                                            href="<?php echo e(url('/')); ?>/admin/siparis/detay/<?php echo e($siparis->id); ?>">Detay</a>
                                                                    </td>

                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>



                                        </section>


                                    </div>

                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.amaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/profile.blade.php ENDPATH**/ ?>