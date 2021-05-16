

<?php $__env->startSection('title', 'Kullanıcılar'); ?>

<?php $__env->startSection('keywords', ''); ?>



<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kullanıcılar</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item badge bg-danger" style="font-size:20px;margin-bottom:10px">Tüm
                                kullanıcılar / <?php echo e(count($users)); ?></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">

                <?php if(\Session::has('message')): ?>
                    <div class="card-header bg-success">
                        </h3 class="card-title">
                        <?php echo e(\Session::get('message')); ?>

                        </h3>
                    </div>
                <?php endif; ?>

                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>



                            <tr>
                                <th style="width: 10%">
                                    Kullanıcı ID
                                </th>
                                <th style="width: 20%">
                                    Ad - Soyad
                                </th>
                                <th style="width: 10%">
                                    Profil
                                </th>
                                <th style="width: 10%">
                                    Yetki
                                </th>
                                <th style="width: 8%" class="text-center">
                                    Hesap Durumu
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($user->id); ?>

                                    </td>
                                    <td>
                                        <a>
                                            <?php echo e($user->name); ?>

                                        </a>
                                        <br />
                                        <small>
                                            <?php echo e($user->email); ?>

                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a rel="lightbox2"
                                                    href="<?php echo e(url('/')); ?>/userimage/<?php echo e($user->images); ?>">
                                                    <img alt="Avatar" class="table-avatar"
                                                        src="<?php echo e(url('/')); ?>/userimage/<?php echo e($user->images); ?>"></a>
                                            </li>

                                        </ul>
                                    </td>
                                    <td>
                                        <p
                                            style="text-align:center;background-color: rgb(0, 140, 255);color:white;border-radius:10px;text-transform:uppercase;">
                                            <?php echo e($user->role); ?></p>
                                    </td>
                                    <td class="project-state">

                                        <?php if($user->active == 'True'): ?>

                                            <span class="badge badge-success">Aktif </span>
                                        <?php else: ?>
                                        <span class="badge badge-danger">Pasif </span>
                                        <?php endif; ?>


                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm"
                                            href="<?php echo e(url('/')); ?>/user/<?php echo e($user->id); ?>">
                                            <i class="fas fa-folder">
                                            </i>
                                            Detaylar
                                        </a>

                                        <a onclick="return confirm('Bu kullanıcıyı gerçekten silmek istiyor musun?')"
                                            class="btn btn-danger btn-sm"
                                            href="<?php echo e(url('/')); ?>/user/delete/<?php echo e($user->id); ?>">
                                            <i class="fas fa-trash">
                                            </i>
                                            Hesabı Sil
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
        <!-- /.content -->
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.amaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/users.blade.php ENDPATH**/ ?>