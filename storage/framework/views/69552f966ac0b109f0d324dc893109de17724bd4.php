<?php $__env->startSection('content'); ?>
    <?php echo e(Form::open(['route' => ['boilerplate.user.profile'], 'method' => 'post', 'autocomplete' => 'off', 'files' => true])); ?>

        <div class="row">
            <div class="col-12 mb-3">
                <span class="btn-group float-right">
                    <button type="submit" class="btn btn-primary">
                        <?php echo app('translator')->get('boilerplate::users.save'); ?>
                    </button>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-5">
                <?php $__env->startComponent('boilerplate::card', ['title' => __('boilerplate::users.profile.title')]); ?>
                    <div class="d-flex flex-wrap">
                        <div id="avatar-wrapper" class="mb-3">
                            <?php echo $__env->make('boilerplate::users.avatar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="pl-3">
                            <span class="info-box-text">
                                <p class="mb-0"><strong class="h3"><?php echo e($user->name); ?></strong></p>
                                <p class=""><?php echo e($user->getRolesList()); ?></p>
                            </span>
                            <span class="info-box-more">
                                <p class="text-muted">
                                    <span class="far fa-fw fa-envelope"></span> <?php echo e($user->email); ?>

                                </p>
                                <p class="mb-0 text-muted">
                                    <?php echo e(__('boilerplate::users.profile.subscribedsince', [
                                        'date' => $user->created_at->isoFormat(__('boilerplate::date.lFdY')),
                                        'since' => $user->created_at->diffForHumans()])); ?>

                                </p>
                            </span>
                        </div>
                    </div>
                <?php echo $__env->renderComponent(); ?>
            </div>
            <div class="col-xl-7">
                <?php $__env->startComponent('boilerplate::card', ['color' => 'teal', 'title' => __('boilerplate::users.informations')]); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?php $__env->startComponent('boilerplate::input', ['name' => 'first_name', 'label' => 'boilerplate::users.firstname', 'value' => $user->first_name, 'autofocus' => true]); ?><?php echo $__env->renderComponent(); ?>
                        </div>
                        <div class="col-md-6">
                            <?php $__env->startComponent('boilerplate::input', ['name' => 'last_name', 'label' => 'boilerplate::users.lastname', 'value' => $user->last_name]); ?><?php echo $__env->renderComponent(); ?>
                        </div>
                        <div class="col-md-6">
                            <?php $__env->startComponent('boilerplate::password', ['name' => 'password', 'label' => ucfirst(__('boilerplate::auth.fields.password'))]); ?><?php echo $__env->renderComponent(); ?>
                        </div>
                        <div class="col-md-6">
                            <?php $__env->startComponent('boilerplate::password', ['name' => 'password_confirmation', 'label' => ucfirst(__('boilerplate::auth.fields.password_confirm')), 'check' => false]); ?><?php echo $__env->renderComponent(); ?>
                        </div>
                    </div>
                <?php echo $__env->renderComponent(); ?>
            </div>
        </div>
    <?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        var avatar = {
            url: "<?php echo e(route('boilerplate.user.avatar.url', null, false)); ?>",
            locales: {
                delete: "<?php echo app('translator')->get('boilerplate::avatar.delete'); ?>",
                gravatar: {
                    success: "<?php echo app('translator')->get('boilerplate::avatar.gravatar.success'); ?>",
                    error: "<?php echo app('translator')->get('boilerplate::avatar.gravatar.error'); ?>",
                },
                upload: {
                    success: "<?php echo app('translator')->get('boilerplate::avatar.upload.success'); ?>",
                    error: "<?php echo app('translator')->get('boilerplate::avatar.upload.error'); ?>",
                }
            }
        }
    </script>
    <script src="<?php echo e(mix('/avatar.min.js', '/assets/vendor/boilerplate')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('boilerplate::layout.index', [
    'title' => __('boilerplate::users.profile.title'),
    'subtitle' => $user->name,
    'breadcrumb' => [
        $user->name => 'boilerplate.user.profile',
    ]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/users/profile.blade.php ENDPATH**/ ?>