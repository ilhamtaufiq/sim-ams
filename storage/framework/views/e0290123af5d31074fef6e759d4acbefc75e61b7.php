<?php $__env->startComponent('boilerplate::card', ['color' => 'indigo', 'title' => 'Datetimepicker']); ?>
    Usage
    <pre>&lt;x-boilerplate::datetimepicker name="date" /></pre>
    <div class="row">
        <div class="col-6">
            <!-- Date -->
            <?php $__env->startComponent('boilerplate::components.datetimepicker', ['label' => 'Date', 'name' => 'date', 'appendText' => 'far fa-calendar-alt', 'value' => now()]); ?><?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-6">
            <!-- Datetime -->
            <?php $__env->startComponent('boilerplate::components.datetimepicker', ['label' => 'Datetime', 'name' => 'datetime', 'appendText' => 'far fa-calendar-alt', 'format' => 'L HH:mm:ss', 'show-today' => 'true', 'show-close' => 'true', 'value' => now()]); ?><?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <?php $__env->slot('footer'); ?>
        <div class="text-right small text-muted">
            <a href="https://sebastienheyd.github.io/boilerplate/components/datetimepicker" target="_blank">component</a> /
            <a href="https://getdatepicker.com/5-4/" target="_blank">Tempus Dominus</a>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/plugins/demo/datetimepicker.blade.php ENDPATH**/ ?>