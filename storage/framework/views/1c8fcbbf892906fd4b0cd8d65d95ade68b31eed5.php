<?php $__env->startSection('content'); ?>
    <div class="card card-default">
      <div class="card-header">
        <?php echo e(isset($tag) ? 'Edit Tag' : 'Add Tag'); ?>

      </div>
      <div class="card-body">
        <?php echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(isset($tag) ? route('tags.update', $tag) : route('tags.store')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <?php if(isset($tag)): ?>
            <?php echo method_field('PUT'); ?>
          <?php endif; ?>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Tag Name" value="<?php echo e(isset($tag) ? $tag->name : ''); ?>">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success">
              <?php echo e(isset($tag) ? 'Update Tag' : 'Add Tag '); ?>

            </button>
          </div>
        </form>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\laravel-blog\resources\views\tags\create.blade.php ENDPATH**/ ?>