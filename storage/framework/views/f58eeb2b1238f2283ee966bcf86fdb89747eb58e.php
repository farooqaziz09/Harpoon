
<?php $__env->startSection('content'); ?>
  <script src="https://editor.unlayer.com/embed.js"></script>
  <style>
    #vvveb-builder #top-panel {
      position: absolute;
      z-index: 999999999;
      top: 0;
      width: -webkit-fill-available;
    }

    .tab-content {
      padding: 0;
      background: unset;
    }

    .dashboard-cont-wrap {
      margin: 0 !important;
    }

    .nav.nav-tabs li {
      padding: 5px;
    }

    .nav.nav-tabs li.active {
      background: lightgrey;
    }

    iframe {
      min-width: 100% !important;
      height: 83vh !important;
      min-height: 83vh !important;
    }

    .body_wrap.body_wrap_dashboard.h-100 {
      padding: 0;
    }

    .dashboard-cont-wrap.no-sidebar {
      padding: 0 !important;
    }

    .dashboard-cont-wrap {
      min-height: 90vh;
    }

    .btns-wrap {
      padding-right: 10px;
      position: relative;
      z-index: 9999;
    }

    .dashboard-cont-wrap.dashboard-tabs-wrap>ul.nav.nav-tabs {
      padding: 0;
    }

    .aClass .btns-wrap {
      position: fixed !important;
      left: 50% !important;
      top: 0 !important;
      width: 100%;
    }

    .aClass .tab-wrap-max {
      margin-top: -100px;
    }
  </style>
  <div class="tab-wrap-max">
    <div class="dashboard-cont-wrap dashboard-tabs-wrap">
      <div id="editor" style="min-height: 83vh; flex: 1 1 0%;"></div>
    </div>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('scripts'); ?>
    <script>
      const editor1 = unlayer.createEditor({
        id: 'editor',
        projectId: 218529,
        designMode: "edit",
        displayMode: 'web',
        appearance: {
          panels: {
            tools: {
              dock: 'left',
            }
          },
          loader: {
            url: '<?php echo e(asset('/loader.gif')); ?>'
          }
        }

      });
      editor1.loadDesign(<?= $content ?>);
      $(".btn-prim-trans").on('click', function() {
        $('#emailModal').modal('hide');
        $('#templ_id').trigger('click');

        return false;
      });
      $('.btn-prim-head-automation').on('click', function() {
        if ($('body').hasClass('aclass')) {
          var urlAjax = "<?php echo e(route('automation.save')); ?>";
        } else {
          var urlAjax = "<?php echo e(route('automation.email.save')); ?>";
        }
        $(this).html('Save <i class="spinner-border spinner-border-sm"></i>');
        editor1.exportImage(function(data) {
          var json = data.design; // design json
          var imageUrl = data.url; // image url

          editor1.exportHtml(function(data) {
            var json = data.design; // design json
            var html = data.html; // final html

            $.ajax({
              url: urlAjax,
              type: "post",
              data: {
                "file": "<?php echo e(isset($template['path']) && $template['path'] != null ? $template['path'] : ''); ?>",
                "t_id": "<?php echo e(isset($template['id']) && $template['id'] != null ? $template['id'] : null); ?>",
                "a_id": "<?php echo e(request()->segment(count(request()->segments()))); ?>",
                "_token": "<?php echo e(csrf_token()); ?>",
                'html': html,
                'json': JSON.stringify(json),
                'imageUrl': imageUrl,
                'startTemplateUrl': ''
              },

              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                  .attr(
                    'content')
              },

              success: function(response) {
                if (response.status == '200') {
                  toastr.success(
                    'Template Saved!'
                  );
                  $('.btn-prim-head-automation').html('Save');
                  setTimeout(() => {

                    parent.$('#emailModal').modal('hide');
                    // window.parent.closeModal();

                  }, 3000);
                } else {
                  $('.btn-prim-head-automation').trigger('click');
                  // toastr.error('Failed to load');
                }
              },

              error: function(error) {
                console.log('erero');
                console.log(error);

              }

            });
          })
        })
      });
      window.closeModal = function() {
        $('#emailModal').modal('hide');
      };
      $('.btn.btn-prim.btn-prim-head-automation').attr('href', "javascript:;");
      $(document).ready(function() {
        $('.btn.btn-prim.btn-prim-head-automation').html('Save');

        var iframe = document.querySelector("iframe");
        setTimeout(() => {

          $(iframe).css({
            'width': '100%',
            'min-width': '100%',
            'height': '83vh',
            'min-height': '83vh',
          });
        }, 200);
        $('iframe').contents().find('.blockbuilder-branding').hide();
        $('[data-toggle=tab]').on('click', function() {
          var tab_id = $(this).attr('id');
          $('[data-toggle=tab]').removeClass('active');
          $(this).addClass('active');
          $('iframe').css('height', '83vh');
          if (tab_id == 'landing') {
            $('.landing').show();
            $('.thank').hide();
          }
          if (tab_id == 'thank') {
            $('.thank').show();
            $('.landing').hide();
          }
        });

      });
      $(window).on('load', function() {
        console.log('viewEdit.blade.php');

      });
    </script>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/templates/viewEdit.blade.php ENDPATH**/ ?>