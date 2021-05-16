

<?php $__env->startSection('title', 'T-Shirt Resimleri Ekleme'); ?>

<?php $__env->startSection('keywords', ''); ?>



<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">


        <section class="content">

            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">T-Shirt Resim Ekle</h3>
                </div>



                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="<?php echo e(url('/')); ?>/admin/urun/resimler/<?php echo e($veri[0]->id); ?>"
                    enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <div class="card-body">
                        <div class="form-group">
                            <label>Marka</label>
                            <input required type="text" disabled value="<?php echo e($veri[0]->id); ?> - <?php echo e($veri[0]->marka); ?>" class="form-control"
                                name="marka" id="marka" placeholder="örn. Nike">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Resim</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input required onchange="showname()" type="file" class="custom-file-input" name="resim"
                                        id="resim" accept="image/png, image/jpeg, image/jpg">
                                    <label class="custom-file-label" id="resimDetay" style="color:#808080;">Resim
                                        seç..</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Resimler</label>
                            <div class="input-group">
                                <input type="hidden" name="id" value="<?php echo e($veri[0]->id); ?>">
                                <a href="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($veri[0]->resim); ?>" rel="lightbox2"
                                    title="<?php echo e($veri[0]->resim); ?>">
                                    <img alt="t-shirt" style="height: 120px;max-width:80px;margin:10px;"
                                        src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($veri[0]->resim); ?>">
                                </a>
                                <?php $__currentLoopData = $resimler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="form-group">
                                        <a href="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($resim->resim); ?>" rel="lightbox2"
                                            title="<?php echo e($resim->resim); ?>">
                                            <img alt="t-shirt" style="height: 120px;max-width:80px;margin:10px;"
                                                src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($resim->resim); ?>">
                                        </a>
                                        <div class="input-group">

                                            <a style="margin: auto;"
                                                href="<?php echo e(url('/')); ?>/admin/urun/resim_sil/<?php echo e($resim->id); ?>/<?php echo e($resim->tshirt_id); ?>"
                                                onclick="return confirm('Gerçekten silmek istiyor musunuz?')">Resmi Sil</a>

                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>

                        <?php if(\Session::has('success')): ?>
                            <div class="card-header bg-success">
                                </h3 class="card-title">
                                <?php echo e(\Session::get('success')); ?>

                                </h3>
                            </div>
                        <?php endif; ?>

                    </div>




                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">Resim Ekle</button>
                    </div>

                </form>
            </div>
        </section>
    </div>


    <script type="text/javascript">
        function showname() {
            var name = document.getElementById('resim');
            var resimDetay = document.getElementById('resimDetay');
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.amaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/urun_resimler_form.blade.php ENDPATH**/ ?>