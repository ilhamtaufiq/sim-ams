<?php if (! $__env->hasRenderedOnce('4c9b8e8c-c797-443d-9dd7-dfaf1203b2fc')): $__env->markAsRenderedOnce('4c9b8e8c-c797-443d-9dd7-dfaf1203b2fc'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <script>
        loadScript('<?php echo mix('/plugins/moment/moment-with-locales.min.js', '/assets/vendor/boilerplate'); ?>', () => {
            moment.locale('<?php echo e(App::getLocale()); ?>');
            registerAsset('momentjs');
        });
    </script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/load/async/moment.blade.php ENDPATH**/ ?>