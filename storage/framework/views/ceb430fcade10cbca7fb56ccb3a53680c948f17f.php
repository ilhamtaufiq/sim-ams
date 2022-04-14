<?php echo $__env->make('boilerplate::logs.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <?php $__env->startComponent('boilerplate::card'); ?>
                <?php echo $rows->render(); ?>

                <div class="table-responsive">
                    <table class="table table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th class="<?php echo e($key == 'date' ? 'text-left' : 'text-center'); ?>">
                                        <?php if($key == 'date'): ?>

                                        <?php else: ?>
                                            <span class="badge badge-pill level-<?php echo e($key); ?>">
                                                <?php echo log_styler()->icon($key) . ' ' . $header; ?>

                                            </span>
                                        <?php endif; ?>
                                    </th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($rows->count() > 0): ?>
                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td class="<?php echo e($key == 'date' ? 'text-left' : 'text-center'); ?>">
                                            <?php if($key == 'date'): ?>
                                                <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d', $value)->isoFormat(__('boilerplate::date.Ymd'))); ?>

                                            <?php elseif($value == 0): ?>
                                                <span class="text-muted">.</span>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('boilerplate.logs.filter', [$date, $key])); ?>">
                                                    <span class="text-<?php echo e($key); ?> text-bold"><?php echo e($value); ?></span>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="text-right visible-on-hover no-wrap">
                                        <a href="<?php echo e(route('boilerplate.logs.show', [$date])); ?>" class="btn btn-sm btn-primary">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <a href="#delete-log-modal" class="btn btn-sm btn-danger" data-log-date="<?php echo e($date); ?>">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="11" class="text-center">
                                    <span class="badge badge-pill badge-default"><?php echo e(__('boilerplate::logs.list.empty-logs')); ?></span>
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php echo $rows->render(); ?>


            <?php $__env->slot('footer'); ?>
                <div class="text-right small text-muted">
                    <?php echo __('boilerplate::logs.vendor'); ?>

                </div>
            <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style> table tr th { border-top:0 !important } </style>
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
                        cache: false,
                        success: function(res) {
                            location.reload();
                        }
                    });
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('boilerplate::layout.index', [
    'title' => __('boilerplate::logs.menu.category'),
    'subtitle' => __('boilerplate::logs.menu.reports'),
    'breadcrumb' => [
        __('boilerplate::logs.menu.reports')
    ]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/logs/logs.blade.php ENDPATH**/ ?>