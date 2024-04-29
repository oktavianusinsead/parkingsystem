<?php echo e(Form::open(array('url'=>'users','method'=>'post'))); ?>

<div class="modal-body">
    <div class="row">
        <?php if(\Auth::user()->type == 'super admin'): ?>
            <div class="form-group col-md-6">
                <?php echo e(Form::label('role', __('Assign Role'),['class'=>'form-label'])); ?>

                <?php echo Form::select('role', $roles, null,array('class' => 'form-control hidesearch','required'=>'required')); ?>

            </div>
        <?php endif; ?>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('name',__('User Name'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter user name'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('email',__('User Email'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter user email'),'required'=>'required'))); ?>


        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('password',__('User Password'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::password('password',array('class'=>'form-control','placeholder'=>__('Enter user password'),'required'=>'required','minlength'=>"6"))); ?>


        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('phone_number',__('User Phone Number'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('phone_number',null,array('class'=>'form-control','placeholder'=>__('Enter user phone number'),'required'=>'required'))); ?>

        </div>

    </div>
</div>
<div class="modal-footer">
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary ml-10'))); ?>

</div>
<?php echo e(Form::close()); ?>


<?php /**PATH /Users/oktavianusmatthew/easypark/main_file/resources/views/user/create.blade.php ENDPATH**/ ?>