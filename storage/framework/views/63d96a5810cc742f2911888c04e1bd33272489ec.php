<?php $__env->startSection('content'); ?>
    <?php echo e(Form::open(['route' => 'boilerplate.users.store', 'autocomplete' => 'off'])); ?>

        <div class="row">
            <div class="col-12 pb-3">
                <a href="<?php echo e(route("boilerplate.users.index")); ?>" class="btn btn-default" data-toggle="tooltip" title="<?php echo app('translator')->get('boilerplate::users.returntolist'); ?>">
                    <span class="far fa-arrow-alt-circle-left text-muted"></span>
                </a>
                <span class="btn-group float-right">
                    <button type="submit" class="btn btn-primary">
                        <?php echo app('translator')->get('boilerplate::users.save'); ?>
                    </button>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <?php $__env->startComponent('boilerplate::card', ['title' => 'boilerplate::users.informations']); ?>
                    <?php $__env->startComponent('boilerplate::select2', ['name' => 'active', 'label' => 'boilerplate::users.status', 'minimum-results-for-search' => '-1']); ?>
                        <option value="1" <?php if(old('active', 1) == '1'): ?> selected="selected" <?php endif; ?>><?php echo app('translator')->get('boilerplate::users.active'); ?></option>
                        <option value="0" <?php if(old('active') == '0'): ?> selected="selected" <?php endif; ?>><?php echo app('translator')->get('boilerplate::users.inactive'); ?></option>
                    <?php echo $__env->renderComponent(); ?>
                    <div class="row">
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <?php $__env->startComponent('boilerplate::input', ['name' => 'first_name', 'label' => 'boilerplate::users.firstname', 'autofocus' => true]); ?><?php echo $__env->renderComponent(); ?>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <?php $__env->startComponent('boilerplate::input', ['name' => 'last_name', 'label' => 'boilerplate::users.lastname']); ?><?php echo $__env->renderComponent(); ?>
                        </div>
                    </div>
                    <?php $__env->startComponent('boilerplate::input', ['name' => 'email', 'label' => 'boilerplate::users.email', 'help' => 'boilerplate::users.create.help']); ?><?php echo $__env->renderComponent(); ?>
                <?php echo $__env->renderComponent(); ?>
            </div>
            <div class="col-lg-6">
                <?php $__env->startComponent('boilerplate::card', ['color' => 'teal', 'title' => 'boilerplate::users.roles']); ?>
                    <table class="table table-sm table-hover">
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width:25px">
                                    <?php $__env->startComponent('boilerplate::icheck', ['name' => 'roles['.$role->id.']', 'id' => 'role_'.$role->id, 'checked' => old('roles.'.$role->id) == 'on']); ?><?php echo $__env->renderComponent(); ?>
                                </td>
                                <td>
                                    <?php echo e(Form::label('role_'.$role->id, $role->display_name, ['class' => 'mb-0 pb-0'])); ?><br />
                                    <span class="small"><?php echo e($role->description); ?></span><br />
                                    <span class="small text-muted"><?php echo $role->permissions->implode('display_name', '<br>'); ?></span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                <?php echo $__env->renderComponent(); ?>
            </div>
        </div>
    <?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('boilerplate::layout.index', [
    'title' => __('boilerplate::users.title'),
    'subtitle' => __('boilerplate::users.create.title'),
    'breadcrumb' => [
        __('boilerplate::users.title') => 'boilerplate.users.index',
        __('boilerplate::users.create.title')
    ]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/users/create.blade.php ENDPATH**/ ?>