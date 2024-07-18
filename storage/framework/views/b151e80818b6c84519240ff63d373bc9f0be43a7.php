<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Parking Report Summary')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Report Summary Qty')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form action="<?php echo e(route('report.summary.qty')); ?>" method="GET">
                
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
<td class="xl66" style="height: 32.0pt; width: 65pt;" rowspan="2" width="87" height="42">No</td>
<td class="xl66" style="width: 65pt;" rowspan="2" width="87">Tanggal</td>
<td class="xl65" style="width: 130pt;" colspan="2" width="174">Mandiri</td>
<td class="xl65" style="width: 130pt;" colspan="2" width="174">BCA</td>
<td class="xl65" style="width: 130pt;" colspan="2" width="174">BNI</td>
<td class="xl65" style="width: 130pt;" colspan="2" width="174">BRI</td>
</tr>
<tr style="height: 16.0pt;">
<td style="height: 16.0pt;" height="21">Mobil</td>
<td>Motor</td>
<td>Mobil</td>
<td>Motor</td>
<td>Mobil</td>
<td>Motor</td>
<td>Mobil</td>
<td>Motor</td>
</tr>
</thead>
                        <tbody>
                        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                        <tr role="row" >
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($result->date); ?></td>
<td align="right" style="height: 16.0pt;" height="21"><?php echo e(number_format($result->Mandiri_Mobil)); ?></td>
<td align="right"><?php echo e(number_format($result->Mandiri_Motor)); ?></td>

<td align="right"><?php echo e(number_format($result->BCA_Mobil)); ?></td>
<td align="right"><?php echo e(number_format($result->BCA_Motor)); ?></td>
<td align="right"><?php echo e(number_format($result->BNI_Mobil)); ?></td>
<td align="right"><?php echo e(number_format($result->BNI_Motor)); ?></td>
<td align="right"><?php echo e(number_format($result->BRI_Mobil)); ?></td>
<td align="right"><?php echo e(number_format($result->BRI_Motor)); ?></td>
</tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/parkingsystem/resources/views/reportsummary/reportqty.blade.php ENDPATH**/ ?>