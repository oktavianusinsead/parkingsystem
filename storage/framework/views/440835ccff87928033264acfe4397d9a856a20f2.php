<?php $__env->startSection('tab-title'); ?>
    <?php echo e(__('Verify')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="codex-authbox">
        <div class="auth-header">
            <div class="auth-icon"><i class="fa fa-unlock-alt"></i></div>
            <h3><?php echo e(__('Verify Your Email Address')); ?></h3>
            <?php if(session('resent')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(__('A fresh verification link has been sent to your email address.')); ?>

                </div>
            <?php endif; ?>
            <p><?php echo e(__('Before proceeding, please check your email for a verification link.')); ?></p>
        </div>
        <div class="auth-footer">
            <h6 class="text-center"> <?php echo e(__('If you did not receive the email')); ?>, <a href="<?php echo e(route('verification.resend')); ?>"><?php echo e(__('click here to request another')); ?></a>.</h6>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/parkingsystem/resources/views/auth/verify-email.blade.php ENDPATH**/ ?>