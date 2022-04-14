<?php if (! $__env->hasRenderedOnce('81e5057f-5ab8-47c5-b34a-9b66eb506be3')): $__env->markAsRenderedOnce('81e5057f-5ab8-47c5-b34a-9b66eb506be3'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <script>
        loadScript('<?php echo e(mix('/plugins/spectrum-colorpicker2/spectrum.min.js', '/assets/vendor/boilerplate')); ?>', () => {
            loadStylesheet('<?php echo e(mix('/plugins/spectrum-colorpicker2/spectrum.min.css', '/assets/vendor/boilerplate')); ?>', () => {
                registerAsset('ColorPicker');
            });
        })
    </script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/load/async/colorpicker.blade.php ENDPATH**/ ?>