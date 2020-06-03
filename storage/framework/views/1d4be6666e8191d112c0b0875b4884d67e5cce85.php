<?php $__env->startSection('content'); ?>
  
  <div class="card card-default">
    <div class="card-header">Posts</div>
    
    <div class="card-body">
      <?php if($posts->count() > 0): ?>
        <div class="row">
          <div class="col-sm-3 col-md-3"><h4>Image</h4></div>
          <div class="col-sm-3 col-md-3"><h4>Title</h4></div>
          <div class="col-sm-3 col-md-3"><h4>Category</h4></div>
          <div class="col-sm-3 col-md-3"></div>
        </div>
      
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="row mb-2">
            <div class="col-sm-3 col-md-3">
              <img src="<?php echo e(asset('/storage/' . $post->image)); ?>" alt="" style="width:50%">
            </div>
            <div class="col-sm-3 col-md-3"><?php echo e($post->title); ?></div>
            <div class="col-sm-3 col-md-3">
              <a href="<?php echo e(route('categories.edit', $post->category->id)); ?>">
                <?php echo e($post->category->name); ?>

              </a>
            </div>
            <div class="col-sm-3 col-md-3">
              <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="post" class="float-right">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger btn-sm float-right">
                  <?php echo e($post->trashed() ? 'Delete' : 'Trash'); ?>

                </button>
              </form>
              <?php if($post->trashed()): ?>
                <form action="<?php echo e(route('restore-posts', $post->id)); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PUT'); ?>
                  <button type="submit" class="btn btn-success btn-sm">
                    Restore
                  </button>
                </form>
              <?php else: ?>
                <a href=" <?php echo e(route('posts.edit', $post->id)); ?> " class="btn btn-success btn-sm mr-2">Edit</a>  
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php else: ?>
        <h3 class="text-center">Posts Not Found</h3>
      <?php endif; ?>
      <div class="mt-3">
        <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary btn-block">Add Post</a>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\laravel-blog\resources\views/posts/index.blade.php ENDPATH**/ ?>