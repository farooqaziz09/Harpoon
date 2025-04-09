
<?php $__env->startSection('title', 'Create New Template'); ?>
<?php $__env->startSection('content'); ?>
  <style>
    .select2-dropdown {
      width: 100px !important;
      z-index: 111111111;
    }

    .select2-container {
      width: 100% !important;
    }

    iframe {
      min-width: 100% !important;
      height: 83vh !important;
      min-height: 83vh !important;
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
  <?php
    if (!is_numeric(Request::get('cat')) || Request::get('cat') > 4) {
        die('Category did not belong to any template');
    }
    if (!Request::get('cat')) {
        die('No category is selected');
    }
  ?>
  <script src="https://editor.unlayer.com/embed.js"></script>

  <div class="tab-wrap-max">
    <div class="dash-cont-table">
      <div class="row">

        <div class="col-12 my-4 text-center">
          <h1>Create New Template</h1>
        </div>
      </div>
      <div class="form-wrap">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <form id="tmp_sbmt" action="<?php echo e(route('template.index.post')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <!-- <?php echo e(csrf_field()); ?> -->

                <div class="mb-3 fields-wrap">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="mb-3 select-wrap text-start d-none">
                  <label for="cat" class="form-label">Category</label>
                  <select name="category" class="form-select bg-white" aria-label="Default select example">
                    <option selected>Category</option>
                    <?php $__currentLoopData = $templateCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <div class="mb-3 fields-wrap area-fields-wrap code_wrap d-none">
                  <label for="code" class="form-label">Code</label>
                  <textarea name="code" cols="30" rows="10" class="mb-0" placeholder="Template Code..."></textarea>
                </div>
                <div class="wrap">
                  <div class="mb-3 fields-wrap area-fields-wrap thanks_wrap d-none">
                    <label for="code" class="form-label">Thankyou Page Code</label>
                    <textarea name="thankyou_code" cols="30" rows="10" class="mb-0" placeholder="Thankyou Page Code..."></textarea>
                  </div>
                </div>

                <div class="landing_wrap">
                  <ul class="nav nav-tabs list-inline mx-auto justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item">
                      
                      <button class="nav-link active" id="landing-tab" data-bs-toggle="pill" data-bs-target="#landing"
                        type="button" role="tab" aria-controls="landing" aria-selected="true">Landing Page</button>
                    </li>
                    <li>
                      
                      <button class="nav-link" id="thank-tab" data-bs-toggle="pill" data-bs-target="#thank" type="button"
                        role="tab" aria-controls="thank" aria-selected="false">Thank You</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">

                    
                    <div class="tab-pane fade show active" id="landing" role="tabpanel" aria-labelledby="landing-tab">
                      <div id="editor" style="min-height: 83vh;flex: 1 1 0%; "></div>
                    </div>

                    
                    <div class="tab-pane fade" id="thank" role="tabpanel" aria-labelledby="thank-tab">
                      <div id="editor2" style="min-height: 83vh;flex: 1 1 0%; ">
                      </div>
                    </div>

                  </div>
                </div>
                <div class="other_wrap " style="display: none;">
                  <ul class="nav nav-tabs list-inline mx-auto justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item"></li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active landing" role="tabpanel">
                      <div id="editor3" style="min-height: 83vh;flex: 1 1 0%; "></div>
                    </div>
                  </div>
                </div>
                <div class="my-3 text-end">
                  <button type="submit" class="sbmt btn btn-prim m-0 ms-auto px-5 py-2">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('scripts'); ?>
    <script>
      $('.form-select').on('change', function() {
        var cat = $(this).val();
        if (cat == '1' || cat == '4') {
          $('.other_wrap').hide();
          $('.landing_wrap').show();
        } else {
          $('iframe').css({
            'width': '100%',
            'min-height': '83vh',
            'min-width': '100%'
          });

          $('.other_wrap').show();
          $('.landing_wrap').hide();
        }
      });

      $("#tmp_sbmt").on('submit', (function(e) {
        if ($('input[name=name]').val() == '') {
          e.preventDefault();
          toastr.error('Name field is required');
          return false;
        }
        $('.sbmt').html('Submit <i class="spinner-border spinner-border-sm"></i>');

        e.preventDefault();
        if ("<?php echo e(Request::get('cat') == '1'); ?>") {
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
                  url: "<?php echo e(route('adminTemplate.add')); ?>",
                  type: "post",
                  data: {
                    "name": $('[name=name]').val(),
                    "t_id": "<?php echo e(Request::get('cat')); ?>",
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'html': html,
                    'json': JSON.stringify(json),
                    'html2': html2,
                    'json2': JSON.stringify(json2),
                    'imageUrl': imageUrl,
                    'startTemplateUrl': ''
                  },

                  headers: {
                    'X-CSRF-TOKEN': $(
                        'meta[name="csrf-token"]')
                      .attr(
                        'content')
                  },

                  success: function(response) {
                    if (response.status == 200) {
                      toastr.success(
                        'Template Saved!'
                      );
                      $('.sbmt').html('Submit');

                      setTimeout(() => {
                        $('#emailModal')
                          .modal(
                            'hide');
                        if ("<?php echo e(Request::get('cat')); ?>" ==
                          '1') {
                          window.location
                            .href =
                            "<?php echo e(url('admin-panel/landing-templates')); ?>";
                        } else {
                          window.location
                            .href =
                            "<?php echo e(url('admin-panel/email-templates')); ?>";

                        }
                      }, 3000);
                      $('.btn.btn-prim.btn-prim-head-automation')
                        .html('Save');
                    } else {
                      $('.btn-prim-head-automation')
                        .trigger(
                          'click');
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
        } else {
          editor3.exportImage(function(data) {
            var json = data.design; // design json
            var imageUrl = data.url; // image url

            editor3.exportHtml(function(data) {
              var json = data.design; // design json
              var html = data.html; // final html

              $.ajax({
                url: "<?php echo e(route('adminTemplate.add')); ?>",
                type: "post",
                data: {
                  "name": $('[name=name]').val(),
                  "t_id": "<?php echo e(Request::get('cat')); ?>",
                  "_token": "<?php echo e(csrf_token()); ?>",
                  'html': html,
                  'json': JSON.stringify(json),
                  'html2': '',
                  'json2': '',
                  'imageUrl': imageUrl,
                  'startTemplateUrl': ''
                },

                headers: {
                  'X-CSRF-TOKEN': $(
                      'meta[name="csrf-token"]')
                    .attr(
                      'content')
                },

                success: function(response) {
                  if (response.status == 200) {
                    toastr.success(
                      'Template Saved!'
                    );
                    setTimeout(() => {
                      $('#emailModal')
                        .modal(
                          'hide');
                    }, 3000);
                    $('.btn.btn-prim.btn-prim-head-automation')
                      .html('Save');
                  } else {
                    $('.btn-prim-head-automation')
                      .trigger(
                        'click');
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

        }
      }));
      var thank_json = '';
      var thank_html = '';
      // var editor1 = '';
      // var editor2 = '';

      const editor2 = unlayer.createEditor({
        id: 'editor2',
        projectId: 218529,
        designMode: "edit",
        user: {
          id: <?php echo e(auth()->user()->id); ?>,
          name: 'John Doe',
          email: '<?php echo e(auth()->user()->id); ?>'
        },
        appearance: {
          designMode: "edit",

          panels: {
            tools: {
              dock: 'left',
            }
          },
          loader: {
            url: "<?php echo e(asset('/loader.gif')); ?>"
          }
        }

      });
      editor2.loadDesign();
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
        designMode: "edit",
        user: {
          id: <?php echo e(auth()->user()->id); ?>,
          name: 'John Doe',
          email: '<?php echo e(auth()->user()->id); ?>'
        },
        appearance: {

          panels: {
            tools: {
              dock: 'left',
            }
          },
          loader: {
            url: "<?php echo e(asset('/loader.gif')); ?>"
          }
        }

      });
      editor1.loadDesign();
      const editor3 = unlayer.createEditor({
        id: 'editor3',
        projectId: 218529,
        designMode: "edit",

        displayMode: 'email',

        appearance: {
          panels: {
            tools: {
              dock: 'left',
            }
          },
          loader: {
            url: "<?php echo e(asset('/loader.gif')); ?>"
          }
        }

      });
      editor3.loadDesign();

      $(document).ready(function() {
        var iframe = document.querySelector("iframe");
        setTimeout(() => {

          $(iframe).css({
            'width': '100%',
            'min-width': '100%',
            'height': '83vh',
            'min-height': '83vh',
          });
        }, 200);
        $('[data-toggle=tab]').on('click', function() {
          var tab_id = $(this).attr('id');
          $('[data-toggle=tab]').removeClass('active');
          $(this).addClass('active');
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

      if ("<?php echo e(Request::get('cat')); ?>" == '1') {
        $('.other_wrap').hide()
        $('.landing_wrap').show()
      } else {
        $('.landing_wrap').hide()
        $('.other_wrap').show()
      }
      $(window).on('load', function() {
        console.log('template.blade.php');

      });
    </script>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/admin-panel/templates.blade.php ENDPATH**/ ?>