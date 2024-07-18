<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('RFID Vehicle')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('RFID Vehicle')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('card-action-btn'); ?>
    <?php if(Gate::check('create rfid vehicle')): ?>
       
           <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="lg"
           data-url="<?php echo e(route('rfid-vehicle.create')); ?>"
           data-title="<?php echo e(__('Create RFID Vehicle')); ?>"> <i class="ti-plus mr-5"></i><?php echo e(__('Create RFID Vehicle')); ?></a>
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
                            <th><?php echo e(__('RFID No')); ?></th>
                            <th><?php echo e(__('Vehicle No')); ?></th>
                           
                            <th><?php echo e(__('Vehicle Type')); ?></th>
                            
                            <th><?php echo e(__('Name')); ?></th>
                            <th><?php echo e(__('Company')); ?></th>
                            <th><?php echo e(__('Start Date')); ?></th>
                            <th><?php echo e(__('End Date')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <?php if(Gate::check('edit rfid vehicle') ||  Gate::check('delete rfid vehicle')): ?>
                                <th class="text-right"><?php echo e(__('Action')); ?></th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr role="row">
                                <td><?php echo e($vehicle->rfid_no); ?></td>
                                <td><?php echo e($vehicle->vehicle_no); ?></td>
                                <td> <?php echo e(!empty($vehicle->types)?$vehicle->types->title:'-'); ?>   </td>
                                <td><?php echo e($vehicle->name); ?> </td>
                                <td><?php echo e($vehicle->company_name); ?> </td>
                                <td><?php echo e($vehicle->start_date); ?> </td>
                                <td><?php echo e($vehicle->end_date); ?> </td>
                                <td><?php echo e($vehicle->status); ?> </td>
                                   <td class="text-right">
                                   
                                        <div class="cart-action">
                                           
                                            
                                                <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   
                                                  
                                                  >EDIT</a>
                                            
                                          
                                        </div>
                                    </td>
                               
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/parkingsystem/resources/views/rfid_vehicle/index.blade.php ENDPATH**/ ?>