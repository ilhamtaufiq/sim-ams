<?php if(empty($name)): ?>
<code>&lt;x-boilerplate::tinymce>The name attribute has not been set</code>
<?php else: ?>
<div class="form-group<?php echo e(isset($groupClass) ? ' '.$groupClass : ''); ?>"<?php echo isset($groupId) ? ' id="'.$groupId.'"' : ''; ?>>
<?php if(isset($label)): ?>
    <label for="<?php echo e($id); ?>"><?php echo __($label); ?></label>
<?php endif; ?>
    <textarea id="<?php echo e($id); ?>" name="<?php echo e($name); ?>"<?php echo !empty($attributes) ? ' '.$attributes : ''; ?> style="visibility:hidden"><?php echo old($name, $value ?? $slot ?? ''); ?></textarea>
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
<?php echo $__env->make('boilerplate::load.async.tinymce', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
<script>
    whenAssetIsLoaded('<?php echo mix('/plugins/tinymce/tinymce.min.js', '/assets/vendor/boilerplate'); ?>', () => {
        tinymce.init({
            selector: '#<?php echo e($id); ?>',
            toolbar_sticky: <?php echo e(($sticky ?? false) ? 'true' : 'false'); ?>,
            <?php if(setting('darkmode', false) && config('boilerplate.theme.darkmode')): ?>
            skin : "boilerplate-dark",
            content_css: 'boilerplate-dark',
            <?php else: ?>
            skin : "oxide",
            content_css: null,
            <?php endif; ?>
                    <?php if(App::getLocale() !== 'en'): ?>
            language: '<?php echo e(App::getLocale()); ?>'
            <?php endif; ?>
        });
    });
</script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/components/tinymce.blade.php ENDPATH**/ ?>