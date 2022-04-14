<?php $__env->startComponent('boilerplate::card', ['color' => 'warning', 'title' => 'CodeMirror']); ?>
        Usage :
        <pre>&lt;x-boilerplate::codemirror name="code">.color { color: red; }&lt;/x-boilerplate::codemirror></pre>
<?php $__env->startComponent('boilerplate::codemirror', ['name' => 'code']); ?><h1>CodeMirror demo</h1>
<style>
    .color {
        color: red;
    }
</style>
<script>
    $(function () {
        alert('demo');
    });
</script>
<?php echo $__env->renderComponent(); ?>
    <?php $__env->slot('footer'); ?>
        <div class="small text-muted text-right">
            <a href="https://sebastienheyd.github.io/boilerplate/components/codemirror" target="_blank">component</a> /
            <a href="https://sebastienheyd.github.io/boilerplate/plugins/codemirror" target="_blank">plugin</a> /
            <a href="https://codemirror.net/" target="_blank">CodeMirror</a>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/plugins/demo/codemirror.blade.php ENDPATH**/ ?>