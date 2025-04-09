<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>


  <div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
      <h2>Dev Area
        <small class="text-danger">version: <?php echo e($version); ?></small>
        | <small class="text-danger">JS/CSS Version : <?php echo e($jsCssVersion); ?></small>
      </h2>

    </div>
  </div>
  <div class="card">
    <div class="card-header">

      <a href="<?php echo e(route('dev.show',['log-files'])); ?>" class="btn btn-info">Log files (<?php echo e($totalLogsFiles); ?>)</a>
      <a href="<?php echo e(route('dev.show',['code-logs'])); ?>" class="btn btn-warning">Code Logs (<?php echo e($dataArr['total_code_errors']); ?>)</a>
      <a href="javascript:;" onclick="document.getElementById('funcs').style.display='block'" class="btn btn-info">Show All</a>
      <a href="javascript:;" onclick="document.getElementById('error_pages').style.display='block'" class="btn btn-info">Error Pages</a>
    </div>

    <ul id="funcs" class="list-group" style="display: none;">
      <li class="list-group-item">1. <a href="<?php echo e(route('dev.show',['send-test-email'])); ?>" onclick="return confirm('Are you sure ? you want to send test email')" class="btn btn-info">Send Test Email-><?php echo e($toEmail); ?></a></li>
      <li class="list-group-item">2. <a href="<?php echo e(route('dev.show',['mail-config-values'])); ?>" class="btn btn-info">mail Config Values</a>
      </li>
      <li class="list-group-item">3. <a href="<?php echo e(route('dev.show',['main-config-values'])); ?>" class="btn btn-info"> *MAIN Config Values</a></li>
      </li>
      <li class="list-group-item">3.1 <a href="<?php echo e(route('dev.show',['all-config-values'])); ?>" class="btn btn-info"> ***All Config Values</a></li>
      </li>
      <li class="list-group-item">4. <a href="<?php echo e(route('dev.show',['clear-config'])); ?>" onclick="return confirm('Are you sure ?')" class="btn btn-warning">Clear Config</a></li>

      <li class="list-group-item">5. Git Commands
        <br />
        <ul class="list-group">
          <li class="list-group-item"><a href="<?php echo e(route('dev.show',['git-status-command'])); ?>" onclick="return confirm('Are you sure ?')" class="text text-danger">git status</a></li>
          <li class="list-group-item"><a href="<?php echo e(route('dev.show',['git-history'])); ?>" onclick="return confirm('Are you sure ?')" class="text text-danger">git commits</a></li>
          <li class="list-group-item"><a href="<?php echo e(route('dev.show',['git-stash-command'])); ?>" onclick="return confirm('Are you sure ?')" class="text text-danger">git stash</a></li>
          <li class="list-group-item"><a href="<?php echo e(route('dev.show',['git-pull-command'])); ?>" onclick="return confirm('Are you sure ?')" class="text text-danger">git pull</a></li>
          <li class="list-group-item"><a href="<?php echo e(route('dev.show',['git-log-command'])); ?>" onclick="return confirm('Are you sure ?')" class="text text-danger">git Commits</a></li>
        </ul>
      </li>


      <li class="list-group-item">6. Mini Function
        <br />
        <ul class="list-group">
          <li class="list-group-item"><a href="<?php echo e(route('dev.show',['write-log'])); ?>" onclick="return confirm('Are you sure ?')" class="text text-danger">write log: <code>Log::info('my log here')</code></a></li>
        </ul>
      </li>

      <li class="list-group-item">6. Mini Function
        <br />
        <ul class="list-group">
          <li class="list-group-item"><a href="<?php echo e(route('dev.show',['insert-settings'])); ?>" onclick="return confirm('Are you sure ?')" class="text text-danger">Create new Account</a></li>
        </ul>
      </li>

    </ul>
    
    <ul id="error_pages" class="list-group" style="display: none;">
      <li class="list-group-item">1. <a href="<?php echo e(route('dev.show',['error-page404'])); ?>" class="btn btn-info">404 Page</a></li>
      <li class="list-group-item">2. <a href="<?php echo e(route('dev.show',['error-page500'])); ?>" class="btn btn-info">500 Page</a>
      <li class="list-group-item">3. <a href="<?php echo e(route('dev.show',['throw-error-page'])); ?>" class="btn btn-info">Throw Coding Error</a>
      <li class="list-group-item">3. <a href="<?php echo e(route('dev.show',['generate-coding-error'])); ?>" class="btn btn-info">Generate Coding Error</a>

    </ul>

    <div class="card-body">
      <h3>Date : <code><?php echo e(date('Y-m-d H:i:s')); ?></code></h3>
      <h3>Log file <small><code>/logs/laravel.log</code></small></h3>
      <textarea rows="9" cols="50" class="form-control"><?php echo e($fileLogs); ?></textarea>
      <br /><br />
      <h3>Public Log file <small><code>/public/error_log</code></small></h3>
      <textarea rows="9" cols="50" class="form-control"><?php echo e($fileLogsPublic); ?></textarea>


    </div>
  </div>

</body>

</html><?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/admin-panel/dev.blade.php ENDPATH**/ ?>