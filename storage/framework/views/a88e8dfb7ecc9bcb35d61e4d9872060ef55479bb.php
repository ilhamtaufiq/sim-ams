<?php echo $__env->make('boilerplate::load.fileinput', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        $('#files').fileinput()
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startComponent('boilerplate::card', ['color' => 'primary', 'title' => 'Fileinput']); ?>
    Usage :
    <pre>
&commat;include('boilerplate::load.fileinput')
&commat;push('js')
    &lt;script>
        $('#files').fileinput()
    &lt;/script>
&commat;endpush</pre>
    <input id="files" name="files" type="file" class="file" multiple>
    <?php $__env->slot('footer'); ?>
        <div class="text-muted small text-right">
            <a href="https://plugins.krajee.com/file-input" target="_blank">bootstrap-fileinput</a>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/plugins/demo/fileinput.blade.php ENDPATH**/ ?>