

<?php $__env->startSection('title', 'Siparişler'); ?>

<?php $__env->startSection('keywords', ''); ?>



<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Siparişler</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item badge bg-primary" style="font-size:20px;margin-bottom:10px">Tüm
                                siparişler / <?php echo e($siparistoplam); ?></li>   
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
                                <th style="width: 10px">Sepet ID</th>
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
                                    <td><?php echo e($siparis->sepet_id); ?></td>
                                    <td><?php echo e($siparis->sepet_toplam); ?>₺</td>
                                    <td><?php echo e($siparis->siparis_durum); ?></td>
                                    <td><?php echo e($siparis->siparis_saati); ?></td>
                                    <td><span class="badge bg-primary"><?php echo e($siparis->siparis_notu); ?></span></td>
                                    <td>
                                        <a class="btn btn-block btn-outline-success btn-xs"
                                            href="<?php echo e(url('/')); ?>/admin/siparis-onayla/<?php echo e($siparis->id); ?>">Onayla</a>
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

<?php echo $__env->make('layouts.admin.amaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/siparisler.blade.php ENDPATH**/ ?>