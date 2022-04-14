<?php ($date = \Carbon\Carbon::createFromFormat('Y-m-d', $log->date)->isoFormat(__('boilerplate::date.lFdY'))); ?>



<?php echo $__env->make('boilerplate::logs.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12 pb-3">
            <a href="<?php echo e(route('boilerplate.logs.list')); ?>" class="btn btn-default">
                <span class="far fa-arrow-alt-circle-left text-muted"></span>
            </a>
            <span class="float-right">
                <span class="btn-group">
                    <a href="<?php echo e(route('boilerplate.logs.download', [$log->date])); ?>" class="btn btn-default" data-toggle="tooltip" title="<?php echo e(__('boilerplate::logs.show.download')); ?>">
                        <span class="fa fa-download text-muted"></span>
                    </a>
                    <a href="#delete-log-modal" class="btn btn-danger" data-log-date="<?php echo e($log->date); ?>" data-toggle="tooltip" title="<?php echo e(__('boilerplate::logs.show.delete')); ?>">
                        <span class="fa fa-trash"></span>
                    </a>
                </span>
            </span>
        </div>
        <div class="col-3">
            <?php $__env->startComponent('boilerplate::card', ['title' => __('boilerplate::logs.show.levels'), 'color' => 'info']); ?>
                <?php echo $__env->make('boilerplate::logs._partials.levels', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent('boilerplate::card', ['title' => __('boilerplate::logs.show.loginfo'), 'color' => 'warning']); ?>
                <?php echo $__env->make('boilerplate::logs._partials.informations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-9">
            <?php $__env->startComponent('boilerplate::card', ['title' => ucfirst(__('boilerplate::logs.show.file', ['date' => $date]))]); ?>
                <div class="table-responsive">
                    <table id="entries" class="table table-sm">
                        <thead>
                            <tr class="text-center">
                                <th><?php echo e(__('boilerplate::logs.show.env')); ?></th>
                                <th style="width: 120px;"><?php echo e(__('boilerplate::logs.show.level')); ?></th>
                                <th style="width: 65px;"><?php echo e(__('boilerplate::logs.show.time')); ?></th>
                                <th><?php echo e(__('boilerplate::logs.show.header')); ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="<?php echo e($key %2 ? 'even' : 'odd'); ?>">
                                <td class="px-2">
                                    <span class="badge badge-pill bg-purple">
                                        <?php echo e($entry->env); ?>

                                    </span>
                                </td>
                                <td class="px-2">
                                    <span class="badge badge-pill level-<?php echo e($entry->level); ?>">
                                        <?php echo $entry->level(); ?>

                                    </span>
                                </td>
                                <td class="px-2">
                                    <span class="badge badge-pill bg-secondary">
                                        <?php echo e($entry->datetime->format('H:i:s')); ?>

                                    </span>
                                </td>
                                <td class="text-sm">
                                    <?php echo e($entry->header); ?>

                                </td>
                                <td class="text-right px-2">
                                    <?php if($entry->hasStack()): ?>
                                        <a class="btn btn-xs btn-default" role="button" data-toggle="collapse" href="#log-stack-<?php echo e($key); ?>" aria-expanded="false" aria-controls="log-stack-<?php echo e($key); ?>">
                                            Stack
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php if($entry->hasStack()): ?>
                                <tr class="log-stack <?php echo e($key %2 ? 'even' : 'odd'); ?>">
                                    <td colspan="5" class="stack">
                                        <div class="stack-content collapse" id="log-stack-<?php echo e($key); ?>">
                                            <?php echo preg_replace('`#([0-9]*)\s`', "<br /><strong>#$1</strong> ", $entry->stack()); ?>

                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <?php if($entries->hasPages()): ?>
                    <div class="panel-footer d-flex justify-content-between align-items-center text-sm">
                        <span class="pull-right small text-muted mtm">
                            <?php echo e(__('boilerplate::logs.show.page', ['current' => $entries->currentPage(), 'last' => $entries->lastPage()])); ?>

                        </span>
                        <?php echo $entries->render(); ?>

                    </div>
                <?php endif; ?>

            <?php $__env->slot('footer'); ?>
                <div class="text-muted text-right small">
                    <?php echo __('boilerplate::logs.vendor'); ?>

                </div>
            <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>.pagination { margin: 0; }</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        $(function () {
            $('a[href="#delete-log-modal"]').on('click', function(e){

                e.preventDefault();
                var el = $(this);

                bootbox.confirm("<?php echo e(__('boilerplate::logs.list.deletequestion')); ?>", function(e){
                    if(e === false) return;

                    $.ajax({
                        url: '<?php echo e(route('boilerplate.logs.delete')); ?>',
                        type: 'delete',
                        dataType: 'json',
                        data: {date:el.data('log-date')},
                        headers: {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
                        cache: false,
                        success: function(res) {
                            location.replace("<?php echo e(route('boilerplate.logs.list')); ?>");
                        }
                    });
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('boilerplate::layout.index', [
    'title' => __('boilerplate::logs.menu.category'),
    'subtitle' => __('boilerplate::logs.show.title', ['date' => $date]),
    'breadcrumb' => [
        __('boilerplate::logs.menu.reports') => 'boilerplate.logs.list',
        __('boilerplate::logs.show.title', ['date' => $date])
    ]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/logs/show.blade.php ENDPATH**/ ?>