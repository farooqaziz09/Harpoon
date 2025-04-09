
<?php $__env->startSection('title', 'Admin Panel'); ?>
<?php $__env->startSection('content'); ?>

    <div class="dash-cont-table admin-dash-cont-table">
        <div class="row">
            <div class="col-12">
                <h1>Dashboard</h1>
            </div>
        </div>

        <div class="automation-cont-wrap admin-dash-box-wrap h-100 d-flex flex-column justify-content-center">
            <div class="row justify-content-center h-100" style="height: 100%;">
                <div class="col-4 my-auto text-center">
                    <h2>Dashboard</h2>
                    <p>Welcome to <?php echo e(env('APP_NAME')); ?> Partner Portal!</p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/admin-panel/index.blade.php ENDPATH**/ ?>