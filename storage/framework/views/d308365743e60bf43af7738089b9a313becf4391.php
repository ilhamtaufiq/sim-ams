<div class="login-box">
    <div class="login-logo">
        <?php echo config('boilerplate.theme.sidebar.brand.logo.icon') ?? ''; ?>

        <?php echo config('boilerplate.theme.sidebar.brand.logo.text') ?? $title ?? ''; ?>

    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <?php echo e($slot); ?>

        </div>
    </div>
</div>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/auth/loginbox.blade.php ENDPATH**/ ?>