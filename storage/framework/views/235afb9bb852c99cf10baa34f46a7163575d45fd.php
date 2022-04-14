<div class="form-group<?php echo e(!empty($class) ? ' '.$class : ''); ?>">
    <div class="icheck-<?php echo e($color ?? 'primary'); ?>"<?php echo !empty($attributes) ? ' '.$attributes : ''; ?>>
        <input type="<?php echo e($type ?? 'checkbox'); ?>" id="<?php echo e($id); ?>"<?php echo e((!empty($name) ? old($name, $checked ?? false) : $checked ?? false) ? ' checked' : ''); ?><?php echo e($disabled ? ' disabled' : ''); ?><?php echo !empty($name) ? ' name="'.$name.'"' : ''; ?><?php echo !empty($value) ? ' value="'.$value.'"' : ''; ?> autocomplete="off">
        <label for="<?php echo e($id); ?>" class="font-weight-normal"><?php echo app('translator')->get($label ?? ''); ?></label>
    </div>
</div>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/components/icheck.blade.php ENDPATH**/ ?>