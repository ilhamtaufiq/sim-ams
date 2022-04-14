<?php if(empty($name)): ?>
    <code>
        &lt;x-boilerplate::datatable>
        The name attribute has not been set
    </code>
<?php elseif(! $permission): ?>
    <code>
        &lt;x-boilerplate::datatable>
        You don't have permission to access the table "<?php echo e($name); ?>"
    </code>
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-striped table-hover va-middle w-100<?php echo e($datatable->condensed ? ' table-sm' : ''); ?>" id="<?php echo e($id); ?>">
            <thead>
            <tr>
                <?php $__currentLoopData = $datatable->getColumns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th><?php echo $column->title; ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <?php if(in_array('filters', $datatable->buttons)): ?>
            <tr class="filters" style="display:none">
                <?php $__currentLoopData = $datatable->getColumns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th>
                        <?php if($column->searchable === false): ?>
                            <?php continue; ?>
                        <?php endif; ?>
                        <?php switch($column->filterType):
                            case ('select'): ?>
                                <?php $__env->startComponent('boilerplate::select2', ['name' => "filter[$k]", 'groupClass' => 'mb-0', 'class' => 'form-control-sm dt-filter-select', 'options' => $column->filterOptions, 'data-field' => "$k", 'allowClear' => true]); ?><?php echo $__env->renderComponent(); ?>
                            <?php break; ?>
                            <?php case ('select-multiple'): ?>
                                <?php $__env->startComponent('boilerplate::select2', ['name' => "filter[$k]", 'groupClass' => 'mb-0', 'class' => 'form-control-sm dt-filter-select', 'options' => $column->filterOptions, 'data-field' => "$k", 'multiple' => true]); ?><?php echo $__env->renderComponent(); ?>
                            <?php break; ?>
                            <?php case ('daterangepicker'): ?>
                                <?php $__env->startComponent('boilerplate::daterangepicker', ['name' => "filter[$k]", 'groupClass' => 'mb-0', 'class' => 'dt-filter-daterange', 'controlClass' => 'form-control-sm', 'data-field' => "$k", 'alignment' => 'center']); ?><?php echo $__env->renderComponent(); ?>
                            <?php break; ?>
                            <?php default: ?>
                                <?php $__env->startComponent('boilerplate::input', ['name' => "filter[$k]", 'groupClass' => 'mb-0', 'class' => 'dt-filter-text form-control-sm', 'data-field' => "$k"]); ?><?php echo $__env->renderComponent(); ?>
                            <?php break; ?>
                        <?php endswitch; ?>
                    </th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <?php endif; ?>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <?php echo $__env->make('boilerplate::load.async.datatables', ['buttons' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->startComponent('boilerplate::minify'); ?>
    <script>
        whenAssetIsLoaded('datatables', function() {
            window.<?php echo e($id); ?>_ajax = <?php echo json_encode($ajax); ?>

            window.<?php echo e(\Str::camel($id)); ?> = $('#<?php echo e($id); ?>')
                .data('inst', '<?php echo e(\Str::camel($id)); ?>' )
                .on('processing.dt', $.fn.dataTable.customProcessing).DataTable({
                processing: false,
                serverSide: true,
                autoWidth: false,
                orderCellsTop: true,
                buttons: { buttons: [<?php echo $datatable->getButtons(); ?>]},
                info: <?php echo e((int) $datatable->info); ?>,
                searching: <?php echo e((int) $datatable->searching); ?>,
                ordering: <?php echo e((int) $datatable->ordering); ?>,
                <?php if($datatable->ordering): ?>
                    order: <?php echo $datatable->order; ?>,
                <?php endif; ?>
                paging: <?php echo e((int) $datatable->paging); ?>,
                pageLength: <?php echo e($datatable->pageLength); ?>,
                <?php if($datatable->paging): ?>
                    pagingType: '<?php echo e($datatable->pagingType); ?>',
                    lengthChange: <?php echo e((int) $datatable->lengthChange); ?>,
                    lengthMenu: <?php echo $datatable->lengthMenu; ?>,
                <?php endif; ?>
                <?php if($datatable->stateSave): ?>
                    stateSave: true,
                    stateSaveParams: $.fn.dataTable.saveFiltersState,
                    stateLoadParams: $.fn.dataTable.loadFiltersState,
                <?php endif; ?>
                ajax: {
                    url: '<?php echo route('boilerplate.datatables', $datatable->slug, false); ?>',
                    type: 'post',
                    data: $.fn.dataTable.parseDatatableFilters,
                    complete: () => { $('#<?php echo e($id); ?> [name=dt-check-all]').prop('checked', false) }
                },
                columns: [
                    <?php $__currentLoopData = $datatable->getColumns(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $column->get(); ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                initComplete: $.fn.dataTable.init,
            });

            window.<?php echo e(\Str::camel($id)); ?>.locale = <?php echo $datatable->getLocale(); ?>

        });
    </script>
    <?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/components/datatable.blade.php ENDPATH**/ ?>