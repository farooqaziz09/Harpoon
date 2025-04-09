
<?php $__env->startSection('title', ' - Campaign Information'); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .sidebar-wrap.sidebar-tabs-wrap {
            max-width: auto;
            z-index: 999;
        }

        .tab-pane.active {
            display: block;
            opacity: 1 !important;
            height: 100%;
        }

        .fade:not(.show) {
            display: none;
        }

        .content-elements-wrap p {
            font-size: 11px;
        }

        .nav.nav-tabs li {
            padding: 5px;
        }

        .nav.nav-tabs li.active {
            background: lightgrey;
        }

        .body_wrap {
            padding: 0;
        }
    </style>


    <div class="sidebar-wrap p-0 h-100 d-block w-100">
        <div class="sidebar-tabs-inner">
            <h2>Information</h2>
            <div class="cont-sidebar">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item col-3 col-4" role="presentation">
                        <button class="nav-link active" id="subscribe-tab" data-bs-toggle="tab" data-bs-target="#subscribe"
                            type="button" role="tab" aria-controls="subscribe" aria-selected="true">
                            <img src="<?php echo e(asset('design')); ?>/images/subscribe.svg" alt="subscribe">
                            <span>Subscribe</span>
                        </button>
                    </li>
                    
                    <li class="nav-item col-3 col-4" role="presentation">
                        <button class="nav-link" id="page-tab" data-bs-toggle="tab" data-bs-target="#page" type="button"
                            role="tab" aria-controls="page" aria-selected="false">
                            <img src="<?php echo e(asset('design')); ?>/images/page-icon.svg" alt="page">
                            <span>Page</span>
                        </button>
                    </li>
                    
                </ul>
            </div>
        </div>

        <div class="tab-content h-100" id="myTabContent">
            <form id="info_form" method="post" action="<?php echo e(route('campaign.store.post')); ?>">
                
                <?php echo csrf_field(); ?>
                <!-- <?php echo e(csrf_field()); ?> -->

                <div class="tab-pane fade show active" id="subscribe" role="tabpanel" aria-labelledby="subscribe-tab">
                    <div class="content-elements-wrap">
                        <div class="details-body-wrap">
                            <div class="row mb-4">
                                <div class="col-8">
                                    <h3 class="mb-0">Redirect to another website</h3>
                                    <p class="mb-0">Redirect to another website</p>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="switch-box text-end">
                                        <label class="switch">
                                            <input type="checkbox" class="red_web"
                                                <?= $campaign->redirect != '' ? 'checked' : '' ?>>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="url_wrap"
                                    style=" <?= $campaign->redirect != '' ? 'display:block' : 'display:none' ?>">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="fld-rel">
                                                <input type="url" class="form-control req url_k"
                                                    placeholder="https:yoursite.com/thanks" name="redirect"
                                                    value="<?= $campaign->redirect ?>">
                                                <div class="icon-dang absolute top-[50%] translate-y-[-50%] right-[10px]"
                                                    style="display: <?= $campaign->redirect != '' ? 'none' : 'block' ?>">
                                                    <div class="relative text-left false">
                                                        <svg class="w-[20px] h-[20px]" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="#DC3535"
                                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M8.7 3h6.6c.3 0 .5 .1 .7 .3l4.7 4.7c.2 .2 .3 .4 .3 .7v6.6c0 .3 -.1 .5 -.3 .7l-4.7 4.7c-.2 .2 -.4 .3 -.7 .3h-6.6c-.3 0 -.5 -.1 -.7 -.3l-4.7 -4.7c-.2 -.2 -.3 -.4 -.3 -.7v-6.6c0 -.3 .1 -.5 .3 -.7l4.7 -4.7c.2 -.2 .4 -.3 .7 -.3z">
                                                            </path>
                                                            <line x1="12" y1="8" x2="12"
                                                                y2="12">
                                                            </line>
                                                            <line x1="12" y1="16" x2="12.01"
                                                                y2="16">
                                                            </line>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="text-dang min-w-[80px] h-9 text-end block rounded w-max py-2 px-4 z-50 text-danger bg-danger-light -translate-x-1/2 -translate-y-full left-2/4 top-[-10px] font-normal text-sm absolute whitespace-no-wrap"
                                                    style="display: <?= $campaign->redirect != '' ? 'none' : 'block' ?>">
                                                    Url is required
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-4">
                                <div class="col-8">
                                    <h3 class="mb-0">Active List</h3>
                                    <p class="mb-2">This is the list contacts will be added to.</p>
                                </div>
                                <div class="col-12">
                                    <div class="selection-all">
                                        <select name="list" id="" class="w-100">
                                            <option value="">Select List</option>
                                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($list->id); ?>"
                                                    <?php echo e(Session::get('campaign')['list'] == $list->id ? 'selected' : ''); ?>>
                                                    <?php echo e($list->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-8">
                                    <h3 class="mb-0">Add Tag(s) to Contact</h3>
                                    <p class="mb-2">Select tags to associate the contact to.</p>
                                </div>
                                <div class="col-12">
                                    <div class="selection-all">
                                        <select name="tag" id="" class="w-100">
                                            <option value="">Select Tag</option>
                                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"
                                                    <?php echo e(Session::get('campaign')['tag'] == $item->id ? 'selected' : ''); ?>>
                                                    <?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4 d-none">
                                <div class="col-7">
                                    <h3 class="mb-0">Notify me</h3>
                                    <p class="mb-0">We will notify you on the following email(s).</p>
                                </div>
                                <div class="col-5 text-end">
                                    <div class="switch-box text-end">
                                        <label class="switch">
                                            <input type="checkbox" class="red_em">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="em_wrap" style="display: none;">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="fld-rel">
                                            <input type="email" name="notify_email" class="form-control req">
                                            <div
                                                class="text-dang bot-txt min-w-[80px] h-9 text-end block rounded w-max py-2 px-4 z-50 text-danger bg-danger-light -translate-x-1/2 -translate-y-full left-2/4 top-[-10px] font-normal text-sm absolute whitespace-no-wrap">
                                                Email is required
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="lead" role="tabpanel" aria-labelledby="lead-tab">
                    <div class="content-elements-wrap col-boxes">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="mb-0">Advanced Email Validation</h3>
                                <p class="mb-4">Improve your email list quality with our real-time advanced verification
                                    tools.</p>
                            </div>
                        </div>

                        <div class="row form-wrap-sidebar">
                            <div class="col-12">
                                <div class="form-wrap">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckChecked1" checked="">
                                        <label class="form-check-label" for="flexCheckChecked1">
                                            Correct typos in email address
                                            <small>Suggestions for common typos in emails addresses, like gmial instead of
                                                gmail.</small>
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckChecked2">
                                        <label class="form-check-label" for="flexCheckChecked2">
                                            Reject disposable emails
                                            <small>Disposable email addresses are mailboxes created for temporary
                                                usage</small>
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckChecked3">
                                        <label class="form-check-label" for="flexCheckChecked3">
                                            Reject emails from free services
                                            <small>Email addresses from services like Hotmail, Gmail or Yahoo etc</small>
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckChecked4">
                                        <label class="form-check-label" for="flexCheckChecked4">
                                            Reject role-based emails
                                            <small>Role-based emails are mailboxes like support@xyz.com or
                                                abuse@abc.com</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="#" class="btn btn-prim">Apply</a>
                            </div>
                            <div class="col-12">
                                <div class="infor-wrap">
                                    <div class="info-icon d-inline-block">
                                        <img src="<?php echo e(asset('design')); ?>/images/info.svg" alt="info">
                                    </div>
                                    <span>audit is where you can see all the issues in your design and content.</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="page" role="tabpanel" aria-labelledby="page-tab">
                    <div class="details-body-wrap content-elements-wrap trigger-elements-wrap">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="link-box-wrap">
                                    <div class="mb-3">
                                        <h3 class="mb-0">Page Name</h3>
                                        <p class="mb-2">This is the name of this page</p>
                                        <input type="text" class="form-control" id="pg-name" name="name"
                                            value="<?php echo e(Session::get('campaign')['name']); ?>">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-8">
                                <h3 class="mb-0">Page Url</h3>
                                <p>The following domain will be used for your page URL.</p>
                            </div>
                            <div class="col-12">
                                <div class="selection-all">
                                    <select name="url" id="" class="w-100">
                                        <option value="0"><?php echo e(env('LANDING_DOMAIN')); ?> (default)</option>
                                        <?php if($domains): ?>
                                            <?php $__currentLoopData = $domains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $domain): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($domain->id); ?>"
                                                    <?php echo e(isset(Session::get('campaign')['domain_url']) && strpos(Session::get('campaign')['domain_url'], $domain->subdomain . '.' . $domain->domain) !== false ? 'selected' : ''); ?>>
                                                    <?php echo e($domain->subdomain . '.' . $domain->domain); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <?php
                            if (isset(Session::get('campaign')['domain_url']) && !empty(Session::get('campaign')['domain_url'])) {
                                $url_parsed = parse_url(Session::get('campaign')['domain_url']);
                            }
                        ?>
                        <div class="row mb-3 domain_show"
                            style="<?php echo e(isset(Session::get('campaign')['domain_url']) && !empty(Session::get('campaign')['domain_url']) ? 'display: flex;' : 'display: none;'); ?>">

                            <div class="col-8 ">
                                <div class="selection-all">
                                    <input class="form-control" type="text" name="domain" readonly id="domain_name"
                                        value="<?php echo e(isset($url_parsed['host']) ? 'https://' . $url_parsed['host'] . '/' : ''); ?>">
                                </div>
                            </div>
                            <div class="col-4 px-0">
                                <div class="selection-all">
                                    <input class="form-control" type="text" name="domain_string" id="domain_val"
                                        value="<?php echo e(isset($url_parsed['path']) ? ltrim($url_parsed['path'], '/') : ''); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="seo_tag" role="tabpanel" aria-labelledby="seo_tag-tab">
                    <div class="details-body-wrap content-elements-wrap body-elements-wrap">
                        <div class="row">
                            <div class="col-12 px-2">
                                <div class="text-color-wrap bb">
                                    <div class="row">
                                        <div class="col-8">
                                            <h3 class="mb-0">SEO</h3>
                                            <p class="mb-0">Add SEO to your landing pages</p>
                                        </div>
                                        <div class="col-4">
                                            <div class="switch-box text-center">
                                                <label class="switch">
                                                    <input type="checkbox" class="red_seo">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="seo_wrap" style="display: none;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="link-box-wrap">

                                                <div class="mb-3">
                                                    <h3 class="mb-0">Meta Title</h3>
                                                    <p class="mb-2">This is the title of the page as shown on search
                                                        engines.</p>
                                                    <input type="text" class="form-control" id="pg-name"
                                                        name="meta_title">
                                                    9
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="link-box-wrap">

                                                <div class="mb-3">
                                                    <h3 class="mb-0">Meta Description</h3>
                                                    <p class="mb-2">This is the description of the page as shown on
                                                        search engines.</p>
                                                    <textarea name="meta_description" id="" cols="30" rows="10"></textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 form-wrap-sidebar">
                                        <div class="col-12">
                                            <div class="form-wrap">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckChecked1" checked="" name="search_engine_check">
                                                    <label class="form-check-label" for="flexCheckChecked1">
                                                        Don\'t allow search engines to index this page
                                                    </label>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="link-box-wrap">

                                                <div class="mb-3">
                                                    <h3 class="mb-0">Social Meta Title</h3>
                                                    <p class="mb-2">This is the title of the page seen on social
                                                        media.
                                                    </p>
                                                    <input type="text" class="form-control" name="social_meta_title"
                                                        id="pg-name">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="link-box-wrap">

                                                <div class="mb-3">
                                                    <h3 class="mb-0">Social Meta Description</h3>
                                                    <p class="mb-2">This is the description of the page as shown on
                                                        social media.</p>
                                                    <textarea name="social_meta_description" id="" cols="30" rows="10"></textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <h3 class="mb-0">Social Featured Image</h3>
                                            <p class="mb-2">A featured image that Facebook, Twitter, etc will show
                                                when
                                                the link is shared.
                                                Recommended size: 1200 x 630.</p>
                                            <div class="upl-wrap-tab">
                                                <input type="file" name="social_featured_image" class="upl-fil-tab">
                                                <img src="<?php echo e(asset('design')); ?>/images/upload.png" alt="upload">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="dashboard-cont-wrap dashboard-tabs-wrap">
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
                <?php echo $content; ?>

            </div>

            
            <div class="tab-pane fade" id="thank" role="tabpanel" aria-labelledby="thank-tab">
                <?php echo $thank_content; ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('.url_k').on('keyup', function() {
            console.log(isValidHttpUrl($(this).val()));
            if (isValidHttpUrl($(this).val())) {
                $(this).css('border-color', 'green !important');
                $('.icon-dang,.text-dang').hide();
            } else {
                $(this).css('border-color', 'red !important');

                $('.icon-dang,.text-dang').show();
            }
        });

        function isValidHttpUrl(string) {
            let url;

            try {
                url = new URL(string);
            } catch (_) {
                return false;
            }

            return url.protocol === "http:" || url.protocol === "https:";
        }
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
        // $(".url_wrap").hide();
        $(".red_web").click(function() {
            if ($(this).is(":checked")) {
                $(".url_wrap").show();
            } else {
                $(".url_wrap").hide();
                $('.url_k').val('');
            }
        });

        $(".em_wrap").hide();
        $(".red_em").click(function() {
            if ($(this).is(":checked")) {
                $(".em_wrap").show();
            } else {
                $(".em_wrap").hide();
            }
        });

        $(".seo_wrap").hide();
        $(".red_seo").click(function() {
            if ($(this).is(":checked")) {
                $(".seo_wrap").show();
            } else {
                $(".seo_wrap").hide();
            }
        });
        setTimeout(() => {
            // $('.tab-pane.active').css('opacity', '1');

        }, 1000);
        $('.btn.btn-prim.btn-prim-head').attr('href', "havascript:;");
        $('.btn.btn-prim.btn-prim-head').on('click', function(e) {
            e.preventDefault();
            $('#info_form').submit();

        });
        $('[name=url]').on('change', function() {
            var url_val = $('[name=url] option:selected').val();
            var url_txt = $('[name=url] option:selected').text();

            console.log(url_val)
            console.log(url_txt)
            if (url_val > 0) {
                $('.domain_show').css('display', 'flex');
                $('#domain_name').val('https://' + url_txt.trim() + '/');
            } else {
                $('.domain_show').hide();
                $('#domain_name').val('');
            }
        });
        $('[name=domain_string]').on('keyup', function() {
            var curr_val = $(this).val();
            var dom_val = $('[name=domain]').val();
            $.ajax({
                url: "<?php echo e(route('campaign.checkdom')); ?>",
                type: "post",
                data: {
                    'domain': dom_val + curr_val
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                        .attr(
                            'content')
                },
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        $('[name=domain_string]').val('');
                        $('.domain_show').append(
                            '<span class="text-danger">Domain url already exists!</span>');
                    } else {
                        $('.text-danger').remove();
                    }
                },

                error: function(error) {
                    console.log('erero');
                    console.log(error);

                }

            });
        });
        $(document).ready(function() {
            setTimeout(() => {
                var cnt = $('#landing').html();
                var cnt2 = $('#thank').html();
                // let parser = new DOMParser()
                // let domDocument = parser.parseFromString(cnt, 'text/html')
                // let elements = [].slice.call(domDocument.querySelectorAll('body'))
                // console.log(elements);
                x = cnt.match(/body {(.*?)}/i)
                x1 = cnt2.match(/body {(.*?)}/i)
                $('#landing').find('#u_body').attr('style', x[1]);
                $('#thank').find('#u_body').attr('style', x1[1]);
            }, 500);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/templates/informationDesign.blade.php ENDPATH**/ ?>