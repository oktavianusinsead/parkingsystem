<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Parking Zone')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Report Settlement')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('card-action-btn'); ?>
    <?php if(Gate::check('create parking zone')): ?>
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="md"
           data-url="<?php echo e(route('parking-zone.create')); ?>"
           data-title="<?php echo e(__('Create Zone')); ?>"> <i class="ti-plus mr-5"></i><?php echo e(__('Create Zone')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="display dataTable cell-border datatbl-advance">
                        <thead>
                        <tr>
<td width="85">TID BANK</td>
<td width="97">MID BANK</td>
<td width="105">No KARTU</td>
<td width="87">AMOUNT</td>
<td width="128">Last Balance</td>
<td width="136">Tanggal Transaksi</td>
<td width="148">Settlement Report</td>
<td width="93">IsSettled</td>
<td width="172">Refrence ID Settlement</td>
<td width="152">FileName Settlement</td>
</tr>
                        </thead>
                        <tbody>
                        
                        <tr role="row">
                       
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/parkingsystem/resources/views/report/report.blade.php ENDPATH**/ ?>