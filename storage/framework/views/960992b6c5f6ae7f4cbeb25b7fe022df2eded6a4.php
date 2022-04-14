<?php ($options = ['Alabama', 'Alaska', 'Arizona', 'California', 'Delaware', 'Florida', 'Iowa', 'Oregon', 'Minnesota', 'Tennessee', 'Texas']); ?>
<?php $__env->startComponent('boilerplate::card', ['color' => 'primary', 'title' => 'Select2']); ?>
    <div class="row">
        <div class="col-12">
            Usage :
            <pre>&lt;x-boilerplate::select2 name="example" label="Example" :options="['Opt 1', 'Opt 2']" /></pre>
        </div>
        <div class="col-md-6">
            <?php $__env->startComponent('boilerplate::components.select2', ['label' => 'Minimal', 'name' => 'select2_dminimal', 'selected' => 1, 'options' => $options, 'allow-clear' => 'true', 'minimum-results-for-search' => 5]); ?><?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-md-6">
            <?php $__env->startComponent('boilerplate::components.select2', ['label' => 'Multiple', 'name' => 'select2_multiple', 'selected' => [1,3], 'options' => $options, 'multiple' => true]); ?><?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <?php $__env->slot('footer'); ?>
        <div class="text-right small text-muted">
            <a href="https://sebastienheyd.github.io/boilerplate/components/select2" target="_blank">component</a> /
            <a href="https://sebastienheyd.github.io/boilerplate/plugins/select2" target="_blank">plugin</a> /
            <a href="https://select2.github.io/" target="_blank">select2</a>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/plugins/demo/select2.blade.php ENDPATH**/ ?>