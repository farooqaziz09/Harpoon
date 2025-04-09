
<?php $__env->startSection('content'); ?>
  <style>
    .select2-dropdown {
      width: 100px !important;
      z-index: 111111111;
    }

    .select2-container {
      width: 100% !important;
    }
  </style>
  <?php
    $listArr = [];
    $tagArr = [];
  ?>
  <div class="tab-wrap-max">
    <div class="dash-cont-table">
      <div class="row">
        <div class="col-lg-8">
          <h1 class="mb-0">All Contacts</h1>
        </div>
        <div class="col-lg-4 text-end">
          <div class="btns-wrap">
            <a href="javascript:;" class="btn-prim btn-trans btn-delete btn"><i class="fa fa-trash-o"></i></a>
            <a class="btn btn-prim" data-bs-toggle="modal" data-bs-target="#createNewContactModal">Edit</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row-subs-all row-sub-wrap-all">
      <div class="row">
        <div class="col-4">
          <div class="sub-wrap">
            <div class="prof-wrap">
              <h2> <i class="fa fa-user"></i> <?php echo e($contact->first_name); ?></h2>
              <a href="mailto:damien.m@mailmunch.com" class="d-block"><?php echo e($contact->email); ?></a>
              
              <?php echo get_status_text($contact->status); ?>

              <hr>
              <div class="list-wrap-main-all">
                <?php if($lists): ?>
                  <div class="list-wrap-main-head">Lists</div>
                  <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $listArr[] = $list['id'];
                    ?>
                    <label for="" class="pending-label fieled-wrap mx-0 d-inline"><i class="fa fa-bars"></i>
                      <?php echo e($list['name']); ?></label>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <hr>
                <?php endif; ?>
              </div>
              <div class="list-wrap-main-all">
                <?php if($tags): ?>
                  <div class="list-wrap-main-head">Tags</div>
                  <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $tagArr[] = $tag['id'];
                    ?>
                    <label for="" class="pending-label fieled-wrap mx-0 d-inline"><i class="fa fa-bars"></i>
                      <?php echo e($tag['name']); ?></label>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <hr>
                <?php endif; ?>
              </div>

              <h6>Signed Up</h6>
              <h5><?php echo e(date('Y-m-d H:i:s', strtotime($contact->signed_up))); ?></h5>
              
              <?php echo $CustomFieldHelper::viewPrimaryFields($contact); ?>

            
              <?php echo $CustomFieldHelper::viewCustomFields($customFieldsData); ?>


              
            </div>
          </div>
        </div>
        <div class="col-8">
          <div class="sub-wrap">
            <h2>User Journey</h2>
            
            
           
            <?php if(count($userJourneyHistory)>0): ?>
            <?php $__currentLoopData = $userJourneyHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $journey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php 
            $message = get_user_journey_message($journey->message_id,$journey->dataID);
            ?>
            <?php if(isset($message['heading'])): ?>
            <div class="row">
                  <div class="col-1 col-line-wrap">
                    <div class="email-icon-wrap">
                      <span class="bg-gray-200 w-8 rounded-full flex items-center justify-center" style="height: 34px;">
                        <span class="<?php echo e($message['icon']); ?>"></span>
                      </span>
                    </div>
                  </div>
                  <div class="col-11 col-form-right-wrap">
                    <div class="form-box-wrap">
                      <div class="head-box-wrap">
                        <h3><?php echo $message['heading']; ?></h3>
                        <h4><?php echo $message['description']; ?></h4>
                      </div>
                      <div class="body-box-wrap">
                        <h5><?php echo e(the_date($journey->created_at)); ?></h5>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
              <div class="row">
                  <div class="col-1 col-line-wrap">
                    <div class="email-icon-wrap">
                      <span class="bg-gray-200 w-8 rounded-full flex items-center justify-center" style="height: 34px;">
                        <span class="fa fa-user"></span>
                      </span>
                    </div>
                  </div>
                  <div class="col-11 col-form-right-wrap">
                    <div class="form-box-wrap">
                      <div class="head-box-wrap">
                        <h3>Signed Up</h3>
                        <h4>This user's journey starts here</h4>
                      </div>
                      <div class="body-box-wrap">
                        <h5><?php echo e(the_date($contact->created_at)); ?></h5>
                      </div>
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
  <!-- dash cont wrap -->
  </div>

  <section class="modals-sec">
    <div class="container">
      <div class="row">
        <div class="col-12">

          <div class="modal fade modal-contact-new" id="createNewContactModal" tabindex="-1"
            aria-labelledby="createNewContactModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="createNewContactModalLabel">New Contact</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="contact" method="post" action="<?php echo e(route('contacts.update.post', $contact->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <!-- <?php echo e(csrf_field()); ?> -->

                    <div class="modal-create-contact-wrap">
                      <div class="row">
                        <div class="col-12">

                          <div class="form-wrap">
                            <label for="firstName">First Name</label>
                            <input class="form-control" type="text" name="first_name"
                              placeholder="Enter First Name" value="<?php echo e($contact->first_name); ?>">
                          </div>
                          <div class="form-wrap">
                            <label for="lastName">Last Name</label>
                            <input class="form-control" type="text" name="last_name" placeholder="Enter Last Name"
                              value="<?php echo e($contact->last_name); ?>">
                          </div>
                          <div class="form-wrap">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Enter Email"
                              value="<?php echo e($contact->email); ?>">
                          </div>
                          <div class="form-wrap">
                            <label for="list">List</label>
                            <select name="lists[]" id="list" class="select2" multiple="multiple">
                              <option value="" disabled>Select</option>
                              <?php $__currentLoopData = $db_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($list->id); ?>">
                                  <?php echo e($list->name); ?>

                                </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                            </select>
                          </div>
                          <div class="form-wrap">
                            <label for="tags">Tags</label>
                            <select name="tags[]" id="tags" class="select2" multiple="multiple">
                              <option value="" disabled>Select</option>
                              <?php $__currentLoopData = $db_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?>

                                </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="btns-wrap mt-1">
                        <div class="row">
                          <div class="col-6">
                            <div class="d-inline-block ps-relative">
                              <a class="btn btn-prim btn-prim-light w-100 d-inline-block m-0 px-2 show"
                                id="dropdownAddCustom" data-bs-toggle="dropdown" aria-expanded="true"><span>Add Custom
                                  Field</span>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="dropdownAddCustom">
                                <li><a class="dropdown-item" href="#" data-id='zip'>Zip Code</a></li>
                                <li><a class="dropdown-item" href="#" data-id='company'>Company</a>
                                </li>
                                <li><a class="dropdown-item" href="#" data-id="website">Website</a>
                                </li>
                                <li><a class="dropdown-item" href="#" data-id='phone'>Phone Number</a>
                                </li>
                                <li><a class="dropdown-item" href="#" data-id='name'>Name</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col-6 text-end ">
                            <button type="reset" class="btn btn-simple w-auto d-inline-block my-0 mx-2">Discard
                            </button>
                            <button type="submit"
                              class="btn btn-prim btn-prim-light w-auto d-inline-block m-0 px-3"><span>Save</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
  <script>
    $('.btn-delete').on('click', function() {

      Swal.fire({
        title: 'Are you sure?',
        text: "This contact will be deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '<?php echo e(env('APP_COLOR_1')); ?>',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "<?php echo e(url('sites/contact/destroy/')); ?>/" + "<?php echo e($contact->id); ?>";
        }

      });
    });
    $('.dropdown-item').on('click', function() {
      var name = $(this).data('id');
      var field = `<div class="form-wrap">
                <label for="">` + $(this).text() + `</label>
                <input class="form-control" type="text" name="` + name + `" placeholder="Enter ` + $.trim($(this)
        .text()) + `" >
            </div>`;
      $('.modal-create-contact-wrap').find('.col-12').append(field);
    });
  </script>
  <?php if($listArr): ?>
    <script>
      $('#list').val(<?php echo e(json_encode($listArr)); ?>);
      $('#list').trigger('change');
    </script>
  <?php endif; ?>
  <?php if($tagArr): ?>
    <script>
      $('#tags').val(<?php echo e(json_encode($tagArr)); ?>);
      $('#tags').trigger('change');
    </script>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/contacts/details.blade.php ENDPATH**/ ?>