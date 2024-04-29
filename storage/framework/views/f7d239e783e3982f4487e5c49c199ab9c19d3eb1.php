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
                            <th><?php echo e(__('Parking Zone')); ?></th>
                            <th><?php echo e(__('Vehicle Type')); ?></th>
                            <th><?php echo e(__('Parking Floor')); ?></th>
                            <th><?php echo e(__('Slot')); ?></th>
                            <th><?php echo e(__('Name')); ?></th>
                            <th><?php echo e(__('Phone Number')); ?></th>
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
                                <td> <?php echo e(!empty($vehicle->zones)?$vehicle->zones->zone_name:'-'); ?>   </td>
                                <td> <?php echo e(!empty($vehicle->types)?$vehicle->types->title:'-'); ?>   </td>
                                <td> <?php echo e(!empty($vehicle->floors)?$vehicle->floors->title:'-'); ?>   </td>
                                <td> <?php echo e(!empty($vehicle->slots)?$vehicle->slots->title:'-'); ?>   </td>
                                <td><?php echo e($vehicle->name); ?> </td>
                                <td><?php echo e($vehicle->phone_number); ?> </td>
                                <?php if(Gate::check('edit rfid vehicle') ||  Gate::check('delete rfid vehicle')): ?>
                                    <td class="text-right">
                                        <div class="cart-action">
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['rfid-vehicle.destroy', $vehicle->id]]); ?>


                                            <?php if(Gate::check('edit rfid vehicle') ): ?>
                                                <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="<?php echo e(__('Edit')); ?>" data-size="lg" href="#"
                                                   data-url="<?php echo e(route('rfid-vehicle.edit',$vehicle->id)); ?>"
                                                   data-title="<?php echo e(__('Edit RFID Vehicle')); ?>"> <i data-feather="edit"></i></a>
                                            <?php endif; ?>
                                            <?php if( Gate::check('delete rfid vehicle')): ?>
                                                <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip"
                                                   data-bs-original-title="<?php echo e(__('Detete')); ?>" href="#"> <i
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/oktavianusmatthew/easypark/main_file/resources/views/rfid_vehicle/index.blade.php ENDPATH**/ ?>