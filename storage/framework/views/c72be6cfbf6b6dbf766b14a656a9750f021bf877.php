<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Parking')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Parking')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('card-action-btn'); ?>
    <?php if(Gate::check('create parking')): ?>
        <a class="btn btn-primary btn-sm ml-20 customModal" href="#" data-size="xl"
           data-url="<?php echo e(route('parking.create')); ?>"
           data-title="<?php echo e(__('Create Parking')); ?>"> <i class="ti-plus mr-5"></i><?php echo e(__('Create Parking')); ?></a>
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
                            <th><?php echo e(__('ID')); ?></th>
                            <th><?php echo e(__('Zone')); ?></th>
                            <th><?php echo e(__('Type')); ?></th>
                            <th><?php echo e(__('Slot')); ?></th>
                            <th><?php echo e(__('Vehicle No')); ?></th>
                            <th><?php echo e(__('Entry')); ?></th>
                            <th><?php echo e(__('Exit')); ?></th>
                            <th><?php echo e(__('Payment Status')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <?php if(Gate::check('edit parking') ||  Gate::check('delete parking') ||  Gate::check('show parking')): ?>
                                <th class="text-right"><?php echo e(__('Action')); ?></th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $parkings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr role="row">
                                <td> <?php echo e(parkingPrefix().$parking->parking_id); ?></td>
                                <td> <?php echo e(!empty($parking->zones)?$parking->zones->zone_name:'-'); ?>   </td>
                                <td> <?php echo e(!empty($parking->types)?$parking->types->title:'-'); ?>   </td>
                                <td> <?php echo e(!empty($parking->slots)?$parking->slots->title:'-'); ?>   </td>
                                <td><?php echo e($parking->vehicle_number); ?></td>
                                <td>
                                    <?php echo e(dateFormat($parking->entry_date)); ?> <br>
                                    <?php echo e(timeFormat($parking->entry_time)); ?>


                                </td>
                                <td>
                                    <?php if(!empty($parking->exit_date)): ?>
                                        <?php echo e(dateFormat($parking->exit_date)); ?> <br>
                                        <?php echo e(timeFormat($parking->exit_time)); ?>

                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($parking->payment_status==0): ?>
                                        <span class="badge badge-danger"><?php echo e(\App\Models\Parking::$paymentStatus[$parking->payment_status]); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-success"><?php echo e(\App\Models\Parking::$paymentStatus[$parking->payment_status]); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($parking->status==0): ?>
                                        <span class="badge badge-danger"><?php echo e(\App\Models\Parking::$status[$parking->status]); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-success"><?php echo e(\App\Models\Parking::$status[$parking->status]); ?></span>
                                    <?php endif; ?>
                                </td>
                                <?php if(Gate::check('edit parking') ||  Gate::check('delete parking') ||  Gate::check('show parking')): ?>
                                    <td class="text-right">
                                        <div class="cart-action">
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['parking.destroy', $parking->id]]); ?>

                                            <?php if(Gate::check('show parking') ): ?>
                                                <a class="text-warning" href="<?php echo e(route('parking.show',\Illuminate\Support\Facades\Crypt::encrypt($parking->id))); ?>" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Details')); ?>"> <i data-feather="eye"></i></a>
                                            <?php endif; ?>
                                            <?php if(Gate::check('edit parking') ): ?>
                                                <a class="text-success customModal" data-bs-toggle="tooltip"
                                                   data-bs-original-title="<?php echo e(__('Edit')); ?>" data-size="lg" href="#"
                                                   data-url="<?php echo e(route('parking.edit',$parking->id)); ?>"
                                                   data-title="<?php echo e(__('Edit Parking')); ?>"> <i data-feather="edit"></i></a>
                                            <?php endif; ?>
                                            <?php if( Gate::check('delete parking')): ?>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/parkingsystem/resources/views/parking/index.blade.php ENDPATH**/ ?>