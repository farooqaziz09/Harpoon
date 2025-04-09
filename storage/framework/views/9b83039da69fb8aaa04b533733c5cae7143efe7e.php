<?php
  $url_segment = Request::segment(2);
  $last_segment = Request::segment(count(request()->segments()));
  $current_url = url()->full();
  $edit_query = '';
  if (Request::get('edit')) {
      $edit_query = '?edit=' . Request::get('edit');
  }
  $site_name = isset($admSettings->site_name) && !is_null($admSettings->site_name) ? $admSettings->site_name : env('APP_NAME');
  $bclass = '';
  if (strpos($current_url, 'broadcast') !== false) {
      $bclass = 'bClass';
  } else {
      $bclass = '';
  }
  if (!empty(Request::get('auto')) || strpos($current_url, '/template/view-edit/') !== false) {
      $aclass = 'aClass';
  } else {
      $aclass = '';
  }

?>
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="h-100">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <?php if(isset($admSettings->favicon) && $admSettings->favicon != null): ?>
    <?php $favicon = asset($admSettings->favicon) ?>
  <?php else: ?>
    <?php $favicon = asset('design') . '/images/logo.png' ?>
  <?php endif; ?>
  <link rel="icon" href="<?php echo e($favicon); ?>">
  <title> <?php echo e($site_name); ?> <?php echo $__env->yieldContent('title'); ?></title>
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/bootstrap.min.css">
  <style type="text/css">
    .body_wrap {
  padding: 0 10px;
  padding: 0 20px;
  /* overflow-x: hidden;
background-image: url(../images/bg.jpg);
background-size: cover; */
  /* min-height: 100vh; */
  --bs-body-primary-color: #2F3E46;
  --primary-color: <?php echo e(env('APP_COLOR_1','#354F52')); ?>;
  --bs-body-text-primary-color: <?php echo e(env('APP_COLOR_1','#354F52')); ?>;
  --primary-color2: <?php echo e(env('APP_COLOR_2','#354F52')); ?>;
  --primary-color3: <?php echo e(env('APP_COLOR_2','#354F52')); ?>;
  
  --bs-body-text-primary-color-10: rgb(90 91 89 / 10%);
  --bs-body-warning-color: #F4A376;
  --bs-body-warning-color-10: rgba(244, 163, 118, 0.1);
  --bs-body-success-color: #6DAE9B;
  --bs-body-secondary-color: #F8F7F3;
  --bs-body-background-color: rgba(248, 247, 243, 0.5);
  --bs-body-box-shadow-color: 0px 5px 15px rgba(0, 0, 0, 0.05);
  --bs-body-border-radius: 5px;
}
  </style>
  <link rel="stylesheet" href="<?php echo e(asset('design')); ?>/css/style.css?v=<?= version() ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"> -->
  <!-- owl css -->
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/owl/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/owl/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/owl/owl.theme.green.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/owl/lightbox.min.css">
  <link href="<?php echo e(asset('website/toastr/toastr.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('website/toastr/toastr.min.css')); ?>" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

  <style>
    .toast-success {
      background-color: #2D464B;
    }
  </style>
</head>

