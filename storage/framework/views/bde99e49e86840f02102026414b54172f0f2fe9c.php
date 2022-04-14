<?php if(empty($name)): ?>
    <code>&lt;x-boilerplate::colorpicker> The name attribute has not been set</code>
<?php else: ?>
<div class="form-group<?php echo e(isset($groupClass) ? ' '.$groupClass : ''); ?>"<?php echo isset($groupId) ? ' id="'.$groupId.'"' : ''; ?>>
<?php if(isset($label)): ?>
    <label><?php echo __($label); ?></label>
<?php endif; ?>
    <?php echo Form::text($name, old($name, $value ?? null), array_merge([
        'id' => $id,
        'class' => trim($errors->first($name,' is-invalid').(isset($class) ? ' form-control '.$class : 'form-control')),
        'autocomplete' => 'off',
    ], $attributes)); ?>

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
</div>
<?php echo $__env->make('boilerplate::load.async.colorpicker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <script>
        whenAssetIsLoaded('ColorPicker', () => {
            $('#<?php echo e($id); ?>').spectrum({
                allowEmpty:true,
                showInput: true,
                showInitial: true,
                clickoutFiresChange: false,
                locale: '<?php echo e(App::getLocale()); ?>',
                showSelectionPalette: false,
                <?php if(isset($palette) && is_array($palette) && !empty($palette)): ?>
                palette: <?php echo json_encode($palette); ?>,
                <?php endif; ?>
                <?php if(isset($selectionPalette) && is_array($selectionPalette) && !empty($selectionPalette)): ?>
                selectionPalette: <?php echo json_encode(array_reverse($selectionPalette)); ?>,
                <?php endif; ?>
                <?php echo $options ?? ''; ?>

            })
        });
    </script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/components/colorpicker.blade.php ENDPATH**/ ?>