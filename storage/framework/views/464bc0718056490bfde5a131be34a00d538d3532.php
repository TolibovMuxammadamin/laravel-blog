
        
        

        
        


<?php if($paginator->hasPages()): ?>
    <nav class="flexbox mt-30">
    
    
    <?php if($paginator->onFirstPage()): ?>
        <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Previous</a>
    <?php else: ?>
        <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="btn btn-white"><i class="ti-arrow-left fs-9 mr-4"></i> Previous</a>
    <?php endif; ?>
    
    
    <?php if($paginator->hasMorePages()): ?>
        <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="btn btn-white">Next <i class="ti-arrow-right fs-9 ml-4"></i></a>
    <?php else: ?>
        <a class="btn btn-white disabled">Next <i class="ti-arrow-right fs-9 ml-4"></i></a>
    <?php endif; ?>
    
    </nav>
<?php endif; ?><?php /**PATH C:\OSPanel\domains\laravel-blog\resources\views\vendor\pagination\simple-default.blade.php ENDPATH**/ ?>