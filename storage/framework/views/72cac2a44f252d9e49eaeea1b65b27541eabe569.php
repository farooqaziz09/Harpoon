
<?php $__env->startSection('title', 'Login | ' . env('APP_NAME')); ?>
<?php $__env->startSection('content'); ?>
  <div class="bg-authentic h-100">
    <div class="container h-100">
      <div class="row justify-content-between h-100">

        <div class="col-lg-5 my-auto">
          <div class="cont-wrap">
            <div class="small-log-wrap">
              <img src="<?php echo e(asset('website')); ?>/images/logo.png" alt="logo">
            </div>
            <h1>Welcome to <?php echo e(env('APP_NAME')); ?></h1>
            <p>Let’s get you all set up so you can verify your personal account and begin setting up your
              profile</p>
          </div>
        </div>
        <div class="col-lg-5 my-auto">
          <div class="auth-wrap ms-auto">
            <div class="row">
              <div class="col-12">
                <h2>Welcome Back</h2>
                <p>Enter your email and password to login to your account.</p>
                <form method="POST" action="<?php echo e(route('login')); ?>">
                  <?php echo csrf_field(); ?>
                  <div class="mb-0">
                    <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email"
                      aria-describedby="emailHelp" name="email" value="<?php echo e(old('email')); ?>" required
                      autocomplete="email" autofocus placeholder="Email Address">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                      </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="mb-0 position-relative">
                    <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                      id="password" required autocomplete="current-password" placeholder="Password">
                    <span class="position-absolute top-50 end-0 translate-middle-y p-2" onclick="showPass()"><i
                        class="fa fa-eye p-icon"></i></span>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                      </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <button class="w-100 btn btn-prim"> Sign In <span type="submit" class="btn-prim-icon"><img
                        src="<?php echo e(asset('website')); ?>/images/next.svg" alt="next"></span></button>

                  <div class="text-center forgt-pass">


                    <?php if(Route::has('password.request')): ?>
                      <a href="<?php echo e(route('password.request')); ?>">I forgot my password</a>
                    <?php endif; ?>
                  </div>
                  <?php if(is_can_access('register')): ?>
                  <hr />
                  <div class="text-center link-para">
                    <p>Don’t have an account?
                      <?php if(Route::has('register')): ?>
                        <a href="<?php echo e(route('register')); ?>">Sign Up</a>
                      <?php endif; ?>
                    </p>
                  </div>
                  <?php endif; ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function showPass() {
      var p_type = $('#password').attr('type');
      if (p_type == 'text') {
        $('#password').attr('type', 'password')
        $('.p-icon').removeClass('fa-eye').addClass('fa-eye-slash');
      } else {
        $('#password').attr('type', 'text');

        $('.p-icon').removeClass('fa-eye-slash').addClass('fa-eye');
      }
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentication', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/auth/login.blade.php ENDPATH**/ ?>