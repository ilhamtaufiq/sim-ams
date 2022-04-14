<?php $__env->startComponent('boilerplate::card', ['color' => 'red', 'title' => 'Daterangepicker']); ?>
        Usage
        <pre>&lt;x-boilerplate::daterangepicker name="range" /></pre>
        <div class="row">
            <div class="col-6">
                <!-- Date range -->
                <?php $__env->startComponent('boilerplate::daterangepicker', ['name' => 'range1', 'label' => 'Date range picker', 'appendText' => 'far fa-calendar', 'start' => \Illuminate\Support\Carbon::now()->subDays(10), 'end' => \Illuminate\Support\Carbon::now()]); ?><?php echo $__env->renderComponent(); ?>
            </div>
            <div class="col-6">
                <!-- Date and time range -->
                <?php $__env->startComponent('boilerplate::daterangepicker', ['name' => 'range2', 'label' => 'Date and time range picker', 'appendText' => 'far fa-clock', 'start' => \Illuminate\Support\Carbon::now()->subDays(10)->subHour(), 'end' => \Illuminate\Support\Carbon::now(), 'timePicker' => true]); ?><?php echo $__env->renderComponent(); ?>
            </div>
        </div>
    <?php $__env->slot('footer'); ?>
        <div class="text-right small text-muted">
            <a href="https://sebastienheyd.github.io/boilerplate/components/daterangepicker" target="_blank">component</a> /
            <a href="https://www.daterangepicker.com" target="_blank">Date Range Picker</a>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/plugins/demo/daterangepicker.blade.php ENDPATH**/ ?>