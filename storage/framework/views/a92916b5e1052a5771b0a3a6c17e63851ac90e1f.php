

<?php $__env->startSection('title', 'T-Shirt Ekleme'); ?>

<?php $__env->startSection('keywords', ''); ?>



<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">


        <section class="content">

            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">T-Shirt Ekle</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="<?php echo e(url('/')); ?>/admin/urun/kaydet" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <div class="card-body">
                        <div class="form-group">
                            <label>Marka</label>
                            <select onchange="aciklamayaz()" id="marka_group" class="form-control" name="marka_id">
                                <?php $__currentLoopData = $markalar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marka): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($marka->id); ?>"><?php echo e($marka->marka); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>


                        <div class="form-group">
                            <label>T-Shirt Türü</label>
                            <select onchange="aciklamayaz()" id="tur_group" class="form-control" name="tur_id">

                                <?php $__currentLoopData = $turler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tur->id); ?>"><?php echo e($tur->adi); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>


                        <div class="form-group">
                            <label>Beden Tablosu</label>
                            <div class="form-group">
                                <?php $__currentLoopData = $bedenler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beden): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label><?php echo e($beden->beden_adi); ?> <input class="form-control"
                                        onchange="stokbelirle(<?php echo e(count($bedenler)); ?>)" placeholder="ürün yoksa 0 yazın"
                                        required name="beden_<?php echo e($beden->id); ?>" id="beden_<?php echo e($beden->id); ?>"
                                        type="number"></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Renk</label>
                            <input onchange="aciklamayaz()" onkeyup="this.value = this.value.toUpperCase();" required
                                type="text" class="form-control" name="renk" id="renk" placeholder="örn. Kırmızı">
                        </div>
                        <div class="form-group">
                            <label>Fiyat</label>
                            <input required type="number" class="form-control" name="fiyat" id="fiyat"
                                placeholder="örn. 159₺">
                        </div>
                        <div class="form-group">
                            <label>Stok Miktarı</label>
                            <input  required type="number" class="form-control" name="stok" id="stok"
                                placeholder="örn. 5000">
                        </div>

                        <div class="form-group">
                            <label>Açıklama</label>
                            <textarea onkeyup="this.value = this.value.toUpperCase();" class="form-control"
                                name="description" id="description" placeholder="eğer varsa" rows="10" cols="80"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Anahtar Kelimeler</label>
                            <input type="text" class="form-control" name="keywords" id="keywords" placeholder="eğer varsa">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Resim</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input required onchange="showname()" type="file" class="custom-file-input" name="resim"
                                        id="resim" accept="image/png, image/jpeg, image/jpg, image/webp">
                                    <label class="custom-file-label" id="resimDetay" style="color:#808080;">Resim
                                        seç..</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-danger">Ürün Ekle</button>
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


        function aciklamayaz() {

            var marka = document.getElementById('marka_group');
            marka = marka.options[marka.selectedIndex].text.toLowerCase();
            var tur = document.getElementById('tur_group');
            tur = tur.options[tur.selectedIndex].text.toLowerCase();
            var renk = document.getElementById('renk').value.toLowerCase();


            document.getElementById('keywords').value = marka + ' ' + tur + ' ' + renk;


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

<?php echo $__env->make('layouts.admin.amaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/urun_ekleme_form.blade.php ENDPATH**/ ?>