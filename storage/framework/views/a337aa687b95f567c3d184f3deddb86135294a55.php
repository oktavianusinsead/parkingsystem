<?php $__env->startSection('page-title'); ?>
    <?php echo e(parkingPrefix().$parking->parking_id); ?><?php echo e(__('Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('parking.index')); ?>"><?php echo e(__('Parking')); ?></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(parkingPrefix().$parking->parking_id); ?> <?php echo e(__('Details')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '.print', function () {
            var printContents = document.getElementById('invoice-print').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;

        });
    </script>
<?php $__env->stopPush(); ?>
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
<?php $__env->startSection('card-action-btn'); ?>
    <a class="btn btn-warning customModal me-2" href="javascript:void(0);" data-url="<?php echo e(route('parking.thermal.print',$parking->id)); ?>"  data-title=" <?php echo e($settings['company_name']); ?>" data-ajax-popup="true" data-size="sm"><i class="fa fa-print"></i> <?php echo e(__('Thermal Receipt')); ?></a>
    <a class="btn btn-secondary print" href="javascript:void(0);"><i class="fa fa-print"></i> <?php echo e(__('Print Receipt')); ?></a>
    <?php if(Gate::check('show parking') && $parking->status==0): ?>
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="md"
           data-url="<?php echo e(route('parking.exit.vehicle',[$parking->id,$payment])); ?>"
           data-title="<?php echo e(__('Exit Vehicle')); ?>"><i class="fa fa-automobile"></i> <?php echo e(__('Exit Vehicle')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row" id="invoice-print">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body cdx-invoice">
                    <div id="cdx-invoice">
                        <div class="head-invoice">
                            <div class="codex-brand">
                                <a class="codexbrand-logo" href="Javascript:void(0);">
                                    <img class="img-fluid" src="<?php echo e(asset(Storage::url('upload/logo/')).'/'.(isset($settings['company_logo']) && !empty($settings['company_logo'])?$settings['company_logo']:'logo.png')); ?>" alt="invoice-logo">
                                </a>
                                <a class="codexdark-logo" href="Javascript:void(0);">
                                    <img class="img-fluid" src="<?php echo e(asset(Storage::url('upload/logo/')).'/'.(isset($settings['company_logo']) && !empty($settings['company_logo'])?$settings['company_logo']:'logo.png')); ?>" alt="invoice-logo">
                                </a>
                            </div>
                            <ul class="contact-list">
                                <li>
                                    <div class="icon-wrap"><i class="fa fa-user"></i></div>
                                    <?php echo e($settings['company_name']); ?>

                                </li>
                                <li>
                                    <div class="icon-wrap"><i class="fa fa-phone"></i></div>
                                    <?php echo e($settings['company_email']); ?>

                                </li>
                                <li>
                                    <div class="icon-wrap"><i class="fa fa-envelope"></i></div>
                                    <?php echo e($settings['company_phone']); ?>

                                </li>

                            </ul>
                        </div>
                        <div class="invoice-user">
                            <div class="left-user">
                                <h5><?php echo e(__('Receipt To')); ?>:</h5>
                                <ul class="detail-list">
                                    <li>
                                        <div class="icon-wrap"><i class="fa fa-user"></i></div>
                                        <?php echo e($parking->name); ?>

                                    </li>
                                    <li>
                                        <div class="icon-wrap"><i class="fa fa-phone"></i></div>
                                        <?php echo e($parking->phone_number); ?>

                                    </li>

                                </ul>
                            </div>
                            <div class="right-user">
                                <ul class="detail-list">
                                    <li><?php echo e(__('Receipt Date')); ?>: <span> <?php echo e(dateFormat(date('Y-m-d'))); ?></span></li>
                                    <li><?php echo e(__('Parking ID')); ?>: <span><?php echo e(parkingPrefix().$parking->parking_id); ?></span></li>
                                    <li><?php echo e(__('Entry')); ?>: <span><?php echo e(dateFormat($parking->entry_date)); ?> - <?php echo e(timeFormat($parking->entry_time)); ?></span></li>
                                    <li><?php echo e(__('Exit')); ?>:
                                        <span>
                                         <?php if(!empty($parking->exit_date)): ?>
                                                <?php echo e(dateFormat($parking->exit_date)); ?> <br>
                                                <?php echo e(timeFormat($parking->exit_time)); ?>

                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="body-invoice">
                            <div class="table-responsive1">
                                <table class="table ml-1">
                                    <thead>
                                    <tr>
                                        <th><?php echo e(__('Parking Zone')); ?></th>
                                        <th><?php echo e(!empty($parking->zones)?$parking->zones->zone_name:'-'); ?> </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?php echo e(__('Vehicle Type')); ?></td>
                                        <td><?php echo e(!empty($parking->types)?$parking->types->title:'-'); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo e(__('Vehicle Number')); ?></td>
                                        <td><?php echo e($parking->vehicle_number); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo e(__('Parking Slot')); ?></td>
                                        <td><?php echo e(!empty($parking->slots)?$parking->slots->title:'-'); ?> </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo e(__('Floor')); ?></td>
                                        <td><?php echo e(!empty($parking->floors)?$parking->floors->title:'-'); ?> </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo e(__('Payment Status')); ?></td>
                                        <td>
                                            <?php if($parking->payment_status==0): ?>
                                                <span class="badge badge-danger"><?php echo e(\App\Models\Parking::$paymentStatus[$parking->payment_status]); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-success"><?php echo e(\App\Models\Parking::$paymentStatus[$parking->payment_status]); ?></span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo e(__('Parking Status')); ?></td>
                                        <td>
                                            <?php if($parking->status==0): ?>
                                                <span class="badge badge-danger"><?php echo e(\App\Models\Parking::$status[$parking->status]); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-success"><?php echo e(\App\Models\Parking::$status[$parking->status]); ?></span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="footer-invoice">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td><?php echo e(__('Parked Duration')); ?></td>
                                    <td><?php echo e($parkedDuration); ?> <?php echo e(__('hour')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Total Payment')); ?></td>
                                    <td><?php echo e(priceFormat($payment)); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/parkingsystem/resources/views/parking/show.blade.php ENDPATH**/ ?>