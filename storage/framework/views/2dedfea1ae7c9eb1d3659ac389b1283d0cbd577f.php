<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Parking Report Daily')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Report Daily')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form action="<?php echo e(route('reportdaily.index')); ?>" method="GET">
                
                    <div class="form-group  col-md-6">

            <?php echo e(Form::label('entry_date',__('Start Date'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::date('entry_date',date('Y-m-d'),array('class'=>'form-control'))); ?>

        </div>
        <div class="form-group  col-md-6">
            <?php echo e(Form::label('end_date',__('End Date'),array('class'=>'form-label'))); ?>

            <?php echo e(Form::date('end_date',date('Y-m-d'),array('class'=>'form-control'))); ?>

        </div>
        <div class="modal-footer">
    <button class="btn btn-secondary" type="submit">Process</button>
    
</div>
</form>
                    <table class="display dataTable cell-border datatbl-advance">
                        <thead>
                       
<tr style="height: 16.0pt;">
<td style="height: 16.0pt;" height="21">No</td>
<td>No Kartu</td>
<td>Tanggal Masuk</td>
<td>Tanggal Keluar</td>
<td>Durasi</td>
<td>Cost</td>
<td>Payment By</td>
<td>Vehicle</td>
</tr>
</thead>
                        <tbody>
                        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                        <tr role="row" >
                        <td><?php echo e($index + 1); ?></td>
                       
<td align="right" style="height: 16.0pt;" height="21"><?php echo e($result->tiketno); ?></td>
<td align="right"><?php echo e($result->datetransact); ?></td>

<td align="right"><?php echo e($result->dateout); ?></td>
<td align="right"><?php echo e(format_duration($result->duration)); ?></td>
<td align="right"><?php echo e(number_format($result->cost)); ?></td>
<td align="right"><?php echo e($result->paymentby); ?></td>
<td align="right"><?php echo e($result->vehicleid); ?></td>

</tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/parkingsystem/resources/views/reportdaily/index.blade.php ENDPATH**/ ?>