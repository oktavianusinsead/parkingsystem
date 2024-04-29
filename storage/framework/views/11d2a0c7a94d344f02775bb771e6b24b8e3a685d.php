<?php
    if(!empty($parking->exit_date) && !empty($parking->exit_time)){
        $endDate=$parking->exit_date;
        $endTime=$parking->exit_time;
    }else{
         $endDate= date('Y-m-d');
        $endTime =date('H:s:i');
    }
    $parkedDuration=timeCalculation($parking->entry_date,$parking->entry_time,$endDate,$endTime);
    $payment=\App\Models\Parking::paymentCalculation($parking->id,$parkedDuration);

?>
<div class="pt-0 pb-3 modal-body pos-module" id="thermal_print">
    <table class="table pos-module-tbl">
        <tbody>
        <div class="row text-end">
            <div class="text-left mt-10">
                <?php echo e($settings['company_name']); ?><br>
                <?php echo e($settings['company_phone']); ?><br>
                <?php echo e($settings['company_email']); ?><br>
            </div>
        </div>

        <div class="invoice-to mt-2 product-border">
            <b><?php echo e(__('Receipt To')); ?> :</b>
        </div>
        <div>
            <?php echo e($parking->name); ?>

        </div>
        <div>
            <?php echo e($parking->phone_number); ?>

        </div>

        </tbody>
    </table>

    <div class="mt-2">
        <div class="d-flex product-border">
            <div><?php echo e(__('Parking ID')); ?>:</div>
            <div class="text-end ms-auto">   <b> <?php echo e(parkingPrefix().$parking->parking_id); ?></b></div>
        </div>
    </div>
    <div class="mt-2">
        <div class="d-flex product-border">
            <div><?php echo e(__('Receipt Date')); ?>:</div>
            <div class="text-end ms-auto"><?php echo e(dateFormat(date('Y-m-d'))); ?></div>
        </div>
    </div>
    <div class="mt-2">
        <div class="d-flex product-border">
            <div><?php echo e(__('Entry')); ?>:</div>
            <div class="text-end ms-auto"><?php echo e(dateFormat($parking->entry_date)); ?> - <?php echo e(timeFormat($parking->entry_time)); ?></div>
        </div>
    </div>
    <div class="mt-2">
        <div class="d-flex product-border">
            <div><?php echo e(__('Exit')); ?>:</div>
            <div class="text-end ms-auto">
                <?php if(!empty($parking->exit_date)): ?>
                    <?php echo e(dateFormat($parking->exit_date)); ?> <br>
                    <?php echo e(timeFormat($parking->exit_time)); ?>

                <?php else: ?>
                    -
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="mt-2">
        <div class="d-flex product-border">
            <div><?php echo e(__('Parking Zone')); ?>:</div>
            <div class="text-end ms-auto"><?php echo e(!empty($parking->zones)?$parking->zones->zone_name:'-'); ?></div>
        </div>
    </div>
    <div class="mt-2">
        <div class="d-flex product-border">
            <div><?php echo e(__('Vehicle Type')); ?>:</div>
            <div class="text-end ms-auto"><?php echo e(!empty($parking->types)?$parking->types->title:'-'); ?></div>
        </div>
    </div>
    <div class="mt-2">
        <div class="d-flex product-border">
            <div><?php echo e(__('Vehicle Number')); ?>:</div>
            <div class="text-end ms-auto"><?php echo e($parking->vehicle_number); ?></div>
        </div>
    </div>
    <div class="mt-2">
        <div class="d-flex product-border">
            <div><?php echo e(__('Parking Slot')); ?>:</div>
            <div class="text-end ms-auto"><?php echo e(!empty($parking->slots)?$parking->slots->title:'-'); ?></div>
        </div>
    </div>
    <div class="mt-2">
        <div class="d-flex product-border">
            <div><?php echo e(__('Floor')); ?>:</div>
            <div class="text-end ms-auto"><?php echo e(!empty($parking->floors)?$parking->floors->title:'-'); ?> </div>
        </div>
    </div>
    <div class="mt-2">
        <div class="d-flex product-border">
            <div><?php echo e(__('Payment Status')); ?>:</div>
            <div class="text-end ms-auto">
                <?php if($parking->payment_status==0): ?>
                    <span class="badge badge-danger"><?php echo e(\App\Models\Parking::$paymentStatus[$parking->payment_status]); ?></span>
                <?php else: ?>
                    <span class="badge badge-success"><?php echo e(\App\Models\Parking::$paymentStatus[$parking->payment_status]); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="mt-2">
        <div class="d-flex product-border">
            <div><?php echo e(__('Parking Status')); ?>:</div>
            <div class="text-end ms-auto">
                <?php if($parking->status==0): ?>
                    <span class="badge badge-danger"><?php echo e(\App\Models\Parking::$status[$parking->status]); ?></span>
                <?php else: ?>
                    <span class="badge badge-success"><?php echo e(\App\Models\Parking::$status[$parking->status]); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="mt-2">
        <div class="d-flex product-border">
            <div><?php echo e(__('Parked Duration')); ?>:</div>
            <div class="text-end ms-auto"><b><?php echo e($parkedDuration); ?> <?php echo e(__('hour')); ?> </b></div>
        </div>
    </div>
    <div class="mt-2">
        <div class="d-flex product-border">
            <div><?php echo e(__('Total Payment')); ?>:</div>
            <div class="text-end ms-auto"><b><?php echo e(priceFormat($payment)); ?></b> </div>
        </div>
    </div>

</div>

<div class=" mt-2 modal-footer text-end">
    <a href="#"  class="btn btn-primary btn-sm text-right float-right mb-3 print-btn">
        <?php echo e(__('Print')); ?>

    </a>
</div>
<script>
    $(".print-btn").click(function () {
        document.getElementById("thermal_print");
        $('.themebody-wrap').addClass('d-none');
        $('.codex-header').addClass('d-none');
        $('.codex-sidebar').addClass('d-none');
        $('.codex-footer').addClass('d-none');
        $('.customizer-action bg-primary').addClass('d-none');
        $('.modal-footer').addClass('d-none');
        window.print();
        $('.themebody-wrap').removeClass('d-none');
        $('.codex-header').removeClass('d-none');
        $('.codex-sidebar').removeClass('d-none');
        $('.codex-footer').removeClass('d-none');
        $('.customizer-action bg-primary').removeClass('d-none');
        $('.modal-footer').removeClass('d-none');
        $('#customModal').modal('hide')
    });
</script>




<?php /**PATH /Users/oktavianusmatthew/easypark/main_file/resources/views/parking/thermal_print.blade.php ENDPATH**/ ?>