<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Tambah Pengguna</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div class="card-header">
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('users.store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="<?php echo e(old('name')); ?>" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    <?php if($errors->has('name')): ?>
                        <span class="text-danger text-left"><?php echo e($errors->first('name')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="<?php echo e(old('email')); ?>"
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="Email address" required>
                    <?php if($errors->has('email')): ?>
                        <span class="text-danger text-left"><?php echo e($errors->first('email')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input value="<?php echo e(old('username')); ?>"
                        type="text" 
                        class="form-control" 
                        name="username" 
                        placeholder="Username" required>
                    <?php if($errors->has('username')): ?>
                        <span class="text-danger text-left"><?php echo e($errors->first('username')); ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary">Save user</button>
                <a href="<?php echo e(route('users.index')); ?>" class="btn btn-default">Back</a>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/acl/users/create.blade.php ENDPATH**/ ?>