<?php $__env->startComponent('boilerplate::card', ['color' => 'indigo', 'title' => 'Colorpicker']); ?>
    Usage
    <pre>&lt;x-boilerplate::colorpicker name="color" /></pre>
    <div class="row">
        <div class="col-6">
            <?php $__env->startComponent('boilerplate::components.colorpicker', ['name' => 'color']); ?><?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-6">
            <?php $__env->startComponent('boilerplate::components.colorpicker', ['name' => 'color2', 'value' => '#28a745']); ?><?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <?php $__env->slot('footer'); ?>
        <div class="text-right small text-muted">
            <a href="https://sebastienheyd.github.io/boilerplate/components/colorpicker" target="_blank">component</a> /
            <a href="https://seballot.github.io/spectrum" target="_blank">Spectrum colorpicker</a>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/plugins/demo/colorpicker.blade.php ENDPATH**/ ?>