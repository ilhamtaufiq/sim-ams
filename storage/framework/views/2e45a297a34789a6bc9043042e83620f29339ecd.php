<?php $__env->startSection('content'); ?>
    <?php echo e(Form::open(['route' => ['boilerplate.users.update', $user->id], 'method' => 'put', 'autocomplete' => 'off'])); ?>

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
            <div class="col-md-6">
                <?php $__env->startComponent('boilerplate::card', ['color' => 'orange']); ?>
                    <div class="d-flex flex-column flex-md-row">
                        <div id="avatar-wrapper">
                            <img src="<?php echo e($user->avatar_url); ?>" class="avatar-img" alt="avatar" />
                        </div>
                        <div class="mt-3 mt-md-0 pl-md-3">
                            <span class="info-box-text">
                                <p class="mb-0"><strong class="h3"><?php echo e($user->name); ?></strong></p>
                                <p class=""><?php echo e($user->getRolesList()); ?></p>
                            </span>
                            <span class="info-box-more">
                                <p>
                                    <a href="mailto:<?php echo e($user->email); ?>" class="btn btn-default">
                                        <span class="far fa-fw fa-envelope"></span> <?php echo e($user->email); ?>

                                    </a>
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
                <?php $__env->startComponent('boilerplate::card', ['title' => __('boilerplate::users.informations')]); ?>
                    <div class="row">
                        <?php if(Auth::user()->id !== $user->id): ?>
                        <div class="col-md-6">
                            <?php $__env->startComponent('boilerplate::select2', ['name' => 'active', 'label' => 'boilerplate::users.status', 'minimum-results-for-search' => '-1']); ?>
                                <option value="1" <?php if(old('active', $user->active) == '1'): ?> selected="selected" <?php endif; ?>><?php echo app('translator')->get('boilerplate::users.active'); ?></option>
                                <option value="0" <?php if(old('active', $user->active) == '0'): ?> selected="selected" <?php endif; ?>><?php echo app('translator')->get('boilerplate::users.inactive'); ?></option>
                            <?php echo $__env->renderComponent(); ?>
                        </div>
                        <?php endif; ?>
                        <div class="col-md-6">
                            <?php $__env->startComponent('boilerplate::input', ['name' => 'email', 'label' => 'boilerplate::users.email', 'value' => $user->email]); ?><?php echo $__env->renderComponent(); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?php $__env->startComponent('boilerplate::input', ['name' => 'first_name', 'label' => 'boilerplate::users.firstname', 'value' => $user->first_name]); ?><?php echo $__env->renderComponent(); ?>
                        </div>
                        <div class="col-md-6">
                            <?php $__env->startComponent('boilerplate::input', ['name' => 'last_name', 'label' => 'boilerplate::users.lastname', 'value' => $user->last_name]); ?><?php echo $__env->renderComponent(); ?>
                        </div>
                    </div>
                <?php echo $__env->renderComponent(); ?>
            </div>
            <div class="col-md-6">
                <?php $__env->startComponent('boilerplate::card', ['color' => 'teal', 'title' =>__('boilerplate::users.roles')]); ?>
                    <table class="table table-sm table-hover">
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($role->name !== 'admin' || ($role->name === 'admin' && Auth::user()->hasRole('admin'))): ?>
                            <tr>
                                <td style="width:25px">
                                    <div class="icheck-primary">
                                    <?php if(Auth::user()->id === $user->id && $role->name === 'admin' && Auth::user()->hasRole('admin')): ?>
                                        <?php echo e(Form::checkbox('roles['.$role->id.']', 1, old('roles['.$role->id.']', $user->hasRole($role->name)), ['id' => 'role_'.$role->id, 'class' => 'icheck', 'checked', 'disabled'])); ?>

                                        <?php echo Form::hidden('roles['.$role->id.']', '1', ['id' => 'role_'.$role->id]); ?>

                                    <?php else: ?>
                                        <?php echo e(Form::checkbox('roles['.$role->id.']', 1, old('roles['.$role->id.']', $user->hasRole($role->name)), ['id' => 'role_'.$role->id, 'class' => 'icheck'])); ?>

                                    <?php endif; ?>
                                        <label for="<?php echo e('role_'.$role->id); ?>"></label>
                                    </div>
                                </td>
                                <td>
                                    <div><?php echo e(Form::label('role_'.$role->id, $role->display_name, ['class' => 'mb-0'])); ?></div>
                                    <div class="small"><?php echo e($role->description); ?></div>
                                    <div class="small text-muted pt-1"><?php echo $role->permissions->implode('display_name', '<br>'); ?></div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                <?php echo $__env->renderComponent(); ?>
            </div>
        </div>
    <?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('boilerplate::layout.index', [
    'title' => __('boilerplate::users.title'),
    'subtitle' => __('boilerplate::users.edit.title'),
    'breadcrumb' => [
        __('boilerplate::users.title') => 'boilerplate.users.index',
        __('boilerplate::users.edit.title')
    ]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ilhamtaufiq/www/ams/vendor/sebastienheyd/boilerplate/src/resources/views/users/edit.blade.php ENDPATH**/ ?>