<?php echo e(Form::open(array('url' => 'user_permission'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group ">
            <?php echo e(Form::label('title',__('Title'))); ?>

            <?php echo e(Form::text('title',null,array('class'=>'form-control'))); ?>

        </div>
        <div class="form-group">
            <?php $__currentLoopData = $userRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userRole): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="custom-control">
                    <?php echo e(Form::checkbox('user_roles[]',$userRole->id,null, ['class'=>'custom-control-input'])); ?>

                    <?php echo e(Form::label('user_role'.$userRole->id,$userRole->name,['class'=>'form-control-label '])); ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="col-md-12">
            <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary btn-rounded'))); ?>

        </div>
    </div>
</div>
<?php echo e(Form::close()); ?>



<?php /**PATH /Users/user/parkingsystem/resources/views/user_permission/create.blade.php ENDPATH**/ ?>