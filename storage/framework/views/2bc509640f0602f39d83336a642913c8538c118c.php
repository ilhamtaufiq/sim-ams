<?php if (! $__env->hasRenderedOnce('27d7698b-35d5-43a5-a563-ae0f12752e5e')): $__env->markAsRenderedOnce('27d7698b-35d5-43a5-a563-ae0f12752e5e'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <?php echo $__env->make('boilerplate::load.async.moment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        loadStylesheet('<?php echo mix('/plugins/datepicker/datetimepicker.min.css', '/assets/vendor/boilerplate'); ?>');
        whenAssetIsLoaded('momentjs', () => {
            loadScript('<?php echo mix('/plugins/datepicker/datetimepicker.min.js', '/assets/vendor/boilerplate'); ?>', () => {
                registerAsset('datetimepicker', () => {
                    $.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, {
                        locale: "<?php echo e(App::getLocale()); ?>",
                        icons: $.extend({}, $.fn.datetimepicker.Constructor.Default.icons, {
                            time: 'far fa-clock',
                            date: 'far fa-calendar',
                            up: 'fas fa-arrow-up',
                            down: 'fas fa-arrow-down',
                            previous: 'fas fa-chevron-left',
                            next: 'fas fa-chevron-right',
                            today: 'far fa-calendar-check',
                            clear: 'fas fa-trash',
                            close: 'fas fa-times'
                        })
                    });
                })
            });
        });
    </script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/load/async/datepicker.blade.php ENDPATH**/ ?>