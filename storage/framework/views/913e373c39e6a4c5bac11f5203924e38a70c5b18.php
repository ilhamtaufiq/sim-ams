<?php if (! $__env->hasRenderedOnce('9a21f097-8ab2-40e3-a9df-8bd384053a8b')): $__env->markAsRenderedOnce('9a21f097-8ab2-40e3-a9df-8bd384053a8b'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <?php echo $__env->make('boilerplate::load.async.moment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        loadStylesheet("<?php echo mix('/plugins/datepicker/daterangepicker.min.css', '/assets/vendor/boilerplate'); ?>");
        whenAssetIsLoaded('momentjs', () => {
            loadScript("<?php echo mix('/plugins/datepicker/daterangepicker.min.js', '/assets/vendor/boilerplate'); ?>", () => {
                registerAsset('daterangepicker');
                $.fn.daterangepicker.defaultOptions = {
                    locale: {
                        "applyLabel": "<?php echo app('translator')->get('boilerplate::daterangepicker.applyLabel'); ?>",
                        "cancelLabel": "<?php echo app('translator')->get('boilerplate::daterangepicker.cancelLabel'); ?>",
                        "fromLabel": "<?php echo app('translator')->get('boilerplate::daterangepicker.fromLabel'); ?>",
                        "toLabel": "<?php echo app('translator')->get('boilerplate::daterangepicker.toLabel'); ?>",
                        "customRangeLabel": "<?php echo app('translator')->get('boilerplate::daterangepicker.customRangeLabel'); ?>",
                    }
                };
            });
        });
    </script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/load/async/daterangepicker.blade.php ENDPATH**/ ?>