
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

    .img-wrap-list img {
      width: 70px;
      height: 70px;
      background: #D9D9D9;
      border-radius: 5px;
      object-fit: cover;
    }
  </style>
  <div class="tab-wrap-max">
    <div class="dashboard-cont-wrap dashboard-tabs-wrap">
      <ul class="nav nav-tabs list-inline mx-auto justify-content-center" id="myTab" role="tablist">
        <li class="nav-item">
          
          <button class="nav-link active" id="landing-tab" data-bs-toggle="pill" data-bs-target="#landing" type="button"
            role="tab" aria-controls="landing" aria-selected="true">Landing Page</button>
        </li>
        <li>
          
          <button class="nav-link" id="thank-tab" data-bs-toggle="pill" data-bs-target="#thank" type="button"
            role="tab" aria-controls="thank" aria-selected="false">Thank You</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">

        
        <div class="tab-pane fade show active" id="landing" role="tabpanel" aria-labelledby="landing-tab">
          <div id="editor" style="min-height: 83vh" style="flex: 1 1 0%; "></div>
        </div>

        
        <div class="tab-pane fade" id="thank" role="tabpanel" aria-labelledby="thank-tab">
          <div id="editor2" style="min-height: 83vh" style="flex: 1 1 0%; ">
          </div>
        </div>

      </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>
      <script>
        var thank_json = '';
        var thank_html = '';
        // var editor1 = '';
        // var editor2 = '';

        const editor2 = unlayer.createEditor({
          id: 'editor2',
          projectId: 218529,
          user: {
            id: <?php echo e(auth()->user()->id); ?>,
            email: '<?php echo e(auth()->user()->id); ?>'
          },
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
        editor2.loadDesign(
          <?= Session::get('editTemplateContentThank') != '' ? Session::get('editTemplateContentThank') : Session::get('templateContentThank') ?>
        );
        editor2.addEventListener('design:updated', function(updates) {
          // Design is updated by the user

          editor2.exportHtml(function(data2) {
            thank_json = data2.design; // design json
            thank_html = data2.html; // design html
            // Save the json, or html here
          })
        })
        const editor1 = unlayer.createEditor({
          id: 'editor',
          projectId: 218529,
          user: {
            id: <?php echo e(auth()->user()->id); ?>,
            email: '<?php echo e(auth()->user()->id); ?>'
          },
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
        editor1.loadDesign(<?= Session::get('templateContent') ?>);

        $('.btn-prim-head').on('click', function() {
          $(this).html('Next <i class="spinner-border spinner-border-sm"></i>');
          editor1.exportImage(function(data) {
            var json = data.design; // design json
            var imageUrl = data.url; // image url

            editor1.exportHtml(function(data) {
              var json = data.design; // design json
              var html = data.html; // final html

              editor2.exportHtml(function(data) {
                var json2 = data.design; // design json
                var html2 = data.html; // image url

                $.ajax({
                  url: "<?php echo e(route('template.save')); ?>",
                  type: "post",
                  data: {
                    "file": "<?php echo e(isset(Session::get('template')->path) && !is_null(Session::get('template')->path) ? Session::get('template')->path : Session::get('campaign')['path']); ?>",
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'html': html,
                    'json': JSON.stringify(json),
                    'html2': html2,
                    'json2': JSON.stringify(json2),
                    'imageUrl': imageUrl,
                    'startTemplateUrl': ''
                  },

                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                      .attr(
                        'content')
                  },

                  success: function(response) {
                    if (response == 'File Saved') {
                      // toastr.success(
                      //     'Template Saved! Redirecting you in 5 secs to next page'
                      // );
                      setTimeout(() => {
                        window.location.href =
                          "<?= url('sites/template/information-design') ?>";
                      }, 5000);
                    } else {
                      $('.btn-prim-head').trigger('click');
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
          })
        });
        $('.btn.btn-prim.btn-prim-head').attr('href', "javascript:;");
        $(document).ready(function() {
          var iframe = document.querySelector("iframe");
          iframe.style.height = "83vh";

          $('iframe').contents().find('.blockbuilder-branding').hide();
          $('.nav-link').on('click', function() {
            var tab_id = $(this).attr('id');
            $(this).addClass('active');
            $('iframe').css('height', '83vh');
            if (tab_id == 'landing-tab') {
              $('.landing').show();
              $('.thank').hide();
            }
            if (tab_id == 'thank-tab') {
              $('.thank').show();
              $('.landing').hide();
            }
          });

        });
        // $('#editor2').hide();
        // $('iframe').contents().replace('fade-desktop', 'faddedd');
        $('iframe').on("load", function() {
          setTimeout(() => {

            $('#editor').append('');
          }, 2000);
        });

        var iframe = document.querySelector("iframe");
        iframe.style.height = "83vh";
      </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/templates/UnlayerDesign.blade.php ENDPATH**/ ?>