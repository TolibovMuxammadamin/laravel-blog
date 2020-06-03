<?php $__env->startSection('title'); ?>
  <?php echo e($post->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
  <!-- Header -->
  <header class="header text-white h-fullscreen pb-80" style="background-image: url(<?php echo e(asset('/storage/'. $post->image)); ?>);" data-overlay="9">
    <div class="container text-center">

      <div class="row h-100">
        <div class="col-lg-8 mx-auto align-self-center">

          <p class="opacity-70 text-uppercase small ls-1">
            <?php echo e($post->category->name); ?>

          </p>
          <h1 class="display-4 mt-7 mb-8">
            <?php echo e($post->title); ?>

          </h1>
          <p><span class="opacity-70 mr-1">By</span>
            <a class="text-white" href="#"><?php echo e($post->user->name); ?></a>
          </p>
          <p>
            <img class="avatar avatar-sm" src="<?php echo e(Gravatar::src($post->user->email)); ?>" alt="...">
          </p>

        </div>

      </div>

    </div>
  </header><!-- /.header -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="main-content">


  <!--
  |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
  | Blog content
  |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
  !-->
  <div class="section" id="section-content">
    <div class="container">

      <div class="row mb-5">
        <?php echo $post->content; ?>

      </div>

      
      <!-- Go to www.addthis.com/dashboard to customize your tools -->
      <div class="addthis_inline_share_toolbox"></div>
            

      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="gap-xy-2 mt-6">
            <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <a class="badge badge-pill badge-secondary" href="<?php echo e(route('blog.tag', $tag->id)); ?>"><?php echo e($tag->name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

        </div>
      </div>


    </div>
  </div>


  <!--
  |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
  | Comments
  |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
  !-->

  <div class="section bg-gray">
    <div class="container">

      <div class="row">
        <div class="col-lg-8 mx-auto">

          <div id="disqus_thread"></div>
            <script>

            /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
            
            var disqus_config = function () {
            this.page.url = "<?php echo e(config('app.url')); ?>/blog/post/<?php echo e($post->id); ?>";  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            
            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://the-saas-blog.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

        </div>
      </div>

    </div>
  </div>

</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\laravel-blog\resources\views\blog\show.blade.php ENDPATH**/ ?>