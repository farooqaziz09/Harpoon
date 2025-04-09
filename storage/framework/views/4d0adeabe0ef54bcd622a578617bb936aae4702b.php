
<?php $__env->startSection('title', 'Automations'); ?>
<?php $__env->startSection('content'); ?>
  <style>
    .select2-dropdown {
      width: 100px !important;
      z-index: 111111111;
    }

    .select2-container {
      width: 100% !important;
    }

    body:has (> ._body_64vtn_24) {
      background: red;
    }

    #autoIframe>.Jiframe {
      width: 50px !important;
    }

    .custHead {
      padding: 5px 0;
      font-weight: bold !important;
      text-align: center;
    }

    .loader {
      width: 100%;
      height: 100%;
      display: none;
      background: black;
      position: absolute;
      z-index: 9;
      top: 0;
      left: 0;

    }

    .loader::after,
    .loader::before {
      content: '';
      box-sizing: border-box;
      width: 48px;
      height: 48px;
      border-radius: 50%;
      border: 2px solid #FFF;
      position: absolute;
      left: 50%;
      top: 50%;
      animation: animloader 2s linear infinite;
    }

    .loader::after {
      animation-delay: 1s;
    }

    @keyframes animloader {
      0% {
        transform: scale(0);
        opacity: 1;
      }

      100% {
        transform: scale(1);
        opacity: 0;
      }
    }

    ._modalContainer_1qtdd_1 ._selectTrigger_1qtdd_37 {
      width: 95% !important;
    }

    ._modalContainer_1qtdd_1 ._closeButton_1qtdd_54 {
      top: 10px !important;
      right: 10px !important;
    }
  </style>
  <div class="tab-wrap-max">
    <div class="dash-cont-table">
      <script type="module" crossorigin src="<?php echo e(asset('design/')); ?>/assets/index.js?t=<?= time() ?>"></script>
      <link rel="stylesheet" href="<?php echo e(asset('design/')); ?>/assets/index.css?t=<?= time() ?>">
      <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
      <script src="<?php echo e(asset('website')); ?>/js/bootstrap.min.js" type="text/javascript"></script>

      <style>
        #autoIframe .Jiframe {
          width: 50px !important;
        }

        ._sidebarLogo_g4jvl_20 {
          display: none;
        }

        ._navBarDropDownContainer_g4jvl_301 {
          position: absolute;
          top: 14px;
        }
      </style>
      <span class="loader"></span>

      <div id="root" user_id="<?php echo e(auth()->user()->id); ?>"></div>

      <div class="sections" style="display: none;">
        <select name="lists[]" id="list" class="select2" multiple="multiple">
          <option value="">Select List</option>
          <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($list->id); ?>">
              <?php echo e($list->name); ?>

            </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
        </select>
        <select name="tags[]" id="tags" class="select2" multiple="multiple">
          <option value="">Select Tag</option>
          <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($tag->id); ?>">
              <?php echo e($tag->name); ?>

            </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <select id="e_sender">
          <?php $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($item->email); ?>">
              <?php echo e($item->email); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <select id="delayTime">
          <option value="Minutes">Minutes</option>
          <option value="Hours">Hours</option>
          <option value="Days">Days</option>
        </select>
      </div>
      <div class="modal fade modal-create-campaign" style="display:none;" id="createModal" tabindex="-1"
        aria-labelledby="createModalLabel" aria-hidden="true">
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
      <div class="modal fade modal-create-campaign" style="display:none;" id="createModal_B" tabindex="-1"
        aria-labelledby="createModalLabel" aria-hidden="true">
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
      <div class="modal fade" style="display:none;" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1100px">
          <div class="modal-content dashboard-cont-wrap">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="head-steps-wrap bg-transparent position-absolute" style="width:100%">
                <div class="row">
                  <div class="col-12 text-center">
                    <ul>
                      <li class="active">
                        <a href="javascript:void;" id="templ_id" onclick=showTemplate()>Template</a>
                        <img src="/website/images/next-step.svg" alt="next" />
                      </li>
                      <li>
                        <a href="javascript:void;" onclick="showDesign()">Design</a>
                      </li>
                      <li class="pull-right">
                        <a href="javascript:;" class="btn btn-secondary text-white" data-bs-dismiss="modal"
                          aria-label="Close">Close</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- top bar -->
              <!-- template -->
              <div class="cont-tabs-inner">
                <div class="templates-wrap">
                  <div class="row">
                    <div class="col-12">
                      <h5 class="modal-title text-start" id="emailModalLabel">
                        Choose Email
                        Template
                      </h5>
                    </div>
                  </div>
                  <div class="row">
                    <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-lg-3">
                        <div class="template-box m-2" style="background-image: url(<?php echo e($template->image); ?>">
                          <div class="template-btns d-block">
                            <a href="javascript:;" data-id="<?php echo e($template->id); ?>"
                              class="btn btn-prim bg-white w-100 mb-2 temp-anch">Use
                              Template</a>
                            <a class="btn btn-prim bg-white w-100 previewMod" data-bs-toggle="modal"
                              data-bs-target="#preModal" id="" data-id="<?php echo e($template->id); ?>">Preview</a>
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

  </div>

  <script>
    $(document).on('keyup', '._field_1qtdd_30', function() {
      localStorage.setItem("automation_name", $(this).val());
    });
    $(document).on('change', '._selectTrigger_1qtdd_37', function() {
      localStorage.setItem("trigger_type", $(this).val());

    })
    $(window).on('load', function() {
      setTimeout(() => {

        $('img').each(function() {
          var srcc = $(this).attr('src');
          if (srcc.indexOf('profile.svg') != -1 && srcc.indexOf('app.goharpoon.co') != -1) {
            srcc = srcc.replace('profile.svg', 'automation.png');
          }
          var mod_src = srcc.replace('https://app.goharpoon.co', '<?php echo e(url('')); ?>', );
          $(this).attr('src', mod_src)
        });

      }, 500);
      <?php
      if ($automations) {
          foreach ($automations as $key => $value) {
            ?>
      $('.sent_<?= $key ?>').html("<?php echo e($value['sent']); ?>");
      $('.opened_<?= $key ?>').html("<?php echo e($value['opened']); ?>");
      $('.clicked_<?= $key ?>').html("<?php echo e($value['clicked']); ?>");
      <?php
          }
      }
      ?>
    });
    $(document).on('click', '._createButton_1qtdd_44, ._dropdownOption_gdi3l_223',
      function(e) {
        if ($('._field_1qtdd_30').val() == '' || $('._selectTrigger_1qtdd_37').val() == '') {
          e.preventDefault();
          return false;
        }
        if ($(this).hasClass('_createButton_1qtdd_44')) {
          $.ajax({
            url: "<?php echo e(route('automation.store.post')); ?>",
            type: "post",
            data: {
              'automation_name': localStorage.getItem('automation_name'),
              'trigger_type': localStorage.getItem('trigger_type')
            },
            dataType: "JSON",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
              if (response.msg == 'success') {
                $('body').attr('automation_id', response.automation.id);
                if (response.automation.trigger_type == 'assignList') {
                  $('#triggerType option:eq(0)').attr('selected', 'selected');
                  $('#trigger').html($('#list')[0].outerHTML);
                }

                if (response.automation.trigger_type == 'assignTag') {
                  $('#triggerType option:eq(1)').attr('selected', 'selected');
                  $('#trigger').html($('#tags')[0].outerHTML);
                }
                $('._navBarDropDownContainer_g4jvl_301 label').html(response.automation.name);
              } else {
                // toastr.error('Failed', response.data.error);
              }
            },
            error: function(error) {
              console.log(error);
            }
          });
        } else if ($(this).hasClass('duplicate_automation')) {
          var raw_automation_id = ($(this).closest('.dropdownDD').attr('class').match(/auto_[\w-]*/g) || []).join(' ')
          var automation_id = raw_automation_id.match(/[\d\.]+/g);
          Swal.fire({
            title: 'Are you sure?',
            text: "This automation will be duplicated!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, duplicate!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "<?php echo e(url('/sites/campaigns/automation/replicate')); ?>" + automation_id[0];
            }
          })
        } else if ($(this).hasClass('activate_automation')) {
          console.log('here wer');
          var raw_automation_id = ($(this).closest('.dropdownDD').attr('class').match(/auto_[\w-]*/g) || []).join(' ')
          var auto_id = raw_automation_id.match(/[\d\.]+/g);
          $.ajax({
            url: "<?php echo e(route('activate.automation')); ?>",
            type: "post",
            data: {
              automation_id: auto_id[0]
            },
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
              Swal.fire('Record activated successfully')
            },
            error: function(error) {
              console.log(error);
            }

          });
          return false;
        } else {
          var automation_name = $(this).closest('._card_gdi3l_104').find('._cardTitle_gdi3l_138').html();
          $('._navBarDropDownContainer_g4jvl_301 label').html(automation_name);
          var raw_automation_id = ($(this).closest('.dropdownDD').attr('class').match(/auto_[\w-]*/g) || []).join(' ')
          var automation_id = raw_automation_id.match(/[\d\.]+/g);
          $('body').attr('automation_id', automation_id[0]);
          $('.react-flow__node').each(function(index, className) {
            var that = this;
            if (!$(this).hasClass('react-flow__node-end')) {
              (function(that, i) {
                setTimeout(() => {
                  $(that).click();
                }, 1500 * index);
              })(this, index);

            }
          });
        }
        setTimeout(() => {
          $('.dashboard-cont-wrap').addClass('m-0');
          $('.sidebar-wrap.h-100').addClass('d-none');
          $('.dashboard-cont-wrap').css({
            'width': '100vw !important',
            'max-width': '97vw',
          });
          $('.drp-wrap').hide();
        }, 250);
        $('#mainStyle').attr("disabled", "disabled");
        $('#bootstrapStyle').attr("disabled", "disabled");
        $(
          '.cont-sidebar').hide();
        $('.dash-cont-table').css('height', '100vh');
        window.history.replaceState(null, null,
          '<?php echo e(url('/sites/campaigns/automations')); ?>');

      });
    $(document).on('click', '._option_12zhm_38', function() {
      $('#createModal').hide();
      $('#createModal_B').hide();

      if ($(this).hasClass('automation_modal')) {
        window.history.replaceState(null, null, '<?php echo e(url('/sites/campaigns/automations')); ?>');
      }
      if ($(this).hasClass('landing_modal')) {
        $('#createModal').modal('show');
        $('#createModal').show();
      }
      if ($(this).hasClass('broadcast_modal')) {
        $('#createModal_B').modal('show');
        $('#createModal_B').show();
      }
    })

    $(document).on('change', '#triggerType', function() {
      var curVal = $(this).val();
      if (curVal == 'Tag Assigned') {
        $('#trigger').html($('#tags')[0].outerHTML);
      }
      if (curVal == 'List Assigned') {
        $('#trigger').html($('#list')[0].outerHTML);
      }
    });
    // if ("" == 'list') {
    //   $('#triggerType option:eq(0)').attr('selected', 'selected')
    //   $('#trigger').html($('#list')[0].outerHTML);
    // }

    // if ("" == 'tag') {
    //   $('#triggerType option:eq(1)').attr('selected', 'selected')
    //   $('#trigger').html($('#tags')[0].outerHTML);
    // }



    $(document).on('click', '.temp-anch', function(e) {
      var t_id = $(this).data('id');
      var e_id = $(this).attr('data-email-id');
      $('.head-steps-wrap').find('li').removeClass('active');
      $('.head-steps-wrap').find('li:nth-child(2)').addClass('active');
      e.preventDefault();
      var automation_id = $('body').attr('automation_id');

      $.ajax({
        url: "<?php echo e(route('template.getTemplate.post')); ?>",
        type: "post",
        data: {
          'id': t_id,
          'a_id': automation_id,
          'e_id': e_id,
          'auto': '1'
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

          $('.head-steps-wrap.bg-transparent.position-absolute').css('width',
            'calc(100% - 100px)');
        },
        error: function(error) {
          toastr.error(error);
        }
      });
    });

    var myModalEl = document.getElementById('emailModal')
    myModalEl.addEventListener('hide.bs.modal', function(event) {
      $('#mainStyle').attr("disabled", 'disabled');
      $('#bootstrapStyle').attr("disabled", 'disabled');
    })
    $(document).on('click', ".previewMod", (function(e) {
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

    function showTemplate() {

      $('.head-steps-wrap').find('li').removeClass('active');
      $('.head-steps-wrap').find('li:nth-child(1)').addClass('active');
      $('.unlayer-block').hide();
      $('.cont-tabs-inner').show();

      $('#emailModal').find('.modal-dialog').removeClass('modal-lg');
      $('#emailModal').find('.modal-content').addClass('dashboard-cont-wrap');
    }

    function showDesign() {
      $('.head-steps-wrap').find('li').removeClass('active');
      $('.head-steps-wrap').find('li:nth-child(2)').addClass('active');
      $('.unlayer-block').show();
      $('.cont-tabs-inner').hide();
      $('#emailModal').find('.modal-dialog').addClass('modal-lg');
      $('#emailModal').find('.modal-content').removeClass('dashboard-cont-wrap');
    }


    $(document).on('click', '._sidebarConfigEmailButton_g4jvl_176', function(event) {

      $('#mainStyle').removeAttr("disabled");
      $('#bootstrapStyle').removeAttr("disabled");
      if ($(this).hasClass('_sidebarConfigEmailButton_g4jvl_176')) {
        $('.loader').show();
        $('#root').hide();
        $('#emailModal').show();
        $('#emailModal').modal('show');
        setTimeout(() => {
          $('.loader').hide();
          $('#root').show();
          $('#emailModal').find('.btn-prim-trans').closest('li').css('float', 'right');
        }, 3000);
      }

      var automation_id = $('body').attr('automation_id');

      // var email_id = $('#send_email_form').find('.delete-btn').attr('data-id');
      var divID = ($('.react-flow__node-email.selected').attr('class').match(
        /divNav_[\w-]*/g) || []).join(' ');
      var url = "<?php echo url('saved_automations/' . auth()->user()->id . '/'); ?>" + '/' + automation_id + '/' +
        divID + '/index.json';

      var sender_name = $('#sender_name').val();
      var sender_email = $('#sender_email').val();
      var subject_line = $('#subject_line').val();
      var preheader_text = $('#preheader_text').val();
      // if (sender_name && sender_email && subject_line && preheader_text) {
      $.ajax({
        url: "<?php echo e(route('automation.send_email.post')); ?>",
        type: "post",
        data: {
          'automation_id': automation_id,
          'id': divID,
          'sender_name': sender_name,
          'sender_email': sender_email,
          'subject_line': subject_line,
          'preheader_text': preheader_text
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function(response) {
          if (response.status == 200) {
            // toastr.success('success', response.data.message);
          } else {
            // toastr.error('Failed', response.data.error);
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
      // }
      $.get(url).done(function() {
        // var email_id = $('#send_email_form').find('.delete-btn').attr('data-id');
        var automation_id = $('body').attr('automation_id');
        showDesign();
        $.ajax({
          url: "<?php echo e(route('template.getTemplate.post')); ?>",
          type: "post",
          data: {
            'id': 0,
            'a_id': automation_id,
            'e_id': divID,
          },
          dataType: "JSON",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
            $('iframe').contents().find(".dashboard-cont-wrap.dashboard-tabs-wrap").css("width", "5px")

            $('.unlayer-block').show();
            $('.cont-tabs-inner').hide();
            $('#emailModal').find('.modal-dialog').addClass('modal-lg');
            $('#emailModal').find('.modal-content').removeClass(
              'dashboard-cont-wrap');
            $('.unlayer-block').html(response.url);
          },
          error: function(error) {
            // toastr.error(error);
          }

        });
      }).fail(function() {
        showTemplate();

        $('.temp-anch').attr('data-email-id', divID);
        $('iframe').attr('src', function(i, val) {
          return val;
        });
      });
    });
    $(document).on('click', '.addingNode', function(event) {
      setTimeout(() => {
        // $('.react-flow__node:nth-last-child(2)').css('background', 'red');
        var sc = $('.react-flow__viewport').css('transform');
        // alert(sc);
        // $('.react-flow__viewport').css('transform', 'scale(1)');
      }, 1000);

    });
    $(document).on('click', 'button', function(event) {
      if ($(this).html() == 'Close') {
        window.location.href = "<?php echo e(url('sites/campaigns/automations')); ?>";
      }
      // if ($(this).html() == 'Save') {
      //     alert('Under Developement');
      // }
      if ($(this).html() == 'Create Tag') {
        $('#createTagModal').show();
        //     $('body').append(`
      // <link rel="stylesheet" id="styleCss" href="<?php echo e(asset('design')); ?>/css/style.css?t=<?= time() ?>">
      // <link rel="stylesheet" id="bootstrapCss" href="<?php echo e(asset('website')); ?>/css/bootstrap.min.css">
      // `);
        $('#createTagModal').modal('show');
      }
      if ($(this).html() == 'Create List') {
        //     $('body').append(`
      // <link rel="stylesheet" id="styleCss" href="<?php echo e(asset('design')); ?>/css/style.css?t=<?= time() ?>">
      // <link rel="stylesheet" id="bootstrapCss" href="<?php echo e(asset('website')); ?>/css/bootstrap.min.css">
      // `);
        $('#createListModal').show();
        $('#createListModal').modal('show');
      }

    });


    $(document).on('click', '.react-flow__node', function(event) {
      var automation_id = $('body').attr('automation_id');

      $('.react-flow__node').removeClass(function(index, className) {
        return (className.match(/(^|\s)divNav_\S+/g) || []).join(' ');
      });
      if ($(this).hasClass('react-flow__node-split')) {

        $('.react-flow__node-split').each(function(index, className) {
          var spl_class = 'splitIndex_' + $('.react-flow__node-split').index(this);
          $(this).addClass(spl_class);
          $('.' + spl_class).closest('.react-flow__node').nextUntil('.react-flow__node-split',
            '.react-flow__node-end').addClass(
            spl_class);
        });
        var spIndex = ($(this).closest('.react-flow__node').attr('class').match(/splitIndex_[\w-]*/g) || []).join(
          ' ');
        console.log(spIndex);
        if (spIndex != '' && typeof spIndex !== 'undefined') {
          console.log($(this).closest('.react-flow__node').css('transform'));
        }
      }
      $('.react-flow__node').each(function(index, className) {
        $(this).addClass('divNav_' + $('.react-flow__node').index(this));
      });
      var section_id = ($(this).attr('class').match(/divNav_[\w-]*/g) || []).join(' ');
      // var prevC = ($('.mainSection').attr('class').match(/divNav_[\w-]*/g) || [])
      //   .join(' ');
      // $('.mainSection').removeClass(prevC);
      // $('.mainSection').addClass(section_id);
      $('.react-flow__node').find('*').removeAttr('style');
      $(this).find('*')
        .css({
          'background': '#354f52',
          'color': 'white'
        });
      $(this).find('img').css({
        'background': '',
        'filter': "brightness(0) invert(1)"
      });
      var section_name = '';

      if ($(this).hasClass('react-flow__node-assignList')) {
        setTimeout(() => {
          $('#selectList').html($('#list')[0].outerHTML);
          $('#selectList').siblings('button').html('Create List');

        }, 500);
        section_name = 'list-tab';

      }
      if ($(this).hasClass('react-flow__node-assignTag')) {
        setTimeout(() => {
          $('#selectTag').html($('#tags')[0].outerHTML);
          $('#selectTag').siblings('button').html('Create Tag');

        }, 500);
        section_name = 'tag-tab';

      }
      if ($(this).hasClass('react-flow__node-addADelay')) {
        setTimeout(() => {
          $('#selectDelay').closest('div').css({
            'position': 'relative',
          });
          $('#selectDelay').css({
            'position': 'absolute',
            'right': '0',
            'width': '70px'
          });
          // $('#selectDelay').html($('#delayTime').html());

        }, 250);
        section_name = 'delay-tab';

      }

      if ($(this).hasClass('react-flow__node-trigger')) {
        section_name = 'trigger-tab';
      }
      if ($(this).hasClass('react-flow__node-email')) {
        section_name = 'email-tab';
        // $('#sender_email').html($('#e_sender').html());
      }
      // if ($(this).hasClass('react-flow__node-split')) {
      //   section_name = 'split-tab';
      //   $('.react-flow__node-split').each(function(index, className) {
      //     var spl_class = 'splitIndex_' + $('.react-flow__node-split').index(this);
      //     $(this).addClass(spl_class);
      //     $('.' + spl_class).closest('.react-flow__node').nextUntil('.react-flow__node-split').addClass(
      //       spl_class);
      //   });
      // }
      var AjaxUrl = "<?php echo e(route('get.section_data', ':id')); ?>";
      AjaxUrl = AjaxUrl.replace(':id', automation_id);

      $.ajax({
        url: AjaxUrl,
        type: "post",
        data: {
          section_name: section_name,
          section_id: section_id
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          if (response.status == 200) {
            // console.log(section_id);
            if (section_name == 'trigger-tab') {
              if (response.rec.trigger_type == 'List Assigned' || response.rec.trigger_type == 'assignList' ||
                response.rec.trigger_type == 'list') {
                setTimeout(() => {

                  $('#triggerType option:selected').prop('selected', false);
                  $('#trigger option:selected').prop('selected', false);
                  $('#trigger').html($('#list')[0].outerHTML);
                  $('#triggerType option[value="List Assigned"]').prop('selected', true);
                  $('#trigger option[value="' + response.rec.trigger + '"]').prop('selected', true);
                  $('.' + section_id).find('.headerContainerTitleSubtitleContainer > h2 ').html(
                    response.rec.trigger_type + '<br>' + response.rec.trigger);
                }, 500);
              }
              if (response.rec.trigger_type == 'Tag Assigned' || response.rec.trigger_type == 'assignTag' ||
                response.rec.trigger_type == 'tag') {
                setTimeout(() => {

                  $('#triggerType option:selected').prop('selected', false);
                  $('#trigger option:selected').prop('selected', false);
                  $('#trigger').html($('#tags')[0].outerHTML);
                  $('#triggerType option[value="Tag Assigned"]').prop('selected', true);
                  $('#trigger option[value="' + response.rec.trigger + '"]').prop('selected', true);
                  $('.' + section_id).find('.headerContainerTitleSubtitleContainer > h2 ').html(
                    response.rec.trigger_type + '<br>' + response.rec.trigger);

                }, 500);

              }
            }
            if (section_name == 'email-tab') {
              setTimeout(() => {
                $('#sender_email option:selected').prop('selected', false);

                $("#sender_name").val(response.rec.sender_name);
                // $('#sender_email').replaceWith($('#e_sender')[0].outerHTML);
                // $('#e_sender').attr('id', 'sender_email').addClass(
                //   '_sidebarConfigEmailFieldInput_g4jvl_169')
                $('#sender_email option[value="' + response.rec.sender_email + '"]').prop('selected',
                  true);
                $("#subject_line").val(response.rec.subject_line);
                $("#preheader_text").val(response.rec.header_text);
              }, 500);

            }
            if (section_name == 'delay-tab') {
              setTimeout(() => {
                $('#selectDelay').prop('selected', false);
                var Duration = '';
                if (response.rec.delay_time_type == '1') {
                  Duration = 'Minutes';
                }
                if (response.rec.delay_time_type == '2') {
                  Duration = 'Hours';
                }
                if (response.rec.delay_time_type == '3') {
                  Duration = 'Days';

                }
                $("._sidebarConfigAddADelayInput_g4jvl_137").val(response.rec.delay_time);
                $('#selectDelay option[value=' + Duration + ']').prop('selected', true);
                var delay_time = $('._sidebarConfigAddADelayInput_g4jvl_137').val();
                var delay_time_type = $('#selectDelay').find('option:selected').html();

                var Shtml = delay_time + ' ' + delay_time_type;

                $('.' + section_id).find('.headerContainerTitleSubtitleContainer').find('.custHead')
                  .remove();
                $('.' + section_id).find('.headerContainerTitleSubtitleContainer').append(
                  '<h1 class="custHead">' + Shtml + '</h1>');
              }, 500);
            }

            if (section_name == 'list-tab') {
              setTimeout(() => {

                $('#selectList option:selected').prop('selected',
                  false);
                $('#selectList option[value="' + response.rec
                  .attached_id +
                  '"]').prop("selected", true);
                var html = $('#selectList').find('option:selected').html();
                $('.' + section_id).find('.headerContainerTitleSubtitleContainer').find('.custHead')
                  .remove();
                $('.' + section_id).find('.headerContainerTitleSubtitleContainer').append(
                  '<h1 class="custHead">' + html + '</h1>');
              }, 500);

            }
            if (section_name == 'tag-tab') {
              setTimeout(() => {
                $('#selectTag option:selected').prop('selected',
                  false);

                $('#selectTag option[value="' + response.rec
                  .attached_id +
                  '"]').prop("selected", true);
                var html = $('#selectTag').find('option:selected').html();
                $('.' + section_id).find('.headerContainerTitleSubtitleContainer').find('.custHead')
                  .remove();
                $('.' + section_id).find('.headerContainerTitleSubtitleContainer').append(
                  '<h1 class="custHead">' + html + '</h1>');

              }, 500);

            }
            if (section_name == 'split-tab') {
              setTimeout(() => {
                $('[name=based_on]').prop('selected', false);
                $('[name=email_activity]').prop('selected', false);
                $('[name=email_type]').prop('selected', false);
                $('[name=exact_count_condition]').prop('selected', false);
                $('[name=occurance_condition]').prop('selected', false);

                $("[data-id=" + section_id + "]").closest('form').find(
                  '[name=based_on] option[value="' + response.rec
                  .based_on +
                  '"]').prop("selected", true);
                $("[data-id=" + section_id + "]").closest('form').find(
                  '[name=email_activity] option[value="' + response.rec
                  .email_activity +
                  '"]').prop("selected", true);
                $("[data-id=" + section_id + "]").closest('form').find(
                  '[name=email_type] option[value="' + response.rec
                  .email_activity +
                  '"]').prop("selected", true);
                $("[data-id=" + section_id + "]").closest('form').find(
                  '[name=exact_count_condition] option[value="' + response
                  .rec.exact_count_condition +
                  '"]').prop("selected", true);
                $("[data-id=" + section_id + "]").closest('form').find(
                  '[name=count]').val(response.rec.count);
                $("[data-id=" + section_id + "]").closest('form').find(
                  '[name=occurance_condition] option[value="' + response.rec.occurance_condition +
                  '"]').prop("selected", true);
              }, 1000);

            }
          } else {

            $('select').prop('selectedIndex', 0);
            $('input').val('');
          }
          if (section_name == 'delay-tab') {
            $('#selectDelay option:lt(-3)').remove()
          }
          if (section_name == 'email-tab') {
            $('#sender_email').html($('#e_sender')[0].outerHTML);
            $('#sender_email').removeAttr('style')
          }
        },
        error: function(error) {
          // toastr.error('error', error);
        }
      });

      // return false;
    });

    $(document).on('change', '#selectList, #selectTag', function() {
      var html = $(this).find('option:selected').html();
      var section_class = ($('.react-flow__node.selected').attr('class').match(
        /divNav_[\w-]*/g) || []).join(
        ' ');
      $('.' + section_class).find('.headerContainerTitleSubtitleContainer').find('.custHead')
        .remove();
      $('.' + section_class).find('.headerContainerTitleSubtitleContainer').append(
        '<h1 class="custHead">' + html + '</h1>');
    });
    $(document).on('change', '#triggerType', function() {
      var curVal = $(this).val();
      if (curVal == 'tag') {
        $('#trigger').html($('#tags')[0].outerHTML);
      }
      if (curVal == 'list') {
        $('#trigger').html($('#list')[0].outerHTML);
      }
    });
    $("#tag_f").on('submit', (function(e) {
      e.preventDefault();

      $.ajax({
        url: "<?php echo e(route('tags.index')); ?>",
        type: "post",
        data: new FormData(this),
        dataType: "JSON",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
          if (response.response.status == '200') {
            toastr.success(response.response.data.message);
          } else {
            toastr.error(response.response.data.error);
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    }));
    $("#list_f").on('submit', (function(e) {
      e.preventDefault();

      $.ajax({
        url: "<?php echo e(route('lists.index')); ?>",
        type: "post",
        data: new FormData(this),
        dataType: "JSON",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
          if (response.response.status == '200') {
            toastr.success(response.response.data.message);
            setTimeout(() => {
              location.reload();
            }, 2000);
          } else {
            toastr.error(response.response.data.error);
          }
        },
        error: function(error) {
          console.log(error);
        }
      });

    }));
    $(document).on('keyup', '._sidebarConfigAddADelayInput_g4jvl_137', function() {
      var delay_time = $('._sidebarConfigAddADelayInput_g4jvl_137').val();
      var delay_time_type = $('#selectDelay').find('option:selected').html();

      var Shtml = delay_time + ' ' + delay_time_type;

      var divID = ($('.react-flow__node.selected').attr('class').match(/divNav_[\w-]*/g) || []).join(' ');
      $('.' + divID).find('.headerContainerTitleSubtitleContainer').find('.custHead')
        .remove();
      $('.' + divID).find('.headerContainerTitleSubtitleContainer').append(
        '<h1 class="custHead">' + Shtml + '</h1>');
      var automation_id = $('body').attr('automation_id');

      $.ajax({
        url: "<?php echo e(route('automation.delay_add.post')); ?>",
        type: "post",
        data: {
          'delay_time': delay_time,
          'delay_time_type': delay_time_type,
          'automation_id': automation_id,
          'id': divID
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function(response) {
          if (response.status == 200) {
            // toastr.success('success', response.data.message);
          } else {
            // toastr.error('Failed', response.data.error);
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    });
    $(document).on('change', '#selectDelay', function() {
      var delay_time = $('._sidebarConfigAddADelayInput_g4jvl_137').val();
      var delay_time_type = $('#selectDelay').find('option:selected').html();

      var Shtml = delay_time + ' ' + delay_time_type;
      var section_class = ($('.react-flow__node.selected').attr('class').match(
        /divNav_[\w-]*/g) || []).join(
        ' ');
      $('.' + section_class).find('.headerContainerTitleSubtitleContainer').find('.custHead')
        .remove();
      $('.' + section_class).find('.headerContainerTitleSubtitleContainer').append(
        '<h1 class="custHead">' + Shtml + '</h1>');
      var divID = ($('.react-flow__node.selected').attr('class').match(/divNav_[\w-]*/g) || []).join(' ');
      var automation_id = $('body').attr('automation_id');

      $.ajax({
        url: "<?php echo e(route('automation.delay_add.post')); ?>",
        type: "post",
        data: {
          'delay_time': delay_time,
          'delay_time_type': delay_time_type,
          'automation_id': automation_id,
          'id': divID
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function(response) {
          if (response.status == 200) {
            // toastr.success('success', response.data.message);
          } else {
            // toastr.error('Failed', response.data.error);
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    });

    $(document).on('click', '.text-white, .btn-simple', function(e) {
      e.preventDefault();
      $('.modal').modal('hide');
    });





    // ===================
    $(document).on('change', '#trigger', (function(e) {
      var triggerType = $('#triggerType').val();
      var triggerType_name = $('#triggerType option:selected').html();
      var trigger = $(this).val();
      var trigger_name = $(this).find('option:selected').html();

      e.preventDefault();
      var automation_id = $('body').attr('automation_id');
      var divID = ($('.react-flow__node.selected').attr('class').match(/divNav_[\w-]*/g) || []).join(' ');

      $.ajax({
        url: "<?php echo e(route('automation.trigger.post')); ?>",
        type: "post",
        data: {
          'trigger': trigger,
          'trigger_type': triggerType,
          'automation_id': automation_id
        },
        dataType: "JSON",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          if (response.status == 200) {
            $('.react-flow__node.' + divID).find('.headerContainerTitleSubtitleContainer>h2').html(
              triggerType_name + '<br>' + trigger_name);
          } else {
            // toastr.error('Failed', response.data.error);
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    }));
    $(document).on('change', "#selectList", (function(e) {
      e.preventDefault();
      var divID = ($('.react-flow__node.selected').attr('class').match(
        /divNav_[\w-]*/g) || []).join(' ');
      var selectList = $(this).val();
      e.preventDefault();
      var automation_id = $('body').attr('automation_id');

      $.ajax({
        url: "<?php echo e(route('automation.list.post')); ?>",
        type: "post",
        data: {
          'id': divID,
          'selectList': selectList,
          'automation_id': automation_id
        },
        dataType: "JSON",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function(response) {
          if (response.status == 200) {
            // toastr.success('success', response.data.message);
          } else {
            // toastr.error('Failed', response.data.error);
          }
        },
        error: function(error) {
          console.log(error);
        }
      });

    }));
    // $("#selectTag").on('submit', (function(e) {
    $(document).on('change', "#selectTag", (function(e) {
      var divID = ($('.react-flow__node.selected').attr('class').match(
        /divNav_[\w-]*/g) || []).join(' ');
      var selectTag = $(this).val();
      var automation_id = $('body').attr('automation_id');

      e.preventDefault();
      $.ajax({
        url: "<?php echo e(route('automation.tag.post')); ?>",
        type: "post",
        data: {
          'id': divID,
          'selectTag': selectTag,
          'automation_id': automation_id
        },
        dataType: "JSON",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          if (response.status == 200) {
            // toastr.success('success', response.data.message);
          } else {
            // toastr.error('Failed', response.data.error);
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    }));
    $("#send_email_form").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({
        url: "<?php echo e(route('automation.send_email.post')); ?>",
        type: "post",
        data: new FormData(this),
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
          if (response.status == 200) {
            // toastr.success('success', response.data.message);
          } else {
            // toastr.error('Failed', response.data.error);
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    }));
    // $("#delay_form").on('submit', (function(e) {
    //   var divID = ($('.react-flow__node.selected').attr('class').match(/divNav_[\w-]*/g) || []).join(' ');
    //   var selectList = $(this).val();
    //   e.preventDefault();
    //   $.ajax({
    //     url: "<?php echo e(route('automation.delay_add.post')); ?>",
    //     type: "post",
    //     data: new FormData(this),
    //     headers: {
    //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },
    //     processData: false,
    //     contentType: false,
    //     cache: false,
    //     success: function(response) {
    //       if (response.status == 200) {
    //         // toastr.success('success', response.data.message);
    //       } else {
    //         // toastr.error('Failed', response.data.error);
    //       }
    //     },
    //     error: function(error) {
    //       console.log(error);
    //     }
    //   });
    // }));
    $("#split_form").on('submit', (function(e) {

      e.preventDefault();
      $.ajax({
        url: "<?php echo e(route('automation.split_add_form.post')); ?>",
        type: "post",
        data: new FormData(this),
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
          if (response.status == 200) {
            // toastr.success('success', response.data.message);
          } else {
            // toastr.error('Failed', response.data.error);
          }
        },
        error: function(error) {
          console.log(error);
        }

      });

    }));
    $(document).on('click', '._navBarButton_g4jvl_285', function(e, xhr, settings) {
      if ($(this).html() == 'Close') {
        e.preventDefault()
        window.location.href = "<?php echo e(url('sites/campaigns/automations')); ?>";
      }
      if ($(this).html() == 'Save') {
        e.preventDefault();
        var automation_id = $('body').attr('automation_id');
        var automation_name = $('._navBarDropDownContainer_g4jvl_301 label').html();

        var AjaxUrl = "<?php echo e(route('save.automation', ':id')); ?>";
        AjaxUrl = AjaxUrl.replace(':id', automation_id);
        $.ajax({
          url: AjaxUrl,
          type: "post",
          data: {
            "_token": "<?php echo e(csrf_token()); ?>",
            code: '',
            name: automation_name,
            image: '',
            category: '4',
          },

          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
            if (response.status == '200') {
              toastr.success(response.msg);

            }
            if (response.status != '200') {
              console.log(response.msg);
            }
          },
          error: function(error) {
            console.log(error.responseJSON.message);
            toastr.error('error', error.responseJSON.message);
          }
        });
      }
    })
    $(document).on('keyup', '._searchInput_gdi3l_84', function() {
      var txt = $(this).val();
      $('._card_gdi3l_104').hide();
      $('._card_gdi3l_104:contains("' + txt + '")').show();
    })
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/campaign/automation/index.blade.php ENDPATH**/ ?>