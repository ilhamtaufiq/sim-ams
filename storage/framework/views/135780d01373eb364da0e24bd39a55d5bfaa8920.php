<aside class="main-sidebar sidebar-<?php echo e(config('boilerplate.theme.sidebar.type')); ?>-<?php echo e(config('boilerplate.theme.sidebar.links.bg')); ?> elevation-<?php echo e(config('boilerplate.theme.sidebar.shadow')); ?>">
    <a href="<?php echo e(route('boilerplate.dashboard')); ?>" class="brand-link <?php echo e(!empty(config('boilerplate.theme.sidebar.brand.bg')) ? 'bg-'.config('boilerplate.theme.sidebar.brand.bg') : ''); ?>">
        <span class="brand-logo bg-<?php echo e(config('boilerplate.theme.sidebar.brand.logo.bg')); ?> elevation-<?php echo e(config('boilerplate.theme.sidebar.brand.logo.shadow')); ?>">
            <?php echo config('boilerplate.theme.sidebar.brand.logo.icon'); ?>

        </span>
        <span class="brand-text"><?php echo config('boilerplate.theme.sidebar.brand.logo.text'); ?></span>
    </a>
    <div class="sidebar">
        <?php if(config('boilerplate.theme.sidebar.user.visible')): ?>
            <div class="user-panel py-3 d-flex">
                <div class="image">
                    <img src="<?php echo e(Auth::user()->avatar_url); ?>" class="avatar-img img-circle elevation-<?php echo e(config('boilerplate.theme.sidebar.user.shadow')); ?>" alt="<?php echo e(Auth::user()->name); ?>">
                </div>
                <div class="info">
                    <a href="<?php echo e(route('boilerplate.user.profile')); ?>" class="d-block"><?php echo e(Auth::user()->name); ?></a>
                </div>
            </div>
        <?php endif; ?>
        <nav class="mt-3">
            <?php echo $menu; ?>

        </nav>
    </div>
</aside>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/layout/mainsidebar.blade.php ENDPATH**/ ?>