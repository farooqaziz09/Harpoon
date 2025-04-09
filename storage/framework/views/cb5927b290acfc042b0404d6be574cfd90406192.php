
<?php $__env->startSection('title', 'Automation'); ?>
<?php $__env->startSection('content'); ?>

  <div class="dash-cont-table automation-table-wrap">
    <header>
      <div class="row">
        <div class="col-lg-12 text-end">
          <div class="btns-wrap">
            <a href="<?php echo e(route('automation.index')); ?>" class="btn btn-prim btn-prim-trans">Close</a>
            <a href="template.html" class="btn btn-prim btn-prim-head">Next</a>
          </div>
        </div>
      </div>
    </header>
    <div class="row">
      <div class="col-12">
        <h1 class="mb-0">Create Automation</h1>
      </div>
    </div>
    <div class="automation-cont-wrap">
      <div class="row mt-5 mx-2 h-100">
        <div class="col-4 text-center">
          <div class="automation-box img-create-automation" data-bs-toggle="modal" data-bs-target="#createModal">
            <h3>Create From Scratch</h3>
            <p>Prefer a blank slate? Create your own automation from scratch.</p>
            <img src="<?php echo e(asset('website')); ?>/images/add-aut.svg" alt="">
          </div>
          
        </div>
        <div class="col-4 text-start">
          <a href="#" data-bs-toggle="modal" data-bs-target="#automationModal">
            <div class="automation-box img-create-automation text-center">
              <h3>
                <img src="<?php echo e(asset('website')); ?>/images/split.svg" alt="">
                Saved Templates
              </h3>
              <p>Welcome your users with an engaging welcome email automation.</p>
              <img class="" src="<?php echo e(asset('website')); ?>/images/add-aut.svg" alt="">

            </div>
          </a>
          <div class="modal fade" id="automationModal" tabindex="-1" aria-labelledby="automationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" style="max-width: 1100px">
              <div class="modal-content dashboard-cont-wrap">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <!-- top bar -->
                  <!-- template -->
                  <div class="cont-tabs-inner">
                    <div class="templates-wrap">
                      <div class="row">
                        <div class="col-12">
                          <h5 class="modal-title text-start" id="emailModalLabel">
                            Choose Automation Template
                          </h5>
                        </div>
                      </div>
                      <div class="row">
                        <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="col-lg-3">
                            

                            <div class="template-box m-2" style="background-image: url(<?php echo e(url('$template->image')); ?>">
                              <div class="template-btns d-block">
                                <a href="javascript:;" data-id="<?php echo e($template->id); ?>"
                                  class="btn btn-prim bg-white w-100 mb-2"
                                  onclick="autoData('<?php echo e($template->name); ?>','<?php echo e($template->id); ?>')">Use
                                  Template</a>
                                
                              </div>

                            </div>
                            <div class="text-center">
                              <h5 class="text-dark"><?php echo e($template->name); ?></h5>
                            </div>
                          </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                  </div>
                  <div class="unlayer-block " style="display: none;">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="modals-sec">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Modal -->
          <!-- createModal -->
          <div class="modal fade modal-create-campaign" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="createModalLabel">
                    <div class="creat-title-img-wrap"><img src="<?php echo e(asset('website')); ?>/images/automations.svg"
                        alt="forms"></div>
                    Create
                    new automations
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img
                      src="<?php echo e(asset('website')); ?>/images/close.svg" alt="close"></button>
                </div>
                <div class="modal-body">
                  <div class="create-form">
                    <form id="auto_form" action="<?php echo e(route('automation.store.post')); ?>"method="post">
                      <?php echo csrf_field(); ?>
                      <input type="text" class="auto_name" name="automation_name"
                        placeholder="Enter name for your automations" required>
                      <div class="select-wrap">
                        <select name="trigger" class="auto_trigger">
                          <option value="">Select trigger</option>
                          <option value="List Assigned">List Assigned</option>
                          <option value="Tag Assigned">Tag Assigned</option>
                        </select>
                      </div>

                      <button type="submit" class="btn btn-prim btn-prim-light sbmt_btn">+ Create
                        Campaign</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- createModal -->
          <!-- Modal -->
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

  <script>
    $(".submenu li.submenu-parent").click(function() {
      $(".submenu-inner").toggleClass("show");
    });
    $('.temp-anch').on('click', function(e) {
      var t_id = $(this).data('id');
      var e_id = $(this).attr('data-email-id');
      $('.head-steps-wrap').find('li').removeClass('active');

      $('.head-steps-wrap').find('li:nth-child(2)').addClass('active');

      e.preventDefault();

      $.ajax({
        url: "<?php echo e(route('template.getTemplate.post')); ?>",
        type: "post",
        data: {
          'id': t_id,
          'a_id': 'automationTemplate',
          'e_id': e_id,
        },
        dataType: "JSON",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          $('.unlayer-block').show();
          $('.cont-tabs-inner').hide();
          $('#emailModal').find('.modal-dialog').addClass('modal-lg');
          $('#emailModal').find('.modal-content').removeClass('dashboard-cont-wrap');
          $('.unlayer-block').html(response.url);
        },
        error: function(error) {
          toastr.error(error);
        }

      });
    });
    $('#createModal').on('shown.bs.modal', function(e) {
      $('.auto_name').html('');
      $('.auto_trigger').removeAttr('disabled');
    });

    function autoData(name, id) {
      $('#createModal').modal('show');
      $('#automationModal').modal('hide');
      $('.auto_name').val(name);
      setTimeout(() => {
        $('.auto_trigger').prop('disabled', 'disabled');
      }, 500);
      $('#auto_form').append('<input type="hidden" name="temp_id" value="' + id + '">');
    }
    $(".previewMod").on('click', (function(e) {
      var t_id = $(this).data('id');
      e.preventDefault();
      $.ajax({
        url: "<?php echo e(route('template.showTemplate.post')); ?>",
        type: "post",
        data: 'id=' + t_id,
        dataType: "JSON",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          if (response.url) {
            $('.img-wrap-desk.img-wrap, .img-wraps').html(response.url);
            $('iframe').contents().find("-webkit-scrollbar").css("width", "5px")
          } else {
            toastr.error('Failed to load');
          }
        },
        error: function(error) {
          toastr.error(error);
        }

      });

    }));
  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/campaign/automation/create.blade.php ENDPATH**/ ?>