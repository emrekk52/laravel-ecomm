

<?php $__env->startSection('title','E-SHOPPER'); ?>
    
<?php $__env->startSection('keywords','anahtar kelimeler'); ?>
    
<?php $__env->startSection('description','açıklamalar'); ?>


<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('front.fsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('slider'); ?>
<?php echo $__env->make('front.fslider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php echo $__env->make('front.fcontent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
    

<?php echo $__env->make('layouts.front.fmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/front/home.blade.php ENDPATH**/ ?>