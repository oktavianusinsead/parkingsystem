<!DOCTYPE html>
<html>
<head>
    <title><?php echo e(env('APP_NAME')); ?></title>
</head>
<body>
<h1><?php echo e($data['subject']); ?></h1>
<p><?php echo e($data['message']); ?></p>
<p><?php echo e(__('Thank you')); ?></p>
</body>
</html>
<?php /**PATH /Users/user/parkingsystem/resources/views/email/document.blade.php ENDPATH**/ ?>