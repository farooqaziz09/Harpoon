
<?php $__env->startSection('title', ' | Account'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<style>
  i.togglePassword {
    position: absolute;
    top: 75%;
    transform: translateY(-50%);
    right: 10px;
    cursor: pointer;
    color: var(--bs-body-text-primary-color-30);
    font-size: 14px;
}
</style>
<?php $__env->startSection('content'); ?>
  <div class="dash-cont-table">
    <div class="row">
      <div class="col-12">
        <h1 class="mb-0">Accounts</h1>
        <div class="breadcrumb-area">
          <span><a href="<?php echo e(url('sites/campaigns')); ?>">Accounts</a> > My Account</span>
        </div>
      </div>
    </div>

    <div class="accordian-settings-wrap">
      <div class="row">
        <div class="col-12">
          <!-- general content start -->
          <div class="site-acc-body-wrap" id="general-content">
            <div class="row-top-wrap">
              <div class="row">
                <div class="col-lg-4">
                  <h2>Account Details</h2>
                  <p>
                    This is the email you use to login to your
                    account. Please make changes carefully.
                  </p>
                </div>
                <div class="col-lg-4 my-auto">
                  <div class="form-wrap">
                    <label>Email</label>
                    <input class="form-control" type="email" name="EmailName" value="<?php echo e(auth()->user()->email); ?>"
                      readonly />
                    <button class="btn btn-prim ms-0 d-none" data-bs-toggle="modal" data-bs-target="#changeModal">
                      Change Email
                    </button>
                  </div>
                </div>
                <div class="col-lg-4 my-auto d-none">
                  <div class="form-wrap">
                    <label>Timezone</label>
                    <select name="TimeName" id="TimeName">
                      <option value="1">
                        Timezone 1
                      </option>
                      <option value="2">
                        Timezone 2
                      </option>
                    </select>
                    <button class="btn btn-prim ms-0">
                      Change Time Zone
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row-top-wrap">
              <div class="row">
                <div class="col-lg-4">
                  <h2>Change Password</h2>
                  <p>
                    Enter a new password for your account. Please
                    make this change carefully.
                  </p>
                </div>
                <div class="col-lg-4 my-auto">
                  <div class="form-wrap">
                    <button class="btn btn-prim ms-0" data-bs-toggle="modal" data-bs-target="#setPassModal">
                      Set New Password
                    </button>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- general content ends -->
        </div>
      </div>
    </div>
  </div>
  <section class="modals-sec">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- changeModal -->
          <div class="modal fade modal-add modal-settings" id="changeModal" tabindex="-1"
            aria-labelledby="changeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header px-3">
                  <div class="row">
                    <div class="col-12 pt-3">
                      <h5 class="modal-title my-2" id="changeModalLabel">
                        Change Email
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <img src="<?php echo e(asset('website')); ?>/images/close.svg" alt="close" />
                      </button>
                    </div>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="btns-wrap mt-1">
                    <div class="row">
                      <div class="col-12 text-end">
                        <div class="serv-pop-wrap">
                          <div class="form-wrap">
                            <input class="form-control" type="email" name="email"
                              value="<?php echo e(auth()->user()->email); ?>" />
                          </div>
                        </div>
                        <a type="button" data-bs-dismiss="modal" aria-label="Close"
                          class="btn btn-prim btn-trans me-0">Cancel</a>
                        <a type="button" class="btn btn-prim me-0">Confirm</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- changeModal -->
          <!-- setPassModal -->
          <div class="modal fade modal-add modal-settings" id="setPassModal" tabindex="-1"
            aria-labelledby="setPassModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header px-3">
                  <div class="row">
                    <div class="col-12 pt-3">
                      <h5 class="modal-title my-2" id="setPassModalLabel">
                        Reset Password
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <img src="<?php echo e(asset('website')); ?>/images/close.svg" alt="close" />
                      </button>
                    </div>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="btns-wrap mt-1">
                    <form class="save_pass">
                      <?php echo csrf_field(); ?>

                      <div class="row">
                        <div class="col-12 text-end">
                          <div class="serv-pop-wrap">

                            <div class="form-wrap">
                              <div class="pass-wrap position-relative">
                                <label for="new-password">Old
                                  Password</label>
                                <input class="form-control id_password" type="password" name="old_password"
                                  value="" />
                                <i class="far fa-eye togglePassword" id="togglePassword2"></i>
                              </div>
                              <div class="pass-wrap position-relative">
                                <label for="new-password">New
                                  Password</label>
                                <input class="form-control id_password" type="password" name="new_password"
                                  value="" />
                                <i class="far fa-eye togglePassword" id="togglePassword2"></i>
                              </div>
                              <div class="pass-wrap position-relative">
                                <label for="confirmed-password">Confirm
                                  Password</label>
                                <input class="form-control id_password" type="password"
                                  name="new_password_confirmation" value="" />
                                <i class="far fa-eye togglePassword" id="togglePassword3"></i>
                              </div>
                            </div>
                          </div>
                          <a type="button" data-bs-dismiss="modal" aria-label="Close"
                            class="btn btn-prim btn-trans me-0">Cancel</a>
                          <button type="submit" class="btn btn-prim me-0">Save</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- setPassModal -->
    </div>
    </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script>
    $(".submenu li.submenu-parent").click(function() {
      $(".submenu-inner").toggleClass("show");
    });

    const togglePassword =
      document.querySelectorAll(".togglePassword");
    const passwords = document.querySelectorAll(".id_password");

    togglePassword.forEach(function(button, index) {
      button.addEventListener("click", function() {
        // toggle the type attribute
        const type =
          passwords[index].getAttribute("type") === "password" ?
          "text" :
          "password";
        passwords[index].setAttribute("type", type);
        // toggle the eye slash icon
        this.classList.toggle("fa-eye-slash");
      });
    });
    $(".save_pass").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({
        url: "<?php echo e(route('update-password')); ?>",
        type: "post",
        data: new FormData(this),
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
          if (response.status) {
            toastr.success(response.status);
          } else {
            console.log(response)
            toastr.error(response.error);
          }
        },
        error: function(error) {
          console.log(error)
          toastr.error(error.responseJSON.message);
        }
      });
    }));
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/account/index.blade.php ENDPATH**/ ?>