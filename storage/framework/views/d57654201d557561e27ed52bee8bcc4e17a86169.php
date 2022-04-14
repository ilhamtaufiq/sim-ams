<?php $__env->startSection('content'); ?>
    <?php echo e(Form::open(['route' => ['boilerplate.roles.update', $role->id], 'method' => 'put', 'autocomplete' => 'off'])); ?>

        <div class="row">
            <div class="col-12 mb-3">
                <a href="<?php echo e(route("boilerplate.roles.index")); ?>" class="btn btn-default" title="<?php echo app('translator')->get('boilerplate::role.list.title'); ?>">
                    <span class="far fa-arrow-alt-circle-left text-muted"></span>
                </a>
                <?php if($role->name !== 'admin'): ?>
                <span class="btn-group float-right">
                    <button type="submit" class="btn btn-primary">
                        <?php echo app('translator')->get('boilerplate::role.savebutton'); ?>
                    </button>
                </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <?php $__env->startComponent('boilerplate::card', ['title' => __('boilerplate::role.parameters')]); ?>
                    <?php echo $errors->first('name','<p class="text-danger"><strong>:message</strong></p>'); ?>

                    <?php if($role->name === 'admin' || $role->name === 'backend_user'): ?>
                        <p><strong><?php echo app('translator')->get('boilerplate::role.label'); ?></strong><br><?php echo e($role->display_name); ?></p>
                        <p><strong><?php echo app('translator')->get('boilerplate::role.description'); ?></strong><br><?php echo e($role->description); ?></p>
                        <?php $__env->startComponent('boilerplate::input', ['type' => 'hidden', 'name' => 'display_name', 'value' => $role->getAttributes()['display_name']]); ?><?php echo $__env->renderComponent(); ?>
                        <?php $__env->startComponent('boilerplate::input', ['type' => 'hidden', 'name' => 'description', 'value' => $role->getAttributes()['description'] ]); ?><?php echo $__env->renderComponent(); ?>
                    <?php else: ?>
                        <?php $__env->startComponent('boilerplate::input', ['name' => 'display_name', 'label' => 'boilerplate::role.label', 'value' => $role->display_name]); ?><?php echo $__env->renderComponent(); ?>
                        <?php $__env->startComponent('boilerplate::input', ['name' => 'description', 'label' => 'boilerplate::role.description', 'value' => $role->description]); ?><?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>
                <?php echo $__env->renderComponent(); ?>
            </div>
            <?php if(count($permissions_categories) > 0): ?>
            <div class="col-md-7">
                <?php $__env->startComponent('boilerplate::card', ['color' => 'teal', 'title' => __('boilerplate::role.permissions')]); ?>
                    <?php $__currentLoopData = $permissions_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="permission_category">
                            <div class="h6">
                                <?php echo e($category->name); ?>

                            </div>
                            <table class="table table-hover table-sm">
                                <tbody>
                                <?php $__currentLoopData = $category->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="width:25px;">
                                            <div class="icheck-primary">
                                            <?php if($role->id == 1): ?>
                                                <input type="checkbox" checked disabled class="icheck"/>
                                            <?php else: ?>
                                                <?php echo e(Form::checkbox('permission['.$permission->id.']', 1, old('permission.'.$permission->id, $role->permissions()->where(['id' => $permission->id])->count()), ['id' => 'permission_'.$permission->id, 'class' => 'icheck'])); ?>

                                            <?php endif; ?>
                                                <label for="<?php echo e('permission_'.$permission->id); ?>"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo e(Form::label('permission_'.$permission->id, $permission->display_name, ['class' => 'mb-0'])); ?><br />
                                            <small class="text-muted"><?php echo e($permission->description); ?></small>
                                        </td>
                                        <td class="text-right visible-on-hover">
                                            <span class="badge badge-secondary badge-pill"><?php echo e($permission->name); ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->renderComponent(); ?>
            </div>
            <?php endif; ?>
    <?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('boilerplate::layout.index', [
    'title' => __('boilerplate::role.title'),
    'subtitle' => __('boilerplate::role.edit.title'),
    'breadcrumb' => [
        __('boilerplate::role.title') => 'boilerplate.roles.index',
        __('boilerplate::role.edit.title')
    ]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/roles/edit.blade.php ENDPATH**/ ?>