<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12 mbl">
            <span class="float-right pb-3">
                <a href="<?php echo e(route("boilerplate.users.create")); ?>" class="btn btn-primary">
                    <?php echo app('translator')->get('boilerplate::users.create.title'); ?>
                </a>
            </span>
        </div>
    </div>
    <?php $__env->startComponent('boilerplate::card'); ?>
        <?php $__env->startComponent('boilerplate::datatable', ['name' => 'users']); ?> <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>.img-circle { border:1px solid #CCC }</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('boilerplate::layout.index', [
    'title' => __('boilerplate::users.title'),
    'subtitle' => __('boilerplate::users.list.title'),
    'breadcrumb' => [
        __('boilerplate::users.title') => 'boilerplate.users.index'
    ]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/users/list.blade.php ENDPATH**/ ?>