

<?php $__env->startSection('title', $urun[0]->marka . ' ' . $urun[0]->tur); ?>

<?php $__env->startSection('keywords', $urun[0]->keywords); ?>

<?php $__env->startSection('description', $urun[0]->description); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('front.fsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <div class="container">
        <div class="row">
            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">

                            <img id="resim_id" src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($urun[0]->resim); ?>"
                                alt="<?php echo e($urun[0]->resim); ?>" />
                            <a id="link_id" href="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($urun[0]->resim); ?>"
                                title="<?php echo e($urun[0]->resim); ?>" rel="lightbox2">
                                <h3>Büyüt</h3>
                            </a>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a onclick="addImage('<?php echo e(url('/')); ?>/tisortimage/<?php echo e($urun[0]->resim); ?>')"><img
                                            style="width: 84px;height:84px"
                                            src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($urun[0]->resim); ?>"
                                            alt="<?php echo e($urun[0]->resim); ?>"></a>
                                    <?php $__currentLoopData = $resimler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $resim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key < 2): ?>
                                            <a
                                                onclick="addImage('<?php echo e(url('/')); ?>/tisortimage/<?php echo e($resim->resim); ?>')"><img
                                                    style="width: 84px;height:84px"
                                                    src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($resim->resim); ?>"
                                                    alt="<?php echo e($resim->resim); ?>"></a>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php if($resimcount >= 2): ?>
                                    <div class="item">
                                        <?php $__currentLoopData = $resimler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $resim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($key >= 2): ?>
                                                <a
                                                    onclick="addImage('<?php echo e(url('/')); ?>/tisortimage/<?php echo e($resim->resim); ?>')"><img
                                                        style="width: 84px;height:84px"
                                                        src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($resim->resim); ?>"
                                                        alt="<?php echo e($resim->resim); ?>"></a>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <form action="<?php echo e(url('/')); ?>/urun/sepete-ekle/<?php echo e($urun[0]->id); ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="product-information">
                                <!--/product-information-->
                                <img src="<?php echo e(url('/')); ?>/assets/front/images/product-details/new.jpg"
                                    class="newarrival" alt="" />
                                <h2><?php echo e($urun[0]->marka); ?> <?php echo e($urun[0]->tur); ?></h2>
                                <p>Ürün ID: <?php echo e($urun[0]->id); ?></p>
                                <img src="<?php echo e(url('/')); ?>/assets/front/images/product-details/rating.png" alt="" />
                                <span>
                                    <span>₺<?php echo e($urun[0]->fiyat); ?> TL</span>

                                    <a href="#" style="border: 2px solid #ccc; border-radius:10px;padding:10px!important"
                                        onclick="duzenle('azalt',<?php echo e($urun[0]->stok); ?>)">-</a>

                                    <input id="adet" name="adet" readonly type="text" value="1" />
                                    <input id="urun_adet" name="urun_adet" type="hidden" value="1" />
                                    <a href="#" style="border: 2px solid #ccc; border-radius:10px;padding:10px!important"
                                        onclick="duzenle('artir',<?php echo e($urun[0]->stok); ?>)">+</a>
                                    <button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Sepete ekle
                                    </button>
                                </span>
                                <div class="col-md-12" style="margin-bottom: 10px;">
                                    <label>Beden Seç</label>

                                    <select required name="secilen_beden">
                                        <?php $__currentLoopData = $bedenstok; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $bs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                            <?php if($bs->beden_stok > 0): ?>
                                                <?php if($bs->beden_stok < 10): ?>
                                                    <option value="<?php echo e($bedenler[$key]->id); ?>">
                                                        <?php echo e($bedenler[$key]->beden_adi); ?> (<?php echo e($bs->beden_stok); ?>)

                                                    </option>




                                                <?php else: ?>
                                                    <option value="<?php echo e($bedenler[$key]->id); ?>">
                                                        <?php echo e($bedenler[$key]->beden_adi); ?> (<?php echo e($bs->beden_stok); ?>)


                                                    </option>



                                                <?php endif; ?>

                                            <?php else: ?>
                                                <option value="<?php echo e($bedenler[$key]->id); ?>" disabled>
                                                    <?php echo e($bedenler[$key]->beden_adi); ?> (TÜKENDİ)</option>
                                            <?php endif; ?>


                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <p><b>Stok Durumu: </b><?php echo e($urun[0]->durum); ?></p>
                                <p><b>Stok Miktarı:</b> <?php echo e($urun[0]->stok); ?> Adet</p>
                                <p><b>Marka: </b><?php echo e($urun[0]->marka); ?></p>
                                <p><b>Tür: </b><?php echo e($urun[0]->tur); ?></p>
                                <a href=""><img src="<?php echo e(url('/')); ?>/assets/front/images/product-details/share.png"
                                        class="share img-responsive" alt="" /></a>
                            </div>
                        </form>
                        <!--/product-information-->
                    </div>
                </div>
                <!--/product-details-->

                <div class="category-tab shop-details-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#comments" data-toggle="tab">Detaylar</a>
                            </li>
                            <li><a href="#reviews" data-toggle="tab">Yorumlar (<?php echo e($yorumcount); ?>)</a>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="reviews">

                            <h3>Ürün Yorumları</h3>
                            <div class="col-sm-12">
                                <?php $__currentLoopData = $yorumlar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yorum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(Auth::check() && $yorum->user_id == Auth::user()->id): ?>
                                        <div style="background-color: rgba(124, 124, 124, 0.144);border-radius:10px">
                                            <ul style="background-color: rgba(124, 124, 124, 0.144);border-radius:10px">
                                                <li><a><i class="fa fa-clock-o"></i><?php echo e($yorum->tarih); ?></a></li>
                                                <li><a><i class="fa fa-user"></i><?php echo e($yorum->ad); ?></a></li>
                                                <li style="text-transform:lowercase"><a style="text-transform:lowercase"><i
                                                            style="text-transform:lowercase"
                                                            class="fa fa-envelope"></i><?php echo e($yorum->email); ?></a></li>
                                            </ul>

                                            <p style="text-transform:uppercase"><?php echo e($yorum->yorum); ?></p>
                                        </div>
                                    <?php else: ?>


                                        <div>
                                            <ul>
                                                <li><a><i class="fa fa-clock-o"></i><?php echo e($yorum->tarih); ?></a></li>
                                                <li><a><i class="fa fa-user"></i><?php echo e($yorum->ad); ?></a></li>
                                                <li style="text-transform:lowercase"><a style="text-transform:lowercase"><i
                                                            style="text-transform:lowercase"
                                                            class="fa fa-envelope"></i><?php echo e($yorum->email); ?></a></li>
                                            </ul>

                                            <p style="text-transform:uppercase"><?php echo e($yorum->yorum); ?></p>
                                        </div>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <br />
                                <p><b>Yorumunuzu Yazın</b></p>

                                <form enctype="multipart/form-data"
                                    action="<?php echo e(url('/')); ?>/urun/yorumgonder/<?php echo e($urun[0]->id); ?>" method="GET">
                                    <?php echo csrf_field(); ?>
                                    <?php if(!Auth::check()): ?>
                                        <span>
                                            <input maxlength="50" required name="ad" type="text" placeholder="Adınız.." />
                                            <input maxlength="50" required name="email" type="email"
                                                placeholder="E-mail adresi.." />
                                        </span>

                                    <?php else: ?>
                                        <span>
                                            <input readonly maxlength="50" value="<?php echo e(Auth::user()->name); ?>" required
                                                name="ad" type="text" placeholder="Adınız.." />
                                            <input readonly value="<?php echo e(Auth::user()->email); ?>" maxlength="50" required
                                                name="email" type="email" placeholder="E-mail adresi.." />
                                        </span>
                                    <?php endif; ?>

                                    <textarea required maxlength="300"
                                        placeholder="Yorum giriniz.. (300 karakter ile sınırlıdır)" name="yorum"></textarea>

                                    <input type="submit" value="GÖNDER" class="btn btn-default btn-primary pull-right">

                                </form>

                            </div>
                        </div>

                        <div class="tab-pane fade active in" id="comments">

                            <div style="margin: 20px;">
                                <h3>Ürün Hakkında</h3>
                                <div class="col-sm-12"
                                    style=" border-left:6px solid #ccc!important; background-color: #ffe5df!important; 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   display: block; box-sizing: inherit;color: #000!important;padding: 0.01em 16px;                                                                                                                                        border-color: #fc570a!important;margin-bottom:20px;">



                                    <p> <?php echo " {$urun[0]->description} <?php "; ?> </p>

                                </div>
                            </div>

                        </div>


                    </div>

                </div>

                <!--/category-tab-->

                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">Sizin İçin Seçtiklerimiz</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            <div class="item active">
                                <?php $__currentLoopData = $onerilenlerCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $onerilen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key < 3): ?>
                                        <a href="<?php echo e(url('/')); ?>/urun/<?php echo e($onerilen->id); ?>">
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($onerilen->resim); ?>"
                                                                alt="<?php echo e($onerilen->resim); ?>" />
                                                            <h2><?php echo e($onerilen->fiyat); ?>₺</h2>
                                                            <p><?php echo e($onerilen->marka); ?> <?php echo e($onerilen->tur); ?></p>
                                                            <a href="<?php echo e(url('/')); ?>/favori-ekle/<?php echo e($onerilen->id); ?>"
                                                                class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-star"></i>Favorilere ekle
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div class="item">
                                <?php $__currentLoopData = $onerilenlerCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $onerilen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key >= 3): ?>
                                        <a href="<?php echo e(url('/')); ?>/urun/<?php echo e($onerilen->id); ?>">
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="<?php echo e(url('/')); ?>/tisortimage/<?php echo e($onerilen->resim); ?>"
                                                                alt="<?php echo e($onerilen->resim); ?>" />
                                                            <h2><?php echo e($onerilen->fiyat); ?>₺</h2>
                                                            <p><?php echo e($onerilen->marka); ?> <?php echo e($onerilen->tur); ?></p>
                                                            <a href="<?php echo e(url('/')); ?>/favori-ekle/<?php echo e($onerilen->id); ?>"
                                                                class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-star"></i>Favorilere
                                                                ekle</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>




                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <!--/recommended_items-->
            </div>
        </div>
    </div>
    </div>



    <script type="text/javascript">
        function addImage(resim) {

            document.getElementById('resim_id').src = resim;
            document.getElementById('link_id').href = resim;

        }

        function duzenle(fonk, stok) {



            if (fonk == 'artir') {
                if (+$("#adet").val() + 1 <= stok) {
                    document.getElementById('adet').value = +$("#adet").val() + 1;
                    document.getElementById('urun_adet').value = +$("#urun_adet").val() + 1;
                }
            } else if (fonk == 'azalt')
                if (+$("#adet").val() - 1 > 0) {
                    document.getElementById('adet').value = +$("#adet").val() - 1;
                    document.getElementById('urun_adet').value = +$("#urun_adet").val() - 1;
                }


        }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.fmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/front/urun_detay.blade.php ENDPATH**/ ?>