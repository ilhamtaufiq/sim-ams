<footer class="main-footer text-sm">
    <strong>
        &copy; <?php echo e(date('Y')); ?>

        <?php if(config('boilerplate.theme.footer.vendorlink')): ?>
            <a href="<?php echo e(config('boilerplate.theme.footer.vendorlink')); ?>">
                <?php echo config('boilerplate.theme.footer.vendorname'); ?>

            </a>.
        <?php else: ?>
            <?php echo config('boilerplate.theme.footer.vendorname'); ?>.
        <?php endif; ?>
    </strong>
    <?php echo e(__('boilerplate::layout.rightsres')); ?>

    <div class="float-right d-none d-sm-inline">
        <a href="https://github.com/sebastienheyd/boilerplate">
            Boilerplate
        </a>
    </div>
</footer><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/layout/footer.blade.php ENDPATH**/ ?>