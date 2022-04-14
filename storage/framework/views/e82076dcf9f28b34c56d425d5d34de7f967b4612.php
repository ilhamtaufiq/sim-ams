<?php if (! $__env->hasRenderedOnce('46d37940-373b-4f93-8e2d-1b1064b2a3b9')): $__env->markAsRenderedOnce('46d37940-373b-4f93-8e2d-1b1064b2a3b9'); ?>
<?php
    $default = [
        'mode/xml/xml.js',
        'mode/css/css.js',
        'mode/javascript/javascript.js',
        'mode/htmlmixed/htmlmixed.js',
        'addon/edit/matchtags.js',
        'addon/edit/matchbrackets.js',
        'addon/edit/closetag.js',
        'addon/fold/xml-fold.js',
        'addon/selection/active-line.js'
    ];

    if (isset($js) && is_array($js)) {
        $default = array_merge($default, $js);
    }

    $js = array_unique($default);
?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <script>
        loadStylesheet('<?php echo e(mix('/plugins/codemirror/codemirror.min.css', '/assets/vendor/boilerplate')); ?>', () => {
            loadStylesheet('/assets/vendor/boilerplate/plugins/codemirror/theme/<?php echo e($theme ?? 'storm'); ?>.css', () => {
                loadScript('<?php echo e(mix('/plugins/codemirror/jquery.codemirror.min.js', '/assets/vendor/boilerplate')); ?>', () => {
                    <?php if(!empty($js)): ?>
                        <?php $__currentLoopData = $js; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            loadScript("/assets/vendor/boilerplate/plugins/codemirror/<?php echo e($script); ?>", () => {
                            <?php if($loop->last): ?>
                                registerAsset('CodeMirror', () => {
                                    $.fn.codemirror.defaults.theme = '<?php echo e($theme ?? 'storm'); ?>';
                                });
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $js; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $script): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            });
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                });
            });
        });
    </script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/load/async/codemirror.blade.php ENDPATH**/ ?>