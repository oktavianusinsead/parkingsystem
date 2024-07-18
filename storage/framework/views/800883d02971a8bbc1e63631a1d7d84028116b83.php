<?php echo e(Form::model($parkingZone, array('route' => array('parking-zone.update', $parkingZone->id), 'method' => 'PUT'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('zone_name',__('Zone Name'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('zone_name',null,array('class'=>'form-control','placeholder'=>__('Enter parking zone name')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('notes',__('Note'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::textarea('notes',null,array('class'=>'form-control','placeholder'=>__('Enter notes'),'rows'=>3))); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-primary btn-rounded'))); ?>

</div>
<?php echo e(Form::close()); ?>





<?php /**PATH /Users/user/parkingsystem/resources/views/report/edit.blade.php ENDPATH**/ ?>