<?php echo $__env->make('boilerplate::load.fullcalendar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
    <script>
        $('#calendar').fullCalendar({
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            buttonIcons: false,
            navLinks: true,
            editable: true,
            dayMaxEvents: true,
            events: 'https://fullcalendar.io/demo-events.json?overload-day'
        })
    </script>
<?php echo $__env->renderComponent(); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startComponent('boilerplate::card', ['color' => 'success', 'title' => 'FullCalendar']); ?>
    Usage :
    <pre>
&commat;include('boilerplate::load.fullcalendar')
&commat;push('js')
    &lt;script>
        var calendar = $('#calendar').fullCalendar({
            buttonIcons: false,
        });
    &lt;/script>
&commat;endpush</pre>

    <div id='calendar'></div>

    <?php $__env->slot('footer'); ?>
        <div class="text-muted small text-right">
            <a href="https://fullcalendar.io" target="_blank">FullCalendar</a>
        </div>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/plugins/demo/fullcalendar.blade.php ENDPATH**/ ?>