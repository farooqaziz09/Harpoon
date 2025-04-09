
<?php $__env->startSection('title', 'Email templates'); ?>
<?php $__env->startSection('content'); ?>
  <style>
    .prfile-photo {
      height: 180px;
      overflow: hidden;
    }

    .form-check-input:checked[type=radio]+label {
      background: none !important;
      color: unset !important;
    }

    label {
      width: 80%;
    }

    .select2-container .select2-selection--multiple {
      min-height: unset;
    }

    .select2-dropdown {
      width: 100px !important;
      z-index: 111111111;
    }

    .select2-container {
      width: 100% !important;
    }

    .body_wrap {
      padding: 0 !important;
    }

    .dashboard-cont-wrap {
      padding: 0 !important;
    }

    .modal-dialog .modal-content.dashboard-cont-wrap {
      padding: 0 !important;
    }

    .modal-body {
      padding: 0 !important;
    }

    .dashboard-cont-wrap.dashboard-tabs-wrap>ul.nav.nav-tabs {
      padding: 0;
    }
  </style>
  <div class="dash-cont-table admin-dash-cont-table">
    <div class="row">
      <div class="col-8">
        <h1>Email Templates</h1>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <div class="btns-wrap">
          <!-- <a href="../dashboard.html" class="btn btn-prim btn-prim-trans">Close</a> -->
          <a href="<?php echo e(route('admin-panel.templates') . '/?cat=3'); ?>"
            class="btn btn-prim btn-prim-head add-new-tag-btn new-form-btn">+ New Email</a>
        </div>
      </div>
    </div>

    <div class="campaigns-tables setting-admin-tables">
      <div class="campaigns-tables-wrap admin-form-template-table px-0">
        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <div class="form-template-head">
              <table class="w-100">
                <thead>
                  <tr>
                    <th></th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="width: 120px">
                      <div class="search-container input-group-icon">
                        <input class="form-control" type="text" id="search" placeholder="Search template" />
                        <span class="icon-sear">
                          <img src="<?php echo e(asset('website')); ?>/images/search.svg" alt="" />
                        </span>
                      </div>
                    </td>
                    <td style="width: 220px" class="d-none">
                      <div class="tag-td">
                        <ul class="tags-form-tem">
                          <li>
                            reduce_cart_abandonment
                            <span class="tag-remove"><img src="<?php echo e(asset('website')); ?>/images/delet-bin-red.svg"
                                alt="" /></span>
                          </li>
                          <li>
                            grow_email_list
                            <span class="tag-remove"><img src="<?php echo e(asset('website')); ?>/images/delet-bin-red.svg"
                                alt="" /></span>
                          </li>
                        </ul>
                      </div>
                    </td>

                    <td class="d-none">
                      <div class="select-wrap-wrap w-100">
                        <select name="" id="">
                          <option value="">
                            Free
                          </option>
                          <option value="">
                            0ption2
                          </option>
                          <option value="">
                            option3
                          </option>
                        </select>
                      </div>
                    </td>
                    <td class="d-none">
                      <div class="select-wrap-wrap w-100">
                        <select name="" id="">
                          <option value="">
                            Live
                          </option>
                          <option value="">
                            0ption2
                          </option>
                          <option value="">
                            option3
                          </option>
                        </select>
                      </div>
                    </td>
                    <td class="d-none">
                      <div class="select-wrap-wrap w-100">
                        <select name="" id="">
                          <option value="">
                            Simple
                          </option>
                          <option value="">
                            0ption2
                          </option>
                          <option value="">
                            option3
                          </option>
                        </select>
                      </div>
                    </td>
                    <td class="d-none">
                      <div class="sort-by-btn">
                        <button class="sort-sort-btn">
                          <img src="<?php echo e(asset('website')); ?>/images/sort-by-btn-icon.svg" alt="" />Sort By
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="cont-tabs-inner accordian-settings-wrap form-template-inner-cont">
        <div class="form-template-boxes">
          <div class="row">
            <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="form-template-box col-4 m-2">

                <div class="form-t-one-cont">
                  <div class="prfile-photo">
                    <img src="<?php echo e($template->image); ?>" alt="" />
                  </div>
                  <div class="description-form-tem">
                    <h4><?php echo e($template->name); ?></h4>
                  </div>
                  <div class="links-btn-wrap text-center">
                    <a href="javscript:void(0);" data-bs-toggle="modal" data-bs-target="#editModal"
                      onclick="editT('<?php echo e($template->id); ?>')"><img src="<?php echo e(asset('design')); ?>/images/edit-icon-form.svg"
                        alt="" />Edit</a>
                    <a href="javscript:void(0);" onclick="duplicateT('<?php echo e($template->id); ?>')"><img
                        src="<?php echo e(asset('design')); ?>/images/duplicate-icon-form.svg" alt="" />Duplicate</a>
                    <?php if($template->user_id != '-1'): ?>
                      <a href="javscript:void(0);" onclick="deleteT('<?php echo e($template->id); ?>')"><img
                          src="<?php echo e(asset('design')); ?>/images/delete-icon-form.svg" alt="" />Delete</a>
                    <?php endif; ?>
                  </div>
                  <div class="form-checked-end-wrap d-flex my-3">
                    <div class="form-check col-6">
                      <label for="prem<?php echo e($template->id); ?>">
                        <input class="form-check-input" type="radio" name="scope[<?php echo e($template->id); ?>]" value=""
                          checked id="prem<?php echo e($template->id); ?>" />
                        Global</label>
                    </div>
                    <div class="form-check col-6">
                      <input class="form-check-input" type="radio" name="scope[<?php echo e($template->id); ?>]" value=""
                        id="check<?php echo e($template->id); ?>" <?php echo e(!is_null($template->scope_ids) ? 'checked' : ''); ?> />
                      <label for="check<?php echo e($template->id); ?>">Accounts
                        <select name="account" id="scope_id_<?php echo e($template->id); ?>" class="select2" multiple="multiple"
                          onchange="setScope.call(this, '<?php echo e($template->id); ?>')">
                          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>">
                              <?php echo e($user->id . ' # ' . $user->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                      </label>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1100px">
      <div class="modal-content dashboard-cont-wrap p-0">
        <div class="modal-header"
          style="    position: absolute; display:none;
                    top: 25px;
                    right: 0;
                    z-index: 9999;">
          <button type="button" class="btn-close h2" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body p-2">

          <div class="unlayer-block">

          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script>
    function deleteT(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "Deleting this template will not be restored!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "<?php echo e(url('admin-panel/delete-template/')); ?>/" + id;
        }

      });
    }

    function duplicateT(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "Duplicate this template?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Duplicate!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "<?php echo e(url('admin-panel/duplicate-template/')); ?>/" + id;
        }

      });
    }

    function editT(id) {
      $.ajax({
        url: "<?php echo e(route('admin-template.getTemplate.post')); ?>",
        type: "post",
        data: {
          "_token": "<?php echo e(csrf_token()); ?>",
          'id': id,
        },
        dataType: "JSON",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {

          $('.unlayer-block').html(response.url);
        },
        error: function(error) {
          toastr.error(error);
        }

      });
    }

    function setScope(temp_id) {
      $.ajax({
        url: "<?php echo e(route('setScope.post')); ?>",
        type: "post",
        data: {
          "_token": "<?php echo e(csrf_token()); ?>",
          'temp_id': temp_id,
          'user_ids': $(this).val(),
        },
        dataType: "JSON",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          //   $('.unlayer-block').html(response.url);
        },
        error: function(error) {
          //   toastr.error(error);
        }

      });
    }
    $("#search").on("keyup", function() {
      var filter = $(this).val(),
        count = 0;
      // Loop through the comment list
      $('.form-template-boxes>.row .form-template-box').each(function() {
        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide(); // MY CHANGE
          // Show the list item if the phrase matches and increase the count by 1
        } else {
          $(this).show(); // MY CHANGE
          count++;
        }
      });
    });
  </script>
  <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>
      $(function() {
        $("#scope_id_<?php echo e($template->id); ?>").val([<?php echo e($template->scope_ids); ?>]).trigger('change');
      })
    </script>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/admin-panel/email-templates.blade.php ENDPATH**/ ?>