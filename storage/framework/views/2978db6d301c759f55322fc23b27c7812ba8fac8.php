<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Tambah Permissions</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div class="card-header">
            <h4>Ringkasan Pekerjaan Bidang Air Minum dan Sanitasi</h4>
        </div>
        <div class="card-body">
            <div>
                Name: <?php echo e($user->name); ?>

            </div>
            <div>
                Email: <?php echo e($user->email); ?>

            </div>
            <div>
                Username: <?php echo e($user->username); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/acl/users/show.blade.php ENDPATH**/ ?>