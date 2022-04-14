<?php if($button === 'refresh'): ?>
{className: 'btn-sm', text: '<span class="fa fa-fw fa-sync-alt"></span>', action: ( e, dt ) => { dt.ajax.reload() } },
<?php elseif($button === 'filters'): ?>
{className: 'btn-sm show-filters', text:'<span class="fa fa-fw fa-filter"></span><span class="fa fa-caret-down"></span>'},
<?php else: ?>
{className: 'btn-sm', extend: '<?php echo e($button); ?>', text:'<span class="fa fa-fw fa-<?php echo e($icons[$button] ?? $button); ?>"></span>'},
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/components/datatablebutton.blade.php ENDPATH**/ ?>