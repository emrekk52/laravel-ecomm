

<?php $__env->startSection('title', 'Yorumlar'); ?>

<?php $__env->startSection('keywords', ''); ?>



<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Yorumlar</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item badge bg-success" style="font-size:20px;margin-bottom:10px">Tüm
                                yorumlar / <?php echo e($yorumtoplam); ?></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row">
                        <?php if($yorumlar != null): ?>


                            <?php $__currentLoopData = $yorumlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yorum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill">
                                        <div class="card-header text-muted border-bottom-0">
                                            <?php echo e($yorum->role); ?>

                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b> <?php echo e($yorum->name); ?></b></h2>
                                                    <p class="text-muted text-sm"><b>Yorum: </b> <?php echo e($yorum->yorum); ?> </p>
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-lg fa-shopping-cart"></i></span> Ürün:<a
                                                                href="<?php echo e(url('/')); ?>/urun/<?php echo e($yorum->tisort_id); ?>">
                                                                <?php echo e($yorum->marka); ?> <?php echo e($yorum->adi); ?></a></li>
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-lg fa-phone"></i></span> Telefon : +90
                                                            <?php echo e($yorum->telefon); ?> </li>
                                                        <li class="small"><span class="fa-li"><i
                                                                    class="fas fa-lg fa-envelope"></i></span> E-mail :
                                                            <?php echo e($yorum->email); ?> </li>
                                                            <li class="small"><span class="fa-li"><i
                                                                class="fas fa-lg fa-clock"></i></span> Tarih :
                                                        <?php echo e($yorum->tarih); ?> </li>
                                                    </ul>
                                                </div>
                                                <div class="col-5 text-center">
                                                    <a href="<?php echo e(url('/')); ?>/userimage/<?php echo e($yorum->images); ?>"
                                                        rel="lightbox2"> <img
                                                            src="<?php echo e(url('/')); ?>/userimage/<?php echo e($yorum->images); ?>"
                                                            alt="user-avatar" class="img-circle img-fluid"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">

                                                <a href="<?php echo e(url('/')); ?>/user/<?php echo e($yorum->userid); ?>"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fas fa-user"></i> Profile göz at
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>


                    </div>
                </div>
                <!-- /.card-body -->

                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

        </section>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.amaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/yorumlar.blade.php ENDPATH**/ ?>