<!DOCTYPE html>
<html lang="<?php echo e(App::getLocale()); ?>" dir="<?php echo app('translator')->get('boilerplate::layout.direction'); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title); ?> | <?php echo e(config('app.name')); ?></title>
    <link rel="shortcut icon" href="<?php echo e(config('boilerplate.theme.favicon') ?? mix('favicon.svg', '/assets/vendor/boilerplate')); ?>">
<?php echo $__env->yieldPushContent('plugin-css'); ?>
    <link rel="stylesheet" href="<?php echo e(mix('/plugins/fontawesome/fontawesome.min.css', '/assets/vendor/boilerplate')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('/adminlte.min.css', '/assets/vendor/boilerplate')); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
<?php echo $__env->yieldPushContent('css'); ?>
    <script src="<?php echo e(mix('/bootstrap.min.js', '/assets/vendor/boilerplate')); ?>"></script>
    <script src="<?php echo e(mix('/admin-lte.min.js', '/assets/vendor/boilerplate')); ?>"></script>
    <script src="<?php echo e(mix('/boilerplate.min.js', '/assets/vendor/boilerplate')); ?>"></script>
<?php echo $__env->yieldPushContent('plugin-js'); ?>
</head>
<body class="layout-fixed layout-navbar-fixed sidebar-mini<?php echo e(setting('darkmode', false) && config('boilerplate.theme.darkmode') ? ' dark-mode accent-light' : ''); ?><?php echo e(setting('sidebar-collapsed', false) ? ' sidebar-collapse' : ''); ?>">
    <div class="wrapper">
        <?php echo $__env->make('boilerplate::layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('boilerplate::layout.mainsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content-wrapper">
            <?php echo $__env->make('boilerplate::layout.contentheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <section class="content">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </section>
        </div>
        <?php echo $__env->renderWhen(config('boilerplate.theme.footer.visible', true), 'boilerplate::layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        <aside class="control-sidebar control-sidebar-<?php echo e(config('boilerplate.theme.sidebar.type')); ?> elevation-<?php echo e(config('boilerplate.theme.sidebar.shadow')); ?>">
            <button class="btn btn-sm" data-widget="control-sidebar"><span class="fa fa-times"></span></button>
            <div class="control-sidebar-content">
                <div class="p-3">
                    <?php echo $__env->yieldContent('right-sidebar'); ?>
                </div>
            </div>
        </aside>
        <div class="control-sidebar-bg"></div>
    </div>
    <?php $__env->startComponent('boilerplate::minify'); ?>
    <script>
        $.ajaxSetup({headers:{'X-CSRF-TOKEN':'<?php echo e(csrf_token()); ?>'}});
        bootbox.setLocale('<?php echo e(App::getLocale()); ?>');
        var bpRoutes={
            settings:"<?php echo e(route('boilerplate.settings',null,false)); ?>"
        };
        var session={
            keepalive:"<?php echo e(route('boilerplate.keepalive', null, false)); ?>",
            expire:<?php echo e(time() +  config('session.lifetime') * 60); ?>,
            lifetime:<?php echo e(config('session.lifetime') * 60); ?>,
            id:"<?php echo e(session()->getId()); ?>"
        };
        <?php if(Session::has('growl')): ?>
        <?php if(is_array(Session::get('growl'))): ?>
            growl("<?php echo Session::get('growl')[0]; ?>", "<?php echo e(Session::get('growl')[1]); ?>");
        <?php else: ?>
            growl("<?php echo e(Session::get('growl')); ?>");
        <?php endif; ?>
        <?php endif; ?>
    </script>
    <?php echo $__env->renderComponent(); ?>
<?php echo $__env->yieldPushContent('js'); ?>
</body>
</html>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/layout/index.blade.php ENDPATH**/ ?>