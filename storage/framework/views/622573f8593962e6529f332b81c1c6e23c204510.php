

<?php $__env->startSection('title', 'Ürünler'); ?>

<?php $__env->startSection('keywords', ''); ?>



<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>T-Shirtler</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item badge bg-warning" style="font-size:20px;margin-bottom:10px">Tüm
                                ürünler / <?php echo e($databaseLength); ?></li>
                            <a href="<?php echo e(url('/')); ?>/admin/urun/ekle"
                                class="btn btn-block btn-outline-secondary btn-xs">Ürün Ekle</a>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">





            <div class="card">


                <?php if(\Session::has('success')): ?>
                    <div class="card-header bg-success">
                        </h3 class="card-title">
                        <?php echo e(\Session::get('success')); ?>

                        </h3>
                    </div>
                <?php endif; ?>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Marka</th>
                                <th>Tür</th>
                                <th>Bedenler</th>
                                <th>Renk</th>
                                <th>Fiyat</th>
                                <th>Resim</th>
                                <th>Stok Adedi</th>
                                <th>Durum</th>
                                <th style="width: 10px">Düzenle</th>
                                <th style="width: 10px">Sil</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php $__currentLoopData = $tisortler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tisort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($tisort->id); ?></td>
                                    <td><?php echo e($tisort->marka); ?></td>
                                    <td><?php echo e($tisort->adi); ?></td>
                                    <td><?php echo e($tisort->bedenler); ?></td>
                                    <td><span class="badge bg-secondary"><?php echo e($tisort->renk); ?></span></td>
                                    <td><?php echo e($tisort->fiyat); ?>₺</td>
                                    <td style="text-align:center"><a
                                            href="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($tisort->resim); ?>" rel="lightbox2"
                                            title="<?php echo e($tisort->resim); ?>"> <img style="height:50px;max-width:80px;"
                                                alt="t-shirt"
                                                src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($tisort->resim); ?>">
                                        </a>
                                        <br />
                                        <a href="<?php echo e(url('/')); ?>/admin/urun/resimler/<?php echo e($tisort->id); ?>"
                                            onclick="return !window.open(this.href,'','top=100 left=200 width=800 height=600')">Diğer Resimler</a>

                                    </td>
                                    <td><?php echo e($tisort->stok); ?></td>
                                    <td><?php echo e($tisort->durum); ?></td>
                                    <td>
                                        <a class="btn btn-block btn-outline-success btn-xs"
                                            href="<?php echo e(url('/')); ?>/admin/urun/edit/<?php echo e($tisort->id); ?>">Düzenle</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-block btn-outline-primary btn-xs"
                                            href="<?php echo e(url('/')); ?>/admin/urun/delete/<?php echo e($tisort->id); ?>"
                                            onclick="return confirm('Gerçekten silmek istiyor musunuz?')">Sil</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>

            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.amaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/urunler.blade.php ENDPATH**/ ?>