<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profilim</h1>
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
                                    src="<?php echo e(url('/')); ?>/userimage/<?php echo e(Auth::user()->images); ?>">
                            </div>

                            <h3 class="profile-username text-center"><?php echo e(Auth::user()->name); ?></h3>

                            <p class="text-muted text-center"><?php echo e(Auth::user()->role); ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>E-mail</b> <a class="float-right"><?php echo e(Auth::user()->email); ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Hesap Durumu</b>
                                    <?php if(Auth::user()->active == 'True'): ?>
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
<?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/content.blade.php ENDPATH**/ ?>