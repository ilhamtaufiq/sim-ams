<?php if (! $__env->hasRenderedOnce('87fdcad4-e34b-4796-994c-f20a0637d06c')): $__env->markAsRenderedOnce('87fdcad4-e34b-4796-994c-f20a0637d06c'); ?>
<?php $__env->startPush('plugin-css'); ?>
    <link rel="stylesheet" href="<?php echo mix('/plugins/datatables/datatables.min.css', '/assets/vendor/boilerplate'); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('plugin-js'); ?>
<?php echo $__env->make('boilerplate::load.moment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo mix('/plugins/datatables/datatables.min.js', '/assets/vendor/boilerplate'); ?>"></script>
    <script>$.extend(true,$.fn.dataTable.defaults,{autoWidth:false,language:{url:"<?php echo mix('/plugins/datatables/i18n/'.$locale.'.json', '/assets/vendor/boilerplate'); ?>"}});</script>
<?php $__env->stopPush(); ?>
<?php $__currentLoopData = $plugins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plugin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($$plugin ?? false): ?>
<?php $__env->startPush('plugin-css'); ?>
    <link rel="stylesheet" href="<?php echo mix('/plugins/datatables/plugins/'.$plugin.'.bootstrap4.min.css', '/assets/vendor/boilerplate'); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('plugin-js'); ?>
    <script src="<?php echo mix('/plugins/datatables/plugins/dataTables.'.$plugin.'.min.js', '/assets/vendor/boilerplate'); ?>"></script>
    <script src="<?php echo mix('/plugins/datatables/plugins/'.$plugin.'.bootstrap4.min.js', '/assets/vendor/boilerplate'); ?>"></script>
    <?php if($plugin === 'buttons'): ?>
        <script src="<?php echo mix('/plugins/datatables/buttons.min.js', '/assets/vendor/boilerplate'); ?>"></script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startPush('plugin-js'); ?>
    <script>registerAsset('datatables')</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/load/datatables.blade.php ENDPATH**/ ?>