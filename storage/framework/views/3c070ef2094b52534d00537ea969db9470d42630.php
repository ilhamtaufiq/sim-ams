<div class="card<?php echo e($tabs ? ($outline ? ' card-outline card-outline-tabs' : ' card-tabs') : ($outline ? ' card-outline' : '')); ?> card-<?php echo e($color ?? config('boilerplate.theme.card.default_color', 'info')); ?><?php echo e(($bgColor ?? null) ? ' bg-'.$bgColor : ''); ?><?php echo e($collapsed ? ' collapsed-card' : ''); ?><?php echo e(!empty($class) ? ' '.$class : ''); ?>"<?php echo empty($attributes) ? '' : ' '.$attributes; ?>>
<?php if($title ?? false || $header ?? false || $tools ?? false || $maximize || $reduce || $close): ?>
    <div class="card-header<?php echo e($tabs ? ($outline ? ' p-0' : ' p-0 pt-1') : ''); ?> border-bottom-0">
<?php if($header ?? false): ?>
        <?php echo $header; ?>

<?php else: ?>
        <h3 class="card-title"><?php echo app('translator')->get($title ?? ''); ?></h3>
<?php if($tools ?? false || $maximize || $reduce || $close): ?>
        <div class="card-tools">
<?php if(isset($tools)): ?>
            <?php echo $tools ?? ''; ?>

<?php endif; ?>
<?php if($maximize): ?>
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
<?php endif; ?>
<?php if($reduce): ?>
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-<?php echo e($collapsed ? 'plus' : 'minus'); ?>"></i></button>
<?php endif; ?>
<?php if($close): ?>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
<?php endif; ?>
        </div>
<?php endif; ?>
<?php endif; ?>
    </div>
<?php endif; ?>
    <div class="card-body<?php echo e($title ?? false ? ($outline ? ' pt-0' : '') : ''); ?>"><?php echo e($slot); ?></div>
<?php if(isset($footer)): ?>
    <div class="card-footer"><?php echo $footer; ?></div>
<?php endif; ?>
</div>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/components/card.blade.php ENDPATH**/ ?>