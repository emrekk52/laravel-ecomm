

<?php $__env->startSection('title', 'T-Shirt Düzenle'); ?>

<?php $__env->startSection('keywords', ''); ?>



<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">


        <section class="content">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">T-Shirt Düzenle</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="<?php echo e(url('/')); ?>/admin/urun/update/<?php echo e($data[0]->id); ?>"
                    enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <div class="card-body">
                        <div class="form-group">
                            <label>Marka</label>
                            <select class="form-control" name="marka_id">
                                <option value="<?php echo e($data[0]->marka_id); ?>" selected><?php echo e($data[0]->marka); ?></option>
                                <?php $__currentLoopData = $markalar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marka): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($marka->id); ?>"><?php echo e($marka->marka); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>


                        <div class="form-group">
                            <label>T-Shirt Türü</label>
                            <select class="form-control" name="tur_id">
                                <option value="<?php echo e($data[0]->turid); ?>" selected><?php echo e($data[0]->tur); ?></option>
                                <?php $__currentLoopData = $turler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tur->id); ?>"><?php echo e($tur->adi); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>


                        <div class="form-group">
                            <label>Beden Tablosu</label>
                            <div class="form-group">
                           
                                <?php $__currentLoopData = $bedenler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $beden): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label><?php echo e($beden->beden_adi); ?>

                                    <?php if($bedenstok!=null): ?>
                                    <input
                                    class="form-control"
                                    value="<?php echo e($bedenstok[$key]->beden_stok); ?>"
                                    onchange="stokbelirle(<?php echo e(count($bedenler)); ?>)" placeholder="ürün yoksa 0 yazın"
                                    required name="beden_<?php echo e($beden->id); ?>" id="beden_<?php echo e($beden->id); ?>"
                                    type="number"><br />
                                    <?php else: ?>
                                        
                        
                                    <input
                                        value="0"
                                        onchange="stokbelirle(<?php echo e(count($bedenler)); ?>)" placeholder="ürün yoksa 0 yazın"
                                        required name="beden_<?php echo e($beden->id); ?>" id="beden_<?php echo e($beden->id); ?>"
                                        type="number"><br />
                                        <?php endif; ?>

                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Renk</label>
                            <input required type="text" value="<?php echo e($data[0]->renk); ?>" class="form-control" name="renk"
                                id="renk" placeholder="örn. Kırmızı">
                        </div>
                        <div class="form-group">
                            <label>Fiyat</label>
                            <input required type="number" value="<?php echo e($data[0]->fiyat); ?>" class="form-control" name="fiyat"
                                id="fiyat" placeholder="örn. 159₺">
                        </div>
                        <div class="form-group">
                            <label>Stok Miktarı</label>
                            <input required type="number" value="<?php echo e($data[0]->stok); ?>" class="form-control" name="stok"
                                id="stok" placeholder="örn. 5000">
                        </div>

                        <div class="form-group">
                            <label>Açıklama</label>
                            <textarea class="form-control" name="description" id="description" placeholder="eğer varsa"
                                rows="10" cols="80"><?php echo e($data[0]->description); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Anahtar Kelimeler</label>
                            <input type="text" class="form-control" value="<?php echo e($data[0]->keywords); ?>" name="keywords"
                                id="keywords" placeholder="eğer varsa">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Resim</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="hidden" name="resim2" value="<?php echo e($data[0]->resim); ?>">
                                    <input onchange="showname()" value="<?php echo e($data[0]->resim); ?>" type="file"
                                        class="custom-file-input" name="resim" id="resim"
                                        accept="image/png, image/jpeg, image/jpg">
                                    <label class="custom-file-label" id="resimDetay"
                                        style="color:#808080;"><?php echo e($data[0]->resim); ?>

                                    </label>
                                </div>

                            </div>
                        </div>
                        <a href="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($data[0]->resim); ?>" rel="lightbox2"
                            title="<?php echo e($data[0]->resim); ?>">
                            <img alt="t-shirt" src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($data[0]->resim); ?>"
                                height="80px">
                        </a>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Düzenlemeyi Kaydet</button>
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

        function stokbelirle(length) {


            toplamStok = 0;

            for (var i = 1; i < length + 1; i++) {

                toplamStok += +$("#beden_" + i).val();
            }

            document.getElementById('stok').value = toplamStok;
            console.log(document.getElementById('stok').value);
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


<?php $__env->startSection('java'); ?>
    <script src="<?php echo e(url('/')); ?>/assets/admin/plugins/summernote/summernote.js"></script>
    <link href="<?php echo e(url('/')); ?>/assets/admin/plugins/summernote/summernote.css" rel="stylesheet">

    <script>
        $(function() {
            // Summernote
            $('#description').summernote()

        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.amaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/urun_duzenleme_form.blade.php ENDPATH**/ ?>