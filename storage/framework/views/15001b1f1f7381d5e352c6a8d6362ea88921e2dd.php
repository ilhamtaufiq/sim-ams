<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12 mb-3">
            <span class="float-right">
                <a href="<?php echo e(route("boilerplate.roles.create")); ?>" class="btn btn-primary"><?php echo e(__('boilerplate::role.create.title')); ?></a>
            </span>
        </div>
    </div>
    <?php $__env->startComponent('boilerplate::card'); ?>
        <?php $__env->startComponent('boilerplate::datatable', ['name' => 'roles']); ?> <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('boilerplate::layout.index', [
    'title' => __('boilerplate::role.title'),
    'subtitle' => __('boilerplate::role.list.title'),
    'breadcrumb' => [__('boilerplate::role.title')]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/roles/list.blade.php ENDPATH**/ ?>