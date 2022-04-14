<?php echo $__env->make('boilerplate::logs.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <?php $__env->startComponent('boilerplate::card'); ?>
                <?php if(empty($percents)): ?>
                    <?php echo e(__('boilerplate::logs.list.empty-logs')); ?>

                <?php else: ?>
                <div class="row">
                    <div class="mb-3 ml-auto mr-auto col-md-6 col-lg-3">
                        <canvas id="stats-doughnut-chart" height="300"></canvas>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <?php $__currentLoopData = $percents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="info-box level level-<?php echo e($level); ?> <?php echo e($item['count'] === 0 ? 'level-empty' : ''); ?>">
                                        <span class="info-box-icon">
                                            <?php echo log_styler()->icon($level); ?>

                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text"><?php echo e($item['name']); ?></span>
                                            <span class="info-box-number">
                                                <?php echo e(__('boilerplate::logs.stats.entries', $item)); ?>

                                            </span>
                                            <div class="progress">
                                                <div class="progress-bar"
                                                     style="width: <?php echo e($item['percent']); ?>%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php $__env->slot('footer'); ?>
                    <div class="text-right text-muted small">
                        <?php echo __('boilerplate::logs.vendor'); ?>

                    </div>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>
    <script>
        $(function() {
            new Chart($('canvas#stats-doughnut-chart'), {
                type: 'doughnut',
                data:<?php echo $chartData; ?>,
                options: {
                    legend: {
                        position: 'bottom'
                    }
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('boilerplate::layout.index', [
    'title' => __('boilerplate::logs.menu.category'),
    'subtitle' => __('boilerplate::logs.menu.stats'),
    'breadcrumb' => [
        __('boilerplate::logs.menu.stats')
    ]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/logs/dashboard.blade.php ENDPATH**/ ?>