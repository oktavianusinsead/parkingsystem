<?php echo e(Form::open(array('url'=>'rfid-vehicle','method'=>'post'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group  col-md-6">
            <?php echo e(Form::label('name',__('Name'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter name')))); ?>

        </div>
        <div class="form-group  col-md-6">
            <?php echo e(Form::label('phone_number',__('Phone Number'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('phone_number',null,array('class'=>'form-control','placeholder'=>__('Enter phone number')))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('zone',__('Parking Zone'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::select('zone',$zones,null,array('class'=>'form-control hidesearch','id'=>'zone_id'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('vehicle_type',__('Vehicle Type'),array('class'=>'form-label'))); ?>

            <div class="vehicle_type_dive">
                <select class="form-control hidesearch vehicle_type" id="vehicle_type" name="type">
                    <option value=""><?php echo e(__('Select Vehicle Type')); ?></option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('floor',__('Floor'),array('class'=>'form-label'))); ?>

            <div class="floor_dive">
                <select class="form-control hidesearch floor" id="floor_id" name="floor">
                    <option value=""><?php echo e(__('Select Floor')); ?></option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('slot',__('Slot'),array('class'=>'form-label'))); ?>

            <div class="slot_dive">
                <select class="form-control hidesearch slot" id="slot" name="slot">
                    <option value=""><?php echo e(__('Select Slot')); ?></option>
                </select>
            </div>
        </div>
        <div class="form-group  col-md-6">
            <?php echo e(Form::label('vehicle_no',__('Vehicle Number'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('vehicle_no',null,array('class'=>'form-control','placeholder'=>__('Enter vehicle number')))); ?>

        </div>
        <div class="form-group  col-md-6">
            <?php echo e(Form::label('rfid_no',__('RFID Number'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::text('rfid_no',null,array('class'=>'form-control','placeholder'=>__('Enter RFID number')))); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('notes',__('Notes'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::textarea('notes',null,array('class'=>'form-control','placeholder'=>__('Enter notes'),'rows'=>2))); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary btn-rounded'))); ?>

</div>
<?php echo e(Form::close()); ?>

<script>
    $('#zone_id').on('change', function () {
        "use strict";
        var zone_id = $(this).val();
        var url = '<?php echo e(route("zone.type", ":id")); ?>';
        url = url.replace(':id', zone_id);
        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                zone_id: zone_id,
            },
            contentType: false,
            processData: false,
            type: 'GET',
            success: function (data) {
                $('.vehicle_type').empty();
                var vehicle_type = `<select class="form-control hidesearch vehicle_type" id="vehicle_type" name="type"></select>`;
                $('.vehicle_type_div').html(vehicle_type);

                $.each(data, function (key, value) {
                    $('.vehicle_type').append('<option value="' + key + '">' + value + '</option>');
                });

            },

        });
    });

    $('#zone_id').on('change', function () {
        "use strict";
        var zone_id = $(this).val();
        var url = '<?php echo e(route("zone.floor", ":id")); ?>';
        url = url.replace(':id', zone_id);
        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                zone_id: zone_id,
            },
            contentType: false,
            processData: false,
            type: 'GET',
            success: function (data) {
                $('.floor').empty();
                var floor = `<select class="form-control hidesearch floor" id="floor_id" name="floor"> <option value="">Select Floor</option></select>`;
                $('.floor').html(floor);

                $.each(data, function (key, value) {
                    $('.floor').append('<option value="' + key + '">' + value + '</option>');
                });

            },

        });
    });

    $('#floor_id').on('change', function () {
        "use strict";
        var floor_id = $(this).val();
        var zone_id = $('#zone_id').val();
        var type_id = $('#vehicle_type').val();

        var url = '<?php echo e(route("zone.floor.slot", [":floor_id",":zone_id",":type_id"])); ?>';
        url = url.replace(':floor_id', floor_id);
        url = url.replace(':zone_id', zone_id);
        url = url.replace(':type_id', type_id);
        $.ajax({
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                zone_id: zone_id,
                type_id: type_id,
            },
            contentType: false,
            processData: false,
            type: 'GET',
            success: function (data) {
                $('.slot').empty();
                var slot = `<select class="form-control hidesearch slot" id="slot" name="slot"></select>`;
                $('.slot_div').html(slot);

                $.each(data, function (key, value) {
                    $('.slot').append('<option value="' + key + '">' + value + '</option>');
                });

            },

        });
    });
</script>
<?php /**PATH /Users/user/parkingsystem/resources/views/rfid_vehicle/create.blade.php ENDPATH**/ ?>