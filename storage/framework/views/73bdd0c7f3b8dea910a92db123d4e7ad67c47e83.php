<!DOCTYPE html>
<html>
<?php
    $site_name = isset($adminSettings->site_name) && !is_null($adminSettings->site_name) ? $adminSettings->site_name : env('APP_NAME');
    $current_url = url()->full();
    $url_segment1 = Request::segment(1);
    $url_segment2 = Request::segment(2);

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e($site_name); ?></title>
    <style>
        body{
            --primary-color: <?php echo e(env('APP_COLOR_1','#354F52')); ?>;
            --primary-color2: <?php echo e(env('APP_COLOR_2','#354F52')); ?>;
            --Dark-button: <?php echo e(env('APP_COLOR_1','#354F52')); ?>;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('design')); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('design')); ?>/css/style.css" />
    <link rel="stylesheet" href="<?php echo e(asset('design')); ?>/css/admin-style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"> -->
    <!-- owl css -->
    <link rel="stylesheet" href="<?php echo e(asset('design')); ?>/css/owl/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('design')); ?>/css/owl/owl.theme.default.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('design')); ?>/css/owl/owl.theme.green.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('design')); ?>/css/owl/lightbox.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php if(isset($admSettings->favicon) && $admSettings->favicon != null): ?>
        <?php $favicon = asset($admSettings->favicon) ?>
    <?php else: ?>
        <?php $favicon = asset('design') . '/images/logo.png' ?>
    <?php endif; ?>
    <link rel="icon" href="<?php echo e($favicon); ?>">

    <!-- owl css -->
</head>

<body>
    <div class="body_wrap body_wrap_dashboard body-wrap-admin-dashboard h-100">
        <div class="dash-wrap row h-100">
            <div class="sidebar-wrap h-100">
                <div class="cont-sidebar admin-sidebar">
                    <a href="<?php echo e(url('/admin-panel')); ?>" class="logo-wrap">
                        <?php if(isset($admSettings->logo) && $admSettings->logo != null): ?>
                            <?php $src = asset($admSettings->logo) ?>
                        <?php else: ?>
                            <?php $src = asset('design') . '/images/upload-logo.svg' ?>
                        <?php endif; ?>
                        <img src="<?php echo e($src); ?>" alt="" />
                    </a>
                    <div class="men-wrap">
                        <ul>
                            <li>
                                <a class="<?= $url_segment1 == 'admin-panel' && $url_segment2 == '' ? 'active' : '' ?>"
                                    href="<?php echo e(route('admin-panel')); ?>"><img
                                        src="<?php echo e(asset('design')); ?>/images/dashboard-icon.svg" alt="" />
                                    <span>Dashboard</span></a>
                            </li>

                            <li>
                                <a class="<?= str_contains($current_url, 'admin-panel/settings') ? 'active' : '' ?>"
                                    href="<?php echo e(route('admin-panel.settings')); ?>"><img
                                        src="<?php echo e(asset('design')); ?>/images/setting-icon.svg" alt="" />
                                    <span>Settings</span></a>
                            </li>


                            <li>
                                <a class="<?= str_contains($current_url, 'admin-panel/email-templates') ? 'active' : '' ?>"
                                    href="<?php echo e(route('email-templates')); ?>"><img
                                        src="<?php echo e(asset('design')); ?>/images/email-template-icon.svg" alt="" />
                                    <span>Email Templates</span></a>
                            </li>
                            <li>
                                <a class="<?= str_contains($current_url, 'admin-panel/journey-templates') ? 'active' : '' ?>"
                                    href="<?php echo e(route('journey-templates')); ?>"><img
                                        src="<?php echo e(asset('design')); ?>/images/journey-template-icon.svg" alt="" />
                                    <span>Journey Templates</span></a>
                            </li>
                            <li>
                                <a class="<?= str_contains($current_url, 'admin-panel/landing-templates') ? 'active' : '' ?>"
                                    href="<?php echo e(route('landing-templates')); ?>"><img
                                        src="<?php echo e(asset('design')); ?>/images/document-template-icon.svg" alt="" />
                                    <span>Landing Page Templates</span></a>
                            </li>

                            <li>
                                <a class="<?= str_contains($current_url, 'admin-panel/impersonate-users') ? 'active' : '' ?>"
                                    href="<?php echo e(route('impersonate-users')); ?>"><img
                                        src="<?php echo e(asset('design')); ?>/images/impresonate-user-icon.svg" alt="" />
                                    <span> Impersonate Users</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dashboard-cont-wrap admin-cont-wrap">
                <header>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-between">
                            <div class="admin-header-head">
                                <a href="#">Partner Portal</a>
                            </div>
                            <ul>
                                <li class="dropdown">
                                    <a class="profile-btn dropdown-toggle" id="dropdownProfile"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo e(auth()->user()->email); ?>

                                        <i class="fa fa-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownProfile">
                                        <li><a href="<?php echo e(route('account.index')); ?>" class="dropdown-item">Account</a>
                                        </li>
                                        <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                                onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                                Logout
                                            </a>
                                            <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST"
                                                style="display: none;">
                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <div class="modal new-tags-form-modal" id="tagsModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="container">
                                <div class="row">
                                    <h4 class="modal-title text-start">
                                        <img src="<?php echo e(asset('design')); ?>/images/plus-new-tag-pop-up-icon.svg"
                                            alt="" />Add New Tag
                                    </h4>
                                    <div class="col-4">
                                        <input type="text" placeholder="Add Tags" />
                                    </div>
                                    <div class="col-8 d-flex justify-content-end">
                                        <div class="btn-wrap update-cancel-form-btns d-flex">
                                            <a class="btn btn-prim btn-prim-head update-tags-btn"
                                                href="">Update</a>
                                            <a class="btn btn-prim btn-prim-trans update-tags-trans"
                                                href="">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="tags-added-wrap">
                                <ul>
                                    <li>
                                        grow_email_list
                                        <span class="tag-remove" onclick="removeTag(this)"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        run_promotion
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        reduce_cart_abandonment
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        grow_email_list
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        run_promotion
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        reduce_cart_abandonment
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        run_promotion
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        grow_email_list
                                        <span class="tag-remove" onclick="removeTag(this)"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        run_promotion
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        reduce_cart_abandonment
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        grow_email_list
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        run_promotion
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        reduce_cart_abandonment
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        run_promotion
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        grow_email_list
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        run_promotion
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        reduce_cart_abandonment
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                    <li>
                                        run_promotion
                                        <span class="tag-remove"><img
                                                src="<?php echo e(asset('design')); ?>/images/delet-bin-red.svg"
                                                alt="" /></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo e(asset('website')); ?>/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo e(asset('website')); ?>/js/jquery.min.js" type="text/javascript"></script>

        <link href="<?php echo e(asset('website/toastr/toastr.min.css')); ?>" rel="stylesheet">
        <script src="<?php echo e(asset('website/toastr/toastr.min.js')); ?>" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <?php echo $__env->yieldContent('scripts'); ?>

        <script>
            $(".submenu li.submenu-parent").click(function() {
                $(".submenu-inner").toggleClass("show");
            });
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
    </div>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/layouts/admin-head.blade.php ENDPATH**/ ?>