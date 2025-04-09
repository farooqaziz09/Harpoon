
<?php $__env->startSection('title', '- Home Page'); ?>
<?php $__env->startSection('content'); ?>
  <style>
    .b-1 {
      filter: brightness(1);
    }
  </style>
  <div class="dash-cont-table admin-dash-cont-table">
    <div class="automation-cont-wrap admin-dash-box-wrap h-100 d-flex flex-column justify-content-center">
      <div class="row justify-content-center h-100" style="height: 100%;">
        <div class="col-12 my-auto text-center">
          <h3>Hi <?php echo e(auth()->user()->name); ?>, <br><br>Welcome to your <?php echo e(env('APP_NAME')); ?> Dashboard!</h3>
        </div>
      </div>
      <div class="anlytics-count-wrap">
        <div class="row justify-content-center">
          <div class="col-3">
            <a href="javascript:;" data-image="<?php echo e(asset('website')); ?>/images/bg1.jpg" data-bs-toggle="modal"
              data-bs-target="#campaignModal">
              <div class="det-count-box px-0">
                <img src="<?php echo e(asset('website')); ?>/images/landing.svg" class="b-1" alt="landingpage"><br><br>
                <img src="<?php echo e(asset('website')); ?>/images/add-aut.svg" class="b-1 rounded-circle px-2 py-2 text-white"></i>
                <br><br>
                <p>Create Landing Page</p>
              </div>
            </a>
          </div>
          <div class="col-3">
            <a href="javascript:;" data-image="<?php echo e(asset('website')); ?>/images/bg2.jpg" data-bs-toggle="modal"
              data-bs-target="#campaignModal">
              <div class="det-count-box px-0">

                <img src="<?php echo e(asset('website')); ?>/images/broadcast.svg" class="b-1" alt="broadcast"><br><br>
                <img src="<?php echo e(asset('website')); ?>/images/add-aut.svg" class="b-1 rounded-circle px-2 py-2 text-white"></i>
                <br><br>
                <p>Create Broadcast</p>
              </div>
            </a>
          </div>
          <div class="col-3">
            <a href="javascript:;" data-image="<?php echo e(asset('website')); ?>/images/bg3.jpg" data-bs-toggle="modal"
              data-bs-target="#campaignModal">
              <div class="det-count-box px-0">

                <img src="<?php echo e(asset('website')); ?>/images/automations.svg" class="b-1" alt="automation"><br>
                <img src="<?php echo e(asset('website')); ?>/images/add-aut.svg"
                  class="b-1 rounded-circle px-2 py-2 text-white my-3"></i>
                <br>
                <p class="pb-1">Create Automation</p>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="modal fade modal-campaign" id="campaignModal" tabindex="-1" aria-labelledby="campaignModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="campaignModalLabel">Choose Campaign</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img
                  src="<?php echo e(asset('website')); ?>/images/close.svg" alt="close"></button>
            </div>
            <div class="modal-body">
              <div class="img-wrap-modal">
                <img src="<?php echo e(asset('website')); ?>/images/bg.jpg" alt="bg">
              </div>
              <div class="serv-pop-wrap">
                <div class="row list-inline mx-auto justify-content-center">

                  <?php if($admSettings->campaigns == '1'): ?>
                    <div class="col-2">
                      <div class="box-modal-wrap" data-image="<?php echo e(asset('website')); ?>/images/bg1.jpg"
                        data-bs-toggle="modal" data-bs-target="#createModal" data-bs-dismiss="modal" aria-label="Close">
                        <div class="modal-icon-wrap">
                          <img src="<?php echo e(asset('website')); ?>/images/landing.svg" alt="landing">
                        </div>
                        <div class="cont-modal-wrap">
                          <h3>Landing pages</h3>
                          
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                  <?php if($admSettings->broadcast == '1'): ?>
                    <div class="col-2">
                      <div class="box-modal-wrap" data-image="<?php echo e(asset('website')); ?>/images/bg2.jpg"
                        data-bs-toggle="modal" data-bs-target="#createModal_B" data-bs-dismiss="modal" aria-label="Close">
                        <div class="modal-icon-wrap">
                          <img src="<?php echo e(asset('website')); ?>/images/broadcast.svg" alt="broadcast">
                        </div>
                        <div class="cont-modal-wrap">
                          <h3>Broadcasts</h3>
                          
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                  <?php if($admSettings->automation == '1'): ?>
                    <div class="col-2">
                      
                      <div class="box-modal-wrap" data-image="<?php echo e(asset('website')); ?>/images/bg3.jpg">
                        <a href="<?php echo e(route('automation.create')); ?>">
                          <div class="modal-icon-wrap">
                            <img src="<?php echo e(asset('website')); ?>/images/automations.svg" alt="automations">
                          </div>
                          <div class="cont-modal-wrap">
                            <h3>Automations</h3>
                            
                          </div>
                        </a>
                      </div>
                    </div>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade modal-create-campaign" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">
            <div class="creat-title-img-wrap"><img src="<?php echo e(asset('website')); ?>/images/forms.svg" alt="forms">
            </div>
            Create a new landing Page
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img
              src="<?php echo e(asset('website')); ?>/images/close.svg" alt="close"></button>
        </div>
        <div class="modal-body">
          <div class="create-form">
            <form action="<?php echo e(route('campaign.template.post')); ?>" method="post">
              <?php echo csrf_field(); ?>


              <input name="name" type="text" placeholder="Enter name for your campaign" required>
              <div class="select-wrap">
                <select name="list" id="" required>
                  <option value="">Select List</option>
                  <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($list->id); ?>"><?php echo e($list->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <button type="submit" class="btn btn-prim btn-prim-light">Create
                Campaign</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade modal-create-campaign" id="createModal_B" tabindex="-1" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">
            <div class="creat-title-img-wrap"><img src="<?php echo e(asset('website')); ?>/images/forms.svg" alt="forms">
            </div>
            Create New BroadCast Email
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img
              src="<?php echo e(asset('website')); ?>/images/close.svg" alt="close"></button>
        </div>
        <div class="modal-body">
          <div class="create-form">
            <form action="<?php echo e(route('broadcast.template.post')); ?>" method="post">
              <?php echo csrf_field(); ?>


              <input name="title" type="text" placeholder="Enter name for your broadcast" required>

              <button type="submit" class="btn btn-prim btn-prim-light">Create
                Broadcast</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script>
    $(document).on('mouseenter', '.det-count-box', function() {
      var d_img = $(this).closest('a').attr('data-image');
      $(this).closest('.col-3').find('*').css({
        'color': 'white',
        'background': 'var(--bs-body-text-primary-color)'
      })
      $(this).closest('.col-3').find('img').css({
        'background': '',
        'filter': "brightness(0) invert(1)"
      });
      // $(this).css({
      //   'background-image': 'url(' + d_img + ')',
      //   'background-repeat': 'no-repeat',
      //   'background-size': 'cover',
      //   'background-position': 'center'
      // });
    }).on('mouseleave', '.det-count-box', function() {
      $(this).closest('.col-3').find('*').removeAttr('style');
    })

    function invert() {
      document.getElementById("theImage").style.filter = "invert(100%)";
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/user-home.blade.php ENDPATH**/ ?>