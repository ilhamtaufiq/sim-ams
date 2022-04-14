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
</head>
<body class="hold-transition <?php echo e($bodyClass ?? 'login-page'); ?>">
    <?php echo $__env->yieldContent('content'); ?>
    <script src="<?php echo e(mix('/bootstrap.min.js', '/assets/vendor/boilerplate')); ?>"></script>
    <script src="<?php echo e(mix('/admin-lte.min.js', '/assets/vendor/boilerplate')); ?>"></script>
    <script src="<?php echo e(mix('/boilerplate.min.js', '/assets/vendor/boilerplate')); ?>"></script>
<?php echo $__env->yieldPushContent('js'); ?>
</body>
</html><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/auth/layout.blade.php ENDPATH**/ ?>