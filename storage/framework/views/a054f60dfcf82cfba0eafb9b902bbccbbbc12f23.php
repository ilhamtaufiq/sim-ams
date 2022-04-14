<?php if(empty($name)): ?>
<code>&lt;x-boilerplate::datetimepicker> The name attribute has not been set</code>
<?php else: ?>
<div class="form-group<?php echo e(isset($groupClass) ? ' '.$groupClass : ''); ?>"<?php echo isset($groupId) ? ' id="'.$groupId.'"' : ''; ?>>
<?php if(isset($label)): ?>
    <label><?php echo __($label); ?></label>
<?php endif; ?>
    <div class="input-group" id="<?php echo e($id); ?>" data-target-input="nearest">
<?php if($prepend || $prependText): ?>
        <div class="input-group-prepend" data-toggle="datetimepicker" data-target="#<?php echo e($id); ?>">
<?php if($prepend): ?>
            <?php echo $prepend; ?>

<?php else: ?>
            <span class="input-group-text"><?php echo $prependText; ?></span>
<?php endif; ?>
        </div>
<?php endif; ?>
        <?php echo Form::text($name.'_local', old($name.'_local', $value), array_merge(['data-toggle' => 'datetimepicker', 'data-target' => '#'.$id, 'class' => 'form-control datetimepicker-input'.$errors->first($nameDot,' is-invalid').(isset($class) ? ' '.$class : ''), 'autocomplete' => 'off'], $attributes)); ?>

<?php if($append || $appendText): ?>
        <div class="input-group-append" data-toggle="datetimepicker" data-target="#<?php echo e($id); ?>">
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
    <?php echo Form::hidden($name, $rawValue); ?>

</div>
<?php echo $__env->make('boilerplate::load.async.datepicker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
<script>
    whenAssetIsLoaded('datetimepicker', () => {
        $('#<?php echo e($id); ?>').datetimepicker({
            format: "<?php echo e($format); ?>",
            buttons: {
                showToday: <?php echo e($showToday ?? 'false'); ?>,
                showClear: <?php echo e($showClear ?? 'false'); ?>,
                showClose: <?php echo e($showClose ?? 'false'); ?>

            },
            useCurrent: <?php echo e($useCurrent ?? 'false'); ?>,
            <?php echo $options ?? ''; ?>

        });

        $('#<?php echo e($id); ?>').on('change.datetimepicker', () => {
            $('input[name="<?php echo e($name); ?>"]').val('');
            if ($('input[name="<?php echo e($name); ?>_local"]').val() !== '') {
                let date = $('#<?php echo e($id); ?>').datetimepicker('viewDate').format('<?php echo e($format === 'L' ? 'YYYY-MM-DD' : 'YYYY-MM-DD HH:mm:ss'); ?>');
                $('input[name="<?php echo e($name); ?>"]').val(date).trigger('change');
            }
        });
    });
</script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/components/datetimepicker.blade.php ENDPATH**/ ?>