<?php if(empty($name)): ?>
<code>
    &lt;x-boilerplate::input>
    The name attribute has not been set
</code>
<?php else: ?>
<div class="form-group<?php echo e(isset($groupClass) ? ' '.$groupClass : ''); ?>"<?php echo isset($groupId) ? ' id="'.$groupId.'"' : ''; ?>>
<?php if(isset($label)): ?>
    <label><?php echo __($label); ?></label>
<?php endif; ?>
<?php if($prepend || $prependText || $append || $appendText): ?>
    <div class="input-group">
<?php endif; ?>
<?php if($prepend || $prependText): ?>
        <div class="input-group-prepend">
<?php if($prepend): ?>
            <?php echo $prepend; ?>

<?php else: ?>
            <span class="input-group-text"><?php echo $prependText; ?></span>
<?php endif; ?>
        </div>
<?php endif; ?>
<?php if($type === 'password'): ?>
    <?php echo Form::password($name, array_merge(['class' => 'form-control'.$errors->first($nameDot,' is-invalid').(isset($class) ? ' '.$class : '')], $attributes)); ?>

<?php elseif($type === 'file'): ?>
    <?php echo Form::file($name, array_merge(['class' => 'form-control-file'.$errors->first($nameDot,' is-invalid').(isset($class) ? ' '.$class : '')], $attributes)); ?>

<?php elseif($type === 'select'): ?>
    <?php echo Form::select($name, $options ?? [], old($name, $value ?? ''), array_merge(['class' => 'form-control'.$errors->first($nameDot,' is-invalid').(isset($class) ? ' '.$class : '')], $attributes)); ?>

<?php else: ?>
    <?php echo Form::{$type ?? 'text'}($name, old($name, $value ?? ''), array_merge(['class' => 'form-control'.$errors->first($nameDot,' is-invalid').(isset($class) ? ' '.$class : '')], $attributes)); ?>

<?php endif; ?>
<?php if($append || $appendText): ?>
        <div class="input-group-append">
<?php if($append): ?>
            <?php echo $append; ?>

<?php else: ?>
            <span class="input-group-text"><?php echo $appendText; ?></span>
<?php endif; ?>
        </div>
<?php endif; ?>
<?php if($prepend || $prependText || $append || $appendText): ?>
    </div>
<?php endif; ?>
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
<?php endif; ?>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/components/input.blade.php ENDPATH**/ ?>