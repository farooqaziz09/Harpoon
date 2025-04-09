
<?php $__env->startSection('title', '- Landing pages'); ?>
<?php $__env->startSection('content'); ?>
  <style>
    .select2-dropdown {
      width: 100px !important;
      z-index: 111111111;
    }

    .select2-container {
      width: 100% !important;
    }

    .nameEdit:hover .fa-pencil {
      display: inline-block !important;
    }
  </style>
  <div class="tab-wrap-max">
    <div class="dash-cont-table">
      <div class="row">
        <div class="col-6">
          <h1 class="mb-0">Landing Pages</h1>
        </div>
        <div class="col-6 text-end">
          <a href="#" class="btn btn-prim btn-prim-light w-auto d-inline-block px-4 py-3" data-bs-toggle="modal"
            data-bs-target="#campaignModal">+ Create Campaign</a>
        </div>
      </div>
      <div class="campaigns-tables">
        <div class="campaigns-tables-wrap campaigns-tables-wrap-lp">
          <div class="row ">
            <div class="col-xl-12">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                    role="tab" aria-controls="all" aria-selected="true">All</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="draft-tab" type="button" role="tab" aria-controls="draft"
                    aria-selected="false">Draft</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="completed-tab" type="button" role="tab" aria-controls="completed"
                    aria-selected="false">Live</button>
                </li>
              </ul>
            </div>

          </div>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="cont-tabs-inner">

              <div class="table-responsive">
                <div class="cont-tabs-inner-border cont-tabs-inner-border-lp">
                  
                  <table class="table align-middle">
                    <thead>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                          $contacts = $campaign->contacts->count();
                          $impressions = $campaign->impressions->count();
                        ?>
                        <tr>
                          <td width=70>
                            <div class="img-wrap-list">
                              <?php if($campaign->dynamic_image): ?>
                                <img src="<?php echo e($campaign->dynamic_image); ?>" width="70">
                              <?php else: ?>
                                <img src="<?php echo e(asset('website')); ?>/images/profile.svg" alt="profile img">
                              <?php endif; ?>

                            </div>
                          </td>
                          <td>
                            <div>
                              <h3>
                                <span class="nameEdit"><a href="javascript:;" class=""><?php echo e($campaign->name); ?> </a><i
                                    class="fa fa-pencil" style="display:none"></i>
                                </span>
                                <div class="editName position-relative" style="display:none;">
                                  <form method="post">
                                    <input type="hidden" id="id" name="id" value="<?php echo e($campaign->id); ?>">
                                    <input id='name' name='name' value="<?php echo e($campaign->name); ?>" />
                                    <i style="right:-25px;top:3px;" class='save fa fa-check position-absolute'
                                      type='submit'></i>
                                    <i style="right:-40px;top:3px;" class='cancel fa fa-times position-absolute'
                                      type='reset'></i>
                                  </form>
                                </div>
                              </h3>

                            </div>
                            <p>Updated time <br><?php echo e($campaign->updated_at); ?></p>
                          </td>
                          <td>
                            <div class="type-drop dropdown-table">
                              <h4>
                                Landing Page
                              </h4>

                            </div>
                          </td>
                          <td>
                            <div class="type-drop dropdown-table">
                              <?php if($campaign->status == '0'): ?>
                                <label class="danger-label fieled-wrap">Draft</label>
                              <?php elseif($campaign->status == '1'): ?>
                                <label class="success-label fieled-wrap">Live</label>
                              <?php elseif($campaign->status == '2'): ?>
                                <label class="success-label fieled-wrap">Completed</label>
                              <?php elseif($campaign->status == '3'): ?>
                                <label class="pending-label fieled-wrap">Archived</label>
                              <?php elseif($campaign->status == '4'): ?>
                                <label class="danger-label fieled-wrap">Inactive</label>
                              <?php endif; ?>
                            </div>
                          </td>
                          <td>
                            <h3><?php echo e($contacts); ?></h3>
                            <p>Contacts </p>
                          </td>
                          <td>
                            <h3><?php echo e($impressions); ?>

                            </h3>
                            <p>Impressions </p>
                          </td>

                          <td>
                            <h3>
                              <?php echo e($impressions != '0' ? round(($contacts / $impressions) * 100, 2) : '0'); ?>%
                            </h3>
                            <p>Conversion rate</p>
                          </td>
                          <td class="action-last-td">
                            <span class="text-center dots-wrap" id="dropdownActions" data-bs-toggle="dropdown"
                              aria-expanded="false">

                              <span class="dots"></span>
                            </span>
                            <ul class="dropdown-menu action-menu" aria-labelledby="dropdownActions">

                              <li class="dropdown-item">
                                <div class="flex items-center">
                                  <a class="copy_text" href="javascript:;" data-url="<?php echo e($campaign->page_url); ?>">
                                    <i class="fa fa-files-o" aria-hidden="true"></i>
                                    <span class="text-sm w-full overflow-hidden">Copy
                                      URL</span>
                                  </a>
                                </div>
                              </li>
                              <li class="dropdown-item">
                                <div class="flex items-center">
                                  <a href="<?php echo e(url('sites/campaign/edit/' . $campaign->id)); ?>"><i class="fa fa-pencil"
                                      aria-hidden="true"></i>

                                    <span class="text-sm w-full overflow-hidden">Edit</span>
                                  </a>
                                </div>
                              </li>
                              <li class="dropdown-item">
                                <div class="flex items-center">
                                  <a href="javascript:;" class="replicate_rec" data-id="<?php echo e($campaign->id); ?>"><i
                                      class="fa fa-clipboard" aria-hidden="true"></i>
                                    <span class="text-sm w-full overflow-hidden">Duplicate</span>
                                  </a>
                                </div>
                              </li>
                              <li class="dropdown-item">
                                <div class="flex items-center">
                                  <a class="delete_rec" href="javascript:;" data-id="<?php echo e($campaign->id); ?>">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    <span class="text-sm w-full overflow-hidden">Delete</span>
                                  </a>
                                </div>
                              </li>
                              <li class="dropdown-item">
                                <div class="flex items-center">
                                  <a href="javascript:;" class="publish_btn" data-id="<?php echo e($campaign->id); ?>"
                                    data-status="<?php echo e($campaign->status); ?>"><i class="fa fa-play"
                                      aria-hidden="true"></i>
                                    <span
                                      class="text-sm w-full overflow-hidden"><?php echo e($campaign->status == '1' ? 'Deactivate' : ($campaign->status == '0' ? 'Activate' : '')); ?></span>
                                  </a>
                                </div>
                              </li>
                            </ul>
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                    <tfoot>
                      <th colspan="8">
                        <div class="text-center">
                          <a class="load-more-btn" id="load-more">Load More</a>
                        </div>
                      </th>
                    </tfoot>
                  </table>
                </div>


              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="live" role="tabpanel" aria-labelledby="live-tab">
            <div class="cont-tabs-inner">
              <h2>Live</h2>
            </div>
          </div>
          <div class="tab-pane fade" id="draft" role="tabpanel" aria-labelledby="draft-tab">
            <div class="cont-tabs-inner">
              <h2>Draft</h2>
            </div>
          </div>
          <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
            <div class="cont-tabs-inner">
              <h2>Completed</h2>
            </div>
          </div>
          <div class="tab-pane fade" id="archived" role="tabpanel" aria-labelledby="archived-tab">
            <div class="cont-tabs-inner">
              <h2>Archived</h2>
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

          <!-- campaignModal -->
          <div class="modal fade modal-campaign" id="campaignModal" tabindex="-1"
            aria-labelledby="campaignModalLabel" aria-hidden="true">
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
                            data-bs-toggle="modal" data-bs-target="#createModal" data-bs-dismiss="modal"
                            aria-label="Close">
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
                            data-bs-toggle="modal" data-bs-target="#createModal_B" data-bs-dismiss="modal"
                            aria-label="Close">
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
        <!-- campaignModal -->


        <!-- createModal -->
        <div class="modal fade modal-create-campaign" id="createModal" tabindex="-1"
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
        <!-- createModal -->
        <div class="modal fade modal-create-campaign" id="createModal_B" tabindex="-1"
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
        <!-- createModal -->
        <div class="modal fade modal-create-campaign" id="createDripsModal" tabindex="-1"
          aria-labelledby="createDripsModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="createDripsModal">
                  <div class="creat-title-img-wrap"><img src="<?php echo e(asset('website')); ?>/images/forms.svg" alt="forms">
                  </div> Create Drip
                  Campaigns
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img
                    src="<?php echo e(asset('website')); ?>/images/close.svg" alt="close"></button>
              </div>
              <div class="modal-body">
                <div class="create-form">
                  <form action="">
                    <input type="text" placeholder="Enter name for your campaign">
                    <div class="select-wrap">
                      <select name="" id="">
                        <option value="">Select List</option>
                        <option value="1">option 1</option>
                        <option value="2">option 2</option>
                        <option value="3">option 3</option>
                      </select>
                    </div>
                    <input type="submit" value="Cancel" class="btn btn-prim btn-prim-light" data-bs-dismiss="modal"
                      aria-label="Close">
                    <input type="submit" value="Create Campaign" class="btn btn-prim">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- createModal -->
        <!-- create drip Modal -->
        <div class="modal fade modal-create-campaign" id="createDripModal" tabindex="-1"
          aria-labelledby="createDripModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="createDripModal">
                  <div class="creat-title-img-wrap"><img src="<?php echo e(asset('website')); ?>/images/forms.svg" alt="forms">
                  </div> Create new form &
                  popup
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img
                    src="<?php echo e(asset('website')); ?>/images/close.svg" alt="close"></button>
              </div>
              <div class="modal-body">
                <div class="create-form">
                  <form action="">
                    <div class="form-content">
                      <label for="">Drip Campaigns are a premium feature. Please upgrade
                        your account.</label>
                    </div>
                    <input type="submit" value="Cancel" class="btn btn-prim btn-prim-light" data-bs-dismiss="modal"
                      aria-label="Close">
                    <input type="submit" value="Upgrade" class="btn btn-prim">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- create drip Modal -->

      </div>
    </div>
    </div>
  </section>

  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script>
    $('#DataTables_Table_0').on('click', '.copy_text', function(e) {
      e.preventDefault();
      var copyText = $(this).data('url');

      document.addEventListener('copy', function(e) {
        e.clipboardData.setData('text/plain', copyText);
        e.preventDefault();
      }, true);

      document.execCommand('copy');
      console.log('copied text : ', copyText);
      toastr.success('URL Copied!');
    });
    $('#DataTables_Table_0').on('click', '.replicate_rec', function() {

      Swal.fire({
        title: 'Are you sure?',
        text: "This campaign will be duplicated!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, duplicate!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "<?php echo e(url('sites/campaign/replicate/')); ?>/" + $(this).attr(
            'data-id');
        }

      });
    });

    $('#DataTables_Table_0').on('click', '.delete_rec', function() {

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                'content')
            }
          });
          $.ajax({
            url: "campaign/delete/" + $(this).attr('data-id'),
            type: 'GET', // replaced from put
            dataType: "JSON",
            data: {
              "id": $(this).attr(
                'data-id') // method and token not needed in data
            },
            success: function(response) {
              Swal.fire(
                'Deleted!',
                'Campaign has been deleted.',
                'success'
              )
              setTimeout(() => {
                location.reload();
              }, 2000);
            },
            error: function(xhr) {
              console.log(xhr
                .responseText
              ); // this line will save you tons of hours while debugging
              // do something here because of error
            }
          });

        }
      })
      //publish == 'on'
    });
    $('#DataTables_Table_0').on('click', '.publish_btn', function() {

      Swal.fire({
        title: 'Are you sure?',
        text: "The campaign will become activated!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, make the action!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                'content')
            }
          });
          $.ajax({
            url: "<?php echo e(route('campaign.publish')); ?>",
            type: 'POST', // replaced from put
            dataType: "JSON",
            data: {
              'publish': $(this).attr('data-status'),
              "id": $(this).attr('data-id'),
            },
            success: function(response) {
              Swal.fire(
                'Action Done!',
                'Campaign has been updated.',
                'success'
              )
              setTimeout(() => {
                location.reload();
              }, 2000);
            },
            error: function(xhr) {
              console.log(xhr.responseText);
            }
          });

        }
      })
      //publish == 'on'
    });
    var table = $('#DataTables_Table_0').DataTable();
    $("#draft-tab").click(function() {
      $(".nav-item button").removeClass('active');
      $(this).addClass('active');
      table.column(3).search('Draft').draw();

    });

    $("#completed-tab").click(function() {
      $(".nav-item button").removeClass('active');
      $(this).addClass('active');
      table.column(3).search('Live').draw();
    });

    $("#all-tab").click(function() {
      $(".nav-item button").removeClass('active');
      $(this).addClass('active');
      table.column(3).search('').draw();
    });

    $('#DataTables_Table_0').on('click', '.fa-pencil', function() {
      $(this).parent().hide();
      $(this).closest('h3').find('.editName').show();
    });

    $('#DataTables_Table_0').on('click', '.cancel.fa-times', function() {
      $(this).closest('.editName').siblings('.nameEdit').show();
      $(this).closest('.editName').hide();
    });
    $('#DataTables_Table_0').on('click', '.save.fa-check', function() {
      var id = $(this).closest('.editName').find('#id').val();
      var name = $(this).closest('.editName').find('#name').val();
      var thiss = $(this);
      console.log(id);
      console.log(name);
      $.ajax({
        url: "<?php echo e(route('campaign.name.post')); ?>",
        type: 'POST',
        data: {
          "id": id,
          "name": name
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          thiss.closest('.editName').siblings('.nameEdit').show();
          thiss.closest('h3').find('a').show();
          thiss.closest('h3').find('a').html(name);
          thiss.closest('.editName').hide();
        },
        error: function(xhr) {
          console.log(xhr
            .responseText
          ); // this line will save you tons of hours while debugging
          // do something here because of error
        }
      });
    });

    $(document).ready(function() {
      $('thead').hide();

      $(window).scroll(function() {
        const scrollPosition = $(window).scrollTop();
        const campaignsTables = $('.campaigns-tables');

        if (scrollPosition > 50) {
          // toastr.success('greater than 50');
          campaignsTables.addClass('hide');
        } else {
          // alert('less than 50');
          campaignsTables.removeClass('hide');
        }
      });
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/campaign/index.blade.php ENDPATH**/ ?>