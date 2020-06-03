<?php $__env->startSection('content'); ?>
  <div class="card card-default">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4 col-md-4"><b>Tags</b></div>
        </div>
      </div>
      <div class="card-body">
        <?php if($tags->count() > 0): ?>
          <div class="row mb-2">
            <div class="col-sm-4 col-md-4"><b>Tags Name</b></div>
            <div class="col-sm-4 col-md-4"><b>Posts Count</b></div>
            <div class="col-sm-4 col-md-4"></div>
          </div>
          <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row mb-2">
              <div class="col-sm-4 col-md-4">
                <?php echo e($tag->name); ?>

              </div>
              <div class="col-sm-4 col-md-4">
                <?php echo e($tag->posts->count()); ?>

                
              </div>
              <div class="col-sm-4 col-md-4">
                <a href="<?php echo e(route('tags.edit', $tag->id)); ?>" class="btn btn-success btn-sm mr-1">Edit</a>
                <button type="submit" class="btn btn-danger btn-sm" onclick="handleDelete(<?php echo e($tag->id); ?>)">Delete</button>
              </div>
            </div>          
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
          <h3 class="text-center">Tags not found</h3>
        <?php endif; ?>
        <div class="mt-3">
          <a href="<?php echo e(route('tags.create')); ?>" class="btn btn-primary btn-block">Add Tag</a>
        </div>
      </div>
  </div>

  <form action="" method="POST" id="deletetagForm">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Tag</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center text-bold">
              Are you sure you want delete this Tag?
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
          </div>
        </div>
      </div>
    </div>
  </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
      function handleDelete(id)
      { 
        let form = document.getElementById('deletetagForm');
        form.action = '/tags/' + id;
        $('#deleteModal').modal('show')    
      }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\laravel-blog\resources\views\tags\index.blade.php ENDPATH**/ ?>