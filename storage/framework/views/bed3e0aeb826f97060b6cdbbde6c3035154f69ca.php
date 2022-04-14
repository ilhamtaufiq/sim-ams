<?php if (! $__env->hasRenderedOnce('f229cb70-02d7-4d4d-8a82-2a6d9f80c29b')): $__env->markAsRenderedOnce('f229cb70-02d7-4d4d-8a82-2a6d9f80c29b'); ?>
<?php $__env->startComponent('boilerplate::minify'); ?>
<script>
    loadScript("<?php echo mix('/plugins/tinymce/tinymce.min.js', '/assets/vendor/boilerplate'); ?>", () => {
        tinymce.defaultSettings = {
            plugins: "autoresize fullscreen codemirror link lists table media image imagetools paste customalign",
            toolbar: "undo redo | styleselect | bold italic underline | customalignleft aligncenter customalignright | link media image | bullist numlist | table | code fullscreen",
            contextmenu: "link image imagetools table spellchecker bold italic underline",
            toolbar_drawer: "sliding",
            toolbar_sticky_offset: $('nav.main-header').outerHeight(),
            codemirror: { config: { theme: 'storm' } },
            menubar: false,
            removed_menuitems: 'newdocument',
            remove_linebreaks: false,
            forced_root_block: false,
            force_p_newlines: true,
            relative_urls: false,
            verify_html: false,
            branding: false,
            statusbar: false,
            browser_spellcheck: true,
            encoding: 'UTF-8',
            image_uploadtab: false,
            deprecation_warnings: false,
            paste_preprocess: function(plugin, args) {
                args.content = args.content.replace(/<(\/)*(\\?xml:|meta|link|span|font|del|ins|st1:|[ovwxp]:)((.|\s)*?)>/gi, ''); // Unwanted tags
                args.content = args.content.replace(/\s(class|style|type|start)=("(.*?)"|(\w*))/gi, ''); // Unwanted attributes
                args.content = args.content.replace(/<(p|a|div|span|strike|strong|i|u)[^>]*?>(\s|&nbsp;|<br\/>|\r|\n)*?<\/(p|a|div|span|strike|strong|i|u)>/gi, ''); // Empty tags
            },
            <?php if(setting('darkmode', false) && config('boilerplate.theme.darkmode')): ?>
                skin : "boilerplate-dark",
                content_css: 'boilerplate-dark',
            <?php else: ?>
                skin : "oxide",
            <?php endif; ?>
            <?php if(App::getLocale() !== 'en'): ?>
                language: '<?php echo e(App::getLocale()); ?>',
            <?php endif; ?>
            <?php echo $__env->renderWhen($hasMediaManager, 'boilerplate-media-manager::load.mceextend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        };

        /** Fix for editors removed from the DOM (modal, ajax, ...) **/
        setInterval(() => {
            if (tinymce.editors.length > 0) {
                $(tinymce.editors).each((i,e) => {
                    if($('#'+e.id).length === 0) {
                        tinymce.get(e.id).remove();
                    }
                });
            }
        });
    });
</script>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/load/async/tinymce.blade.php ENDPATH**/ ?>