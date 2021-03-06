<?php $__env->startComponent('boilerplate::card', ['color' => 'danger', 'title' => 'Toastr / Growl']); ?>
Usage :
<pre>
&lt;button class="btn btn-primary" onclick="growl('Example')">growl&lt;/button>
</pre>

        <p><button class="btn btn-primary" onclick="growl('Example')">growl</button></p>
        <pre class="prettyprint">growl('Example')</pre>

        <p>
            <button class="btn btn-info" onclick="growl('Example', 'info')">growl info</button>
            <button class="btn btn-success" onclick="growl('Example', 'success')">growl success</button>
            <button class="btn btn-warning" onclick="growl('Example', 'warning')">growl warning</button>
            <button class="btn btn-danger" onclick="growl('Example', 'error')">growl error</button>
        </p>
        <pre class="prettyprint">growl('Example', 'success')</pre>

    <?php $__env->slot('footer'); ?>
    <div class="small text-muted text-right">
        <a href="https://codeseven.github.io/toastr/">Toastr</a>
    </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/plugins/demo/notify.blade.php ENDPATH**/ ?>