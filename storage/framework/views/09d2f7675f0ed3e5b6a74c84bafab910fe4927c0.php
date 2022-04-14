<table class="table table-sm table-striped no-border">
    <tbody>
    <?php $__currentLoopData = $log->menu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($item['count'] === 0): ?>
            <?php continue; ?>
        <?php endif; ?>
        <tr>
            <td>
                <a href="<?php echo e($item['count'] === 0 ? '#' : $item['url']); ?>" class="<?php echo e($item['count'] === 0 ? 'no-log ' : ''); ?>d-flex justify-content-between">
                    <span class="badge badge-pill level-<?php echo e($level); ?>">
                        <?php echo $item['icon']; ?> <?php echo e($item['name']); ?>

                    </span>
                    <span class="badge badge-pill level-<?php echo e($level); ?>">
                        <?php echo e($item['count']); ?>

                    </span>
                </a>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/logs/_partials/levels.blade.php ENDPATH**/ ?>