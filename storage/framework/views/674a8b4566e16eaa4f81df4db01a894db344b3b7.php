<?php if(empty($name)): ?>
<code>&lt;x-boilerplate::daterangepicker> The name attribute has not been set</code>
<?php else: ?>
<div class="form-group<?php echo e(isset($groupClass) ? ' '.$groupClass : ''); ?>"<?php echo isset($groupId) ? ' id="'.$groupId.'"' : ''; ?>>
<?php if(isset($label)): ?>
    <label><?php echo __($label); ?></label>
<?php endif; ?>
    <div class="input-group" id="<?php echo e($id); ?>">
<?php if($prepend || $prependText): ?>
        <div class="input-group-prepend">
<?php if($prepend): ?>
            <?php echo $prepend; ?>

<?php else: ?>
            <span class="input-group-text"><?php echo $prependText; ?></span>
<?php endif; ?>
        </div>
<?php endif; ?>
        <div class="d-flex align-items-center form-control<?php echo e(isset($controlClass) ? ' '.$controlClass : ''); ?>">
            <?php echo Form::text($name.'[value]', old($name.'.value'), array_merge(['class' => 'daterangepicker-input'.$errors->first($nameDot,' is-invalid').$errors->first($nameDot.'.start',' is-invalid').$errors->first($nameDot.'.end',' is-invalid').(isset($class) ? ' '.$class : '')], $attributes)); ?>

            <span class="fa fa-fw fa-times fa-xs ml-1 clear-daterangepicker" data-name="<?php echo e($name); ?>" style="display:none"/>
        </div>
<?php if($append || $appendText): ?>
        <div class="input-group-append">
<?php if($append): ?>
            <?php echo $append; ?>

<?php else: ?>
            <span class="input-group-text"><?php echo $appendText; ?></span>
<?php endif; ?>
        </div>
<?php endif; ?>
    </div>
<?php if($help ?? false): ?>
    <small class="form-text text-muted"><?php echo app('translator')->get($help); ?></small>
<?php endif; ?>
<?php $__errorArgs = [$nameDot];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="error-bubble"><div><?php echo e($message); ?></div></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php $__errorArgs = [$nameDot.'.start'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
<div class="error-bubble"><div><?php echo e($message); ?></div></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php $__errorArgs = [$nameDot.'.end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
<div class="error-bubble"><div><?php echo e($message); ?></div></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <?php echo Form::hidden($name.'[start]', old($name.'[start]', $start ?? ''), ['autocomplete' => 'off']); ?>

    <?php echo Form::hidden($name.'[end]', old($name.'[end]', $end ?? ''), ['autocomplete' => 'off']); ?>

</div>
<?php echo $__env->make('boilerplate::load.async.daterangepicker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
<script>
    whenAssetIsLoaded('daterangepicker', () => {
        $('input[name="<?php echo e($name); ?>[value]"]').daterangepicker({
            showDropdowns: true,
            opens: "<?php echo e($alignment ?? 'right'); ?>",
            <?php if(!empty($minDate)): ?>
            minDate: moment('<?php echo e($minDate); ?>'),
            <?php endif; ?>
            <?php if(!empty($maxDate)): ?>
            maxDate: moment('<?php echo e($maxDate); ?>'),
            <?php endif; ?>
            timePicker: <?php echo e(bool($timePicker ?? false) ? 'true' : 'false'); ?>,
            timePickerIncrement: <?php echo e($timePickerIncrement ?? '1'); ?>,
            timePicker24Hour: <?php echo e(bool($timePicker24Hour ?? true) ? 'true' : 'false'); ?>,
            timePickerSeconds: <?php echo e(bool($timePickerSeconds ?? false) ? 'true' : 'false'); ?>,
            autoUpdateInput: <?php echo e((($start ?? null) || ($end ?? null)) ? 'true' : 'false'); ?>,
            startDate: <?php echo !empty(old($name.'.start', $start ?? '')) ? 'moment("'.old($name.'.start', $start ?? '').'")' : 'moment()'; ?>,
            endDate: <?php echo !empty(old($name.'.end', $end ?? '')) ? 'moment("'.old($name.'.end', $end ?? '').'")' : 'moment()'; ?>,
            locale: { format: '<?php echo e($format); ?>' }
        }).on('apply.daterangepicker', applyDateRangePicker);
    });
</script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/components/daterangepicker.blade.php ENDPATH**/ ?>