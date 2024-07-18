<?php echo e(Form::open(array('url'=>'gate','method'=>'post'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('gate_no',__('Gate No'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('gate_no',null,array('class'=>'form-control','placeholder'=>__('Enter Gate No')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('gate_name',__('Gate Name'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('gate_name',null,array('class'=>'form-control','placeholder'=>__('Enter Gate Name')))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('zone',__('Parking Zone'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::select('zone',$zones,null,array('class'=>'form-control hidesearch','id'=>'zone_id'))); ?>

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



<?php /**PATH /Users/user/parkingsystem/resources/views/gate/create.blade.php ENDPATH**/ ?>