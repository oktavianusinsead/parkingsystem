<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Logged History')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>"><h1><?php echo e(__('Dashboard')); ?></h1></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('Logged History')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="display dataTable cell-border datatbl-advance">
                        <thead>
                        <tr>
                            <th><?php echo e(__('User')); ?></th>
                            <th><?php echo e(__('Email')); ?></th>
                            <th><?php echo e(__('Role')); ?></th>
                            <th><?php echo e(__('Login Date')); ?></th>
                            <th><?php echo e(__('System IP')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $historydetail = json_decode($history->details);
                            ?>
                            <tr>
                                <td><?php echo e(!empty($history->user)?$history->user->name:'-'); ?></td>
                                <td><?php echo e(!empty($history->user)?$history->user->email:'-'); ?></td>
                                <td> <?php echo e(ucfirst($history->type)); ?> </td>
                                <td><?php echo e(!empty($history->date) ? dateFormat($history->date) : '-'); ?></td>
                                <td><?php echo e($history->ip); ?></td>
                                <td class="text-right">
                                    <div class="cart-action">
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['logged.history.destroy', $history->id]]); ?>

                                        <a class=" text-danger confirm_dialog" data-bs-toggle="tooltip"
                                           data-bs-original-title="<?php echo e(__('Detete')); ?>" href="#"> <i
                                                data-feather="trash-2"></i></a>
                                        <?php echo Form::close(); ?>

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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/parkingsystem/resources/views/logged_history/index.blade.php ENDPATH**/ ?>