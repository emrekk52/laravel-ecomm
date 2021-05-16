

<?php $__env->startSection('title', 'Mesaj Cevapla'); ?>

<?php $__env->startSection('keywords', ''); ?>



<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Mesaj Cevapla</h1>

                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-body row">


                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                <?php echo e($mesajdetay[0]->role); ?>

                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b><?php echo e($mesajdetay[0]->name); ?></b></h2>
                                        <p class="text-muted text-sm"><b>Hakkında: </b><?php echo e($mesajdetay[0]->role); ?></p>


                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-building"></i></span> Adres:
                                                <?php echo e($mesajdetay[0]->acik_adres); ?>,
                                                <?php echo e($mesajdetay[0]->ilce); ?>/<?php echo e($mesajdetay[0]->il); ?>,
                                                <?php echo e($mesajdetay[0]->posta_kodu); ?></li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-envelope"></i></span>
                                                E-mail :
                                                <?php echo e($mesajdetay[0]->email); ?></li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                                Telefon : +90
                                                <?php echo e($mesajdetay[0]->telefon); ?></li>

                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="<?php echo e(url('/')); ?>/userimage/<?php echo e($mesajdetay[0]->images); ?>"
                                            alt="user-image" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">

                                    <a href="<?php echo e(url('/')); ?>/user/<?php echo e($mesajdetay[0]->user_id); ?>"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> Profili Görüntüle
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-7">
                        <form action="<?php echo e(url('/')); ?>/mesajyanitla" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="inputName">Konu</label>
                                <input readonly type="text" value="<?php echo e($mesajdetay[0]->konu); ?>" class="form-control" />
                                <input type="hidden" name="mesaj_id" value="<?php echo e($mesajdetay[0]->mesaj_id); ?>" />
                            </div>

                            <div class="form-group">
                                <label for="inputMessage">Mesaj</label>
                                <textarea readonly id="inputMessage" class="form-control"
                                    rows="4"><?php echo e($mesajdetay[0]->mesaj); ?></textarea>
                            </div>
                            <?php if($mesajdetay[0]->cevap != null): ?>
                                <div class="card-header bg-success">
                                    <h3 class="card-title">
                                    Yanıtlandı!
                                    </h3>
                                </div>
                                <div class="form-group">
                                    <label for="inputMessage">Cevap</label>
                                    <textarea readonly name="reply" class="form-control"
                                        rows="4"><?php echo e($mesajdetay[0]->cevap); ?></textarea>
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <label for="inputMessage">Yanıtla</label>
                                    <textarea name="reply" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Yanıtla">
                                </div>
                            <?php endif; ?>

                    </div>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.amaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/mesaj_detay.blade.php ENDPATH**/ ?>