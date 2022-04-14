<?php if(empty($name)): ?>
<code>&lt;x-boilerplate::select2> The name attribute has not been set</code>
<?php else: ?>
<div class="form-group<?php echo e(isset($groupClass) ? ' '.$groupClass : ''); ?>"<?php echo isset($groupId) ? ' id="'.$groupId.'"' : ''; ?>>
<?php if(isset($label)): ?>
    <label for="<?php echo e($id); ?>"><?php echo __($label); ?></label>
<?php endif; ?>
    <select id="<?php echo e($id); ?>" name="<?php echo e($name); ?>" class="form-control<?php echo e($errors->first($nameDot,' is-invalid')); ?><?php echo e(isset($class) ? ' '.$class : ''); ?>"<?php echo !empty($attributes) ? ' '.$attributes : ''; ?> style="visibility:hidden;height:1rem" autocomplete="off">
<?php if(!isset($multiple)): ?>
        <option></option>
<?php endif; ?>
<?php if(!empty($options) && is_array($options)): ?>
<?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($k); ?>"<?php echo e(collect($selected ?? [])->contains($k) ? ' selected' : ''); ?>><?php echo e($v); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
        <?php echo e($slot); ?>

<?php endif; ?>
    </select>
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
<?php echo $__env->make('boilerplate::load.async.select2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <script>
        whenAssetIsLoaded('select2', () => {
            $('#<?php echo e($id); ?>').select2({
                placeholder: '<?php echo e($placeholder ?? '—'); ?>',
                allowClear: <?php echo e($allowClear); ?>,
                language: "<?php echo e(App::getLocale()); ?>",
                direction: "<?php echo app('translator')->get('boilerplate::layout.direction'); ?>",
                minimumInputLength: <?php echo e($minimumInputLength ?? 0); ?>,
                minimumResultsForSearch: <?php echo e($minimumResultsForSearch ?? 10); ?>,
                width: '100%',
                dropdownAutoWidth: true,
                <?php if(isset($ajax)): ?>
                ajax: {
                    delay: 200,
                    url: '<?php echo e($ajax); ?>',
                    method: 'post'
                }
                <?php endif; ?>
            })
        })
    </script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/components/select2.blade.php ENDPATH**/ ?>