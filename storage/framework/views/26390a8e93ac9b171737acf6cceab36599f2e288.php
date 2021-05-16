

<?php $__env->startSection('title','Admin'); ?>
    
<?php $__env->startSection('keywords','Admin anahtar kelimeler'); ?>
    
<?php $__env->startSection('description','admin açıklaması açıklamalar'); ?>





<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
    

<?php echo $__env->make('layouts.admin.amaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomm\resources\views/admin/home.blade.php ENDPATH**/ ?>