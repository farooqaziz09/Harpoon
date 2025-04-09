<!DOCTYPE html>
<html class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(asset('website')); ?>/images/logo.png">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <style>
        body{
            --primary-color: <?php echo e(env('APP_COLOR_1','#354F52')); ?>;
            --primary-color2: <?php echo e(env('APP_COLOR_2','#354F52')); ?>;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/style.css?v=<?php echo e(version()); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"> -->
    <!-- owl css -->
    <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/owl/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/owl/owl.theme.green.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/owl/lightbox.min.css">
    <!-- owl css -->
</head>

<body class="h-100">
    <div class="body_wrap h-100">
        <?php echo $__env->yieldContent('content'); ?>
        <script src="<?php echo e(asset('website')); ?>/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo e(asset('website')); ?>/js/jquery.min.js" type="text/javascript"></script>
    </div>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/layouts/authentication.blade.php ENDPATH**/ ?>