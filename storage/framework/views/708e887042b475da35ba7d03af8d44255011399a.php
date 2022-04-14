<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('boilerplate::auth.loginbox'); ?>
        <p class="login-box-msg text-sm"><?php echo app('translator')->get('boilerplate::auth.register.intro'); ?></p>
        <?php echo Form::open(['route' => 'boilerplate.register', 'method' => 'post', 'autocomplete'=> 'off']); ?>

            <?php $__env->startComponent('boilerplate::input', ['name' => 'first_name', 'placeholder' => 'boilerplate::auth.fields.first_name', 'append-text' => 'fas fa-fw fa-user', 'autofocus' => true]); ?><?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent('boilerplate::input', ['name' => 'last_name', 'placeholder' => 'boilerplate::auth.fields.last_name', 'append-text' => 'far fa-fw fa-user']); ?><?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent('boilerplate::input', ['name' => 'email', 'placeholder' => 'boilerplate::auth.fields.email', 'append-text' => 'fas fa-fw fa-envelope', 'type' => 'email']); ?><?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent('boilerplate::password', ['name' => 'password', 'placeholder' => 'boilerplate::auth.fields.password']); ?><?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent('boilerplate::password', ['name' => 'password_confirmation', 'placeholder' => 'boilerplate::auth.fields.password_confirm', 'check' => false]); ?><?php echo $__env->renderComponent(); ?>
            <div class="mb-3">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-primary">
                        <?php echo app('translator')->get('boilerplate::auth.register.register_button'); ?>
                    </button>
                </div>
            </div>
        <?php echo Form::close(); ?>

        <?php if(!$firstUser): ?>
            <p class="mb-0 text-sm">
                <a href="<?php echo e(route('boilerplate.login')); ?>"><?php echo app('translator')->get('boilerplate::auth.register.login_link'); ?></a><br>
            </p>
        <?php endif; ?>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('boilerplate::auth.layout', ['title' => __('boilerplate::auth.register.title'), 'bodyClass' => 'hold-transition login-page'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/auth/register.blade.php ENDPATH**/ ?>