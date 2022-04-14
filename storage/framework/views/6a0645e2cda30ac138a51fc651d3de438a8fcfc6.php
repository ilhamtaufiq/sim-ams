<?php echo $__env->make('boilerplate::load.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
<script>
    $(function() {
        $('#dt').dataTable({
            columns : [
                null,
                null,
                { render: function(data) { return moment(data).format('YYYY-MM-DD hh:mm') } }
            ]
        });
    });
</script>
<?php echo $__env->renderComponent(); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startComponent('boilerplate::card', ['color' => 'orange', 'title' => 'Datatables']); ?>
    Usage :
    <pre class="mb-3">&lt;x-boilerplate::datatable name="users" /></pre>
    <table class="table table-sm table-striped table-hover" id="dt">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Orlo Bashirian</td>
            <td>qWaelchi@hotmail.com</td>
            <td>2017-03-01 13:12</td>
        </tr>
        <tr>
            <td>Martina Armstrong</td>
            <td>Hertha92@yahoo.com</td>
            <td>2016-06-08 14:16</td>
        </tr>
        <tr>
            <td>Mandy Legros</td>
            <td>Kirsten68@gmail.com</td>
            <td>2017-08-15 12:10</td>
        </tr>
        <tr>
            <td>Anne Franecki</td>
            <td>Iva.shoen@hayley.com</td>
            <td>2017-08-15 12:15</td>
        </tr>
        </tbody>
    </table>

    <?php $__env->slot('footer'); ?>
        <div class="small text-muted text-right">
            <a href="https://sebastienheyd.github.io/boilerplate/components/datatable" target="_blank">component</a> /
            <a href="https://sebastienheyd.github.io/boilerplate/plugins/datatables" target="_blank">plugin</a> /
            <a href="https://datatables.net/manual/index">datatables</a>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/plugins/demo/datatables.blade.php ENDPATH**/ ?>