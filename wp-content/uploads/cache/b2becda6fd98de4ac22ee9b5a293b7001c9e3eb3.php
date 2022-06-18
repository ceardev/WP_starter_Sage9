<?php $__env->startSection('content'); ?>
	<section class="banner-page">
	  <div class="container">
	    <div class="row justify-content-center">
	      <div class="banner-page__banner">
	        <img src="<?= App\asset_path("images/banners/content-banner.png"); ?>" alt="" class="img-fluid">
	      </div>
	      <div class="col-lg-6">
	          <div class="banner-page__title-wrapper justify-content-center">
	            <h1 class="banner-page__title"><?php echo e(__('404 Error', 'sage')); ?></h1>
	          </div>
	          <div class="row justify-content-center banner-page__texts">
	            <div class="col-md-8 col-lg-10 col-xl-8 text-center">
		            <div class="banner-page__text"><?php echo e(__('Sorry, but the page you were trying to view does not exist.', 'sage')); ?></div>

		            <a href="<?php echo e(get_field('button')['url']); ?>" class="action" title="" role="link">
		              <span class="icon icon-arrow"></span>
		              <?php echo e(__('Back to homepage', 'sage')); ?>

		            </a>
	            </div>
	          </div>
	      </div>
	    </div>
	  </div>
	</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>