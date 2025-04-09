
<?php $__env->startSection('title', 'Contacts'); ?>
<?php $__env->startSection('content'); ?>
  <style>
    .select2-dropdown {
      width: 100px !important;
      z-index: 111111111;
    }

    .select2-container {
      width: 100% !important;
    }

    .search-box {
      position: relative;
    }

    .search-box svg {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      left: 10px;
    }

    .search-box input {
      border-radius: 5px;
      border: 1px solid #3B7580;
      padding-left: 50px;
    }

    .drop-slct .bg-secondary {
      background: transparent !important;
      color: #354F52 !important;
      top: 15px !important;
      right: -15px !important;
      left: auto !important;
    }

    .hida {
      background: red;
    }
  </style>
  <div class="tab-wrap-max main-wrap-cont contacts-table-wrap-top">
    <div class="dash-cont-table campaigns-tables">
      <div class="row">
        <div class="col-lg-4">
          <h1 class="mb-0">Contacts</h1>
        </div>
        <div class="col-lg-8 text-end dropdown">
          <a class="btn btn-simple w-auto d-inline-block my-0 mx-3 py-3" id="dropdownaudience" data-bs-toggle="dropdown"
            aria-expanded="false"><span>AUDIENCE SETTINGS</span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownaudience">
            <li><a class="dropdown-item" href="<?php echo e(route('tags.index')); ?>">Tags</a></li>
            <li><a class="dropdown-item" href="<?php echo e(route('lists.index')); ?>">Lists</a></li>
            <li><a class="dropdown-item" href="<?php echo e(route('custom-fields.index')); ?>">Custom Fields</a></li>
          </ul>
          <a class="btn btn-prim btn-prim-light w-auto d-inline-block my-0 px-5 py-3" id="dropdownNewContact"
            data-bs-toggle="dropdown" aria-expanded="false"><span>New Contact <svg
                class="absolute right-[10px] top-[50%] translate-y-[-50%]" width="20" height="20"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownNewContact">
            <li><a class="dropdown-item" href="javascript:;" data-bs-toggle="modal"
                data-bs-target="#createNewContactModal"><svg class="icon icon-tabler icon-tabler-user-plus" width="18"
                  height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                  <path d="M16 11h6m-3 -3v6"></path>
                </svg> Add New Contact</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ContactImportModal"><svg
                  class="icon icon-tabler icon-tabler-cloud-upload" width="18" height="18" viewBox="0 0 24 24"
                  stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1"></path>
                  <polyline points="9 15 12 12 15 15"></polyline>
                  <line x1="12" y1="12" x2="12" y2="21"></line>
                </svg> Import Contact</a></li>
          </ul>
        </div>
      </div>
      <div class="flash-message">
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(Session::has('alert-' . $msg)): ?>
            <p class="alert alert-<?php echo e($msg); ?>">
              <?php echo e(Session::get('alert-' . $msg)); ?>

              <button type="button" class="border-0 close bg-transparent pull-right" data-dismiss="alert"
                aria-label="Close"><span class="fa fa-times small close_sec-circle"></span>
              </button>
            </p>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
      <div class="table-responsive">
        <div class="cont-tabs-inner-border">
          <div class="head-wrap-box mx-0">
            <h4 class="breadcrumb-area"></h4>
          </div>
          <div class="table-box table-box-wrap">
            <div class="row">
              <div class="col-lg-6 filter-row-tab">
                
                <div class="selected_filter">
                </div>
                
                <a class="btn btn-filter d-inline-block" id="dropdownNewContactFilter">+ Add Filters
                </a>
                <span class="d-inline-block line-sep">|</span>
                <div class="dropdown-menu filter-dropdown" style="" id="dropdownNewContactMen">
                  <div class="row">
                    <div class="col-12">
                      <div class="search-box mx-3 py-2">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M10.7204 9.43396H10.0429L9.80274 9.2024C10.6432 8.2247 11.1492 6.9554 11.1492 5.57461C11.1492 2.49571 8.65352 0 5.57461 0C2.49571 0 0 2.49571 0 5.57461C0 8.65352 2.49571 11.1492 5.57461 11.1492C6.9554 11.1492 8.2247 10.6432 9.2024 9.80274L9.43396 10.0429V10.7204L13.7221 15L15 13.7221L10.7204 9.43396ZM5.57461 9.43396C3.43911 9.43396 1.71527 7.71012 1.71527 5.57461C1.71527 3.43911 3.43911 1.71527 5.57461 1.71527C7.71012 1.71527 9.43396 3.43911 9.43396 5.57461C9.43396 7.71012 7.71012 9.43396 5.57461 9.43396Z"
                            fill="#99B2C6" />
                        </svg>

                        <input type="search" id="keyword_search" class="w-100" placeholder="Search here ...">
                      </div>
                    </div>
                  </div>
                  <div class="row dropdown-item main-frst-row">
                    <div class="col-lg-6">
                      <h4>Campaigns</h4>
                      <a href="#" class="d-block">
                        <div class="icon-wrap">
                          <i class="fa fa-filter"></i> <span>List</span>
                        </div>
                      </a>
                      <a href="#" class="d-block">
                        <div class="icon-wrap">
                          <i class="fa fa-filter"></i> <span>Tag</span>
                        </div>
                      </a>

                      <a href="#" class="d-block">
                        <div class="icon-wrap">
                          <i class="fa fa-filter"></i> <span>Landing Page</span>
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-6">
                      <h4>Contact Engagement</h4>
                      <a href="#" class="d-none">
                        <div class="icon-wrap">
                          <i class="fa fa-filter"></i> <span>Consent Recorded</span>
                        </div>
                      </a>

                      <a href="#" class="d-block">
                        <div class="icon-wrap">
                          <i class="fa fa-filter"></i> <span>Last Engaged</span>
                        </div>
                      </a>
                      <a href="#" class="d-block">
                        <div class="icon-wrap">
                          <i class="fa fa-filter"></i> <span>Subscribe Date</span>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="row dropdown-item main-frst-row">

                    <div class="col-lg-6">
                      <h4 class="mt-2">Contact Info</h4>
                      <a href="#" class="d-block">
                        <div class="icon-wrap">
                          <i class="fa fa-filter"></i> <span>Status</span>
                        </div>
                      </a>
                      <a href="#" class="d-block">
                        <div class="icon-wrap">
                          <i class="fa fa-filter"></i> <span>Email Address</span>
                        </div>
                      </a>
                      <a class="cstm-fld d-none">
                        <div class="icon-wrap">
                          <i class="fa fa-filter"></i> <span>Custom Fields <svg class="mt-[1px] ml-[8px]"
                              width="16" height="16" viewBox="0 0 24 24" stroke-width="2"
                              stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <line x1="5" y1="12" x2="19" y2="12"></line>
                              <line x1="15" y1="16" x2="19" y2="12"></line>
                              <line x1="15" y1="8" x2="19" y2="12"></line>
                            </svg></span>
                        </div>
                      </a>
                    </div>
                  </div>
                  
                  <div class="row dropdown-item custom-drop">
                    <div class="col-lg-12">
                      <h4 class="mt-2 bck-row"><svg class="text-primary mt-[3px] mr-[12.17px]" width="16"
                          height="16" viewBox="0 0 24 24" stroke-width="2" stroke="#2D464B" fill="none"
                          stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <line x1="5" y1="12" x2="19" y2="12">
                          </line>
                          <line x1="5" y1="12" x2="9" y2="16">
                          </line>
                          <line x1="5" y1="12" x2="9" y2="8">
                          </line>
                        </svg> Back</h4>
                      <div class="row">
                        <div class="col-6">
                          <a href="#" class="d-block">
                            <div class="icon-wrap">
                              <svg class="mr-[13.33px]" width="16" height="16" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                </path>
                                <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5">
                                </path>
                              </svg> <span>Zip Code</span>
                            </div>
                          </a>
                        </div>
                        <div class="col-6">
                          <span>&lcub;&lcub; zip_code &rcub;&rcub;</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <a href="#" class="d-block">
                            <div class="icon-wrap">
                              <svg class="mr-[13.33px]" width="16" height="16" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                </path>
                                <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5">
                                </path>
                              </svg> <span>Company</span>
                            </div>
                          </a>
                        </div>
                        <div class="col-6">
                          <span>&lcub;&lcub; company &rcub;&rcub;</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <a href="#" class="d-block">
                            <div class="icon-wrap">
                              <svg class="mr-[13.33px]" width="16" height="16" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                </path>
                                <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5">
                                </path>
                              </svg> <span>Website</span>
                            </div>
                          </a>
                        </div>
                        <div class="col-6">
                          <span>&lcub;&lcub; website &rcub;&rcub;</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <a href="#" class="d-block">
                            <div class="icon-wrap">
                              <svg class="mr-[13.33px]" width="16" height="16" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                </path>
                                <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5">
                                </path>
                              </svg> <span>Phone Number</span>
                            </div>
                          </a>
                        </div>
                        <div class="col-6">
                          <span>&lcub;&lcub; phone_number &rcub;&rcub;</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <a href="#" class="d-block">
                            <div class="icon-wrap">
                              <svg class="mr-[13.33px]" width="16" height="16" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                </path>
                                <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5">
                                </path>
                              </svg> <span>Last Name</span>
                            </div>
                          </a>
                        </div>
                        <div class="col-6">
                          <span>&lcub;&lcub; last_name &rcub;&rcub;</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <a href="#" class="d-block">
                            <div class="icon-wrap">
                              <svg class="mr-[13.33px]" width="16" height="16" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                </path>
                                <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5">
                                </path>
                              </svg> <span>First Name</span>
                            </div>
                          </a>
                        </div>
                        <div class="col-6">
                          <span>&lcub;&lcub; first_name &rcub;&rcub;</span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <a href="#" class="d-block">
                            <div class="icon-wrap">
                              <svg class="mr-[13.33px]" width="16" height="16" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                </path>
                                <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5">
                                </path>
                              </svg> <span> Name</span>
                            </div>
                          </a>
                        </div>
                        <div class="col-6">
                          <span>&lcub;&lcub; name &rcub;&rcub;</span>
                        </div>
                      </div>


                    </div>
                  </div>
                  
                </div>
                <a class="btn btn-filter d-inline-block clearFilter">Clear Filters</a>
                <span class="d-inline-block line-sep">|</span>
                <a class="btn btn-filter d-none" data-bs-toggle="modal" data-bs-target="#saveSegmentModal">Save
                  Segment</a>
                <span class="d-inline-block line-sep">|</span>
                <a class="btn btn-filter btn-segments d-none">Open Segments</a>
              </div>
              <div class="col-lg-6">
                <div class="table-cust-head">

                  <div class="form-input col-3">
                    <select name="bulk_action" id="bulk_action" class="form-control" style="display: none">
                      <option value="">Select Option</option>
                      <option value="1">Add to
                        List</option>
                      <option value="2">Remove from List</option>
                      <option value="3">Add Tag</option>
                      <option value="4">Remove Tag</option>
                      <option value="5">Delete Contacts</option>
                    </select>
                  </div>

                  <a href="javscript:;" class="pull-right exportcsv"><i class="fa fa-cloud-download "></i>
                    Export</a>
                </div>
              </div>
            </div>

            <table class="table align-middle">
              <thead>
                <tr>
                  <th>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </div>
                  </th>
                  <th>Email</th>
                  <th>Form/Page</th>
                  <th>Signed Up</th>
                  <th>Last Contacted</th>
                  <th>Device</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input ids_check" name='ids[]' type="checkbox"
                          value="<?php echo e($contact->id); ?>" id="flexCheckDefault1">
                      </div>
                    </td>
                    <td>
                      <a href="<?php echo e(route('contacts.show', ['id' => $contact->id])); ?>"><?php echo e($contact->email); ?></a>

                      <span class="contact_lists d-none">
                        <?php
                          $listIDs = DB::table('contact_lists')
                              ->where('contact_id', $contact->id)
                              ->orderBy('created_at', 'DESC')
                              ->get();
                          if ($listIDs) {
                              foreach ($listIDs as $listID) {
                                  echo $listID->lists_id . ', ';
                              }
                          }
                        ?>
                      </span>
                      <span class="contact_tags d-none">
                        <?php
                          $tagIDs = DB::table('contact_tag')
                              ->where('contact_id', $contact->id)
                              ->orderBy('created_at', 'DESC')
                              ->get();
                          if ($tagIDs) {
                              foreach ($tagIDs as $tagID) {
                                  echo $tagID->tag_id . ', ';
                              }
                          }
                        ?>
                      </span>
                    </td>


                    <td><?php echo e($contact->form_or_page); ?></td>
                    <td><?php echo e($contact->signed_up); ?></td>
                    <td><span
                        class="last_contacted d-none"><?php echo e($contact->last_contacted); ?></span></td>
                    <td><?php echo e('N/A'); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>
              <tfoot>
                <th colspan="6">
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
                  <form id="contact" method="post">
                    <?php echo csrf_field(); ?>
                    <!-- <?php echo e(csrf_field()); ?> -->

                    <div class="modal-create-contact-wrap">
                      <div class="row">
                        <div class="col-12">

                          <div class="form-wrap">
                            <label for="firstName">First Name</label>
                            <input class="form-control" type="text" name="first_name"
                              placeholder="Enter First Name">
                          </div>
                          <div class="form-wrap">
                            <label for="lastName">Last Name</label>
                            <input class="form-control" type="text" name="last_name" placeholder="Enter Last Name">
                          </div>
                          <div class="form-wrap">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Enter Email">
                          </div>
                          <div class="form-wrap">
                            <label for="list">List</label>
                            <select name="lists[]" id="list" class="select2" multiple="multiple">
                              <option value="" disabled>Select</option>
                              <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($list->id); ?>"><?php echo e($list->name); ?>

                                </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                            </select>
                          </div>
                          <div class="form-wrap">
                            <label for="tags">Tags</label>
                            <select name="tags[]" id="tags" class="select2" multiple="multiple">
                              <option value="" disabled>Select</option>
                              <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
          <!-- createNewContactModal -->

          <div class="modal fade modal-contact-new" id="ContactImportModal" tabindex="-1"
            aria-labelledby="ContactImportModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ContactImportModalLabel">Import New Contacts</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="modal-create-contact-wrap">
                    <div class="row">
                      <div class="col-12">

                        <form enctype="multipart/form-data" action="<?php echo e(route('contacts.import-contacts.post')); ?>"
                          id="import_form" method="POST">
                          <?php echo csrf_field(); ?>
                          <!-- <?php echo e(csrf_field()); ?> -->

                          <div class="form-wrap">
                            <a href="/sample/sample-file.csv">Download sample file</a>
                            <input type="file" name="file_csv" id="upload">
                          </div>
                          <div class="form-wrap">
                            <label for="list">List</label>
                            <select name="lists[]" class="select2 lists" multiple="multiple" required>
                              <option value="" disabled>Select</option>
                              <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($list->id); ?>"><?php echo e($list->name); ?>

                                </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                            </select>
                          </div>
                          <div class="form-wrap">
                            <label for="tags">Tags</label>
                            <select name="tags[]" class="select2" multiple="multiple">
                              <option value="" disabled>Select</option>
                              <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?>

                                </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                          <div class="form-wrap mt-2">

                            <small class="text-danger text-small"><b>Only CSV file format is
                                allowed</b> <a href="javascript:;" id="submit"
                                class="btn btn-primary pull-right">Import</a></small>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade modal-contact-new" id="addToList" tabindex="-1" aria-labelledby="addToListLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addToListLabel">Add Contact(s) to the list</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="modal-create-contact-wrap">
                    <div class="row">
                      <div class="col-12">

                        <form enctype="multipart/form-data" action="<?php echo e(route('contacts.add-to-list.post')); ?>"
                          id="import_form" method="POST">
                          <input type="hidden" name="ids">

                          <?php echo csrf_field(); ?>
                          <!-- <?php echo e(csrf_field()); ?> -->

                          <div class="form-wrap">
                            <label for="list">Please select a list that you would like to
                              add the selected contacts to.</label>
                            <select name="lists[]" class="select2" multiple="multiple">
                              <option value="" disabled>Select</option>
                              <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($list->id); ?>"><?php echo e($list->name); ?>

                                </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                            </select>
                          </div>

                          <div class="form-wrap mt-1">
                            <input type="button" value="CLOSE" style="width:auto" data-bs-dismiss="modal"
                              aria-label="Close">
                            <input type="submit" class="btn btn-success pull-right" style="width:auto"
                              value="OK">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade modal-contact-new" id="removeFromList" tabindex="-1"
            aria-labelledby="removeFromabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="removeFromabel">Remove contact(s) from list</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="modal-create-contact-wrap">
                    <div class="row">
                      <div class="col-12">

                        <form enctype="multipart/form-data" action="<?php echo e(route('contacts.remove-from-list.post')); ?>"
                          id="import_form" method="POST">
                          <input type="hidden" name="ids">

                          <?php echo csrf_field(); ?>
                          <!-- <?php echo e(csrf_field()); ?> -->

                          <div class="form-wrap">
                            <label for="list">Please select a list that you would like to
                              remove the selected contacts to.</label>
                            <select name="lists[]" class="select2" multiple="multiple">
                              <option value="" disabled>Select</option>
                              <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($list->id); ?>"><?php echo e($list->name); ?>

                                </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                            </select>
                          </div>
                          <div class="form-wrap mt-1">
                            <input type="button" value="CLOSE" style="width:auto" data-bs-dismiss="modal"
                              aria-label="Close">
                            <input type="submit" class="btn btn-success pull-right" style="width:auto"
                              value="OK">
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade modal-contact-new" id="addToTag" tabindex="-1" aria-labelledby="addToTagLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addToTagLabel">Add Contact(s) to the tag</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="modal-create-contact-wrap">
                    <div class="row">
                      <div class="col-12">

                        <form enctype="multipart/form-data" action="<?php echo e(route('contacts.add-to-tag.post')); ?>"
                          id="import_form" method="POST">
                          <input type="hidden" name="ids">
                          <?php echo csrf_field(); ?>
                          <!-- <?php echo e(csrf_field()); ?> -->


                          <div class="form-wrap">
                            <label for="tags">Please select a tag that you would like to
                              add the selected contacts to.</label>
                            <select name="tags[]" class="select2" multiple="multiple">
                              <option value="" disabled>Select</option>
                              <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?>

                                </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                          <div class="form-wrap mt-1">
                            <input type="button" value="CLOSE" style="width:auto" data-bs-dismiss="modal"
                              aria-label="Close">
                            <input type="submit" class="btn btn-success pull-right" style="width:auto"
                              value="OK">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade modal-contact-new" id="removefromTag" tabindex="-1"
            aria-labelledby="removefromTagLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="removefromTagLabel">Remove Contact(s) to the tag</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="modal-create-contact-wrap">
                    <div class="row">
                      <div class="col-12">

                        <form enctype="multipart/form-data" action="<?php echo e(route('contacts.remove-from-tag.post')); ?>"
                          id="import_form" method="POST">
                          <input type="hidden" name="ids">
                          <?php echo csrf_field(); ?>
                          <!-- <?php echo e(csrf_field()); ?> -->


                          <div class="form-wrap">
                            <label for="tags">Please select a tag that you would like to
                              add the selected contacts to.</label>
                            <select name="tags[]" class="select2" multiple="multiple">
                              <option value="" disabled>Select</option>
                              <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?>

                                </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                          <div class="form-wrap mt-1">
                            <input type="button" value="CLOSE" style="width:auto" data-bs-dismiss="modal"
                              aria-label="Close">
                            <input type="submit" class="btn btn-success pull-right" style="width:auto"
                              value="OK">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade modal-contact-new" id="bulkDelete" tabindex="-1" aria-labelledby="bulkDeleteLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="bulkDeleteLabel">Selected contacts will be deleted</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="modal-create-contact-wrap">
                    <div class="row">
                      <div class="col-12">

                        <form enctype="multipart/form-data" action="<?php echo e(route('contacts.bulk-delete.post')); ?>"
                          id="import_form" method="POST">
                          <input type="hidden" name="ids">
                          <?php echo csrf_field(); ?>
                          <!-- <?php echo e(csrf_field()); ?> -->


                          <div class="form-wrap">
                            <label for="tags">Are you sure you want to continue? This
                              action cannot be undone.</label>

                          </div>
                          <div class="form-wrap mt-1">
                            <input type="button" value="CLOSE" style="width:auto" data-bs-dismiss="modal"
                              aria-label="Close">
                            <input type="submit" class="btn btn-success pull-right" style="width:auto"
                              value="Delete Contacts">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- saveSegmentModal -->
          <div class="modal fade modal-contact-new" id="saveSegmentModal" tabindex="-1"
            aria-labelledby="saveSegmentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="saveSegmentModalLabel">Segment Name</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img
                      src="<?php echo e(asset('website')); ?>/images/close.svg" alt="close"></button>
                </div>
                <div class="modal-body">
                  <div class="modal-create-contact-wrap">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-wrap">
                          <label for="name">Type a name for your new segment.</label>
                          <input class="form-control" type="text" name="name" placeholder="Enter a Name...">
                        </div>
                      </div>
                    </div>
                    <div class="btns-wrap">
                      <div class="row justify-content-end">
                        <div class="col-12 text-end">
                          <a class="btn btn-simple w-auto d-inline-block my-0 mx-2">Close</a>
                          <a class="btn btn-prim btn-prim-light w-auto d-inline-block m-0 px-3"><span>Save
                              Segment</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- saveSegmentModal -->
          <!-- segemnt sidebar -->
          <div class="segment-bar">
            <div class="bar-row mb-5">
              <div class="row">
                <div class="col-6">
                  <h4>Segments</h4>
                </div>
                <div class="col-6 text-end">
                  <div class="close-seg-bar">
                    <img src="<?php echo e(asset('website')); ?>/images/close.svg" alt="close" class="cloase-bar">
                  </div>
                </div>
              </div>
            </div>
            <!-- action row -->
            <div class="bar-tab-head">
              <div class="row">
                <div class="col-6">
                  <h3>Name</h3>
                </div>
                <div class="col-6 text-end">
                  <h3>Actions</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <hr class="mt-0">
              </div>
            </div>
            <!-- action row -->
            <div class="bar-tab-head">
              <div class="row">
                <div class="col-12">
                  <div class="d-inline-block svg-action-wrap">
                    <svg class="" width="17" height="17" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <rect x="8" y="8" width="12" height="12" rx="2"></rect>
                      <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2">
                      </path>
                    </svg>
                  </div>
                  <h3>Contacted Recently</h3>
                </div>
              </div>
            </div>
            <!-- action row -->
            <div class="bar-tab-head">
              <div class="row">
                <div class="col-12">
                  <div class="d-inline-block svg-action-wrap">
                    <svg class="" width="17" height="17" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <rect x="8" y="8" width="12" height="12" rx="2"></rect>
                      <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2">
                      </path>
                    </svg>
                  </div>
                  <h3>Opened Recently</h3>
                </div>
              </div>
            </div>
            <!-- action row -->
          </div>
          <!-- segemnt sidebar -->
        </div>
      </div>
    </div>
  </section>
  <div class="d-none">
    <select name="lists" id="lists" class="w-100 p-1">
      <option value="">All</option>
      <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($list->id); ?>"><?php echo e($list->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <select name="tags" id="tagss" class="w-100 p-1">
      <option value="">All</option>

      <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <select name="campaigns" id="campaignss" class="w-100 p-1">
      <option value="">All</option>
      <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($campaign->id); ?>"><?php echo e($campaign->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <select name="status" id="status_for_search" class="w-100 p-1">
      <option value="">All</option>
      <option value="active">Active</option>
      <option value="cold">Cold</option>
      <option value="unsubscribed">Unsubscribed</option>
      <option value="unconfirmed">Unconfirmed</option>
      <option value="failed">Failed</option>
    </select>
    <select name="subscribe_date" id="subscribe_date" class="w-100 p-1">
      <option value="">All</option>
      <option value="7_days">7 Days</option>
      <option value="14_days">14 Days</option>
      <option value="30_days">30 Days</option>
      <option value="custom">Custom</option>
    </select>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap4-datetimepicker@5.2.3/build/css/bootstrap-datetimepicker.min.css"
    rel="stylesheet">
  <script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/bootstrap4-datetimepicker@5.2.3/build/js/bootstrap-datetimepicker.min.js"></script>
  <script>
    var table = $('#DataTables_Table_0').DataTable();
    var tableState = table.state.loaded();
    var table_data = $('tbody').html();
    $('p.alert .close').on('click', function() {
      console.log('here');
      $(this).parent().alert('close');
    });
    $(function() {
      $('#submit').on('click', function() {
        var csv = $('#upload').val();
        var ext = csv.substring(csv.lastIndexOf('.') + 1).toLowerCase();

        if (ext == "csv") {
          if ($('.lists').val() == '') {
            swal.fire({
              icon: 'error',
              title: 'Oops...',
              'text': 'Atleast one list must be selected'
            });
            return false;
          } else {
            $('#import_form').submit();
          }
        } else {
          swal.fire({
            icon: 'error',
            title: 'Oops...',
            'text': 'File format not allowed for importing contacts, Only csv file is allowed'
          });
          $(this).val(null);
          return false;
        }
      });
      $('.breadcrumb-area').text($('.dataTables_info').text());
    });
    $('.btns-wrap .dropdown-item').on('click', function() {
      var name = $(this).data('id');
      var field = `<div class="form-wrap">
                <label for="">` + $(this).text() + `</label>
                <input class="form-control" type="text" name="` + name + `" placeholder="Enter ` + $(this).text()
        .trim() + `" >
            </div>`;
      $('.modal-create-contact-wrap').find('.col-12').append(field);
    });
    $("#contact").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({
        url: "<?php echo e(route('contacts.index.post')); ?>",
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
            }, 3000);
          } else {
            toastr.error(response.response.data.message);
          }
        },
        error: function(error) {
          console.log(error);
        }
      });

    }));
    // $(".alert").fadeTo(2000, 500).slideUp(500, function() {
    //     $(".alert").slideUp(500);
    // });
    $('.exportcsv').on('click', function() {
      Swal.fire({
        title: 'Do you want to export the contacts?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Export',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          location.href = '<?php echo e(route('contacts.export')); ?>';
          // Swal.fire('Saved!', '', 'success')
        }
        // else if (result.isDenied) {
        //     Swal.fire('Changes are not saved', '', 'info')
        // }
      })
    });
    $('#flexCheckDefault').on('change', function() {
      if ($(this).is(':checked')) {
        $('.ids_check').attr('checked', 'checked');
        $('.btn-filter').addClass('d-none');
        $('#bulk_action').show();
        var checkboxes = $('input[name="ids[]"]');
        var $checked = checkboxes.filter(":checked"),
          checkedValues = $checked.map(function() {
            return this.value;
          }).get();
        // alert(checkedValues);
        $('input[name="ids"]').val(checkedValues)
      } else {
        $('.ids_check').removeAttr('checked');
        $('.btn-filter').removeClass('d-none');
        $('#bulk_action').hide();

      }
    });
    $('.ids_check').on('change', function() {
      if ($('.ids_check').is(':checked')) {
        $('.btn-filter').addClass('d-none');
        $('#bulk_action').show();
        var checkboxes = $('input[name="ids[]"]');
        var $checked = checkboxes.filter(":checked"),
          checkedValues = $checked.map(function() {
            return this.value;
          }).get();
        $('input[name="ids"]').val(checkedValues)

      } else {
        $('.btn-filter').removeClass('d-none');
        $('#bulk_action').hide();
      }
    });
    $('#bulk_action').on('change', function() {
      bulk_val = $(this).val();
      // alert(checkedValues);
      if (bulk_val == '1') {
        $('#addToList').modal('show');
      }
      if (bulk_val == '2') {
        $('#removeFromList').modal('show');
      }
      if (bulk_val == '3') {
        $('#addToTag').modal('show');
      }
      if (bulk_val == '4') {
        $('#removefromTag').modal('show');
      }
      if (bulk_val == '5') {
        $('#bulkDelete').modal('show');
      }
    });



    $(document).ready(function() {
      // Function to check if an element is a descendant of another element
      $.fn.isChildOf = function(b) {
        return this.closest(b).length > 0;
      };



      // Click event on the document to close the dropdown when clicking outside
      $(document).on('click', function(event) {
        if (!$(event.target).isChildOf('#dropdownNewContactMen')) {
          // Clicked outside the dropdown, remove the "active" class
          $('#dropdownNewContactMen').removeClass('active');
        }
      });
      $('#dropdownNewContactFilter').on('click', function(event) {
        // Toggle class "active" on the element with ID "dropdownNewContactMen"
        $('#dropdownNewContactMen').toggleClass('active');
        event.stopPropagation(); // Prevent the click event from reaching the document
      });
    });

    $(document).ready(function() {
      // Function to check if an element is a descendant of another element
      $.fn.isChildOf = function(b) {
        return this.closest(b).length > 0;
      };

      // Click event on the document to close the dropdowns when clicking outside
      $(document).on('click', function(event) {
        if (!$(event.target).isChildOf('.drop-slct')) {
          // Clicked outside the dropdown, remove the "active" class
          $('.drop-slct').removeClass('active');
        }
      });

      $('.headlessui-added .drp-main').on('click', function(event) {
        // Toggle class "active" on the elements with class "drop-slct"
        $('.drop-slct').toggleClass('active');
        event.stopPropagation(); // Prevent the click event from reaching the document
      });
    });

    $(document).ready(function() {
      $('.datetimepicker').datetimepicker({
        // debug: true,
        // disabledDates: [new Date()],
        icons: {
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
          up: "fa fa-arrow-up",
          down: "fa fa-arrow-down",
          previous: "fa fa-chevron-left",
          next: "fa fa-chevron-right",
          today: "fa fa-clock-o",
          clear: "fa fa-trash-o"
        }
      });
      $('.cstm-fld').on('click', function() {
        // Add class "hide" to all elements with class "main-frst-row"
        $('.main-frst-row').addClass('hide');
        $('#dropdownNewContactMen').addClass('active');


        // Add class "active" to elements with class "custom-drop"
        $('.custom-drop').addClass('active');
      });

      $('.bck-row').on('click', function() {
        // Remove class "hide" from all elements with class "main-frst-row"
        $('.main-frst-row').removeClass('hide');

        // Remove class "active" from elements with class "custom-drop"
        $('.custom-drop').removeClass('active');
      });
    });
    const a = [];

    $('.icon-wrap').on('click', function() {
      var filterText = $(this).text().trim();
      if (a.indexOf(filterText) === -1) {
        a.push(filterText);

        var selectBox = ``;
        if (filterText == 'List') {
          selectBox = $('#lists')[0].outerHTML;
        }
        if (filterText == 'Tag') {
          selectBox = $('#tagss')[0].outerHTML;
        }
        if (filterText == 'Landing Page') {
          selectBox = $('#campaignss')[0].outerHTML;
        }
        if (filterText == 'Status') {
          selectBox = $('#status_for_search')[0].outerHTML;
        }
        if (filterText == 'Subscribe Date') {
          selectBox = $('#subscribe_date')[0].outerHTML;
        }
        if (filterText == 'Landing Page' || filterText == 'List' || filterText == 'Tag') {
          $('.selected_filter').append(`
          <div class="position-relative d-inline-flex">
            <button class="headlessui-added m-1" id="headlessui-popover-button-125" type="button"
              aria-expanded="false">
              <div class="ml-[8px] whitespace-normal overflow-hidden overflow-ellipsis" id="tag-list">
                <div data-attribute="filter-list"
                  class="bg-gray-400 hover:bg-gray-500 text-gray-900 d-inline-flex align-items-center justify-between">
                  <div class="d-inline-flex px-[10px] py-[3px]">
                    <div class="d-inline-flex justify-center align-items-center mr-[8px]  false">
                      <i class="fa fa-copy"></i>
                    </div>
                    <span class="mx-1 drp-main"> <span id="filter_txt">` + filterText + `</span>: 
                      <span class="drp-prnt">
                        Matches <span id="filter_option"> any</span> -
                        <span id="filter_text"></span> 
                      </span>
                    </span>
                  </div>
                  <div class="pr-[10px] mb-[3px]">
                    <i class="fa fa-times small close_sec" onclick="hideThisSec.call(this)"></i>
                  </div>
                </div>
              </div>
            </button>
            <div class="drop-slct">
              <a href="javascript:;" onclick="hideThis.call(this)" class="position-absolute top-0 start-100 translate-middle badge border border-light text-white rounded-circle bg-secondary p-2"><i class="fa fa-times small close_sec" ></i></a>
              <form action="">
                <label class="d-block">
                  <input type="radio" checked name="filter_opt_` + filterText + `" class="filter_opt" value="all"> Matches All
                </label>
                <label class="d-block">
                  <input type="radio" name="filter_opt_` + filterText + `" class="filter_opt" value="any"> Matches Any
                </label>
                <label class="d-block">
                  <input type="radio" name="filter_opt_` + filterText + `" class="filter_opt" value="none"> None
                </label>
                ` + selectBox + `
              </form>
            </div>
          </div>
          `);
        }
        if (filterText == 'Email Address') {
          $('.selected_filter').append(`
            <div class="position-relative d-inline-flex">
              <button class="headlessui-added" id="headlessui-popover-button-125" type="button"
              aria-expanded="false">
                <div class="ml-[8px] whitespace-normal overflow-hidden overflow-ellipsis" id="tag-list">
                  <div data-attribute="filter-list"
                    class="bg-gray-400 hover:bg-gray-500 text-gray-900 d-inline-flex align-items-center justify-between">
                    <div class="d-inline-flex px-[10px] py-[3px]">
                      <div class="d-inline-flex justify-center align-items-center mr-[8px]  false">
                        <i class="fa fa-copy"></i>
                      </div>
                      <span class="mx-1 drp-main"> <span id="filter_txt">` + filterText + ` </span>: </span>
                    </div>
                      <div class="pr-[10px] mb-[3px]">
                      <i class="fa fa-times small close_sec" onclick="hideThisSec.call(this)"></i>
                    </div>
                  </div>
                </div>
              </button>
              <div class="drop-slct">
                <a href="javascript:;" onclick="hideThis.call(this)" class="position-absolute top-0 start-100 translate-middle badge border border-light text-white rounded-circle bg-secondary p-2"><i class="fa fa-times small close_sec" ></i></a>
                <form action="">
                  <label class="d-block">
                    <input type="Email" name='email' id="search_email">
                  </label>
                </form>
              </div>
            </div>
          `);
        }
        if (filterText == 'Status' || filterText == 'Subscribe Date') {
          var html = `<div class="position-relative d-inline-flex">
            <button class="headlessui-added" id="headlessui-popover-button-125" type="button"
              aria-expanded="false">
              <div class="ml-[8px] whitespace-normal overflow-hidden overflow-ellipsis" id="tag-list">
                <div data-attribute="filter-list"
                  class="bg-gray-400 hover:bg-gray-500 text-gray-900 d-inline-flex align-items-center justify-between">
                  <div class="d-inline-flex px-[10px] py-[3px]">
                    <div class="d-inline-flex justify-center align-items-center mr-[8px]  false">
                      <i class="fa fa-copy"></i>
                    </div>
                    <span class="mx-1 drp-main"><span id="filter_txt">` + filterText + `</span>: </span>
                  </div>
                    <div class="pr-[10px] mb-[3px]">
                    <i class="fa fa-times small close_sec" onclick="hideThisSec.call(this)"></i>
                  </div>
                </div>
              </div>
            </button>
              <div class="drop-slct">
                <a href="javascript:;" onclick="hideThis.call(this)" class="position-absolute top-0 start-100 translate-middle badge border border-light text-white rounded-circle bg-secondary p-2"><i class="fa fa-times small close_sec"></i></a>
                <form action="">
                  <label class="d-block">
                    ` + selectBox + `
                  </label>
                `;
          if (filterText == 'Subscribe Date') {
            var datePickerId = '';
            // document.getElementById("from_date").defaultValue = "<?= date('d/m/Y', strtotime('-3 days')) ?>";
            // document.getElementById("to_date").defaultValue = "<?= date('d/m/Y') ?>";
            datePickerId.max = new Date().toISOString().split("T")[0];
            html +=
              `
            <div class="from_to_date" style="display:none">
              <label><input type="date" name="from_date" id="from_date"  value="<?= date('Y-m-d', strtotime('-7 days')) ?>" onfocus="this.showPicker()"  >
              </label> To<label><input type="date" name="to_date" id="to_date" value="<?= date('Y-m-d') ?>" onfocus="this.showPicker()" ></label>
              </div>`;
          }

          console.log(filterText)

          html += `</form>
              </div>
            </div>`;
          $('.selected_filter').append(html);
        }
        if (filterText == 'Last Engaged') {

          $('.selected_filter').append(`
          <div class="position-relative d-inline-flex">
            <button class="headlessui-added" id="headlessui-popover-button-125" type="button"
              aria-expanded="false">
              <div class="ml-[8px] whitespace-normal overflow-hidden overflow-ellipsis" id="tag-list">
                <div data-attribute="filter-list"
                  class="bg-gray-400 hover:bg-gray-500 text-gray-900 d-inline-flex align-items-center justify-between">
                  <div class="d-inline-flex px-[10px] py-[3px]">
                    <div class="d-inline-flex justify-center align-items-center mr-[8px]  false">
                      <i class="fa fa-copy"></i>
                    </div>
                    <span class="mx-1 drp-main"><span id="filter_txt">` + filterText + `</span>: </span>
                  </div>
                    <div class="pr-[10px] mb-[3px]">
                    <i class="fa fa-times small close_sec" onclick="hideThisSec.call(this)"></i>
                  </div>
                </div>
              </div>
            </button>
              <div class="drop-slct" style="width:300px;">
                    <a href="javascript:;" onclick="hideThis.call(this)" class="position-absolute top-0 start-100 translate-middle badge border border-light text-white rounded-circle bg-secondary p-2"><i class="fa fa-times small close_sec" ></i></a>
                    <form action="">
                        <label class="d-block">
                        <input type="radio" checked name="last_contacted" class="filter_opt last_contacted" value="More Than">More Than
                        </label>
                        <label class="d-block">
                        <input type="radio" name="last_contacted" class="filter_opt last_contacted" value="Less Than">Less Than
                        </label>
                        <label class="d-block">
                        <input type="radio" name="last_contacted" class="filter_opt last_contacted" value="Never">Never
                        </label>
                        <label class="d-block text-field">
                            <input type="text" class=" w-50" name="last_contacted_val" id="last_contacted_val" > <span class="w-50">days ago</span>
                        </label>
                    </form>
                </div>
            </div>`);

        }

      }
      $('body').trigger('click');
    });

    function formatDate(date) {
      var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

      if (month.length < 2)
        month = '0' + month;
      if (day.length < 2)
        day = '0' + day;

      return [day, month, year].join('/');
    }
    $(document).on('click', '.headlessui-added .drp-main', function() {
      $(this).closest('.position-relative').find('.drop-slct').toggle();
    });

    function hideThis() {
      $(this).closest('.drop-slct').hide();
    }

    function hideThisSec() {
      $(this).closest('.position-relative.d-inline-flex').remove();
      var filterText = $(this).closest('.position-relative.d-inline-flex').find('#filter_txt').html();
      const index = a.indexOf(a);
      a.splice(index, 1);
      //   table.column(1).search('').draw();
      $('tbody').html(table_data);
    }

    $(document).on('click', '.clearFilter', function() {
      console.log('clear');
      $('tbody').html(table_data);
      $('.selected_filter').html('');
    });

    $(document).on('change', '.filter_opt, #lists, #tagss', function() {
      var filter_val = $('.filter_opt:checked').val();
      var selected_opt = $(this).closest('form').find('select option:selected');
      var td_search = '';
      $('tbody tr').show();
      if ($(this).closest('form').find('select').is('#tagss')) {
        td_search = 'contact_lists';
      }
      if ($(this).closest('form').find('select').is('#lists')) {
        td_search = 'contact_tags';
      }
      $('#filter_option').html(filter_val);
      $(this).closest('.position-relative').find('#filter_text').html($(selected_opt).text());
      if (filter_val == 'any' || filter_val == 'all') {
        table.column(1).search($(selected_opt).val()).draw();
      }
      if (filter_val == 'none') {
        var cur_val = $(selected_opt).val();
        $('tbody tr').filter(function() {
          return $(this).find('td .' + td_search).filter(function() {
            return $(this).text().trim().indexOf(cur_val) != -1;
          }).length;
        }).hide(); // console.log(tds);
        return false;
      }

    });
    $(document).on('change', '#campaignss', function() {
      $('tbody').html(table_data);

      $(this).closest('.position-relative').find('#filter_text').html($(this).find('option:selected').text());
      table.column(2).search($(this).find('option:selected').text()).draw();
    });
    $(document).on('keyup', '#search_email', function() {
      $('tbody').html(table_data);
      table.column(1).search($(this).val()).draw();

    });
    $(document).on('change', '.filter_opt', function() {
      $(this).closest('.position-relative').find('#filter_option').html($(this).attr('id'))
    });
    $(document).on('change', '#subscribe_date', function() {
      var current_val = $(this).val();
      var currentDate = new Date();

      if (current_val == 'custom') {
        $(this).closest('form').find('.from_to_date').show();
      } else {
        $(this).closest('form').find('.from_to_date').hide();
        var from_date = '';
        var to_date = '';
        $('tbody').html(table_data);
        $.fn.dataTable.ext.search.push(
          function(settings, data, dataIndex) {
            var min = from_date;
            var max = to_date;
            var createdAt = data[3] || 0; // Our date column in the table

            if (
              (min == "" || max == "") ||
              (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
            ) {
              return true;
            }
            return false;
          }
        );
        var table = $('#DataTables_Table_0').DataTable();
        if (current_val == '') {
          from_date = "<?= date('Y-m-d 00:00:00', strtotime('-1 years')) ?>";
          to_date = "<?= date('Y-m-d H:i:s', strtotime('+1 day')) ?>";
        }
        if (current_val == '7_days') {
          from_date = "<?= date('Y-m-d 00:00:00', strtotime('-7 days')) ?>";
          to_date = "<?= date('Y-m-d H:i:s', strtotime('+1 day')) ?>";
          table.draw();
        }
        if (current_val == '14_days') {
          from_date = "<?= date('Y-m-d 00:00:00', strtotime('-14 days')) ?>";
          to_date = "<?= date('Y-m-d H:i:s', strtotime('+1 day')) ?>";
          table.draw();
        }
        if (current_val == '30_days') {
          from_date = "<?= date('Y-m-d 00:00:00', strtotime('-30 days')) ?>";
          to_date = "<?= date('Y-m-d H:i:s', strtotime('+1 day')) ?>";
          table.draw();
        }

      }
    });

    $(document).on('change', '#from_date, #to_date', function() {
      $(this).closest('.position-relative').find('.mx-1.drp-main').html('Subscribe Date:' + $('#from_date')
        .val() + ' To ' + $('#to_date').val());
      $('tbody').html(table_data);

      $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
          var min = $('#from_date').val();
          var max = $('#to_date').val();
          var createdAt = data[3] || 0; // Our date column in the table

          if (
            (min == "" || max == "") ||
            (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
          ) {
            return true;
          }
          return false;
        }
      );
      //   var table = $('#DataTables_Table_0').DataTable();

      table.draw();
    });
    $(document).on('keyup', '#keyword_search', function() {

      var txt = $(this).val();
      var regEx = new RegExp($.map($(this).val().trim().split(' '), function(v) {
        return '(?=.*?' + v + ')';
      }).join(''), 'i');

      $('.icon-wrap').hide().filter(function() {
        return regEx.exec($(this).text());
      }).show();
    });
    $(document).on('change', '.last_contacted', function() {
      var last_cont_opt = $('.last_contacted:checked').val();
      var last_contacted_val = $('#last_contacted_val').val();
      $('tbody').html(table_data);

      $(this).closest('.position-relative.d-inline-flex').find('#filter_txt').html('Last Engaged: ' +
        last_cont_opt +
        '-' + last_contacted_val + ' days');
      if (last_cont_opt == 'More Than') {
        console.log("morethan")
        $('.text-field').addClass('d-block').removeClass('d-none');

        $.fn.dataTable.ext.search.push(
          function(settings, data, dataIndex) {
            var d = new Date();
            d.setDate(d.getDate() - last_contacted_val);
            var min = d;
            var max = new Date();
            var createdAt = data[4] || 4; // Our date column in the table

            if ((min == "" || max == "") || (moment(createdAt).isSameOrAfter(min) && moment(createdAt)
                .isSameOrBefore(max))) {
              return true;
            }
            return false;
          }
        );
        var table = $('#DataTables_Table_0').DataTable();

        table.draw();

      }
      if (last_cont_opt == 'Less Than') {
        console.log("lessthan")

        $('.text-field').addClass('d-block').removeClass('d-none');

        $.fn.dataTable.ext.search.push(
          function(settings, data, dataIndex) {
            var min = new Date('2022', '01', '01');
            var d = new Date();
            d.setDate(d.getDate() - last_contacted_val);
            var max = d;
            var createdAt = data[4] || 4; // Our date column in the table

            if ((min == "" || max == "") || (moment(createdAt).isSameOrAfter(min) && moment(createdAt)
                .isSameOrBefore(max))) {
              return true;
            }
            return false;
          }
        );
        var table = $('#DataTables_Table_0').DataTable();

        table.draw();

      }
      if (last_cont_opt == 'Never') {

        $(this).closest('.position-relative.d-inline-flex').find('#filter_txt').html('Last Engaged: ' +
          last_cont_opt);
        $('.text-field').addClass('d-none').removeClass('d-block');
      }
    });
    $(document).on('keyup', '#last_contacted_val', function() {
      var last_cont_opt = $('.last_contacted:checked').val();
      var last_contacted_val = $('#last_contacted_val').val();

      $(this).closest('.position-relative.d-inline-flex').find('#filter_txt').html('Last Engaged: ' +
        last_cont_opt +
        '-' + last_contacted_val + ' days');
      if (last_cont_opt == 'more_than') {
        $.fn.dataTable.ext.search.push(
          function(settings, data, dataIndex) {
            var d = new Date();
            d.setDate(d.getDate() - last_contacted_val);
            var min = d;
            var max = new Date();
            var createdAt = data[4] || 4; // Our date column in the table

            if ((min == "" || max == "") || (moment(createdAt).isSameOrAfter(min) && moment(createdAt)
                .isSameOrBefore(max))) {
              return true;
            }
            return false;
          }
        );
        table.draw();

      }
      if (last_cont_opt == 'less_than') {
        $.fn.dataTable.ext.search.push(
          function(settings, data, dataIndex) {
            var min = new Date('2022', '01', '01');
            var d = new Date();
            d.setDate(d.getDate() - last_contacted_val);
            var max = d;
            var createdAt = data[4] || 4; // Our date column in the table

            if ((min == "" || max == "") || (moment(createdAt).isSameOrAfter(min) && moment(createdAt)
                .isSameOrBefore(max))) {
              return true;
            }
            return false;
          }
        );
        table.draw();

      }
      if (last_cont_opt == 'never') {

        $('#last_contacted_val').hide();
      }
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/contacts/index.blade.php ENDPATH**/ ?>