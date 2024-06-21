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
<td rowspan="2">ID SETTLEMENT</td>
<td rowspan="2">FILE NAME</td>
<td rowspan="2">BUSSINESS DATE</td>
<td rowspan="2">CREATE DATE</td>
<td rowspan="2">CREATED BY</td>
<td rowspan="2">IsSend</td>
<td rowspan="2">SEND DATE</td>
<td rowspan="2">LAST SEND DATE</td>
<td rowspan="2">TOTAL ROW</td>
<td rowspan="2">TOTAL AMOUNT</td>
<td colspan="2">MANDIRI</td>
<td colspan="2">BNI</td>
<td colspan="2">BCA</td>
<td colspan="2">BRI</td>
<td colspan="2">DKI</td>
</tr>
<tr>
<td>ROW</td>
<td>AMOUNT</td>
<td>ROW</td>
<td>AMOUNT</td>
<td>ROW</td>
<td>AMOUNT</td>
<td>ROW</td>
<td>AMOUNT</td>
<td>ROW</td>
<td>AMOUNT</td>
</tr>
                        </thead>
                        <tbody>
                        
                        <tr role="row">
<td >&nbsp;</td>
<td>&nbsp;</td>
<td >&nbsp;</td>
<td>&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
<td >&nbsp;</td>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/parkingsystem/resources/views/report/index.blade.php ENDPATH**/ ?>