<?php if(empty($name)): ?>
<code>&lt;x-boilerplate::codemirror> The name attribute has not been set</code>
<?php else: ?>
<div class="form-group<?php echo e(isset($groupClass) ? ' '.$groupClass : ''); ?>"<?php echo isset($groupId) ? ' id="'.$groupId.'"' : ''; ?>>
<?php if(isset($label)): ?>
    <label for="<?php echo e($id); ?>"><?php echo __($label); ?></label>
<?php endif; ?>
    <textarea id="<?php echo e($id); ?>" name="<?php echo e($name); ?>" style="visibility:hidden" rows="0"><?php echo old($name, $value ?? $slot ?? ''); ?></textarea>
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
<?php echo $__env->make('boilerplate::load.async.codemirror', ['js' => $js ?? []], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
<script>
    whenAssetIsLoaded('CodeMirror', () => {
        let uid = getIntervalUid();
        intervals[uid] = setInterval(function() {
            if($('#<?php echo e($id); ?>').is(':visible')){
                clearInterval(intervals[uid]);
                $('#<?php echo e($id); ?>').codemirror({ <?php echo $options ?? ''; ?> });
            }
        });
    })
</script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/components/codemirror.blade.php ENDPATH**/ ?>