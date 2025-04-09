
<?php $__env->startSection('title', 'Journey templates'); ?>
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
  </style>
  <div class="dash-cont-table admin-dash-cont-table">

    <iframe src="<?php echo e(url('admin-panel/journey-templates-react')); ?>" frameborder="0" scrolling="yes" seamless="seamless"
      style="display:block; width:100%; height:100vh;">></iframe>
  </div>
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1100px">
      <div class="modal-content dashboard-cont-wrap p-0">
        <div class="modal-header"
          style="    position: absolute; display:none;
                        top: 25px;
                        right: 0;
                        z-index: 9999;">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
          'scope': 'accounts'
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
    $('.scope').on('change', function() {
      var temp_id = $(this).data('temp');
      if ($(this).val() == 'global') {
        $.ajax({
          url: "<?php echo e(route('setScope.post')); ?>",
          type: "post",
          data: {
            "_token": "<?php echo e(csrf_token()); ?>",
            'temp_id': temp_id,
            'user_ids': '',
            'scope': 'global'
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
    });
    $(document).on('click', '._createButton_566h9_87', function() {
      $('sdf').css({
        position: 'absolute', //or fixed depending on needs 
        top: $(window).scrollTop(), // top pos based on scoll pos
        left: 0,
        height: '100%',
        width: '100%'
      });
    });
    const iframe = document.getElementById("iframe");
    $('iframe').on('load', function() {
      $(iframe).show();
    });
    $(iframe).hide();
  </script>
  <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>
      $(function() {
        $("#scope_id_<?php echo e($template->id); ?>").val(["<?php echo e($template->scope_ids); ?>"]).trigger('change');
      });
    </script>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/admin-panel/journey-templates.blade.php ENDPATH**/ ?>