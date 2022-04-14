<?php if(empty($name)): ?>
<code>
    &lt;x-boilerplate::password>
    The name attribute has not been set
</code>
<?php else: ?>
<div class="form-group<?php echo e(isset($groupClass) ? ' '.$groupClass : ''); ?>"<?php echo isset($groupId) ? ' id="'.$groupId.'"' : ''; ?>>
<?php if(isset($label)): ?>
    <label><?php echo __($label); ?></label>
<?php endif; ?>
    <div class="input-group password">
        <?php echo Form::password($name, array_merge(['class' => 'form-control'.$errors->first($nameDot,' is-invalid').(isset($class) ? ' '.$class : '')], $attributes)); ?>

        <div class="input-group-append">
            <button type="button" class="btn" data-toggle="password" tabindex="-1"><i class="far fa-fw fa-eye"></i></button>
        </div>
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
</div>
<?php endif; ?>
<?php if($check): ?>
<?php $__env->startPush('js'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
<script>
    $(() => {
        var <?php echo e($name); ?>_el = $('input[name="<?php echo e($name); ?>"]');
        var <?php echo e($name); ?>_ppv = <?php echo e($name); ?>_el.popover({
            title: "<?php echo e(ucfirst(__('boilerplate::password.requirements'))); ?>",
            content: '',
            placement: 'bottom',
            trigger: 'manual',
            html: true
        });

        <?php echo e($name); ?>_el.on('keyup focus', function() {
            let er = [];

            $.map([
                [/.{<?php echo $length; ?>,}/, "<?php echo e(__('boilerplate::password.length', ['nb' => $length])); ?>"],
                [/[a-z]+/, "<?php echo e(__('boilerplate::password.letter')); ?>"],
                [/[0-9]+/, "<?php echo e(__('boilerplate::password.number')); ?>"],
                [/[A-Z]+/, "<?php echo e(__('boilerplate::password.capital')); ?>"],
                [/[^A-Za-z0-9]+/, "<?php echo e(__('boilerplate::password.special')); ?>"]
            ], function(rule) {
                if(!<?php echo e($name); ?>_el.val().match(rule[0])) {
                    er.push(rule[1]);
                }
            });

            if(er.length > 0) {
                <?php echo e($name); ?>_el.data('bs.popover').config.content = er.join('<br/>');
                <?php echo e($name); ?>_ppv.popover('show');
            } else {
                <?php echo e($name); ?>_ppv.popover('hide');
            }
        }).on('blur', () => {
            <?php echo e($name); ?>_ppv.popover('hide');
        });
    });
</script>
<?php echo $__env->renderComponent(); ?>
<?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/components/password.blade.php ENDPATH**/ ?>