<body class="h-100 <?php echo e($aclass); ?>" data-root="<?php echo e(asset('/')); ?>">
  <div class="body_wrap body_wrap_dashboard h-100">
    <div class="dash-wrap row h-100">
      <?php if(
          (Request::segment('2') != 'campaign-template' &&
              Request::segment('3') != 'information-design' &&
              strpos($current_url, 'sites/campaign/store') === false &&
              strpos($current_url, 'campaign/integrate') === false &&
              strpos($current_url, 'template/design') === false &&
              strpos($current_url, 'broadcast') === false &&
              strpos($current_url, 'template/view-edit') === false) ||
              Request::segment('2') == 'broadcasts'): ?>
        <div class="sidebar-wrap h-100">
          <div class="cont-sidebar">
            <a href="<?php echo e(url('/')); ?>" class="logo-wrap">

              <?php if(isset($admSettings->logo) && $admSettings->logo != null): ?>
                <?php $src = asset($admSettings->logo) ?>
              <?php else: ?>
                <?php $src = asset('design') . '/images/logo-text.png' ?>
              <?php endif; ?>
              <img src="<?php echo e($src); ?>" alt="" />
            </a>
            <div class="men-wrap">
              <ul class="men-flow">
                <li class="<?php echo e($url_segment == 'home' ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('user.home')); ?>">
                    <img src="<?php echo e(asset('website')); ?>/images/home-icon.svg" alt="">
                    <span>Home</span>
                  </a>
                </li>
                <?php if($admSettings->campaigns == '1'): ?>
                  <ul class="submenu">
                    <li
                      class="<?php echo e($url_segment == 'campaigns' || $url_segment == 'broadcasts' || $url_segment == 'automations' ? 'active submenu-parent' : 'submenu-parent'); ?>">
                      <a><img src="<?php echo e(asset('website')); ?>/images/speaker-icon.svg" alt="">
                        <span>Campaigns</span>
                      </a>
                    </li>
                    <ul class="submenu-inner <?php if(strpos($current_url, 'sites/campaigns') !== false ||
                            strpos($current_url, 'sites/broadcasts') !== false ||
                            strpos($current_url, 'sites/automations') !== false): ?> show <?php endif; ?>">
                      <li>
                        <a href="#"><img src="<?php echo e(asset('website')); ?>/images/all-icon.svg" alt="">
                          <span>All</span></a>
                      </li>
                      <li class="d-none"><a href="#"><img src="<?php echo e(asset('website')); ?>/images/form-icon.svg"
                            alt="">
                          <span>Forms & Popups</span></a></li>
                      <?php if($admSettings->campaigns == '1'): ?>
                        <li class="<?php echo e($last_segment == 'campaigns' ? 'active' : ''); ?>"><a
                            href="<?php echo e(url('sites/campaigns')); ?>"><img
                              src="<?php echo e(asset('website')); ?>/images/landing-icon.svg" alt="">
                            <span>Landing pages</span></a></li>
                      <?php endif; ?>
                      <?php if($admSettings->broadcast == '1'): ?>
                        <li class="<?php echo e($last_segment == 'broadcasts' ? 'active' : ''); ?>"><a
                            href="<?php echo e(url('sites/broadcasts')); ?>"><img
                              src="<?php echo e(asset('website')); ?>/images/broad-icon.svg" alt="">
                            <span>Broadcasts</span></a></li>
                      <?php endif; ?>
                      <?php if($admSettings->automation == '1'): ?>
                        <li class="<?php echo e($last_segment == 'automations' ? 'active' : ''); ?>"><a
                            href="<?php echo e(route('automation.index')); ?>"><img
                              src="<?php echo e(asset('website')); ?>/images/automations-icon.svg" alt="">
                            <span>Automations</span></a></li>
                      <?php endif; ?>
                    </ul>
                  </ul>
                <?php endif; ?>
                <?php if($admSettings->subscribers == '1'): ?>
                  <li class="<?php echo e($url_segment == 'contacts' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('contacts.index')); ?>"><img src="<?php echo e(asset('website')); ?>/images/contacts-icon.svg"
                        alt="">
                      <span>Contacts</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if($admSettings->analytics == '1'): ?>
                  <li class="list-last-item <?php echo e($url_segment == 'analytics' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('analytics.index')); ?>"><img
                        src="<?php echo e(asset('website')); ?>/images/analytics-icon.svg" alt="">
                      <span>Analytics</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if($admSettings->site_settings == '1'): ?>
                  <li class="<?php echo e($url_segment == 'settings' ? 'active' : ''); ?> site-settings-list">
                    <a href="<?php echo e(route('settings.index')); ?>"><img src="<?php echo e(asset('website')); ?>/images/settings-icon.svg"
                        alt="">
                      <span>Site Settings</span>
                    </a>
                  </li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div
        class="dashboard-cont-wrap 
                                    <?php if(Request::segment('2') == 'campaign-template' ||
                                            (Request::segment('2') == 'template' ||
                                                ((Request::segment('3') == 'design' ||
                                                    Request::segment('3') == 'information-design' ||
                                                    Request::segment('3') == 'store' ||
                                                    Request::segment('3') == 'integrate' ||
                                                    strpos($current_url, 'broadcast') !== false) &&
                                                    Request::segment('2') != 'broadcasts' &&
                                                    strpos($current_url, 'template/view-edit') === false))): ?> no-sidebar <?php echo e($bclass . ' ' . $aclass); ?> <?php endif; ?>">
        <header class="<?php echo e(strpos($current_url, 'sites/template/view-edit/') !== false ? 'p-0 position-static' : ''); ?>">
          <?php if(strpos($current_url, 'template/view-edit') === false): ?>

            <div class="row justify-content-between">
              <?php if(Request::segment(1) == 'sites' &&
                      Request::segment(2) != 'broadcasts' &&
                      (Request::segment(2) == 'campaign-template' ||
                          Request::segment(2) == 'template' ||
                          strpos($current_url, 'sites/campaign/store') !== false ||
                          strpos($current_url, 'sites/broadcast/store') !== false ||
                          strpos($current_url, 'campaign/integrate') !== false ||
                          strpos($current_url, 'broadcast') !== false)): ?>

                <div class="col-lg-9 my-auto text-start">
                  <div class="row">
                    <div class="col-2 logo-no-sidebar">
                      <a href="<?php echo e(url('/')); ?>" class="logo-wrap">
                        <?php if(isset($admSettings->logo) && $admSettings->logo != null): ?>
                          <?php $src = asset($admSettings->logo) ?>
                        <?php else: ?>
                          <?php $src = asset('design') . '/images/logo-text.png' ?>
                        <?php endif; ?>
                        <img src="<?php echo e($src); ?>" alt="" />
                      </a>
                    </div>
                    <div class="col">
                      <div class="head-steps-wrap">
                        <div class="row">
                          <div class="col-12 text-center">
                            <ul>


                              <?php if(strpos($current_url, 'broadcast') !== false): ?>
                                <li class="active"><a class="px-3"
                                    href="<?php echo e(url('sites/broadcast-template')); ?>">Template</a>
                                  <img src="<?php echo e(asset('website')); ?>/images/next-step.svg" alt="next">
                                </li>
                                <li><a class="px-3"
                                    href="<?php echo e(Session::get('template') ? url('sites/broadcast-template/design/' . Session::get('template')['id'] . Session::get('edit_query')) : ''); ?>">Design</a>
                                  <img src="<?php echo e(asset('website')); ?>/images/next-step.svg" alt="next">
                                </li>
                                <li><a class="px-3" href="javascript:;"
                                    data-href="<?php echo e(url('sites/broadcast/subject')); ?>"
                                    onclick="saveFirst.call(this, 'subject')">Subject</a>
                                  <img src="<?php echo e(asset('website')); ?>/images/next-step.svg" alt="next">
                                </li>
                                <li class=""><a class="px-3" href="javascript:;"
                                    data-href="<?php echo e(url('sites/broadcast/store')); ?>"
                                    onclick="saveFirst.call(this, 'audience')">Audience</a>
                                  <img src="<?php echo e(asset('website')); ?>/images/next-step.svg" alt="next">
                                </li>
                                <li><a class="px-3" href="javascript:;"
                                    data-href="<?php echo e(url('sites/broadcast/schedule')); ?>"
                                    onclick="saveFirst.call(this, 'schedule')">Schedule</a>
                                  <img src="<?php echo e(asset('website')); ?>/images/next-step.svg" alt="next">
                                </li>
                                </li>
                                <li><a class="px-3" href="javascript:;"
                                    data-href="<?php echo e(url('sites/broadcast/review')); ?>"
                                    onclick="saveFirst.call(this, 'review')">Review</a>
                                </li>
                              <?php endif; ?>
                              <?php if(strpos($current_url, 'broadcast') === false): ?>
                                <li class="active"><a class="px-5"
                                    href="<?php echo e(url('sites/campaign-template')); ?>">Template</a>
                                  <img src="<?php echo e(asset('website')); ?>/images/next-step.svg" alt="next">
                                </li>
                                <li><a class="px-5"
                                    href="<?php echo e(Session::get('template') ? url('sites/template/design/' . Session::get('template')['id'] . Session::get('edit_query')) : ''); ?>">Design</a>
                                  <img src="<?php echo e(asset('website')); ?>/images/next-step.svg" alt="next">
                                </li>
                                <li><a class="px-5" href="javascript:;"
                                    onclick="saveFirst.call(this, 'information')">Information</a>
                                  <img src="<?php echo e(asset('website')); ?>/images/next-step.svg" alt="next">
                                </li>
                                <li><a class="px-5" href="javascript:;"
                                    onclick="saveFirst.call(this, 'publish')">Publish</a>
                                </li>
                              <?php endif; ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-3 my-auto text-end">
                  <div class="btns-wrap">
                    <a href="javascript:;" class="btn btn-prim btn-prim-trans">Close</a>
                    <a href="" class="btn btn-prim btn-prim-head">Save
                      and Next</a>
                  </div>
                </div>

              <?php endif; ?>
              <?php if(strpos($current_url, 'sites/campaign-template') === false &&
                      strpos($current_url, 'sites/template/design') === false &&
                      strpos($current_url, 'sites/template/information-design') === false &&
                      strpos($current_url, 'sites/campaign/store') === false &&
                      strpos($current_url, 'sites/broadcast/store') === false &&
                      strpos($current_url, 'campaign/integrate') === false &&
                      strpos($current_url, 'broadcast-template') === false &&
                      strpos($current_url, 'broadcast/subject') === false &&
                      strpos($current_url, 'broadcast-template') === false &&
                      strpos($current_url, 'broadcast/schedule') === false &&
                      strpos($current_url, 'broadcast/review') === false): ?>
                <div class="col-lg-12 text-end">
                  <ul class="drp-wrap">
                    <li><a href="#"><img src="<?php echo e(asset('website')); ?>/images/bell.svg" alt="bell"></a></li>
                    <li><a class="profile-btn dropdown-toggle" id="dropdownProfile" data-bs-toggle="dropdown"
                        aria-expanded="false"><img src="<?php echo e(asset('website')); ?>/images/profile.svg"
                          alt="profile"></a>
                      <ul class="dropdown-menu" aria-labelledby="dropdownProfile">
                        <li><a href="<?php echo e(route('account.index')); ?>" class="dropdown-item">Accounts</a>
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
              <?php endif; ?>
            </div>
          <?php endif; ?>
          <?php if(strpos($current_url, 'template/view-edit') !== false): ?>
            <div class="col-12 my-auto text-end">
              <div class="btns-wrap">
                
                <?php if(strpos($current_url, 'sites/template/view-edit' !== false)): ?>
                  <a href="" class="btn btn-prim btn-prim-head-automation ">Save</a>
                <?php else: ?>
                  <a href="" class="btn btn-prim btn-prim-head-automation">Save and Next</a>
                <?php endif; ?>
              </div>

            </div>
          <?php endif; ?>

        </header>
        <?php echo $__env->yieldContent('content'); ?>
      </div>
    </div>
    <script src="<?php echo e(asset('website')); ?>/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo e(asset('website')); ?>/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo e(asset('website/toastr/toastr.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('website')); ?>/js/script.js" type="text/javascript"></script>
    <script>
      toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      $('.btn-prim-trans').on('click', function() {
        var current_url = window.location.href;
        console.log(current_url);
        if (current_url.indexOf('broadcast') > 0) {
          window.location.href = "<?php echo e(url('sites/broadcasts')); ?>";
          return false;
        } else {
          setTimeout(() => {
            window.location.href = "<?php echo e(route('campaign.index')); ?>"
          }, 500);
          return false;

        }
        if (current_url.indexOf('/broadcast-template/design/') > 0) {
          setTimeout(() => {
            window.location.href = "<?php echo e(route('campaign.index')); ?>"
          }, 5000);
          return false;

        }
        if (current_url.indexOf('template/view-edit') > 0) {
          $('.dashboard-cont-wrap').hide();
          $('body').trigger('click');
          $('#templ_id').trigger('click');
        } else {
          window.location.href = "<?php echo e(route('campaign.index')); ?>"
        }
      });
      $(function() {
        $(".btn-segments").on("click", function(e) {
          $(".segment-bar").toggleClass("active");
          e.stopPropagation()
        });
        $(".close-seg-bar").on("click", function(e) {
          $(".segment-bar").removeClass("active");
          e.stopPropagation()
        });
        $(document).on("click", function(e) {
          if ($(e.target).is(".segment-bar") === false) {
            $(".segment-bar").removeClass("active");
          }
        });
        setTimeout(() => {
          var current_url = window.location.href
          if (current_url.indexOf('sites/template/design') >= 0 || current_url.indexOf(
              'sites/broadcast-template/design') >= 0) {
            $('#toggle-right-column-btn').trigger('click');
            $('.head-steps-wrap').find('li').removeClass('active');
            $('.head-steps-wrap').find('li:nth-child(2)').addClass('active');
          }
          if (current_url.indexOf('sites/template/information-design') >= 0 || current_url.indexOf(
              'broadcast/subject') >= 0) {
            $('#toggle-right-column-btn').trigger('click');
            $('.head-steps-wrap').find('li').removeClass('active');
            $('.head-steps-wrap').find('li:nth-child(3)').addClass('active');
          }
          if (current_url.indexOf('broadcast/store') >= 0) {
            $('#toggle-right-column-btn').trigger('click');
            $('.head-steps-wrap').find('li').removeClass('active');
            $('.head-steps-wrap').find('li:nth-child(4)').addClass('active');
          }
          if (current_url.indexOf('broadcast/schedule') >= 0) {
            $('#toggle-right-column-btn').trigger('click');
            $('.head-steps-wrap').find('li').removeClass('active');
            $('.head-steps-wrap').find('li:nth-child(5)').addClass('active');
          }
          if (current_url.indexOf('broadcast/review') >= 0) {
            $('#toggle-right-column-btn').trigger('click');
            $('.head-steps-wrap').find('li').removeClass('active');
            $('.head-steps-wrap').find('li:nth-child(6)').addClass('active');
          }
        }, 500);
      });
      $(document).ready(function() {
        $('.select2').select2();
        var rootContext = '<?php echo e(asset('/')); ?>';
        setTimeout(() => {
          $('li').each(function() {
            var style = $(this).attr('style')
            if (style != undefined) {
              text = style.replace('url("icons/', 'url("' + rootContext +
                'website/VvvebJs/libs/builder/icons/');
              $(this).attr('style', text);
            }
          });
        }, 2000);
      });

      function saveFirst(name) {

        var segment2 = '<?php echo e(Request::segment(2)); ?>';
        var segment3 = '<?php echo e(Request::segment(3)); ?>';
        var current_url = window.location.href
        current_href = $(this).data('href');

        if (current_url.indexOf('broadcast/review') >= 0) {
          $(this).attr('href', 'javascript:;');
          window.location.href = current_href;
          return false;
        }
        if (current_url.indexOf('broadcast-template/design') >= 0) {
          $('.btn-prim-head').trigger('click');
          return false;
        }
        if ((name == 'review' || name == 'publish' || name == 'schedule' || name == 'audience' || name == 'subject')) {
          // alert(current_href);
          $(this).attr('href', 'javascript:;');
          var form_id = $('form').attr('id');
          var fd = $('form').serialize();

          $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: fd,
            dataType: 'json',
            success: function(ret) {
              console.log(ret);
              if (ret.msg == 'AJAX') {
                // alert(current_href);
                setTimeout(() => {

                  window.location.href = current_href;
                }, 2000);
              }
            }
          })
          return false;
        }

        if (name == 'information') {
          if (segment3 == 'store' || segment3 == 'information-design') {
            console.log('here2')
            window.location.href = "<?php echo e(url('sites/template/information-design')); ?>";
          } else {
            console.log('here');
            $('.btn-prim-head').trigger('click');
            // setTimeout(() => {
            //   window.location.href = "<?php echo e(url('sites/template/information-design')); ?>";
            // }, 5000);
          }
        }
        return false;
      }
      $('.table').dataTable({
        "ordering": false,
        "pageLength": 100000

      });
      $(".submenu li.submenu-parent").click(function() {
        $(".submenu-inner").toggleClass("show");
      });
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>
  </div>

  <script>
    $(document).ready(function() {

      var pagelength = 9;
      var pageIndex = 1;

      // Count the initial number of rows
      var initialRowCount = $(".campaigns-tables tbody tr").length;

      // Hide the "Load More" button if there are fewer rows than the page length
      if (initialRowCount <= 10) {
        //  alert ('no');
        $("#load-more").hide();
      }

      //hide all tr greater than page length
      var selector = ".campaigns-tables tbody tr:gt(" + pagelength + ")";
      $(selector).hide();

      $("#load-more").click(function() {
        var itemsCount = ((pageIndex * pagelength) + pagelength);
        var selector = ".campaigns-tables tbody tr:lt(" + itemsCount + ")";
        $(selector).show();
        pageIndex++;

        // Check if there are any hidden rows left
        var hiddenRows = ".campaigns-tables tbody tr:gt(" + itemsCount + ")";
        if ($(hiddenRows).length === 0) {
          $("#load-more").hide();
        }

      });


    });

    var tables = document.querySelectorAll('.campaigns-tables table');
    tables.forEach(function(table) {
      var trCount = table.querySelectorAll('.campaigns-tables tbody tr').length;
      // alert('Table ' + table + ' has ' + trCount + ' <tr> elements.');
      if (trCount < 4) {
        table.classList.add('first-show');
      }
    });
    var current_url = window.location.href;
    if (current_url.indexOf('/public/') > 0) {
      var new_url = current_url.replace("/public/", "/");
      // console.log(new_url);
      window.location = new_url;
      // window.history.replaceState('', 'Title', "/public/");
    }
    if ('<?php echo e(Session::has('message')); ?>' != '') {
      toastr.info("<?php echo e(Session::get('message')); ?>");
    }
    if (current_url.indexOf('broadcast') > 0) {
      $('.no-sidebar').addClass('bClass')
    }
  </script>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/layouts/app.blade.php ENDPATH**/ ?>