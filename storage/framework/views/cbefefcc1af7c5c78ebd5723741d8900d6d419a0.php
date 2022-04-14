<nav class="main-header navbar navbar-expand<?php echo e(config('boilerplate.theme.navbar.bg') === 'white' ? '' : ' navbar-'.config('boilerplate.theme.navbar.bg')); ?> navbar-<?php echo e(setting('darkmode', false) && config('boilerplate.theme.darkmode') ? 'dark' : config('boilerplate.theme.navbar.type')); ?> <?php echo e(config('boilerplate.theme.navbar.border') ? "" : "border-bottom-0"); ?>" data-type="<?php echo e(config('boilerplate.theme.navbar.type')); ?>">
    <div class="navbar-left d-flex">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebar-toggle px-2" data-widget="pushmenu" href="#">
                    <i class="fas fa-fw fa-bars"></i>
                </a>
            </li>
        </ul>
        <?php $__currentLoopData = app('boilerplate.navbar.items')->getItems('left'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $view; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="navbar-right ml-auto d-flex">
        <?php $__currentLoopData = app('boilerplate.navbar.items')->getItems('right'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $view; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <ul class="nav navbar-nav">
            <?php if(config('boilerplate.locale.switch', false)): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle px-2" data-toggle="dropdown" href="#" aria-expanded="false">
                    <?php echo e(Config::get('boilerplate.locale.languages.'.App::getLocale().'.label')); ?>

                </a>
                <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
<?php $__currentLoopData = collect(config('boilerplate.locale.languages'))->map(function($e){return $e['label'];})->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($lang !== App::getLocale()): ?>
                    <a href="<?php echo e(route('boilerplate.lang.switch', $lang)); ?>" class="dropdown-item"><?php echo e($label); ?></a>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </li>
            <?php endif; ?>
            <?php if(config('boilerplate.theme.navbar.user.visible')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('boilerplate.user.profile')); ?>" class="nav-link d-flex align-items-center px-2">
                    <img src="<?php echo e(Auth::user()->avatar_url); ?>" class="avatar-img img-circle bg-gray mr-0 mr-md-2 elevation-<?php echo e(config('boilerplate.theme.navbar.user.shadow')); ?>" alt="<?php echo e(Auth::user()->name); ?>" height="32">
                    <span class="d-none d-md-block"><?php echo e(Auth::user()->name); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php if(config('boilerplate.theme.darkmode', false)): ?>
            <li class="nav-item">
                <a class="nav-link px-2" data-widget="darkmode" href="#" role="button">
                    <?php if(setting('darkmode', false)): ?>
                    <i class="fas fa-fw fa-sun"></i>
                    <?php else: ?>
                    <i class="far fa-fw fa-moon"></i>
                    <?php endif; ?>
                </a>
            </li>
            <?php endif; ?>
            <?php if(config('boilerplate.theme.fullscreen', false)): ?>
            <li class="nav-item">
                <a class="nav-link px-2" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-fw fa-expand-arrows-alt"></i>
                </a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <?php echo Form::open(['route' => 'boilerplate.logout', 'method' => 'post', 'id' => 'logout-form']); ?>

                <button type="submit" class="btn nav-link d-flex align-items-center logout px-2" data-question="<?php echo e(__('boilerplate::layout.logoutconfirm')); ?>">
                    <span class="fa fa-fw fa-power-off hidden-xs pr-1"></span>
                </button>
                <?php echo Form::close(); ?>

            </li>
        </ul>
    </div>
</nav>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/layout/header.blade.php ENDPATH**/ ?>