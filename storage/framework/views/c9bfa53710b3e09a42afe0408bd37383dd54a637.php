<?php if (! $__env->hasRenderedOnce('6bca50db-7072-4317-84b4-cbb588b3bc7c')): $__env->markAsRenderedOnce('6bca50db-7072-4317-84b4-cbb588b3bc7c'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
<script>
    loadStylesheet('<?php echo mix('/plugins/select2/select2.min.css', '/assets/vendor/boilerplate'); ?>');
    loadScript('<?php echo mix('/plugins/select2/select2.full.min.js', '/assets/vendor/boilerplate'); ?>', () => {
        loadScript('<?php echo mix('/plugins/select2/i18n/'.App::getLocale().'.js', '/assets/vendor/boilerplate'); ?>', () => {
            registerAsset('select2', () => {
                $.extend(true,$.fn.select2.defaults,{
                    language:'<?php echo e(App::getLocale()); ?>',
                    direction:'<?php echo app('translator')->get('boilerplate::layout.direction'); ?>'}
                );

                $(document).on('select2:open',(e)=>{
                    let t = $(e.target);
                    if(t && t.length){
                        let id=t[0].id||t[0].name;
                        document.querySelector(`input[aria-controls*='${id}']`).focus();
                    }
                });
            });
        });
    });
</script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/load/async/select2.blade.php ENDPATH**/ ?>