<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('boilerplate::auth.loginbox'); ?>
        <p class="login-box-msg text-sm"><?php echo app('translator')->get('boilerplate::auth.login.intro'); ?></p>
        <?php echo Form::open(['route' => 'boilerplate.login', 'method' => 'post', 'autocomplete'=> 'off']); ?>

        <?php $__env->startComponent('boilerplate::input', ['name' => 'email', 'placeholder' => 'boilerplate::auth.fields.email', 'append-text' => 'fas fa-fw fa-envelope', 'type' => 'email']); ?><?php echo $__env->renderComponent(); ?>
        <?php $__env->startComponent('boilerplate::password', ['name' => 'password', 'placeholder' => 'boilerplate::auth.fields.password', 'check' => false]); ?><?php echo $__env->renderComponent(); ?>
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <?php $__env->startComponent('boilerplate::icheck', ['name' => 'remember', 'checked' => old('remember') == 'on', 'label' => 'boilerplate::auth.login.rememberme', 'class' => 'text-sm']); ?><?php echo $__env->renderComponent(); ?>
            <button type="submit" class="btn btn-primary mb-3"><?php echo app('translator')->get('boilerplate::auth.login.signin'); ?></button>
        </div>
        <?php echo Form::close(); ?>

        <div class="d-flex justify-content-between align-items-start">
            <div>
                <p class="mb-1 text-sm">
                    <a href="<?php echo e(route('boilerplate.password.request')); ?>"><?php echo app('translator')->get('boilerplate::auth.login.forgotpassword'); ?></a><br>
                </p>
                <?php if(config('boilerplate.auth.register')): ?>
                    <p class="mb-0 text-sm">
                        <a href="<?php echo e(route('boilerplate.register')); ?>" class="text-center"><?php echo app('translator')->get('boilerplate::auth.login.register'); ?></a>
                    </p>
                <?php endif; ?>
            </div>
            <?php if(config('boilerplate.locale.switch', false)): ?>
            <div class="dropdown-wrapper">
                <div class="form-group">
                    <select class="form-control form-control-sm" onchange="if (this.value) window.location.href=this.value">
                        <?php $__currentLoopData = collect(config('boilerplate.locale.languages'))->map(function($e){return $e['label'];})->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e(route('boilerplate.lang.switch', $lang)); ?>" <?php echo e($lang === App::getLocale() ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <?php endif; ?>
        </div>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('boilerplate::auth.layout', [
    'title' => __('boilerplate::auth.login.title'),
    'bodyClass' => 'hold-transition login-page'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/auth/login.blade.php ENDPATH**/ ?>