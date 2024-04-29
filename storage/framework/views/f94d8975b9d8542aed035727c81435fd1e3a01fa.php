<?php echo e(Form::open(array('url'=>'floor','method'=>'post'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-12">
            <?php echo e(Form::label('zone',__('Parking Zone'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::select('zone',$zones,null,array('class'=>'form-control hidesearch'))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('title',__('Title'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter title')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('floor_level',__('Level'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::number('floor_level',null,array('class'=>'form-control','placeholder'=>__('Enter floor level')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('notes',__('Notes'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::textarea('notes',null,array('class'=>'form-control','placeholder'=>__('Enter notes'),'rows'=>3))); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary btn-rounded'))); ?>

</div>
<?php echo e(Form::close()); ?>



<?php /**PATH /Users/oktavianusmatthew/easypark/main_file/resources/views/floor/create.blade.php ENDPATH**/ ?>