

<?php $__env->startSection('title', 'Mesajlar'); ?>

<?php $__env->startSection('keywords', ''); ?>



<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Mesajlar</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item badge bg-warning" style="font-size:20px;margin-bottom:10px">Tüm
                                Mesajlar / <?php echo e($mesajtoplam); ?></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">





            <div class="card">


                <?php if(\Session::has('message')): ?>
                    <div class="card-header bg-success">
                        </h3 class="card-title">
                        <?php echo e(\Session::get('message')); ?>

                        </h3>
                    </div>
                <?php endif; ?>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>Profil</th>
                                <th>İsim</th>
                                <th>Konu</th>
                                <th>email</th>
                                <th>Mesaj Durumu</th>
                                <th>Gönderilme Saati</th>

                                <th style="width: 10px">Cevapla</th>

                            </tr>
                        </thead>
                        <tbody>


                            <?php $__currentLoopData = $mesajlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mesaj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="image">
                                            <img style="height: 50px;"
                                                src="<?php echo e(url('/')); ?>/userimage/<?php echo e($mesaj->images); ?>"
                                                class="img-circle elevation-2" alt="profile">
                                        </div>
                                    </td>
                                    <td><?php echo e($mesaj->name); ?></td>
                                    <td><?php echo e($mesaj->konu); ?></td>
                                    <td><?php echo e($mesaj->email); ?></td>
                                    <td><span class="badge bg-warning"><?php echo e($mesaj->mesaj_durumu); ?></span></td>
                                    <td><?php echo e($mesaj->gonderilme_saati); ?></td>
                                    <td>
                                        <?php if($mesaj->mesaj_durumu == 'GÖNDERİLDİ'): ?>
                                            <a class="btn btn-block btn-outline-warning btn-xs"
                                                href="<?php echo e(url('/')); ?>/mesaj-detay/<?php echo e($mesaj->mesaj_id); ?>">Cevapla</a>
                                        <?php else: ?>
                                            <a class="btn btn-block btn-outline-success btn-xs"
                                                href="<?php echo e(url('/')); ?>/mesaj-detay/<?php echo e($mesaj->mesaj_id); ?>">Cevabı
                                                gör</a>
                                        <?php endif; ?>

                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>

            </div>

            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.amaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/mesajlar.blade.php ENDPATH**/ ?>