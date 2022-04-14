<table class="table table-striped no-border table-sm">
    <tr>
        <th><?php echo e(__('boilerplate::logs.show.filepath')); ?></th>
        <td><?php echo e($log->getPath()); ?></td>
    </tr>
    <tr>
        <th><?php echo e(__('boilerplate::logs.show.logentries')); ?></th>
        <td><?php echo e($entries->total()); ?></td>
    </tr>
    <tr>
        <th><?php echo e(__('boilerplate::logs.show.size')); ?></th>
        <td><?php echo e($log->size()); ?></td>
    </tr>
    <tr>
        <th><?php echo e(__('boilerplate::logs.show.createdat')); ?></th>
        <td><?php echo e($log->createdAt()->isoFormat(__('boilerplate::date.YmdHis'))); ?></td>
    </tr>
    <tr>
        <th><?php echo e(__('boilerplate::logs.show.updatedat')); ?></th>
        <td><?php echo e($log->updatedAt()->isoFormat(__('boilerplate::date.YmdHis'))); ?></td>
    </tr>
</table><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/logs/_partials/informations.blade.php ENDPATH**/ ?>