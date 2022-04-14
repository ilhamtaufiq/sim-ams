<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Roles Pengguna</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div>
        <div class="card-header">
        <div class="card-tools">
            <a href="<?php echo e(route('roles.create')); ?>"><button class="btn btn-primary">Tambah</button></a>
        </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                   <th width="1%">No</th>
                   <th>Name</th>
                   <th width="3%" colspan="3">Action</th>
                </tr>
                  <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($role->id); ?></td>
                      <td><?php echo e($role->name); ?></td>
                      <td>
                          <a class="btn btn-info btn-sm" href="<?php echo e(route('roles.show', $role->id)); ?>">Show</a>
                      </td>
                      <td>
                          <a class="btn btn-primary btn-sm" href="<?php echo e(route('roles.edit', $role->id)); ?>">Edit</a>
                      </td>
                      <td>
                          <?php echo Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']); ?>

                          <?php echo Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']); ?>

                          <?php echo Form::close(); ?>

                      </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
      
              <div class="d-flex">
                  <?php echo $roles->links(); ?>

              </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/resources/views/acl/roles/index.blade.php ENDPATH**/ ?>