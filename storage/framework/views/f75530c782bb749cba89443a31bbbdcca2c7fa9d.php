<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Gate Type')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Gate Type')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('card-action-btn'); ?>
    <?php if(Gate::check('create vehicle type')): ?>
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="md"
           data-url="<?php echo e(route('gate-type.create')); ?>"
           data-title="<?php echo e(__('Create Vehicle Type')); ?>"> <i class="ti-plus mr-5"></i><?php echo e(__('Create Type')); ?></a>
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
                            <th><?php echo e(__('Gate Type')); ?></th>
                            
                            <th><?php echo e(__('Notes')); ?></th>
                            <th><?php echo e(__('Created Date')); ?></th>
                            <?php if(Gate::check('edit gatetype') ||  Gate::check('delete gatetype')): ?>
                                <th class="text-right"><?php echo e(__('Action')); ?></th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $gatetypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gatetype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr role="row">
                                <td> <?php echo e($gatetype->gatetype); ?>   </td>
                               
                                <td><?php echo e($gatetype->notes); ?> </td>
                                <td><?php echo e(dateFormat($gatetype->created_at)); ?> </td>
                                <?php if(Gate::check('edit gatetype') ||  Gate::check('delete gatetype')): ?>
                                    <td class="text-right">
                                        <div class="cart-action">
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['gate-type.destroy', $gatetype->id]]); ?>


                                            <?php if(Gate::check('edit gatetype') ): ?>
                                                <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="<?php echo e(__('Edit')); ?>" data-size="md" href="#"
                                                   data-url="<?php echo e(route('gate-type.edit',$type->id)); ?>"
                                                   data-title="<?php echo e(__('Edit Gate Type')); ?>"> <i data-feather="edit"></i></a>
                                            <?php endif; ?>
                                            <?php if( Gate::check('delete gatetype')): ?>
                                                <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip"
                                                   data-bs-original-title="<?php echo e(__('Delete')); ?>" href="#"> <i
                                                        data-feather="trash-2"></i></a>
                                            <?php endif; ?>
                                            <?php echo Form::close(); ?>

                                        </div>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/oktavianusmatthew/easypark/main_file/resources/views/gate_type/index.blade.php ENDPATH**/ ?>