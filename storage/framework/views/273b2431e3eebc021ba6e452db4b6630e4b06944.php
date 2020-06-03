<?php $__env->startSection('content'); ?>
  
  <div class="card card-default">
    <div class="card-header">Users</div>
    
    <div class="card-body">
      <?php if($users->count() > 0): ?>
        <div class="row mb-2">
          <div class="col-sm-3 col-md-3"><h4>Image</h4></div>
          <div class="col-sm-3 col-md-3"><h4>Name</h4></div>
          <div class="col-sm-3 col-md-3"><h4>Email</h4></div>
          <div class="col-sm-3 col-md-3"></div>
        </div>
      
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="row mb-2">
            <div class="col-sm-3 col-md-3">
              <img width="40px" height="40px" style="border-radius:50%" src="<?php echo e(Gravatar::src($user->email)); ?>" alt="">
            </div>
            <div class="col-sm-3 col-md-3"><?php echo e($user->name); ?></div>
            <div class="col-sm-3 col-md-3"><?php echo e($user->email); ?></div>
            <div class="col-sm-3 col-md-3">
              <?php if(!$user->isAdmin()): ?>
                <form action="<?php echo e(route('users.make-admin', $user->id)); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <button class="btn btn-success btn-sm">Make Admin</button>
                </form>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\laravel-blog\resources\views/users/index.blade.php ENDPATH**/ ?>