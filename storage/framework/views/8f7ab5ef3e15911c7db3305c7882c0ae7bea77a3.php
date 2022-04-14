<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('boilerplate::auth.loginbox'); ?>
        <?php echo e(Form::open(['route' => 'boilerplate.users.firstlogin', 'autocomplete' => 'off'])); ?>

        <input type="hidden" name="token" value="<?php echo e($token); ?>">
        <div class="alert alert-info">
            <?php echo app('translator')->get('boilerplate::auth.firstlogin.intro'); ?>
        </div>
        <?php $__env->startComponent('boilerplate::password', ['name' => 'password', 'placeholder' => 'boilerplate::auth.fields.password', 'autofocus' => true]); ?><?php echo $__env->renderComponent(); ?>
        <?php $__env->startComponent('boilerplate::password', ['name' => 'password_confirmation', 'placeholder' => 'boilerplate::auth.fields.password_confirm', 'check' => false]); ?><?php echo $__env->renderComponent(); ?>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('boilerplate::auth.firstlogin.button'); ?></button>
        </div>
        </form>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('boilerplate::auth.layout', [
    'title' => __('boilerplate::auth.firstlogin.title'),
    'bodyClass' => 'hold-transition login-page'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/auth/firstlogin.blade.php ENDPATH**/ ?>