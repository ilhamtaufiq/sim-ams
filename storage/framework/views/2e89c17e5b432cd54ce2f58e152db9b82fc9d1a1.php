<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Pengguna</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div class="card-header">
            <h4>Ubah Pengguna</h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?php echo e(route('users.update', $user->id)); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input value="<?php echo e($user->name); ?>" 
                            type="text" 
                            class="form-control" 
                            name="name" 
                            placeholder="Name" required>
    
                        <?php if($errors->has('name')): ?>
                            <span class="text-danger text-left"><?php echo e($errors->first('name')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input value="<?php echo e($user->email); ?>"
                            type="email" 
                            class="form-control" 
                            name="email" 
                            placeholder="Email address" required>
                        <?php if($errors->has('email')): ?>
                            <span class="text-danger text-left"><?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input value="<?php echo e($user->username); ?>"
                            type="text" 
                            class="form-control" 
                            name="username" 
                            placeholder="Username" required>
                        <?php if($errors->has('username')): ?>
                            <span class="text-danger text-left"><?php echo e($errors->first('username')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" 
                            name="role" required>
                            <option value="">Select role</option>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->id); ?>"
                                    <?php echo e(in_array($role->name, $userRole) 
                                        ? 'selected'
                                        : ''); ?>><?php echo e($role->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('role')): ?>
                            <span class="text-danger text-left"><?php echo e($errors->first('role')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <button onclick="history.back()" class="btn btn-warning">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/acl/users/edit.blade.php ENDPATH**/ ?>