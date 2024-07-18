<?php echo e(Form::model($contact, array('route' => array('contact.update', $contact->id), 'method' => 'PUT'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('name',__('Name'))); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter contact name')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('email',__('Email'))); ?>

            <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter contact email')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('contact_number',__('Contact Number'))); ?>

            <?php echo e(Form::number('contact_number',null,array('class'=>'form-control','placeholder'=>__('Enter contact number')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('subject',__('Subject'))); ?>

            <?php echo e(Form::text('subject',null,array('class'=>'form-control','placeholder'=>__('Enter contact subject')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('message',__('Message'))); ?>

            <?php echo e(Form::textarea('message',null,array('class'=>'form-control','rows'=>5))); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-primary btn-rounded'))); ?>

</div>
<?php echo e(Form::close()); ?>


<?php /**PATH /Users/user/parkingsystem/resources/views/contact/edit.blade.php ENDPATH**/ ?>